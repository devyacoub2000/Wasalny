@extends('user.app')

@section('title', __('front.myorders'))

@section('css')
<style type="text/css">
    .myorders {
        text-align: center;
        margin-bottom: 25px;
        letter-spacing: 2px;
        word-spacing: 2px;
        font-weight: bold;
        font-size: 25p;
        cursor: pointer;
        margin-top: 5px;

    }
</style>
@endsection

@section('content')

<h1 class="myorders"> {{ __('front.myorders') }}</h1>

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
            @forelse($myorders as $item)
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
                    <form class="d-inline" action="{{ route('front.cancel_order', $item->id) }}" method="POST"
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

@endsection