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
$dosenController = new DosenController($pdo);
$mataKuliahController = new MataKuliahController($pdo);

$url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : '';
$url = explode('/', $url);

$action = isset($url[0]) && !empty($url[0]) ? $url[0] : 'index';
$id = isset($url[1]) ? $url[1] : null;

switch ($action) {
    case 'login':
        $authController->login();
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

    case 'dosen':
        if(isset($url[1]) && $url[1] === 'index') {
            $dosenController->index();
            break;
        }
        if(isset($url[1]) && $url[1] === 'create') {
            $dosenController->create();
            break;
        }
        if(isset($url[1]) && $url[1] === 'store') {
            $dosenController->store();
            break;
        }
        if(isset($url[1]) && $url[1] === 'edit' && isset($url[2])) {
            $dosenController->edit($url[2]);
            break;
        }
        if(isset($url[1]) && $url[1] === 'update' && isset($url[2])) {
            $dosenController->update($url[2]);
            break;
        }
        if(isset($url[1]) && $url[1] === 'delete' && isset($url[2])) {
            $dosenController->delete($url[2]);
            break;
        }
        if(isset($url[1]) && $url[1] === 'show' && isset($url[2])) {
            $dosenController->show($url[2]);
            break;
        }
        // Default to index if no valid action is found
        $dosenController->index();
        break;

    case 'matakuliah':
        if(isset($url[1]) && $url[1] === 'index') {
            $mataKuliahController->index();
            break;
        }
        if(isset($url[1]) && $url[1] === 'create') {
            $mataKuliahController->create();
            break;
        }
        if(isset($url[1]) && $url[1] === 'store') {
            $mataKuliahController->store();
            break;
        }
        if(isset($url[1]) && $url[1] === 'edit' && isset($url[2])) {
            $mataKuliahController->edit($url[2]);
            break;
        }
        if(isset($url[1]) && $url[1] === 'update' && isset($url[2])) {
            $mataKuliahController->update($url[2]);
            break;
        }
        if(isset($url[1]) && $url[1] === 'delete' && isset($url[2])) {
            $mataKuliahController->delete($url[2]);
            break;
        }
        if(isset($url[1]) && $url[1] === 'show' && isset($url[2])) {
            $mataKuliahController->show($url[2]);
            break;
        }
        // Default to index if no valid action is found
        $mataKuliahController->index();
        break;
    
    case 'create':
        $mahasiswaController->create();
        break;
    case 'store':
        $mahasiswaController->store();
        break;
    case 'edit':
        if ($id) $mahasiswaController->edit($id);
        break;
    case 'update':
        if ($id) $mahasiswaController->update($id);
        break;
    case 'delete':
        if ($id) $mahasiswaController->delete($id);
        break;
    case 'show':
        if ($id) $mahasiswaController->show($id);
        break;
    default:
        $mahasiswaController->index();
        break;
}