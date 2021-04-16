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
    $result = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome (Basic Icons) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
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
                            Patient Inforamtion
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
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Home</li>
                    </ol> 
                    <div class="card mb-4">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="display-4"><strong>Medical Profile</strong></h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col text-center">
                                    <?php if($result['Gender'] == 'Male'){ ?>
                                    <img src="../../image/Male2.jpg" alt="Student Image" style="width:300px; border-radius: 50%;">
                                    <?php } else { ?>
                                        <img src="../../image/Female.jpg" alt="Student Image" style="width:300px; border-radius: 50%;">
                                    <?php } ?>
                                </div>
                                <div class="col-md col">
                                    <div class="row">
                                        <div class="table-responsive col-6">
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td>Patient ID </td><td><?php echo ":\t".$result['Patient_ID']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Name </td><td><?php echo ":\t".$result['Name']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Age</td><td><?php echo ":\t".$result['Age']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Gender</td><td><?php echo ":\t".$result['Gender']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Blood Group </td><td><?php echo ":\t".$result['Blood Group']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Date Of Birth </td><td><?php echo ":\t".$result['DOB']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>E-mail</td> <td><?php echo ":\t".$result['EMail']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nationality </td><td><?php echo ":\t".$result['Nationality']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Address</td><td><?php echo ":\t".$result['Address']; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="table-responsive col-6">
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td>Time Of  Addmission</td><td><?php echo ":\t9:04AM / April 16th, 2021"; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Medical History</td><td><?php echo ":\tType 2 Diabetes Mellitus"; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Medications</td><td><?php echo ":\tLinagliptin(5mg), Losartan(10mg)"; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Allergies</td><td><?php echo ":\tPenicillin Allergy"; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Injuries and Accedents</td><td><?php echo ":\tNone"; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Special Needs</td><td><?php echo ":\tNone"; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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