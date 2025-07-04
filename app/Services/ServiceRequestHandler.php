<?php

namespace App\Services;

use App\Models\ServiceRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Jobs\SendWhatsappMessage;

class ServiceRequestHandler
{
    public function handleNewRequest(ServiceRequest $servicerequest)
    {
        $category = $servicerequest->service->category;

        if (!$category->execl_file) {
            return;
        }

        $excelPath = public_path('excels/' . $category->execl_file);

        if (!file_exists($excelPath)) {
            return;
        }

        $collection = Excel::toCollection(null, $excelPath);
        $rows = $collection[0];

        $data = json_decode($servicerequest->data, true);

        $message = "📌 طلب جديد:\n";

        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $value = implode(', ', $value);
            }
            $message .= "$key: $value\n";
        }

        foreach ($rows as $index => $row) {
            $phone = $row['phone'] ?? $row[0];
            if ($phone) {
                $delaySeconds = $index * 180; // كل رسالة تأخير 15 ثانية
                SendWhatsappMessage::dispatch($phone, $message, $index)
                    ->delay(now()->addSeconds($delaySeconds));
            }
        }
    }
}
