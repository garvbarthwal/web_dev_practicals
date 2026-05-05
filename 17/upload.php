<?php
$message = "";
if (isset($_FILES["file"])){
    $status = $_FILES["file"]["error"];
    $statusMessages = [
        0 => "No error (Perfect upload)",
        1 => "File too large (Server limit)",
        2 => "File too large (Form limit)",
        3 => "File partially uploaded",
        4 => "No file uploaded",
        6 => "Missing temp folder",
        7 => "Failed to write file"
    ];
    if($status != 0){
        $message = "Error: " . ($statusMessages[$status] ?? "Unknown error");
    } else {
        $folder = "uploads/";
        if(!is_dir($folder)){
            mkdir($folder, 0777, true);
        }
        $fileName = $_FILES["file"]["name"];
        $fileTmpName = $_FILES["file"]["tmp_name"];
        $size = $_FILES["file"]["size"];
        $type = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedTypes = ["jpg", "jpeg", "png", "pdf"];
        if(!in_array($type, $allowedTypes)){
            $message = "Error: Invalid file type.";
        }
        elseif($size > 2 * 1024 * 1024){
            $message = "Error: File too large (Max 2MB).";
        }
        else{
            $newFileName = uniqid("file_",true) . "." . $type;
            $destination = $folder . $newFileName;
            if(move_uploaded_file($fileTmpName, $destination)){
                $message = "File uploaded successfully as $newFileName.";
            } else {
                $message = "Error: Failed to move uploaded file.";
            }
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
    <?php if(!empty($message)): ?>
        <div class="message <?php echo strpos($message, 'successfully') !== false ? 'success' : 'error'; ?>">
            <?php echo htmlspecialchars($message); ?>
        </div>
    <?php endif; ?>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="file" required>
        <button type="submit">Upload</button>
    </form>
</div>
</body>
</html>