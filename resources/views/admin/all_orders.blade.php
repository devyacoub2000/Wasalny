@extends('admin.master')

@section('title', __('admin.orders'))

@section('content')
@if(session('msg'))
<div class="alert alert-{{session('type')}} alert-dismissible fade show" role="alert">
    {{session('msg')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<h1 class="h3 mb-4 text-gray-800">{{__('admin.orders')}}</h1>
<div class="table-responsive">
    <table class="table table-bordered text-center align-middle table-striped shadow-sm">
        <thead class="thead-dark bg-dark text-white">
            <tr>
                <th>#</th>
                <th>{{ __('front.serviceName') }}</th>
                <th>{{ __('front.details_orders') }}</th>
                <th>{{ __('front.date_order') }}</th>

                <th>{{ __('admin.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->service->Trans_Name ?? '-' }}</td>

                <td>
                    <ul class="list-unstyled text-start">
                        @foreach(json_decode($item->data, true) as $key => $value)
                        @php
                        $field = \App\Models\CustomeFields::where('name', $key)->where('service_id', $item->service_id)->first();
                        @endphp

                        @if($field)
                        <li>
                            <strong>{{ $field->Trans_Label }}:</strong>
                            @if(is_array($value))
                            {{ implode(', ', $value) }}
                            @else
                            @php
                            // إذا كان هذا الحقل فيه خيارات ونوعه يتطلب ترجمة الخيارات (مثل select, checkbox, radio)
                            $translatedOptions = $field->Trans_Options;
                            $translatedValue = $translatedOptions[$value] ?? $value;
                            @endphp
                            {{ $translatedValue }}
                            @endif
                        </li>
                        @else
                        <li><strong>{{ $key }}:</strong> {{ is_array($value) ? implode(', ', $value) : $value }}</li>
                        @endif
                        @endforeach
                    </ul>
                </td>


                <td>
                    {{$item->created_at->format('Y-m-d-H:i')}}
                </td>



                <td>
                    <form class="d-inline" action="{{ route('admin.delete_canecel', $item->id) }}" method="POST"
                        onsubmit="return confirm('{{ __('admin.confirm_delete') }}');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" title="{{ __('admin.delete') }}">
                            {{ __('front.cancel') }} <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center text-muted">{{ __('front.notFoundOrders') }}</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{$data->links()}}

@endsection