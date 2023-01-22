@extends('layouts.app')

@section('content')
<h5 class="m-3 text-center">商品編集画面</h5>

<div class="row d-flex justify-content-around">
  <div>
    <img src="..." class="img-thumbnail" alt="...">
  </div>
  <form action="{{ route('products.update',$products->id)}}" method='POST'>
    @method('PATCH')
    @csrf
<!-- 商品名 -->
  <div class="row mb-3">
    <div class="col-sm-10">
      <input type="text" class="form-control" name='name' value="{{$products['name']}}">
    </div>
  </div>
<!-- 商品詳細 -->
  <div class="row mb-3">
    <div class="col-sm-20">
      <textarea type="text" class="form-control" name='comment'>{{$products['comment']}}</textarea>
    </div>
  </div>
<!-- 値段 -->
  <div class="row mb-3">
    <div class="col-sm-10">
      <input type="text" class="form-control" name='price' value="{{$products['price']}}">
    </div>
  </div>
<!-- サイズ -->
<div class="row mb-3">
    <div class="col-sm-10">
      <input type="text" class="form-control" name='stock' value="{{$products['stock']}}">
    </div>
  </div>
<!-- サイズ -->
  <div class="row mb-3">
    <div class="col-sm-10">
      <input type="text" class="form-control" name='size' value="{{$products['size']}}">
    </div>
  </div>
  <div class="text-center"><button type='submit'>更新</button></div>
</form>
</div>


@endsection