@extends('layouts.app')
@section('content')
    <div class="title m-b-md">
        Chi tiết sản phẩm
    </div>

    <div class="row">

        <!-- Kiểm tra biến $product được truyền sang từ ProductController -->
        <!-- Nếu biến $products không tồn tại thì hiển thị thông báo -->
        @if(!isset($product))
            <p class="text-danger">Không có sản phẩn nào.</p>
        @else

            <!-- Nếu biến $product tồn tại thì hiển thị sản phẩm -->
                <div class="col-12">
                    <div class="card text-left" style="width: 20rem;">
                        <div class="card-body">
                            <img class = "card-img-top" src="{{ $product->image }}" alt="{{ $product->name }}" srcset="">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text text-dark">{{ number_format($product->price) }}</p>
                            <p class="card-text text-danger">Số lượt xem: {{ $product->view_count }}</p>
                            <a onclick = "addCart({{ $product->id }})" href="javascript:" class = "btn btn-primary">Thêm vào giỏ hàng</a>
                            <!-- Nút XEM chuyển hướng người dùng quay lại trang danh sách sản phẩm -->
                            <a href="{{ route('products.index') }}" class="btn btn-primary">< Quay lại </a>
                        </div>
                    </div>
                </div>
        @endif
    </div>

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
