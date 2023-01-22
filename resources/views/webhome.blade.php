@extends('layouts.app')

@section('content')
<div class="row d-flex justify-content-around">
  @foreach($products as $product)
  <p>
    <span class="text-center d-block fa-solid fa-heart" aria-hidden="true">お気に入り:</span>
    <a href="{{ route('products.show',$product->id)}}" method="GET"><img src="..." class="img-thumbnail" alt="..."></a>
    <span class="text-center d-block" name='name'>{{ $product['name']}}</span>
    <span class="text-center d-block" name='price'>¥{{ $product['price']}}</span>
  </p>
  @endforeach
  <p>
</div>
@endsection

