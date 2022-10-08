<?php
namespace App\Http\Controllers;

use App\Libs\Helpers;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{

    public function dashboard()
    {
        //if multi account is implemented, ask users to select the account connection to manage.
        // list accounts by id

        // create box for user to authenticate their instagram and Twitter accounts.
        // I think Twitter should take precision due to it's stable id? doesn't matter.
        // //keep track on row we are working on to avoid duplicates. Probably session of the row id
        // I.e for updating of account.


       // $user = DB::table('sub')->where('id',  Auth::id())->first();

        $account = DB::table('social_accounts')
            ->where('owner_id', Auth::id())->first();


        if(Helpers::isPremium()){
            $plan = "Premium";
        } else{
            $plan = "Free";
        }
        $data = array();

        if ($account){
            $data = array('active' => $account->active, 'insta_username' => $account->insta_username,
                'tw_username' => $account->tw_username, 'plan' => $plan,
                'auto_post' => $account->auto_post, 'remove_hashtags' => $account->remove_hashtags,
                'remove_caption' => $account->remove_caption, 'remove_mentions' => $account->remove_mentions);
        }

        //return view("payment.payment.payment", compact('products','plans'));
        return view('dashboard')->with($data);
    }

    public function changeStatus(Request $request)
    {
        // make it modular, so it can be based on the id of the particular feed

        DB::table('social_accounts')
            ->where('owner_id',  Auth::id())
            ->update([$request->option => $request->status]);

        return response()->json(['success'=>'Status changed successfully.']);
  }

}
