<?php

namespace App\Listeners\Paddle;

use App\Libs\Telegram;
use Illuminate\Support\Facades\DB;
use ProtoneMedia\LaravelPaddle\Events\SubscriptionCancelled;

class PaddleCancelSubscription {

    public function handle(SubscriptionCancelled $event) {

        $sub_exist = DB::table('subscriptions')->where('paddle_subscription_id', $event->subscription_id)->exists();

        if (!$sub_exist) {
            print "subscription does not exist for " . $event->subscription_id;
            return;
        }

        $query = [
            'end_date' => $event->cancellation_effective_date, 'status' => '2',
            'updated_at' => date('Y-m-d H:i:s')
        ];
        //status '2' means subscription has been cancelled.

        DB::table('subscriptions')
            ->where('paddle_subscription_id', $event->subscription_id)
            ->update($query);

        // turn off all premium toggles. Although there will be no need since we dont check this option for free accounts
       /*
        $toggle_query = [
            'remove_hashtags' => 0,
            'remove_caption' => 0,
           // 'updated_at' => date('Y-m-d H:i:s')
        ];

        DB::table('social_accounts')
            ->where('owner_id', $event->passthrough)
            ->update($toggle_query);
        */

        Telegram::send_notification("Subscription Cancellation - ".env('APP_NAME')."\nPaddle sub Id: ".
            $event->subscription_id . "\n Cancellation Date".$event->cancellation_effective_date);
    }
}
