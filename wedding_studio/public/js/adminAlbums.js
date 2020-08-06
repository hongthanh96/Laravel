var album = album || {};

var url = location.origin;
album.openModal = function(){
    album.reset();
    $('#addEditAlbum').modal('show');
}

album.showAlbums = function(){
    $.ajax({
        url: url + "/albums/apiAlbum",
        type: 'GET',
        dataType: 'json',
        success:function(data){
            t.clear().draw();
            // $('#tbAlbum tbody').empty();
            $.each(data,function(i,v){
                    t.row.add( [
                        v.id,
                        v.name,
                       ` <a href="javascript:;" onclick="album.get(${v.id})"><i style="color: blue" class="fas fa-pen"></i></a>
                       <a href="javascript:;" onclick = "album.delete(${v.id})"><i style="color: red" class="fas fa-trash-alt"></i></a>`
                    ] ).draw( false );
        //         $('#tbAlbum tbody').append(
        //             ` <tr>
        //     <td>${v.id}</td>
        //     <td>${v.name}</td>
        //     <td>
                // <a href="javascript:;" onclick="album.get(${v.id})"><i style="color: blue" class="fas fa-pen"></i></a>
                // <a href="javascript:;" onclick = "album.delete(${v.id})"><i style="color: red" class="fas fa-trash-alt"></i></a>
        //     </td>
        // </tr>`
        //         )
            });
        }

    });
}


album.save = function(){
    if($('#fromAddEditAlbum').valid()){
        // create
        if($('#idAlbum').val() == 0){
            var obj = {};
            obj.name = $('#nameAlbum').val();
            $.ajax({
                url: url + '/albums/create',
                type: 'POST',
                contentType:"application/json",
                data : JSON.stringify(obj),
                success:function(data){
                    $('#addEditAlbum').modal('hide');
                    album.showAlbums();
                    alertify.success('Thêm album thành công!');
                },
                error:function(){
                    alertify.warning('Thêm album không thành công');
                }

            });
        }

    //edit
    else{
        var objAlbum = {};
        objAlbum.id = $('#idAlbum').val();
        objAlbum.name = $('#nameAlbum').val();
        let uri = url + '/albums/update/' + objAlbum.id;
        $.ajax({
            url:uri,
            type: 'PUT',
            contentType:"application/json",
            data : JSON.stringify(objAlbum),
            success:function(data){
                $('#addEditAlbum').modal('hide');
                album.showAlbums();
                alertify.success('Update album thành công!');
            },
            error:function(){
                alertify.warning('Uppdate album không thành công');
            }


        });

    }
}
}

album.get = function(id){
    $.ajax({
        url: url + "/albums/edit/" + id,
        type: 'GET',
        dataType: 'json',
        success:function(data){
            console.log(data);
            $('#idAlbum').val(data.id);
            $('#nameAlbum').val(data.name);
            $('#addEditAlbum').find(".modal-title").text('Edit Album');
            $('#addEditAlbum').modal('show');
        }

    });
}


album.delete = function(id){
    bootbox.confirm({
        title: "Delete Album?",
        message: "Bạn chắc chắn muốn xóa album này?",
        buttons: {
            cancel: {
                label: '<i class="fa fa-times"></i> NO'
            },
            confirm: {
                label: '<i class="fa fa-check"></i> YES'
            }
        },
        callback: function (result) {
            if(result){
                $.ajax({
                    url: url + "/albums/destroy/" +id,
                    type: 'DELETE',
                    dataType: 'json',
                    success:function(data){
                        console.log(data);
                        alertify.success('Xóa album thành công!');
                        album.showAlbums();
                    },
                    error:function(){
                        alertify.warning('Xóa sản phẩm thất bại!');
                    }
                });
            }

        }
    });
}

album.reset = function(){
    $('#nameAlbum').val("");
    $('#idAlbum').val('0');
    $('#addEditAlbum').find(".modal-title").text('Thêm loại album ảnh mới');
}

album.edit = function(){

}

album.init = function(){
    album.showAlbums();
}

$(document).ready( function () {

    album.init();
    t = $('#tbAlbum').DataTable();
} );
