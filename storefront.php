<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin</title>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.min.css">
</head>
<body>
  
<?php

session_start();

$count=0;
if(isset($_SESSION['cart'])){
$count= count($_SESSION['cart']);

}

?>

<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <div class="container-fluid">
  <a class="navbar-brand text-white" href="#">CARTZY</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <span>
    <a href="viewcart.php" class="text-white text-decoration-none">
   <i class="fas fa-shopping-cart"></i>
  CART (<?php echo $count ?>) |
  </a>
   <a href="" class="text-decoration-none text-white">LogOut</a>
  </span>
</div>
</nav>


  <div class="container">
<h1 class="text-center text-danger mt-5" style="font-family: 'Abril Fatface', cursive;">Trending </h1>
<h5 class="text-center mb-5">TOP TRENDING THIS WEEL</h5>
<div class="row">


<?php
 include 'dbcon.php';

 $displaycard= "SELECT product_name, product_image , price FROM `product` order by id ASC";
 
 $displayresult = mysqli_query($con,$displaycard);

 while($product = mysqli_fetch_array($displayresult)){
 ?>

   <div class="col-lg-3 col-sm-12">
     <form action="addtocart.php" method="POST">
       <div class="card d-flex align-items-center">
         <h2 class="card-title"><?php echo $product['product_name'] ?></h2>
         <input type="hidden" name="pname" value="<?php echo $product['product_name']?> ">
         <div class="card-body d-flex flex-column">

         <img  style="height:200px; width:200px;" src="<?php echo $product['product_image'] ?>" alt="" class="img-fluid">
         <h6>	&#8360; <?php echo $product['price'] ?></h6>
         <input type="hidden" name="pprice" value="<?php echo $product['price']?> ">
         <input type="number" name="pquantity" max="10" min="1" placeholder="Quantity" id="">
         <button type="submit" value="addcart" name="addcart" class="btn btn-dark" >Add to cart</button>
 
       </div>
         </div>

     </form>
 </div>

 <?php
 }
 ?>

 </div>

 


</div>






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

<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>


    </body>
    </html>