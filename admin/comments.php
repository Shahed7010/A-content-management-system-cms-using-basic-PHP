<?php include("includes/admin_header.php");?>
<?php include("../includes/db.php");?>

    <div id="wrapper">

        <!-- Navigation -->
       <?php include("includes/admin_navigation.php");?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small>Shahed</small>
                        </h1>
                        
                    </div>
                </div>
             
                <div class="col-xs-12">
                 <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Post Id</th>
                            <th>Author</th>
                            <th>email</th>
                            <th>content</th>
                            <th>View Post</th>
                            <th>status</th>
                            <th>date</th>
                    
                            <th></th>
                            <th></th>
                            <th></th>                     
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $query="select * from comments";
                        $fetched_cmnt=mysqli_query($connect,$query);
                        while($row=mysqli_fetch_assoc($fetched_cmnt)){
                        $cmnt_id=$row['cmnt_id'];
                        $cmnt_post_id=$row['cmnt_post_id'];
                        $cmnt_author=$row['cmnt_author'];
                        $cmnt_email=$row['cmnt_email'];
                        $cmnt_content=$row['cmnt_content'];
                        $cmnt_status=$row['cmnt_status'];
                        $cmnt_date=$row['cmnt_date'];
                        
                        
                        echo"<tr>";
                        echo"<td>{$cmnt_id}</td>";
                        echo"<td>{$cmnt_post_id}</td>";
                        echo"<td>{$cmnt_author}</td>";
                    
                        echo"<td>{$cmnt_email}</td>";
        
                        echo"<td>{$cmnt_content}</td>";
                            
                        $query="select * from posts where post_id={$cmnt_post_id}";
                        $fetched_cmnt_post=mysqli_query($connect,$query);
                        while($post=mysqli_fetch_assoc($fetched_cmnt_post)){
                            $post_id=$post['post_id'];
                            $post_title=$post['post_title'];
                            echo"<td><a href='../post.php?p_id={$post_id}'>{$post_title}</a></td>";
                        }
                            
                        echo"<td>{$cmnt_status}</td>";
            
                        echo"<td>{$cmnt_date}</td>";
                        echo"<td><a href='comments.php?approve={$cmnt_id}'>Approve</a></td>";
                        echo"<td><a href='comments.php?disapprove={$cmnt_id}'>Disapprove</a></td>";
                        echo"<td><a href='comments.php?delete={$cmnt_id}'>Delete</a></td>"; 
                        echo"</tr>";
                           
                        }
                        if(!$fetched_cmnt){
                            die("failed".mysqli_error($connect));
                        }
                    ?>
                     </tbody>
                </table>
                
                <?php
                    if(isset($_GET['approve'])){
                    $cmnt_id=$_GET['approve'];
                    $query= "update comments set cmnt_status='Approved' where cmnt_id={$cmnt_id}";
                    mysqli_query($connect, $query);
                    header("Location: comments.php");
                    }
                ?>   
                <?php
                    if(isset($_GET['disapprove'])){
                    $cmnt_id=$_GET['disapprove'];
                    $query= "update comments set cmnt_status='Disapproved' where cmnt_id={$cmnt_id}";
                    mysqli_query($connect, $query);
                    header("Location: comments.php");
                    }
                ?>     
              
              <!-- delete comment query -->
                <?php
                    if(isset($_GET['delete'])){
                    $delete_id=$_GET['delete'];
                    $query= "DELETE FROM comments WHERE cmnt_id={$delete_id}";
                    mysqli_query($connect, $query);
                    header("Location: comments.php");
                    }
                ?>
            
                </div>
                
               
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include("includes/admin_footer.php");?>