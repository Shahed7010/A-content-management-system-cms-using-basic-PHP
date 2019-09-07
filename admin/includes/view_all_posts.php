<?php include("modal.php") ?>
<?php
if(isset($_POST['apply'])){
    if(isset($_POST['checkboxArray'])==''){
         echo "<p class='bg-warning'> Please Select any Item!</p>";
    }
   
else{
        foreach($_POST['checkboxArray'] as $box_id){
            $apply=$_POST['applied_option'];
            switch($apply){
                case 'published':
                    $query="update posts set post_status='{$apply}' where post_id={$box_id}";
                    mysqli_query($connect,$query);
                    break;
                case 'draft':
                    $query="update posts set post_status='{$apply}' where post_id={$box_id}";
                    mysqli_query($connect,$query);
                    break;
                case 'delete':
                    $query="delete from Posts where post_id={$box_id}";
                    mysqli_query($connect,$query);
                    break;
            }
        }
    }
}
?>
                  <form action="" method="post">
                   
                   <div class="col-xs-2" style="background-color: gray">
                       <select name="applied_option" id="" class="form-control">
                           <option value="">Select option</option>
                           <option value="draft">Draft</option>
                           <option value="published">Publish</option>
                           <option value="delete">Delete</option>
                       </select>
                   </div>
                   <div class="col-xs-8">
                       <input type="submit" name="apply" value="Apply" class="btn btn-success">
                       <a href="./posts.php?source=add_posts" class="btn btn-primary">Add new post</a>
                   </div>
                   <br>
                   <br>
                   <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="selectAllCheckbox"></th>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th>Tags</th>
                            
                            <th>Date</th>
                            <th>Comments</th>
                            <th></th>
                            <th></th>
                            <th></th>
                         
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $query="select * from posts";
                        $fetched_posts=mysqli_query($connect,$query);
                        while($row=mysqli_fetch_assoc($fetched_posts)){
                        $post_id=$row["post_id"];
                        $post_title=$row["post_title"];
                        $post_author=$row["post_author"];
                        $post_category_id=$row["post_category_id"];
                        $post_status=$row["post_status"];
                        $post_image=$row["post_image"];
                        $post_tags=$row["post_tags"];
                        $post_date=$row["post_date"];
                            
                        $cmnt_count=mysqli_query($connect, "select * from comments where cmnt_post_id={$post_id}");
                        $post_cmnt_count=mysqli_num_rows($cmnt_count);
                        
                        echo"<tr>";
                        ?>
                        <td><input type='checkbox' class="checkBoxes" name="checkboxArray[]" value="<?php echo $post_id ?>"></td>
                        <?php
                        echo"<td>{$post_id}</td>";
                        echo"<td>{$post_title}</td>";
                        echo"<td>{$post_author}</td>";
                            
                            $cat_query="select * from categories where cat_id={$post_category_id}";
                            $fetch_cat=mysqli_query($connect,$cat_query);
                            while($row=mysqli_fetch_assoc($fetch_cat)){
                                $category=$row["cat_title"];
                                echo"<td>{$category}</td>";
                                }
                        
                        echo"<td>{$post_status}</td>";
                        echo"<td><img src='../images/{$post_image}' width=50 height=50></td>";
                        echo"<td>{$post_tags}</td>";
                        echo"<td>{$post_date}</td>";
                        echo"<td>{$post_cmnt_count}</td>";
                        echo"<td><a href='../post.php?p_id={$post_id}'>View Post</a></td>";
                        echo"<td><a href='posts.php?source=edit_post&edit={$post_id}'>Edit</a></td>";
                          
                        echo"<td><a rel='$post_id' href='javascript:void(0)' class='delete_link'>Delete</a></td>";
                        //echo"<td><a onclick=\"return confirm('Are you sure?');\" href='posts.php?delete={$post_id}'>delete</a></td>";
                        
                        echo"</tr>";
                        }
                       
                    ?>
                     </tbody>
                </table>
           </form>     
               
              
              <!-- delete post query -->
                <?php
                    if(isset($_GET['delete'])){
                    if(isset($_SESSION['user_role'])){
                        if($_SESSION['user_role']=='admin'){    
                    $delete_id=mysqli_real_escape_string($connect, $_GET['delete']);
                    $query= "DELETE FROM posts WHERE post_id={$delete_id}";
                    mysqli_query($connect, $query);
                    header("Location: posts.php");
                            }
                        }
                    }
                ?>
                
               
    <script>
        $(document).ready(function(){
        $(".delete_link").on('click', function(){
            var id= $(this).attr("rel");
            var link="posts.php?delete="+id+" ";
            $(".modal_delete_link").attr("href",link);
            $("#myModal").modal('show');
        
        });                  
                          
        });
        
    </script>