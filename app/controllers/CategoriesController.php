<?php

namespace App\Controllers;

use App\Config\Database;
use App\Models\Categories;

class CategoriesController
{
    private $categories;

    public function __construct()
    {
        $db = (new Database())->getConnection();  // Connect to DB
        $this->categories = new Categories($db);              // Instantiate the User Model
    }

    public function index()
    {
        $categories = $this->categories->all();
        ob_start();
        include "app/views/categories/index.php";
        $content = ob_get_clean();
        $title = "Categories List";
        include "app/views/layout.php";
    }

    public function create()
    {
        include "app/views/categories/index.php";
    }

    public function store()
    {
        if ($_POST) {
            $this->categories->create($_POST['name'], $_POST['description']);          // Save user
            header("Location: index.php?controller=categories&action=index");
        }
    }
}
