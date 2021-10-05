<?php 

session_start();

include "sessioncheck.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light">Cartzy</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
          <li class="nav-item">
            <a href="admin.php" class="nav-link active">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Admin
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="product.php" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
               Products
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="category.php" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
               Category
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="order.php" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
               Orders
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="customer.php" class="nav-link ">
              <i class="nav-icon fas fa-copy"></i>
              <p>
               Customer
              </p>
            </a>
          </li>
        
 
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="mt-5">Admins Table</h1>
          </div>
          <div class="col-12 offset-8">
            <a  href="logout.php">
          <button type="button" class="btn btn-dark py-3 px-4">
       Logout
      </button>
      </a>
      <a  href="logincustomer.php">
          <button type="button" class="btn btn-dark py-3 px-4">
       Login to customer
      </button>
      </a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">ADMINS</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">

              <?php 

     include "dbcon.php";         

if(!empty($_POST)){
  
    if (isset($_POST['user_name'])) { 
      $user_name = $_POST['user_name'];
    }
    $email = $_POST['email'];
    $password = $_POST['password'];
    $status = $_POST['status'];
    $role = $_POST['role'];
  
      $insertquery= "INSERT INTO admin(user_name,email,password,status,role) values('".$user_name."', '".$email."','".md5($password)."',
       '".$status."', '".$role."' )";
      
      $query = mysqli_query($con, $insertquery);    
      if($query){
        ?>
    
        <script>
        alert("You have registered successfully");
        </script>    
    <?php
    
    }
    else{
        ?>
        <script>
        alert("Registration unsuccessful");
        </script>
    
    <?php
    }
    // header('location: admin.php');
}
?>
              
              <form action="admin.php" method="POST">
<div class="col-12 offset-10">
<button type="button" class="btn btn-success py-3 px-4" data-toggle="modal" data-target="#myModal">
       ADD
      </button>

      </div>

    </div>

     <div id="records_contant">
  </div>
  <!-- The Modal -->
 
 <div class="modal" id="myModal">
<div class="modal-dialog">
<div class="modal-content">

<!-- Modal Header -->
<div class="modal-header">
<h4 class="modal-title">Add a new Admin</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>

<!-- Modal body -->

<div class="modal-body">
<div class="form-group">
<label>Username</label>
<input type="text" name="user_name" id="fullname" class="form-control" placeholder="Fullname">
</div>
<div class="form-group">
<label>Email</label>
<input type="email" name="email" id="email" class="form-control" placeholder="Email">
</div>
<div class="form-group">
<label>Password</label>
<input type="password" name="password" id="password" class="form-control" placeholder="Password">
</div>
<div class="form-group">
<label for="role">Role</label>
<select name="role" id="role">
  <option value="admin">admin</option>
  <option value="superadmin">superadmin</option>
</select>
</div>
<div class="form-group">
<label for ="status">Status</label>
<select name="status" id="status">
  <option value="active">active</option>
  <option value="unactive">unactive</option>
</select>

</div>

</div>

<!-- Modal footer -->
<div class="modal-footer">
<button type="submit" class="btn btn-success">Save</button>
<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
</div>

</div>
</div>
</div>
</form>
       
<!-- DISPLAY ROWS  -->

  <?php
include 'dbcon.php';

      $displayquery = "SELECT * FROM `admin` where role != 'superadmin'";
      $result = mysqli_query($con, $displayquery);
      // var_dump($result); die();
      if(mysqli_num_rows($result)>0){
      $number=1;
      
      ?>

      <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>Number</th>
                <th>Name</th>
                <th>EMAIL</th>
                <th>status</th>
                <th>Role</th>
                <th>Actions</th>
                </tr>
              </thead>
              <?php
              
        while($row =mysqli_fetch_array($result)){ 
            ?>
                
            
         <tr>
          <td> <?php echo $number ?> </td>
          <td> <?php echo $row['user_name']; ?> </td>
          <td> <?php echo $row['email']; ?> </td>
          <td> <?php echo $row['status']; ?> </td>
          <td> <?php echo $row['role']; ?> </td>
          <td>

          <a href="updateadmin.php?id=<?php echo $row['id']; ?>" class="edit btn btn-secondary" >Edit</a>
          <a href="deleteadmin.php?id=<?php echo $row['id']; ?>" class="delete btn btn-danger" >Delete</a>

          </td>
          </tr>
       <?php  $number++; 
      }
      
     }
     ?>
      </tbody>
          </table>
        </div>


<!-- UPDATE ROW  -->

<?php 
    include 'dbcon.php';
    if(isset($_GET["id"])){ 
        $id = $_GET["id"];
        $show = "SELECT * FROM `admin` where id = $id";
        $showquery= mysqli_query($con, $show);

        if (mysqli_num_rows($showquery) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($showquery)) {
                $username =  $row["user_name"];
                $email =  $row["email"];
                $password =  $row["password"];
                $status = $row["status"];
                // $createdAt =  $row["created_at"];
                $role =  $row["role"];
            }
        } else {
            echo "0 results";
        }
    }

    if(isset($_POST["fullname"])){ 
        $id = $_GET["id"];
        $myusername = $_POST["fullname"];
        $myemail = $_POST['email'];
        $mypassword = $_POST['password'];
        $mystatus = $_POST['status'];
        $myrole = $_POST['role'];
        echo $sql = "UPDATE `admin` SET `user_name`='$myusername',`email`='$myemail',`password`='$mypassword',`status`='$mystatus',`role`='$myrole' WHERE `id` = $id ";
        $query = mysqli_query($con,$sql);
        
        header('location: admin.php');
    }
?>


              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block"> 
    </div>
    <strong>Copyright &copy; Practice Project <a href="#"></a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<!-- overlayScrollbars -->
<script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
