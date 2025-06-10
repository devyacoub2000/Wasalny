@extends('admin.master')

@section('title', __('admin.fields'))

@section('content')

@if(session('msg'))
<div class="alert alert-{{session('type')}} alert-dismissible fade show" role="alert">
    {{ session('msg') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<h1 class="h3 mb-4 text-gray-800">{{ __('admin.fields') }}</h1>

<div class="table-responsive">
    <table class="table table-bordered text-center align-middle table-striped shadow-sm">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>{{ __('admin.service') }} {{ __('admin.name') }}</th>
                <th>{{ __('admin.label') }}</th>
                <th>{{ __('admin.field_name') }}</th>
                <th>{{ __('admin.field_type') }}</th>
                <th>{{ __('admin.is_required') }}</th>
                <th>{{ __('admin.options') }}</th>
                <th>{{ __('admin.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse($fields as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->service->Trans_Name }}</td>
                <td>{{ $item->Trans_Label }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ ucfirst($item->type) }}</td>
                <td>
                    <span class="badge badge-{{ $item->required ? 'success' : 'secondary' }}">
                        {{ $item->required ? __('admin.yes') : __('admin.no') }}
                    </span>
                </td>
                <td style="text-align: left;">
                    @if(is_array($item->Trans_Options) && count($item->Trans_Options))
                    <ul class="list-unstyled mb-0">
                        @foreach($item->Trans_Options as $option)
                        <li>• {{ $option }}</li>
                        @endforeach
                    </ul>
                    @else
                    <span class="text-muted">—</span>
                    @endif
                </td>

                <td>
                    <a href="{{ route('admin.custome_fields.edit', $item->id) }}" class="btn btn-sm btn-info" title="{{ __('admin.edit') }}">
                        <i class="fas fa-edit"></i>
                    </a>

                    <form class="d-inline" action="{{ route('admin.custome_fields.destroy', $item->id) }}" method="POST" onsubmit="return confirm('{{ __('admin.confirm_delete') }}');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" title="{{ __('admin.delete') }}">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center text-muted">{{ __('admin.notFound') }}</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-center">
    {{ $fields->links() }}
</div>

@endsection