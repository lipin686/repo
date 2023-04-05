@extends('layouts.master')

@section('title', '檢視訂單')

@section('content')
<section class="container">
    <div class="">
        <h1 class="pt-5">訂單檢視</h1>
    
        @if(!$orders->isEmpty())
        <table class="table table-secondary table-striped table-hover table-bordered">
            <thead>
                <th class="border px-4 py-2">訂單單號</th>
                <th class="border px-4 py-2">使用者名稱</th>
                <th class="border px-4 py-2">訂單資訊</th>
                <th class="border px-4 py-2">總價錢</th>
                <th class="border px-4 py-2">顯示細節</th>
                <th class="border px-4 py-2">paid</th>
            </thead>
            <tbody class="">
                @foreach($orders as $order)
                <tr>
                    <td class="border px-4 py-2">{{$order->id}}</td>
                    <td class="border px-4 py-2">{{$order->name}}</td>
                    <td class="border px-4 py-2">
                        <ul>
                            @foreach(unserialize($order->cart)->items as $key => $item)
                            <li>
                                {{$item['item']['title']}}<br>
                                價錢:${{$item['item']['price']}}<br>
                                數量:{{$item['qty']}}件

                            </li>
                            @endforeach
                        </ul>
                    </td>
                    <td class="border px-4 py-2">${{unserialize($order->cart)->totalPrice}}</td>
                     <!-- <td class="border px-4 py-2">{{$order->cart}}</td>  -->
                    <td class="border px-4 py-2"><a href="#">Show</a></td>
                    <td class="border px-4 py-2">{{$order->paid}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p>訂單為空</p>
        @endif
    </div>
</section>
@endsection
