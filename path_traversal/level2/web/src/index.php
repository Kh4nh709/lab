<?php 
session_start();
$root_path = '/var/www/html/image/';

// Nếu có action + image => show ảnh trực tiếp (raw)
if (isset($_GET['action']) && isset($_GET['image'])) {
    $action = $_GET['action'];
    $image = $_GET['image'];
    $subfolder = '';

    if ($action === 'animal') $subfolder = 'animal/';
    if ($action === 'category') $subfolder = 'category/';
    if ($action === 'plants') $subfolder = 'plants/';
    

    if ($subfolder !== '') {
        $image = preg_replace('/\.\.\/|\/\.\./', '', $image);
        $path = $root_path . $subfolder . $image;
        if (file_exists($path)) {
            header("Content-Type: image/jpeg");
            echo file_get_contents($path);
            exit();
        }
    }
}

// Nếu chỉ có action => show danh sách file
$files = [];
$action = $_GET['action'] ?? '';
if (!empty($action)) {
    $subfolder = '';
    if ($action === 'animal') $subfolder = 'animal/';
    if ($action === 'category') $subfolder = 'category/';
    if ($action === 'plants') $subfolder = 'plants/';

    if ($subfolder !== '') {
        $dir = $root_path . $subfolder;
        if (is_dir($dir)) {
            $files = array_diff(scandir($dir), ['.', '..']);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Path Traversal</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f8f9fa; }
        .folder-links a { margin-right: 15px; font-weight: 600; }
        .image-card img { max-height: 150px; object-fit: cover; border-radius: 10px; }
        .image-card { transition: transform .2s; }
        .image-card:hover { transform: scale(1.05); }
    </style>
</head>
<body class="container py-4">
    <h1 class="mb-4 text-center">🔐 Path Traversal Lab</h1>

    <h3>Select Category</h3>
    <div class="folder-links mb-4">
        <a class="btn btn-outline-primary <?= $action==='animal'?'active':'' ?>" href="?action=animal">Animal</a>
        <a class="btn btn-outline-success <?= $action==='category'?'active':'' ?>" href="?action=category">Category</a>
        <a class="btn btn-outline-warning <?= $action==='plants'?'active':'' ?>" href="?action=plants">Plants</a>
        <!-- Link tới Upload -->
        <a class="btn btn-outline-dark" href="/upload.php">Upload</a>
    </div>

    <?php if (!empty($files)): ?>
        <h4>Files in <span class="text-capitalize"><?= htmlspecialchars($action) ?></span> folder:</h4>
        <div class="row mt-3">
            <?php foreach ($files as $f): ?>
                <div class="col-md-3 col-sm-4 col-6 mb-4">
                    <div class="card image-card shadow-sm">
                        <a href="?action=<?= urlencode($action) ?>&image=<?= urlencode($f) ?>" target="_blank">
                            <img src="?action=<?= urlencode($action) ?>&image=<?= urlencode($f) ?>" class="card-img-top" alt="<?= htmlspecialchars($f) ?>">
                        </a>
                        <div class="card-body text-center">
                            <small class="text-muted"><?= htmlspecialchars($f) ?></small>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php elseif(!empty($action)): ?>
        <div class="alert alert-warning">No files found in this folder.</div>
    <?php endif; ?>
</body>
</html>
