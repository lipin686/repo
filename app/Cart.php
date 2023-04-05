<?php

namespace App;

class Cart
{
    public $items;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items      = $oldCart->items;
            $this->totalQty   = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $id,$count)
    {
        //如果購物車沒有商品 設定該商品初始價錢等狀態
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
        // 如果購物車裡面已經有商品
        if ($this->items) {
            // 如果該商品已經在購物車拿出該商品放到storedItem
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        // 把商品+1
        $storedItem['qty']+= $count;
        // 商品價格*數量
        $storedItem['price'] = $item->price * $storedItem['qty'];
        // 把物件內的原商品狀態更新
        $this->items[$id] = $storedItem;
        // 更新總數量
        $this->totalQty+= $count;
        // 更新總價錢
        $this->totalPrice += $item->price * $count;
    }

    public function increaseByOne($id)
    {
        $this->items[$id]['qty']++;
        $this->items[$id]['price'] += $this->items[$id]['item']['price'];
        $this->totalQty++;
        $this->totalPrice += $this->items[$id]['item']['price'];
    }

    public function decreaseByOne($id)
    {
        $this->items[$id]['qty']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['item']['price'];
        // 如果小於1等同沒有該商品 釋放該商品
        if ($this->items[$id]['qty'] < 1) {
            unset($this->items[$id]);
        }
    }

    public function removeItem($id)
    {
        // 總數量減去商品數量
        $this->totalQty -= $this->items[$id]['qty'];

        // 總價錢減商品價錢
        $this->totalPrice -=  $this->items[$id]['price'];

        // 釋放商品
        unset($this->items[$id]);
    }
    public function getQty($id)
    {
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                return $this->items[$id]['qty'];
            }
        }
        return 0;
    }
   
}
