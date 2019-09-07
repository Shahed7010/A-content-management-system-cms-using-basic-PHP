<?php include("includes/header.php");?>
<?php include("includes/db.php");?>   
    <!-- Navigation -->
    <?php include("includes/navigation.php");?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                
                <?php
                if(isset($_GET['source'])){
                    $author=$_GET['source'];
                
                $query="SELECT * FROM posts WHERE post_author='{$author}'";
                $fetched=mysqli_query($connect, $query);
                while($row=mysqli_fetch_assoc($fetched)){
                    $post_title=$row['post_title'];
                    $post_id=$row['post_id'];
                    $post_author=$row['post_author'];
                    $post_content=$row['post_content'];
                    $post_date=$row['post_date'];
                    $post_image=$row['post_image'];
                
                ?>
                
                <h1 class="page-header">
                    Page heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id;?>"><?php echo $post_title;?></a>
                </h2>
                <p class="lead">
                    by <a href="" title="See all Post of <?php echo $post_author;?>"><?php echo $post_author;?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date;?></p>
                <hr>
                <a href="post.php?p_id=<?php echo $post_id ?>"><img class="img-responsive img-thumbnail" src="images/<?php echo $post_image;?>" alt="" width=80% height=""></a>
                <hr>
                <p><?php echo $post_content;?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id;?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr style="border-top: 1px dotted green">

                <!-- show Comments -->
                <?php
                    $query="select * from comments where cmnt_post_id='{$post_id}' and cmnt_status='Approved' order by cmnt_id desc";
                    $cmnt_fetch=mysqli_query($connect, $query);
                    while($row=mysqli_fetch_assoc($cmnt_fetch)){
                        $cmnt_author=$row['cmnt_author'];
                        $cmnt_date=$row['cmnt_date'];
                        $cmnt_content=$row['cmnt_content'];
                  
                ?>
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $cmnt_author; ?>
                            <small><?php echo $cmnt_date; ?></small>
                        </h4>
                        <?php echo $cmnt_content; ?>
                    </div>
                </div>
                
                <?php
                      if(!$cmnt_fetch){
                        die("Failed".mysqli_error($connect));
                        }
                    }
                ?>
            
                <!-- Comments Form -->
<!--
                <div class="well">
                   
                    <form role="form" action="" method="post">
                       <div class="form-group">
                           <label for="cmnt_author">your Name</label>
                            <input type="text" class="form-control" name="cmnt_author">
                        </div>
                        <div class="form-group">
                           <label for="cmnt_email">Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                           <label for="cmnt_email">Leave a Comment:</label>
                            <textarea class="form-control" rows="3" name="content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="post_cmnt">Submit</button>
                    </form>
                </div>

                <hr>
-->
                
                
                <!-- insert Comments -->  
              <?php }
                
//                    if(isset($_POST['post_cmnt'])){
//                        $cmnt_author=$_POST['cmnt_author'];
//                        $email=$_POST['email'];
//                        $content=$_POST['content'];
//                        $status="unaproved";
//                        $query="insert into comments (cmnt_post_id, cmnt_author, cmnt_email, cmnt_content, cmnt_status, cmnt_date)";
//                        $query.="values('{$post_id}','{$cmnt_author}','{$email}','{$content}','{$status}',now())";
//                        mysqli_query($connect,$query);
//                        $cmnt_increase="update posts set post_comment_count=post_comment_count+1 where post_id='{$post_id}'";
//                        mysqli_query($connect,$cmnt_increase);
//                        
//                    }
                    
                    
                }?>
            </div>
          
            <!-- Blog Sidebar Widgets Column -->
           <?php include("includes/sidebar.php");?>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>
 
        <!-- /.row -->

        <hr>

      <?php include("includes/footer.php");?>