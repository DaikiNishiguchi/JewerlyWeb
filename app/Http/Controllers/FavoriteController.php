<?php

namespace App\Http\Controllers;

use App\Favorite;
use App\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function ajaxFavorite(Request $request){
        $id = Auth::user()->id;
        $product_id = $request->product_id;
        $favorite = new Favorite;
        // $product = Product::findOrFail($product_id);

        // 空でない（既にいいねしている）なら
        if ($favorite->favorite_exist($id, $product_id)) {
            //favoritesテーブルのレコードを削除
            $favorite = Favorite::where('product_id', $product_id)->where('user_id', $id)->delete();
        } else {
            //空（まだ「いいね」していない）ならfavoritesテーブルに新しいレコードを作成する
            $favorite = new favorite;
            $favorite->product_id = $request->product_id;
            $favorite->user_id = Auth::user()->id;
            $favorite->save();
        }

        // //loadCountとすればリレーションの数を○○_countという形で取得できる（今回の場合はいいねの総数）
        // $productFavoritesCount = $product->loadCount('favorites')->favorites_count;

        // //一つの変数にajaxに渡す値をまとめる
        // //今回ぐらい少ない時は別にまとめなくてもいいけど一応。笑
        // $json = [
        //     'productFavoritesCount' => $productFavoritesCount,
        // ];
        // //下記の記述でajaxに引数の値を返す
        return response()->json();
    }

    public function favoriteList(){

        $favorite = new Favorite;
        $product = new Product;
        $favorites = Favorite::select('favorites.id as fa_id','user_id','product_id','name','price','file_name')->join('products','product_id','=','products.id')->where('user_id',Auth::id())->get();

        return view('favoritelist',[
            'favorites'=> $favorites,
        ]);
    }
    
    public function favoriteDestroy($fa_id){


        $favorite = new Favorite;
        $favorites = $favorite->find($fa_id);
        
        $favorites->delete();

        return redirect('/favoritelist');
    }

}


