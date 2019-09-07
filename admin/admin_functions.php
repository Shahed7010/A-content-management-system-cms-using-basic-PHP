<?php

function active_users(){
    if(isset($_GET['users'])){
    global $connect;
    if(!$connect){
     session_start();
    include("../includes/db.php");
    $session=session_id();
    $time= time();
    $timeout=$time-20;
    $query="select * from active_users where session='{$session}'";
    $users=mysqli_num_rows(mysqli_query($connect, $query));
    if($users==null){
       mysqli_query($connect, "insert into active_users(session,time,active_name) values ('$session','$time','{$_SESSION['user_name']}')");
    }else{
        mysqli_query($connect, "update active_users set time='$time' where session='$session'");
    }
    $active= mysqli_query($connect, "select * from active_users where time > '{$timeout}'");
  
    echo $count=mysqli_num_rows($active);
    }
    }
}
active_users();
function active_names(){
    global $connect;
    $session=session_id();
    $time= time();
    $timeout=$time-20;
    $query="select * from active_users where session='{$session}'";
    $users=mysqli_num_rows(mysqli_query($connect, $query));
    if($users==null){
       mysqli_query($connect, "insert into active_users(session,time,active_name) values ('$session','$time','{$_SESSION['user_name']}')");
    }else{
        mysqli_query($connect, "update active_users set time='$time' where session='$session'");
    }
    $active= mysqli_query($connect, "select * from active_users where time > '{$timeout}'");
  
    return $active;
  
}

    function insertData(){
        global $connect;
         if(isset($_POST['submit'])){
                    $cat_title=$_POST['cat_title'];
                    if($cat_title == "" || empty($cat_title)){
                        echo"Field should not be empty";
                    }
                    else{
                        $query="INSERT INTO categories (cat_title)";
                        $query.="VALUE ('{$cat_title}')";
                        $insert=mysqli_query($connect, $query);
                        if(!$insert){
                            die("query failed". mysqli_error($connect));
                        }
                    }
                }
    }

    function showInTable(){
        global $connect;
         $query="select * from categories";
                            $fetched=mysqli_query($connect,$query);
                            while($row=mysqli_fetch_assoc($fetched)){
                            $cat_id=$row["cat_id"];
                            $cat_title=$row["cat_title"];
                                echo"<tr>";
                                echo"<td>{$cat_id}</td>";
                                echo"<td>{$cat_title}</td>";
                                echo"<td><a href='categories.php?delete={$cat_id}'>Delete<a></td>";
                                echo"<td><a href='categories.php?edit={$cat_id}'>Edit<a></td>";
                                echo"</tr>";
                            }
    }



?>