<?php
require 'db.php';

$data = json_decode(file_get_contents('php://input'), true);

$fname = $data['fname'];
$lname = $data['lname'];
$age   = $data['age'];

if ($fname && $lname && $age) {
    $stmt = $pdo->prepare("INSERT INTO users (fname, lname, age) VALUES (?, ?, ?)");
    $stmt->execute([$fname, $lname, $age]);
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid data']);
}
?>