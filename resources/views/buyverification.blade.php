@extends('layouts.app')

@section('content')
<div class="text-center"> 
        <h4 class="d-block">購入詳細情報確認画面</h4>
        <h5 class="d-block">※まだ購入は確定しておりません。<br>下記情報を確認し確定ボタンを押してください。</h5>
<div>

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
        <td class="d-block">小計：{{$product['price']}}<td>
      </tr>
    </table>
  </div>
</div>
@endforeach

<div class="text-center">合計：¥{{$product_sum}}</div>
<form action="{{ route('cart.comp',$product->pu_id)}}" method='POST'>
@csrf
<div class="text-center"><button type="submit">購入確定</button></div>
</form>
@endsection