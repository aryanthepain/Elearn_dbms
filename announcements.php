<?php
include('./includes/header.php');
require_once('./db/dbconnection.php');

$stmt = $pdo->query("SELECT a.*, u.name as instructor_name FROM announcements a LEFT JOIN users u ON a.instructor_id = u.id ORDER BY created_at DESC");
$announcements = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-5">
    <h2>Announcements</h2>
    <?php foreach ($announcements as $ann): ?>
        <div class="mb-4">
            <h4><?php echo htmlspecialchars($ann['title']); ?></h4>
            <p><?php echo htmlspecialchars($ann['message']); ?></p>
            <p><small>By <?php echo htmlspecialchars($ann['instructor_name']); ?> on <?php echo $ann['created_at']; ?></small></p>
        </div>
    <?php endforeach; ?>
</div>

<?php include('./includes/footer.php');
