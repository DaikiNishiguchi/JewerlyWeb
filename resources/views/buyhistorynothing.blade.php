@extends('layouts.app')

@section('content')
<div class="text-center">
  <a>購入履歴</a>
</div>
<div class="m-5 text-center">
  <span>購入履歴はございません。</span>
</div>

<div class="m-5 text-center">
  <button class="ma-5 btn-success rounded-pill col-5"><a href="{{route('products.index')}}">ホームへ</button>
</div>
@endsection