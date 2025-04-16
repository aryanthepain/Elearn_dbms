<?php include('./includes/header.php'); ?>

<div class="container mt-5">
    <h2 class="text-center">Login</h2>
    <div class="row justify-content-center">
        <div class="col-md-6">

            <!-- Student Login Form -->
            <h4>Student Login</h4>
            <form action="db/student-login.php" method="POST">
                <div class="mb-3">
                    <label for="studentEmail" class="form-label">Email</label>
                    <input type="email" id="studentEmail" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="studentPassword" class="form-label">Password</label>
                    <input type="password" id="studentPassword" name="password" class="form-control" required>
                </div>
                <button type="submit" name="studentLogin" class="btn btn-primary">Login as Student</button>
            </form>
            <!-- Student Login Form end -->

            <hr>

            <!-- Instructor Login Form -->
            <h4>Instructor Login</h4>
            <form action="db/instructor-login.php" method="POST">
                <div class="mb-3">
                    <label for="instructorEmail" class="form-label">Email</label>
                    <input type="email" id="instructorEmail" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="instructorPassword" class="form-label">Password</label>
                    <input type="password" id="instructorPassword" name="password" class="form-control" required>
                </div>
                <button type="submit" name="instructorLogin" class="btn btn-primary">Login as Instructor</button>
            </form>
            <!-- Instructor Login Form end -->
        </div>
    </div>
</div>

<?php include('./includes/footer.php');
