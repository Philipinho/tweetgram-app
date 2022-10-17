<?php

namespace App\Libs;

use GuzzleHttp\Client;

class Telegram {
    public static function send_notification($message){
        $tg_admin_id = env('TELEGRAM_ADMIN_ID');
        $bot_token = env('TELEGRAM_BOT_TOKEN');

        $client = new Client();


        try {

            $client->request("GET", "https://api.telegram.org/bot{$bot_token}/sendMessage", [
                'verify' => false,
                'form_params' => [
                    'chat_id' => $tg_admin_id,
                    'text' => $message,
                    ]]);

        } catch (\Exception $e){
            echo $e->getMessage();
        }
  }

}
