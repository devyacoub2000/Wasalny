@extends('user.app')

@section('title', __('front.services'))

@section('css')
<style type="text/css">
    .img_category {
        width: 100%;
        height: 180px;
        object-fit: cover;
        border-bottom: 1px solid #e2e8f0;
        border-radius: 20px;
    }

    .service-card p {
        margin-top: 1rem;
        font-size: 1.2rem;
        font-weight: 700;
        color: #2d3748;
        padding: 0 1rem;
        font-family: "Noto Sans Arabic", "Plus Jakarta Sans", sans-serif;
        cursor: pointer;

    }

    .empty {
        text-align: center;
        font-weight: bold;
        font-size: 30px;
        cursor: pointer;
        letter-spacing: 2px;

    }
</style>
@endsection
@section('content')

<div class="layout-content-container">
    <div class="flex flex-wrap gap-2 p-4">
        <a class="text-[#49739c] text-base font-medium leading-normal" href="#">{{__('front.services')}}</a>
        <span class="text-[#49739c] text-base font-medium leading-normal">/</span>

        <span class="text-[#0d141c] text-base font-medium leading-normal" style="cursor: pointer;">
            {{$data->Trans_Name}}</span>
    </div>


    <form action="{{ route('front.service.request', $data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        @foreach($data->custome_fields as $field)
        <div class="mb-3">
            <label class="block font-semibold mb-1">{{ $field->Trans_Label }} @if($field->required) * @endif</label>

            @switch($field->type)
            @case('text')
            <input type="text" name="fields[{{ $field->name }}]"
                class="form-control" {{ $field->required ? 'required' : '' }}>
            @break

            @case('date')
            <input type="date" name="fields[{{ $field->name }}]"
                class="form-control" {{ $field->required ? 'required' : '' }}>
            @break

            @case('time')
            <input type="time" name="fields[{{ $field->name }}]"
                class="form-control" {{ $field->required ? 'required' : '' }}>
            @break

            @case('number')
            <input type="number" name="fields[{{ $field->name }}]"
                class="form-control" {{ $field->required ? 'required' : '' }}>
            @break

            @case('file')
            <input type="file" name="fields[{{ $field->name }}]"
                class="form-control" {{ $field->required ? 'required' : '' }}>
            @break

            @case('select')
            <select name="fields[{{ $field->name }}]" class="form-control" {{ $field->required ? 'required' : '' }}>
                <option value="">{{__('front.select')}}</option>
                @if(is_array($field->Trans_Options) && count($field->Trans_Options))

                @foreach($field->Trans_Options as $option)
                <option value="{{ $option }}">{{ $option }}</option>
                @endforeach
                @endif
            </select>
            @break

            @case('checkbox')
            @if(is_array($field->Trans_Options) && count($field->Trans_Options))

            @foreach($field->Trans_Options as $option)
            <label class="mr-3">
                <input type="checkbox" name="fields[{{ $field->name }}][]" value="{{ $option }}">
                {{ $option }}
            </label>
            @endforeach
            @endif
            @break

            @case('radio')
            @if(is_array($field->Trans_Options) && count($field->Trans_Options))
            @foreach($field->Trans_Options as $option)
            <label class="mr-3">
                <input type="radio" name="fields[{{ $field->name }}]" value="{{ $option }}"
                    {{ $field->required ? 'required' : '' }}>
                {{ $option }}
            </label>
            @endforeach
            @endif
            @break

            @default
            <input type="text" name="fields[{{ $field->name }}]"
                class="form-control" {{ $field->required ? 'required' : '' }}>
            @endswitch
        </div>
        @endforeach


        @if(count($data->custome_fields) > 0)
        <button type="submit" class="btn btn-primary"> {{__('front.sendOrder')}} </button>
        @endif


    </form>

</div>
@endsection