var url = location.origin;
 var ObjCustomer = ObjCustomer || {}

 ObjCustomer.showCustomer = function(){

    $.ajax({
        url: url + '/user/apiUser',
        type: 'GET',
        dataType:'json',
        success:function(data){
            console.log(data)
            $('#tbody').empty();
            $.each(data,function(i,v){
                var block = (v.block == '0') ? `<a href="" class="btn btn-primary">Open</a>` : `<a href="" class="btn btn-danger">Open</a>`
                var role = (v.role == '0') ?  `<i class="fas fa-crown" style="color: gray; font-size: 30px"></i>` : `<i class="fas fa-crown"style="color: rgb(177, 177, 17); font-size: 30px"></i>`
                $('#tbody').append(
                `  <tr>
                    <td>${v.id}</td>
                    <td><img src="${v.image}" alt="" srcset="" class="rounded mx-auto d-block" style="width: 70px; height: 70px;"></td>
                    <td>${v.name}</td>
                    <td>${v.email}</td>
                    <td>${v.isAdmin}</td>
                    <td>${role}</td>
                    <td>${block}</td>
                 </tr>`
                )
            })
        }

    });
 }

 ObjCustomer.init = function(){
     ObjCustomer.showCustomer();
 }
  $(document).ready(function(){
    ObjCustomer.init();
  })
