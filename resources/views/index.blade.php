@extends('layouts.master')

@section('title', '首頁')

@section('content')
<div class="container">
    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 1"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <a class='btn' href='/newitems'><img src="{{asset('storage/new_items.jpg')}}" class="d-block w-100" alt=""></a>
            </div>
            <div class="carousel-item">
                <a class='btn' href='/Iphone14'><img src="{{asset('storage/carousel_iPhone14.jpg')}}" class="d-block w-100" alt=""></a>
            </div>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<div class="container pt-5">
    <div id='itemblocks' class="row row-cols-3">
        @foreach ($items as $item)
        <a style='text-decoration: none;color: #000;' href='/view/{{$item->id}}'>
            <div class="pb-5 p-2">
                <div class='bg-light'>
                    <img src="/storage/{{$item->pic}}" class="img-responsive center-block">
                    <div class='pb-4 pt-2 h4'>{{$item->title}}</div>
                    <div class='text-danger h4'>${{$item->price}}</div>

                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>

@endsection