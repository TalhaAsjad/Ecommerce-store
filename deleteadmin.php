<?php 

session_start();

include "sessioncheck.php";

?>

   
   <!-- DELETE ROW  -->

    <?php 
    include "dbcon.php"; 
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        mysqli_query($con, "DELETE FROM admin WHERE id=$id");

?>
    <script>
        alert("Row Deleted successfully");
    </script>

<?php
 }
      header('location: admin.php');
   
?>