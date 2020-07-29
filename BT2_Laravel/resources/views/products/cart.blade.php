@extends('layouts.app')
@section('content')
<div>
    <h2>Danh sách sản phẩm trong giỏ hàng</h2>
</div>
<div>
    @if (!Session::has('cart'))
    <p>Chưa tồn tại giỏ hàng!</p>

    @else

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Giá sản phẩm</th>
                <th scope="col">Thành tiền</th>
                <th scope="col">Thao tác</th>

            </tr>
        </thead>
        <tbody>
            @if (!empty($ListProductCart))
            @php
            $cnt = 1
            @endphp
            @foreach ($ListProductCart as $key => $item)
            <tr>
                <td>{{ $cnt++ }}</td>
                <td>{{ $item['name'] }}</td>
                <form action="{{ route('products.updatecart',$item) }}" method="post">
                    @csrf
                    <td><input type="number" min='0' name="qty" value="{{ $item['qty'] }}"><input type="submit"
                            value="update"></td>
                </form>
                <td>{{ $item['price'] }}</td>
                <td>{{ $sum[] = $item['price'] *  $item['qty'] }}</td>
                <td><a href="{{ route('products.delcart',$item) }}">Delete</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="4">Tổng tiền: </td>
                <td colspan="2">{{ array_sum($sum) }}</td>
            </tr>
            @else
            <tr>
                <td colspan="6">Chưa có sản phẩm trong giỏ hàng!</td>
            </tr>

            @endif


        </tbody>
    </table>
        <a href="{{ route('products.index') }}" class="btn btn-primary">< Quay lại</a>
    @endif
</div>
@endsection
