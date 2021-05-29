
<?php
    session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechToki</title>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/jquery_session.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" type="module" src="../js/validation.js"></script>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/registration.css">
</head>
<body>
    <!-- Modal -->
    <div class="modal fade" id="success-modal" tabindex="-1" aria-labelledby="success-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registration Success!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Thank you for choosing TechToki!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="location.href = './login.php';" data-bs-dismiss="modal">Go to Login</button>
            </div>
        </div>
    </div>
    </div>

    <div class="d-flex flex-column align-items-center ">
        <div class="login-container">
            <div class="d-flex flex-column justify-content-center logo flex-shrink-0">
                <a href="../index.php" >
                    <img src="../assets/images/techtoki_full_logo.svg"  width="100%"alt="">
                </a>
                <div id="slogan">
                    YOUR DAILY DOSE OF TECH
                </div>
            </div>
            
            <div class="card m-3" style="min-width: 30rem">
                <div class="card-body">
                    <label class="tittle">REGISTRATION</label>
                    <hr>
                    <form method="post" action="" id="registration-form">
                        <div class="d-flex flex-row justify-content-between">
                            <div class="w-50" style="padding-right:10px">
                                <label class="sub-tittle">ACCOUNT</label>
                                <div class="form-group email-field">
                                    <label for="email">Email Address</label>
                                    <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Email" required>
                                    <div class="invalid-feedback">
                                        Plase enter email address.
                                    </div>
                                </div>
                                <div class="form-group mt-3 password-field">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="Password">
                                    <div class="invalid-feedback">
                                        Does not matched.
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="password-confrim">Confirm Password</label>
                                    <input type="password" class="form-control" id="password_confirm" placeholder="Password">
                                    <div class="invalid-feedback">
                                        Does not matched.
                                    </div>
                                </div>

                            </div>
                            <div class="w-50" style="padding-left:10px">
                                <label class="sub-tittle">PERSONAL INFORMATION</label>
                                <div class="form-group">
                                    <label for="firstname">Firstname</label>
                                    <input type="text" class="form-control" id="firstname" aria-describedby="firstname" placeholder="Firstname">
                                    <div class="invalid-feedback">
                                        This field is required.
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="lastname">Lastname</label>
                                    <input type="text" class="form-control" id="lastname" aria-describedby="lastname" placeholder="Lastname">
                                    <div class="invalid-feedback">
                                        This field is required.
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <hr>
                        <label class="sub-tittle">BILLING</label>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="phone" class="form-control" id="phone" aria-describedby="emailHelp" placeholder="Phone">
                            <div class="invalid-feedback">
                                Invalid phone number.
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" aria-describedby="emailHelp" placeholder="Address">
                            <div class="invalid-feedback">
                                This field is required.
                            </div>
                        </div>
                        <div style="width:100%;margin-top:25px" class="confirm-btn">
                            <button id="register" name="register" type="submit" class="btn btn-primary w-100" >
                            <i class="bi bi-pencil-square"></i> 
                            REGISTER</button>
                        </div>
                        <div class="response">
                        
                        </div>
                        <div class="d-flex flex-column w-100 justify-content-center mt-4">
                            <div class="d-flex flex-row justify-content-center">
                                Already have an account?
                            </div>
                            <div class="d-flex flex-row justify-content-center">
                                <a href="login.php" style="text-decoration: none;"> Click Here</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>