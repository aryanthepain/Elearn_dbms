<?php
require_once('dbconnection.php');

if (isset($_POST['submitExam'])) {
    $course_id = intval($_POST['course_id']);
    // For demonstration, assume student is logged in with id=1.
    $student_id = 1;
    $answers = $_POST['answers'];

    // For simplicity: calculate a dummy score (e.g., 80)
    $score = 80;
    $attempt = 1;

    // In a real system, you’d loop through questions and grade answers.
    $stmt = $pdo->prepare("INSERT INTO exam_attempts (student_id, course_id, score, attempt) VALUES (?, ?, ?, ?)");
    $stmt->execute([$student_id, $course_id, $score, $attempt]);
    header("Location: ../certificate.php?course_id=" . $course_id);
    exit;
}
