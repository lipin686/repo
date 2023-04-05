@extends('layouts.master')

@section('title', '購物車')

@section('content')
<section class="container ">
    <div class="">
    @isset($err)
            <div id=''style='position:absolute;right:10;bottom:85%;color:red;'>{{$err}}</div>
        @endisset
        <h1 class="">你的購物車</h1>
        
        @if(session()->has('cart'))
        <table class="table table-secondary table-striped table-hover table-bordered">
            <thead>
                <th class="">項目</th>
                <th class="">價錢</th>
                <th class="">數量</th>
                <th class="" colspan="3">動作</th>
            </thead>
            <tbody class="">
                @foreach ($items as $item)
                <tr>

                    <td class="">{{$item['item']['title']}}</td>
                    <td class="">{{$item['item']['price']}}</td>
                    <td class="">{{$item['qty']}}</td>
                    <td class=""><a class="" href="/increase-one-item/{{$item['item']['id']}}">
                            <h3><b>+<b></h3>
                        </a></td>
                    <td class=""><a class="" href="/decrease-one-item/{{$item['item']['id']}}">
                            <h3><b>-<b></h3>
                        </a></td>
                    <td class=""><a class="" href="/remove-item/{{$item['item']['id']}}">
                            <h3><b>x<b></h3>
                        </a></td>
                    </h1>
                </tr>
                @endforeach
            </tbody>

        </table>
        @else
        <p>Cart is Empty</p>
        @endif
        <h4>
            <p class="text-right ">總共數量: {{ $totalQty}}</p>
            <p class="text-right">總共價錢: {{ $totalPrice}}$</p>
        </h4>
        <div class="text-right">
            <a href="/clear-cart" class="btn btn-tinted btn--l">清空</a>
            <a href="/order/new" class="btn btn-tinted btn--l">購買</a>
        </div>
    </div>
</section>
@endsection