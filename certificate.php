<?php include('./includes/header.php'); ?>

<div class="container mt-5 text-center">
    <h2>Course Completion Certificate</h2>
    <p>If you have completed the course requirements, your certificate will be generated below.</p>
    <!-- In a real app, logic would verify the student's progress -->
    <div class="alert alert-success">Congratulations! You have completed the course.</div>
    <div class="border p-4">
        <h3>Certificate of Completion</h3>
        <p>This certifies that <strong>[Student Name]</strong> has completed the course.</p>
        <p>Date: <?php echo date('Y-m-d'); ?></p>
    </div>
</div>

<?php include('./includes/footer.php');
