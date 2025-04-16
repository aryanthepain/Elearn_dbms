<?php include('./includes/header.php'); ?>

<div class="container mt-5">
    <h2 class="text-center">Add or Edit Course Content</h2>
    <form action="db/add-course.php" method="POST">
        <div class="mb-3">
            <label for="courseTitle" class="form-label">Course Title</label>
            <input type="text" class="form-control" id="courseTitle" name="title" required>
        </div>
        <div class="mb-3">
            <label for="courseDescription" class="form-label">Course Description</label>
            <textarea class="form-control" id="courseDescription" name="description" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="contentType" class="form-label">Content Type</label>
            <select class="form-select" id="contentType" name="content_type" required>
                <option value="video">Video</option>
                <option value="file">File</option>
                <option value="exam">Exam</option>
                <option value="text">Text</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="contentLink" class="form-label">Content Link or Text</label>
            <input type="text" class="form-control" id="contentLink" name="content_link">
        </div>
        <button type="submit" name="addCourse" class="btn btn-success">Submit</button>
    </form>
</div>

<?php include('./includes/footer.php');
