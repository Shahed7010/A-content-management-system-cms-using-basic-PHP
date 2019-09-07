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
                            Welcome to admin
                            <small>Shahed</small>
                        </h1>
                        
                    </div>
                </div>
             
                <div class="col-xs-6">
                <?php
               insertData();
                ?>
                    <form action="" method="post">
                       <label for="cat_title"><span class="strong">Add Category</span></label>
                        <div class="form-group">
                            <input class="form-control" type="text" name="cat_title">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                        </div>
                    </form>
                  <?php 
                    if(isset($_GET['edit'])){
                        $cat_id=$_GET['edit'];
                        include("includes/update_categories.php");
                      }
                  ?>
                </div>
                
                <div class="col-xs-6">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Cat-title</th>
                                <th></th>
                                <th></th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                           showInTable();
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- delete query -->
                <?php 
                if(isset($_GET['delete'])){
                    $delete_id=$_GET['delete'];
                    $query= "DELETE FROM categories WHERE cat_id={$delete_id}";
                    mysqli_query($connect, $query);
                    header("Location: categories.php");
                }
                ?>
               
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include("includes/admin_footer.php");?>


