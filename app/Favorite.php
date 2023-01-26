<?php

namespace App;

use App\Product;
use App\Product_user;
use App\Http\Controllers\FavoriteController;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    public function favorite_exist($user_id, $product_id) {        
    return Favorite::where('user_id', $user_id)->where('product_id', $product_id)->exists();       
    }

    public function product(){
        return $this->belongsTo('App\Product');
    }
}
