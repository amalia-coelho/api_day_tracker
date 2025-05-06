<?php 
    // Carrega as rotas
    foreach (glob(__DIR__ . '/../src/routes/*.php') as $routeFile) {
        require_once $routeFile;
    }

    
    // Test
    $app->get('/hello', 'say_hello');


    // Users 
    $app->get('/login', 'try_login');
?>