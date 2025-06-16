<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ServiceRequest;
use App\Jobs\SendWhatsAppMessage;

class ScheduleWhatsAppMessages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'whatsapp:schedule';
    protected $description = 'جدولة إرسال رسائل واتساب مع تأخير 5 دقائق بين كل واحدة';

    /**
     * The console command description.
     *
     * @var string
     */

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $requests = ServiceRequest::where('status', 'pending')->get();
        $delayMinutes = 0;

        foreach ($requests as $request) {
            SendWhatsAppMessage::dispatch($request)->delay(now()->addMinutes($delayMinutes));
            $delayMinutes += 5;
        }

        $this->info('تمت جدولة جميع الرسائل');
    }
}
