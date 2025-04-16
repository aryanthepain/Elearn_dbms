<?php
require_once('dbconnection.php');
if (isset($_POST['submitForum'])) {
    $course_id = intval($_POST['course_id']);
    // Assume logged-in user id is 1; in production, this comes from session.
    $user_id = 1;
    $content = trim($_POST['content']);

    $stmt = $pdo->prepare("INSERT INTO forum_posts (course_id, user_id, content) VALUES (?, ?, ?)");
    $stmt->execute([$course_id, $user_id, $content]);
    header("Location: ../discussion.php?course_id=" . $course_id);
    exit;
}
