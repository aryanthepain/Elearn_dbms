<?php include('./includes/header.php'); ?>

<div class="container mt-5">
    <h2>Suggest a New Course</h2>
    <form action="db/submit-suggestion.php" method="POST">
        <div class="mb-3">
            <textarea name="suggestion" class="form-control" placeholder="Enter your course suggestion here..." required></textarea>
        </div>
        <button type="submit" name="submitSuggestion" class="btn btn-success">Submit Suggestion</button>
    </form>
</div>

<?php include('./includes/footer.php');
