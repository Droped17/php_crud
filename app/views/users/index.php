<h1>User List</h1>
<a href="index.php?controller=user&action=create">➕ Add User</a>
<table border="1" cellpadding="8">
    <tr><th>ID</th><th>Name</th><th>Email</th><th>Actions</th></tr>
    <?php foreach ($users as $u): ?>
        <tr>
            <td><?= $u['id'] ?></td>
            <td><?= htmlspecialchars($u['name']) ?></td>
            <td><?= htmlspecialchars($u['email']) ?></td>
            <td>
                <a href="index.php?controller=user&action=edit&id=<?= $u['id'] ?>">✏️ Edit</a> |
                <a href="index.php?controller=user&action=delete&id=<?= $u['id'] ?>" onclick="return confirm('Delete this user?')">🗑️ Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
