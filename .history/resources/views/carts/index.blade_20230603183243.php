@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center mt-3">
  <div class="w-75">
    <h1>ショッピングカート</h1>

    <div class="row">
      <div class="offset-8 col-4">
        <div class="row">
          <div class="col-6">
            <h2>数量</h2>
          </div>
        </div>
      </div>
    </div>

    <hr>

    <div class="row">
      @foreach($cart as $product)
      <div class="col-md-2 mt-2">
        <a href="{{route('products.show',$product->id)}}">
          <img src="{{ asset('img/dummy/png')}}" class="img-fluid w-100">
        </a>
      </div>
      <div class="col-md-6 mt-4">
        <h3 class="mt-4">{{$product->name}}</h3>
      </div>
      <div class="col-md-2">
        <h3 class="w-100 mt-4">{{$product->qty}}</h3>
      </div>
      <div class="w-100 mt-4">¥{{$product->qty * $product->price}}</h3>
    </div>
    @endforeach
  </div>

  <hr>

  <div class="offset-8 col-4">
    <div class="row">
      <div class="col-6">
        <h2>合計</h2>
      </div>
      <div class="col-6">
        <h2>¥{{$total}}</h2>
      </div>
      <div class="col-12 d-flex justify-content-end">
        表示価格は税込みです
      </div>
    </div>
  </div>
</div>
@endsection

