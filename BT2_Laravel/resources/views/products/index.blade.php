@extends('layouts.app')
@section('content')
<nav class="navbar navbar-light bg-light">
    <form class="form-inline">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <div class="btn-group dropleft" id="loadTable">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false"><i class="fas fa-shopping-cart"
                style="color: red; font-size:30px"></i>
        </button>

        <div class="dropdown-menu" style="overflow-y: scroll; height:300px" aria-labelledby="dropdownMenuButton">
            @if ($ListProductCart != null)

            @php
            $total = 0;
            @endphp
            @foreach ($ListProductCart as $item)
            <div class="card mb-3" style="width: 400px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="{{ $item->image }}" class="card-img" alt="...">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h5 class="card-title">{{$item->name}}</h5>
                            <p class="card-text">SL : <input onchange="updateFuntion({{ $item->id }})" type="number"
                                    min="1" name="qty" id="qty-{{ $item->id }}" value="{{ $item->qty }}"></p>
                            <p class="card-text"><small class="text-muted" id="total-{{ $item->id }}">Thành tiền :
                                    {{number_format($item->qty * $item->price)." VNĐ"}}</small></p>
                        </div>
                    </div>
                    <div class="col-md-1"><button style="border: transparent"
                            onclick="deleteCart({{ $item->id }})">X</button></div>

                </div>
            </div>
            @php
            $total += ($item->qty * $item->price);
            @endphp
            @endforeach
            <div class="card mb-3" style="width: 400px;">
                <p id='sum'>Tổng cộng: {{ number_format($total) }} VND</p>
            </div>
        </div>

        @else
        <div class="dropdown-item">
            <p class="text-info">Hiện không có sản phẩm</p>
        </div>
        @endif
        <div class="dropdown-divider"></div>
        <a href="{{route('cart.displaycart')}}" class="dropdown-item" style="color: red">Xem chi tiết</a>
    </div>
</nav>
@yield('nav')




<div class="title m-b-md">
    <h1 class="text-center"> Danh sách sản phẩm</h1>
</div>

<div class="row">
    @if(!isset($products) || count($products) === 0)
    <p class="text-danger">Không có sản phẩn nào.</p>
    @else

    @foreach($products as $key => $product)
    <div class="col-4">
        <div class="card text-left" style="width: 18rem;">
            <div class="card-body">
                <img class="card-img-top" src="{{ $product->image }}" alt="{{ $product->name }}" srcset="">
                <h5 class="card-title">{{ $product->name }}</h5>
                {{-- <p class="card-text">{{ $product->description }}</p> --}}
                <p class="card-text text-dark"> {{ number_format($product->price) }} VND</p>
                <p class="card-text text-danger">Số lượt xem: {{ $product->view_count }}</p>
                <a href="{{ route('products.show', $product) }}" class="btn btn-primary">Xem</a>

                <a onclick="addCart({{ $product->id }})" href="javascript:" class="btn btn-primary">Thêm vào giỏ
                    hàng</a>

            </div>
        </div>
    </div>
    @endforeach
    @endif
</div>
{{-- <a href="{{ route('cart.displaycart') }}" class="btn btn-primary">Xem giỏ hàng</a> --}}


<script>
    function addCart(id){
        $.ajax({
            url: "{{ route('cart.Ajaxaddcart') }}",
            type: 'GET',
            dataType: 'json',
            data:{
                id:id
            },
            success:function(mess){
                $("#loadTable").load(" #loadTable");
            alertify.success(mess);
            },
            error: function(){
                alertify.warning('Thêm thất bại!');
        }
        })

    }
    $('.dropleft').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});
</script>
@endsection
