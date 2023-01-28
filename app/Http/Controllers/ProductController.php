<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Product_user;
use App\Favorite;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateData;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $favorite_model = new Favorite;
        $keyword = $request->input('keyword');
        $price_range = $request->input('price_range');
        $query = Product::query();

        if(!empty($keyword)){
            $query->where('name','like','%'.$keyword.'%');
        }
        if(!empty($price_range)){
            $query->where('price','<=',$price_range);
        }
        $products = $query->get();

        return view('webhome',[
            'products'=> $products,
            'favorite_model' => $favorite_model,
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
    public function store(CreateData $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->comment = $request->comment;
        $product->price = $request->price;
        $product->stock = $request->stock;

        if(!empty($request->file_name)){
            $file_name = $request->file_name->getClientOriginalName();
            $product->file_name = $request->file_name->storeAs('',$file_name,'public'); 
        }
        
        $product->save();

        return redirect('/admin');
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
    public function update(CreateData $request, $id)
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
        if($request->hasFile('file_name')){
            $file_name = $request->file_name->getClientOriginalName();
            $record->file_name = $request->file_name->storeAs('',$file_name,'public'); 
        }

        $record->save();

        return redirect('/admin');
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

        return redirect('/admin');
    }

    public function history()
    {
        $products = Product_user::select('product_user.id as pu_id','user_id','product_id','status','name','price','file_name','product_user.updated_at')->join('products','product_id','=','products.id')->where('user_id',Auth::id())->where('status',1)->get();
        if($products->isEmpty()){
            return view('buyhistorynothing');
        }else{
            return view('buyhistory',[
                'products'=> $products,
            ]);
        }
        
    }
}
