<?php

namespace App\Listeners\Paddle;

use App\Libs\Telegram;
use Illuminate\Support\Facades\DB;
use ProtoneMedia\LaravelPaddle\Events\SubscriptionUpdated;

class PaddleUpdateSubscription {

    public function handle(SubscriptionUpdated $event) {

        $sub_exist = DB::table('subscriptions')
            ->where('paddle_subscription_id', $event->subscription_id)->exists();

        if (!$sub_exist) {
            print "subscription does not exist for " . $event->subscription_id;
            return;
        }

        $query = [
            'end_date' => $event->cancellation_effective_date, 'status' => '2',
            'updated_at' => date('Y-m-d H:i:s')
        ];
        //status '2' means subscription has been cancelled.

     //   DB::table('subscriptions')
    //        ->where('paddle_subscription_id', $event->subscription_id)
  //          ->update($query);

//       Telegram::send_notification("Subscription Updated - ".env('APP_NAME')."\nPaddle sub Id: ".
        //$event->subscription_id . "\n Cancellation Date".$event->cancellation_effective_date);
    }
}
