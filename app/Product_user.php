<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FavoriteController;

class Product_user extends Model
{
    protected $table = 'product_user';
    protected $fillable = ['user_id','product_id','status'];

    // Public function product(){
    // return $this->hasMany('App\product');
  // }
}
