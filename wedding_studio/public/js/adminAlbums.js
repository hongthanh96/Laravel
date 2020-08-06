var album = album || {};
// CONST URLL = 'http://127.0.0.1:8000/admin/albums';

var url = 'http://127.0.0.1:8000/'
album.openModal = function(){
    $('#addAlbum').modal('show');
}
album.save = function(){
    // if($('#fromAddEditAlbum').valid()){
        // create
        // if($('#idAlbum').val() == 0){
            // var createObj = {};
            // createObj.id = $('#id').val();
            // createObj.name = $('#name').val();
            var id = $('#id').val();
            var name = $('#name').val();

            $.ajax({
                url: url + "admin/albums/create",
                type: 'POST',
                dataType: 'json',
                data: {
                    id: id,
                    name: name
                },
                success:function(data){
                    console.log(data);
                    $('#addAlbum').modal('hide');
                    alertify.success('Đã thêm loại album thành công!');
                },
                error:function(){
                    alertify.warning('Thêm loại album không thành công!');
                }

            });
        // }
    }
// }






$(document).ready( function () {
    $('#dataTable').DataTable();
} );
