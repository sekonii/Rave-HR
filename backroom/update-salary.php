<?php
include ('partials/header.php');
?>

<div class="main-content">
<div class="container">

        <?php
            $id=$_GET['sal_id'];

            $sql = "SELECT * FROM tbl_salary WHERE sal_id=$id";

            $res = mysqli_query($conn, $sql);
            if($res == TRUE){
                $count = mysqli_num_rows($res);
                if($count==1)
                {
                    $rows = mysqli_fetch_assoc($res);

                    $employee=$rows['employee'];
                    $department=$rows['department'];
                    $amount=$rows['amount'];
                    $payday=$rows['payday'];
                    $status=$rows['status'];
                }
            }else{
                header("location:" .SITEURL. "salary.php");
            }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
      <table class="tbl-30">
        <tr>
        <tr>
          <td>
          <label>Employee</label><br>
              <input type="text" name="employee" value="<?php echo $employee; ?>">
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
          <label>Amount</label><br>
              <input type="text" name="amount" value="<?php echo $amount; ?>">
          </td>
        </tr>

        <tr>
          <td>
          <label>Payday</label><br>
              <input type="date" name="payday" value="<?php echo $payday; ?>">
          </td>
        </tr>

        <tr>
          <td>
          <label>Status</label><br>
              <input style="width: 8%;" type="radio" name="status" <?php if($status=="Paid"){echo "checked";} ?> value="Paid"> Paid <br>   
              <input style="width: 8%;" type="radio" name="status" <?php if($status=="Due"){echo "checked";} ?> value="Due"> Due 
          </td>
        </tr>
        <tr>
            <td colspan="2">
            <button type="submit" name="submit" value="Update Salary" class="btn btn-primary"> Update Salary</button>
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
    $payday = $_POST['payday'];
    $status = $_POST['status'];

// save data to database
$sql2 = "UPDATE tbl_salary SET
    employee = '$employee',
    department = '$department',
    amount = '$amount',
    payday = '$payday',
    status = '$status'
    WHERE sal_id='$id'
";

$res2 = mysqli_query($conn, $sql2);

if($res2 == TRUE){
  $_SESSION['sal-update'] = "<div class='success'>Salary Updated Successfully.</div>";
  header("location:" .SITEURL. "salary.php");
}else{
  $_SESSION['sal-update'] = "<div class='error'>Failed to update salary, Try again later.</div>";
  header("location:" .SITEURL. "update-salary.php");
}
}
?>