 <?php
  if(isset($_GET['edit'])){
    $user_id=$_GET['edit'];      
    $query="select * from users where user_id='{$user_id}'";
      
    $fetched=mysqli_query($connect, $query);
    while($row=mysqli_fetch_assoc($fetched)){
    $user_name=$row["user_name"];
    $user_firstname=$row["user_firstname"];
    $user_lastname=$row["user_lastname"];
    $user_email=$row["user_email"];
    $user_role=$row["user_role"];
    $user_image=$row["user_image"];
    $user_password=$row["user_password"];
    
      
    if(!$fetched){
        die("query failed". mysqli_error($connect));
        }
    } 
  } 

?>
  
<?php
  if(isset($_POST['update_user'])){
    
    $user_name=$_POST["user_name"];
    $user_password=$_POST["user_password"];
    $user_firstname=$_POST["user_firstname"];
    $user_lastname=$_POST["user_lastname"];
    $user_email=$_POST["user_email"];
    $user_role=$_POST["user_role"];
    
      
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
      
    move_uploaded_file($user_image_tmp, "../images/$user_image");
    
//    $select_salt=mysqli_query($connect,"select randsalt from users");
//    $fetch_salt=mysqli_fetch_array($select_salt);
//    $salt=$fetch_salt['randsalt'];
//    $crypt_password=crypt($user_password,$salt);
      
    $query="update users set user_name='{$user_name}', user_firstname='{$user_firstname}', user_lastname='{$user_lastname}', user_email='{$user_email}', user_role='{$user_role}' where user_id='{$user_id}'";
    $user_update=mysqli_query($connect, $query);
      
    if(!empty($user_password)){
        $user_password= password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10));
        $query="update users set user_password='{$user_password}' where user_id='{$user_id}'";
        $user_update=mysqli_query($connect, $query);
    }
      
    if($user_image){  
        $img_query="update users set user_image='{$user_image}' where user_id='{$user_id}'";
        mysqli_query($connect, $img_query);
    } 
    if(!$user_update){
        die("query failed".mysqli_error($connect));
    }else{
          echo "<h5 class='bg-success'>Successfully Updated! <a href='users.php'>view users</a></h5>";  
    }
//    if($_SESSION['user_role']==='admin'){
//        header("location: users.php");
//    }else{
//        header("location: ./profile.php");
//    }

  } 
?>
   
  <form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="user_firstname">First Name</label>
        <input value="<?php echo $user_firstname ?>" type="text" class="form-control" name="user_firstname">
    </div>

    <div class="form-group">
        <label for="user_lastname">Last Name</label>
        <input value="<?php echo $user_lastname ?>" type="text" class="form-control" name="user_lastname">
    </div>
    <div class="form-group">
        <label for="user_email">Enter Email</label>
        <input value="<?php echo $user_email ?>" type="email" class="form-control" name="user_email">
    </div>
    <div class="form-group">
    <label for="user_role">User Role: </label>
    <select name="user_role" id="">
       
        <option value="<?php echo $user_role ?>"><?php echo $user_role ?></option>
        <?php 
            if($user_role == 'user'){
                echo "<option value='admin'> admin </option>";
                
            }else{
                 echo "<option value='user'> user </option>";
            }
           
        ?>
    </select>
     
    </div>
    
    <div class="form-group">
        <label for="user_name">User Name</label>
        <input value="<?php echo $user_name ?>" type="text" class="form-control" name="user_name">
    </div>
    <div class="form-group">
        <label for="user_password">Change Password?</label>
        <input type="password" class="form-control" name="user_password" placeholder="enter new password">
    </div>
    <div class="form-group">
       <img src="../images/<?php echo $user_image ?>" height="50" width="50" alt=""><br>
        <label for="user_image">Change Image</label>
        <input type="file" name="user_image">
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update_user" value="Update">
    </div>
    
    
</form> 
 
