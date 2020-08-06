@extends('admin.layouts')
@section('content')
<div>
    <div class="mb-2">
        <a href="javascript:;" class="btn btn-success" onclick="album.openModal()">Add albums</a>
    </div>
    <div>
        <table class="table table-striped" id="dataTable">
            <thead>
                <th>id</th>
                <th>Name</th>
                <th>Action</th>
            </thead>
            @if (!isset($albums))
            <tr>
                <td colspan="3">Không có loại album tồn tại</td>
            </tr>

            @else
                <tbody>
                    @forelse ($albums as $album)
                    <tr>
                        <td>{{ $album->id }}</td>
                        <td>{{ $album->name }}</td>
                        <td>
                            <a href="javascript:;"><i style="color: blue" class="fas fa-pen"></i></a>
                            <a href="javascript:;"><i style="color: red" class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="3">Không có dữ liệu data</td>
                    </tr>

                    @endforelse
                </tbody>

            @endif
        </table>
    </div>


 <!-- Modal add delete-->
 <div class="modal fade" id="addAlbum" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
 aria-labelledby="staticBackdropLabel" aria-hidden="true">
 <div class="modal-dialog">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" id="staticBackdropLabel">Thêm loại album ảnh mới</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
         <div class="modal-body">
             <form id="fromAddEditAlbum">
                 <input type="hidden" id="idAlbum" name="idAlbum" value="0">
                 <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Tên mã loại album</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="id" placeholder="Nhập mã loại album">
                    </div>
                </div>
                 <div class="form-group row">
                     <label for="" class="col-sm-3 col-form-label">Tên loại album</label>
                     <div class="col-sm-9">
                         <input type="text" class="form-control" id="name" placeholder="Nhập tên loại album">
                     </div>
                 </div>
                 <div class="form-group row">
                     <div class="col-sm-9">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         <button type="button" class="btn btn-primary" onclick="album.save()">Save
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
@push('scripts')
<script src="{{ asset('js/adminAlbums.js') }}"></script>
@endpush
