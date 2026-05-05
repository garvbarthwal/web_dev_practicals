<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Student Details</h2>
    <p><b>Name:</b> <?php echo $_SESSION['name']; ?></p>
    <p><b>Course:</b> <?php echo $_SESSION['course']; ?></p>
    <p><b>Semester:</b> <?php echo $_SESSION['semester']; ?></p>
    <p><b>Branch:</b> <?php echo $_SESSION['branch']; ?></p>
    <a href="logout.php">Logout</a>
</div>
</body>
</html>