<?php

namespace App;
use App\User;
use PDF;
use App\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    protected $guarded = [];



    public function items()
    {
        return $this->belongsToMany(Product::class, 'order_items','order_id','product_id')->withPivot('quantity','price');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
