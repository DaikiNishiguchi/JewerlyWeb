@extends('layouts.app')

@section('content')
<h5 class="m-3 text-center">商品詳細画面</h5>
<form action="{{route('carts.show',$products->id)}}" method='GET'>
<div class="row d-flex justify-content-around">
  <!-- 画像表示 -->
  <img src="{{asset('storage/'.$products['file_name'])}}" class="img-thumbnail w-25 h-25" alt="...">
<div>
  <table>
  <tr>
   <td class="d-block text-wrap">{{ $products['name']}}</td>
   <td class="d-block">¥{{number_format($products['price'])}}</td>
   @if($products['stock'] <= 0)
   <td class="d-block">入荷待ち</td>
   @else
   <td class="d-block">stock：{{ $products['stock']}}</td>
   @endif
   <td class="d-block text-break">{{ $products['comment']}}</td>
     </select></td>
  </tr>
</table>
</div>
</div>
<div class="text-center">
<button type='submit' class='btn-dark rounded-pill'>カートに入れる</button>
</div>
</form>
@endsection