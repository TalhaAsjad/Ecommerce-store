<?php

include "dbcon.php";

if (empty($_SESSION['is_login']) || empty($_SESSION['email']) || empty($_SESSION['password'])){
    header("location: login.php");
  }

  ?>