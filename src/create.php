<?php 
    require_once "../config/database.php";

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        if ($name && $email && $password) {
            $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt->execute(['name' => $name, 'email' => $email, 'password' => $hashed_password]);
            header("Location ../public/index.php");
            exit;
        }
    }
ob_start();
?>

<h2>Add User</h2>
<form method="POST">
    <label>Name: <input type="text" name="name" required></label><br>
    <label>Email: <input type="email" name="email" required></label><br>
    <label>Password: <input type="password" name="password" required></label><br>
    <button type="submit">Save</button>
</form>

<?php 
    $content = ob_get_clean();
    $title = "Add User";
    include "../templates/layout.php";
?>