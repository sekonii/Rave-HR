<?php
include ('partials/header.php');
?>


<div class="jumbotron">
  <h1 class="display-4 text-center">Add Employee</h1>
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
          <label>Department</label><br>
              <input type="text" name="department">
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
            <button type="submit" name="submit" value="Add employee" class="btn btn-primary"> Add Employee</button>
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

    if (isset($_POST['gender'])) {

      $gender = $_POST['gender'];
    } else {
      $gender = "other";
    }

// save data to database
$sql = "INSERT INTO tbl_employee SET 
    name = '$name',
    phone = '$phone',
    address = '$address',
    department = '$department',
    gender = '$gender'
";

$res = mysqli_query($conn, $sql);

if($res == TRUE){
    $_SESSION['add'] = "<div class='success'>Employee Added Successfully.</div>";
        header("location:" .SITEURL. "emp.php");
}else{
    $_SESSION['add'] = "<div class='error'>Failed to add Employee, Try again.</div>";
        header("location:" .SITEURL. "add-emp.php");
}
}
?>