<?php
include ('config/constant.php');
include ('login-check.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Rave HR - An Employee Management System</title>
    <link href="../images/logo.png" rel="icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<body>
    <!-- Menu starts -->
    <section class="navbar">
        <img class="open" onclick="openNav()" src="images/check.png" alt="open">
        <div class="logo"><a href="index.php" title="Logo"><img src="images/logo.png" alt="Restaurant Logo" class="img-responsive"></a></div>
        
        <div class="menu text-right">
            <ul>
                <li><a href="login.php">LogIn</a></li>  
            </ul>
        </div>

        <div class="clearfix"></div>
    </section>

    <div id="mySideNav" class="sidenav">
    <img href="javascript:void(0)" class="open" onclick="closeNav()" src="images/check.png" alt="close">
        <h1 style="color: white; margin-left: 20%;">Admin</h1> <br><hr><br>
        <a href="index.php"> Home</a>
        <a href="emp.php"> Employee</a>
        <a href="project.php"> Project</a>
        <a href="salary.php"> Salary</a>
        <a href="admin.php"> Admin</a>
        <a href="logout.php"> Log Out</a>
    </div>
    <!-- Menu ends -->

    <div id="main" class="mainCon">

