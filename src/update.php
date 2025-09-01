<?php 
    require_once "../config/database.php";

    $id = $_GET['id'] ?? null;
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $user = $stmt->fetch();

    if (!$user) {
        die("User not found!");
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $stmt = $pdo->prepare("UPDATE users SET name = :name, email = :email WHERE id = :id");
        $stmt->execute(['name' => $name, 'email' => $email, 'id' => $id]);
        header("Location: ../public/index.php");
        exit;
    }

    ob_start();
?>

<h2>Edit User</h2>
<form method="POST">
    <label>Name: <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" required></label><br>
    <label>Email: <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required></label><br>
    <button type="submit">Update</button>
</form>
<?php
$content = ob_get_clean();
$title = "Edit User";
include "../templates/layout.php";