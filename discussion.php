<?php
include('./includes/header.php');
require_once('./db/dbconnection.php');

$course_id = isset($_GET['course_id']) ? intval($_GET['course_id']) : 0;
if (!$course_id) {
    echo "<div class='container mt-5'><p>Invalid Course ID.</p></div>";
    include('./includes/footer.php');
    exit;
}

// Fetch forum posts for the course
$stmt = $pdo->prepare("SELECT fp.*, u.name FROM forum_posts fp LEFT JOIN users u ON fp.user_id = u.id WHERE course_id = ? ORDER BY created_at DESC");
$stmt->execute([$course_id]);
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-5">
    <h2>Discussion Forum</h2>
    <?php if ($posts): ?>
        <?php foreach ($posts as $post): ?>
            <div class="border p-3 mb-3">
                <p><?php echo htmlspecialchars($post['content']); ?></p>
                <small>By: <?php echo htmlspecialchars($post['name']); ?> on <?php echo $post['created_at']; ?></small>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No posts yet.</p>
    <?php endif; ?>
    <form action="db/submit-forum.php" method="POST">
        <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
        <div class="mb-3">
            <textarea name="content" class="form-control" placeholder="Write your post..." required></textarea>
        </div>
        <button type="submit" name="submitForum" class="btn btn-primary">Post</button>
    </form>
</div>

<?php include('./includes/footer.php');
