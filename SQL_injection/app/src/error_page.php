<?php
$error_message = isset($_GET['message']) ? $_GET['message'] : 'Đã xảy ra lỗi';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lỗi - SQLi Challenge</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .error-container {
            background: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.08);
            text-align: center;
            max-width: 400px;
        }
        .error-icon {
            font-size: 3em;
            color: #dc3545;
            margin-bottom: 20px;
        }
        .error-title {
            color: #dc3545;
            font-size: 1.5em;
            margin-bottom: 16px;
        }
        .error-message {
            color: #666;
            margin-bottom: 30px;
        }
        .btn {
            padding: 10px 20px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
        }
        .btn:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-icon">⚠️</div>
        <h1 class="error-title">Lỗi</h1>
        <p class="error-message"><?php echo htmlspecialchars($error_message); ?></p>
        <a href="index.php" class="btn">Về Trang Chủ</a>
    </div>
</body>
</html>
