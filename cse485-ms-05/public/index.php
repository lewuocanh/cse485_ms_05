<?php

declare(strict_types=1);

session_start();

$controllerName = $_GET['controller'] ?? 'category';
$action = $_GET['action'] ?? 'index';

$controllers = [
    'category' => 'CategoryController',
];

$actions = [
    'index',
    'create',
    'edit',
    'delete',
];

if (!isset($controllers[$controllerName])) {
    http_response_code(404);
    exit('Controller not found');
}

if (!in_array($action, $actions, true)) {
    http_response_code(404);
    exit('Action not found');
}

$className = $controllers[$controllerName];

require_once __DIR__ . '/../controllers/' . $className . '.php';

$controller = new $className();
$controller->{$action}();
