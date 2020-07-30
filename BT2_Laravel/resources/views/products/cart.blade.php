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
                    <td><input onchange = "updateFuntion({{ $item['id'] }})" type="number" min="1" name="qty" id = "qty-{{ $item['id'] }}" value="{{ $item['qty'] }}"></td>
                <td>{{ $item['price'] }}</td>
                <td id="total-{{ $item['id'] }}" >{{ $sum[] = $item['price'] *  $item['qty'] }}</td>
                <td><button style="border: transparent" onclick="deleteCart({{ $item['id'] }})"><i style="color: red"  class="far fa-trash-alt"></i></td>
            </tr>
            @endforeach
            <tr>
                <td  colspan="4">Tổng tiền: </td>
                <td id = 'sum' colspan="2">{{ array_sum($sum) }}</td>
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

<script>
    function updateFuntion(id){
        $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: "{{ route('cart.updatecart') }}",
        dataType: 'json',
        data: {
            id: id,
            qty: $('#qty-' + id).val(),
            _token: '{{ csrf_token() }}'
        },
        success:function(data){
            console.log(data);
            $('#qty-' + id).text(data[0]);
            $('#total-' +id).text(data[1]);
            $('#sum').text(data[2]);
            alertify.success('Đã update số lượng thành công!');
        },
        error: function(){
             alertify.warning('Update không thành công!!');
        }
    });

    }

    function deleteCart(id){
        $.ajax({
            type:'GET',
            url: "{{ route('cart.delcart') }}",
            dataType: 'json',
            data:{
                id:id
            },
            success:function(mess){
                alertify.success(mess);
                $("#loadTable").load(" #loadTable");
            }
        });
    }
</script>
