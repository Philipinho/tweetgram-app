<?php


namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Rules\MatchCurrentPasswordRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UpdateAccountController extends Controller
{
    public function show(){
        return view("profile");
    }

    public function update_info(Request $request){

        $request->validate([
            'email' => ['required', 'email'],
            'name' => ['required','string','max:255'],
            //'company' => ['nullable','string','max:255'],
        ]);

        auth()->user()->update([
            'email' => $request->get("email"),
            'name' => $request->get("name"),
            //'company' => $request->get("company")
        ]);

        flash()->success("Your profile has been updated successfully!");

        return redirect()->route("profile");
    }

    public function update_password(Request $request){
        $request->validate([
            'current_password' => ['required', new MatchCurrentPasswordRule],
            'password' => ['required','confirmed','min:8'],
        ]);

        auth()->user()->update(['password',Hash::make($request->get("password"))]);
        flash()->success("Password changed successfully");

        return redirect()->route("profile");
    }
}
