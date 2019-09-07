<?php include("includes/admin_header.php");?>
<?php include("../includes/db.php");?>

    <div id="wrapper">

        <!-- Navigation -->
       <?php 
        if($_SESSION['user_role']==='admin'){
            include("includes/admin_navigation.php");
        }
        ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Profile of <?php echo $_SESSION['user_lastname'];?>
                            <small></small>
                        </h1>
                        <?php
                        if(isset($_SESSION['user_name'])){
                        $user_name=$_SESSION['user_name'];      
                        $query="select * from users where user_name='{$user_name}'";

                        $fetched=mysqli_query($connect, $query);
                        while($row=mysqli_fetch_assoc($fetched)){
                        $user_firstname=$row["user_firstname"];
                        $user_lastname=$row["user_lastname"];
                        $user_email=$row["user_email"];
                        $user_role=$row["user_role"];
                        $user_image=$row["user_image"];
                        $user_id=$row["user_id"];

                        if(!$fetched){
                        die("query failed". mysqli_error($connect));
                            }
                        } 
                        } 

                        ?>
                        
                    <div class="well col-md-6">
                    
                    <div class="form-group">
                    <img src="../images/<?php echo $user_image ?>" height="100" width="100" alt=""><br>
                    </div>
                    <div class="form-group">
                    <label for="user_name">User Name: </label>
                    <label for="user_name"><?php echo $user_name ?></label>
                    </div>
                    
                    <div class="form-group">
                    <label for="user_firstname">First Name: </label>
                    <label for="user_firstname" class=""><?php echo $user_firstname ?></label>
                    </div>

                    <div class="form-group">
                    <label for="user_lastname">Last Name: </label>
                    <label for="user_lastname"><?php echo $user_lastname ?></label>
                    </div>
                    <div class="form-group">
                    <label for="user_email">Email:</label>
                    <label for="user_email"><?php echo $user_email ?></label>
                    </div>
                    <div class="form-group">
                    <label for="user_role">User Role: </label>
                    <label for="user_role"><?php echo $user_role ?></label>
                    </div>

                    
                    

            <div class="form-group">
            <a href="users.php?source=edit_user&edit=<?php echo $user_id ?>"><span class="label label-success">EDIT PROFILE</span></a>
            <a href="javascript:history.go(-1)"><span class="label label-primary">GO BACK</span></a>
            <a href="../index.php"><span class="label label-primary">HOME PAGE</span></a>
            </div>

                 </div>
                        
                </div>
                </div>
               
               
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include("includes/admin_footer.php");?>