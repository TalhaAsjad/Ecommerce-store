<?php

include "dbcon.php";  

session_start();

if(!empty($_POST)){

    $fullname =$_POST['fullname'];
    $email =$_POST['email'];
    $address =$_POST['address'];
    $city =$_POST['city'];
    $state =$_POST['state'];
    $zip =$_POST['zip'];
    
    $productprice=0;
    $grandtotal =0;

    foreach($_SESSION['cart'] as $value){
        $productprice = intval($value['productprice']) * intval($value['productquantity']);  
        $grandtotal += $productprice;                  
   }  
    

    $insertquery = "INSERT INTO orderr (fullname, email, address, city, state, zip, totalamount) values ('".$fullname."',
    '".$email."', '".$address."','".$city."', '".$state."','".$zip."','".$grandtotal."')"; 

    $query= mysqli_query($con, $insertquery);

    $order_id = mysqli_insert_id($con);

    foreach($_SESSION['cart'] as $value){

        $itemname = $value['productname'];
        $itemprice = $value['productprice'];
        $itemquantity = $value['productquantity'];
        
        // print_r($itemname);

    $insertqueryy = "INSERT INTO orderdetails (order_id, item_name, item_price, quantity) values ('".$order_id."','".$itemname."',
    '".$itemprice."', '".$itemquantity."')"; 

    $queryy = mysqli_query($con, $insertqueryy);
}
    

 

    if($query){
        ?>
        <h1 class="text-center text-danger mt-5" style="font-family: 'Abril Fatface', cursive;">Your Order has been successfully placed</h1>
<h5 class="text-center mb-5">Now wait for the order</h5>

<div class="d-flex justify-content-center">
<a href="storefront.php" class="text-center btn btn-success">Click here to order again</a>
</div>

<?php
    }
else{
    ?>
    <script>
        alert("Sorry your order was not successful");
        </script>
        
            <?php
}
        
}




session_destroy();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>Document</title>
</head>
<body>
    

</body>
</html>