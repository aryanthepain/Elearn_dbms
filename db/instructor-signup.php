<?php
require_once('dbconnection.php');

if (isset($_POST['instructorSignup'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = 'instructor';

    $stmt = $pdo->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$name, $email, $password, $role])) {
        header("Location: ../login.php?msg=signup_success");
        exit;
    } else {
        echo "Signup failed. Please try again.";
    }
}
