<?php 

$server = "localhost";
$user = "root";
$password = "";
$db = "shopping_cart";

$con = mysqli_connect($server, $user,  $password, $db);

if(!$con){
    die("Connection failed: " . mysqli_connect_error());
}
?>

