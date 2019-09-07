<?php
  if(isset($_GET['edit'])){
    $post_id=$_GET['edit'];      
    $query="select * from posts where post_id='{$post_id}'";
      
    $fetched=mysqli_query($connect, $query);
    while($row=mysqli_fetch_assoc($fetched)){
    $post_title=$row["post_title"];
    $post_author=$row["post_author"];
    $post_category_id=$row["post_category_id"];
    $post_status=$row["post_status"];
      
    $post_image=$row["post_image"];
      
    $post_tags=$row["post_tags"];
    $post_content=$row["post_content"];
    $post_date=$row["post_date"];
    $post_comment_count=$row["post_comment_count"];
      
    if(!$fetched){
        die("query failed". mysqli_error($connect));
        }
    } 
  } 
?>

<?php
  if(isset($_POST['edit_post'])){
    
    $post_title=$_POST["post_title"];
    $post_author=$_POST["post_author"];
    $post_category_id=$_POST["category"];
    $post_status=$_POST["post_status"];
      
    $post_image=$_FILES['post_image']['name'];
    $post_image_tmp=$_FILES['post_image']['tmp_name'];
      
    $post_tags=$_POST["post_tags"];
    $post_content=$_POST["post_content"];
    $post_date=date('d-m-y');
    $post_comment_count=4;
      
    move_uploaded_file($post_image_tmp, "../images/$post_image");
    
    $query="update posts set post_category_id='{$post_category_id}', Post_title='{$post_title}', post_author='{$post_author}', post_date=now(), post_content='{$post_content}', post_tags='{$post_tags}', post_comment_count='{$post_comment_count}', post_status='{$post_status}' where post_id='{$post_id}'";

    $post_insert=mysqli_query($connect, $query);
    if($post_image){  
        $img_query="update posts set post_image='{$post_image}' where post_id='{$post_id}'";
        mysqli_query($connect, $img_query);
    } 
    if(!$post_insert){
        die("query failed".mysqli_error($connect));
    }
    echo "<h5 class='bg-success'>Successfully Updated! <a href='../post.php?p_id={$post_id}'>view post</a></h5>";
  } 
?>
   
   <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" class="form-control" name="post_title" value="<?php echo $post_title ?>">
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
                if($cat_id==$post_category_id){
                    echo "<option selected value={$cat_id}>{$cat_title}</option>";
                }else{
                    echo "<option value={$cat_id}>{$cat_title}</option>";
                }
            
            }
    ?>   
    </select>
    </div>
    
    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" class="form-control" name="post_author" value="<?php echo $_SESSION['user_name'] ?>" readonly>
    </div>
    
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <select name="post_status" id="">
            <option value="<?php echo $post_status ?>"><?php echo $post_status ?></option>
            <?php 
                if($post_status=='published'){
                    echo "<option value='draft'>Draft</option>";
                }else
                    echo "<option value='published'>Publish</option>";
            ?>
            
        </select>
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags ?>">
    </div>
    <div class="form-group">
        <img src="../images/<?php echo $post_image ?>" height="100" width="100" alt=""><br>
        <label for="post_image">Change Image</label>
        <input type="file" name="post_image">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10"><?php echo $post_content ?></textarea>
    </div>
    <div class="form-group">
        <label for="post_date">Date</label>
        <input type="date" data-date="" data-date-format="DD MMMM YYYY" value="2015-08-09">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="edit_post" value="Update">
    </div>
      
</form>

 
 
