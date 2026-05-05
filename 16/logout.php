<?php 
session_start(); 
session_unset(); 
session_destroy(); 
if(isset($_COOKIE['username'])) { 
    setcookie("username", "", time() - 3600, "/"); 
} 
if(isset($_COOKIE['visit_count'])) { 
    setcookie("visit_count", "", time() - 3600); 
} 
header("Location: cookie.php"); 
exit(); 
?>