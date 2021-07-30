<?php 

include "Patient Login/login.php";
include "Patient Login/register.php";

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        .responsive {
          max-width: 100%;
          height: auto;
        }
    </style>

    <title>Welcome Page</title>
  </head>
  <body>
    <div class="jumbotron text-center">
        <h1>Baymax - Personal Medical Assisstant</h1>
    </div>
    <div class="container">
        <div class="row text-center" >
            <div class="col-md-6">
              <h2 class="display-2">Doctor</h2>
                <div class="text-center col-12">
                    <img src="image/Doctor.png" width="600" class="responsive" alt="Students">
                </div>
              <div class="form-row">
                <div class="form-group col">
                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#DoctorLogin">
                        Login
                      </button>
                </div>
              <div class="modal fade" id="DoctorLogin" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="DoctorLoginLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">
                    <form action="" method="post">
                        <div class="modal-header">
                        <h5 class="modal-title" id="DoctorLoginLabel">Doctor Login</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body text-left">
                            <div class="form-group">
                              <h4>Doctor Name</h4>
                              <input type="text" name="username" class="form-control" placeholder="Enter Doctor Name *" required>
                            </div>
                            <div class="form-group ">
                              <h4>Password</h4>
                              <input type="password" name="password" class="form-control" placeholder="Enter Password *" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="DoctorLogin" class="btn btn-primary">Log In</button>
                            <button data-dismiss="modal" type="button" class="btn btn-outline-danger">Cancel</a>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
                <div class="form-group col ">
                    <button type="button" class="btn btn-outline-success btn-block" data-toggle="modal" data-target="#DoctorSignUp">
                        Sign Up
                      </button>                
                </div>
                <div class="modal fade" id="DoctorSignUp" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="DoctorSignUpLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                      <div class="modal-content">
                        <form action="" method="post">
                            <div class="modal-header">
                            <h5 class="modal-title" id="DoctorSignUpLabel">Doctor SignUp</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body text-left">
                                <div class="mb-3">
                                    <h4 class="form-label">Doctor Name</h4>
                                    <input type="text" name="Doctorname" class="form-control" placeholder="Enter Doctor Name" required>
                                  </div>
                                  <div class="mb-3">
                                    <h4 class="form-label">New Password</h4>
                                    <input type="password" name="password" class="form-control" placeholder="Enter New Password" required>
                                  </div>
                                  <div class="mb-3">
                                    <h4 class="form-label">Confirm Password</h4>
                                    <input type="password" name="confirm_password" class="form-control" placeholder="Confirm New Password" required>
                                  </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="DoctorSignUp" class="btn btn-primary">Register</button>
                                <button data-dismiss="modal" type="button" class="btn btn-outline-danger">Cancel</a>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
            <div class="col-md-6">
              <h2 class="display-2">Patient</h2>
                <div class="text-center col-12">
                    <img src="image/patient.jpg"  width="418"  class="responsive" alt="Students">
                </div>
              <div class="form-row">
                <div class="form-group col">
                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#PatientLogin">
                        Login
                      </button>
                </div>
                <div class="modal fade" id="PatientLogin" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="PatientLoginLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                      <div class="modal-content">
                        <form action="" method="post">
                            <div class="modal-header">
                            <h5 class="modal-title" id="PatientLoginLabel">Patient Login</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body text-left">
                                <div class="form-group">
                                  <h4>Patient ID</h4>
                                  <input type="text" name="PatientId" class="form-control" placeholder="Enter Patient ID *" required>
                                </div>
                                <div class="form-group ">
                                  <h4>Password</h4>
                                  <input type="password" name="password" class="form-control" placeholder="Enter Password *" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="PatientLogin" class="btn btn-primary">Log In</button>
                                <button data-dismiss="modal" type="button" class="btn btn-outline-danger">Cancel</a>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>
            <div class="form-group col">
                <button type="button" class="btn btn-outline-success btn-block" data-toggle="modal" data-target="#PatientSignUp">
                    Sign Up
                  </button>                
            </div>
            <div class="modal fade" id="PatientSignUp" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="PatientSignUpLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">
                    <form action="" method="post">
                        <div class="modal-header">
                        <h5 class="modal-title" id="PatientSignUpLabel">Patient SignUp</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body text-left">
                            <div class="mb-3">
                                <h4 class="form-label">Patient ID</h4>
                                <input type="text" name="PatientId" class="form-control" placeholder="Enter Patient ID" required>
                              </div>
                              <div class="mb-3">
                                <h4 class="form-label">New Password</h4>
                                <input type="password" name="password" class="form-control" placeholder="Enter New Password" required>
                              </div>
                              <div class="mb-3">
                                <h4 class="form-label">Confirm Password</h4>
                                <input type="password" name="confirm_password" class="form-control" placeholder="Confirm New Password" required>
                              </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="PatientSignUp" class="btn btn-primary">Register</button>
                            <button data-dismiss="modal" type="button" class="btn btn-outline-danger">Cancel</a>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
        </div>
    </div>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>