<?php
if (isset($_GET['challenge'])) {
    $challenge = intval($_GET['challenge']);
    if ($challenge >= 1 && $challenge <= 10) {
        $location = 'ch_' . $challenge . '.php';
        header("Location: " . $location);
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chọn Challenge SQLi</title>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            min-height: 100vh;
            min-width: 100vw;
            height: 100vh;
            width: 100vw;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .container {
            width: 100vw;
            height: 100vh;
            background: transparent;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            box-shadow: none;
            padding: 0;
            margin: 0;
        }
        h2 {
            text-align: center;
            margin-bottom: 32px;
            font-size: 2.2em;
        }
        .icon-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            gap: 40px 60px;
            width: 100vw;
            max-width: 100vw;
        }
        .challenge-icon {
            width: 90px;
            height: 90px;
            background: #007bff;
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.2em;
            cursor: pointer;
            transition: background 0.2s, transform 0.2s;
            border: none;
            outline: none;
            box-shadow: 0 2px 10px rgba(0,0,0,0.10);
        }
        .challenge-icon:hover {
            background: #0056b3;
            transform: scale(1.12);
        }
        .icon-label {
            margin-top: 12px;
            text-align: center;
            font-size: 1.1em;
            color: #333;
        }
        .icon-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Chọn Challenge SQLi</h2>
        <div class="icon-grid">
            <?php for ($i = 1; $i <= 10; $i++): ?>
                <div class="icon-wrapper">
                    <form method="get" action="" style="margin:0;">
                        <input type="hidden" name="challenge" value="<?php echo $i; ?>">
                        <button type="submit" class="challenge-icon"><?php echo $i; ?></button>
                    </form>
                    <div class="icon-label">Challenge <?php echo $i; ?></div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</body>
</html>
