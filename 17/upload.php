<?php
$message = "";
$statusMessages = [
    1 => "File too large (Server limit)",
    2 => "File too large (Form limit)",
    3 => "File partially uploaded",
    4 => "No file uploaded",
    6 => "Missing temp folder",
    7 => "Failed to write file"
];

if (isset($_FILES["file"])) {
    $file = $_FILES["file"];
    $status = $file["error"];

    if ($status != 0) {
        $message = "Error: " . ($statusMessages[$status] ?? "Unknown error");
    } else {
        $folder = "uploads/";
        is_dir($folder) || mkdir($folder, 0777, true);

        $type = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));

        if (!in_array($type, ["jpg", "jpeg", "png", "pdf"])) {
            $message = "Error: Invalid file type.";
        } elseif ($file["size"] > 2 * 1024 * 1024) {
            $message = "Error: File too large (Max 2MB).";
        } else {
            $dest = $folder . uniqid("file_", true) . "." . $type;
            $message = move_uploaded_file($file["tmp_name"], $dest)
                ? "File uploaded successfully as " . basename($dest) . "."
                : "Error: Failed to move uploaded file.";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>File Upload</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<div class="card">
    <h2>Upload a File</h2>
    <?php if ($message): ?>
        <div class="message <?= strpos($message, 'successfully') !== false ? 'success' : 'error' ?>">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="file" required>
        <button type="submit">Upload</button>
    </form>
</div>
</body>
</html>