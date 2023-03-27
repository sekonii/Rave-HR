<?php 

include ('../config/constant.php');

    // Get admin id to be deleted
    $id = $_GET['sal_id'];

    // Create sql query to delete salary
    $sql = "DELETE FROM tbl_salary WHERE sal_id=$id";

    // execute the query
    $res = mysqli_query($conn, $sql);
    // Redirect to manage admin page with success/error message
    if($res == TRUE){
        // echo "salary deleted";
        $_SESSION['delete'] = "<div class='success'>salary Removed Successfully.</div>";
        header("location:" .SITEURL. "salary.php");

    }else{
        // echo "salary failed to delete";
        $_SESSION['delete'] = "<div class='error'>Failed to delete salary, Try again later.</div>";
        header("location:" .SITEURL. "salary.php");
    }

?>