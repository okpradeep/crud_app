<?php
include 'db.php';

$studentData = null;
$deleteMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // If delete confirmation is clicked
    if (isset($_POST['confirm_delete'])) {
        $id = $_POST['student_id'];
        $deleteQuery = "DELETE FROM students WHERE id='$id'";

        if (mysqli_query($conn, $deleteQuery)) {
            $deleteMessage = "<p class='success'>✔ Record Deleted Successfully!</p>";
        } else {
            $deleteMessage = "<p class='error'>❌ Error deleting record.</p>";
        }
    } 
    // If ID search form submitted
    else if (isset($_POST['search'])) {
        $id = $_POST['student_id'];
        $result = mysqli_query($conn, "SELECT * FROM students WHERE id='$id'");
        $studentData = mysqli_fetch_assoc($result);
        
        if (!$studentData) {
            $deleteMessage = "<p class='error'>⚠ No record found for ID: $id</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Delete Student</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background: #eef2f3;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .container {
        background: white;
        width: 450px;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        text-align: center;
    }

    h2 {
        margin-bottom: 10px;
        color: #d9534f;
    }

    input {
        width: 90%;
        padding: 12px;
        margin: 10px 0;
        border-radius: 8px;
        border: 1px solid #ccc;
        outline: none;
    }

    button {
        width: 95%;
        padding: 12px;
        margin-top: 10px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 16px;
    }

    .search-btn {
        background-color: #0275d8;
        color: white;
    }

    .delete-btn {
        background-color: #d9534f;
        color: white;
        font-weight: bold;
    }

    .cancel-btn {
        background-color: #5bc0de;
        color: white;
        margin-top: 5px;
    }

    .info-box {
        background: #fff;
        padding: 15px;
        margin-top: 15px;
        border-radius: 10px;
        font-size: 16px;
        border-left: 5px solid #d9534f;
        text-align: left;
    }

    .success {
        color: green;
        font-weight: bold;
    }

    .error {
        color: red;
        font-weight: bold;
    }
</style>
</head>
<body>

<div class="container">

<h2>Delete Student Record</h2>

<?= $deleteMessage ?>

<!-- Search Form -->
<form method="POST">
    <input type="number" name="student_id" placeholder="Enter Student ID" required>
    <button type="submit" name="search" class="search-btn">Search</button>
</form>

<?php if ($studentData): ?>
<div class="info-box">
    <p><strong>ID:</strong> <?= $studentData['id'] ?></p>
    <p><strong>Name:</strong> <?= $studentData['name'] ?></p>
    <p><strong>Course:</strong> <?= $studentData['course'] ?></p>
</div>

<form method="POST">
    <input type="hidden" name="student_id" value="<?= $studentData['id'] ?>">
    <button type="submit" name="confirm_delete" class="delete-btn">Permanently Delete</button>
    <a href="delete.php"><button type="button" class="cancel-btn">Cancel</button></a>
</form>

<?php endif; ?>

</div>

</body>
</html>
