<?php 

session_start();
if(isset($_SESSION['PatientId']) != true)
{
    header("location: ../index.php");
    exit;
}
$id = trim($_SESSION['PatientId']);
include "../config.php";

$selectQuery = "SELECT * FROM `patient_details` WHERE `Patient_ID` = '$id'";
$query = mysqli_query($conn, $selectQuery);
$res = mysqli_fetch_assoc($query);
if($res){
    header("location: HomePage.php");
    exit;
}

if(isset($_POST['submit'])){
    $PatientId = trim($id);

    $name = trim($_POST['Firstname']) ." ". trim($_POST['Lastname']);
    $age = trim($_POST['age']);
    $gender = trim($_POST['gender']);
    
    $blood = trim($_POST['Blood']);
    $input = trim($_POST['DOB']);
    $dob = date("d M, Y",strtotime($input));
    $email = trim($_POST['Email']);
    $nationality = trim($_POST['Nationality']);
    $prstAdd = mysqli_real_escape_string($conn, trim($_POST['PresentAdd']));

    $insertQuery = "INSERT INTO `patient_details`(`Patient_ID`, `Name`, `Age`, `Gender`, `Blood Group`, `DOB`, `EMail`, `Nationality`, `Address`) VALUES ( '$PatientId', '$name', '$age', '$gender', '$blood', '$dob', '$email', '$nationality', '$prstAdd')";

    $query = mysqli_query($conn, $insertQuery);
    ?>
        <script> confirm("~~~~~~~~~~~~ Thank You ~~~~~~~~~~~~\n Medical Profile updated successfully");
        </script> 
    <?php
    header("location: HomePage.php");

}    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome (Basic Icons) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" crossorigin="anonymous"> -->
    <link href="../css/styles.css" rel="stylesheet" />
    <title>Patient Home Page</title>
    <style>
        .responsive {
          max-width: 100%;
          height: auto;
        }
    </style>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <button class="btn btn-link btn order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <a class="navbar-brand" href="HomePage.php">Patient</a>
        
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"></form>
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-circle fa-lg"></i>
                    <?php 
                        // echo($result['Name']);
                    ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="#">Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </li>
        </ul>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a href="HomePage.php" class="nav-link">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Home
                        </a>
                        <div class="sb-sidenav-menu-heading">Activity</div>
                        <a href="#" class="nav-link">
                            <div class="sb-nav-link-icon"><i class="fas fa-envelope-open-text"></i></div>
                            Alarms and Reminders
                        </a>
                        <a href="ConsultDoctor.php" class="nav-link">
                            <div class="sb-nav-link-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                            Consult Doctor(Chat)
                        </a>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-tasks"></i></div>
                            Patient Information
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="MedicalProfile.php">
                                    <div class="sb-nav-link-icon"><i class="far fa-clipboard"></i></i></div>
                                    Medical Profile
                                </a>
                                <a class="nav-link" href="#">
                                    <div class="sb-nav-link-icon"><i class="far fa-clipboard"></i></div>
                                    Patient Record
                                </a>
                            </nav>
                        </div>
                        <a href="Medicine Info/SearchMedicine.php" class="nav-link">
                            <div class="sb-nav-link-icon"><i class="far fa-calendar-check"></i></div>
                            Medicine Information
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?php 
                        // echo($result['Name']);
                    ?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4>Hello this is BAYMAX your personal medical assisstant</h4>
                        </div>
                        <div class="container-fluid ">
                            <div class="form-row">
                                <div class="text-center col">
                                    <img src="../image/baymax.png"  width="462"  class="responsive" alt="Patients">
                                </div>
                                <div class="form-group col-md-9">
                                    <form action="" method="POST">
                                        <div class="card-body">
                                            <h5>To get to know you better, please fill the following form</h5>
                                            <hr>
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label for="Name">First Name</label>
                                                        <input type="text" name="Firstname" class="form-control" id="Firstname" placeholder="Enter your First Name *" required>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="Name">Last Name</label>
                                                        <input type="text" name="Lastname" class="form-control" id="Lastname" placeholder="Enter your Last Name">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label for="age">Age </label>
                                                        <input type="number" name="age" class="form-control" id="age" placeholder="Enter your age *" required>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="gender">Gender *</label>
                                                        <select id="gender" name="gender" class="form-control">
                                                            <option selected>Please Select Gender</opstion>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                            <option value="Other">Other</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="blood">Blood Group *</label>
                                                        <select id="blood" name="Blood" class="form-control">
                                                            <option selected>Please Select Blood Group</option>
                                                            <option value="A+">A+</option>
                                                            <option value="A-">A-</option>
                                                            <option value="B+">B+</option>
                                                            <option value="B-">B-</option>
                                                            <option value="AB+">AB+</option>
                                                            <option value="AB-">AB-</option>
                                                            <option value="O+">O+</option>
                                                            <option value="O-">O-</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label for="DOB">Date Of Birth</label>
                                                        <input type="date" name="DOB" class="form-control" id="Dob" required>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="Email">E-mail</label>
                                                        <input type="email" name="Email" class="form-control" id="Email" placeholder="Enter Email-ID *">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="Nation">Nationality</label>
                                                        <input type="text" name="Nationality" value="Indian" class="form-control" id="Nation" required>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label for="presentAddress">Present Address</label>
                                                        <textarea type="text" name="PresentAdd" class="form-control" id="presentAddress" rows="3" required></textarea>
                                                    </div>
                                                </div>
                                            
                                            <div class="form-row">
                                                <div class="form-group col-sm-2">
                                                    <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                                                </div>
                                                <div class="form-group col-sm-2">
                                                    <a href="MedicalForm.php" role="button" class="btn btn-outline-danger btn-lg btn-block">Reset</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>  

    </nav>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <!-- JavaScript -->
    <script src="../js/scripts.js"></script>
</body>
</html>