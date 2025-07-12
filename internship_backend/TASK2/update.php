<?php
include 'db.php';

$id = (int)$_POST['id'];
$fname = $conn->real_escape_string($_POST['fname']);
$lname = $conn->real_escape_string($_POST['lname']);
$age = (int)$_POST['age'];

$sql = "UPDATE users SET fname='$fname', lname='$lname', age=$age WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: read.php");
    exit();
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>