<?php
$filename = __DIR__ . "/attendance.txt";  // ✅ absolute path
$message = "";

if (isset($_POST['submit'])) {
    $roll   = trim($_POST['roll']);
    $name   = trim($_POST['name']);
    $status = trim($_POST['status']);

    if ($roll != "" && $name != "") {
        $data = "$roll - $name - $status\n";
        if (file_put_contents($filename, $data, FILE_APPEND) !== false) {
            $message = "Record added successfully!";
        } else {
            $message = "Error: Could not write to file. Check permissions.";
        }
    }
}

$total   = 0;
$present = 0;
$absent  = 0;
$lines   = file_exists($filename) ? file($filename) : [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Attendance</title>
<style>
body { font-family: Arial, sans-serif; background: #eef2f7; display: flex; justify-content: center; padding: 40px; }
.container { width: 650px; }
.card { background: white; padding: 20px; border-radius: 12px; box-shadow: 0 5px 18px rgba(0,0,0,0.08); margin-bottom: 20px; }
h2 { margin-bottom: 15px; color: #333; }
label { font-weight: 600; }
input, select { width: 100%; padding: 10px; margin: 6px 0 15px; border-radius: 8px; border: 1px solid #ccc; font-size: 14px; }
button { background: #4CAF50; color: white; padding: 10px; border: none; border-radius: 8px; cursor: pointer; width: 100%; font-size: 15px; }
button:hover { background: #43a047; }
.success { background: #e8f5e9; color: #2e7d32; padding: 10px; border-radius: 8px; margin-bottom: 12px; }
table { width: 100%; border-collapse: collapse; margin-top: 10px; }
th, td { padding: 10px; text-align: center; }
th { background: #4CAF50; color: white; }
tr:nth-child(even) { background: #f9f9f9; }
tr:hover { background: #f1f1f1; }
.stats { margin-top: 15px; padding: 10px; background: #f4f6f8; border-radius: 8px; font-weight: 600; }
</style>
</head>
<body>
<div class="container">
    <div class="card">
        <h2>Add Attendance</h2>
        <?php if($message != "") echo "<div class='success'>$message</div>"; ?>
        <form method="POST">
            <label>Roll No.</label>
            <input type="text" name="roll" required>
            <label>Name</label>
            <input type="text" name="name" required>
            <label>Status</label>
            <select name="status">
                <option value="present">Present</option>
                <option value="absent">Absent</option>
            </select>
            <button type="submit" name="submit">Add Record</button>
        </form>
    </div>
    <div class="card">
        <h2>Attendance Records</h2>
        <table>
            <tr><th>Roll No.</th><th>Name</th><th>Status</th></tr>
            <?php
            foreach($lines as $line){
                $line = trim($line);
                if($line == "") continue;
                $parts = explode(" - ", $line);
                if(count($parts) != 3) continue;
                $roll = htmlspecialchars($parts[0]);
                $name = htmlspecialchars($parts[1]);
                $status = strtolower(trim($parts[2]));
                echo "<tr><td>$roll</td><td>$name</td><td>" . ucfirst($status) . "</td></tr>";
                $total++;
                if($status == "present") $present++;
                else $absent++;
            }
            ?>
        </table>
        <div class="stats">
            Total Students: <?php echo $total; ?><br>
            Present: <?php echo $present; ?><br>
            Absent: <?php echo $absent; ?>
        </div>
    </div>
</div>
</body>
</html>