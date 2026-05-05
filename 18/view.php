<?php
include "db.php";
if (!$conn) die("Connection failed: " . mysqli_connect_error());
if (!$dbname) die("No database selected. <a href='home.php'>Go back</a>");

$result = mysqli_query($conn, "SELECT * FROM students");
if (!$result) die("Query failed: " . mysqli_error($conn));
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>View Records</title>
</head>
<body>
<div class="container">
<div class="table-wrapper">
<h2>View Records</h2>

<?php if(mysqli_num_rows($result) == 0){ ?>
    <p>No records found.</p>
<?php } else { ?>
<table>
<tr>
    <th>ID</th><th>Roll No</th><th>Name</th>
    <th>Sub1</th><th>Sub2</th><th>Sub3</th><th>Sub4</th>
</tr>
<?php while($row = mysqli_fetch_assoc($result)){ ?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['rollno']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['s1']; ?></td>
    <td><?php echo $row['s2']; ?></td>
    <td><?php echo $row['s3']; ?></td>
    <td><?php echo $row['s4']; ?></td>
</tr>
<?php } ?>
</table>
<?php } ?>

<a href="home.php" class="button-link">Back</a>
</div>
</div>
</body>
</html>