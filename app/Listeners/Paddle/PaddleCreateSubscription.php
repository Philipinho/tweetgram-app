<?php

namespace App\Listeners\Paddle;

use Illuminate\Support\Facades\DB;
use ProtoneMedia\LaravelPaddle\Events\SubscriptionCreated;
use App\Libs\Telegram;

class PaddleCreateSubscription {

    public function handle(SubscriptionCreated $event) {
        $this->create_subscription($event);
    }

    function create_subscription($event){

        $sub_exist = DB::table('subscriptions')->where('paddle_checkout_id', $event->checkout_id)->exists();


        // account for legacy subscription
        if ($sub_exist){
            print "Subscription entry already processed.";
            return;
        }

        $user = DB::table('users')->where('id', $event->passthrough)->exists();

        if (!$user) {
            print "User not found in database or database was disconnected.";
            return;
        }

        $owner_id = $event->passthrough;

        $products = DB::table('products')
            ->where('paddle_product_id', $event->subscription_plan_id)
            ->select('plan_id', 'paddle_product_id', 'interval')
            ->first();

        $plan_id = $products->plan_id;
        $interval = $products->interval;

        $query = [
            'plan_id' => $plan_id, 'paddle_subscription_plan_id' => $event->subscription_plan_id, 'paddle_checkout_id' => $event->checkout_id,
            'paddle_subscription_id' => $event->subscription_id, 'amount' => $event->unit_price,
            'interval' => $interval, 'start_date' => $event->event_time, 'next_payment_date' => $event->next_bill_date,
            'paddle_update_url' => $event->update_url, 'paddle_cancel_url' => $event->cancel_url,
            'status' => '1','owner_id' => $owner_id, 'updated_at' => date('Y-m-d H:i:s')
        ];

        DB::table('subscriptions')->insert($query);

        //DB::table('users')->where('id', $owner_id)->update(['credits' => '1']);

        Telegram::send_notification("New ".env('APP_NAME')." Subscription\nAmount: ".
              $event->unit_price."\nCurrency: ".$event->currency);

    }
}
