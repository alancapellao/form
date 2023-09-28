<?php
require_once('../config/app.php');
require_once('../autoload.php');

// Analise a URI
$uri = isset($_GET['uri']) ? $_GET['uri'] : '';
$uri = explode('/', $uri);

// Obter a rota correspondente
$routeName = isset($uri[0]) ? $uri[0] : '';

if (array_key_exists($routeName, $routes)) {
    $route = $routes[$routeName];
    $controllerClass = $route['controller'];
    $controller = new $controllerClass();

    // Determinar o método a ser chamado com base na URI
    $method = 'default';

    if (isset($uri[1]) && isset($route['methods'][$uri[1]])) {
        $method = $uri[1];
    }

    // Verificar se o método existe na classe do controlador
    if (method_exists($controller, $route['methods'][$method])) {
        // Chamar o método apropriado
        $method = $route['methods'][$method];
        $controller->$method();
    } else {
        echo 'Método não encontrado';
    }
} else {
    // Lidar com páginas não encontradas ou outros casos
    echo 'Página não encontrada';
}
