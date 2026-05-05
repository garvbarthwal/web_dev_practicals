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
    <style> 
        body {
    font-family: 'Segoe UI', sans-serif;
    background: linear-gradient(135deg, #e3f2fd, #f3e5f5);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}
.container {
    background: #fff;
    padding: 30px;
    border-radius: 14px;
    width: 360px;
    text-align: center;
    box-shadow: 0 12px 30px rgba(0,0,0,0.15);
}
h2 { margin-bottom: 15px; color: #333; }
.visit { font-size: 18px; font-weight: 600; color: #5a67d8; margin: 15px 0; }
input[type="text"] { width: 90%; padding: 10px; margin: 10px 0; border-radius: 8px; border: 1px solid #ccc; }
input[type="submit"] { background: #5a67d8; color: white; border: none; padding: 10px 20px; border-radius: 8px; cursor: pointer; }
input[type="submit"]:hover { background: #434190; }
.cookie { margin-top: 15px; color: #2e7d32; font-weight: 500; }
a { display: inline-block; margin-top: 15px; color: #5a67d8; text-decoration: none; }
a:hover { text-decoration: underline; }
    </style> 
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