@extends('font-end.layout')
@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <ul class="navbar-nav mx-auto">
        @foreach($cate as $cate)
            <li class="nav-item ">
                <a class="nav-link" href="{{route('catePro',$cate->id)}}">{{$cate->name}}</a>
            </li>
        @endforeach
    </ul>
</nav>
@foreach($pro as $pro)
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="{{ asset("/upload/avatar/$pro->image") }}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{$pro->name}}</h5>
            <div class="d-flex">
                <p class="card-text">Giá:{{$pro->price}}</p>
                <p class="card-text ml-4">Số lượng:{{$pro->amount}}</p>
            </div>
          <a href="#" class="btn btn-primary">Mua Ngay</a>
        </div>
    </div>
@endforeach
@endsection
