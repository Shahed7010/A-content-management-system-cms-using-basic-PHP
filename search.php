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
             
                if(isset($_POST["search"])){
                $search = $_POST["search"];
                
                    $query= "SELECT * FROM posts WHERE post_tags LIKE '%$search%'"; 
                    $fetched= mysqli_query($connect,$query);
                    if(!$fetched){
                        die("query failed" . mysqli_error($connect));
                    }
                    $count=mysqli_num_rows($fetched);
                    if($count == 0){
                        echo "<h2 class='lead'>No Results found<h2>";
                    }
                    
                    
                    
                    
                    else
                    {
                    while($row=mysqli_fetch_assoc($fetched)){
                    $post_id=$row['post_id'];
                    $post_title=$row['post_title'];
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
                    <a href="#"><?php echo $post_title;?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author;?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date;?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                <hr>
                <p><?php echo $post_content;?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id ?>"><span class="glyphicon glyphicon-chevron-right"></span>Read More</a>

                <hr>
                <!-- Comments Form -->
                <div class="well">
                   
                    <form role="form" action="" method="post">
                      <?php
                        if(!empty($_SESSION['user_name'])){                          
                        ?>
                        <div class="form-group">
                           <label for="cmnt_email">Leave a Comment:</label>
                            <textarea class="form-control" rows="1" name="content"></textarea>
                        </div>
                        <?Php   }else{ ?>
                      
                       
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
                            <textarea class="form-control" rows="1" name="content"></textarea>
                        </div>
                        <?Php  }?>
                        <button type="submit" class="btn btn-primary" name="post_cmnt">Submit</button>
                    </form>
                </div>

                <hr>

              <?php
                
                    }
              
                    if(isset($_POST['post_cmnt'])){
                        if($_SESSION['user_name']){
                            $cmnt_author=$_SESSION['user_name'];
                            $email=$_SESSION['user_email'];
                            $content=$_POST['content'];
                        }else{
                            $cmnt_author=$_POST['cmnt_author'];
                            $email=$_POST['email'];
                            $content=$_POST['content'];
                        }
                        
                        
                        if(!empty($content) && !empty($cmnt_author)){
                            $query="insert into comments (cmnt_post_id, cmnt_author, cmnt_email, cmnt_content, cmnt_status, cmnt_date)";                 $query.="values('{$post_id}','{$cmnt_author}','{$email}','{$content}', 'unapproved',now())";
                        mysqli_query($connect,$query);
                        
                        $cmnt_increase="update posts set post_comment_count=post_comment_count+1 where post_id='{$post_id}'";
                        mysqli_query($connect,$cmnt_increase);
                        }else{
                            echo "<script>alert('fields can not be empty!')</script>";
                        }
                        
                    }
              
                
    
                } 
                }
                
                ?>
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

      
      

    