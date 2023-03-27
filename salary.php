<?php
include ('partials/header.php');
?>

<div class="main-content">
        <div class="wrapper">

        <h1>Salary</h1><br><br><br>

        <?php
        if(isset($_SESSION['sal-add'])){
            echo $_SESSION['sal-add'];
            unset($_SESSION['sal-add']);
        }
        ?>
        <?php
        if(isset($_SESSION['sal-delete'])){
            echo $_SESSION['sal-delete'];
            unset($_SESSION['sal-delete']);
        }
        ?>
        <?php
        if(isset($_SESSION['sal-update'])){
            echo $_SESSION['sal-update'];
            unset($_SESSION['sal-update']);
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


        <a href="backroom/add-salary.php" class="btn btn-primary">Add Salary</a><br><br><br>

                <table class="table tbl-full">
                    <tr>
                        <th>S/N</th>
                        <th>Employee</th>
                        <th>Department</th>
                        <th>Amount</th>
                        <th>Payday</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>

                    <?php 
                        $sql = "SELECT * FROM tbl_salary";
                        $res = mysqli_query($conn, $sql);

                        $sn=1;

                        if($res == TRUE){
                            $count = mysqli_num_rows($res);

                            if($count>0){
                                while($rows = mysqli_fetch_assoc($res)){

                                $id=$rows['sal_id'];
                                $employee=$rows['employee'];
                                $department=$rows['department'];
                                $amount=$rows['amount'];
                                $payday=$rows['payday'];
                                $status=$rows['status'];
                    ?>

                    <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $employee; ?></td>
                        <td><?php echo $department; ?></td>
                        <td><?php echo $amount; ?></td>
                        <td><?php echo $payday; ?></td>
                        <td>  
                            <?php if($status=="Paid"){
                                echo "<label style='color: Green;'>$status</label>";
                            }elseif($status=="Due"){
                                    echo "<label style='color: Red;'>$status</label>";
                            } ?>
                        </td>
                        <td>
                        <a href="<?php echo SITEURL;?>backroom/update-salary.php?sal_id=<?php echo $id;?>" class="btn btn-primary">Update</a>
                        <a href="<?php echo SITEURL;?>backroom/delete-salary.php?sal_id=<?php echo $id;?>" class="btn btn-danger">Delete</a>
                        </td>
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