<?php

namespace App\Http\Controllers;

use App\Jobs\SendWhatsappMessage;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Service;
use App\Models\ServiceRequest;
use App\Jobs\SendWhatsappJob; // هنستخدمه بعد شوي
use Illuminate\Http\Request;
use App\Services\ServiceRequestHandler;



class FrontServiceController extends Controller
{
    public function store_request(Request $request, $id, ServiceRequestHandler $handler)
    {
        $service = Service::with(['custome_fields', 'category'])->findOrFail($id);

        $validatedData = [];

        foreach ($service->custome_fields as $field) {
            $fieldName = 'fields.' . $field->name;

            if ($field->type === 'file') {
                // التحقق من وجود الملف ونوعه
                $rules = 'file|mimes:jpg,jpeg,png,pdf,mp3,txt';
                if ($field->required) {
                    $rules = 'required|' . $rules;
                }
                $request->validate([$fieldName => $rules]);

                if ($request->hasFile($fieldName)) {
                    $file = $request->file($fieldName);
                    $filename = time() . '_' . $file->getClientOriginalName();
                    $file->storeAs('uploads/orders', $filename, 'public');
                    $validatedData[$field->name] = $filename;
                }
            } elseif ($field->type === 'checkbox') {
                // نأخذ مصفوفة الخيارات (إن لم تكن موجودة نُعيدها كمصفوفة فارغة)
                $validatedData[$field->name] = $request->input($fieldName, []);
            } else {
                // الحقول النصية أو select أو radio
                if ($field->required) {
                    $request->validate([$fieldName => 'required']);
                }
                $validatedData[$field->name] = $request->input($fieldName);
            }
        }

        // حفظ الطلب
        $serviceRequest = ServiceRequest::create([
            'user_id' => auth()->id(),
            'service_id' => $service->id,
            'data' => json_encode($validatedData, JSON_UNESCAPED_UNICODE),
        ]);

        // تنفيذ المعالجة وإرسال الطلب عبر واتساب
        $handler->handleNewRequest($serviceRequest);

        return redirect()->back()->with('msg', __('front.msgRequest'))->with('type', 'success');
    }
}
