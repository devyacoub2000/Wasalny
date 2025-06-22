<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WhatsappService
{
    protected $instances;

    public function __construct()
    {
        // إعداد 3 حسابات UltraMsg
        $this->instances = [
            [
                'instance_id' => config('services.ultramsg1.instance_id'),
                'token'       => config('services.ultramsg1.token'),
            ],
            [
                'instance_id' => config('services.ultramsg2.instance_id'),
                'token'       => config('services.ultramsg2.token'),
            ],
            [
                'instance_id' => config('services.ultramsg3.instance_id'),
                'token'       => config('services.ultramsg3.token'),
            ],
        ];
    }

    public function sendMessage($to, $message, $index)
    {
        // توزيع الرسائل على 3 instance بالتناوب
        $selected = $this->instances[$index % count($this->instances)];

        $url = "https://api.ultramsg.com/{$selected['instance_id']}/messages/chat";

        Http::post($url, [
            'token' => $selected['token'],
            'to'    => $to,
            'body'  => $message,
        ]);
    }
}
