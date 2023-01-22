@extends('layouts.app')

@section('content')
<h5 class="m-3 text-center">パスワード再設定</h5>

<form class="container ">
  <div class="row justify-content-center">
  <div class="row m-3 d-block">
    <div class="col-sm-15 m-3">
    <label for="formGroupExampleInput" class="form-label">メールアドレス入力</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="メールアドレス入力">
    </div>
  </div>
</div>
<div class="text-center m-5"><button>送信</button></div>
</form>
@endsection