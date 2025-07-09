<?php
    include 'db.php';
    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $result = get_username_ch_2($username);
        if($result){
            $flag = get_flag_by_id(2);
        }else{
            $mess_error = 'login failer';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Challenge 2</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .login-container { background: #fff; padding: 32px 24px; border-radius: 8px; box-shadow: 0 2px 12px rgba(0,0,0,0.08); min-width: 320px; }
        h2 { text-align: center; margin-bottom: 24px; }
        label { display: block; margin-bottom: 12px; }
        input[type="text"], input[type="password"] { width: 100%; padding: 8px; margin-top: 4px; margin-bottom: 16px; border: 1px solid #ccc; border-radius: 4px; }
        button { width: 100%; padding: 10px; background: #007bff; color: #fff; border: none; border-radius: 4px; font-size: 1em; cursor: pointer; }
        button:hover { background: #0056b3; }
        .message { text-align: center; margin-bottom: 16px; color: #d8000c; }
        .flag { text-align: center; margin-bottom: 16px; color: #388e3c; font-weight: bold; }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login Challenge 2</h2>
        <?php if(isset($mess_error)): ?>
            <div class="message"><?php echo htmlspecialchars($mess_error); ?></div>
        <?php endif; ?>
        <?php if(isset($flag)): ?>
            <div class="Flag">Flag: <?php echo htmlspecialchars($flag['flag']); ?></div>
        <?php endif; ?>
        <form method="POST" action="">
            <label>Username:
                <input type="text" name="username" required>
            </label>
            <label>Password:
                <input type="password" name="password" required>
            </label>
            <button type="submit">Login</button>
        </form>
        <div style="display: flex; justify-content: space-between; margin-top: 24px;">
            <a href="ch_1.php" style="display:inline-block; padding:10px 16px; background:#007bff; color:#fff; border-radius:4px; text-decoration:none; font-size:1em; text-align:center;">Previous Challenge</a>
            <a href="ch_3.php" style="display:inline-block; padding:10px 16px; background:#007bff; color:#fff; border-radius:4px; text-decoration:none; font-size:1em; text-align:center;">Next Challenge</a>
        </div>
    </div>
</body>
</html>

