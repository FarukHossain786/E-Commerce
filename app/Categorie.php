<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Product;


class Categorie extends Model
{
    use SoftDeletes;
    protected $guarded=[];
    protected $dates = ['deleted_at'];

   // protected $fillable = ['title', 'description', 'created_at','updated_at','deleted_at'];

    public function Products(){

        return $this->belongsToMany('App\Product')->withDefault();
    }

    public function productsCat(){

        return $this->belongsToMany(Product::class, 'categorie_product');
    }
   

    // public function child(){
    //     return $this->belongsToMany(Categorie::class, 'category_parent', 'category_id', 'parent_id');
    // }

}
