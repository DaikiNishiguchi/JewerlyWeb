@extends('layouts.app')

@section('content')
<div class="container text-center">ご購入いただき誠にありがとうございます。<br>購入者情報につきましては送信いたしました<br>メールにてご対応ください。<br>購入いただきました商品は購入履歴からご確認を<br>お願いいたします。</div>
<div class="mt-5 text-center pa-3">
  <a href="{{route('products.index')}}"><button class="btn-success rounded-pill col-3">ホームへ</button></a>
</div>
@endsection