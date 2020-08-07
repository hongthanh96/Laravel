
var albumDetail = albumDetail || {};
var url = location.origin;

albumDetail.showDetail = function(){
    $.ajax({
        url: url + "/albumDetail/apiDetailAlbum",
        type: 'GET',
        dataType: 'json',
        success:function(data){
            $("#table-data").empty();
            $.each(data, function(i,value){
                console.log(value.filename)
                $("#table-data").append(
                    `
                    <tr>
                        <td>${value.id}</td>
                        <td>${value.name}</td>
                        <td>${value.description}</td>
                        <td>${value.isHot}</td>
                        <td>${value.album_id}</td>
                        <td><img src='/upload/${value.image}' class='img-thumbnail' style="width: 70px; height: 70px;"/></td>
                        <td>
                           <a href="javascript:;" onclick = albumDetail.ModalImage(${value.id})> Xem thêm </a>
                        </td>
                        <td>
                        <a href="javascript:;" onclick="albumDetail.get(${value.id})"><i style="color: blue" class="fas fa-pen"></i></a>
                        <a href="javascript:;" onclick = "albumDetail.delete(${value.id})"><i style="color: red" class="fas fa-trash-alt"></i></a>

                        </td>
                    </tr>
                    `
                )
            });

            $('#tbAlbum').DataTable();
        }
    });
}


albumDetail.save = function(){
    if($('#frAlbumDetail').valid()){
         // create
        if($('#idAlbumDetail').val() == 0){
            // var objDetail = {};
            // objDetail.name = $('#name').val();
            // objDetail.description = $('#description').val();
            // objDetail.isHot = $('#isHot').val();
            // objDetail.image = $('#image')[0].files[0];
            // console.log(objDetail.image)
            // objDetail.fileName ="aaaa";

            var formData = new FormData();
            formData.append('name', $('#name').val());
            formData.append('description', $('#description').val());
            formData.append('isHot', $('#isHot').val());
            formData.append('image', $('#image')[0].files[0]);
            formData.append('album_id', $('#album_id').val());
            for(let i = 0 ; i< $('#filename')[0].files.length ; i++){
                formData.append("filename[]", $('#filename')[0].files[i]);
            }

            // formData.append('filename', $('#filename').files);
            $.ajax({
                url: url + "/albumDetail/create",
                type:'POST',
                // dataType: 'json',
                contentType: false,
                processData: false,
                data: formData,
                success:function(data){
                    console.log(data);
                    $('#addEditAlbumDetail').modal('hide');
                    albumDetail.showDetail();
                    alertify.success('Thêm album thành công!');
                },
                error:function(){
                    // console.log('lỗi');
                    alertify.error('Thêm album không thành công!');
                }
            });

        }
        // update
        else{

        }
    }
}

albumDetail.openModal = function(){
    $('#addEditAlbumDetail').modal('show');
}

albumDetail.reset = function(){
    // $('#idAlbumDetail').val('0');
    $('#name').val("");
    $('#description').val("");
    $('#isHot').val("");
    $('#image').val("");
    $('#image').val("");
    $('#fileName').val("");

}

albumDetail.get = function(id){

}

albumDetail.delete = function(id){
    // $.ajax({
    //     url: url + "/"
    // })
}


albumDetail.showImage = function(id) {
    $.ajax({
        url: url + "/albumDetail/apiDetailAlbum/" + id,
        type: 'GET',
        dataType: 'json',
        success:function(data){
            console.log(data);
            // $("#table-data").empty();
            // $.each(data, function(i,value){
            //     console.log(da)

            // });
        }
    });
}
albumDetail.init = function(){
    albumDetail.showDetail();
}

$(document).ready( function () {
    albumDetail.init();
    // t =  $('#tbAlbum').DataTable();
} );
