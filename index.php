<?php include("includes/header.php");?>
<?php include("includes/db.php");?>   
    <!-- Navigation -->
<?php include("includes/navigation.php");?>


    <!-- Page Content -->
    <div class="container">

        <div class="row" >

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <h1 class="page-header">
                   Home Page
                    <small>CMS System</small>
                </h1>
                <?php
                $query="SELECT * FROM posts where post_status='published'";
                $fetched=mysqli_query($connect, $query);
                $count=mysqli_num_rows($fetched);
                $count=ceil($count/2);
                if(empty($count)){
                    echo "<h1>No Posts to Show</h1>";
                    }
                $current=0;
                $page=1;
                if(isset($_GET['source'])){
                    $page=$_GET['source'];
                    $current=$page*2-2;
                }
                $query="SELECT * FROM posts where post_status='published' limit {$current},2";
                $page_fetch=mysqli_query($connect, $query);
                while($row=mysqli_fetch_assoc($page_fetch)){
                    $post_title=$row['post_title'];
                    $post_id=$row['post_id'];
                    $post_author=$row['post_author'];
                    $post_content=$row['post_content'];
                    $post_date=$row['post_date'];
                    $post_image=$row['post_image'];
                    
                ?>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title;?></a>
                </h2>
                <div class="form-inline">
                <p class="lead form-group">
                    by <a href="user_posts.php?source=<?php echo $post_author;?>" title="See all Post of <?php echo $post_author;?>"><?php echo $post_author;?></a>
                </p>
                <p class="form-group"> in <span class="glyphicon glyphicon-time"></span> <?php echo $post_date;?></p>
                </div>
                <a href="post.php?p_id=<?php echo $post_id ?>"><img class="img-responsive img-thumbnail" src="images/<?php echo $post_image;?>" alt="" width=80% height=""></a>
                
                  <hr>
                <p><?php echo $post_content;?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id ?>">Read More</a>

                 <hr style="border-top: 1px dotted green">
                <?php } ?>
                <div class="text-center">
                <ul class="pagination">
                <?php
                for($i=1;$i<=$count;$i++){
                    if($i==$page){
                        echo "<li class='active' ><a href='index.php?source={$i}'>{$i}</a></li>";
                    }
                    else{
                        echo "<li><a href='index.php?source={$i}'>{$i}</a></li>";
                    }
                    }
                    ?>  
                </ul>
                </div>
            </div>

            <!-- Blog Sidebar Widgets Column -->
           <?php include("includes/sidebar.php");?>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Improving Working Skills</h4>
                    <p>This project is for improving the PHP skills for me. I tried the most to make the project better and better. this project helps a lot to learn PHP very well.</p>
                </div>

            </div>
 
        <!-- /.row -->

        <hr>

      <?php include("includes/footer.php");?>