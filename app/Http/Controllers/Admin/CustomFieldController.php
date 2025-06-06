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
            $request->validate([
                'service_id' => 'required',
                'label_en'      => 'required',
                'label_ar'      => 'required',
                'name'       => 'required',
                'type' => 'required|in:text,textarea,number,date,time,file,checkbox,select,radio',
                'options'    => 'nullable|array',
                'required'   => 'required',
            ]);

            $label = [ 
                'en' => $request->label_en,
                'ar' => $request->label_ar,
            ];

            $data = [
                'service_id' => $request->service_id,
                'label'      => json_encode($label, JSON_UNESCAPED_UNICODE),
                'name'       => $request->name,
                'type'       => $request->type,
                'required'   => $request->required,
            ];

            if (in_array($request->type, ['select', 'checkbox', 'radio']) && $request->has('options')) {
                $data['options'] = json_encode(array_filter($request->options));
            } else {
                $data['options'] = null;
            }

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
    $label = [
        'en' => $request->label_en,
        'ar' => $request->label_ar,
    ];

    $data = [
        'service_id' => $request->service_id,
        'label'      => json_encode($label, JSON_UNESCAPED_UNICODE),
        'name'       => $request->name,
        'type'       => $request->type,
        'required'   => $request->required == 1 ? true : false,
        'options'    => null,
    ];

    if (in_array($request->type, ['select', 'checkbox', 'radio']) && is_array($request->options)) {
        $filteredOptions = array_filter($request->options, fn($opt) => trim($opt) !== '');
        $data['options'] = json_encode(array_values($filteredOptions), JSON_UNESCAPED_UNICODE);
    }

    $customeField->update($data);

    return redirect()->route('admin.custome_fields.index')->with('msg', __('admin.formFieldEdit'))->with('type', 'info');
}


    public function destroy(CustomeFields $customeField)
    {
        $customeField->delete();
        return redirect()->route('admin.custome_fields.index')
        ->with('msg', __('admin.formFieldDele'))
        ->with('type', 'danger');
    }
}
