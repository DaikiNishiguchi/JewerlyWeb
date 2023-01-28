@extends('layouts.app')

@section('content')
<h5 class="text-center">購入履歴</h5>

@foreach($products as $product)
<div class="row d-flex justify-content-around mt-5">
<!-- 画像表示 -->
    <img src="{{asset('storage/'.$product['file_name'])}}" class="img-thumbnail w-25 h-25" alt="...">
  <div>
    <table class="mt-5">
      <tr>
        <td class="d-block mt-3">{{$product['name']}}</td>
        <td class="d-block mt-3">¥{{number_format($product['price'])}}</td>
        <td class="d-block mt-3">購入日:{{$product['updated_at']->format('Y年m月d日')}}</td>
      </tr>
    </table>
  </div>
</div>
@endforeach

@endsection