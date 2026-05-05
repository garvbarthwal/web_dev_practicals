<?php
include "db.php";
$message="";
if(isset($_POST['delete'])){
    mysqli_query($conn,"DELETE FROM students WHERE rollno='$_POST[roll]'");
    $message="Record deleted!";
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Delete</title>
</head>
<body>
<div class="container">
<h2>Delete Record</h2>
<form method="post">
<input name="roll" placeholder="Roll No">
<button name="delete">Delete</button>
</form>
<?php if($message){ echo "<div class='message success'>$message</div>"; } ?>
<a href="home.php" class="button-link">Back</a>
</div>
</body>
</html>