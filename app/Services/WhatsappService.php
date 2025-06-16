<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WhatsappService
{
    public function sendMessage($to, $message)
    {
        $instanceId = config('services.ultramsg.instance_id');
        $token = config('services.ultramsg.token');

        $url = "https://api.ultramsg.com/{$instanceId}/messages/chat";

        Http::post($url, [
            'token' => $token,
            'to'    => $to,
            'body'  => $message,
        ]);
    }
}
