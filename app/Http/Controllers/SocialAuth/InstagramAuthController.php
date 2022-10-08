<?php
namespace App\Http\Controllers\SocialAuth;

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

class InstagramAuthController extends Controller
{

    public function redirectToInstagramProvider() {
        $appId = env('INSTAGRAM_APP_ID');
        $redirectUri = urlencode(env('INSTAGRAM_CALLBACK_URL'));
        return redirect()->to("https://api.instagram.com/oauth/authorize?app_id={$appId}&redirect_uri={$redirectUri}&scope=user_profile,user_media&response_type=code");
    }

    public function instagramProviderCallback(Request $request) {
        try {
            $code = $request->code;
            if (empty($code)) return redirect()->route('/dashboard')->with('error', 'Failed to login with Instagram.');

            $appId = env('INSTAGRAM_APP_ID');
            $secret = env('INSTAGRAM_APP_SECRET');
            $redirectUri = env('INSTAGRAM_CALLBACK_URL');

            $client = new Client();

            // Get access token
            $response = $client->request('POST', 'https://api.instagram.com/oauth/access_token', [
                'verify' => false,
                'form_params' => [
                    'app_id' => $appId,
                    'app_secret' => $secret,
                    'grant_type' => 'authorization_code',
                    'redirect_uri' => $redirectUri,
                    'code' => $code,
                ]
            ]);

            if ($response->getStatusCode() != 200) {
                return redirect()->route('/dashboard')->with('error', 'Unauthorized login to Instagram.');
            }

            $content = $response->getBody()->getContents();
            $content = json_decode($content);

            $shortAccessToken = $content->access_token;

            $longTokenResponse = $client->request('GET',
                "https://graph.instagram.com/access_token?grant_type=ig_exchange_token&client_secret={$secret}&access_token={$shortAccessToken}",
                ['verify' => false]);

            if ($longTokenResponse->getStatusCode() != 200) {
                return redirect()->route('/dashboard')->with('error', 'Unauthorized login to Instagram.');
            }

            $tokenContent = $longTokenResponse->getBody()->getContents();
            $tokenContent = json_decode($tokenContent);

            $longAccessToken = $tokenContent->access_token;
            $accessTokenExpiry = $tokenContent->expires_in;

            // Get user info
            $userResponse = $client->request('GET',
                "https://graph.instagram.com/me?fields=id,username,account_type&access_token={$longAccessToken}",
                ['verify' => false]);

            $userInfo = $userResponse->getBody()->getContents();
            $userInfo = json_decode($userInfo);

            $userId = $userInfo->id;
            $username = $userInfo->username;

            // Get media
            $response = $client->request('GET',
                "https://graph.instagram.com/me/media?fields=id,username,timestamp&access_token={$longAccessToken}",
                ['verify' => false]);

            $media = $response->getBody()->getContents();
            $media = json_decode($media, true);

            $lastPostId = '';
            $lastPostTime = '';

            if (isset($media['data'][0]['id']) && isset($media['data'][0]['timestamp'])) {
                $lastPostId = $media['data'][0]['id'];
                $lastPostTime = explode("+", $media['data'][0]['timestamp'])[0];
            }

            if (empty($lastPostTime)) {
                $lastPostTime = gmdate("Y-m-d\TH:i:s");
            }

            $sql_query = ['insta_username' => $username, 'insta_user_id' => $userId,
                'insta_access_token' => $longAccessToken, 'insta_access_token_expires' => $accessTokenExpiry,
                'insta_last_post_id' => $lastPostId, 'insta_last_timestamp' => $lastPostTime,
                'updated_at' => date('Y-m-d H:i:s'), 'active' => '1'];

            if(DB::table('social_accounts')->where('owner_id', Auth::id())->exists()) {
                DB::table('social_accounts')
                    ->where('owner_id', Auth::id()) // for now, we are doing single accounts per person, not multi; looks good for now.
                    ->update($sql_query);
            } else {
                $social_id = Helpers::getUniqueId();

                $filtered_query = Arr::add($sql_query, 'owner_id', Auth::id());
                $filtered_query = Arr::add($filtered_query, 'social_id', $social_id);
                $filtered_query = Arr::except($filtered_query, ['updated_at','active']);

                DB::table('social_accounts')->insert($filtered_query);
            }

            flash()->success("Instagram connected successfully.");

            return Redirect::to('/dashboard');
        } catch (\Exception $e) {
            return $e->getMessage(); //Redirect::to('/dashboard');
        }
    }
}
