<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\CartController;

class Product_user extends Model
{
    protected $table = 'product_user';
    protected $fillable = ['user_id','product_id','status'];

    // Public function product(){
    // return $this->hasMany('App\product');
  // }
}
