@extends('layouts.app')

@section('content')
<div class="text-center">商品情報管理画面</div>

@foreach($products as $product)
<div class="row d-flex justify-content-around m-3">
  <div>
    <p>
      <img src="..." class="img-thumbnail" alt="...">
    </p>
  </div>
  <div>
    <p>
      <span class="text-center d-block">商品名：{{ $product['name']}}</span>
      @if($product['size']== 0)
        <span class="text-center d-block">サイズ：S</span>
      @elseif($product['size']== 1)
        <span class="text-center d-block">サイズ：M</span>
      @else($product['size']== 2)
        <span class="text-center d-block">サイズ：L</span>
      @endif
      <span class="text-center d-block">在庫：{{ $product['stock']}}</span>
      <span class="text-center d-block">¥{{ $product['price']}}</span>
    </p>
  </div>
  <div>
    <span class="text-center">商品詳細：{{ $product['comment']}}</span>
  </div>
  <div>
    <a href ="{{ route('products.edit',$product->id)}}"><button class="text-center d-block">編集</button></a>

    <form action="{{route('products.destroy', $product->id)}}" method="post" class="float-right">
            @csrf
            @method('delete')
            <button type="submit" value="削除" onclick='return confirm("削除しますか？");'>削除</button>
        </form>

    <!-- <a href ="{{ route('products.destroy',$product->id)}}"><button class="text-center d-block">削除</button></a> -->
  </div>
</div>
@endforeach


@endsection