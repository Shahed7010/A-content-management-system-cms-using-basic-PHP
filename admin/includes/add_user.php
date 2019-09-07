<?php
  if(isset($_POST['create_user'])){
    
    $user_name=$_POST["user_name"];
    $user_password=$_POST["user_password"];
    $user_firstname=$_POST["user_firstname"];
    $user_lastname=$_POST["user_lastname"];
    $user_email=$_POST["user_email"];
    $user_role=$_POST["radio"];
      
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
    move_uploaded_file($user_image_tmp, "../images/$user_image");
    
    $user_name= mysqli_real_escape_string($connect,$user_name);
    $user_password= mysqli_real_escape_string($connect,$user_password);
    $user_email= mysqli_real_escape_string($connect,$user_email);
      
      if($_POST["user_name"]!=='' && $_POST["user_password"]!==''){  
        $check_query="select user_name from users";
        $fetch=mysqli_query($connect, $check_query);
        while($row=mysqli_fetch_assoc($fetch)){
            $users[]=$row['user_name'];
        }
    if(in_array($user_name,$users,TRUE)){
        echo "<h5 class='bg-danger'>Username Exists! Please try another username.  go <a href='index.php'>Home Page</a></h5>";
        }else{
//            $select_salt=mysqli_query($connect,"select randsalt from users");
//            $fetch_salt=mysqli_fetch_array($select_salt);
//            $salt=$fetch_salt['randsalt'];
//            $user_password=crypt($user_password,$salt);
            $user_password= password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10));
            $query="INSERT INTO users(user_name, user_password, user_firstname, user_lastname, user_email, user_image ,user_role)";
            $query.="VALUES('{$user_name}','{$user_password}','{$user_firstname}','{$user_lastname}', '{$user_email}', '{$user_image}', '{$user_role}')";

            $user_insert=mysqli_query($connect, $query);

            if(!$user_insert){
            die("query failed".mysqli_error($connect));
            }

              echo "<h5 class='bg-success'>You've registered successfully!  go <a href='users.php'>View All Users</a></h5>";
        }
    }else{
        echo "<h5 class='bg-danger'>Please fillup all the Fields!  go <a href='index.php'>Home Page</a></h5>";
    }
  
  } 
?>
   
  <form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="user_firstname">First Name</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>

    <div class="form-group">
        <label for="user_lastname">Last Name</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>
    <div class="form-group">
        <label for="user_email">Enter Email</label>
        <input type="email" class="form-control" name="user_email">
    </div>
    <div class="radio-button">
        <label for="user_role"><input type="radio" value="user" name="radio" checked>User</label>
        <label for="user_role"><input type="radio" value="admin" name="radio">Admin</label>
    </div>
     
    <div class="form-group">
        <label for="user_name">User Name</label>
        <input type="text" class="form-control" name="user_name">
    </div>
    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>
    <div class="form-group">
        <label for="user_image">Upload Image</label>
        <input type="file" name="user_image">
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_user" value="Register">
    </div>
    
    
</form>