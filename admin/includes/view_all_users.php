<?php include("modal.php") ?>
                   <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>User Name</th>
                           
                            <th>FirstName</th>
                            <th>LastName</th>
                            <th>Email</th>
                            <th>Image</th>
                            <th>Role</th>                            
                            <th></th>
                            <th></th>
                            <th></th>
                         
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $query="select * from users";
                        $fetched_posts=mysqli_query($connect,$query);
                        while($row=mysqli_fetch_assoc($fetched_posts)){
                        $user_id=$row["user_id"];
                        $user_name=$row["user_name"];
                        $user_firstname=$row["user_firstname"];
                        $user_lastname=$row["user_lastname"];
                        $user_email=$row["user_email"];
                        $user_image=$row["user_image"];
                        $user_role=$row["user_role"];
                        $randsalt=$row["randsalt"];
                        
                        echo"<tr>";
                        echo"<td>{$user_id}</td>";
                        echo"<td>{$user_name}</td>";
                        echo"<td>{$user_firstname}</td>";
                        echo"<td>{$user_lastname}</td>";
                        echo"<td>{$user_email}</td>";
                    
                        echo"<td><img src='../images/{$user_image}' width=50 height=50></td>";
                        echo"<td>{$user_role}</td>";
                            
                        echo"<td><a href='users.php?admin={$user_id}'>Make Admin</a></td>";
                        echo"<td><a href='users.php?source=edit_user&edit={$user_id}'>Edit</a></td>";
                        echo"<td><a rel='$user_id' href='javascript:void(0)' class='delete_user'>Delete</a></td>";
                        //echo"<td><a onclick=\"return confirm('Are you sure?');\"href='users.php?delete={$user_id}'>delete</a></td>";
     
                        echo"</tr>";
                        }
                       
                    ?>
                     </tbody>
                </table>
                
               
              
              <!-- delete post query -->
                <?php
                    if(isset($_GET['delete'])){
                        if(isset($_SESSION['user_role']) && $_SESSION['user_role']=='admin'){
                     
                    $delete_id=$_GET['delete'];
                    $query= "DELETE FROM users WHERE user_id={$delete_id}";
                    mysqli_query($connect, $query);
                    header("Location: users.php");
                    }
                    }
                ?>
                <!-- make admin -->
                <?php
                    if(isset($_GET['admin'])){
                    $user_id=$_GET['admin'];
                    $query= "update users set user_role='admin' where user_id={$user_id}";
                    mysqli_query($connect, $query);
                    header("Location: users.php");
                    }
                ?> 
                
               
              
             
            <script>
                $(document).ready(function(){
                $(".delete_user").on('click', function(){
                    var id= $(this).attr("rel");
                    var link="users.php?delete="+id+" ";
                    $(".modal_delete_link").attr("href",link);
                    $("#myModal").modal('show');

                });                  

                });

            </script>