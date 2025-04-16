<?php
require_once('dbconnection.php');

if (isset($_POST['addCourse'])) {
    // For simplicity, assume instructor is already logged in with id=2 (adjust as needed)
    $instructor_id = 2;
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);

    // Insert course
    $stmt = $pdo->prepare("INSERT INTO courses (title, description, instructor_id) VALUES (?, ?, ?)");
    if ($stmt->execute([$title, $description, $instructor_id])) {
        $course_id = $pdo->lastInsertId();
        // Insert video content record
        $video_title = trim($_POST['video_title']);
        $video_url = trim($_POST['video_url']);
        $stmt2 = $pdo->prepare("INSERT INTO course_content (course_id, content_type, title, content_link) VALUES (?, 'video', ?, ?)");
        $stmt2->execute([$course_id, $video_title, $video_url]);
        header("Location: ../courses.php?msg=course_added");
        exit;
    } else {
        echo "Failed to add course.";
    }
}
