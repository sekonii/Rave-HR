<?php 

include ('../config/constant.php');

    // Get admin id to be deleted
    $id = $_GET['pro_id'];

    // Create sql query to delete employee
    $sql = "DELETE FROM tbl_projects WHERE pro_id=$id";

    // execute the query
    $res = mysqli_query($conn, $sql);
    // Redirect to manage admin page with success/error message
    if($res == TRUE){
        // echo "Employee deleted";
        $_SESSION['pro-delete'] = "<div class='success'>Project Removed Successfully.</div>";
        header("location:" .SITEURL. "project.php");

    }else{
        // echo "Employee failed to delete";
        $_SESSION['pro-delete'] = "<div class='error'>Failed to delete Project, Try again later.</div>";
        header("location:" .SITEURL. "project.php");
    }

?>