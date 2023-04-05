<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Item;
class Order extends Model
{
    use SoftDeletes;
    //protected $table='orders';
    protected $fillable=['user_id','name','phone','address','cart','comment','uuid','deleted_at'];

    // public function items(){
    //     return $this->belongsToMany(Item::class)->withTimestamps()->withPivot('qty');
    // }

    // public function getSumAttribute(){
    //     $orderItems=$this->items;
    //     $sum=0;
    //     foreach ($orderItems as $item) {
    //         $sum += ($item->price * $item->pivot->qty);
    //     }
    //     return $sum;
    // }
}
