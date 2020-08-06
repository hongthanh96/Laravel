@extends('admin.layouts')
@section('content')
<div>
    <a href="javascript:;" class="btn btn-primary" data-toggle="modal" data-target="#addAlbum">Thêm album</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Mã album</th>
                <th>Tên album</th>
                <th>Mô tả</th>
                <th>Nổi bật</th>
                <th>Ảnh</th>
                <th>Bộ album</th>
            </tr>
        </thead>
        <tbody id="table-data">


        </tbody>
        {{-- <tbody>
            @if ($albumDetail != null)
            <tr>
                <td colspan="7">Không tồn tại album nào!</td>
            </tr>
            @else
            @forelse ($albumDetail as $album)
                <tr>
                    <td>123</td>
                </tr>
            @empty
            <tr>
                <td colspan="7">Không tồn tại album nào!</td>
            </tr>

            @endforelse
            @endif

        </tbody> --}}
    </table>

    <!-- Modal -->
    <div class="modal fade" id="addAlbum" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm album mới</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('albumDetail.store') }}" method="POST"  enctype="multipart/form-data">
                    @csrf
                <div class="modal-body">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Tên album</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên album">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Mô tả album</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="description" name="description" placeholder="Nhập mô tả album">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Album nổi bật</label>
                            <div class="col-sm-9">
                                <select name="isHot" id="">
                                    <option value="1">Hot</option>
                                    <option value="0">No Hot</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Hình ảnh</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Album ảnh</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="fileName"  name="filename[]" multiple>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Loại Album</label>
                            <div class="col-sm-9">
                                <select name="album_id" id="">
                                    @forelse ($albumss as $album)
                                        <option value="{{ $album->id }}">{{ $album->name }}</option>
                                    @empty
                                        <option value="noHot">ko có</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                    <button class="btn btn-primary">Save changes</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection


@push('scripts')
<script>

    function storeAlbumDetail(){

    }

    function getAlbumDetail(){
        $.ajax({
        url: "http://127.0.0.1:8000/admin/api/album",
        type: "GET",
        success: function (response) {
            // console.log(response);
           $.each(response, function(index,value){
               let imgArr = JSON.parse(value.filename);
               $("#table-data").append(
                   `<tr>
                        <td>${value.id}</td>
                        <td>${value.name}</td>
                        <td>${value.description}</td>
                        <td>${value.isHot}</td>
                        <td><img src="{{ asset('/upload/${value.image}') }}" /></td>
                        <td><img src="{{ asset('/upload/${imgArr[0]}') }}" />

                            <a href="#" > Xem thêm</a>
                        </td>
                    </tr>`
               )
           })
            }
        });
    }

    $(document).ready( function () {
        console.log('dsadsa');
        getAlbumDetail();
    });
</script>
@endpush