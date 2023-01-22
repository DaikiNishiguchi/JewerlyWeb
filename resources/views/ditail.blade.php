@extends('layouts.app')

@section('content')
<h5 class="m-3 text-center">商品詳細画面</h5>
<form action="{{route('carts.show',$products->id)}}" method='GET'>
<div class="row d-flex justify-content-around">
<div >
  <img src="..." class="img-thumbnail" alt="...">
</div>
<div>
  <table>
  <tr>
   <td class="d-block">商品名：{{ $products['name']}}</td>
   <td class="d-block">商品名：{{ $products['price']}}</td>
   <td class="d-block">商品名：{{ $products['comment']}}</td>
   <td class="d-block">サイズ：<select name='size'>
       <option value='' hidden >選択してください</option>
       <option value='0' >S</option>
       <option value='1' >M</option>
       <option value='2' >L</option>
     </select></td>
  </tr>
</table>
</div>
</div>
<div class="text-center">
<button type='submit'>カートに入れる</button>
</div>
</form>
@endsection