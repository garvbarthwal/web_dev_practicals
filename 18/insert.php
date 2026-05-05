<?php
include "db.php";

$message = "";
if(isset($_POST['insert'])){
    $roll = $_POST['roll'];
    $name = $_POST['name'];
    $s1 = $_POST['s1'];
    $s2 = $_POST['s2'];
    $s3 = $_POST['s3'];
    $s4 = $_POST['s4'];

    $result = mysqli_query($conn, "INSERT INTO students (rollno, name, s1, s2, s3, s4)
        VALUES ('$roll', '$name', '$s1', '$s2', '$s3', '$s4')");

    if($result){
        $message = "Record inserted!";
    } else {
        $message = "Insert failed: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Insert</title>
</head>
<body>
<div class="container">
<h2>Insert Record</h2>
<form method="post">
    <input name="roll" placeholder="Roll">
    <input name="name" placeholder="Name">
    <input name="s1" placeholder="S1">
    <input name="s2" placeholder="S2">
    <input name="s3" placeholder="S3">
    <input name="s4" placeholder="S4">
    <button name="insert">Insert</button>
</form>
<?php if($message){ ?>
    <div class="message success"><?php echo $message; ?></div>
<?php } ?>
<a href="home.php" class="button-link">Back</a>
</div>
</body>
</html>