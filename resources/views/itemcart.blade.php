@extends('layouts.app')

@section('content')
<h5 class="m-3 text-center">カート</h5>

@foreach($products as $product)
<div class="row d-flex justify-content-around m-5">
<!-- 画像表示 -->
    <img src="{{asset('storage/'.$product['file_name'])}}" class="img-thumbnail w-25 h-25" alt="...">

  <div>
    <table>
      <tr>
        <td class="d-block">{{$product['name']}}</td>
        <td class="d-block">¥{{number_format($product['price'])}}</td>


        <td class="d-block"><a href ="{{ route('cart.delete',$product->pu_id)}}"><button class="text-center d-block btn btn-outline-danger" onclick='return confirm("削除しますか？");'>削除</button></a></td>
      </tr>
    </table>
  </div>
</div>
@endforeach

<div class="text-center">合計：¥{{number_format($product_sum)}}</div>
<form action="{{ route('cart.buy',$product->pu_id)}}" method='POST'>
@csrf
<div class="text-center"><button type="submit" class="btn-dark rounded-pill col-3">購入</button></div>
</form>
@endsection