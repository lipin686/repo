<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Order;

class Item extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title', 'pic', 'price','totle','deleted_at'
    ];
    public function orders(){
        return $this->belongsToMany(Order::class)->withTimestamps();
    }
}
