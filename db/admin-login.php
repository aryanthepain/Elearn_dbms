<?php
require_once('dbconnection.php');

if (isset($_POST['adminLogin'])) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? AND role = 'admin'");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user && password_verify($password, $user['password'])) {
        header("Location: ../dashboard.php");
        exit;
    } else {
        header("Location: ../admin-login.php?msg=invalid_credentials");
        exit;
    }
}
