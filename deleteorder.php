<?php
    include "dbcon.php"; 
    include "sessioncheck.php";
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        mysqli_query($con, "DELETE FROM orderr WHERE id=$id");

?>
    <script>
        alert("Row Deleted successfully");
    </script>

<?php
 }
      header('location: order.php');
   
?>