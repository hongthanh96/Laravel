@extends('layouts.app')
@section('content')
<div class="title m-b-md">
    Danh sách sản phẩm
</div>

<div class="row">

    <!-- Kiểm tra biến $products được truyền sang từ ProductController -->
    <!-- Nếu biến $products không tồn tại hoặc có số lượng băng 0 (không có sản phẩm nào) thì hiển thị thông báo -->
    @if(!isset($products) || count($products) === 0)
    <p class="text-danger">Không có sản phẩn nào.</p>
    @else

    <!-- Nếu biến $products tồn tại thì hiển thị sản phẩm -->
    @foreach($products as $key => $product)
    <div class="col-4">
        <div class="card text-left" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">{{ $product->description }}</p>
                <p class="card-text text-dark">${{ $product->price }}</p>
                <p class="card-text text-danger">Số lượt xem: {{ $product->view_count }}</p>

                <!-- Nút XEM chuyển hướng người dùng sang trang chi tiết -->
                <a href="{{ route('products.show', $product) }}" class="btn btn-primary">Xem</a>
                {{-- <a href="{{ route('products.addcart',$product) }}" class = "btn btn-primary">Thêm vào giỏ hàng</a> --}}

                <a onclick = "addCart({{ $product }})" href="javascript:" class = "btn btn-primary">Thêm vào giỏ hàng</a>

            </div>
        </div>
    </div>
    @endforeach
    @endif
</div>
<a href="{{ route('products.displaycart') }}" class="btn btn-primary">Xem giỏ hàng</a>


<script>
    function addCart(product){
        $.ajax({
            url:'http://127.0.0.1:8000/products/Ajaxaddcart/' + product['id'],
            type: 'GET',
        }).done(function(response){
            alertify.success('Đã thêm vào giỏ hàng thành công!');
        });
    }
</script>
@endsection
