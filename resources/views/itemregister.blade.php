@extends('layouts.app')

@section('content')
<h5 class="m-3 text-center">商品登録画面</h5>

@if($errors->any())
<div class='alert alert-danger text-center'>
  <ul>
    @foreach($errors->all() as $message)
    <li>{{$message}}</li>
    @endforeach
  </ul>
</div>
@endif

<div class="row d-flex justify-content-around">
  <div class="h-25 w-25">
    <img id="preview" src="..." class="img-thumbnail" alt="...">
  </div>

<form action="{{route('products.store')}}" method='POST' enctype="multipart/form-data" >
@csrf
<input type="file" class="mb-3" name="file_name" id="myImage" accept="image/*">
<!-- accept="image/*" -->
<!-- 商品名 -->
  <div class="row mb-3">
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="商品名" name="name" value="{{old('name')}}">
    </div>
  </div>
<!-- 商品詳細 -->
  <div class="row mb-3">
    <div class="col-sm-10">
      <textarea type="text" class="form-control" placeholder="商品詳細" name="comment">{{old('comment')}}</textarea>
    </div>
  </div>
<!-- 値段 -->
  <div class="row mb-3">
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="値段" name="price" value="{{old('price')}}">
    </div>
  </div>
<!-- ストック -->
  <div class="row mb-3">
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="在庫" name="stock" value="{{old('stock')}}">
    </div>
  </div>

  <div class="text-center"><button type='submit' class="btn-dark rounded-pill">登録</button></div>
</form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  $(function(){
  $('#myImage').on('change', function (e) {
    var reader = new FileReader();
    reader.onload = function (e) {
        $("#preview").attr('src', e.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
});
});

</script>


@endsection