  <!-- DELETE Product  -->

  <?php 
    include "dbcon.php"; 
    include "sessioncheck.php";
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        mysqli_query($con, "DELETE FROM product WHERE id=$id");

?>
    <script>
        alert("Product deleted successfully");
    </script>

<?php
 }
      header('location: product.php');
   
?>