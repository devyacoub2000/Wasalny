<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\CustomeFields;

class CustomFieldController extends Controller
{
    public function index()
    {
        $fields = CustomeFields::latest('id')->paginate();
        return view('admin.custom_fields.index', compact('fields'));
    }

    public function create()
    {
        $services = Service::select('id', 'name')->get();
        return view('admin.custom_fields.create', compact('services'));
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'label_en'   => 'required|string|max:255',
            'label_ar'   => 'required|string|max:255',
            'name'       => 'required|string|max:255|unique:custome_fields,name',
            'type'       => 'required|in:text,textarea,number,date,time,file,checkbox,select,radio',
            'options_en' => 'nullable|array',
            'options_ar' => 'nullable|array',
            'required'   => 'required|boolean',
        ]);

        // Prepare labels for both languages
        $label = [
            'en' => $request->label_en,
            'ar' => $request->label_ar,
        ];

        // Prepare options if the type requires them
        $options = null;
        if (in_array($request->type, ['select', 'checkbox', 'radio'])) {
            $options = [
                'en' => array_values(array_filter($request->options_en ?? [])),
                'ar' => array_values(array_filter($request->options_ar ?? [])),
            ];
        }

        // Data to insert
        $data = [
            'service_id' => $request->service_id,
            'label'      => json_encode($label, JSON_UNESCAPED_UNICODE),
            'name'       => $request->name,
            'type'       => $request->type,
            'required'   => $request->required,
            'options'    => $options ? json_encode($options, JSON_UNESCAPED_UNICODE) : null,
        ];

        // Create record
        CustomeFields::create($data);

        return redirect()->route('admin.custome_fields.index')
            ->with('msg', __('admin.formFieldAdded'))
            ->with('type', 'success');
    }


    public function edit(CustomeFields $customeField)
    {
        $services = Service::select('id', 'name')->get();
        return view('admin.custom_fields.edit', compact('services', 'customeField'));
    }

    public function update(Request $request, CustomeFields $customeField)
    {
        // Validation
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'label_en'   => 'required|string|max:255',
            'label_ar'   => 'required|string|max:255',
            'name'       => 'required|string|max:255|unique:custome_fields,name,' . $customeField->id,
            'type'       => 'required|in:text,textarea,number,date,time,file,checkbox,select,radio',
            'options_en' => 'nullable|array',
            'options_ar' => 'nullable|array',
            'required'   => 'required|boolean',
        ]);

        // إعداد الحقول متعددة اللغة
        $label = [
            'en' => $request->label_en,
            'ar' => $request->label_ar,
        ];

        // تهيئة البيانات للتحديث
        $data = [
            'service_id' => $request->service_id,
            'label'      => json_encode($label, JSON_UNESCAPED_UNICODE),
            'name'       => $request->name,
            'type'       => $request->type,
            'required'   => (bool) $request->required,
            'options'    => null,
        ];

        // حفظ الخيارات فقط لأنواع معينة من الحقول
        if (
            in_array($request->type, ['select', 'checkbox', 'radio']) &&
            is_array($request->options_en) && is_array($request->options_ar)
        ) {
            $options = [
                'en' => array_values(array_filter($request->options_en, fn($opt) => trim($opt) !== '')),
                'ar' => array_values(array_filter($request->options_ar, fn($opt) => trim($opt) !== '')),
            ];

            $data['options'] = json_encode($options, JSON_UNESCAPED_UNICODE);
        }

        // تحديث السجل
        $customeField->update($data);

        return redirect()->route('admin.custome_fields.index')
            ->with('msg', __('admin.formFieldEdit'))
            ->with('type', 'info');
    }


    public function destroy(CustomeFields $customeField)
    {
        $customeField->delete();
        return redirect()->route('admin.custome_fields.index')
            ->with('msg', __('admin.formFieldDele'))
            ->with('type', 'danger');
    }
}
