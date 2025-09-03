<?php

namespace App\Controllers;

use App\Config\Database;
use App\Models\Batches;

class BatchesController
{
    private $batches;

    public function __construct()
    {
        $db = (new Database())->getConnection();
        $this->batches = new Batches($db);
    }

    public function index()
    {
        $batches = $this->batches->all();
        ob_start();
        include "app/views/batches/index.php";
        $content = ob_get_clean();
        $title = "Batches";
        include "app/views/layout.php";
    }

    public function create()
    {
        include "app/views/batches/index.php";
    }

    public function store()
    {
        if ($_POST) {
            $this->batches->create($_POST['ref_no'], $_POST['title'], $_POST['description']);          // Save user
            header("Location: index.php?controller=batches&action=index");
        }
    }
}
