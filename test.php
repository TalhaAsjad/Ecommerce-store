<?php

include 'dbcon.php';

if(isset($_GET["id"])){ 
        $id = $_GET["id"];
        $myproductname = $_GET["prduct_name"];
        // $price = $_POST['price'];
        // $sql = "UPDATE `product` SET `product_name`='".$myproductname."',`price`='".$price."' WHERE `id` = ".$id." ";
        // $query = mysqli_query($con,$sql);
        
}
        // header('location: product.php');
    
?>