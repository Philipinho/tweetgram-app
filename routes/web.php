<?php

use App\Http\Controllers\SocialAuth\InstagramAuthController;
use App\Http\Controllers\SocialAuth\TwitterAuthController;
use App\Http\Controllers\SocialAuth\TwitterPKCEController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\UpdateAccountController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('homepage');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');


Route::group(['middleware' => 'auth'], function () {
//Instagram Auth

    Route::get('/instagram/auth',[InstagramAuthController::class,'redirectToInstagramProvider'])->name("redirectToInstagramProvider");
    Route::get('/instagram/callback',[InstagramAuthController::class,'instagramProviderCallback'])->name("instagramProviderCallback");

//Twitter Auth
    Route::get('/twitter/auth',[TwitterAuthController::class,'redirectToTwitterProvider'])->name("redirectToTwitterProvider");
    Route::get('/twitter/callback',[TwitterAuthController::class,'twitterProviderCallback'])->name("twitterProviderCallback");

//    Route::get('/twitter/auth',[TwitterPKCEController::class,'redirectToTwitterProvider'])->name("redirectToTwitterProvider");
 //   Route::get('/twitter/callback',[TwitterPKCEController::class,'twitterProviderCallback'])->name("twitterProviderCallback");

    Route::get('/upgrade', [SubscriptionController::class, 'upgrade'])->name("upgrade");
    Route::get('checkout/{id}', [SubscriptionController::class, 'checkout'])->prefix("payment")->name('checkout');
    Route::get('/invoice', [SubscriptionController::class, 'invoices'])->name("invoice");

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name("dashboard");

    Route::get('/profile', [UpdateAccountController::class, 'show'])->name("profile");
    Route::put('/profile', [UpdateAccountController::class, 'update_info'])->name('update_profile');
    Route::put('/profile', [UpdateAccountController::class, 'update_password'])->name("update_password");


    Route::get('/changeStatus', [DashboardController::class, 'changeStatus'])->name("changeStatus");

    Route::get('/terms', [PageController::class, 'terms'])->name("terms");
    Route::get('/privacy', [PageController::class, 'privacy'])->name("privacy");

});

require __DIR__.'/auth.php';
