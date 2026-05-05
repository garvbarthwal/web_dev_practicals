<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['course'] = $_POST['course'];
    $_SESSION['semester'] = $_POST['semester'];
    $_SESSION['branch'] = $_POST['branch'];
    echo "<h3>Registration Successful!</h3>";
    echo "<a href='login.php'>Go to Login</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<h2>Register</h2>
    <form method="post">
        <input type="text" name="name" placeholder="Name" required>
        <input type="text" name="course" placeholder="Course" required>
        <input type="number" name="semester" placeholder="Semester" required>
        <input type="text" name="branch" placeholder="Branch" required>
        <button type="submit">Register</button>
    </form>
<a href="login.php">Go to Login</a>
</div>
</body>
</html>