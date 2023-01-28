<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FavoriteController;

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

Auth::routes();
// メールリセット
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset/{token}', 'Auth\ResetPasswordController@reset');

Route::group(['middleware'=>'auth'],function(){
Route::resource('products', 'ProductController',['only' => ['index', 'show','store','edit','update','destroy','create']]);
Route::resource('carts', 'CartController',['only' => ['index', 'show']]);
Route::get('/', 'ProductController@index');
Route::get('/admin', 'ProductController@adminIndex')->name('products.adminIndex');
Route::get('/cart_delete/{id}', 'CartController@delete')->name('cart.delete');
Route::post('/cart_buy', 'CartController@buy')->name('cart.buy');
Route::post('/comp', 'CartController@comp')->name('cart.comp');
Route::get('/purchase_history', 'ProductController@history')->name('products.history');
Route::get('/profile_indx', 'ProfileController@profileIndex')->name('profile.index');
Route::post('/ajaxfavorite', 'FavoriteController@ajaxFavorite');
Route::get('/favoritelist', 'FavoriteController@favoriteList')->name('favorites.list');
Route::get('/favoritelist/{id}', 'FavoriteController@favoriteDestroy')->name('favorite.destroy');

// お気に入りから詳細に飛べる
// Route::get('/favoriteshow/{id}', 'FavoriteController@favoriteshow')->name('favorite.show');

});
