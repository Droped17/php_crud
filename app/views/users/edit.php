<?php include __DIR__ . "/../header.php"; ?>

<div class="container">
    <h1>Edit User</h1>
    <form method="post" action="index.php?controller=user&action=update&id=<?= $user['id'] ?>">
        <label>Name:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" required><br>
        <label>Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required><br>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
