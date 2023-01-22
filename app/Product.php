<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

class Product extends Model
{
    protected $fillable = ['name','comment','price','stock','size'];

    public function user(){
        
    }
}
