<?php include "db.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow p-4">
        <h3 class="mb-3">📄 Student Records</h3>

        <table class="table table-striped table-bordered">
            <tr class="table-dark">
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Course</th>
            </tr>

            <?php
            $result = mysqli_query($conn, "SELECT * FROM students");
            while ($row = mysqli_fetch_assoc($result)) {
                echo "
                <tr>
                    <td>$row[id]</td>
                    <td>$row[name]</td>
                    <td>$row[email]</td>
                    <td>$row[course]</td>
                </tr>";
            }
            ?>
        </table>

        <a href="index.php" class="btn btn-secondary">⬅ Back</a>
    </div>
</div>

</body>
</html>
