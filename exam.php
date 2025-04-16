<?php
include('./includes/header.php');
require_once('./db/dbconnection.php');

$course_id = isset($_GET['course_id']) ? intval($_GET['course_id']) : 0;
if (!$course_id) {
    echo "<div class='container mt-5'><p>Invalid Course ID.</p></div>";
    include('./includes/footer.php');
    exit;
}

// Fetch exam questions for the course
$stmt = $pdo->prepare("SELECT * FROM exams WHERE course_id = ?");
$stmt->execute([$course_id]);
$questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-5">
    <h2>Exam for Course ID: <?php echo $course_id; ?></h2>
    <?php if ($questions): ?>
        <form action="db/submit-exam.php" method="POST">
            <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
            <?php foreach ($questions as $q): ?>
                <div class="mb-3">
                    <p><strong><?php echo htmlspecialchars($q['question']); ?></strong></p>
                    <input type="text" name="answers[<?php echo $q['id']; ?>]" class="form-control" required>
                </div>
            <?php endforeach; ?>
            <button type="submit" name="submitExam" class="btn btn-primary">Submit Exam</button>
        </form>
    <?php else: ?>
        <p>No exam found for this course.</p>
    <?php endif; ?>
</div>

<?php include('./includes/footer.php');
