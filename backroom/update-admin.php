<?php
include ('partials/header.php');
?>


<div class="jumbotron">
  <h1 class="display-4 text-center">Add Admin</h1>
</div>

<div class="main-content">
<div class="container">
           <?php
              if(isset($_SESSION['update'])){
                  echo $_SESSION['update'];
                  unset ($_SESSION['update']);
              }
           ?>

            <?php

            $id=$_GET['adm_id'];

            $sql = "SELECT * FROM tbl_admin WHERE adm_id=$id";

            $res = mysqli_query($conn, $sql);

            if($res == TRUE){
                $count = mysqli_num_rows($res);
                if($count==1)
                {
                    $rows = mysqli_fetch_assoc($res);

                    $id=$rows['adm_id'];
                    $name=$rows['name'];
                    $username=$rows['username'];
                    $phone=$rows['phone'];
                    $address=$rows['address'];
                    $gender=$rows['gender'];
                }
            }else{
                header("location:" .SITEURL. "admin.php");
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
          <label>username</label><br>
              <input type="text" name="username" value="<?php echo $username; ?>">
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
        <label>Gender</label><br>
            <input style="width: 8%;" <?php if($gender=="Male"){echo "checked";} ?> type="radio" name="gender" value="Male"> Male <br>
            <input style="width: 8%;" <?php if($gender=="Female"){echo "checked";} ?> type="radio" name="gender" value="Female"> Female <br>   
            <input style="width: 8%;" <?php if($gender=="Other"){echo "checked";} ?> type="radio" name="gender" value="Other"> Other 
        </td>
        </tr>

        <tr>
            <td colspan="2">
            <input type="hidden" name="adm_id" value="<?php echo $id; ?>">
            <button type="submit" name="submit" value="Update employee" class="btn btn-primary"> Update Employee</button>
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
// save to database
// check submit button
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];


// save data to database
$sql2 = "UPDATE tbl_admin SET 
    name = '$name',
    username = '$username',
    phone = '$phone',
    address = '$address',
    gender = '$gender'
    WHERE adm_id='$id'
";

$res2 = mysqli_query($conn, $sql2);

if($res2 == TRUE){
    $_SESSION['update'] = "<div class='success'>Admin Updated Successfully.</div>";
    header("location:" .SITEURL. "admin.php");
}else{
    $_SESSION['update'] = "<div class='error'>Failed to update Admin, Try again later.</div>";
    header("location:" .SITEURL. "admin.php");
}
}
?>