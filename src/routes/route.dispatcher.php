<?php 
    // Carrega as rotas
    foreach (glob(__DIR__ . '/../routes/*.php') as $routeFile) {
        require_once $routeFile;
    }

    // Test
    $app->get('/', function ($request, $response) {
        return not_found($request, $response);
    });
    $app->get('/hello', 'say_hello');


    // Users 
    $app->get('/login', 'try_login');
?>