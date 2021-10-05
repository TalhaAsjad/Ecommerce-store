
<?php 
    include 'dbcon.php';

    session_start();
    include "sessioncheck.php";
    if(isset($_GET["id"])){ 
        $id = $_GET["id"];
        $show = "SELECT * FROM `category` where id = ".$id." limit 1";
        $showquery= mysqli_query($con, $show);

        if (mysqli_num_rows($showquery) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($showquery)) {
                $title =  $row["category_title"];
                $status =  $row["status"];
                // $createdAt =  $row["created_at"];
               
            }
        } else {
            echo "0 results";
        }
    }

    if(isset($_POST["title"])){ 
        
        $id = $_GET["id"];
        $mycategorytitle = $_POST["title"];
        $mystatus = $_POST['status'];
        $sql = "UPDATE `category` SET `category_title`='".$mycategorytitle."',`status`='".$mystatus."' WHERE `id` = ".$id." ";
        $query = mysqli_query($con,$sql);
        
        header('location: category.php');
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
        



    <form method="POST">
        <!-- Modal Header -->
        <div class="modal-header">
        <h4 class="modal-title">Update the admin</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->

        <div class="modal-body">
        <div class="form-group">
        <label>Title</label>
        <input type="hidden" name="iid" value="<?php echo $id ;?>">
        <input type="text" name="title" value ="<?php echo $title; ?>" id="fullname" class="form-control" placeholder="Fullname">
        </div>
        <div class="form-group">
        <label for ="status">Status</label>
        <select name="status" id="status">
        <option value="active">active</option>
        <option value="unactive">unactive</option>
       </select>
        

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