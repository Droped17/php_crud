<?php
namespace App\Controllers;

use App\Config\Database;
use App\Models\User;

class UserController {
    private $user;

    public function __construct() {
        $db = (new Database())->getConnection();  // Connect to DB
        $this->user = new User($db);              // Instantiate the User Model
    }

    public function index() {
        $users = $this->user->all();              // Get all users from DB
        ob_start();                               
        include "app/views/users/index.php";      // Render view
        $content = ob_get_clean();
        $title = "User List";
        include "app/views/layout.php"; 
    }

    public function create() {
        include "app/views/users/create.php";     // Show create form
    }

    public function store() {
        if ($_POST) {
            $this->user->create($_POST['name'], $_POST['email']);          // Save user
            header("Location: index.php?controller=user&action=index");
        }
    }

    public function edit($id) {
        $user = $this->user->find($id);          // Fetch user for show on input
        include "app/views/users/edit.php";      // Show edit form
    }

    public function update($id) {
        if ($_POST) {
            $this->user->update($id, $_POST['name'], $_POST['email']);   // Update DB
            header("Location: index.php?controller=user&action=index");
            exit;
        } else {
            echo "Invalid request";
        }
    }

    public function delete($id) {
        $this->user->delete($id);        // Remove user
        header("Location: index.php?controller=user&action=index");
    }
}