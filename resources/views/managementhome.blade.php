@extends('layouts.app')

@section('content')
<div class="text-center">商品情報管理画面</div>

<div class="justify-content-center">
@foreach($products as $product)
<div class="row d-flex justify-content-around mt-5 border-bottom border-gray">
      <img src="{{asset('storage/'.$product['file_name'])}}" class="img-thumbnail w-25 h-25 mb-5" alt="...">
  <div>
    <p>
      <span class="text-center d-block">商品名：{{ $product['name']}}</span>
      <span class="text-center d-block">在庫：{{ $product['stock']}}</span>
      <span class="text-center d-block">¥{{number_format($product['price'])}}</span>
    </p>
  </div>
  <div>
    <span class="text-center">商品詳細：{{ $product['comment']}}</span>
  </div>
  <div>
    <a href ="{{ route('products.edit',$product->id)}}"><button class="text-center d-block btn btn-outline-dark mb-3">編集</button></a>

    <form action="{{route('products.destroy', $product->id)}}" method="post" class="float-right">
            @csrf
            @method('delete')
            <button class="btn btn-outline-danger" text-center d-block mt-3" type="submit" value="" onclick='return confirm("削除しますか？");'>削除</button>
        </form>

    <!-- <a href ="{{ route('products.destroy',$product->id)}}"><button class="text-center d-block"></button></a> -->
  </div>
</div>

@endforeach
</div>

@endsection