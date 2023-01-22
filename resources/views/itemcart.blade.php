@extends('layouts.app')

@section('content')
<h5 class="m-3 text-center">カート</h5>

@foreach($products as $product)
<div class="row d-flex justify-content-around m-5">
  <div>
    <img src="..." class="img-thumbnail" alt="...">
  </div>
  <div>
    <table>
      <tr>
        <td class="d-block">商品名：{{$product['name']}}</td>
        <td class="d-block">サイズ：{{$product['size']}}</td>
        <td class="d-block">金額：{{$product['price']}}</td>


        <td class="d-block"><a href ="{{ route('cart.delete',$product->pu_id)}}"><button class="text-center d-block" onclick='return confirm("削除しますか？");'>削除</button></a></td>
      </tr>
    </table>
  </div>
</div>
@endforeach

<div class="text-center">合計：¥{{$product_sum}}</div>
<form action="{{ route('cart.buy',$product->pu_id)}}" method='POST'>
@csrf
<div class="text-center"><button type="submit">購入</button></div>
</form>
@endsection