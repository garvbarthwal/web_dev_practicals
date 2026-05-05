<?php
include "db.php";
$message="";
if(isset($_POST['update'])){
    $subject = $_POST['subject'];
    $marks = $_POST['marks'];
    mysqli_query($conn,"UPDATE students SET $subject='$marks' WHERE rollno='$_POST[roll]'");
    $message="Record updated!";
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title>Update Records</title>
</head>
<body>
<div class="container">
<h2>Update Marks</h2>
<form method="post">
<input name="roll" placeholder="Roll No" required>
<select name="subject" required>
    <option value="">Select Subject</option>
    <option value="s1">Subject 1</option>
    <option value="s2">Subject 2</option>
    <option value="s3">Subject 3</option>
    <option value="s4">Subject 4</option>
</select>
<input name="marks" placeholder="New Marks" required>
<button name="update">Update</button>
</form>
<?php if($message){ echo "<div class='message success'>$message</div>"; } ?>
<a href="home.php" class="button-link">Back</a>
</div>
</body>
</html>