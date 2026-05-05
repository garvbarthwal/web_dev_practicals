<?php
//isset()
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user'], $_POST['password'], $_POST['age'], $_POST['branch'], $_POST['marks'])){

    $user = $_POST['user'];
    $password = $_POST['password'];
    $age = $_POST['age'];
    $branch = $_POST['branch'];
    $marks = $_POST['marks'];

    //gettype()
    $user_type_before = gettype($user);
    $password_type_before = gettype($password);
    $age_type_before = gettype($age);
    $branch_type_before = gettype($branch);
    $marks_type_before = gettype($marks);

    //settype()
    settype($age, "integer");
    settype($marks, "integer");

    $age_type_after = gettype($age);
    $marks_type_after = gettype($marks);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Conversion Result</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">

    <h2>Before Conversion:</h2>
    <div class="result-box">
        <p>Username: <span><?php echo "$user (Type: $user_type_before)"; ?></span></p>
        <p>Password: <span><?php echo "$password (Type: $password_type_before)"; ?></span></p>
        <p>Age: <span><?php echo "$_POST[age] (Type: $age_type_before)"; ?></span></p>
        <p>Branch: <span><?php echo "$branch (Type: $branch_type_before)"; ?></span></p>
        <p>Marks: <span><?php echo "$marks (Type: $marks_type_before)"; ?></span></p>
    </div>

    <h2>After Conversion:</h2>
    <div class="result-box">
        <p>Age: <span><?php echo "$age (Type: $age_type_after)"; ?></span></p>
        <p>Marks: <span><?php echo "$marks (Type: $marks_type_after)"; ?></span></p>
    </div>

    <h2>User Details:</h2>
    <div class="result-box">
        <p>Username: <span><?php echo $user; ?></span></p>
        <p>Password: <span><?php echo $password; ?></span></p>
        <p>Age: <span><?php echo $age; ?></span></p>
        <p>Branch: <span><?php echo $branch; ?></span></p>
        <p>Marks: <span><?php echo $marks; ?></span></p>
    </div>

    <?php
    //unset()
    unset($user, $password, $age, $branch, $marks);
    ?>
    <div class="unset-msg">✔ Variables have been unset</div>

    <button onclick="window.location.href='index.html'">Go Back</button>

</div>
</body>
</html>