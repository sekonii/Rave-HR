<?php
include ('partials/header.php');
?>


<div class="jumbotron">
  <h1 class="display-4 text-center">Add Project</h1>
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
          <label>Project</label><br>
              <input type="text" name="project">
          </td>
        </tr>

        <tr>
          <td>
          <label>Description</label><br>
              <input type="text" name="description">
          </td>
        </tr>

        <tr>
          <td>
          <label>Start Date</label><br>
              <input type="date" name="startdate">
          </td>
        </tr>

        <tr>
          <td>
          <label>End Date</label><br>
              <input type="date" name="enddate">
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
          <label>Status</label><br>
              <input style="width: 8%;" type="radio" name="status" value="Successfull"> Successfull <br>
              <input style="width: 8%;" type="radio" name="status" value="InProgress"> InProgress <br>   
              <input style="width: 8%;" type="radio" name="status" value="OverDue"> OverDue 
          </td>
        </tr>

        <tr>
            <td colspan="2">
            <button type="submit" name="submit" value="Add Project" class="btn btn-primary"> Add Project</button>
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
    $project = $_POST['project'];
    $description = $_POST['description'];
    $department = $_POST['department'];
    $startdate = date('m/d/Y', strtotime($_POST['startdate']));
    $enddate = date('m/d/Y', strtotime($_POST['enddate']));

    if (isset($_POST['status'])) {
      $status = $_POST['status'];
    } else {
      $status = "OverDue";
    }

// save data to database
$sql = "INSERT INTO tbl_Projects SET 
    project = '$project',
    description = '$description',
    department = '$department',
    startdate = $startdate,
    enddate = $enddate,
    status = '$status'
";

$res = mysqli_query($conn, $sql);

if($res == TRUE){
    $_SESSION['pro-add'] = "<div class='success'>Project Added Successfully.</div>";
        header("location:" .SITEURL. "project.php");
}else{
    $_SESSION['pro-add'] = "<div class='error'>Failed to add Project, Try again.</div>";
        header("location:" .SITEURL. "add-project.php");
}
}
?>