<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/config/database.php';
// require_once __DIR__ . '/controllers/AuthController.php';
// require_once __DIR__ . '/controllers/TaskController.php';
// require_once __DIR__ . '/controllers/UserController.php';

// Autoload controllers
spl_autoload_register(function ($class) {
    $file = __DIR__ . '/controllers/' . $class . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

// Get the base path
$basePath = '/todo_app';
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Remove base path if present
if (strpos($requestUri, $basePath) === 0) {
    $requestUri = substr($requestUri, strlen($basePath));
}

$request = $requestUri === '' ? '/' : $requestUri;
$method = $_SERVER['REQUEST_METHOD'];

try {
    switch ($request) {
        case '/':
        case '/tasks':
            $controller = new TaskController();
            $controller->index();
            break;
            
        case '/tasks/add':
            $controller = new TaskController();
            $method === 'POST' ? $controller->create() : $controller->create();
            break;
            
        case (preg_match('/^\/tasks\/edit\/(\d+)$/', $request, $matches) ? true : false):
            $controller = new TaskController();
            $controller->edit($matches[1]);
            break;
            
        case (preg_match('/^\/tasks\/delete\/(\d+)$/', $request, $matches) ? true : false):
            $controller = new TaskController();
            $controller->delete($matches[1]);
            break;
            
        case '/login':
            $controller = new AuthController();
            $controller->login();
            break;
            
        case '/register':
            $controller = new AuthController();
            $controller->register();
            break;
            
        case '/logout':
            $controller = new AuthController();
            $controller->logout();
            break;
            
        case '/profile':
            checkLogin();
            require_once __DIR__ . '/views/profile/index.php';
            break;

        case '/profile/update':
            checkLogin();
            $controller = new AuthController();
            $controller->updateMyProfile();
            break;            

        case '/users':
            $controller = new UserController();
            $controller->index();
            break;

        case '/users/export':
            $controller = new UserController();
            $controller->export();
            break;
            
        case '/users/download-template':
            $controller = new UserController();
            $controller->downloadTemplate();
            break;
            
        case '/users/import':
            $controller = new UserController();
            $method === 'POST' ? $controller->import() : $controller->import();
            break;
            
        case '/users/export-pdf':
            $controller = new UserController();
            $controller->exportPdf();
            break;

        case '/users/add':
            $controller = new UserController();
            $method === 'POST' ? $controller->create() : $controller->create();
            break;
            
        case (preg_match('/^\/users\/edit\/(\d+)$/', $request, $matches) ? true : false):
            $controller = new UserController();
            $controller->edit($matches[1]);
            break;
            
        case (preg_match('/^\/users\/delete\/(\d+)$/', $request, $matches) ? true : false):
            $controller = new UserController();
            $controller->delete($matches[1]);
            break;
            
        default:
            http_response_code(404);
            require_once __DIR__ . '/views/errors/404.php';
            break;
    }
} catch (Exception $e) {
    error_log('Application error: ' . $e->getMessage());
    http_response_code(500);
    require_once __DIR__ . '/views/errors/500.php';
}