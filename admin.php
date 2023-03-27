<?php
include ('partials/header.php');
?>

<div class="main-content">
        <div class="wrapper">
        <h1>Admins</h1><br><br><br>

        <?php
        if(isset($_SESSION['add'])){
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        ?>
        <?php
        if(isset($_SESSION['delete'])){
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        ?>
        <?php
        if(isset($_SESSION['update'])){
            echo $_SESSION['update'];
            unset($_SESSION['update']);
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

        <a href="backroom/add-admin.php" class="btn btn-primary">Add Admin</a><br><br><br>

                <table class="table tbl-full">
                    <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Gender</th>
                        <th>Actions</th>
                    </tr>
                    <?php 
                            $sql = "SELECT * FROM tbl_admin";
                            $res = mysqli_query($conn, $sql);

                            $sn=1;

                            if($res == TRUE){
                                $count = mysqli_num_rows($res);

                                if($count>0){
                                    while($rows = mysqli_fetch_assoc($res)){

                                    $id=$rows['adm_id'];
                                    $name=$rows['name'];
                                    $username=$rows['username'];
                                    $password=$rows['password'];
                                    $phone=$rows['phone'];
                                    $address=$rows['address'];
                                    $gender=$rows['gender'];
                        ?>

                    <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $username; ?></td>
                        <td><?php echo $password; ?></td>
                        <td><?php echo $phone; ?></td>
                        <td><?php echo $address; ?></td>
                        <td><?php echo $gender; ?></td>
                        <td>
                        <a href="<?php echo SITEURL;?>backroom/password.php?adm_id=<?php echo $id;?>" class="btn btn-primary">Password</a>
                        <a href="<?php echo SITEURL;?>backroom/update-admin.php?adm_id=<?php echo $id;?>" class="btn btn-primary">Update</a>
                        <a href="<?php echo SITEURL;?>backroom/delete-admin.php?adm_id=<?php echo $id;?>" class="btn btn-danger">Delete</a>
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