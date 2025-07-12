<?php
require 'db.php';

$data = json_decode(file_get_contents('php://input'), true);

$id    = $data['id'];
$field = $data['field'];
$value = $data['value'];

$allowedFields = ['fname', 'lname', 'age'];

if (in_array($field, $allowedFields)) {
    $stmt = $pdo->prepare("UPDATE users SET $field = ? WHERE id = ?");
    $stmt->execute([$value, $id]);
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid field']);
}
?>