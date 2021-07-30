<?php

@session_start();
if(isset($_SESSION['PatientId']))
{
  header("location: Patient Login/HomePage.php");
  exit;
}
require_once "config.php";

$Patient_ID = $PLoginpassword = "";

if(isset($_POST['PatientLogin'])){
    $Patient_ID = trim($_POST['PatientId']);
    $PLoginpassword = trim($_POST['password']);

    $sql = "SELECT `Patient_ID`, `password` FROM patient_user WHERE Patient_ID = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $PID);
    $PID = $Patient_ID;
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt)){
            mysqli_stmt_bind_result($stmt, $Patient_ID, $hashed_password);
            if(mysqli_stmt_fetch($stmt))
            {
                if(password_verify($PLoginpassword, $hashed_password))
                {
                  session_start();
                  $_SESSION["PatientId"] = $Patient_ID;
                  $_SESSION["Sloggedin"] = true;

                  header("location: Patient Login/MedicalForm.php");
                }
                else{
                  ?>
                  <script>confirm("Wrong Password!!\nCheck the Password Correctly and Re-enter again.");</script> 
                <?php
                }
            }
        }
        else{
          ?>
          <script>confirm("~~~~~~~~~~~~No such User Available!!~~~~~~~~~~~~\nNot an User? Create your Account By clicking Sign Up Button");</script> 
          <?php
        }
    }
}


?>
