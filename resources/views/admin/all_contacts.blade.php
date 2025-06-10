@extends('admin.master')

@section('title', __('front.conactUs'))

@section('content')
@if(session('msg'))
<div class="alert alert-{{session('type')}} alert-dismissible fade show" role="alert">
    {{session('msg')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<h1 class="h3 mb-4 text-gray-800">{{__('front.conactUs')}}</h1>
<table class="table table-bordered table-hover">
    <tr class="bg-dark text-white">
        <th>#</th>
        <th>{{__('admin.name')}}</th>
        <th>{{__('front.email')}}</th>
        <th>{{__('front.subject')}}</th>
        <th>{{__('front.msg')}}</th>
    </tr>

    @forelse($data as $item)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$item->name}}</td>
        <td>{{$item->email}}</td>
        <td>{{$item->subject}}</td>
        <td>{{$item->msg}}</td>

    </tr>

    @empty

    <tr>
        <td colspan="5" class="text-center"> {{__('admin.notFound')}}</td>
    </tr>

    @endforelse
</table>

{{$data->links()}}

@endsection