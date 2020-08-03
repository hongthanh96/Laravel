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
            $('#total-' +id).text(Number(data[1]).toLocaleString('en') + ' VND');
            $('#sum').text(Number(data[2]).toLocaleString('en') + ' VND');
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
