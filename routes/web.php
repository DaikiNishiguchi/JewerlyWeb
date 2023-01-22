<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
// メールリセット
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset/{token}', 'Auth\ResetPasswordController@reset');

Route::resource('products', 'ProductController');
Route::resource('carts', 'CartController');

Route::get('/', 'ProductController@index');
Route::get('/admin', 'ProductController@adminIndex');
Route::get('/cart_delete/{id}', 'CartController@delete')->name('cart.delete');
Route::post('/cart_buy', 'CartController@buy')->name('cart.buy');
Route::post('/comp', 'CartController@comp')->name('cart.comp');
Route::get('/purchase_history', 'ProductController@history')->name('products.history');


// ログイン画面
Route::get('/user_login', function () {
    return view('login');
});
// 新規登録
Route::get('/new_user', function () {
    return view('newuser');
});
// PW案内画面
Route::get('/pw_guid', function () {
    return view('pwguid');
});
// PW再設定画面
Route::get('/pw_resetting', function () {
    return view('pwresetting');
});
// PW再設定完了画面
Route::get('/pw_comp', function () {
    return view('pwcomp');
});
// ホーム画面
Route::get('/web_home', function () {
    return view('webhome');
});
// ホーム画面
Route::get('/web_home', function () {
    return view('webhome');
});
// 商品詳細画面
Route::get('/item_ditail', function () {
    return view('ditail');
});
// 商品カート画面
Route::get('/item_cart', function () {
    return view('itemcart');
});
// 商品購入確認画面
Route::get('/buy_verification', function () {
    return view('buyverification');
});
// 購入確定画面
Route::get('/buy_confirm', function () {
    return view('buyconfirm');
});
// お気に入りリスト画面
Route::get('/favorite_list', function () {
    return view('favoritelist');
});
// お気に入りリスト登録なし画面
Route::get('/favorite_nothing', function () {
    return view('favoritenothing');
});
// 購入履歴
Route::get('/buy_history', function () {
    return view('buyhistory');
});
// 購入履歴なし画面
Route::get('/buyhistory_nothing', function () {
    return view('buyhistorynothing');
});
// 管理画面
Route::get('/management_home', function () {
    return view('managementhome');
});
// 商品登録画面
Route::get('/item_register', function () {
    return view('itemregister');
});
// 商品編集画面
Route::get('/item_edit', function () {
    return view('itemedit');
});
// プロフィール編集画面
Route::get('/profile_edit', function () {
    return view('profileedit');
});

// ログイン後ヘッダー
Route::get('/login_header', function () {
    return view('layouts/header');
});


