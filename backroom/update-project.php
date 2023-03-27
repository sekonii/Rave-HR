<?php
include ('partials/header.php');
?>

<div class="main-content">
<div class="container">

        <?php
            $id=$_GET['pro_id'];

            $sql = "SELECT * FROM tbl_projects WHERE pro_id=$id";

            $res = mysqli_query($conn, $sql);
            if($res == TRUE){
                $count = mysqli_num_rows($res);
                if($count==1)
                {
                    $rows = mysqli_fetch_assoc($res);

                    $project=$rows['project'];
                    $description=$rows['description'];
                    $startdate=$rows['startdate'];
                    $enddate=$rows['enddate'];
                    $department=$rows['department'];
                    $status=$rows['status'];
                }
            }else{
                header("location:" .SITEURL. "emp.php");
            }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
      <table class="tbl-30">
        <tr>
          <td>
          <label>Project</label><br>
              <input type="text" name="project" value="<?php echo $project; ?>">
          </td>
        </tr>

        <tr>
          <td>
          <label>Description</label><br>
              <input type="text" name="description" value="<?php echo $description; ?>">
          </td>
        </tr>

        <tr>
          <td>
          <label>Start Date</label><br>
              <input type="date" name="startdate" value="<?php echo $startdate; ?>">
          </td>
        </tr>

        <tr>
          <td>
          <label>End Date</label><br>
              <input type="date" name="enddate" value="<?php echo $enddate; ?>">
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
          <label>Status</label><br>
              <input style="width: 8%;" type="radio" name="status" <?php if($status=="Successfull"){echo "checked";} ?> value="Successfull"> Successfull <br>
              <input style="width: 8%;" type="radio" name="status" <?php if($status=="InProgress"){echo "checked";} ?> value="InProgress"> In Progress <br>   
              <input style="width: 8%;" type="radio" name="status" <?php if($status=="OverDue"){echo "checked";} ?> value="OverDue"> OverDue 
          </td>
        </tr>

        <tr>
            <td colspan="2">
            <button type="submit" name="submit" value="Add Project" class="btn btn-primary"> Update Project</button>
            </td>
        </tr>
      </table>
    </form>
        </div>
    </div>

    <!-- Footer starts -->
    <section class="footer">
        <div class="wrapper text-center">
            <p>2022 All rights reserved. Rave HR. Designed By <a href="#"> Sultani</a></p>
        </div>
    </section>
    </div>
    <!-- Footer ends -->
</body>

<script src="rave.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>

<?php
// check submit button
if(isset($_POST['submit'])){
    $project = $_POST['project'];
    $description = $_POST['description'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $department = $_POST['department'];
    $status = $_POST['status'];

// save data to database
$sql2 = "UPDATE tbl_projects SET
    project = '$project',
    description = '$description',
    startdate = '$startdate',
    enddate = '$enddate',
    department = '$department',
    status = '$status'
    WHERE pro_id='$id'
";

$res2 = mysqli_query($conn, $sql2);

if($res2 == TRUE){
  $_SESSION['pro-update'] = "<div class='success'>Project Updated Successfully.</div>";
  header("location:" .SITEURL. "project.php");
}else{
  $_SESSION['pro-update'] = "<div class='error'>Failed to update Project, Try again later.</div>";
  header("location:" .SITEURL. "update-project.php");
}
}
?>