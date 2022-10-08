<?php

namespace App\Listeners\Paddle;

use Illuminate\Support\Facades\DB;
use ProtoneMedia\LaravelPaddle\Events\SubscriptionPaymentSucceeded;
use App\Libs\Telegram;

class PaddlePaymentSuccess
{
    public function handle(SubscriptionPaymentSucceeded $event) {

        $this->save_invoice($event);

        if ($event->initial_payment == false){
            $this->subscription_renewal($event);
        }
    }

    function save_invoice($event){
        $user_id = $event->passthrough;

        $invoice_exists = DB::table('invoices')
            ->where('paddle_subscription_payment_id', $event->subscription_payment_id)->exists();

        if ($invoice_exists){
            print "Invoice entry already processed.";
            return;
        }

        $query = [
            'paddle_order_id' => $event->order_id, 'paddle_subscription_payment_id' => $event->subscription_payment_id,
            'paddle_subscription_plan_id' => $event->subscription_plan_id, 'paddle_checkout_id' => $event->checkout_id,
            'paddle_receipt_url' => $event->receipt_url,
            'paddle_subscription_id' => $event->subscription_id, 'owner_id' => $user_id,
            'amount' => $event->unit_price, 'paddle_payment_method' => $event->payment_method,
            'payment_provider' => 'Paddle', 'status' => '1',
            'paddle_event_time' => $event->event_time, 'created_at' => date('Y-m-d H:i:s')
        ];

        DB::table('invoices')->insert($query);

    }

    function subscription_renewal($event){

        $sub_exist = DB::table('subscriptions')
            ->where('paddle_subscription_id', $event->subscription_id)->exists();

        if ($sub_exist){
            print "subscription does not exist. ID: " . $event->subscription_id;
            return;
        }

        $query = [
            'amount' => $event->unit_price, 'end_date' => $event->next_bill_date,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        DB::table('subscriptions')->where('paddle_subscription_id', $event->subscription_id)->update($query);
    }
}
