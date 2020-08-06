
var albumDetail = albumDetail || {};
var url = location.origin;

albumDetail.showDetail = function(){
    $.ajax({
        url: url + "/albumDetail/apiDetailAlbum",
        type: 'GET',
        dataType: 'json',
        success:function(data){
            $.each(data, function(i,v){
                let imgArr = JSON.parse(v.filename);
                console.log(imgArr);
                t.row.add( [
                    v.id,
                    v.name,
                    v.description,
                    v.isHot,
                    `<img src="upload/${v.image}" alt="" class="img-thumbnail" style="width: 70px ; height: 70px;">`,
                    $.each(imgArr,function(index,value){
                    `<img src="upload/${value}" alt="" class="img-thumbnail" style="width: 50px ; height: 50px;">`
                    }),
                    ` <a href="javascript:;" onclick="albumDetail.get(${v.id})"><i style="color: blue" class="fas fa-pen"></i></a>
                       <a href="javascript:;" onclick = "albumDetail.delete(${v.id})"><i style="color: red" class="fas fa-trash-alt"></i></a>`
                ] ).draw( false );
            });
        },
        error:function(){
            console.log('lỗi');
        }
    });
}


albumDetail.save = function(){
    if($('#frAlbumDetail').valid()){
         // create
        if($('#idAlbumDetail').val() == 0){
            var objDetail = {};
            objDetail.id = $('#idAlbumDetail').val();
            objDetail.name = $('#name').val();
            objDetail.description = $('#description').val();
            objDetail.isHot = $('#isHot').val();
            objDetail.image = $('#image').val();
            objDetail.fileName = $('#fileName').val();
            objDetail.name = $('#name').val();
            $.ajax({
                url: url + "/albumDetail/create",
                type:'POST',
                dataType: 'json',
                data: JSON.stringify(objDetail)
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

albumDetail.get = function(id){

}

albumDetail.delete = function(id){

}



albumDetail.init = function(){
    albumDetail.showDetail();
}

$(document).ready( function () {
    albumDetail.init();
    t =  $('#tbAlbum').DataTable();
} );
