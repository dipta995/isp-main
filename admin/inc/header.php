<?php 
include '../Classes/ComplainClass.php';
include '../Classes/AreaClass.php';

session_start();
$comp = new ComplainClass();
  if ($_SESSION['loginauth']!='admin') {
    header("Location:login.php");
    }
  if (isset($_GET['logout'])=='action') {
    session_destroy();
    header("Location:login.php");
  }
  $adminrole = 	$_SESSION['status'];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Panel</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  
  <link type="text/css" href="css/main.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
</head>
<body>
  <div class="container-fluid">
    <!-- nav bar -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <a class="navbar-brand" href="index.php"><img src="../images/logo.png" alt=""></a>

      <a class="navbar-brand" target="__blank"  href="https://dashboard.tawk.to/#/dashboard/60e0852dd6e7610a49a97090"><img style="height: 40px;" src="../images/chat.png" alt=""></a>


      <ul  class="navbar-nav">
        <li class="nav-item dropdown float-right">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            <?php echo $admin_email = $_SESSION['username']; ?> 
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="?logout=action">Logout</a>
          </div>
        </li>
      </ul>
    </nav>
    
  </div>
  <!-- header -->
  <style>
  .w3-light-grey{background: #17a2b8 !important; }
  .w3-light-grey .btn-group{margin-left: 10px;}
  .menucls{color:white;margin-left: 10px;}
   .menucls{margin-left: 25px;}
  </style>
  <div class="w3-sidebar w3-bar-block w3-light-grey w3-card" >
  <div>
  </div>
  <div class="btn-group w3-bar-item">
      <button type="button" class="btn btn-info dropdown-toggle w3-bar-item w3-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Admin
      </button>
      <div class="dropdown-menu">
      <?php if ($adminrole==0) {  ?>
        <a class="dropdown-item" href="add_admin.php">Add Admin</a> <?php } ?>
        <a class="dropdown-item" href="show_admin.php">Admin List</a>
      </div>
    </div>
    <div class="btn-group w3-bar-item">
      <button type="button" class="btn btn-info dropdown-toggle w3-bar-item w3-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        User
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="add_user.php">Add User</a>
        <a class="dropdown-item" href="show_user.php">User List</a>
      </div>
    </div>
    <div class="btn-group w3-bar-item">
      <button type="button" class="btn btn-info dropdown-toggle w3-bar-item w3-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Package
      </button>
      <div class="dropdown-menu">
      <?php if ($adminrole==0 || $adminrole==1) {  ?>
        <a class="dropdown-item" href="add_package.php">Add Package</a> <?php } ?>
        <a class="dropdown-item" href="show_package.php">Package List</a>
      </div>
    </div>
    <?php if ($adminrole==0) {  ?>
    <div class="btn-group w3-bar-item">
      <button type="button" class="btn btn-info dropdown-toggle w3-bar-item w3-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Employee
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="add_employee.php">Add Employee</a>
        <a class="dropdown-item" href="employee_list.php">Employee List</a>
        <a class="dropdown-item" href="pay_salary.php"> Salary Sheet </a>
      </div>
    </div>
   <?php } ?>
    <div class="btn-group w3-bar-item">
      <button type="button" class="btn btn-info dropdown-toggle w3-bar-item w3-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Slide
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="add_slide.php">Create Slide</a>
        <a class="dropdown-item" href="slide.php">Slide List</a>
      </div>
    </div>
    <?php if ($adminrole==0 || $adminrole==1) {  ?>
    <a href="add_area.php" class="menucls btn btn-info w3-bar-item w3-button">Area</a>  
      <a href="customers.php" class="menucls btn btn-info w3-bar-item w3-button">Customers</a> 
      <a href="package.php" class="menucls w3-bar-item w3-button btn btn-info"> Subscription</a> <?php } ?>
      <a href="complain.php" class="menucls w3-bar-item w3-button btn btn-info">Complain</a> 
  </div>

<div style="margin-left:30%">
