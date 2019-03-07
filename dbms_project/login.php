<?php
//login.php

include("database_connection1.php");

session_start();

?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Social Network</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <!-- <link rel="icon" type="image/png" href="images/icons/favicon.ico"/> -->
  <link rel="icon" type="image/png" href="images/icons/group1.png"/>
  <!-- Favicons -->
  <!-- <link href="img/favicon.png" rel="icon"> -->
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Google Fonts links -->
  <link href="https://fonts.googleapis.com/css?family=Spicy+Rice" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">

  <!-- animate.css cdn -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css"> -->

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style1.css">
  <!-- <link rel="stylesheet" href="css/animate.css"> -->
  <link rel="stylesheet" href="css/animate2.css">

  <!-- typed.js cdn -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.6/typed.min.js"></script>
  

  <!-- =======================================================
    Theme Name: BizPage
    Theme URL: https://bootstrapmade.com/bizpage-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header" class="">
    <div class="container-fluid ">

      <div id="logo" class="">
        <h1 class="" ><a href="" class="">Social Network</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#intro"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>

     
    </div>
  </header><!-- #header -->
  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active">
            <div class="carousel-background"><img src="img/intro-carousel/15.jpg" alt=""></div>
            <div class="carousel-container">
                
              <div class="carousel-content">
                  <div class="" ></div>
                <h2 id="typed-text2"></h2>
                <!-- <p id="typed-text1"></p> -->
                <a href="loginuser.php" class="btn-get-started">Login</a>
                <a href="register.php" class="btn-get-started1">Register</a>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="img/intro-carousel/14.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 id="typed-text3"></h2>
                <!-- <p id="typed-text4"></p> -->
                <a href="loginuser.php" class="btn-get-started scrollto">Login</a>
                <a href="register.php" class="btn-get-started1 scrollto">Register</a>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="img/intro-carousel/16.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 id="typed-text5"></h2>
                <!-- <p id="typed-text6"></p> -->
                <a href="loginuser.php" class="btn-get-started scrollto">Login</a>
                <a href="register.php" class="btn-get-started1 scrollto">Register</a>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="img/intro-carousel/20.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 id="typed-text7"></h2>
                <!-- <p id="typed-text8"></p> -->
                <a href="loginuser.php" class="btn-get-started scrollto">Login</a>
                <a href="register.php" class="btn-get-started1 scrollto">Register</a>
              </div>
            </div>
          </div>

          

        </div>

        <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- #intro -->

  

 

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

  <!-- JavaScript Libraries -->
  <script src="javascript/typing1.js"></script>
  <script src="javascript/typing22.js"></script>
  <script src="javascript/typing33.js"></script>
  <script src="javascript/typing4.js"></script>
  <script src="javascript/typing55.js"></script>
  <script src="javascript/typing6.js"></script>
  <script src="javascript/typing77.js"></script>
  <script src="javascript/typing8.js"></script>
  <script src="lib/jquery/jquery.min.js"></script>
  <!-- <script src="lib/jquery/jquery-migrate.min.js"></script> -->
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="lib/touchSwipe/jquery.touchSwipe.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>
