<?php
require_once "../config/database.php";

$stmt = $pdo->query("SELECT * FROM users ORDER BY created_at DESC");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

ob_start(); // start template buffer
?>

<h2>All Users</h2>
<a href="../src//create.php">Add User</a>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Actions</th>
    </tr>
    <!-- Loop users -->
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= htmlspecialchars($user['id']) ?></td>
            <td><?= htmlspecialchars($user['name']) ?></td>
            <td><?= htmlspecialchars($user['email']) ?></td>
            <td><?= htmlspecialchars($user['password']) ?></td>
            <td>
                <a href="../src/read.php?id<?= $user['id'] ?>">View</a>
                <a href="../src/read.php?id<?= $user['id'] ?>">Edit</a>
                <a href="../src/delete.php?id=<?= $user['id'] ?>" onclick="return confirm('Delete user?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php 
    $content = ob_get_clean();
    $title = "User List";
    include "../templates/layout.php";
?>