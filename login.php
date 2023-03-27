<?php
include ('config/constant.php');
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

<body style="background-color: #bfbae8;">

<div class="main-content">
<div class="wrapper">
    <div class="login" style="margin-left: 30%;">

    <h1 class="text-center">Admin Login</h1>

        <form action="" method="POST" enctype="multipart/form-data">
        <table class="tbl-30">
            <label>Username</label><br><br>
            <input type="text" name="username"><br><br>

            <label>Password</label><br><br>
            <input type="password" name="password"><br><br><br>

            <button type="submit" name="submit" class="btn-primary" style="margin-left: 20%;"> Login</button>
            </form>
        </table>
        </form><br><br>
        <p class="text-center">Created by <a href="">Sultani</a></p>
        </div>
    </div> 
</div>
    
</body>
</html>

<?php
// check submit button
if(isset($_POST['submit'])){
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $password = mysqli_real_escape_string($conn, md5($_POST['password']));

// check login info
$sql = "SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password'";

$res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);
    if($count==1)
    {
        $rows = mysqli_fetch_assoc($res);

        $id=$rows['adm_id'];
        $username=$rows['username'];
        $password=$rows['password'];
        $_SESSION['login'] = "<div class='success'>Login Successfull!</div>";
        $_SESSION['user'] =  $username;

        header("location:" .SITEURL. "");
    }else{
        $_SESSION['login'] = "<div class='error'>Incorrect Username or Password!</div>";
        header("location:" .SITEURL. "login.php");
    }

}
?>