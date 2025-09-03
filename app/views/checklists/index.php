<?php include __DIR__ . "/../header.php"; ?>

<h2>User <?= htmlspecialchars($id) ?>'s Checklist</h2>

<form method="post" action="index.php?controller=checklist&action=store&id=<?= $id ?>">
    <div class="input-group mb-3">
        <input type="text" name="title" class="form-control" placeholder="New task..." required>
        <button class="btn btn-success">Add</button>
    </div>
</form>

<ul class="list-group">
    <?php foreach ($items as $item): ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <span class="<?= $item['done'] ? 'text-decoration-line-through' : '' ?>">
                <?= htmlspecialchars($item['title']) ?>
            </span>
            <div>
                <a href="index.php?controller=checklist&action=toggle&id=<?= $item['id'] ?>" class="btn btn-sm btn-warning">✔</a>
                <a href="index.php?controller=checklist&action=delete&id=<?= $item['id'] ?>" class="btn btn-sm btn-danger">🗑</a>
            </div>
        </li>
    <?php endforeach; ?>
</ul>

<?php include __DIR__ . "/../footer.php"; ?>
