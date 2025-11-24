<?php include "db.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card p-4 shadow">
        <h3 class="mb-3">➕ Add New Student</h3>

        <form method="POST">
            <label class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control mb-3" required>

            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control mb-3" required>

           <label class="form-label">Course</label>
<select name="course" class="form-select mb-3" required>
    <option value="">Select Course</option>
    <option value="Computer Science">Computer Science</option>
    <option value="Information Technology">Information Technology</option>
    <option value="Artificial Intelligence">Artificial Intelligence</option>
    <option value="Cyber Security">Cyber Security</option>
    <option value="Data Science">Data Science</option>
</select>


            <button type="submit" name="submit" class="btn btn-success">Save Student</button>
            <a href="index.php" class="btn btn-secondary">Back</a>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            mysqli_query($conn, "INSERT INTO students (name, email, course) VALUES ('$_POST[name]', '$_POST[email]', '$_POST[course]')");
            echo "<div class='alert alert-success mt-3'>✔ Student Added Successfully!</div>";
        }
        ?>
    </div>
</div>

</body>
</html>
