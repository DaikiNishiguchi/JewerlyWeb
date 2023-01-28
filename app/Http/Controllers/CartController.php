<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Product_user;
use App\Mail\ThanksMail; 

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_user = new Product_user;
        
    
        $product_users = Product_user::select('product_user.id as pu_id','user_id','product_id','status','name','price','file_name')->join('products','product_id','=','products.id')->where('user_id',Auth::id())->where('status',0)->get();
        if($product_users->isEmpty()){
            return view('carthistrynothing');
        }else{
            $product_sum = $product_user->join('products','product_id','=','products.id')->where('user_id',Auth::id())->where('status',0)->sum('price');
            return view('itemcart',[
                'products'=> $product_users,
                'product_sum'=>$product_sum
            ]);
        }
    }

    // public function cartDisplay()
    // {
    //     $product_user = new Product_user;
    //     $product_users = Product_user::select('product_user.id as pu_id','user_id','product_id','status','name','price','file_name')->join('products','product_id','=','products.id')->where('user_id',Auth::id())->where('status',0)->get();
    //     $product_sum = $product_user->join('products','product_id','=','products.id')->where('user_id',Auth::id())->where('status',0)->sum('price');

    //     if($product_users->isEmpty()){
            
    //     }else{
    //         return view('itemcart',[
    //             'products'=> $product_users,
    //             'product_sum'=>$product_sum,
    //         ]);
    //     }
        
    // }

    public function buy()
    {
        $product_user = new Product_user;
        
    
        $product_users = Product_user::select('product_user.id as pu_id','user_id','product_id','status','name','price','file_name')->join('products','product_id','=','products.id')->where('user_id',Auth::id())->where('status',0)->get();

        $product_sum = $product_user->join('products','product_id','=','products.id')->where('user_id',Auth::id())->where('status',0)->sum('price');

        return view('buyverification',[
            'products'=> $product_users,
            'product_sum'=>$product_sum
        ]);
    }

    public function comp(request $request)
    {
        // $product_user = new Product_user;
        Product_user::where('user_id',Auth::id())->update(['status'=>1]);

        $buy_counts = Product_user::query()->join('products','product_id','=','products.id')->where('user_id',Auth::id())->where('status',1)->get()->groupBy('product_id')->toArray();
        foreach($buy_counts as $buy_count){
            foreach($buy_count as $bc){
                Product::where('id',$bc['product_id'])->decrement('stock');
            }
            
        }

        // メール送付
        // $data = $request->toArray();



        Mail::to(Auth::user()->email)->send(new ThanksMail());

        session()->flash('success', '送信しました！');
        
        return view('buyconfirm');
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product_user = new Product_user;
        
        $product_user->product_id = $id;
        $product_user->user_id = Auth::id();
        $product_user->status = 0;

        $product_user->save();

    
        return redirect()->route('carts.index');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $product_user = new Product_user;
        // $product_users = $product_user->find($id);

        // $product_users->delete();

        // return redirect('/itemcart');
    }

    public function delete($id)
    {
        $product_user = new Product_user;
        $product_users = $product_user->find($id);

        $product_users->delete();

        return redirect()->route('carts.index');
    }
}
