<?php

namespace App\Http\Controllers;

use App\Libs\Helpers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class SubscriptionController
{

    public function upgrade()
    {
        if (Helpers::isPremium()){
            flash()->success("You are already a premium subscriber.");
            return Redirect::to('/dashboard');
        }
       // $user = DB::table('users')->where('id',  Auth::id())->first();

        $userInfo = array('plan' => 'Free', 'title' => "Upgrade");

        return view('payment.upgrade')->with($userInfo);
    }

    public function checkout($checkout_id){

        if (isset($checkout_id)) {
            $sub_exist = DB::table('subscriptions')
                ->where('paddle_checkout_id', $checkout_id)->exists();

            if($sub_exist){
                flash()->success("Payment was successful. Hurray! You are now a premium user.");
                return Redirect::to('/dashboard');
            } else {
                flash()->success("Payment is processing.");
                return Redirect::to('/dashboard');
            }
        }

        flash()->error("Something went wrong. Please contact support if this error persists.");
        return Redirect::to('/dashboard');
    }

    public function invoices()
    {

        $invoices = DB::table('invoices')->where('owner_id', Auth::id())->get();
        $invoice_data = array('invoices' => $invoices);

        return view("subscriptions")->with($invoice_data);
    }

}
