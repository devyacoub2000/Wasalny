<?php

namespace App\Jobs;

use App\Services\WhatsappService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Bus\Dispatchable;

class SendWhatsappMessage implements ShouldQueue
{
    use Queueable, InteractsWithQueue, SerializesModels, Dispatchable;

    protected $phone;
    protected $message;
    protected $index; // ← لتحديد أي رقم (instance) نستخدم

    public function __construct($phone, $message, $index)
    {
        $this->phone = $phone;
        $this->message = $message;
        $this->index = $index;
    }

    public function handle(WhatsappService $whatsapp)
    {
        // sleep(15); // ← تأخير 15 ثانية لكل رسالة
        $whatsapp->sendMessage($this->phone, $this->message, $this->index);
    }
}
