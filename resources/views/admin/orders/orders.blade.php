@extends('admin.layouts.master')

@section('title', '檢視訂單')

@section('content')
<section class="container pt-5">
    <div class="">
        <h1 class="pt-5">訂單檢視</h1>
        <table class="table table-hover table-bordered" id='orderstable'>
            <thead>
                <th th scope="col">訂單單號</th>
                <th th scope="col">使用者名稱</th>
                <th th scope="col">訂單資訊</th>
                <th th scope="col">總價錢</th>
                <th th scope="col">操作</th>

            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr class="data-row">
                    <td>{{$order->id}}</td>
                    <td>{{$order->name}}</td>
                    <td>
                        <ul>
                            @foreach(unserialize($order->cart)->items as $key => $item)
                            <li>
                                {{$item['item']['title']}}
                            </li>
                            @endforeach
                        </ul>
                    </td>
                    <td>${{unserialize($order->cart)->totalPrice}}</td>
                    <td>
                        <button class="btn" data-orderid='{{$order->id}}' data-toggle="modal" data-target="#orderEdit-modal{{$order->id}}"><i class="fa fa-edit" aria-hidden="true"></i></button>
                        <button class="btn" data-orderid='{{$order->id}}' onclick='orderRemove(this)'><i class="fa fa-times text-danger" aria-hidden="true"></i></button>
                    </td>
                </tr>
                @include('admin.orders.orderModal')
                @endforeach
            </tbody>
        </table>
        
    </div>
</section>

@endsection