<?php 
    // Carrega os models
    foreach (glob(__DIR__ . '/../models/*.php') as $routeFile) {
        require_once $routeFile;
    }

    // Carrega as rotas
    foreach (glob(__DIR__ . '/../routes/*.php') as $routeFile) {
        require_once $routeFile;
    }

    // Test
    $app->get('/', 'not_found');
    $app->get('/hello', 'say_hello');


    // Users 
    $app->get('/login', 'try_login');
?>