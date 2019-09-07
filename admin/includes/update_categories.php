
    <form action="" method="post">
    <label for="cat_title"><span class="strong">Edit Category</span></label>
     <?php 
        if(isset($_GET['edit'])){
      
                   $query="select * from categories where cat_id =$cat_id";
                   $fetched=mysqli_query($connect,$query);
                  $row=mysqli_fetch_assoc($fetched);
                      $cat_id=$row["cat_id"];
                      $cat_title=$row["cat_title"];
              ?>
             <div class="form-group">
              <input value="<?php echo $cat_title ?>" class="form-control" type="text" name="cat_title">
             </div>
                 <?php        } ?>

      
    <div class="form-group">
    <input class="btn btn-primary" type="submit" name="cat_update" value="Update Category">
    </div>
    </form>

 <!-- edit query -->
                <?php 
                if(isset($_POST['cat_update'])){
                    $edit_title=$_POST['cat_title']; 
                    $query= "UPDATE categories SET cat_title='{$edit_title}'";
                    $query .= "WHERE cat_id={$cat_id}";
                    $update_query=mysqli_query($connect, $query);
                    header("Location: categories.php");
                    if(!$update_query){
                        die("query failed".mysqli_error($connect));
                    }
                }
               ?>