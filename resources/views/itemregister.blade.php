@extends('layouts.app')

@section('content')
<h5 class="m-3 text-center">商品登録画面</h5>
<div class="row d-flex justify-content-around">
  <div>
    <img src="..." class="img-thumbnail" alt="...">
  </div>
<form action="{{route('products.store')}}" method='POST'>
@csrf
<!-- 商品名 -->
  <div class="row mb-3">
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="商品名" name="name">
    </div>
  </div>
<!-- 商品詳細 -->
  <div class="row mb-3">
    <div class="col-sm-20">
      <textarea type="text" class="form-control" placeholder="商品詳細" name="comment"></textarea>
    </div>
  </div>
<!-- 値段 -->
  <div class="row mb-3">
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="値段" name="price">
    </div>
  </div>
<!-- ストック -->
<div class="row mb-3">
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="在庫" name="stock">
    </div>
  </div>
<!-- サイズ -->
  <div class="row mb-3">
    <div class="col-sm-10">
    <select name='size' class='form-control'>
       <option value='' hidden >選択してください</option>
       <option value='0' >S</option>
       <option value='1' >M</option>
       <option value='2' >L</option>
     </select>
    </div>
  </div>
  <div class="text-center"><button type='submit'>登録</button></div>
</form>
</div>

@endsection