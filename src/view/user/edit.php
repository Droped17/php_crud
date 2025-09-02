<h2>Edit User</h2>
<form method="POST">
  <label>Name: <input type="text" name="name" value="<?= htmlspecialchars($user->name) ?>" required></label><br>
  <label>Email: <input type="email" name="email" value="<?= htmlspecialchars($user->email) ?>" required></label><br>
  <button type="submit">Update</button>
</form>
