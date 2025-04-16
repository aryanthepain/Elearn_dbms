<?php include('./includes/header.php'); ?>

<div class="container mt-5">
    <h2>Learning Path Guidance</h2>
    <p>Answer a few questions to get course recommendations suited to your career goals.</p>
    <form action="db/submit-learning-path.php" method="POST">
        <div class="mb-3">
            <label for="interests" class="form-label">What are your interests?</label>
            <input type="text" id="interests" name="interests" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="goals" class="form-label">What is your career goal?</label>
            <input type="text" id="goals" name="goals" class="form-control" required>
        </div>
        <button type="submit" name="submitLearningPath" class="btn btn-primary">Get Recommendations</button>
    </form>
</div>
<?php include('./includes/footer.php');
