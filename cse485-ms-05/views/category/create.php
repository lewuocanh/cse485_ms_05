<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Them danh muc</title>
</head>
<body>
    <h1>Them danh muc</h1>

    <?php if ($error !== ''): ?>
        <p><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>
    <?php endif; ?>

    <form method="post">
        <p>
            <label>Ten danh muc</label><br>
            <input
                type="text"
                name="name"
                value="<?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>"
                required
            >
        </p>

        <p>
            <label>Mo ta</label><br>
            <input
                type="text"
                name="description"
                value="<?= htmlspecialchars($description, ENT_QUOTES, 'UTF-8') ?>"
            >
        </p>

        <button type="submit">Luu</button>
    </form>

    <p>
        <a href="index.php?controller=category&action=index">Quay lai</a>
    </p>
</body>
</html>
