<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script type="text/javascript" src="./js/jquery.js"></script>
    <script type="text/javascript" src="./js/jquery_session.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./js/cookie.js"></script>
    <script type="text/javascript" src="./js/index.js"></script>
    <script type="module" src="./js/index_product_module.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/index.css">
    <title>TechToki</title>
    
</head>
<body>
    <header>
        <div id="navigation_top">
            <div class="navbar navbar-expand-lg">
                <div class="container">
                    <a href="index.php" class="navbar-brand flex-shrink-1">
                        <img src="./assets/images/techtoki_full_logo.svg" id="logo" width="200" alt="techtoki">
                    </a>
                    <div class="w-100 d-flex flex-column">
                        <div class="d-flex flex-row justify-content-end account-box" id="log-register-btn">
                            <a type="button" class="btn" onclick="location.href = 'pages/login';">Login</a>
                            <a type="button" class="btn" onclick="location.href = 'pages/registration';">Register</a>
                        </div>

                        <div class="d-flex flex-row justify-content-end account-box" id="account-btn">
                            <div class="dropdown">
                                <button type="button" id="account-a" class="btn dropdown-toggle shadow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                    Dropdown button
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="margin-left:20px;border-radius:0px">
                                    <li><a class="dropdown-item" href="./pages/profile">Profile</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><button id="logout-btn" class="dropdown-item" href="#">Logout</button></li>
                                </ul>
                            </div>
                        </div>

                        <div class="w-100 d-flex flex-row">
                            <div class="input-group my-2 mx-0">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon1">
                                <i class="bi bi-search" ></i>
                                    Find
                                </button>
                                <input type="text" class="form-control" placeholder="your poison.." aria-label="Example text with button addon" aria-describedby="button-addon1">
                            </div>
                            <button type="button" class="btn cart-btn" onclick="location.href = 'pages/login';"><i class="bi bi-bag"></i></button>

                            <div class="dropdown d-none flex-column justify-content-center" id="dropdown-mini">
                                <button type="button" id="account-a" class="btn  shadow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person-fill" id="person-icon"></i>
                                </button>
                                <ul class="dropdown-menu m-0" aria-labelledby="dropdownMenuButton1" style="margin-left:0px;border-radius:0px">
                                    <li><a class="dropdown-item m-0" href="./pages/profile">Profile</a></li>
                                    <li><hr class="dropdown-divider m-0"></li>
                                    <li><button id="logout-btn m-0" class="dropdown-item" href="#">Logout</button></li>
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        
    </header>
    <div class="promotion-container m-2  d-block d-md-flex">
        <div class="d-flex flex-column justify-content-start menu-list-container">
            <div class="justify-content-start d-flex d-md-block">
                <div>
                    <div class="btn-group dropend w-100 d-none d-md-block">
                        <button type="button" class="btn  tab-button-group d-none d-md-block w-100" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="menu-tittle-btn" style="text-align:start"><i class="bi bi-cpu-fill"></i> PC Parts</div>
                            <div class="menu-sub-tittle-btn d-none d-lg-block">Assimble Your Own Beast!</div>
                        </button>
                        <ul class="dropdown-menu p-2 rounded-0 w-100 ">
                            <div>
                                <div>Application</div>
                                <button class="btn w-100">Build PC</button>
                            </div>
                            <hr>
                            <div>Products</div>
                            <div>
                                <button class="btn w-100">CPU [Processor]</button>
                            </div>
                            <div>
                                <button class="btn w-100">Motherboard</button>
                            </div>
                            <div>
                                <button class="btn w-100">RAM [Memory]</button>
                            </div>
                            <div>
                                <button class="btn w-100">Storage Device (SSD, NVME SSD, HDD)</button>
                            </div>
                            <div>
                                <button class="btn w-100">GPU [Graphics Card] (if no integrated GPU)</button>
                            </div>
                            <div>
                                <button class="btn w-100">Cooling (CPU, Chassis)</button>
                            </div>
                            <div>
                                <button class="btn w-100">PSU [Power Supply Unit]</button>
                            </div>
                            <div>
                                <button class="btn w-100">Display device, Monitor</button>
                            </div>
                        </ul>
                    </div>
                    <!-- <button class="list-group-item tab-button-group w-100 d-none d-md-block " id="account">
                        <div class="menu-tittle-btn" style="text-align:start"><i class="bi bi-cpu-fill"></i> PC Parts</div>
                        
                    </button> -->
                    <button class="list-group-item tab-button-group d-block d-md-none w-100" id="account"><i class="bi bi-cpu-fill"></i></button>
                </div>
                <div>
                    <button class="list-group-item tab-button-group w-100 d-none d-md-block" id="basket">
                        <div class="menu-tittle-btn"><i class="bi bi-display-fill"></i> Pre-Builts</div>
                        <div class="menu-sub-tittle-btn d-none d-lg-block">Buy Your Own Beast!</div>
                    </button>
                    <button class="list-group-item tab-button-group d-block d-md-none w-100" id="basket"><i class="bi bi-display-fill"></i></button>
                </div>
                <div>
                    <button class="list-group-item tab-button-group w-100 d-none d-md-block" id="wish">
                        <div class="menu-tittle-btn"><i class="bi bi-controller"></i> Gaming Accessories</div>
                        <div class="menu-sub-tittle-btn d-none d-lg-block">Pick Your Weapon, A Sword Perhaps.</div>
                    </button>
                    <button class="list-group-item tab-button-group d-block d-md-none w-100" id="wish"><i class="bi bi-controller"></i></i></button>
                </div>
                <div>
                    <button class="list-group-item tab-button-group w-100 d-none d-md-block" id="visited">
                        <div class="menu-tittle-btn"><i class="bi bi-laptop-fill"></i> Laptops</div>
                        <div class="menu-sub-tittle-btn d-none d-lg-block">Pick Your Mountable Fairy</div>
                    </button>
                    <button class="list-group-item tab-button-group d-block d-md-none w-100" id="visited"><i class="bi bi-laptop-fill"></i></button>
                </div>
                <div>
                    <button class="list-group-item tab-button-group w-100 d-none d-md-block " id="transaction">
                        <div class="menu-tittle-btn"><i class="bi bi-phone-fill"></i> Gadgets</div>
                        <div class="menu-sub-tittle-btn d-none d-lg-block">Smart Phones and More</div>
                    </button>
                    <button class="list-group-item tab-button-group d-block d-md-none w-100" id="transaction"><i class="bi bi-phone-fill"></i></button>
                </div>
            </div>
        </div> 
        <div id="carouselExampleIndicators" class="carousel slide w-100" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="https://www.msi.com/blog/improve-performance-with-resizable-bar-now-available-for-msi-geforce-rtx-30-series-graphics-cards">
                        <img src="https://storage-asset.msi.com/global/picture/banner/banner_1619658851edf92d0b3ccb5fede42e9ec83b6718c7.jpeg" class="d-block w-100" alt="...">
                    </a>
                </div>
                <div class="carousel-item">

                    <img src="https://storage-asset.msi.com/global/picture/banner/banner_161838038939dcae516a372b0619e2deff21d1c04e.jpeg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://storage-asset.msi.com/global/picture/banner/banner_1620634691950f9879040432515ff98487b2dab2fc.jpeg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <a href="https://www.msi.com/blog/improve-performance-with-resizable-bar-now-available-for-msi-geforce-rtx-30-series-graphics-cards">
                        <img src="https://storage-asset.msi.com/global/picture/banner/banner_1615863773429fc77aae6857983c7a6fbd5d4d6090.jpeg" class="d-block w-100" alt="...">
                    </a>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <h2 class="ms-1">Most Popular Tech Products</h2>
    <div class="products d-sm-block d-md-flex overflow-auto mb-5">
        
        <div class="d-block  d-md-flex pb-4" id="most-popular">
            
        </div>
    </div>

    <h2 class="ms-1">Discover</h2>
    <div class="products d-sm-block d-md-flex overflow-auto mb-5">
        
        <div class="d-block  d-md-flex pb-4" id="discover">
            
        </div>
    </div>

    
</body>
<footer class="d-flex flex-row justify-content-center p-5">
    
</footer>
</html>

