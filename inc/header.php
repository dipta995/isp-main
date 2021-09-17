<?php 

include 'Classes/PackageClass.php';
include 'Classes/SlideClass.php';

$pack = new PackageClass();
$show = new SlideClass();
include "Classes/AreaClass.php";
    
$area = new AreaClass();
include "Classes/ComplainClass.php";
  $comp = new ComplainClass();
?>
  <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="ex/fonts/icomoon/style.css">

     
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="ex/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="ex/css/style.css">
    <script src="ex/js/jquery-3.3.1.min.js"></script>
    <script src="ex/js/popper.min.js"></script>
    <script src="ex/js/bootstrap.min.js"></script>
    <script src="ex/js/jquery.sticky.js"></script>
    <script src="ex/js/main.js"></script>

    <title>Legend internet service</title>
  </head>
  <body class="rgba-blue-light">


    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    
    <header style="background-color: #17a2b8 ;" class="site-navbar js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-12 col-xl-2">
          <img src="images/logo.png" alt="">
          </div>

          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">
<style>
site-menu ul li a{
color:#17a2b8 !important; }</style>
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="index.php" class="nav-link"  >Home</a></li>

                
<?php session_start();?>
      
      <?php
          if(isset($_GET['logout']) && isset($_GET['logout']) == 'logout'){
            session_destroy();
            header('Location:index.php');
          }else if(isset($_SESSION['loginauth']) == 'customer' || isset($_SESSION['loginauth']) == 'admin'){ ?>
              <li class="has-children">
                  <a href="login.php" class="nav-link"><?php echo $_SESSION['username']; ?></a>
                  <ul class="dropdown">
                    <li><a href="?logout=logout" class="nav-link">Logout</a></li>
                    
                    
                    
                  </ul>
                </li>
 <?php }else{  ?>

      <li><a href="login.php" class="nav-link">Login</a></li>
      <?php }  ?>


              
                
                
                <li><a href="complain.php" class="nav-link">Complain</a></li>
                <li><a href="Package.php" class="nav-link">Package</a></li>
                <li><a href="mysubcription.php" class="nav-link">My Subcription</a></li>
                <!-- <li><a href="contact.php" class="nav-link">Contact Us</a></li> -->

       
                <li  class="social"><a href="#contact-section" class="nav-link"><span style="color: #ffffff;font-size: 20px;" class="icon-facebook"></span></a></li>
                <li  class="social"><a href="#contact-section" class="nav-link"><span style="color: #ffffff;font-size: 20px;" class="icon-twitter"></span></a></li>
                <li  class="social"><a href="#contact-section" class="nav-link"><span style="color: #ffffff;font-size: 20px;" class="icon-linkedin"></span></a></li>
              </ul>
            </nav>
          </div>


          <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h3"></span></a></div>

        </div>
      </div>
      
    </header>
<!-- 
    <div class="hero"></div>
  

  
    
    

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/main.js"></script>
  </body>
</html> -->