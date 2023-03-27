<?php
include ('partials/header.php');
?>

<div class="main-content">
        <div class="wrapper">
        <h1>Projects</h1><br><br><br>

        <?php
        if(isset($_SESSION['pro-add'])){
            echo $_SESSION['pro-add'];
            unset($_SESSION['pro-add']);
        }
        ?>
        <?php
        if(isset($_SESSION['pro-delete'])){
            echo $_SESSION['pro-delete'];
            unset($_SESSION['pro-delete']);
        }
        ?>
        <?php
        if(isset($_SESSION['pro-update'])){
            echo $_SESSION['pro-update'];
            unset($_SESSION['pro-update']);
        }
        ?>
        <?php
        if(isset($_SESSION['user-not-found'])){
            echo $_SESSION['user-not-found'];
            unset($_SESSION['user-not-found']);
        }
        ?>
        <?php
        if(isset($_SESSION['incorrect'])){
            echo $_SESSION['incorrect'];
            unset($_SESSION['incorrect']);
        }
        ?>
        <?php
        if(isset($_SESSION['password'])){
            echo $_SESSION['password'];
            unset($_SESSION['password']);
        }
        ?><br>

        <a href="backroom/add-project.php" class="btn btn-primary">Add Project</a><br><br><br>

                <table class="table tbl-full">
                    <tr>
                        <th>S/N</th>
                        <th>Project</th>
                        <th>Description</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Department</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>

                    <?php 
                        $sql = "SELECT * FROM tbl_projects";
                        $res = mysqli_query($conn, $sql);

                        $sn=1;

                        if($res == TRUE){
                            $count = mysqli_num_rows($res);

                            if($count>0){
                                while($rows = mysqli_fetch_assoc($res)){

                                $id=$rows['pro_id'];
                                $project=$rows['project'];
                                $description=$rows['description'];
                                $startdate=$rows['startdate'];
                                $enddate=$rows['enddate'];
                                $department=$rows['department'];
                                $status=$rows['status'];
                    ?>

                    <tr>
                    <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $project; ?></td>
                    <td><?php echo $description; ?></td>
                    <td><?php echo $startdate; ?></td>
                    <td><?php echo $enddate; ?></td>
                    <td><?php echo $department; ?></td>
                    <td>  
                        <?php if($status=="Successfull"){
                            echo "<label style='color: Green;'>$status</label>";
                        }elseif($status=="InProgress"){
                                echo "<label style='color: Orange;'>$status</label>";
                        }elseif($status=="OverDue"){
                                echo "<label style='color: Red;'>$status</label>";
                        } ?>
                    </td>
                    <td>
                    <a href="<?php echo SITEURL;?>backroom/update-project.php?pro_id=<?php echo $id;?>" class="btn btn-primary">Update</a>
                    <a href="<?php echo SITEURL;?>backroom/delete-project.php?pro_id=<?php echo $id;?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                    </tr>

                    <?php
                    }
                    }else{
                    }
                    }
                    ?>
                </table>

        </div>
        <div class="clearfix"></div>
    </div>

<?php
include ('partials/footer.php');
?>