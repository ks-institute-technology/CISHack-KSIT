<?php  session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Statistics</title>
  </head>
  <body>
      <?php
      $con = mysqli_connect("localhost","root","","incubate_hack");

if(!$con)
{
die("Could not connect " . mysqli_error());
}

  $sql = "SELECT * FROM patient WHERE UEMAIL = '$_POST[username]' AND PSWD = '$_POST[pswd]'";
//  $sql1 = "INSERT INTO login_users(UEMAIL,PSWD) VALUES ('$_POST[username]', '$_POST[pswd]')";

  $result = mysqli_query($con,$sql);
  $rows = mysqli_num_rows($result);

  if(!mysqli_query($con,$sql))
  {
    die('Error: ' . mysqli_error());
  }

  if($rows != 0)
  {
    header("location:dashboard.php");
  }
  else
  {
    echo"<script>alert('Incorrect username or password');</script>";
    //die();
  }

       ?>
  </body>
</html>
