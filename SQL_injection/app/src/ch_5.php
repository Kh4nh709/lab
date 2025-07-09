<?php
include 'db.php';

function gener_id() {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $id = '';
    for ($i = 0; $i < 14; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $id .= $characters[$index];
    }
    return $id;
}

// Kiểm tra xem cookie đã tồn tại chưa
if (!isset($_COOKIE['id'])) {
    // Nếu chưa có, tạo mới
    $id = gener_id();
    set_id($id);
    setcookie('id', $id, time() + 600, '/'); // hết hạn sau 600 giây = 10 phút
} else {
    // Cookie đã có, sử dụng lại
    $id = $_COOKIE['id'];
}

if (isset($_COOKIE['id'])){
    $trackingID = get_trackingID();
    if ($trackingID !== $_COOKIE['id']){
        header ("Location: error_page.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>CLB Bảo Mật - FPT Cần Thơ</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      background-image: url('image_Back.png'); /* tên file bạn đã tải lên */
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      height: 100vh;
      color: #fff;
    }

    .overlay {
      background-color: rgba(0, 0, 0, 0.5); /* lớp phủ mờ lên background */
      height: 100%;
      width: 100%;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 20px;
    }

    h1 {
      font-size: 3em;
      font-weight: bold;
      text-shadow: 2px 2px 4px rgba(0,0,0,0.8);
    }

    p {
      font-size: 1.5em;
      max-width: 800px;
      margin-top: 20px;
      text-shadow: 1px 1px 3px rgba(0,0,0,0.6);
    }

    .btn {
      margin-top: 30px;
      padding: 12px 24px;
      background: #f0b90b;
      border: none;
      border-radius: 8px;
      color: #000;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .btn:hover {
      background: #d99e00;
    }
  </style>
</head>
<body>
  <div class="overlay">
    <h1>CLB BẢO MẬT FPT CẦN THƠ</h1>
    <p>Chào mừng bạn đến với ngôi nhà của những người yêu thích an toàn thông tin, khai phá lỗ hổng và bảo vệ hệ thống!</p>
    <button class="btn">Khám phá ngay</button>
  </div>
</body>
</html>


