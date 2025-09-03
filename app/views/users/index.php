<?php 
include __DIR__ . "/../header.php"; 
$id = "diikdeoqd58r1g8dr";
?>
<div class="container my-4 d-flex flex-column mb-3">
    <div class="border p-2">
        <?php echo"{$id}" ?>
    </div>
    <h1>User List</h1>
    <a href="index.php?controller=user&action=create" class="btn btn-primary w-25">Add User</a>
    <?php if (!empty($users)): ?>
        <table border="1" cellpadding="8">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($users as $u): ?>
                <tr>
                    <td><?= htmlspecialchars($u['id']) ?></td>
                    <td><?= htmlspecialchars($u['name']) ?></td>
                    <td><?= htmlspecialchars($u['email']) ?></td>
                    <td>
                        <a href="index.php?controller=user&action=edit&id=<?= htmlspecialchars($u['id']) ?>">✏️ Edit</a> |
                        <a href="index.php?controller=user&action=delete&id=<?= htmlspecialchars($u['id']) ?>" onclick="return confirm('Delete this user?')">🗑️ Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>Not Found</p>
    <?php endif; ?>
</div>

<div class="container">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Open Modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Special Request</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="/php_crud/index.php?controller=categories&action=store">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">name</label>
                            <input type="text" class="form-control" name="name" id="exampleFormControlInput1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput2" class="form-label">description</label>
                            <input type="text" class="form-control" name="description" id="exampleFormControlInput2">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>