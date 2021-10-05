<?php 

session_start();

include "sessioncheck.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Product</title>

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
            <a href="admin.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Admin
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="product.php" class="nav-link active">
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
            <h1 class="mt-5">Product Table</h1>
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
                <h3 class="card-title">Products</h3>

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

         
              
      <form action="insertproduct.php" method="POST" enctype="multipart/form-data">

<div class="col-12 offset-4">

<button type="button" class="btn btn-success py-3 px-4" data-toggle="modal" data-target="#myModal">
       ADD A NEW PRODUCT
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
<h4 class="modal-title">Add a new Product</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>

<!-- Modal body -->

<div class="modal-body">
<div class="form-group">
<label>ProductName</label>
<input type="text" name="productname" id="productname" class="form-control" placeholder="Product Name">
</div>
<div class="form-group">
<label>Description</label>
<input type="text" name="description" id="description" class="form-control" placeholder="Description">
</div>
<div class="form-group">
<label>Image</label>
<input type="file" name="image" id="image" class="form-control" placeholder="">
<!-- <button name="upload">Upload</button> -->
</div>
<div class="form-group">
<label>Price</label>
<input type="text" name="price" id="price" class="form-control" placeholder="Price">
</div>

<div class="form-group">
<label for="categoryid">Category</label>
<select name="categoryid" id="categoryid">
<?php

include 'dbcon.php';

      $displaycategoryid = "SELECT category_title, id FROM `category`";
      $categoryresult = mysqli_query($con, $displaycategoryid);
      while ($namearray= mysqli_fetch_array($categoryresult))
      {
        ?>
        <option value="<?php echo $namearray['id']?>">
        <?php echo $namearray['category_title'] ?>
        </option>
        <?php
      }  
?>
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

      


      $displayquery = "SELECT  product.id, product.product_name,product.product_description , product.product_image, product.price, product.category_id
      FROM `product`
      INNER JOIN `category` 
      ON  category.id = product.category_id;";

      $result = mysqli_query($con, $displayquery);
      // var_dump($result); die();
      if(mysqli_num_rows($result)>0){
      $number=1;
      
      ?>

      <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>List</th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Price (In Rupees)</th>
                <th>Category ID</th>
                <th>Actions</th>
              </tr>
              </thead>
              <?php
              
        while($row =mysqli_fetch_array($result)){ 
            ?>
                
            
         <tr>
          <td> <?php echo $number ?> </td>
          <td> <?php echo $row['product_name']; ?> </td>
          <td> <?php echo $row['product_description']; ?> </td>
          <td>  <img style="height: 50px" src= <?php echo $row['product_image'] ?> >  </td>
          <td> <?php echo $row['price']; ?> </td>
          <td>  <?php echo $row['category_id']; ?> </td>
          <td>

          <a href="updateproduct.php?id=<?php echo $row['id']; ?>" class="edit btn btn-secondary" >Edit</a>
          <a href="deleteproduct.php?id=<?php echo $row['id']; ?>" class="delete btn btn-danger" >Delete</a>

          </td>
          </tr>
       <?php  $number++; 
      }
      
     }
     ?>
      </tbody>
      </table>
      </div>


              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                Footer
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
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
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