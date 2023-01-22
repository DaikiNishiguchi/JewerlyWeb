<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Product_user;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = new Product;
        $products = $product->all();

        return view('webhome',[
            'products'=> $products,
        ]);
    }

    public function adminIndex()
    {
        $product = new Product;
        $products = $product->all();

        return view('managementhome',[
            'products'=> $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('itemregister');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;

        $product->name = $request->name;
        $product->comment = $request->comment;
        $product->price = $request->price;
        $product->size = $request->size;
        $product->stock = $request->stock;
        
        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = new Product;
        $products = $product->find($id);

        return view('ditail',[
            'products'=> $products,
            // 'id' => $id,
            // 'name' => $name,
            // 'comment' => $comment,
            // 'price' => $price,
            // 'size' => $size,
            // 'stock' => $stock
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = new Product;

        $products = $product->find($id);

        return view('itemedit',[
            'products' => $products,
            // 'id' => $id,
            // 'name' => $name,
            // 'comment' => $comment,
            // 'price' => $price,
            // 'size' => $size,
            // 'stock' => $stock
        ]);


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
        $instance = new Product;
        $record = $instance->find($id);

        // $columns = ['amount','date','comment','type_id'];

        // foreach($columns as $column){
        //     $income->$column = $request->$column;
        // }

        $record->name = $request->name;
        $record->comment = $request->comment;        
        $record->price = $request->price;
        $record->stock = $request->stock;
        $record->size = $request->size;

        $record->save();

        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = new Product;
        $products = $product->find($id);
        $products->forceDelete();

        return redirect('/products');
    }

    public function history()
    {
        $products = Product_user::select('product_user.id as pu_id','user_id','product_id','status','name','price','size','product_user.updated_at')->join('products','product_id','=','products.id')->where('user_id',Auth::id())->where('status',1)->get();
        

        return view('buyhistory',[
            'products'=> $products,
        ]);
    }
}
