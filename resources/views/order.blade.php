@extends('layouts.master')

@section('title', '訂單頁面')

@section('content')
<section class="container ">
    <h1 class="pt-5">訂單頁面</h1>
    <h3 class="pt-3">訂單資訊</h3>
    <table class="table  table-striped table-hover table-bordered">
        <thead>
            <th class="">項目</th>
            <th class="">價錢</th>
            <th class="">數量</th>
            <th class="">價錢</th>
        </thead>
        <tbody class="">
            @foreach ($items as $item)
            <tr>
                <td class="">{{$item['item']['title']}}</td>
                <td class="">{{$item['item']['price']}}$</td>
                <td class="">{{$item['qty']}}</td>
                <td class="">{{$item['qty'] * $item['item']['price']}}$</td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <h3 class="pt-3">使用者資訊</h3>

    <form method="POST" action="/orders" class="">
        @csrf
        <div class="mb-3 pt-3">
            <label class="form-label" for="name">
                名稱:
            </label>
            <input class="form-control" name="name" id="name" type="text" placeholder="name">
        </div>
        <div class="mb-3">
            <label class="form-label" for="phone">
                電話:
            </label>
            <input class="form-control" name="phone" id="phone" type="phone" placeholder="phone">
        </div>
        <div class="mb-3">
            <label class="form-label" for="address">
                地址:
            </label>
            <input class="form-control" name="address" id="address" type="address" placeholder="address">
        </div>
        <div class="mb-3">
            <button class="form-label" type="submit">
                送出訂單
            </button>
        </div>
        @include('layouts.error')
    </form>
</section>
@endsection