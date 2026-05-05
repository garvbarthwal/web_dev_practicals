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
<style>
body{ font-family: Arial, sans-serif; background: #284e54; margin: 0; height: 100vh; display: flex; justify-content: center; align-items: center; }
.card{ background: white; padding: 30px; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.2); width: 320px; text-align: center; }
h2{ margin-bottom: 20px; }
input[type="file"]{ width: 100%; padding: 8px; margin-bottom: 15px; }
button{ width: 100%; padding: 10px; background: #2980b9; color: white; border: none; border-radius: 6px; cursor: pointer; font-size: 16px; transition: 0.3s; }
button:hover{ background: #1f6692; }
.message{ margin-bottom: 15px; padding: 10px; border-radius: 6px; font-size: 14px; }
.success{ background: #d4edda; color: #155724; }
.error{ background: #f8d7da; color: #721c24; }
</style>
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