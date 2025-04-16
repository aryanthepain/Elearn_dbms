<?php include('./includes/header.php'); ?>

<div class="container mt-5">
    <h2 class="text-center">Sign Up</h2>
    <div class="row justify-content-center">
        <div class="col-md-6">

            <!-- Student Signup Form -->
            <h4>Student Signup</h4>
            <form action="db/student-signup.php" method="POST">
                <div class="mb-3">
                    <label for="studentName" class="form-label">Name</label>
                    <input type="text" id="studentName" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="studentEmail" class="form-label">Email</label>
                    <input type="email" id="studentEmail" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="studentPassword" class="form-label">Password</label>
                    <input type="password" id="studentPassword" name="password" class="form-control" required>
                </div>
                <button type="submit" name="studentSignup" class="btn btn-success">Signup as Student</button>
            </form>
            <!-- Student Signup Form end -->

            <hr>

            <!-- Instructor Signup Form -->
            <h4>Instructor Signup</h4>
            <form action="db/instructor-signup.php" method="POST">
                <div class="mb-3">
                    <label for="instructorName" class="form-label">Name</label>
                    <input type="text" id="instructorName" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="instructorEmail" class="form-label">Email</label>
                    <input type="email" id="instructorEmail" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="instructorPassword" class="form-label">Password</label>
                    <input type="password" id="instructorPassword" name="password" class="form-control" required>
                </div>
                <button type="submit" name="instructorSignup" class="btn btn-success">Signup as Instructor</button>
            </form>
            <!-- Instructor Signup Form end -->
        </div>
    </div>
</div>

<?php include('./includes/footer.php');
