<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];

    echo "<h2>Results</h2>";
    echo "Welcome to PHP <br>";
    if ($a % 2 == 0) {
        echo "A is Even <br>";
    } else {
        echo "A is Odd <br>";
    }

    $max = max($a, $b, $c);
    echo "Max: $max <br>";

    $avg = ($a + $b + $c) / 3;
    echo "Average: $avg <br>";

    $min = min($a, $b, $c);
    echo "Smallest: $min <br>";

    echo "Addition: " . ($a + $b + $c) . "<br>";
    echo "Subtraction: " . ($a - $b - $c) . "<br>";
    echo "Multiplication: " . ($a * $b * $c) . "<br>";

    if ($b != 0) {
        echo "Division: " . ($a / $b);
    } else {
        echo "Cannot divide by zero";
    }

    echo "<br><br><a href='index.html'>Go Back</a>";
}
?>