<?php
namespace App\Controller;

use App\Model\User;

class UserController {
    // List users
    public function index() {
        $users = User::all();
        $this->render("user/index.php", ['users' => $users, 'title' => "User List"]);
    }

    // Show single user
    public function show(int $id) {
        $user = User::find($id);
        if (!$user) die("User not found");
        $this->render("user/show.php", ['user' => $user, 'title' => "User Details"]);
    }

    // Create new user
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            User::create($_POST['name'], $_POST['email']);
            header("Location: /?action=index");
            exit;
        }
        $this->render("user/create.php", ['title' => "Add User"]);
    }

    // Update user
    public function edit(int $id) {
        $user = User::find($id);
        if (!$user) die("User not found");

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            User::update($id, $_POST['name'], $_POST['email']);
            header("Location: /?action=index");
            exit;
        }
        $this->render("user/edit.php", ['user' => $user, 'title' => "Edit User"]);
    }

    // Delete user
    public function delete(int $id) {
        User::delete($id);
        header("Location: /?action=index");
        exit;
    }

    private function render(string $view, array $data = []) {
        extract($data);
        ob_start();
        require __DIR__ . "/../View/$view";
        $content = ob_get_clean();
        require __DIR__ . "/../View/layout.php";
    }
}
