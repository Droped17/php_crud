<?php
require_once __DIR__ . "../vendor/autoload.php";

use App\Controller\UserController;

$controller = new UserController();
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

switch ($action) {
    case 'index': $controller->index(); break;
    case 'show': $controller->show((int)$id); break;
    case 'create': $controller->create(); break;
    case 'edit': $controller->edit((int)$id); break;
    case 'delete': $controller->delete((int)$id); break;
    default: echo "404 Not Found";
}
