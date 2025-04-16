<?php
include('./includes/header.php');
require_once('./db/dbconnection.php');

$course_id = isset($_GET['course_id']) ? intval($_GET['course_id']) : 0;
if (!$course_id) {
    echo "<div class='container mt-5'><p>Invalid Course ID.</p></div>";
    include('./includes/footer.php');
    exit;
}

// Fetch course details
$stmt = $pdo->prepare("SELECT c.*, u.name as instructor_name FROM courses c LEFT JOIN users u ON c.instructor_id = u.id WHERE c.id = ?");
$stmt->execute([$course_id]);
$course = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$course) {
    echo "<div class='container mt-5'><p>Course not found.</p></div>";
    include('./includes/footer.php');
    exit;
}

// Fetch course content (for simplicity, only video type is displayed)
$content_stmt = $pdo->prepare("SELECT * FROM course_content WHERE course_id = ? AND content_type = 'video'");
$content_stmt->execute([$course_id]);
$videos = $content_stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container mt-5">
    <h2><?php echo htmlspecialchars($course['title']); ?></h2>
    <p><?php echo htmlspecialchars($course['description']); ?></p>
    <p><strong>Instructor:</strong> <?php echo htmlspecialchars($course['instructor_name']); ?></p>

    <h4>Course Videos</h4>
    <?php if ($videos): ?>
        <?php foreach ($videos as $video): ?>
            <div class="mb-3">
                <p><?php echo htmlspecialchars($video['title']); ?></p>
                <!-- For demonstration, embed using a video URL -->
                <video width="100%" controls>
                    <source src="<?php echo htmlspecialchars($video['content_link']); ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No videos available for this course yet.</p>
    <?php endif; ?>

    <a href="exam.php?course_id=<?php echo $course_id; ?>" class="btn btn-warning">Take Exam</a>
</div>

<?php include('./includes/footer.php');
