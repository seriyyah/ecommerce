<?php

namespace App;

use Gloudemans\Shoppingcart\Contracts\Buyable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model implements Buyable
{

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function presentPrice()
    {

        return "$ ".number_format($this->price);
    }

    public function orderItem()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getBuyableIdentifier($options = null){
        return $this->id;
    }

    public function getBuyableDescription($options = null){
        return $this->name;
    }

    public function getBuyablePrice($options = null){
        return $this->price;
    }
}
