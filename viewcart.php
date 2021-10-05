<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">


</head>
<body>

<?php

include 'dbcon.php';

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

  <span class="text-white">
   <i class="fas fa-shopping-cart"></i>
  CART(<?php echo $count ?>) |
   <a href="" class="text-decoration-none text-white">LogOut</a>
  </span>
</div>
</nav>


<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="text-center text-warning mt-4">My Cart</h1>
        </div>
    </div>
</div>


<div class="container">
    <div class="row justify-content-around">
        <div class="col-sm-12 col-md-6 col-lg-9">
            <table class="table table-bordered text-center mt-5">
                <thead class="bg-dark text-white">
                <th>Product Number</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Product Quantity</th>
                <th>Total price</th>
                <th>Update</th>
                <th>Delete</th>
                </thead>

                <tbody>
                    <?php

                    $productprice=0;
                    $grandtotal =0;
                    $index =0;

                    if(isset($_SESSION['cart'])){
                        
                        foreach($_SESSION['cart'] as $number => $value){
                            
                            // print_r($value['productquantity']);
                        $productprice = intval($value['productprice']) * intval($value['productquantity']);  
                        $grandtotal += $productprice;   
                        $index = $number+1;
?>                        

                      <form action="addtocart.php" method="POST" >
                      <tr></tr>
                      <td><?php echo $index ?></td>
                      <td><input type="hidden" name="pname" value=<?php echo $value['productname'] ?>><?php echo $value['productname'] ?></td>
                      <td><input type="hidden" name="pprice" value=<?php echo $value['productprice'] ?>><?php echo $value['productprice'] ?></td>
                      <td><input type="number" name="pquantity" value=<?php echo $value['productquantity'] ?>></td>
                      <td><?php echo $productprice ?></td>
                      <td><button class="btn btn-warning" value="update" name="update">Update</button></td>
                      <td><button class="btn btn-danger" value="remove" name="remove">Delete</button></td>
                      <td><input class="" type="hidden" value="<?php echo $value['productname'] ?>" name="item"></inputs></td>
                    
                      </form>
                      
                      <?php

                      
                        }
                    
                    }
                    
                    ?>
                </tbody>
            </table>
        </div>

        <div class="col-lg-3">
        <h5 class="mt-5 text-center">GRAND TOTAL</h5>
        <h4 class="bg-dark text-center text-white"><?php echo number_format($grandtotal) ?>   </h4>
        </div>

        <div class="col-md-3 offset-md-6">
            <form action="checkout.php" method="POST" >
            <button class="btn btn-success" name="checkout">Go Checkout</button>
                </form>
        </div>

    </div>
</div>
    
</body>
</html>