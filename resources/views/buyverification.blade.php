@extends('layouts.app')

@section('content')
<div class="text-center"> 
        <h5 class="d-block">購入詳細情報確認画面</h5>
        <h6 class="d-block">※まだ購入は確定しておりません。<br>下記情報を確認し確定ボタンを押してください。</h6>
<div>

@foreach($products as $product)
<div class="row d-flex justify-content-around m-5">
<!-- 商品画像表示 -->
    <img src="{{asset('storage/'.$product['file_name'])}}" class="img-thumbnail w-25 h-25" alt="...">
  <div>
    <table>
      <tr>
        <td class="d-block">{{$product['name']}}</td>
        <td class="d-block">¥{{number_format($product['price'])}}<td>
      </tr>
    </table>
  </div>
</div>
@endforeach

<div class="text-center">合計：¥{{number_format($product_sum)}}</div>
<form action="{{ route('cart.comp',$product->pu_id)}}" method='POST'>
@csrf

<div class="text-center"><button type="submit" class="btn-dark rounded-pill col-3">購入確定</button></div>
</form>
@endsection