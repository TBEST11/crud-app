<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud App Using PHP</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.5.0/css/all.min.css" integrity="sha512-QfDd74mlg8afgSqm3Vq2Q65e9b3xMhJB4GZ9OcHDVy1hZ6pqBJPWWnMsKDXM7NINoKqJANNGBuVRIpIJ5dogfA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="https://cdn.datatables.net/v/bs4/dt-1.13.8/datatables.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#"><i class="fab fa-wolf-pack-battalion"></i>&nbsp;&nbsp;TBEST</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">HOME</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">BLOG</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">ABOUT</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">CONTACT US</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h4 class="text-center text-danger frot-weight-normal my-3"> CRUD APPLICATION USING PHP-OOP ETC</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <h4 class="mt-2 text-primary">All User in Database</h4>
        </div>
        <div class="col-lg-6"> 
            <button type="button" class="btn btn-primary m-1 float-right" data-toggle="modal" data-target="#addmodal"><i class="fas fa-user-plus fa-lg"></i>&nbsp; &nbsp; Add new user</button>

            <a href="action.php? export=excel" class="btn btn-success m-1 float-right"><i class="fas fa-table fa-lg"></i>&nbsp;  Export to Excel</a>
        </div>
    </div>

<?php include('./modals.php'); ?>

    <hr class="my-1">
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive" id="showUser">
               
             <h3 class="text-center text-success" style="margin-top: 150px ;">Loading........</h3>     
            </div>
        </div>
    </div>
</div> 
<!--Add user modal-->
<div class="modal fade" id="addmodal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add New User</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" px-4>
        <form action="" method="post" id="form-data">
            <div class="form-group">
                <input type="text" name="fname" class="form-control" placeholder="Enter your first Name" required>
            </div>
            <div class="form-group">
                <input type="text" name="lname" class="form-control" placeholder="Enter your Last Name" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Enter your Email" required>
            </div>
            <div class="form-group">
                <input type="tel" name="phone" class="form-control" placeholder="Enter your Phone Number" required>
            </div>
            <div class="form-group">
                <input type="submit" name="insert" id="insert" value="Add User" class="btn btn-danger btn-block">
            </div>
        </form>
        </div>
        
        
      </div>
    </div>
  </div>
   <!--Edit user modal-->
  <div class="modal fade" id="editmodal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit User Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" px-4>
        <form action="" method="post" id="Edit-form-data">
          <input type="hidden" name="id" id="id">
            <div class="form-group">
                <input type="text" name="fname" class="form-control" id="fname" required>
            </div>
            <div class="form-group">
                <input type="text" name="lname" class="form-control" id="lname" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <div class="form-group">
                <input type="tel" name="phone" class="form-control" id="phone" required>
            </div>
            <div class="form-group">
                <input type="submit" name="update" id="update" value="update" class="btn btn-primary btn-block">
            </div>
        </form>
        </div>
        
        
      </div>
    </div>
  </div>
        <!-- jQuery library -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.5.0/js/all.min.js" integrity="sha512-YUwFoN1yaVzHxZ1cLsNYJzVt1opqtVLKgBQ+wDj+JyfvOkH66ck1fleCm8eyJG9O1HpKIf86HrgTXkWDyHy9HA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/v/bs4/dt-1.13.8/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $(document).ready(function(){
       
        
        showAllUser()
        function showAllUser(){
            $.ajax({
                url:"action.php",
                method:"POST",
                data:{action:"view"},
                success:function(response){
                  // console.log(response);  
                  $("#showUser").html(response);
                  $("table").DataTable();
                  order:[0,'desc']
                }

            });
                

        
        }
        //insert ajax Request
        $("#insert").click(function(e){
            if($("#form-data")[0].checkValidity()){
                e.preventDefault();
                $.ajax({
                    url:"action.php",
                    type: "POST",
                    data: $("#form-data").serialize()+ "&action=insert",
                    success:function(response){
                      swal.fire({
                        title: 'user Added successfuly',
                        type:'success'
                      })
                      $("#addmodal").modal('hide');
                      $("#form-data")[0].reset();
                      showAllUser();
                    }
                });
            }
        });
         // Edit User
    
    $("body").on("click", (".editbtn"), function(){
          // e.preventDefault();
          
          Id = $(this).data('user-id');
          // $.ajax({
          //   url:"action.php",
          //   type:"POST",
          //   data:{edit_id:edit_id},
          //   success:function(response){
          //    data = JSON.parse(response);
             $("#editModal").modal('show');
             $("#userId").val(ed);
          //    $("#fname").val(data.first_name);
          //    $("#lname").val(data.last_name);
          //    $("#email").val(data.email);
          //    $("#phone").val(data.phone);
          //   }
          // });
        });
       //update ajax Request
       $("#update").click(function(e){
            if($("#edit-form-data")[0].checkValidity()){
                e.preventDefault();
                $.ajax({
                    url:"action.php",
                    type: "POST",
                    data: $("#edit-form-data").serialize()+ "&action=update",
                    success:function(response){
                      swal.fire({
                        title: 'user Edited successfuly',
                        type:'success'
                      })
                      $("#editmodal").modal('hide');
                      $("#edit-form-data")[0].reset();
                      showAllUser();
                    },
                    error(err) {
                      console.log(err);
                      console.error(err);
                    }
                });
            }
        });
        // delete ajax request
        $("body").on("click", ".delbtn", function(e){
          e.preventDefault();
          var tr =$(this). closest('tr');
          del_id = $(this). attr('id');
          Swal.fire({
  title: "Are you sure?",
  text: "You won't be able to revert this!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Yes, delete it!"
}).then((result) => {
  if (result.isConfirmed) {
    $.ajax({
      url:"action.php",
      type:"POST",
      data:{del_id:del_id},
      success:function(response){
        tr.css('background-color', '#ff6666');
        swal.fire(
          'Deleted1',
           'User deleted sucessfully',
           'success'
        )
        showAllUser();
      }
    });
    }
   });
  });
      // show user
      $("body").on("click", ".infoBtn", function(e){
        e.preventDefault();
            info_id = $(this).attr('id');
            $.ajax({
              url:"action.php",
              type:"POST",
              data:{info_id:info_id},
              success:function(response){
                data = JSON.parse(response);
                swal.fire ({
                  title:'<strong> User Info : ID('+data.id+')</strong>',
                  type:'info',
                  html:'<b>First Name:</b>' + data.first_name + '<br><b>Last Name:</b>' + data.last_name + '<br><b>Email:</b>' + data.email + '<br><b>Phone:</b>' + data.phone,
                  showCancelButton:true,
                });
              }
            });
      });     
});
   
</script>
</body>
</html>