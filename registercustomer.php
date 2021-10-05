<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Customer Registration | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.min.css">
</head>
<body class="hold-transition register-page">

  <?php 

include 'dbcon.php';


if(isset($_POST['submit'])){
  $username = mysqli_real_escape_string($con, $_POST['fullname']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $number = mysqli_real_escape_string($con, $_POST['number']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    
  $namequery = "select * from customer where user_name='$username' ";
  $emailquery = "select * from customer where email='$email' ";
  
  $equery = mysqli_query($con, $emailquery);
  $nquery = mysqli_query($con, $namequery);

  $emailcount = mysqli_num_rows($equery);
  $namecount = mysqli_num_rows($nquery);

  if($namecount>0){
    echo "This name already exists";
  }
  else if ($emailcount>0){
    echo "This email already exists";
}

  else {
    if ($password=== $cpassword){
      $insertquery = "INSERT INTO customer (user_name, email, number ,password) values('".$username."', '".$email."', '".$number."','".md5($password)."')";

      $iquery = mysqli_query($con , $insertquery);

      if($iquery){
        ?>
    
        <script>
        alert("You have registered successfully");
        </script>

    <?php
    
   

    }
    else{
    
        ?>
    
        <script>
        alert("Registration unsuccessful");
        </script>
    
    <?php
  }


  }
   

else{ 
  echo("Both passwords don't match");

}
  }
}
  ?>



<div class="register-box">
  <div class="register-logo">
    <a href="#"><b>Customer</b>LTE</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="registercustomer.php" method="POST">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="fullname" placeholder="Full name" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="number" placeholder="Phone Number" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span><i class="fa fa-phone" aria-hidden="true"></i></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="cpassword" class="form-control" placeholder="Retype password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
              <label for="agreeTerms">
               I agree to the <a href="#" text-decoration="none" text-color="" class="">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="submit" class="btn btn-dark btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>

      <a href="logincustomer.php" class="bg-dark text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
