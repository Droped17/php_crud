<?php include __DIR__ . "/../header.php"; ?>
<div class="container my-4 d-flex flex-column mb-3">
    <h1>Categories List</h1>
    <?php if (!empty($categories)): ?>
        <table border="1" cellpadding="8">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
            </tr>
            <?php foreach ($categories as $c): ?>
                <tr>
                    <td><?= htmlspecialchars($c['id']) ?></td>
                    <td><?= htmlspecialchars($c['name']) ?></td>
                    <td><?= htmlspecialchars($c['description']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>Not Found</p>
    <?php endif; ?>
</div>