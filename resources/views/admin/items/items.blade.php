@extends('admin.layouts.master')

@section('content')

<div class="container pt-5">
    <div class="pt-5">
        <h1>商品管理</h1>
        <div>
            <button class='btn btn-primary pull-right' onclick='itemAdd(this)'>新增</button>
        </div>
        <div class="pt-5">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <table class="table table-hover table-bordered" id='itemstable'>
                <thead>
                    <tr>
                        <th scope="col">商品名稱</th>
                        <th scope="col">照片</th>
                        <th scope="col">價錢</th>
                        <th scope="col">數量</th>
                        <th scope="col">Created_at</th>
                        <th scope="col">updated_at</th>
                        <th scope="col">操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                    <tr class="data-row">
                        <td class="title">{{$item->title}}</td>
                        <td class="pic"><button class="btn btn-link" data-pic='{{$item->pic}}' onclick='previewImage(this)'>檢視照片</button></td>
                        <td class="price">{{$item->price}}</td>
                        <td class="totle">{{$item->totle}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>{{$item->updated_at}}</td>
                        <td>
                            <button class="btn" data-itemid='{{$item->id}}' onclick='itemEdit(this)'><i class="fa fa-edit" aria-hidden="true"></i></button>
                            <button class="btn" data-itemid='{{$item->id}}' onclick='itemRemove(this)'><i class="fa fa-times text-danger" aria-hidden="true"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('admin.items.itemModal')
@endsection