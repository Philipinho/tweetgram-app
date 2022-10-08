<?php
namespace App\Http\Controllers\SocialAuth;

use Abraham\TwitterOAuth\TwitterOAuth;
use App\Http\Controllers\Controller;

use App\Libs\Helpers;
use Illuminate\Http\Request;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redirect;
use App\Libs\Telegram;
use Illuminate\Support\Str;

class TwitterPKCEController extends Controller
{

    public function redirectToTwitterProvider() {
        $clientId = env('TWITTER_CLIENT_ID');
        $redirectUri = env('TWITTER_CALLBACK_URL');
        return redirect()->to("https://twitter.com/i/oauth2/authorize?client_id={$clientId}&redirect_uri={$redirectUri}&scope=tweet.read%20tweet.write%20users.read%20offline.access&response_type=code&state=state&code_challenge=challenge&code_challenge_method=plain");
    }

    public function twitterProviderCallback(Request $request) {
        try {
            //$tele = new Telegram();

            $code = $request->code;

            if (empty($code)) {
                flash()->error('Failed to login with Instagram. Please try again or contact support.');
                return redirect()->route('/dashboard');
            }

            $clientId = env('TWITTER_CLIENT_ID');
            $clientSecret = env('TWITTER_CLIENT_SECRET');
            $redirectUri = env('TWITTER_CALLBACK_URL');

            $auth_header = base64_encode($clientId .":". $clientSecret);

            $client = new Client();

            // Get access token
            $response = $client->request('POST', 'https://api.twitter.com/2/oauth2/token', [
                'verify' => false,
                'headers' => [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                    'Authorization' => 'Basic '. $auth_header,
                ],
                'form_params' => [
                    'code' => $code,
                    'grant_type' => 'authorization_code',
                    'client_id' => $clientId,
                    'redirect_uri' => $redirectUri,
                    'code_verifier' => 'challenge',
                ]
            ]);

            if ($response->getStatusCode() != 200) {
                flash()->error('Unauthorized login to Twitter.');
                return redirect()->route('/dashboard');
            }

            $content = json_decode($response->getBody()->getContents());
            $accessToken = $content->access_token;
            $refreshToken = $content->refresh_token;
            $tokenScope = $content->scope;
            $tokenExpiryDate = $content->expires_in;



/*
 * In case of token refresh
            $longTokenResponse = $client->request('POST', 'https://api.twitter.com/2/oauth2/token', [
                'verify' => false,
                'headers' => [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                    'Authorization' => 'Basic '. $auth_header,
                ],
                'form_params' => [
                    'refresh_token' => $accessToken,
                    'grant_type' => 'refresh_token',
                ]
            ]);

            if ($longTokenResponse->getStatusCode() != 200) {
                return redirect()->route('/dashboard')->with('error', 'Unauthorized login to Instagram.');
            }

            $tokenContent = $longTokenResponse->getBody()->getContents();
            $tokenContent = json_decode($tokenContent);
            $longAccessToken = $tokenContent->access_token;
*/

            // Get user Info

            $userResponse = $client->request('GET', 'https://api.twitter.com/2/users/me', [
                'verify' => false,
                'headers' => [
                    'Authorization' => 'Bearer '. $accessToken,
                ],
                'form_params' => [
                    'user.fields' => 'id,username,name,profile_image_url,location,verified,public_metrics',
                ]
            ]);

            $user_info = json_decode($userResponse->getBody()->getContents());

            $user_id = $user_info->data->id;
            $username = $user_info->data->username;
            $name = preg_replace('/[[:^print:]]/', '', $user_info->data->name);
            $user_pic = $user_info->data->profile_image_url;
            $location = $user_info->data->location;
            //$email = $user_info->email;
            $followers = $user_info->data->public_metrics->followers_count;
            $verified = $user_info->data->verified;

           // if (strpos($user_pic, '_normal') !== false) {
            //    $user_pic = str_replace('_normal','',$user_pic);
            //}

            //Crypt::encryptString($oauth_access_token),
            $sql_query = ['tw_user_id' => $user_id, 'tw_username' => $username, 'tw_name' => $name,
                'tw_access_token' => $accessToken, 'tw_refresh_token' => $refreshToken,
                'tw_token_scope' => $tokenScope, 'tw_access_token_expires' => $tokenExpiryDate,
                'tw_photo_url' => $user_pic, 'tw_followers' => $followers, 'tw_location' => $location,
                'tw_verified' => $verified, 'tw_api_version' => '2',
                'updated_at' => date('Y-m-d H:i:s'), 'active' => '1'];

            if (DB::table('social_accounts')->where('owner_id', Auth::id())->exists()) {
                DB::table('social_accounts')
                    ->where('owner_id', Auth::id())
                    ->update($sql_query);
            } else {
                $social_id = Helpers::getUniqueId();

                $filtered_query = Arr::add($sql_query, 'owner_id', Auth::id());
                $filtered_query = Arr::add($filtered_query, 'social_id', $social_id);
                $filtered_query = Arr::except($filtered_query, ['updated_at','active']);

                DB::table('social_accounts')->insert($filtered_query);
            }

            flash()->success("Twitter connected successfully.");
            return Redirect::to('/dashboard');

        } catch (\Exception $e) {
            //$e->getMessage();
            flash()->error("Sorry, an error occurred. Please try again or contact support of this persists.");
            return Redirect::to('/dashboard');
        }
    }
    //https://developer.twitter.com/en/docs/authentication/oauth-2-0/user-access-token
    // https://developer.twitter.com/en/docs/twitter-api/users/lookup/api-reference/get-users-me
    //https://developer.twitter.com/en/docs/api-reference-index
}
