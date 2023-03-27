<?php
include ('partials/header.php');
?>

<div class="jumbotron">
  <h1 class="display-4 text-center">Update Employee</h1>
</div>
     <div class="main-content">
        <div class="wrapper">
        <?php
            $id=$_GET['emp_id'];

            $sql = "SELECT * FROM tbl_employee WHERE emp_id=$id";

            $res = mysqli_query($conn, $sql);
            if($res == TRUE){
                $count = mysqli_num_rows($res);
                if($count==1)
                {
                    $rows = mysqli_fetch_assoc($res);

                    $id=$rows['emp_id'];
                    $name=$rows['name'];
                    $phone=$rows['phone'];
                    $address=$rows['address'];
                    $department=$rows['department'];
                    $gender=$rows['gender'];
                }
            }else{
                header("location:" .SITEURL. "emp.php");
            }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
              <tr>
                <td>
                <label>Name</label><br>
                    <input type="text" name="name" value="<?php echo $name; ?>">
                </td>
              </tr>

              <tr>
                <td>
                <label>Phone Number</label><br>
                    <input type="text" name="phone" value="<?php echo $phone; ?>">
                </td>
              </tr>

              <tr>
                <td>
                <label>Address</label><br>
                    <input type="text" name="address" value="<?php echo $address; ?>">
                </td>
              </tr>

              <tr>
                <td>
                <label>Department</label><br>
                    <input type="text" name="department" value="<?php echo $department; ?>">
                </td>
              </tr>

              <tr>
                <td>
                <label>Gender</label><br>
                    <input style="width: 8%;" <?php if($gender=="Male"){echo "checked";} ?> type="radio" name="gender" value="Male"> Male <br>
                    <input style="width: 8%;" <?php if($gender=="Female"){echo "checked";} ?> type="radio" name="gender" value="Female"> Female <br>   
                    <input style="width: 8%;" <?php if($gender=="Other"){echo "checked";} ?> type="radio" name="gender" value="Other"> Other 
                </td>
              </tr>
                <tr>
                    <td colspan="2">
                    <button type="submit" name="submit" value="Update Employee" class="btn btn-primary"> Update Employee</button>
                    </td>
                </tr>
                
            </table>
        </form>
        </div>
    </div>

    <?php
include ('partials/footer.php');
?>

<?php
// check submit button
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $department = $_POST['department'];
    $gender = $_POST['gender'];

// save data to database
$sql2 = "UPDATE tbl_employee SET
    name = '$name',
    phone = '$phone',
    address = '$address',
    department = '$department',
    gender = '$gender'
    WHERE emp_id='$id'
";

$res2 = mysqli_query($conn, $sql2);

if($res2 == TRUE){
  $_SESSION['update'] = "<div class='success'>Employee Updated Successfully.</div>";
  header("location:" .SITEURL. "emp.php");
}else{
  $_SESSION['update'] = "<div class='error'>Failed to update Employee, Try again later.</div>";
  header("location:" .SITEURL. "update-emp.php");
}
}
?>