<?php
include ('partials/header.php');
?>


<div class="jumbotron">
  <h1 class="display-4 text-center">Add Admin</h1>
</div>

<div class="main-content">
<div class="container">
           <?php
              if(isset($_SESSION['add'])){
                  echo $_SESSION['add'];
                  unset ($_SESSION['add']);
              }
           ?>

        <form action="" method="POST" enctype="multipart/form-data">
      <table class="tbl-30">
        <tr>
          <td>
          <label>Name</label><br>
              <input type="text" name="name">
          </td>
        </tr>

        <tr>
          <td>
          <label>username</label><br>
              <input type="text" name="username">
          </td>
        </tr>

        <tr>
          <td>
          <label>Password</label><br>
              <input type="password" name="password">
          </td>
        </tr>

        <tr>
          <td>
          <label>Phone Number</label><br>
              <input type="text" name="phone">
          </td>
        </tr>

        <tr>
          <td>
          <label>Address</label><br>
              <input type="text" name="address">
          </td>
        </tr>

        <tr>
          <td>
          <label>Gender</label><br>
              <input style="width: 8%;" type="radio" name="gender" value="Male"> Male <br>
              <input style="width: 8%;" type="radio" name="gender" value="Female"> Female <br>   
              <input style="width: 8%;" type="radio" name="gender" value="Other"> Other 
          </td>
        </tr>

        <tr>
            <td colspan="2">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <button type="submit" name="submit" value="Add employee" class="btn btn-primary"> Add Admin</button>
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
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = md5($_POST['password']);

    if (isset($_POST['gender'])) {

      $gender = $_POST['gender'];
    } else {
      $gender = "other";
    }

// save data to database
$sql = "INSERT INTO tbl_admin SET 
    name = '$name',
    username = '$username',
    password = '$password',
    phone = '$phone',
    address = '$address',
    gender = '$gender'
";

$res = mysqli_query($conn, $sql);

if($res == TRUE){
    $_SESSION['add'] = "<div class='success'>Admin Added Successfully.</div>";
        header("location:" .SITEURL. "admin.php");
}else{
    $_SESSION['add'] = "<div class='error'>Failed to add Admin, Try again.</div>";
        header("location:" .SITEURL. "add-admin.php");
}
}
?>