<?php
include "config/db.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = trim($_POST['name']);
    $username = trim($_POST["username"]);
    $pass = $_POST["pass"];

    $errors = [];

    if (empty($name) || strlen($name) < 3) {
        $errors[] = "The name must be at 3 letters";
    }

    if (empty($username) || strlen($username) < 3) {
        $errors[] = "The username must be at 3 letters";
    }

   if (empty($pass)) {
    $errors[] = "Password required";
} elseif (strlen($pass) < 8) {
    $errors[] = "The password must be at 8 letters";
} elseif (!preg_match('/[A-Za-z]/', $pass) || !preg_match('/[0-9]/', $pass)) {
    $errors[] = "The password must contain letters and numbers.";
}

    // 4. تأكد إن username مش مكرر
    $check = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $check->bind_param("s", $username);
    $check->execute();
    $check->store_result();
    if ($check->num_rows > 0) {
        $errors[] = "Username already exists";
    }
    $check->close();

    // 5. لو فيه أخطاء، نرجّع المستخدم برسالة
    if (!empty($errors)) {
        // جمع كل الأخطاء في بارامتر واحد
        $error_string = urlencode(implode(" - ", $errors));
        header("Location: register.php?error=$error_string");
        exit;
    }

    // 6. لو كله تمام، سجل المستخدم
    $hpass = password_hash($pass, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (name, username, password) VALUES (?, ?, ?)");
    $stmt->bind_param('sss', $name, $username, $hpass);
    $stmt->execute();

    if ($stmt->affected_rows === 1) {
        header("Location: login.php?success=Registration done");
        exit;
    } else {
        header("Location: register.php?error=Registration faild");
        exit;
    }
}
?>