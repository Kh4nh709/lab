<?php
session_start();
$root_path = '/var/www/html/image/';
$success_message = '';
$error_message = '';
$subfolder = '';

// Xử lý upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $file = $_FILES['image'];
    $fileName  = $file['name'];
    $action = $_POST['action'] ?? '';   
    $subfolder = '';

    if ($action === 'animal') {
        $subfolder = 'animal/';
    } elseif ($action === 'category') {
        $subfolder = 'category/';
    } elseif ($action === 'plants') {
        $subfolder = 'plants/';
    }else{
        $subfolder = $action.'/';
    }

    if ($subfolder === '') {
        $error_message = "Invalid action selected.";
    } else {
        $pathFile = $root_path . $subfolder . $fileName;

        if (file_exists($pathFile)) {
            $error_message = "File already exists.";
        } else {
            $imgWhiteList = array(
                "image/jpeg",
                "image/jpeg",
                "image/gif",
                "image/bmp",
                "image/png",
                "image/webp"
            );
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime  = finfo_file($finfo, $file['tmp_name']);
            finfo_close($finfo);
            if (!in_array($mime, $imgWhiteList)) {
                $error_message = "MIME type mismatch. Expected {$imgWhiteList[$ext]}, got $mime";
            } else {
                if (move_uploaded_file($file['tmp_name'], $pathFile)) {
                    $success_message = "Upload success! File saved to $subfolder$fileName";   
                        header('Location: index.php?action=' . ($action ?? ''));
                        exit();
                } else {
                    $error_message = "Upload failed!";
                }
            }
        
        }
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Upload Image</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background: #f8f9fa; }
    .container { max-width: 600px; margin-top: 50px; }
  </style>
</head>
<body>
<div class="container">
  <h2 class="text-center mb-4">📤 Upload Image</h2>

  <?php if ($success_message): ?>
    <div class="alert alert-success"><?= htmlspecialchars($success_message) ?></div>
  <?php endif; ?>

  <?php if ($error_message): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($error_message) ?></div>
  <?php endif; ?>

  <form method="post" enctype="multipart/form-data" class="card p-4 shadow-sm">
    <div class="mb-3">
      <label for="action" class="form-label">Choose Folder</label>
      <select class="form-select" id="action" name="action" required>
        <option value="">-- Select Folder --</option>
        <option value="animal" <?= ($action ?? '')==='animal'?'selected':'' ?>>Animal</option>
        <option value="category" <?= ($action ?? '')==='category'?'selected':'' ?>>Category</option>
        <option value="plants" <?= ($action ?? '')==='plants'?'selected':'' ?>>Plants</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="image" class="form-label">Select Image</label>
      <input class="form-control" type="file" name="image" id="image" accept=".jpg,.jpeg,.png,.gif,.bmp,.webp" required>
    </div>

    <button type="submit" class="btn btn-primary w-100">Upload</button>
  </form>
</div>
</body>
</html>
