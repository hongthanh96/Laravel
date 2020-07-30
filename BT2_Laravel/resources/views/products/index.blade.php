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

                <a onclick = "addCart({{ $product->id }})" href="javascript:" class = "btn btn-primary">Thêm vào giỏ hàng</a>

            </div>
        </div>
    </div>
    @endforeach
    @endif
</div>
<a href="{{ route('cart.displaycart') }}" class="btn btn-primary">Xem giỏ hàng</a>


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
            alertify.success(mess);
            },
            error: function(){
                alertify.warning('Thêm thất bại!');
        }
        })

    }
</script>
@endsection
