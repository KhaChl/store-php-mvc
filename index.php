<?php
session_start();
require_once 'autoload.php';
require_once 'config/db.php';
require_once 'helpers/utils.php';
require_once 'config/parameters.php';
require_once 'views/layout/header.php';
require_once 'views/layout/navbar.php';

if (isset($_GET['controller'])) {
    $nameController = $_GET['controller'] . 'controller';
} else {
    $nameController = controllerDefault;
}

if (class_exists($nameController)) {
    $controller = new $nameController();

    if (isset($_GET['action']) && method_exists($controller, $_GET['action'])) {
        $action = $_GET['action'];
        $controller->$action();
    } elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
        $action = actionDefault;
        $controller->$action();
    } else {
        $error = new errorController();
        $error->index();
    }
} else {
    $error = new errorController();
    $error->index();
}

require_once 'views/layout/footer.php';
