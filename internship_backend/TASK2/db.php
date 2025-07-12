<?php
$host="localhost";
$user="root";
$pass="";
$db_name="internship_db";
$conn=new mysqli($host,$user,$pass,$db_name);
if($conn->connect_error){
echo"connection is faild".$conn->connect_error;
}
?>