@extends('layouts.master')

@section('title', '首頁')

@section('content')
@if($items=='[]')
<div class="container">
    <div class='pt-5'>查無此資料，請重新查詢!</div>
</div>
@else
<div class="container">
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
@endif
