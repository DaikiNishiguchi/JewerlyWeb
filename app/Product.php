<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FavoriteController;

class Product extends Model
{
    protected $fillable = ['name','comment','price','stock'];

    public function user(){
        
    }

    public function favorites()
    {
        return $this->hasMany('App\Favorite');
    }
}
