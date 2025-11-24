<?php include "db.php"; ?>

<!DOCTYPE html>
<html>
<body>

<h2>Delete Student</h2>

<form method="POST">
    Enter Student ID: <input type="number" name="id" required>
    <button type="submit" name="delete">Delete</button>
</form>

<?php
if (isset($_POST['delete'])) {
    mysqli_query($conn, "DELETE FROM students WHERE id=$_POST[id]");
    echo "<p style='color:red;'>Record Deleted!</p>";
}
?>

<br><a href="index.php">⬅ Back</a>

</body>
</html>
