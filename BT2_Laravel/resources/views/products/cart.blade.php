@extends('layouts.app')
@section('content')
<div>
    <h2>Danh sách sản phẩm trong giỏ hàng</h2>
</div>
<div>
    @if (!Session::has('cart'))
    <p>Chưa tồn tại giỏ hàng!</p>

    @else
    <table id = "loadTable" class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Hình ảnh</th>
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
            $cnt = 1;
            $sum = 0;
            @endphp
            @foreach ($ListProductCart as $key => $item)
            <tr>
                <td>{{ $cnt++ }}</td>
                <td><img class = "img-thumbnail" src="{{ $item['image'] }}" alt="{{ $item['name'] }}" width="70px" height="70px" srcset=""></td>
                <td>{{ $item['name'] }}</td>
                    <td><input onchange = "updateFuntion({{ $item['id'] }})" type="number" min="1" name="qty" id = "qty-{{ $item['id'] }}" value="{{ $item['qty'] }}"></td>
                <td>{{ number_format($item['price'] )}} VND</td>
                <td id="total-{{ $item['id'] }}" >{{ number_format($item['price'] *  $item['qty']) }} VND</td>
                <td><button style="border: transparent" onclick="deleteCart({{ $item['id'] }})"><i style="color: red"  class="far fa-trash-alt"></i></td>
            </tr>
            @php
               $sum+= ($item['price'] *  $item['qty'])
            @endphp
            @endforeach
            <tr>
                <td  colspan="5">Tổng tiền: </td>
                <td id = 'sum' colspan="2">{{ number_format( $sum )}} VND</td>
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


