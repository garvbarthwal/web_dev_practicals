<?php
session_start();
$host = "localhost";
$user = "root";
$pass = "";
$dbname = $_SESSION['dbname'] ?? "";
$conn = mysqli_connect($host, $user, $pass, $dbname);
?>