<!-- Handle all entry point for all request -->

<?php
require_once "vendor/autoload.php"; //load classes and composer

use App\Controllers\BatchesController;
use App\Controllers\CategoriesController;
use App\Controllers\UserController;

$controller = $_GET['controller'] ?? 'user';
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

switch ($controller) {
    case 'user':
        $userController = new UserController();
        if (method_exists($userController, $action)) {
            $id ? $userController->$action($id) : $userController->$action();
        } else {
            echo "404 - Action not found";
        }
        break;
    /* add more case */
    case 'categories':
        $categoriesController = new CategoriesController();
        if (method_exists($categoriesController, $action)) {
            $id ? $categoriesController->$action($id) : $categoriesController->$action();
        } else {
            echo "404 - Action not found";
        }
        break;
    case 'batches':
        $batchesController = new BatchesController();
        if (method_exists($batchesController, $action)) {
            $id ? $batchesController->$action($id) : $batchesController->$action();
        } else {
            echo "404 - Action not found";
        }
        break;
    default:
        echo "404 - Controller not found";
}
