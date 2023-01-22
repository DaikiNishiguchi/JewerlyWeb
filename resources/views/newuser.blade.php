@extends('layouts.app')

@section('content')
<h5 class="m-3 text-center">新規登録</h5>

<form class="container ">
  <div class="row justify-content-center">
  <div class="row m-3 d-block">
    <div class="col-sm-15 m-3">
    <label for="formGroupExampleInput" class="form-label">名前</label>
      <input type="text" class="form-control" placeholder="名前">
    </div>

    <div class="col-sm-15 m-3">
    <label for="formGroupExampleInput" class="form-label">メールアドレス入力</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="メールアドレス入力">
    </div>

    <div class="col-sm-15 m-3">
    <label for="formGroupExampleInput" class="form-label">パスワード</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="パスワード">
    </div>

    <div class="col-sm-15 m-3">
    <label for="formGroupExampleInput" class="form-label">パスワード再入力</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="パスワード再入力">
    </div>
  </div>
</div>
<div class="text-center m-5"><button>登録</button></div>
</form>
@endsection