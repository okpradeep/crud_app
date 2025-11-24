<?php include "db.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card p-4 shadow">

        <h3>✏️ Update Student</h3>
        <form method="POST" class="mb-3">
            <label class="form-label">Enter Student ID:</label>
            <input type="number" name="search_id" class="form-control w-50" required>
            <button type="submit" name="search" class="btn btn-warning mt-3">Search</button>
        </form>

        <?php
        if (isset($_POST['search'])) {
            $id = $_POST['search_id'];
            $result = mysqli_query($conn, "SELECT * FROM students WHERE id=$id");

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
        ?>

        <form method="POST">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">

            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control mb-3" value="<?= $row['name'] ?>">

            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control mb-3" value="<?= $row['email'] ?>">

<label class="form-label">Course</label>
<select name="course" class="form-select mb-3">
    <option value="Computer Science" <?= ($row['course']=="Computer Science")?"selected":""; ?>>Computer Science</option>
    <option value="Information Technology" <?= ($row['course']=="Information Technology")?"selected":""; ?>>Information Technology</option>
    <option value="Artificial Intelligence" <?= ($row['course']=="Artificial Intelligence")?"selected":""; ?>>Artificial Intelligence</option>
    <option value="Cyber Security" <?= ($row['course']=="Cyber Security")?"selected":""; ?>>Cyber Security</option>
    <option value="Data Science" <?= ($row['course']=="Data Science")?"selected":""; ?>>Data Science</option>
</select>


            <button type="submit" name="update" class="btn btn-success">Update Student</button>
        </form>

        <?php
            } else echo "<div class='alert alert-danger'>❌ No student found!</div>";
        }

        if (isset($_POST['update'])) {
            mysqli_query($conn, "UPDATE students SET name='$_POST[name]', email='$_POST[email]', course='$_POST[course]' WHERE id=$_POST[id]");
            echo "<div class='alert alert-success mt-3'>✔ Student Updated Successfully!</div>";
        }
        ?>

        <br><a href="index.php" class="btn btn-secondary">⬅ Back</a>

    </div>
</div>

</body>
</html>
