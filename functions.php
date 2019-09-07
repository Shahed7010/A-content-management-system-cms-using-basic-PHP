<?php

function active_users(){
    if(isset($_GET['users'])){
    global $connect;
    if(!$connect){
     session_start();
        if($_SESSION['user_name']){

      
    include("includes/db.php");
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

   