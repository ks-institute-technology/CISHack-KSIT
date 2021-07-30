<?php 

session_start();
if(isset($_SESSION['PatientId']) != true)
{
    header("location: ../index.php");
    exit;
}
$id = trim($_SESSION['PatientId']);
include "../config.php";

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
                        <a href="Alarm.php" class="nav-link">
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
                        User
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Home</li>
                    </ol> 
                    <div class="row">
                        <div class="col-5">
                            <div class="float-left">
                                <img src="../image/baymax.png"  width="575"  class="responsive" alt="Patients">
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="card  mb-4 text-center">
                                <div class="card-header">
                                    <h4>Hello, I'm BAYMAX your personal medical assisstant</h4>
                                </div>
                                <div class="card-body">
                                <h5 class="card-title">Are you feeling well today?</h5>
                                <div class="row justify-content-center">
                                    <div class="form-group col-sm-4">
                                        <a href="HomePage.php" role="button" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-success btn-lg btn-block">Yes</a>
                                    </div>
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLongTitle"> Congratulations on your Good Health</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                                Exercise will give you more energy, even when you are tired
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    <div class="form-group col-sm-4">
                                        <a href="HomePage.php" role="button" data-toggle="modal" data-target="#exampleModal1" class="btn btn-outline-danger btn-lg btn-block">No</a>
                                        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModal1Label" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModal1Label">Select any Following symptoms you have</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="accordion" id="accordionExample">
                                                    <div class="card">
                                                      <div class="card-header" id="symptomOne">
                                                        <h2 class="mb-0">
                                                          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                            <strong>Common cold</strong>: muscle pain, cough, nasal congestion, head ache
                                                          </button>
                                                        </h2>
                                                      </div>
                                                  
                                                      <div id="collapseOne" class="collapse show" aria-labelledby="symptomOne" data-parent="#accordionExample">
                                                        <div class="card-body text-left">
                                                          <b>Treatments:</b>
                                                          <p>There's no cure for the common cold. Antibiotics are of no use against cold viruses and shouldn't be used unless there's a bacterial infection. Treatment is directed at relieving signs and symptoms.
                                                          Most people recover on their own within two weeks. Over-the-counter products and home remedies can help control symptoms.</p>
                                                          <b>Medications:</b>
                                                          <p>Analgesic, nonsteroidal anti-inflammatory drugs, cough medicine</p>
                                                          <b>Tips:</b>
                                                          <p>Wash your hands often with soap and water.</p>
                                                          <p>Avoid touching your eyes, nose, and mouth with unwashed hands.</p>
                                                          <p>Stay away from people who are sick.</p>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="card">
                                                      <div class="card-header" id="symptomTwo">
                                                        <h2 class="mb-0">
                                                          <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                            <strong>Conjuctivitis</strong>: itching, redness(eye), tearing, burning sensation (eye)
                                                          </button>
                                                        </h2>
                                                      </div>
                                                      <div id="collapseTwo" class="collapse" aria-labelledby="symptomTwo" data-parent="#accordionExample">
                                                        <div class="card-body text-left">
                                                            Treatments: </br>
                                                            Medications:</br>
                                                            Tips:
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="card">
                                                      <div class="card-header" id="symptomThree">
                                                        <h2 class="mb-0">
                                                          <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                            <strong>Injury</strong>: joint pain, swelling, limited range of movement, weakness
                                                          </button>
                                                        </h2>
                                                      </div>
                                                      <div id="collapseThree" class="collapse" aria-labelledby="symptomThree" data-parent="#accordionExample">
                                                        <div class="card-body text-left">
                                                            <b>Treatments:</b></br>
                                                            <b>Medications:</b></br>
                                                            <b>Tips:</b>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <div><h4>If the above symptoms are not matched, Please Consult a Doctor</h4></div>
                                                
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Not now</button>
                                                  <a href="ConsultDoctor.php" role="button" class="btn btn-primary">Consult</a>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                    </div>
                                </div> 
                                </div>
                                <div class="card-footer text-muted">
                                Last Response 6 days ago
                                </div>
                            </div>
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5>Random Health Fact</h5>
                                </div>
                                <div class="card-body">
                                Laughing 100 times is equivalent to 15 minutes of exercise on a stationary bike.
                                </div>
                            </div>
                            <div class="text-center  mb-4">
                                <img src="../image/students.png"   class="responsive" alt="Patients">
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