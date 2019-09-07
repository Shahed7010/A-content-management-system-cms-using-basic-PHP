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
                            <small></small>
                        </h1>
                        
                    </div>
                </div>
             
                <div class="col-xs-12">
                
                <?php
                  if(isset($_GET['source'])){
                    $source=$_GET['source'];  
                  }
                    else{
                        $source='';
                    } 
                     
                switch($source){
                        case 'add_user';
                        echo "<h4>Add User:</h4>";
                        include("includes/add_user.php");  
                        break;
                        
                        case 'edit_user';
                        echo "<h4>EDIT USER:</h4>";
                        include("includes/edit_user.php");
                        break;
                        
                    default:
                        include("includes/view_all_users.php");
                    }
                ?>    
               
                </div>
               
               
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include("includes/admin_footer.php");?>