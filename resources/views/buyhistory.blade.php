@extends('layouts.app')

@section('content')
<h5 class="text-center">購入履歴</h5>

@foreach($products as $product)
<div class="row d-flex justify-content-around mt-3">
  <div >
    <img src="..." class="img-thumbnail" alt="...">
  </div>
  <div>
    <table>
      <tr>
        <td class="d-block">商品名:{{$product['name']}}</td>
        <td class="d-block">サイズ:{{$product['size']}}</td>
        
        <td class="d-block">購入日:{{$product['updated_at']->format('Y年m月d日')}}</td>
      </tr>
    </table>
  </div>
</div>
@endforeach

@endsection