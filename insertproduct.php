<?php 
include "sessioncheck.php";

include "dbcon.php";         

if(!empty($_POST)){

$productname = $_POST['productname'];
$image = $_FILES['image'];
$price = $_POST['price'];
$img_loc = $_FILES['image']['tmp_name'];
$img_name = $_FILES['image']['name'];
$img_description = $_POST['description'];
$img_des = "productImages/".$img_name;
move_uploaded_file($img_loc, 'productImages/'.$img_name);
$category_id = $_POST['categoryid'];


 $insertquery= "INSERT INTO product (product_name , product_description,  product_image, price,category_id) values('".$productname."', '".$img_description."','".$img_des."', '".$price."', '".$category_id."'  )";
 
 $query = mysqli_query($con, $insertquery);    
 if($query){
?>   


    <script>
        alert("Product added successfully");
        </script> 
  <?php 

}
else{
   ?>

   <script>
   alert("Operation unsuccessful");
   </script>

<?php
}
header('location: product.php');
}
?>