<h2>User List</h2>
<!-- <a href="/?action=create">➕ Add User</a> -->
 <a href="index.php?action=create">➕ Add User</a>

<table>
  <tr><th>ID</th><th>Name</th><th>Email</th><th>Actions</th></tr>
  <?php foreach ($users as $u): ?>
    <tr>
      <td><?= htmlspecialchars($u->id) ?></td>
      <td><?= htmlspecialchars($u->name) ?></td>
      <td><?= htmlspecialchars($u->email) ?></td>
      <td>
        <a href="/?action=show&id=<?= $u->id ?>">View</a> |
        <a href="/?action=edit&id=<?= $u->id ?>">Edit</a> |
        <a href="/?action=delete&id=<?= $u->id ?>" onclick="return confirm('Delete user?')">Delete</a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>
