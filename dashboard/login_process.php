<?php
session_start();
include "config/db.php";
$user_name =$_POST["username"];
$pass =$_POST["pass"];
$sql="SELECT *FROM users WHERE username=?";
$stnt=$conn->prepare($sql);
$stnt->bind_param('s',$user_name);
$stnt->execute();

$res=$stnt->get_result();
$user=$res->fetch_assoc();

if($user && $pass==$user["password"] ){
  $_SESSION['user']=[
   'id'=>$user['id'],
   'username'=>$user['username'],
   'name'=>$user['name']
  ];
  header("location:index.php");
}
else{
    header("location:login.php?error= user not found");
}

?>