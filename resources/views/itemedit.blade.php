@extends('layouts.app')

@section('content')
<h5 class="m-3 text-center">商品編集画面</h5>

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
    <img src="{{asset('storage/'.$products['file_name'])}} " class="img-thumbnail w-25 h-25" id='preview' alt="...">
  <form action="{{ route('products.update',$products->id)}}" method='POST' enctype="multipart/form-data">
    @method('PATCH')
    @csrf
<!-- 商品画像編集 -->
<input type="file" class="mb-3" name="file_name" id="myImage" accept="image/*" value="{{$products['file_name']}}">
<!-- 商品名 -->
  <div class="row mb-3">
    <div class="col-sm-10">
      <input type="text" class="form-control" name='name' value="{{$products['name']}}">
    </div>
  </div>
<!-- 商品詳細 -->
  <div class="row mb-3">
    <div class="col-sm-10">
      <textarea type="text" class="form-control" name='comment'>{{$products['comment']}}</textarea>
    </div>
  </div>
<!-- 値段 -->
  <div class="row mb-3">
    <div class="col-sm-10">
      <input type="text" class="form-control" name='price' value="{{$products['price']}}">
    </div>
  </div>
<!-- ストック -->
<div class="row mb-3">
    <div class="col-sm-10">
      <input type="text" class="form-control" name='stock' value="{{$products['stock']}}">
    </div>
  </div>
  <div class="text-center"><button type='submit' class="btn btn-outline-dark">更新</button></div>
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