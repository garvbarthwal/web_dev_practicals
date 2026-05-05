<?php
$a = "";
$b = "";
$swapped = false;

if (isset($_POST['submit'])) {
    $a = $_POST['a'];
    $b = $_POST['b'];

    $a = $a + $b;
    $b = $a - $b;
    $a = $a - $b;

    $swapped = true;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Swap Without Third Variable</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Swap Without Third Variable</h2>
    <form method="post">
        <input type="number" name="a" placeholder="Enter first number" required>
        <input type="number" name="b" placeholder="Enter second number" required>
        <button type="submit" name="submit">Swap</button>
    </form>
    <?php if ($swapped) { ?>
        <div class="result">
            <p>After Swap:</p>
            <p>A = <span><?php echo $a; ?></span></p>
            <p>B = <span><?php echo $b; ?></span></p>
        </div>
    <?php } ?>
</div>
</body>
</html>