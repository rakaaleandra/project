<?php
session_start();
require_once __DIR__ . '/database/config.php';
require_once __DIR__ . '/controllers/UserController.php';
require_once __DIR__ . '/controllers/AuthController.php';
require_once __DIR__ . '/controllers/MahasiswaController.php';
require_once __DIR__ . '/controllers/MataKuliahController.php';
require_once __DIR__ . '/controllers/DosenController.php';
require_once __DIR__ . '/controllers/KuliahController.php';

$controller = new UserController($pdo);
$authController = new AuthController($pdo);
$mahasiswaController = new MahasiswaController($pdo);

$url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : '';
$url = explode('/', $url);

$action = isset($url[0]) && !empty($url[0]) ? $url[0] : 'index';
$id = isset($url[1]) ? $url[1] : null;

switch ($action) {
    case 'login':
        $authController->login($pdo);
        break;
    case 'doLogin':
        $authController->doLogin();
        break;
    case 'register':
        $authController->register();
        break;
    case 'doRegister':
        $authController->doRegister();
        break;
    case 'logout':
        $authController->logout();
        break;
    case 'create':
        $mahasiswaController->create();
        break;
    case 'store':
        $mahasiswaController->store();
        break;
    case 'edit':
        if ($id) $controller->edit($id);
        break;
    case 'update':
        if ($id) $controller->update($id);
        break;
    case 'delete':
        if ($id) $controller->delete($id);
        break;
    case 'show':
        if ($id) $mahasiswaController->show($id);
        break;
    default:
        $mahasiswaController->index();
        break;
}