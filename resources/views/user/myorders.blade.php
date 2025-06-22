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
        font-size: 25px;
        cursor: pointer;
        margin-top: 5px;
    }

    .preview-img {
        max-width: 80px;
        max-height: 80px;
        border-radius: 8px;
    }

    .preview-audio,
    .preview-pdf,
    .preview-txt {
        display: block;
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
                            <br><img src="{{ $filePath }}" class="preview-img" alt="Image">
                            @elseif(in_array($ext, ['mp3', 'wav']))
                            <audio class="preview-audio" controls>
                                <source src="{{ $filePath }}" type="audio/{{ $ext }}">
                                {{ __('front.noSupport') }}
                            </audio>
                            @elseif($ext === 'pdf')
                            <a class="preview-pdf text-primary" href="{{ $filePath }}" target="_blank">📄 {{ __('front.viewPDF') }}</a>
                            @elseif($ext === 'txt')
                            <a class="preview-txt text-secondary" href="{{ $filePath }}" target="_blank">📄 {{ __('front.viewTextFile') }}</a>
                            @else
                            <a href="{{ $filePath }}" target="_blank">📁 {{ __('front.downloadFile') }}</a>
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
                <td colspan="5" class="text-center text-muted">{{ __('front.notFoundOrders') }}</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection