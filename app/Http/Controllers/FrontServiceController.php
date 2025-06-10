<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceRequest;
use App\Models\Service;

class FrontServiceController extends Controller
{

    public function store_request(Request $request, $id)
    {
        $service = Service::with('custome_fields')->findOrFail($id);

        $validatedData = [];
        foreach ($service->custome_fields as $field) {
            $fieldName = 'fields.' . $field->name;

            if ($field->type === 'file') {
                if ($field->required) {
                    $request->validate([$fieldName => 'required|file']);
                }

                if ($request->hasFile($fieldName)) {
                    $file = $request->file($fieldName);
                    $path = $file->store('uploads', 'public');
                    $validatedData[$field->name] = $path;
                }
            } elseif ($field->type === 'checkbox') {
                $validatedData[$field->name] = $request->input($fieldName, []);
            } else {
                if ($field->required) {
                    $request->validate([$fieldName => 'required']);
                }
                $validatedData[$field->name] = $request->input($fieldName);
            }
        }

        ServiceRequest::create([
            'user_id' => auth()->id(),
            'service_id' => $service->id,
            'data' => json_encode($validatedData, JSON_UNESCAPED_UNICODE),
        ]);

        return redirect()->back()->with('msg', __('front.msgRequest'))
            ->with('type', 'success');
    }
}
