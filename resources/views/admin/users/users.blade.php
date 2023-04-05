@extends('admin.layouts.master')

@section('content')
<div class="container pt-5">
    <div class="pt-5">
        <h1 >使用者管理</h1>
        <div>
            <button class='btn btn-primary pull-right' onclick='userAdd(this)'>新增</button>
        </div>
        <div class="pt-5">
            <table class="table table-hover table-bordered" id='userstable'>
                <thead>
                    <tr>
                        <th scope="col">使用者名稱</th>
                        <th scope="col">Email</th>
                        <th scope="col">Created_at</th>
                        <th scope="col">updated_at</th>
                        <th scope="col">操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr class="data-row">
                        <td class="name">{{$user->name}}</td>
                        <td class="email">{{$user->email}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->updated_at}}</td>
                        <td>
                            <button class="btn" data-userid='{{$user->id}}'  onclick='userEdit(this)'><i class="fa fa-edit" aria-hidden="true"></i></button>
                            <button class="btn" data-userid='{{$user->id}}' onclick='userRemove(this)'><i class="fa fa-times text-danger" aria-hidden="true"></i></button>
                        </td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
</div>
@include('admin.users.userModal')
@endsection