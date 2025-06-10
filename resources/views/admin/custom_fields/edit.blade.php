@extends('admin.master')

@section('title', __('admin.edit'))

@section('content')

<h1 class="h3 mb-4 text-gray-800">{{ __('admin.fields') }} {{ __('admin.edit') }}</h1>

@php
$label = json_decode($customeField->label, true) ?? ['en' => '', 'ar' => ''];
$options = json_decode($customeField->options ?? '{}', true);
$options_en = old('options_en', $options['en'] ?? []);
$options_ar = old('options_ar', $options['ar'] ?? []);
$maxOptions = max(count($options_en), count($options_ar));
@endphp

<form action="{{ route('admin.custome_fields.update', $customeField->id) }}" method="POST">
    @csrf
    @method('put')

    <div class="form-group">
        <label for="service_id">{{ __('admin.service') }}</label>
        <select name="service_id" id="service_id" class="form-control @error('service_id') is-invalid @enderror" required>
            <option value="">{{ __('admin.choose_service') }}</option>
            @foreach ($services as $service)
            <option value="{{ $service->id }}" {{ $service->id == old('service_id', $customeField->service_id) ? 'selected' : '' }}>
                {{ $service->Trans_Name }}
            </option>
            @endforeach
        </select>
        @error('service_id')
        <small class="invalid-feedback">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <label for="label_en">{{ __('admin.label') }} En</label>
        <input type="text" value="{{ old('label_en', $label['en']) }}" name="label_en" class="form-control @error('label_en') is-invalid @enderror" id="label_en" required>
        @error('label_en')
        <small class="invalid-feedback">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <label for="label_ar">{{ __('admin.label') }} Ar</label>
        <input type="text" value="{{ old('label_ar', $label['ar']) }}" name="label_ar" class="form-control @error('label_ar') is-invalid @enderror" id="label_ar" required>
        @error('label_ar')
        <small class="invalid-feedback">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <label for="name">{{ __('admin.field_name') }}</label>
        <input type="text" value="{{ old('name', $customeField->name) }}" name="name" class="form-control @error('name') is-invalid @enderror" id="name" required>
        @error('name')
        <small class="invalid-feedback">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <label for="type">{{ __('admin.field_type') }}</label>
        <select name="type" id="type" class="form-control @error('type') is-invalid @enderror" required>
            @foreach(['text', 'textarea', 'number', 'select', 'checkbox', 'radio', 'date', 'time', 'file'] as $type)
            <option value="{{ $type }}" {{ old('type', $customeField->type) == $type ? 'selected' : '' }}>
                {{ ucfirst($type) }}
            </option>
            @endforeach
        </select>
        @error('type')
        <small class="invalid-feedback">{{ $message }}</small>
        @enderror
    </div>

    <div id="optionsContainer" style="display: none;">
        <label>{{ __('admin.options') }}</label>
        <div id="optionsWrapper">
            @for ($i = 0; $i < max($maxOptions, 1); $i++)
                <div class="row mb-2">
                <div class="col-md-6">
                    <input type="text" name="options_en[]" class="form-control"
                     placeholder="{{ __('admin.option_en') }}" value="{{ $options_en[$i] ?? '' }}">
                </div>
                <div class="col-md-6">
                    <input type="text" name="options_ar[]" class="form-control"
                     placeholder="{{ __('admin.option_ar') }}" value="{{ $options_ar[$i] ?? '' }}">
                </div>
        </div>
        @endfor
    </div>
    <button type="button" class="btn btn-sm btn-secondary" onclick="addOptionInput()">+ {{ __('admin.addOption') }}</button>
    </div>

    <div class="form-group mt-3">
        <label for="required">{{ __('admin.is_required') }}</label>
        <select name="required" id="required" class="form-control">
            <option value="1" {{ old('required', $customeField->required) == 1 ? 'selected' : '' }}>{{ __('admin.yes') }}</option>
            <option value="0" {{ old('required', $customeField->required) == 0 ? 'selected' : '' }}>{{ __('admin.no') }}</option>
        </select>
    </div>

    <button type="submit" class="btn btn-info mt-3">
        <i class="fas fa-edit"></i> {{ __('admin.submit') }}
    </button>
</form>

@endsection

@section('js')
<script>
    function addOptionInput() {
        const wrapper = document.getElementById('optionsWrapper');
        const row = document.createElement('div');
        row.className = 'row mb-2';

        const colEn = document.createElement('div');
        colEn.className = 'col-md-6';
        colEn.innerHTML = `<input type="text" name="options_en[]" class="form-control" placeholder="{{ __('admin.option_en') }}">`;

        const colAr = document.createElement('div');
        colAr.className = 'col-md-6';
        colAr.innerHTML = `<input type="text" name="options_ar[]" class="form-control" placeholder="{{ __('admin.option_ar') }}">`;

        row.appendChild(colEn);
        row.appendChild(colAr);
        wrapper.appendChild(row);
    }

    document.getElementById('type').addEventListener('change', function() {
        const optionsContainer = document.getElementById('optionsContainer');
        if (['select', 'checkbox', 'radio'].includes(this.value)) {
            optionsContainer.style.display = 'block';
        } else {
            optionsContainer.style.display = 'none';
            document.getElementById('optionsWrapper').innerHTML = `
                <div class="row mb-2">
                    <div class="col-md-6">
                        <input type="text" name="options_en[]" class="form-control" placeholder="{{ __('admin.option_en') }}">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="options_ar[]" class="form-control" placeholder="{{ __('admin.option_ar') }}">
                    </div>
                </div>
            `;
        }
    });

    window.addEventListener('DOMContentLoaded', function() {
        const currentType = document.getElementById('type').value;
        if (['select', 'checkbox', 'radio'].includes(currentType)) {
            document.getElementById('optionsContainer').style.display = 'block';
        }
    });
</script>
@endsection