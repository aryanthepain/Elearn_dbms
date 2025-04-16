<?php include('./includes/header.php'); ?>

<div class="container mt-5">
    <h2 class="text-center">Admin Login</h2>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="db/admin-login.php" method="POST">
                <div class="mb-3">
                    <label for="adminEmail" class="form-label">Email</label>
                    <input type="email" id="adminEmail" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="adminPassword" class="form-label">Password</label>
                    <input type="password" id="adminPassword" name="password" class="form-control" required>
                </div>
                <button type="submit" name="adminLogin" class="btn btn-primary">Login as Admin</button>
            </form>
        </div>
    </div>
</div>

<?php include('./includes/footer.php');
