<?php
  if(isset($_POST['create_post'])){
    
    $post_title=$_POST["post_title"];
    $post_author=$_POST["post_author"];
    $post_category_id=$_POST["category"];
    $post_status=$_POST["post_status"];
      
    $post_image=$_FILES['post_image']['name'];
    $post_image_tmp=$_FILES['post_image']['tmp_name'];
      
    $post_tags=$_POST["post_tags"];
    $post_content=$_POST["post_content"];
    $post_date=date('d-m-y');
    
      
    move_uploaded_file($post_image_tmp, "../images/$post_image");
      
    if($_POST["post_title"]!=='' && $_POST["post_author"]!=='' && $_POST["post_content"]!==''){ 
    $query="INSERT INTO posts(post_category_id, Post_title, post_author, post_date, post_image, post_content, post_tags,  post_status)";
    $query.="VALUES('{$post_category_id}','{$post_title}','{$post_author}', now() ,'{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status}')";
      
    $post_insert=mysqli_query($connect, $query);
      
    if(!$post_insert){
        die("query failed".mysqli_error($connect));
    }
      $post_id=mysqli_insert_id($connect);
      echo "<h5 class='bg-success'>Successfully Created Post! <a href='../post.php?p_id={$post_id}'>view post</a> or <a href='./posts.php'>view all post</a></h5>";
    }else{
         echo "<h5 class='bg-danger'>Please fillup all the Fields!  go <a href='index.php'>Home Page</a></h5>";
    }
  } 
?>
   
   <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" class="form-control" name="post_title">
    </div>
            
    <div class="form-group">
    <label for="category"><span class="strong">Category</span></label>
    <select name="category" id="">
    <?php 
            $query="select * from categories";
            $fetched=mysqli_query($connect,$query);
            while($row=mysqli_fetch_assoc($fetched)){
            $cat_id=$row["cat_id"];
            $cat_title=$row["cat_title"];
            echo "<option value='{$cat_id}'>{$cat_title}</option>";
            }
    ?>   
    </select>
    </div>
    
    
    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" class="form-control" name="post_author" value="<?php echo $_SESSION['user_name'] ?>" disabled>
    </div>
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <select name="post_status" id="">
            <option value="published">Published</option>
            <option value="drafts">Draft</option>
        </select>
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="post_image">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
    </div>
    
    
</form>