<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index($id)
    {
        $item = Item::findOrFail($id);
        return view('view', compact('item'));
    }
    public function getAddToCart($id,$count)
    {
        Session::put('item_id',  $id);
        if (Auth::guest()) {
            return redirect()->route('login');
        } else {
            $item = Item::findOrFail($id);
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            $qty=$cart->getQty($id);
            
            if($qty+$count > $item['totle']){
                $err = "無法將所選數量加到購物車。因為購物車已有" . $qty ."件商品。";
                return view('view', compact('item','err'));
            }
            $cart->add($item, $item->id,$count);
            Session::put('cart', $cart);
            return redirect()->route('view', $id);
        }
    }
    public function cart()
    {
        if (Auth::guest()) {
            return redirect()->route('login');
        } else {
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            return view('cart', [
                'items' => $cart->items,
                'totalPrice' => $cart->totalPrice,
                'totalQty' => $cart->totalQty
            ]);
        }
    }
    
    public function increaseByOne($id)
    {
        
        $cart = new Cart(Session::get('cart'));
        $qty=$cart->getQty($id);
        $item = Item::findOrFail($id);
        if($qty == $item['totle']){
            return view('cart',[
                'items' => $cart->items,
                'totalPrice' => $cart->totalPrice,
                'totalQty' => $cart->totalQty,
                'err' => '數量已達該商品庫存上限'
            ]);
        }
        $cart->increaseByOne($id);
        session()->put('cart', $cart);
        return redirect()->action('CartController@cart');
    }

    public function decreaseByOne($id)
    {
        $cart = new Cart(Session::get('cart'));
        $cart->decreaseByOne($id);
        session()->put('cart', $cart);
        return redirect()->action('CartController@cart');
    }

    public function removeItem($id)
    {
        $cart = new Cart(Session::get('cart'));
        $cart->removeItem($id);
        session()->put('cart', $cart);
        return redirect()->action('CartController@cart');
    }

    public function clearCart()
    {
        if (session()->has('cart')) {
            session()->forget('cart');
        }
        return redirect('/');
    }
}
