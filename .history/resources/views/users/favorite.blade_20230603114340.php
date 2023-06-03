@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center mt-3">
  <div class="w-75">
    <h1>お気に入り</h1>

    <hr>

    <div class="row">
      @foreach($favorites as $fav)
      <div class="col-md-7 mt-2">
        <div class="d-inline-flex">
          <a href="{{route('products.show', $fav->favoritable_id)}}" class="w-25">
            <img src="{{ asset('img/dummy.png')}}" class="img-fluid w-100">
          </a>
          <div class="container mt-3">
            <h5 class="w-100 samuraimart-favorite-item-text">{{App\Models\Product::find($fav->favoritable_id)->name}}</h5>
            <h6 class="w-100 samuraimart-favorite-item-text">&yen;{{App\Models\Product::find($fav->favoritable_id)->price}}</h6>
          </div>
        </div>
      </div>
      <div class="col-md-2 d-flex align-items-center justify-content-end">
        <a href="{{ route('products.favorite',$fav->favoritable_id) }}" class="samuraimart-favorite-item-delete">
          削除  
        </a>
      </div>
      <div class="col-md-3 d-flex align-items-center justify-content-end">
        <button type="submit" class="btn samuraimart-favorite-add-cart">カートに入れる</button>
      </div>
      @endforeach
    </div>

    <hr>
  </div>
</div>
@endsection
