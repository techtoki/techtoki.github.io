<?php
    session_start();
    // header("url: ../login.php")
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
    <script type="text/javascript" type="module" src="../js/cookie.js"></script>
    <script type="text/javascript" type="module" src="../js/validation.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/login.css">
    <script>
        // console.log(getCookie('user'));
        
        // if(getCookie('user')){
        //     location.href = '../index.php';
        // }
    </script>
</head>
<body>
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

            <div class="card m-3" style="width: 23rem;">
                <div class="card-body">
                    <label class="tittle">LOGIN</label>
                    <hr>
                    <form method="POST" id="login-form">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email Address</label>
                            <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="email">
                            <div class="invalid-feedback">
                                Email is incorrect!
                            </div>
                        </div>
                        
                        <div class="form-group mt-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Password">
                            <div class="invalid-feedback">
                                Password is incorrect!
                            </div>
                        </div>
                        <div style="width:100%;margin-top:25px" class="confirm-btn">
                            <button type="button" id="login" class="btn btn-primary w-100"><i class="bi bi-person-fill" ></i> LOGIN</button>
                        </div>
                        <div class="d-flex flex-column w-100 justify-content-center mt-4">
                            <div class="d-flex flex-row justify-content-center">
                                No account?
                            </div>
                            <div class="d-flex flex-row justify-content-center">
                                <a href="registration.php" style="text-decoration: none;"> Click Here</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>