<?php 

session_start();
if(isset($_SESSION['PatientId']) != true)
{
    header("location: ../../index.php");
    exit;
}
$id = trim($_SESSION['PatientId']);
include "../../config.php";
$display = false;
$oops = false;

if(isset($_SESSION['Oops']))
    $oops = true;

if(isset($_POST['find'])){
    $id = trim($_POST['name']);
    $selectQuery = "SELECT * FROM `medicine_info` WHERE `MedicineName` = '$id'";
    $query = mysqli_query($conn, $selectQuery);
    $result = mysqli_fetch_assoc($query);
    if($result){
        $display = true;
        //header("location: StudentDetails.php");
    }
    else{
        $_SESSION['Oops'] = true;
        header("location: SearchMedicine.php");
    }
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link href="../../css/styles.css" rel="stylesheet" />
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
                        <a href="../HomePage.php" class="nav-link">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Home
                        </a>
                        <div class="sb-sidenav-menu-heading">Activity</div>
                        <a href="#" class="nav-link">
                            <div class="sb-nav-link-icon"><i class="fas fa-envelope-open-text"></i></div>
                            Alarms and Reminders
                        </a>
                        <a href="../ConsultDoctor.php" class="nav-link">
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
                                <a class="nav-link" href="../MedicalProfile.php">
                                    <div class="sb-nav-link-icon"><i class="far fa-clipboard"></i></i></div>
                                    Medical Profile
                                </a>
                                <a class="nav-link" href="../#">
                                    <div class="sb-nav-link-icon"><i class="far fa-clipboard"></i></div>
                                    Patient Record
                                </a>
                            </nav>
                        </div>
                        <a href="SearchMedicine.php" class="nav-link">
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
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Search Medicine</li>
                    </ol> 
                    <div class="card mb-4">
                    <div class="card-body">
                        <label for="Med"><h5>Enter the Medicine Name</h5></label>
                        <form action="" method="POST">
                            <div class="form-row">
                                <div class="form-group col-sm-4">
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                                <div class="form-group col-5 col-sm-3 col-lg-2">
                                    <button type="submit" name="find" class="btn btn-success btn-block">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                    <?php if($display) { ?>
                        <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="display-4"><strong>Medicine Details</strong></h4>
                        </div>
                        <div class="card-body">
                            <label for="med">
                                <h1 class="display-4">Medicine Name:
                                    <?php echo $result['MedicineName']; ?>
                                </h1>
                            </label>
                            <hr>
                            <div class="row">
                                <div class="col-md-5 col text-center">
                                    <img src="<?php echo $result['File']; ?>" class="rounded" alt="<?php echo $result['MedicineName']; ?>">
                                </div>
                                <div class="col-md-7 col">
                                    <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <div class="card-header" id="DetailsOne">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Description
                                            </button>
                                        </h2>
                                        </div>

                                        <div id="collapseOne" class="collapse show" aria-labelledby="DetailsOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <?php echo $result['Description']; ?>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="DetailsTwo">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Uses
                                            </button>
                                        </h2>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="DetailsTwo" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <?php echo $result['Uses']; ?>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="DetailsThree">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Dosage
                                            </button>
                                        </h2>
                                        </div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="DetailsThree" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <?php echo $result['Dosage']; ?>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="DetailsFour">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            Side Effects
                                            </button>
                                        </h2>
                                        </div>
                                        <div id="collapseFour" class="collapse" aria-labelledby="DetailsFour" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <?php echo $result['SideEffects']; ?>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="DetailsFive">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                            Substitute
                                            </button>
                                        </h2>
                                        </div>
                                        <div id="collapseFive" class="collapse" aria-labelledby="DetailsFive" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <?php echo $result['Substitutes']; ?>
                                        </div>
                                        </div>
                                    </div>
                                    </div> 
                                    <div class="container">
                                        <div class="row">
                                            <div class="form-group col-12"></div>
                                            <div class="form-group col-sm-4">
                                                <a href="../ConsultDoctor.php" role="button" class="btn btn-primary btn-lg btn-block">Consult a Doctor</a>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <a href="https://www.amazon.in/s?k=<?php echo $result['MedicineName']; ?>" role="button" class="btn btn-outline-success btn-lg btn-block">Order Online</a>
                                            </div>
                                        </div> 
                                    </div>                                 
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } else { ?>
                        <div class=" text-center">
                            <?php if($oops){ unset($_SESSION['Oops']); ?>
                            <div class="col">
                                <img src="../../../image/space.png" class="rounded" alt="Search">
                            </div>
                            <div class="col">
                                <h2 class="display-4">WOOPS !! The Medicine doesn't seem to be here...</h2>
                            </div>
                            <?php } else { ?>
                            <div class="col">
                                <h2 class="display-4">Search for medicine</h2>
                            </div>
                            <div class="col">
                            <img src="../../../image/Searching.png" class="rounded" alt="Search">
                            </div>
                            <?php } ?>
                        </div>
                        <?php } ?>

            </main>
        </div>
    </div>  

    </nav>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <!-- JavaScript -->
    <script src="../../js/scripts.js"></script>
</body>
</html>