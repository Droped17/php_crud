<?php include __DIR__ . "/../header.php"; ?>

<div class="container">
    <h1>Create User</h1>
    <form method="post" action="/php_crud/index.php?controller=user&action=store">
        <label>Name:</label>
        <input type="text" name="name" required><br>
        <label>Email:</label>
        <input type="email" name="email" required><br>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
