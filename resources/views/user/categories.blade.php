@extends('user.app')

@section('title', __('front.cats'))

@section('css')
<style type="text/css">
    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
        gap: 2rem;
        margin-top: 2.5rem;
    }

    .service-card {
        background: linear-gradient(to bottom, #ffffff, #f9fafb);
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.06);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        text-align: center;
        padding-bottom: 1rem;
        border: 1px solid #e2e8f0;
    }

    .service-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 10px 24px rgba(0, 0, 0, 0.08);
    }

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

    .services-header h1 {
        font-size: 2.25rem;
        font-weight: 800;
        color: #1a202c;
        margin-bottom: 1rem;
        text-align: start;
        cursor: pointer;
    }

    @if(app()->currentLocale()=='ar') .services-header h1,
    .service-card p {
        text-align: right !important;
    }

    @endif
</style>
@endsection

@section('content')

<div class="layout-content-container">
    <div class="services-header">
        <h1 style="cursor: pointer; font-weight:bold"> {{__('front.CatsDiscover')}}</h1>
    </div>

    <div class="services-grid">
        @foreach(App\Models\Category::latest('id')->get() as $item)
        <div class="service-card">
            <a href="{{route('front.category_service', $item->id)}}">
                <img src="{{$item->Img_Path}}" class="img_category" alt="">
                <p> {{$item->Trans_Name}} </p>
            </a>
        </div>
        @endforeach
    </div>
</div>

@endsection