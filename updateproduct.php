<!-- UPDATE ROW  -->

<?php 
    include 'dbcon.php';

    session_start();
    include "sessioncheck.php";

    if(isset($_GET["id"])){ 
        $id = $_GET["id"];
        $show = "SELECT * FROM `product` where id = ".$id." limit 1";
        $showquery= mysqli_query($con, $show);

        if (mysqli_num_rows($showquery) > 0) {
            // output data of each row
            $row = mysqli_fetch_assoc($showquery); 
                $productname =  $row["product_name"];
                $price =  $row["price"];
                $image = $row["product_image"];
                $img_description = $row["product_description"];
                // $category_id = $_POST["category_id"];
                // $createdAt =  $row["created_at"];
        } else {
            echo "0 results";
        }
    }

    if(isset($_POST["productname"])){ 
        
        $id = $_GET["id"];
        $myproductname = $_POST["productname"];
        $myimg_description = $_POST['product_description'];
        $mycategory_id = $_POST['categoryid'];
        $myprice = $_POST['price'];
        $myimg_loc = $_FILES['image']['tmp_name'];
        $myimg_name = $_FILES['image']['name'];
        $myimg_des = "productImages/".$myimg_name;
        move_uploaded_file($img_loc, 'productImages/'.$myimg_name);
        $sql = "UPDATE `product` SET `product_name`='".$myproductname."', `product_description`='".$myimg_description."', `price`='".$myprice."' , `product_image`='".$myimg_des."'
        , `category_id`='".$mycategory_id."' WHERE `id` = ".$id." ";
        $query = mysqli_query($con,$sql);
        
        
        header('location: product.php');
    }
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
        



    <form method="POST" enctype="multipart/form-data">
        <!-- Modal Header -->
        <div class="modal-header">
        <h4 class="modal-title">Update the Product</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->

        <div class="modal-body">
        <div class="form-group">
        <label>Product Name</label>
        <input type="hidden" name="iid" value="<?php echo $id ;?>">

        <input type="text" name="productname" value ="<?php echo $productname; ?>" id="productname" class="form-control" placeholder="Product name">
        </div>
        <div class="form-group">
        <label>Description</label>
        <input type="product_description" name="product_description" value ="<?php echo $img_description ?>" id="product_description" class="form-control" placeholder="Description">
        </div>
        <div class="form-group">
        <label>Image</label>
      <td> <input type="file" name="image" value ="" id="image" class="form-control" placeholder=""> <img style="height:90px; margin-top:5px" src="<?php echo $image; ?>" alt=""> </td>
        </div>
        <div class="form-group">
        <label>Price</label>
        <input type="price" name="price" value ="<?php echo $price; ?>" id="price" class="form-control" placeholder="Price">
        </div>

        <div class="form-group">
<label for="categoryid">Category</label>
<select name="categoryid" id="categoryid">
        <?php
        include 'dbcon.php';

      $displaycategoryid = "SELECT category_title, id FROM `category`";
      $categoryresult = mysqli_query($con, $displaycategoryid);
      while ($namearray= mysqli_fetch_array($categoryresult))
      {
        ?>
        <option value="<?php echo $namearray['id']?>">
        <?php echo $namearray['category_title'] ?>
        </option>
        <?php
      }  
?>
</select>
</div>

        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
        <button type="submit" name="update" class="btn btn-success">Save</button>
        <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button> -->
        </div>

        </div>
        </div>
        </div>
    </form>





<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>


    </body>
    </html>