<?php include "backend/_database.php" ; ?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Tolga Kocadağ Blog</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/TK.ico">

    <!-- Core Stylesheet -->
    <link href="style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="css/responsive/responsive.css" rel="stylesheet">

</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader">
        <div class="yummy-load"></div>
    </div>



    <!-- ****** Top Header Area Start ****** -->
    <div class="top_header_area">
        <div class="container">
            <div class="row">
                <div class="col-5 col-sm-6">
                    <!--  Top Social bar start -->
                    <div class="top_social_bar">
                        <a href="https://www.facebook.com/tolgakocadag58" target="_blank"><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></a>
                        <a href="https://www.instagram.com/tolgakocadag58" target="_blank"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-linkedin fa-2x" aria-hidden="true"></i></a>
                        <a href="https://www.github.com/tolgakocadag"><i class="fa fa-github fa-2x" aria-hidden="true"></i></a>
                    </div>
                </div>
                <!--  Login Register Area -->
                <div class="col-7 col-sm-6">
                    <div class="signup-search-area d-flex align-items-center justify-content-end">
                        <div class="login_register_area d-flex">
                            <div class="login">
                                <a href="register.html">Giriş Yap</a>
                            </div>
                            <div class="register">
                                <a href="register.html">Üye ol</a>
                            </div>
                        </div>
                        <!-- Search Button Area -->
                        <div class="search_button">
                            <a class="searchBtn" href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                        </div>
                        <!-- Search Form -->
                        <div class="search-hidden-form">
                            <form action="#" method="get">
                                <input type="search" name="search" id="search-anything" placeholder="Bir şey ara...">
                                <input type="submit" value="" class="d-none">
                                <span class="searchBtn"><i class="fa fa-times" aria-hidden="true"></i></span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ****** Top Header Area End ****** -->

    <!-- ****** Header Area Start ****** -->
    <header class="header_area">
        <div class="container">
            <div class="row">
                <!-- Logo Area Start -->
                <div class="col-12">
                    <div class="logo_area text-center">
                        <a href="index.php" class="yummy-logo">Tolga Kocadağ Blog</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#yummyfood-nav" aria-controls="yummyfood-nav" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars" aria-hidden="true"></i> Menu</button>
                        <!-- Menu Area Start -->
                        <div class="collapse navbar-collapse justify-content-center" id="yummyfood-nav">
                            <ul class="navbar-nav" id="yummy-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="index.php">Anasayfa <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="yummyDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategoriler</a>
                                    <div class="dropdown-menu" aria-labelledby="yummyDropdown">
                                        <a class="dropdown-item" href="single.php">Single Blog</a>
                                        <a class="dropdown-item" href="static.html">Static Page</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="archive.php">Archive</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="about_me.php">Hakkımda</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.php">bana ulaşın</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ****** Header Area End ****** -->
