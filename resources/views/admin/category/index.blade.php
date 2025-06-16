@extends('admin.master')

@section('title', 'index')

@section('content')
@if(session('msg'))
<div class="alert alert-{{session('type')}} alert-dismissible fade show" role="alert">
    {{session('msg')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<h1 class="h3 mb-4 text-gray-800">{{__('admin.cat')}}</h1>
<table class="table table-bordered table-hover">
    <tr class="bg-dark text-white">
        <th>#</th>
        <th>{{__('admin.img')}}</th>
        <th>{{__('admin.name')}}</th>
        <th>{{__('admin.execl_file')}}</th>
        <th>Action</th>
    </tr>

    @forelse($data as $item)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td><img src="{{$item->Img_Path}}" width="100px" height="100px" style="object-fit: cover;"></td>
        <td>{{$item->Trans_Name}}</td>
        <td>
            @if($item->execl_file)
            <a href="{{ asset('excels/' . $item->execl_file) }}" target="_blank">
                {{ $item->execl_file }}</a>
            @else
            <span class="text-muted"> {{__('admin.notFound')}} </span>
            @endif
        </td>

        <td>
            <a href="{{route('admin.category.edit', $item->id)}}" class="btn btn-info"> <i class="fas fa-edit"></i>
            </a>
            <form class="d-inline" action="{{route('admin.category.destroy', $item->id)}}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" onclick="return confirm('Are u Sure ?')"> <i class="fas fa-trash"></i></button>
            </form>
        </td>
    </tr>

    @empty

    <tr>
        <td colspan="5" class="text-center"> {{__('admin.notFound')}}</td>
    </tr>

    @endforelse
</table>

{{$data->links()}}

@endsection