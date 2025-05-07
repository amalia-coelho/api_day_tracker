<?php
  use Psr\Http\Message\ResponseInterface as Response;
  use Psr\Http\Message\ServerRequestInterface as Request;
  use Slim\Factory\AppFactory;

  require __DIR__ . '/vendor/autoload.php';

  // Cria a instância da aplicação Slim
  $app = AppFactory::create();

  require __DIR__ . '/src/routes/route.dispatcher.php';

  // Executa a aplicação
  $app->run();

?>