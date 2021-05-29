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
    <script type="text/javascript" src="../js/cookie.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" type="module" src="../js/profile.js"></script>
    <base href="">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/profile.css">
</head>


<body>
    <?php
        
        if(!isset($_SESSION["user"])){
            header("Location: ../index.php"); 
        }
    ?>
    
    <header>
        <div class="navbar-sticky">
            <div class="navbar navbar-expand-lg">
                <div class="container">
                    <a href="../index.php" class="navbar-brand  flex-shrink-0">
                        <img src="../assets/images/techtoki_full_logo.svg" width="80" alt="techtoki">
                    </a>
                </div>
            </div>
        </div>
    </header>
    <div class="d-flex flex-column align-items-center" >
        <div class="d-flex flex-row w-100 mt-4 content">
            <ul class="list-group  rounded ms-2">
                <div>
                    <button class="list-group-item tab-button-group rounded-top w-100 d-none d-sm-block " id="account">
                        <div class="menu-tittle-btn"><i class="bi bi-person"></i> Account</div>
                        <div class="menu-sub-tittle-btn d-none d-md-block">Change Credentials - Account Deactivation</div>
                    </button>
                    <button class="list-group-item tab-button-group d-block d-sm-none rounded-top" id="account"><i class="bi bi-person"></i></button>
                </div>
                <div>
                    <button class="list-group-item tab-button-group w-100 d-none d-sm-block" id="basket">
                        <div class="menu-tittle-btn"><i class="bi bi-bag"></i> Basket</div>
                        <div class="menu-sub-tittle-btn d-none d-md-block">Manage Basket</div>
                    </button>
                    <button class="list-group-item tab-button-group d-block d-sm-none" id="basket"><i class="bi bi-bag"></i></button>
                </div>
                <div>
                    <button class="list-group-item tab-button-group w-100 d-none d-sm-block" id="wish">
                        <div class="menu-tittle-btn"><i class="bi bi-list-check"></i> Wish List</div>
                        <div class="menu-sub-tittle-btn d-none d-md-block">Manage Wish List</div>
                    </button>
                    <button class="list-group-item tab-button-group d-block d-sm-none" id="wish"><i class="bi bi-list-check"></i></button>
                </div>
                <div>
                    <button class="list-group-item tab-button-group w-100 d-none d-sm-block" id="visited">
                        <div class="menu-tittle-btn"><i class="bi bi-search"></i> Visited Products</div>
                        <div class="menu-sub-tittle-btn d-none d-md-block">Log of Visted Products</div>
                    </button>
                    <button class="list-group-item tab-button-group d-block d-sm-none" id="visited"><i class="bi bi-search"></i></button>
                </div>
                <div>
                    <button class="list-group-item tab-button-group w-100 d-none d-sm-block rounded-bottom" id="transaction">
                        <div class="menu-tittle-btn"><i class="bi bi-wallet2"></i> Transactions</div>
                        <div class="menu-sub-tittle-btn d-none d-md-block">All Transaction Made</div>
                    </button>
                    <button class="list-group-item tab-button-group d-block d-sm-none rounded-bottom" id="transaction"><i class="bi bi-wallet2"></i></i></button>
                </div>
            </ul>
            <div class="tab-content w-80 mx-2 d-flex flex-column rounded">
                
            </div>
        </div>
    </div>
</body>