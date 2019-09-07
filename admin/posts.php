<?php include("includes/admin_header.php");?>
<?php include("../includes/db.php");?>

    <div id="wrapper">

        <!-- Navigation -->
       <?php include("includes/admin_navigation.php");?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Posts
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
                        case 'add_posts';
                        echo "<h5>ADD POST:</h5>";
                        include("includes/add_posts.php");  
                        break;
                        
                        case 'edit_post';
                        include("includes/edit_posts.php");
                        break;
                        
                    default:
                        include("includes/view_all_posts.php");
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