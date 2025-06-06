@extends('admin.master')

@section('title', __('admin.addFields'))

@section('content')

<h1 class="h3 mb-4 text-gray-800">{{__('admin.create_F')}}</h1>

<form action="{{ route('admin.custome_fields.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="service_id">{{ __('admin.service') }}</label>
        <select name="service_id" id="service_id" class="form-control @error('service_id') is-invalid @enderror" required>
            <option value="">{{ __('admin.choose_service') }}</option>
            @foreach ($services as $service)
                <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
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
        <input type="text" name="label_en" id="label_en" value="{{ old('label_en') }}" required
               class="form-control @error('label_en') is-invalid @enderror"
               placeholder="{{ __('admin.placeholder_label_en') }}">
        @error('label_en')
            <small class="invalid-feedback">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <label for="label_ar">{{ __('admin.label') }} Ar</label>
        <input type="text" name="label_ar" id="label_ar" value="{{ old('label_ar') }}" required
               class="form-control @error('label_ar') is-invalid @enderror"
               placeholder="{{ __('admin.placeholder_label_ar') }}">
        @error('label_ar')
            <small class="invalid-feedback">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <label for="name">{{ __('admin.field_name') }}</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required
               class="form-control @error('name') is-invalid @enderror"
               placeholder="{{ __('admin.placeholder_field_name') }}">
        @error('name')
            <small class="invalid-feedback">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <label for="type">{{ __('admin.field_type') }}</label>
        <select name="type" id="type" class="form-control @error('type') is-invalid @enderror" required>
            <option value="text" {{ old('type') == 'text' ? 'selected' : '' }}>Text</option>
            <option value="textarea" {{ old('type') == 'textarea' ? 'selected' : '' }}>Textarea</option>
            <option value="number" {{ old('type') == 'number' ? 'selected' : '' }}>Number</option>
            <option value="select" {{ old('type') == 'select' ? 'selected' : '' }}>Select</option>
            <option value="checkbox" {{ old('type') == 'checkbox' ? 'selected' : '' }}>Checkbox</option>
            <option value="radio" {{ old('type') == 'radio' ? 'selected' : '' }}>Radio</option>
            <option value="date" {{ old('type') == 'date' ? 'selected' : '' }}>Date</option>
            <option value="time" {{ old('type') == 'time' ? 'selected' : '' }}>Time</option>
            <option value="file" {{ old('type') == 'file' ? 'selected' : '' }}>File</option>
        </select>
        @error('type')
            <small class="invalid-feedback">{{ $message }}</small>
        @enderror
    </div>

    <div id="optionsContainer" style="display: none;">
        <label>{{ __('admin.options') }}</label>
        <div id="optionsWrapper">
            <input type="text" name="options[]" class="form-control mb-2" placeholder="{{ __('admin.placeholder_options') }}">
        </div>
        <button type="button" class="btn btn-sm btn-secondary" onclick="addOptionInput()">+ {{ __('admin.addOption') }}</button>
    </div>

    <div class="form-group mt-3">
        <label for="required">{{ __('admin.is_required') }}</label>
        <select name="required" id="required" class="form-control @error('required') is-invalid @enderror">
            <option value="1" {{ old('required') == '1' ? 'selected' : '' }}>{{ __('admin.yes') }}</option>
            <option value="0" {{ old('required') == '0' ? 'selected' : '' }}>{{ __('admin.no') }}</option>
        </select>
        @error('required')
            <small class="invalid-feedback">{{ $message }}</small>
        @enderror
    </div>

    <button type="submit" class="btn btn-success mt-3">
        <i class="fas fa-save"></i> {{ __('admin.submit') }}
    </button>
</form>

@endsection

@section('js')
<script>
    function addOptionInput() {
        const wrapper = document.getElementById('optionsWrapper');
        const input = document.createElement('input');
        input.type = 'text';
        input.name = 'options[]';
        input.className = 'form-control mb-2';
        input.placeholder = "{{ __('admin.placeholder_options') }}";
        wrapper.appendChild(input);
    }

    document.getElementById('type').addEventListener('change', function () {
        const optionsContainer = document.getElementById('optionsContainer');
        if (['select', 'checkbox', 'radio'].includes(this.value)) {
            optionsContainer.style.display = 'block';
        } else {
            optionsContainer.style.display = 'none';
            document.getElementById('optionsWrapper').innerHTML = `
                <input type="text" name="options[]" class="form-control mb-2" placeholder="{{ __('admin.placeholder_options') }}">
            `;
        }
    });
</script>
@endsection
