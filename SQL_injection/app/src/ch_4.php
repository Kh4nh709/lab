<?php
include 'db.php';
if (isset($_POST['id'])){
    $id = $_POST['id'];
    $filter = preg_replace(['/or/i', '/and/i', '/union/i', '/select/i', '/from/i', '/where/i', '/substring/i', '/ascii/i'],'',$id);
    var_dump($filter);
    $result = get_blogs_by_id($filter);
}
?>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Demo SQL Injection</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4 text-center text-danger">Flag in database</h2>

    <form method="POST" action="ch_4.php" class="card p-4 shadow-sm">
        <div class="mb-3">
            <label for="id" class="form-label">Nhập ID Blog:</label>
            <input type="text" id="id" name="id" class="form-control" required placeholder="VD: 1 ">
        </div>
        <button type="submit" class="btn btn-danger">Tấn công!</button>
    </form>

    <?php if ($result && $result->num_rows > 0): ?>
        <div class="mt-4">
            <h4 class="text-success">✅ Kết quả truy vấn:</h4>
            <table class="table table-bordered table-striped mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th><th>Title</th><th>Author</th><th>URL</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['id']) ?></td>
                        <td><?= htmlspecialchars($row['title']) ?></td> 
                        <td><?= htmlspecialchars($row['author']) ?></td>
                        <td><a href="<?= htmlspecialchars($row['url']) ?>" target="_blank"><?= htmlspecialchars($row['url']) ?></a></td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    <?php elseif ($result !== null): ?>
        <div class="alert alert-warning mt-4">Không tìm thấy blog nào với ID này.</div>
    <?php endif; ?>
</div>

</body>
</html>