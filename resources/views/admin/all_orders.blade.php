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

<h1 class="h3 mb-4 text-gray-800">{{ __('admin.orders') }}</h1>

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
                        <li>
                            <strong>{{ $field->Trans_Label ?? $key }}:</strong>

                            @if(is_array($value))
                            {{ implode(', ', $value) }}
                            @elseif(isset($field) && $field->type === 'file')
                            @php
                            $ext = pathinfo($value, PATHINFO_EXTENSION);
                            $filePath = asset('storage/uploads/orders/' . $value);
                            @endphp

                            @if(in_array($ext, ['jpg', 'jpeg', 'png', 'gif']))
                            <br><img src="{{ $filePath }}" alt="Image" style="max-width: 80px; max-height: 80px; border-radius: 8px;">
                            @elseif(in_array($ext, ['mp3', 'wav']))
                            <br><audio controls style="margin-top: 5px;">
                                <source src="{{ $filePath }}" type="audio/{{ $ext }}">
                                {{ __('front.noSupport') }}
                            </audio>
                            @elseif($ext === 'pdf')
                            <br><a href="{{ $filePath }}" target="_blank">📄 {{ __('front.viewPDF') }}</a>
                            @elseif($ext === 'txt')
                            <br><a href="{{ $filePath }}" target="_blank">📄 {{ __('front.viewTextFile') }}</a>
                            @else
                            <br><a href="{{ $filePath }}" target="_blank">📁 {{ __('front.downloadFile') }}</a>
                            @endif

                            @elseif(isset($field) && in_array($field->type, ['select', 'radio', 'checkbox']))
                            @php
                            $translatedValue = $field->Trans_Options[$value] ?? $value;
                            @endphp
                            {{ $translatedValue }}
                            @else
                            {{ $value }}
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </td>

                <td>{{ $item->created_at->format('Y-m-d H:i') }}</td>

                <td>
                    <form class="d-inline" action="{{ route('admin.delete_request_orders', $item->id) }}" method="POST"
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
                <td colspan="5" class="text-center text-muted">{{ __('front.notFoundOrders') }}</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{ $data->links() }}

@endsection