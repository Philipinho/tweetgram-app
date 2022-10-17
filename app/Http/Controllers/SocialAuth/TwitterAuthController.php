<?php
namespace App\Http\Controllers\SocialAuth;

use App\Http\Controllers\Controller;

use App\Libs\Helpers;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Abraham\TwitterOAuth\TwitterOAuth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class TwitterAuthController extends Controller
{

    public function redirectToTwitterProvider() {

        try {
            $connection = new TwitterOAuth(env('TWITTER_CONSUMER_KEY'), env('TWITTER_CONSUMER_SECRET'));

            $request_token = $connection->oauth("oauth/request_token", array("oauth_callback" => env('TWITTER_CALLBACK_URL')));

            Session::put('oauth_token', $request_token['oauth_token']);
            Session::put('oauth_token_secret', $request_token['oauth_token_secret']);

            $url = $connection->url("oauth/authorize", array("oauth_token" => $request_token['oauth_token']));

            return Redirect::to($url);
        } catch (\Exception $e) {
            flash()->error("An error occurred. " . $e->getMessage());
            return Redirect::to('/dashboard');
        }
    }

    public function twitterProviderCallback()
    {
        try {
            if ($_GET['oauth_token'] || $_GET['oauth_verifier']) {
                $connection = new TwitterOAuth(env('TWITTER_CONSUMER_KEY'), env('TWITTER_CONSUMER_SECRET'), Session::get('oauth_token'), Session::get('oauth_token_secret'));
                $access_token = $connection->oauth('oauth/access_token', array('oauth_verifier' => $_REQUEST['oauth_verifier'], 'oauth_token' => $_GET['oauth_token']));

                $connection = new TwitterOAuth(env('TWITTER_CONSUMER_KEY'), env('TWITTER_CONSUMER_SECRET'), $access_token['oauth_token'], $access_token['oauth_token_secret']);

                $params = array('include_email' => 'true');

                $user_info = $connection->get('account/verify_credentials', $params);

                $user_id = $user_info->id;

                $username = $user_info->screen_name;
                $name = preg_replace('/[[:^print:]]/', '', $user_info->name);
                $user_pic = $user_info->profile_image_url_https;
                $email = $user_info->email;
                $location = $user_info->location;
                $followers = $user_info->followers_count;
                $verified = $user_info->verified;
                $oauth_access_token = Crypt::encryptString($access_token['oauth_token']);
                $oauth_access_token_secret = Crypt::encryptString($access_token['oauth_token_secret']);

                $sql_query = ['tw_user_id' => $user_id, 'tw_username' => $username, 'tw_name' => $name,
                    'tw_access_token' => $oauth_access_token, 'tw_access_token_secret' => $oauth_access_token_secret,
                    'tw_photo_url' => $user_pic, 'tw_followers' => $followers, 'tw_location' => $location,
                    'tw_email' => $email, 'tw_verified' => $verified, 'tw_api_version' => '1',
                    'updated_at' => date('Y-m-d H:i:s'), 'status' => '1'];

                if (DB::table('social_accounts')->where('owner_id', Auth::id())->exists()) {
                    DB::table('social_accounts')
                        ->where('owner_id', Auth::id())
                        ->update($sql_query);
                } else {
                    $social_id = Helpers::getUniqueId();

                    $filtered_query = Arr::add($sql_query, 'owner_id', Auth::id());
                    $filtered_query = Arr::add($filtered_query, 'social_id', $social_id);
                    $filtered_query = Arr::except($filtered_query, ['updated_at','status']);

                    DB::table('social_accounts')->insert($filtered_query);
                }

                flash()->success("Twitter connected successfully.");
                return Redirect::to('/dashboard');

                //return to homepage if any error
            } else {
                flash()->error("Twitter authentication could not be completed. Please try again.");
                return Redirect::to('/dashboard');
            }

        } catch (\Exception $e) {
            flash()->error("An error occurred. Please try again or contact support if this issue persists."
            . $e->getMessage() . " " . $e->getCode());
            return Redirect::to('/dashboard');
        }
    }

}
