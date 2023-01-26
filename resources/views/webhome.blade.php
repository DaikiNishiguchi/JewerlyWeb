@extends('layouts.app')

@section('content')
<div class="text-center"><h5>商品一覧</h5></div>
<!-- 検索フォーム -->
<div class="row justify-content-center my-3">
        <form action="{{ route('products.index') }}" method="GET">
            @csrf
            <div class="input-group">
                <div class="col-lg input-group-sm">
                    <input type="text" class="form-control" name="keyword" value="" aria-describedby="inputGroup-sizing-sm">
                </div>
                <div class="col-lg input-group-sm">
                  <select name='price_range' class='form-control'>
                      <option value='' hidden >価格帯を選択</option>
                      <option value='10000'>~¥10,000</option>
                      <option value='30000'>~¥30,000</option>
                      <option value='50000'>~¥50,000</option>
                      </select>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-outline-secondary btn-sm">検索</button>
                </div>
            </div>
        </form>
    </div>

<div class="row">
  @foreach($products as $product)
  <div class="col d-flex justify-content-center">
  <div class="card my-5 " style="width: 22rem;">
  <a href="{{ route('products.show',$product->id)}}" method="GET"><img src="{{asset('storage/'.$product['file_name'])}}" class="card-img-top" alt="..."></a>
  <div class="card-body">
    <div class="row text-center">
      <div class="col">
        <h5 class="card-title">{{ $product['name']}}</h5>
        <p class="card-text">¥{{ $product['price']}}</p>
      </div>
      @if($favorite_model->favorite_exist(Auth::user()->id,$product->id))
      <div class="col pt-2">
        <button type="button" class="js-favorite-toggle loved btn" data-productid="{{ $product->id }}">
        <i class="fas fa-heart"></i>
</button>
      </div>
      @else
      <div class="col pt-2">
        <button type="button" class="js-favorite-toggle btn" data-productid="{{ $product->id }}">
        <i class="far fa-heart"></i>
</button>
      </div>
      @endif
    </div>
  </div>
</div>
</div>
  @endforeach

</div>
<style>
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(function () {
    var favorite = $('.js-favorite-toggle');
    var favoriteProductId;
    favorite.on('click', function () {
        var $this = $(this);
        var heart = $(this).children('.fa-heart');
        favoriteProductId = $this.data('productid');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/ajaxfavorite',  //routeの記述
            type: 'POST', //受け取り方法の記述（GETもある）
            data: {
                'product_id': favoriteProductId //コントローラーに渡すパラメーター
            },
            dataType: 'json',
        })
        
        // Ajaxリクエストが成功した場合
        .done(function (data) {
            //lovedクラスを追加
            heart.toggleClass('fas');
            heart.toggleClass('far');
        })
        // Ajaxリクエストが失敗した場合
        .fail(function (data, xhr, err) {
            //ここの処理はエラーが出た時にエラー内容をわかるようにしておく。
            //とりあえず下記のように記述しておけばエラー内容が詳しくわかります。笑
                console.log('エラー');
            });
        
        return false;
    });
    });
    
</script>

@endsection

