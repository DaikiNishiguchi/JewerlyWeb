@extends('layouts.app')

@section('content')
<div class="text-center"><h5>パスワード再設定</h5></div>

<form class="container">
<div class="row justify-content-center">
  <div class="row m-3 d-block">
    <div class="col-sm-15 m-3">
    <label for="formGroupExampleInput" class="form-label">新パスワード</label>
      <input type="text" class="form-control" placeholder="新パスワード">
    </div>

    <div class="col-sm-15 m-3">
    <label for="formGroupExampleInput" class="form-label">新パスワード再入力</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="新パスワード再入力">
    </div>
  <div class="col-sm-6 m-5">
  <button type="email" class="form-control" id="exampleFormControlInput1">登録</button>
</div>
</form>
@endsection