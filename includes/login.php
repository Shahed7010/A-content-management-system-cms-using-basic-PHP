<?php include("db.php"); ?>
<?php  session_start(); ?>

<?php 
    if(isset($_POST['login'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        
        $username=mysqli_real_escape_string($connect,$username);
        $password=mysqli_real_escape_string($connect,$password);
        
        $query="SELECT * FROM users WHERE user_name='{$username}'";
        $fetch_user=mysqli_query($connect, $query);
        if(!$fetch_user){
            die("Failed".mysqli_error($connect));    
        }
        while($row=mysqli_fetch_assoc($fetch_user)){
            $user_id=$row['user_id'];
            $user_name=$row['user_name'];
            $user_password=$row['user_password'];
            $user_firstname=$row['user_firstname'];
            $user_lastname=$row['user_lastname'];
            $user_role=$row['user_role'];
            $user_email=$row['user_email'];
        }
        $actual_password=$user_password;
        //$password = crypt($password, $user_password);
        if(password_verify($password,$user_password)){
            $_SESSION['user_name']=$user_name;
            $_SESSION['user_password']=$user_password;
            $_SESSION['actual_password']=$actual_password;
            $_SESSION['user_firstname']=$user_firstname;
            $_SESSION['user_lastname']=$user_lastname;
            $_SESSION['user_role']=$user_role;
            $_SESSION['user_email']=$user_email;
//            header("Location: ../admin");   
//        }else{
            header("Location: ../index.php");
        }else{
            echo "<script>alert('wrong username or password')</script>";
            header("Location: ../index.php");
        }
    }

?>
