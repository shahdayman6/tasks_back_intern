<?php
include 'db.php';

$ids = $_POST['ids'];
$ids_array = explode(',', $ids);
$clean_ids = array_map('intval', $ids_array);
$id_list = implode(',', $clean_ids);

$sql = "DELETE FROM users WHERE id IN ($id_list)";

if ($conn->query($sql) === TRUE) {
    header("Location: read.php");
    exit();
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>