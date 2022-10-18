<?php

namespace App\Libs;

use Abraham\TwitterOAuth\TwitterOAuth;
use Abraham\TwitterOAuth\TwitterOAuthException;
use EspressoDev\InstagramBasicDisplay\InstagramBasicDisplay;
use EspressoDev\InstagramBasicDisplay\InstagramBasicDisplayException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Contracts\Encryption\EncryptException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
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
        $social = DB::table('social_accounts')
            ->where('owner_id', Auth::id())->first();

        if (empty($social->tw_access_token) || empty($social->tw_access_token_secret)){
            return false;
        }

        try {
            $connection = new TwitterOAuth(env('TWITTER_CONSUMER_KEY'), env('TWITTER_CONSUMER_SECRET'),
                Crypt::decryptString($social->tw_access_token), Crypt::decryptString($social->tw_access_token_secret));
            $twitter_info = $connection->get('account/verify_credentials');
        } catch (\Exception $e){
            return false;
        }

        if (isset($twitter_info->id)){
            return true;
        }

        return false;
    }

    /**
     * @throws InstagramBasicDisplayException
     */
    public static function isInstagramActive(): bool
    {
        $social = DB::table('social_accounts')
            ->where('owner_id', Auth::id())->first();

        if (empty($social->insta_access_token)){
            return false;
        }

        try {
            $instagram = new InstagramBasicDisplay(Crypt::decryptString($social->insta_access_token));
            $instagram_profile = $instagram->getUserProfile();
        }catch (InstagramBasicDisplayException | DecryptException $e){
            return false;
        }

        if (isset($instagram_profile->username)){
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
