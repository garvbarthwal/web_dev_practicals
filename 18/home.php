<?php
session_start();
$message = "";
if(isset($_POST['create'])){
    $dbname = $_POST['dbname'];
    $_SESSION['dbname'] = $dbname;
    $conn = mysqli_connect("localhost","root","");
    mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS $dbname");
    mysqli_select_db($conn, $dbname);
    mysqli_query($conn, "CREATE TABLE IF NOT EXISTS students(
        id INT AUTO_INCREMENT PRIMARY KEY,
        rollno VARCHAR(20),
        name VARCHAR(50),
        s1 INT, s2 INT, s3 INT, s4 INT
    )");
    $message = "Database & table created successfully!";
}
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css"></head>
<body>
<div class="container">
<h2>Create Database</h2>
<form method="post">
<input name="dbname" placeholder="Enter DB Name" required>
<button name="create">Create</button>
</form>
<?php if($message){ ?>
<div class="message success"><?php echo $message; ?></div>
<?php } ?>
<a href="insert.php" class="button-link">Insert</a>
<a href="view.php" class="button-link">View</a>
<a href="update.php" class="button-link">Update</a>
<a href="delete.php" class="button-link">Delete</a>
</div>
</body>
</html>