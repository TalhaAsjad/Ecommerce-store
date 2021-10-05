<?php

session_start();

include "sessioncheck.php";

?>
<!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    </head>

    <body>

<div class="container">
    <div class="row">
<div class="col-8 offset-2">

<h1 class="text-center text-danger mt-5" style="font-family: 'Abril Fatface', cursive;">Customer Details</h1>
<h5 class="text-center mb-5"></h5>

    <?php 

include "dbcon.php";

if(isset($_GET)){
    $id = $_GET["id"];
    $show = "SELECT * FROM `orderdetails` where order_id = ".$id."";
    $showquery= mysqli_query($con, $show);


    $showcustomer = "SELECT *FROM `orderr` where id = ".$id."";
    $showcustomer =mysqli_query($con, $showcustomer)
    ?>

<div class="card-body">
    <table id="example2" class="table table-bordered table-hover">
      <thead>
      <tr>
        <th>Name</th>
        <th>Address</th>
        <th>City</th>
        <th>State</th>
        <th>Order Date</th>
        <th>Status</th>
        </tr>
      </thead>

      <?php

    while($row = mysqli_fetch_assoc($showcustomer)) {

        ?>
     
        <tr>
        <td> <?php echo $row["fullname"]; ?> </td>
        <td> <?php echo $row["address"]; ?> </td>
        <td> <?php echo $row ["city"]; ?> </td>
        <td> <?php echo $row["state"];?> </td>
        <td> <?php echo $row["order_date"];?> </td>
        <td> <?php echo $row["status"];?> </td>
        </tr>

    
        <?php
    
    }
    ?>

    </table>
</div>


<h1 class="text-center text-danger mt-5" style="font-family: 'Abril Fatface', cursive;">Your Order Details</h1>
<h5 class="text-center mb-5">You will receive your order shorly</h5>

    <div class="card-body">
    <table id="example2" class="table table-bordered table-hover">
      <thead>
      <tr>
        <th>Order id</th>
        <th>Item Name</th>
        <th>Item Price</th>
        <th>Quantity</th>
        </tr>
      </thead>

      <?php

    while($row = mysqli_fetch_assoc($showquery)) {

        ?>
     
        <tr>
        <td> <?php echo $row["order_id"]; ?> </td>
        <td> <?php echo $row["Item_name"]; ?> </td>
        <td> <?php echo $row ["item_price"]; ?> </td>
        <td> <?php echo $row["quantity"];?> </td>
        </tr>

    
        <?php
    
    }
}
?>
</table>
</div>

<div class="col-12 offset-6">

<?php

$total="SELECT totalamount FROM `orderr` where id = ".$id."";
$totalquery= mysqli_query($con, $total);
$totalshow = (mysqli_fetch_assoc($totalquery));
?>
<h3 class="">Total Bill: <span class="text-danger text-underline"> " <?php echo($totalshow["totalamount"]); ?> " RS</span></h3>

</div>

<a href="order.php" class="btn btn-dark">Go back</a>


</div>
    </div>
</div>


        </body>
    </html>