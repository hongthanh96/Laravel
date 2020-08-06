var album = album || {};

var url = 'http://127.0.0.1:8000/';
album.openModal = function(){
    album.reset();
    $('#addEditAlbum').modal('show');
}

album.showAlbums = function(){
    $.ajax({
        url: url + "albums/apiAlbum",
        type: 'GET',
        dataType: 'json',
        success:function(data){
            $('#tbAlbum tbody').empty();
            $.each(data,function(i,v){
                $('#tbAlbum tbody').append(
                    ` <tr>
            <td>${v.id}</td>
            <td>${v.name}</td>
            <td>
                <a href="javascript:;" onclick=""><i style="color: blue" class="fas fa-pen"></i></a>
                <a href="javascript:;"><i style="color: red" class="fas fa-trash-alt"></i></a>
            </td>
        </tr>`
                )
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
                url: url + 'albums/create',
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
    }

    else{
        var objAlbum = {};
        objAlbum.id = $('#idAlbum');
        objAlbum.name = $('#nameAlbum');
        $.ajax({
            url: url + 'albums/edit/' + objAlbum.id,
            type: 'PUT',
            contentType:"application/json",
            data : JSON.stringify(objAlbum),
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
}


album.reset = function(){
    $('#nameAlbum').val("");
}

album.edit = function(){

}

album.init = function(){
    album.showAlbums();
}

$(document).ready( function () {
    $('#tbAlbum').DataTable();
    album.init();
} );
