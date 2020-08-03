@extends('admin.header')
@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <h1>Danh sách sản phẩm</h1>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
            Thêm sản phẩm mới</button>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Giá tiền</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                {{-- @php
                    dd($products);
                @endphp --}}
                @if (!isset($products))
                <tr>
                    <td colspan="5">Không có sản phẩm! </td>
                </tr>

                @else
                <tbody id='dataproduct'>
                    @foreach ($products as $item)
                    <tr id="p{{ $item->id }}">
                        <td id="id-{{ $item->id }}">{{ $item->id }}</td>
                        <td id="name-{{ $item->id }}">{{ $item->name }}</td>
                        <td id="image-{{ $item->id }}"><img class="img-thumbnail" src="{{ $item->image }}" alt="" srcset="" width="70px" height="70px">
                        </td>
                        <td id="price-{{ $item->id }}">{{ $item->price }}</td>
                        <td><button title="Delete Product" onclick="delProduct({{ $item->id }})"><i style='color: red' class='far fa-trash-alt'></i></button>
                            <button title=" Edit Product" data-toggle="modal" data-target="#editProduct" ><i style='color: seagreen' class='far fa-edit'></i></button>
                        </td>
                    </tr>
                    @endforeach

                    @endif
                </tbody>
            </table>




        <!-- Modal edit-->
        <div class="modal fade" id="editProduct" data-backdrop="static" data-keyboard="false" tabindex="-1"
            role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Chỉnh sửa sản phẩm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Mã sản phẩm</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="idProduct" value="{{ $item->id }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Tên sản phẩm</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nameProduct" value="{{ $item->name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Mô tả</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="descriptionProduct" value="{{ $item->description }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Giá sản phẩm</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="priceProduct" value="{{ $item->price }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Hình ảnh</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="imageProduct" value="{{ $item->image }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" onclick="editProduct({{ $item->id }})">Save
                                        changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>




        <!-- Modal add -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
            role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Thêm sản phẩm mới</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Mã sản phẩm</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="id" placeholder="Nhập mã sản phẩm">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Tên sản phẩm</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" placeholder="Nhập tên sản phẩm">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Mô tả</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="description"
                                        placeholder="Nhập mô tả sản phẩm">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Giá sản phẩm</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="price" placeholder="Nhập giá sản phẩm">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Hình ảnh</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="image" placeholder="Chọn file hình ảnh">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" onclick="addProduct()">Save
                                        changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>




    </div>
</div>
@endsection

<script>

    function editProduct(id){
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: "{{ route('admin.editProduct') }}",
            dataType: 'json',
            data:{

                id:id,
                name: $('#nameProduct').val(),
                description: $('#descriptionProduct').val(),
                price: $('#priceProduct').val(),
                image: $('#imageProduct').val(),
                _token: '{{ csrf_token() }}'
            },
            success:function(product){
                $('#id-' + id).text(product.id);
                $('#name-' + id).text(product.name);
                img= `<img class="img-thumbnail" src="${product.image}" alt="" srcset="" width="70px" height="70px">`
                $('#image-' + id).html(img);
                $('#price-' + id).text(product.price);
                $('#editProduct').modal('hide');
                alertify.success('update sản phẩm thành công!');
            },
            error:function(){
                alertify.warning('Update sản phẩm không thành công!');
            }
        });
    }


    function delProduct(id){
        $.ajax({
            type: 'GET',
            url: '{{ route("admin.delProduct") }}',
            dataType: 'json',
            data:{
                id:id
            },
        success:function(){
            $('#p'+ id).remove();
            alertify.success('Đã xóa sản phẩm thành công!')
        },
        error:function(){
            alertify.warning('Xóa sản phẩm không thành công!')
        }
        });
    }




    function addProduct(){
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'GET',
            url: "{{ route('admin.addProduct') }}",
            dataType: 'json',
            data: {
                id: $('#id').val(),
                name: $('#name').val(),
                image: $('#image').val(),
                description: $('#description').val(),
                price: $('#price').val(),
                _token: '{{ csrf_token() }}'
            },
            success:function(data){
                console.log(data);
                row = "<tr>" +
                    "<td>" + data.id + "</td>" +
                    "<td>" + data.name + "</td>" +
                    "<td><img class='img-thumbnail' src='" + data.image + "'width='70px' height='70px'>" + "</td>" +
                    "<td>" + data.description + "</td>" +
                    "<td>" + data.price + "</td>" +
                    "<td>" + "<a href='javascript:;' title = 'Delete product'><i style='color: red' class='far fa-trash-alt'></i></a>" +
                        "<a href='javascript:;' title = 'Edit product'><i style='color: seagreen' class='far fa-edit'></i></a>" +
                    "</td>" +
                "</tr>"

                $('#id').val("") ;
                $('#name').val("") ;
                $('#image').val("") ;
                $('#description').val("") ;
                $('#price').val("") ;
                $('#staticBackdrop').modal('hide');
                $('table1').append(`${row}`);
                alertify.success('Đã thêm sản phẩm thành công!');
            },
            error: function(){
                 alertify.warning('Thêm sản phẩm không thành công!!');
            }
        });
    }
</script>
