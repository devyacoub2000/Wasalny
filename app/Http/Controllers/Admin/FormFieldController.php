<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomField;
use App\Models\Service;

class FormFieldController extends Controller
{
    public function index()
    {
        $data = CustomField::latest()->paginate();
        return view('admin.form_fields.index', compact('data'));
    }

    public function create()
    {
        $data = Service::select('id', 'name')->get();
        return view('admin.form_fields.create', compact('data'));
    }

    public function store(Request $request)
    {
          $request->validate([
            'service_id' => 'required|exists:services,id',
            'fields' => 'required|array',
            'fields.*.label' => 'required|string|max:255',
            'fields.*.name' => 'required|string|max:255|alpha_dash',
            'fields.*.type' => 'required|in:text,number,select,checkbox,radio,date,time,file,textarea',
            'fields.*.options' => 'nullable|string',
            'fields.*.is_required' => 'nullable|boolean',
        ]);

        foreach ($request->fields as $field) {
            CustomField::create([
                'service_id' => $request->service_id,
                'label' => $field['label'],
                'name' => $field['name'],
                'type' => $field['type'],
                'options' => $field['options'] ?? null,
                'is_required' => isset($field['is_required']),
            ]);
        }
        return redirect()->route('admin.form-fields.index')
            ->with('msg', __('admin.formFieldAdded'))
            ->with('type', 'success');
    }

    public function edit(CustomField $customField)
    {
        $data = Service::select('id', 'name')->get();
        return view('admin.form_fields.edit', compact('customField', 'data'));
    }

    public function update(Request $request, CustomField $customField)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'label' => 'required|string|max:255',
            'name' => "required|string|max:255|alpha_dash|unique:custom_fields,name,{$customField->id}",
            'type' => 'required|string|in:text,number,select,checkbox,radio,date,time,file,textarea',
            'options' => 'nullable|string',
            'is_required' => 'nullable|boolean',
        ]);

        $customField->update([
            'service_id' => $request->service_id,
            'label' => $request->label,
            'name' => $request->name,
            'type' => $request->type,
            'options' => $request->options,
            'is_required' => $request->has('is_required'),
        ]);

        return redirect()->route('admin.form-fields.index')
            ->with('msg', __('admin.formFieldEdit'))
            ->with('type', 'info');
    }

    public function destroy(CustomField $customField)
    {
        $customField->delete();

        return redirect()->route('admin.form-fields.index')
            ->with('msg', __('admin.formFieldDele'))
            ->with('type', 'danger');
    }
}
