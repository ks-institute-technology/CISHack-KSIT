<?php 

$Patient_ID = $PSignUpPassword = $PSignUpconfirm_password = "";
$Patient_ID_err = $PSignUpPassword_err = $PSignUpconfirm_password_err = "";

if (isset($_POST['PatientSignUp'])){

        $sql = "SELECT `password` FROM `patient_user` WHERE Patient_ID = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $ID);

            $ID = trim($_POST['PatientId']);

            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_bind_result($stmt, $pass);
                mysqli_stmt_fetch($stmt);
                if($pass != NULL)
                {
                  ?>
                  <script>
                    if (confirm("~~~~~~~~~~~~Patient ID Already exist!!~~~~~~~~~~~~\n Login Instead")) {
                      location.replace("index.php");
                    }
                    else{
                      location.replace("index.php");
                    }
                  </script>
                  <?php 
                  exit();
                }
                else 
                  $Patient_ID = trim($_POST['PatientId']);
            }
        }
        mysqli_stmt_close($stmt);


    if(strlen(trim($_POST['password'])) < 7){
      ?>
      <script>alert("~~~~~~~~~~~~ Weak Password!! ~~~~~~~~~~~~\n Enter more than 7 characters !!");</script>
      <?php
      $PSignUpPassword_err = "true";
    }
    else{
        $PSignUpPassword = trim($_POST['password']);
    }

    if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
      ?>
      <script>alert("~~~~~~~~~~~~ Wrong Match!! ~~~~~~~~~~~~\n New Password and Confirm password must be same.");</script>
      <?php
      $PSignUpconfirm_password_err = "true";
    }


    if(empty($Patient_ID_err) && empty($PSignUpPassword_err) && empty($PSignUpconfirm_password_err))
    {
        $sql = "UPDATE `patient_user` SET `password`=(?) WHERE Patient_ID = '$Patient_ID'";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $pass);

            $pass = password_hash($PSignUpPassword, PASSWORD_DEFAULT);
            $exe = mysqli_stmt_execute($stmt);
            if(!mysqli_stmt_affected_rows($stmt)){
              ?>
              <script>confirm("~~~~~~~~~~~~ Sorry ~~~~~~~~~~~~\n You are not allowed to Sign Up \n Since Your Patient ID is Not Created Yet!!");</script> 
            <?php
            }
            else if ($exe)
            {
              ?>
              <script>confirm("~~~~~~~~~~~~ Thank You ~~~~~~~~~~~~\n We are Glad You joined us!! Account Created Sucessfully\nPlease Log into your Account, to get started!!");</script> 
            <?php
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
}

?>
