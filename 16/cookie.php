<?php 
session_start(); 
if (!isset($_SESSION['visit'])) {
    $_SESSION['visit'] = 1;
} else {
    if (!isset($_POST['name'])) {  
        $_SESSION['visit']++;
    }
} 
if (isset($_POST['name']) && !empty($_POST['name']))  
{ 
    $name = $_POST['name']; 
    setcookie("username", $name, time() + 3600, "/"); 
    header("Location: " . $_SERVER['PHP_SELF']); 
    exit(); 
} 
?> 
<!DOCTYPE html> 
<html> 
<head> 
    <title>Session & Cookie Demo</title>
    <link rel="stylesheet" href="style.css"/>
</head> 
<body> 
<div class="container"> 
    <h2>Session & Cookie Demo</h2> 
    <div class="visit"> 
        <?php echo "You have visited this page " . $_SESSION['visit'] . " times."; ?> 
    </div> 
    <form method="post"> 
        <input type="text" name="name" placeholder="Enter your name"> 
        <br> 
        <input type="submit" value="Submit"> 
    </form> 
    <a href="logout.php">Logout</a> 
    <?php if (isset($_COOKIE['username'])) { ?> 
        <div class="cookie"> 
            <?php 
            echo "Welcome " . htmlspecialchars($_COOKIE['username']) . "!<br>"; 
            echo "Cookie Value: " . htmlspecialchars($_COOKIE['username']); 
            ?> 
        </div> 
    <?php } ?> 
</div> 
</body> 
</html>