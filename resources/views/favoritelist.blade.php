@extends('layouts.app')

@section('content')
<div class="text-center">お気に入りリスト</div>

@foreach($favorites as $favorite)
<div class="row d-flex justify-content-around m-5">
    <img src="{{asset('storage/'.$favorite['file_name'])}}" class="img-thumbnail w-25 h-25" alt="...">
  <div class="mt-5">
    <span class="d-block mt-3">商品名：{{ $favorite['name']}}</span>
    <span class="d-block mt-3">金額：{{ $favorite['price']}}</span>

    <span class="d-block fa-solid fa-heart mt-3" aria-hidden="true">お気に入り削除：<a href="{{route('favorite.destroy', $favorite->fa_id)}}"><button type="submit" class="btn btn-outline-danger" onclick='return confirm("お気に入りから削除しますか？");'>削除</button></a></span>
    </form>
  </div>
</div>
@endforeach

@endsection

