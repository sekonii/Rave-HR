<?php 

include ('../config/constant.php');

    // Get admin id to be deleted
    $id = $_GET['emp_id'];

    // Create sql query to delete employee
    $sql = "DELETE FROM tbl_employee WHERE emp_id=$id";

    // execute the query
    $res = mysqli_query($conn, $sql);
    // Redirect to manage admin page with success/error message
    if($res == TRUE){
        // echo "Employee deleted";
        $_SESSION['delete'] = "<div class='success'>Employee Removed Successfully.</div>";
        header("location:" .SITEURL. "emp.php");

    }else{
        // echo "Employee failed to delete";
        $_SESSION['delete'] = "<div class='error'>Failed to delete Employee, Try again later.</div>";
        header("location:" .SITEURL. "emp.php");
    }

?>