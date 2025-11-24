<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container text-center mt-5">
    <div class="card shadow p-4">
        <h2 class="mb-3">📚 Student Management System</h2>

        <form method="GET" class="d-flex justify-content-center gap-2">
            <select name="action" class="form-select w-50" required>
                <option value="">Select an Action</option>
                <option value="create.php">➕ Create Student</option>
                <option value="read.php">📄 View Students</option>
                <option value="update.php">✏️ Update Student</option>
                <option value="delete.php">🗑️ Delete Student</option>
            </select>

            <button type="submit" class="btn btn-primary">Go</button>
        </form>
    </div>
</div>

<?php
if (isset($_GET['action'])) {
    header("Location: " . $_GET['action']);
    exit();
}
?>

</body>
</html>
