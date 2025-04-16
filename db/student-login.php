<?php
require_once('dbconnection.php');

if (isset($_POST['studentLogin'])) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? AND role = 'student'");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user && password_verify($password, $user['password'])) {
        // In a real app, set session variables here.
        header("Location: ../student_dashboard.php");
        exit;
    } else {
        header("Location: ../login.php?msg=invalid_credentials");
        exit;
    }
}
