<?php
include('./includes/header.php');

require_once('./db/dbconnection.php');

$query = $pdo->query("SELECT c.*, u.name as instructor_name FROM courses c LEFT JOIN users u ON c.instructor_id = u.id");
$courses = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-5">
  <h2 class="text-center">Available Courses</h2>
  <div class="row">
    <?php foreach ($courses as $course): ?>
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <h5 class="card-title"><?php echo htmlspecialchars($course['title']); ?></h5>
            <p class="card-text"><?php echo htmlspecialchars(substr($course['description'], 0, 100)); ?>...</p>
            <p class="card-text"><small>Instructor: <?php echo htmlspecialchars($course['instructor_name']); ?></small></p>
            <a href="course-detail.php?course_id=<?php echo $course['id']; ?>" class="btn btn-primary">View Course</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?php include('./includes/footer.php');
