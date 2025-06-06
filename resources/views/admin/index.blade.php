
@extends('admin.master')

@section('title', 'Dashboard')

@section('content')
    <h1 class="h3 mb-4 text-gray-800" style="cursor: pointer;">
   {{__('admin.welcomeDash')}} {{env('APP_NAME')}} </h1>
@endsection