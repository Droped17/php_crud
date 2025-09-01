<?php 
    require_once "../config/database.php";

    $id = $_GET['id'] ?? null;

    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $user = $stmt->fetch();
    
    if (!$user) {
        die("User not found!");
    }

    ob_start();
?>

<h2>User Details</h2>
<p><b>ID:</b> <?= htmlspecialchars($user['id']) ?> </p>
<p><b>Name:</b> <?= htmlspecialchars($user['name']) ?> </p>
<p><b>Email:</b> <?= htmlspecialchars($user['email']) ?> </p>
<a href="../public/index.php">Back</a>

<?php 
    $content = ob_get_clean();
    $title = "User Details";
    include "../templates/layout.php";
?>
