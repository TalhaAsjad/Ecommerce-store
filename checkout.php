<!DOCTYPE html>
<html lang="en">
<head>
  <title>Checkout</title>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
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
  <a class="navbar-brand text-white" href="storefront.php">CARTZY</a>
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
<div class="row mt-5">
<div class="col-6">

<div class="panel panel-default" >
    <div class="panel-heading">Customer Details</div>
    <div class="panel-body">

    <form action="ordersuccessful.php" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Name</label>
      <input type="text" class="form-control" id="" name="fullname" placeholder="Name">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Email</label>
      <input type="email" class="form-control" id="" name="email" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="" name="address" placeholder="1234 Main St">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="" name="city">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" name="state" class="form-control">
        <option selected>Choose...</option>
        <option>Punjab</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="" name="zip">
    </div>
  </div>
 
  <button type="" value="order" class="btn btn-success">Place Order</button>
</form>

    </div>
  </div>

  <!-- Container row -->
</div>

<div class="col-4 offset-2 mt-5">
<div class="panel panel-default">
    <div class="panel-heading">Order Details</div>
    <div class="panel-body">
        
    <?php 

include 'dbcon.php';


$productprice=0;
$grandtotal =0;

if (isset($_POST['checkout'])){

    foreach($_SESSION['cart'] as $value){
        $productprice = intval($value['productprice']) * intval($value['productquantity']);  
        $grandtotal += $productprice;   
?>
<div class="d-flex justify-content-around">
<span><?php echo $value['productname'] ?></span> <span> <?php echo $value['productprice'] ?></span> <span> X </span> <span><?php echo $value['productquantity'] ?></span>
 <span>=</span> <span><?php echo$productprice = intval($value['productprice']) * intval($value['productquantity']);?></span> <br>
 </div>

  <?php                
          }  
                 
     }             
      ?>



      
    </div>
    <h2 class="bg-danger">Grand Total = <?php echo $grandtotal ?> </h2>
  </div>
</div>


</div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
    </html>


