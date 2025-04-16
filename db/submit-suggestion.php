<?php
require_once('dbconnection.php');
if (isset($_POST['submitSuggestion'])) {
    // Assume logged-in student id is 1.
    $student_id = 1;
    $suggestion = trim($_POST['suggestion']);

    $stmt = $pdo->prepare("INSERT INTO suggestions (student_id, suggestion_text) VALUES (?, ?)");
    $stmt->execute([$student_id, $suggestion]);
    header("Location: ../suggestions.php?msg=thanks");
    exit;
}
