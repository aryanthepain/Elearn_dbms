<?php
require_once('../dbconnection.php');

if (isset($_POST['stusignup']) && isset($_POST['stuname']) && isset($_POST['stuemail']) && isset($_POST['password'])) {

    $stuname = trim($_POST['stuname']);
    $stuemail = trim($_POST['stuemail']);
    $password = $_POST['password'];

    // Prepare the SQL query using placeholders
    $sql = "INSERT INTO student (stu_name, stu_email, stu_pass) VALUES (:stuname, :stuemail, :stu_pass)";
    $stmt = $pdo->prepare($sql);

    // Bind the parameters and execute the query
    $result = $stmt->execute([
        ':stuname' => $stuname,
        ':stuemail' => $stuemail,
        ':stu_pass' => $hashedPassword
    ]);

    // Return JSON response based on the result
    if ($result) {
        echo json_encode('ok');
    } else {
        echo json_encode('failed');
    }
}
