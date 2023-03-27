<?php
include ('partials/header.php');
?>


<div class="jumbotron">
  <h1 class="display-4 text-center">Add salary</h1>
</div>

    <?php
      if(isset($_SESSION['add'])){
          echo $_SESSION['add'];
          unset ($_SESSION['add']);
      }
    ?>

<div class="main-content">
<div class="container">

        <form action="" method="POST" enctype="multipart/form-data">
      <table class="tbl-30">
        <tr>
          <td>
          <label>Employee</label><br>
              <input type="text" name="employee">
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
          <label>Amount</label><br>
              <input type="text" name="amount">
          </td>
        </tr>

        <tr>
          <td>
          <label>Payday</label><br>
              <input type="date" name="payday">
          </td>
        </tr>

        <tr>
          <td>
          <label>Status</label><br>
              <input style="width: 8%;" type="radio" name="status" value="Paid"> Paid <br>   
              <input style="width: 8%;" type="radio" name="status" value="Due"> Due 
          </td>
        </tr>

        <tr>
            <td colspan="2">
            <button type="submit" name="submit" value="Add salary" class="btn btn-primary"> Add salary</button>
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
    $employee = $_POST['employee'];
    $department = $_POST['department'];
    $amount = $_POST['amount'];
    $payday = date('m/d/Y', strtotime($_POST['payday']));

    if (isset($_POST['status'])) {
      $status = $_POST['status'];
    } else {
      $status = "OverDue";
    }

// save data to database
$sql = "INSERT INTO tbl_salary SET 
    employee = '$employee',
    department = '$department',
    amount = '$amount',
    payday = $payday,
    status = '$status'
";

$res = mysqli_query($conn, $sql);

if($res == TRUE){
    $_SESSION['sal-add'] = "<div class='success'>salary Added Successfully.</div>";
        header("location:" .SITEURL. "salary.php");
}else{
    $_SESSION['sal-add'] = "<div class='error'>Failed to add salary, Try again.</div>";
        header("location:" .SITEURL. "backroom/add-salary.php");
}
}
?>