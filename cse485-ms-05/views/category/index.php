<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh muc</title>
</head>
<body>
    <h1>Danh sach danh muc</h1>

    <?php if (!empty($_SESSION['flash'])): ?>
        <p>
            <?= htmlspecialchars($_SESSION['flash'], ENT_QUOTES, 'UTF-8') ?>
        </p>
        <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>

    <p>
        <a href="index.php?controller=category&action=create">Them moi</a>
    </p>

    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Ten</th>
            <th>Mo ta</th>
            <th>Ngay tao</th>
            <th>Thao tac</th>
        </tr>

        <?php foreach ($categories as $category): ?>
            <tr>
                <td><?= (int) $category['id'] ?></td>
                <td>
                    <?= htmlspecialchars($category['name'], ENT_QUOTES, 'UTF-8') ?>
                </td>
                <td>
                    <?= htmlspecialchars((string) ($category['description'] ?? ''), ENT_QUOTES, 'UTF-8') ?>
                </td>
                <td>
                    <?= htmlspecialchars($category['created_at'], ENT_QUOTES, 'UTF-8') ?>
                </td>
                <td>
                    <a href="index.php?controller=category&action=edit&id=<?= (int) $category['id'] ?>">
                        Sua
                    </a>

                    <form
                        method="post"
                        action="index.php?controller=category&action=delete"
                        style="display: inline"
                        onsubmit="return confirm('Ban co chac muon xoa?')"
                    >
                        <input
                            type="hidden"
                            name="id"
                            value="<?= (int) $category['id'] ?>"
                        >
                        <button type="submit">Xoa</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
