<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.orders', compact('orders'));
    }
    public function store(Request $request)
    {
    }
    public function create()
    {
    }
    public function show($id)
    {
        $orders = Order::where('id', $id)->get();
        return view('orders', compact('orders'));
    }
    public function update(Request $request)
    {
    }
    public function destroy($id)
    {
        Order::find($id)->delete();
        //return redirect()->route('users.index'); 
    }
    public function edit()
    {
    }
}
