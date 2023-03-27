<?php
include ('partials/header.php');
?>

<div class="jumbotron">
  <h1 class="display-4 text-center">Update Password</h1>
</div>

<div class="main-content">
<div class="container">
           <?php
              if(isset($_SESSION['password'])){
                  echo $_SESSION['password'];
                  unset ($_SESSION['password']);
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
                }
            }else{
                header("location:" .SITEURL. "admin.php");
            }
            ?>

        <form action="" method="POST" enctype="multipart/form-data">
      <table class="tbl-30">
        <tr>
            <td>Name  </td>
            <td><input type="text" name="name" value="<?php echo $name; ?>"></td>
        </tr>
        <tr>
            <td>Curent Password  </td>
            <td><input type="password" name="password" placeholder="Old Password"></td>
        </tr>
        <tr>
            <td>New Password  </td>
            <td><input type="password" name="new_password" placeholder="New Password"></td>
        </tr>
        <tr>
            <td>Confirm Password  </td>
            <td><input type="password" name="confirm_password" placeholder="Confirm Password"></td>
        </tr>

        <tr>
            <td colspan="2">
            <input type="hidden" name="adm_id" value="<?php echo $id; ?>">
            <button type="submit" name="submit" value="Update Password" class="btn btn-primary"> Update Password</button>
            </td>
        </tr>
      </table>
    </form>
        </div>
    </div>

<?php include ('partials/footer.php'); ?>


<?php
// check submit button
if(isset($_POST['submit'])){
    $id = $_POST['adm_id'];
    $current_password = md5($_POST['password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);


    $sql = "SELECT * FROM tbl_admin Where adm_id=$id AND password='$current_password'";

    $res = mysqli_query($conn, $sql);
    if($res == TRUE){

        $count = mysqli_num_rows($res);
        if($count==1){
            if($new_password==$confirm_password){
                $sql2 = "UPDATE tbl_admin SET 
                password = '$new_password'
                WHERE adm_id='$id'
            ";

            $res2 = mysqli_query($conn, $sql2);
            if($res2 == TRUE){
                $_SESSION['password'] = "<div class='success'>Password Updated Successfully.</div>";
                header("location:" .SITEURL. "admin.php");
            }else{
                $_SESSION['password'] = "<div class='error'>Failed to update password, Try again later.</div>";
                header("location:" .SITEURL. "admin.php");
            }   
                
            }else{
                $_SESSION['incorrect'] = "<div class='error'>Incorrect Password</div>";
                header("location:" .SITEURL. "backroom/password.php");
            }
        }else{
            
        }
    }else{
        $_SESSION['user-not-found'] = "<div class='error'>Admin not found</div>";
        header("location:" .SITEURL. "admin.php");
    }
}
?>