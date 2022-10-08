<?php

namespace App\Libs;

use Abraham\TwitterOAuth\TwitterOAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Helpers
{

    public static function getUniqueId(): string
    {
        $uniqueStr = Str::lower(Str::random(10));

        if(DB::table('social_accounts')->where('social_id', Auth::id())->exists()){
            return Helpers::getUniqueId();
        }

        return $uniqueStr;
    }

    public static function isTwitterActive(): bool
    {

      //  $user = DB::table('users')
            //->select('id', 'tw_access_token', 'tw_access_secret')
        //    ->where('id', Auth::id())->first();

        $social = DB::table('social_accounts')
            //->select('id', 'tw_access_token', 'tw_access-token_secret')
            ->where('owner_id', Auth::id())->first();

        if (empty($social->tw_access_token) || empty($social->tw_access_token_secret)){
            return true;
        }

        $connection = new TwitterOAuth(env('TWITTER_CONSUMER_KEY'), env('TWITTER_CONSUMER_SECRET'),
            $social->tw_access_token, $social->tw_access_token_secret);

        $twitter_info = $connection->get('account/verify_credentials');

        if (isset($twitter_info)){
            return true;
        }

        return false;
    }

    public static function isPremium(){
        return DB::table('subscriptions')
            ->where('owner_id',  Auth::id())
            ->where('status', '1')->exists();
    }

    // will be properly worked on in the future
    public static function getSubCancelUrl(){
        $sub = DB::table('subscriptions')
            ->where('owner_id',  Auth::id())
            ->where('status', '1')->first();

        return $sub->paddle_cancel_url;
    }

    public static function isSocialPresent(){
        return DB::table('social_accounts')->where('owner_id', Auth::id())
            ->exists();
    }

}
