<?php
include 'db.php';

$fnames = $_POST['fname'];
$lnames = $_POST['lname'];
$ages = $_POST['age'];

$values = [];

for ($i = 0; $i < count($fnames); $i++) {
    $fname = $conn->real_escape_string($fnames[$i]);
    $lname = $conn->real_escape_string($lnames[$i]);
    $age = (int)$ages[$i];
    $values[] = "('$fname', '$lname', $age)";
}

$sql = "INSERT INTO users (fname, lname, age) VALUES " . implode(',', $values);

if ($conn->query($sql) === TRUE) {
    header("Location: read.php");
    exit();
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>