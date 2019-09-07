<?php include("includes/admin_header.php");?>

    <div id="wrapper">

        <!-- Navigation -->
       <?php include("includes/admin_navigation.php");?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            welcome to admin
                            <small><?php echo $_SESSION['user_lastname']; ?></small>
                        </h1>
<!--
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
-->
                    </div>
                </div>
                <?php
                $query="select * from posts";
                $post_count=mysqli_num_rows(mysqli_query($connect,$query));
                $query="select * from comments";
                $comment_count=mysqli_num_rows(mysqli_query($connect,$query));
                $query="select * from users";
                $user_count=mysqli_num_rows(mysqli_query($connect,$query));
                $query="select * from categories";
                $cat_count=mysqli_num_rows(mysqli_query($connect,$query));
                ?>
                <!-- /.row -->
                <div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                  <div class='huge'><?php echo $post_count ?></div>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                     <div class='huge'><?php echo $comment_count ?></div>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <div class='huge'><?php echo $user_count ?></div>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class='huge'><?php echo $cat_count ?></div>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
               <?php
                $query="select * from posts where post_status='draft'";
                $draft_post_count=mysqli_num_rows(mysqli_query($connect,$query));
                $query="select * from comments where cmnt_status='disapproved'";
                $unapproved_comment_count=mysqli_num_rows(mysqli_query($connect,$query));
                $query="select * from users where user_role='admin'";
                $admin_user_count=mysqli_num_rows(mysqli_query($connect,$query));
                $query="select * from categories";
                $cat_count=mysqli_num_rows(mysqli_query($connect,$query));
                ?>
    
            <div class="row">
            <script type="text/javascript">
              google.charts.load('current', {'packages':['bar']});
              google.charts.setOnLoadCallback(drawChart);

              function drawChart() {
                var data = google.visualization.arrayToDataTable([
                  ['Contents', 'Count', ],
                    
                <?php
                $contents=[' All Posts','draft Posts','Comments','Disapproved comments', 'Users', 'Admin', 'Categories'];
                $content_count=[$post_count, $draft_post_count, $comment_count, $unapproved_comment_count, $user_count, $admin_user_count, $cat_count];
                    
                for($i=0;$i<7;$i++){
                    echo "['{$contents[$i]}'". "," . "{$content_count[$i]}],";    
                }

                ?>

                ]);

                var options = {
                  chart: {
                    title: 'Graphical View of Contents',
                    subtitle: 'Posts, Comments, Users and Categories',
                  },
                  bars: 'vertical' // Required for Material Bar Charts.
                };

                var chart = new google.charts.Bar(document.getElementById('barchart_material'));

                chart.draw(data, google.charts.Bar.convertOptions(options));
              }
            </script>
             <div id="barchart_material" style="width: auto; height: 500px;"></div>
            </div>
            
            
            
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include("includes/admin_footer.php");?>