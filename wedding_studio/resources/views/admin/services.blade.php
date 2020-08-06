@extends('admin.layouts')
@section('content')
<div>
    <button class="btn btn-primary" data-toggle="modal" data-target="#addService">Thêm dịch vụ</button>
    <table class="table table-striped" id="loadTable">
        <thead>
            <tr>
                <th scope="col">Mã dịch vụ</th>
                <th scope="col">Tên dịch vụ</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        @if (!isset($services))
        <tr>
            <td colspan="3">Không tồn tại dịch vụ nào!</td>
        </tr>
        @else
        <tbody id="dataTable">
            @forelse ($services as $item)
            <tr id="p-{{ $item->id }}">
                <th id="id-{{ $item->id }}" scope="row">{{ $item->id }}</th>
                <td id="name-{{ $item->id }}">{{ $item->name }}</td>
                <td><button style="border: transparent"
                        onclick="getService({{ $item->id }})"><i style="color: blue" class="fas fa-pen"></i></button>
                    <button style="border: transparent" data-toggle="modal" data-target="#delService{{ $item->id }}"><i
                            style="color: red" class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
             {{-- modal del --}}
             <div class="modal" tabindex="-1" role="dialog" id="delService{{ $item->id }}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Delete Service</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Bạn chắc chắn muốn xóa? </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary"
                                onclick="delService({{ $item->id }})">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <tr>
                <td colspan="3">Không tồn tại dịch vụ nào!</td>
            </tr>

            @endforelse
        </tbody>

        @endif
    </table>


    <!-- Modal add -->
    <div class="modal fade" id="addService" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Thêm dịch vụ mới</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Mã dịch vụ</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="id" placeholder="Nhập mã dịch vụ">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Tên dịch vụ</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" placeholder="Nhập tên dịch vụ">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-9">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="addService()">Save
                                    changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal edit -->
    <div class="modal fade" id="editService" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Chỉnh sửa dịch vụ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Mã dịch vụ</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="idService">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Tên dịch vụ</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nameService">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-9">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary"
                                    onclick="editService()">Save
                                    changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




</div>
@endsection


<script>
    function addService(){
        let id =  $('#id').val();
        let name = $('#name').val();
        $.ajax({
            type: 'GET',
            url:"{{ route('service.create') }}",
            dataType:'json',
            data:{
                id: id,
                name: name
            },
            success:function(service){
               row ="<tr>" +
              "<th scope='row'>" + service.id + "</th>" +
              "<td>" + service.name + "</td>" +
              "<td><button style='border: transparent' data-toggle='modal' data-target='#editService' onclick='getService(" + service.id + ")'><i style='color: blue' class='fas fa-pen'></i></button>" +
                    "<button style='border: transparent' data-toggle='modal' data-target='#delService" + service.id +"'><i style='color: red' class='fas fa-trash-alt'></i></button>" +
               "</td>" +
            "</tr>"
            $('#id').val("");
            $('#name').val("");
            $('#addService').modal('hide');
            $('#dataTable').append(`${row}`);
            alertify.success('Đã thêm sản phẩm thành công!');

            },
            error:function(){
                alertify.warning('Thêm sản phẩm KHÔNG thành công!');
            }
        });
    }

    function getService(id){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'POST',
            url: '{{ route("service.edit") }}',
            dataType: 'json',
            data: {
                id: id,
                _token: '{{ csrf_token() }}'

            },
            success:function(service){
                console.log(service);
                $('#idService').val(service.id);
                $('#nameService').val(service.name);
                $('#editService').modal('show');
            }

        });
    }

    function editService(){
        id =  $('#idService').val();
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: "{{ route('service.update') }}",
            dataType:'json',
            data: {
                id:id,
                nameService: $('#nameService').val(),
                _token: '{{ csrf_token() }}'
            },
            success:function(service){
                console.log(service.name);
                $('#name-' + id).text(service.name);
                $('#idService').val("");
                $('#nameService').val("");

                $('#editService').modal('hide');

                alertify.success('Đã update sản phẩm thành công!');
            },
            error:function(){
                alertify.warning('Update sản phẩm không thành công!');
            }

        });
    }

    function delService(id){
        $.ajax({
            type: 'GET',
            url: "{{ route('service.destroy') }}",
            dataType: 'json',
            data: {
                id: id
            },
            success:function(mess){
                $('#p' + id).remove();
                // $("#loadTable").load('#loadTable');
                $("#delService" + id).modal('hide');
                alertify.success(mess);
            },
            error:function(){
                alertify.warning('Xóa dịch vụ thất bại!')
            }
        });
    }



</script>
