<?php
  function say_hello($request, $response) {
    // Define a resposta como "Hello World"
    $response->getBody()->write('Hello World');

    // Retorna a resposta com o tipo de conteúdo como texto e status 200
    return $response
      ->withHeader('Content-Type', 'text/plain')
      ->withStatus(200);
  }

  function not_found($request, $response) {
    // Define a resposta como "Not Found"
    $response->getBody()->write('Not Found');

    // Retorna a resposta com o tipo de conteúdo como texto e status 404
    return $response
      ->withHeader('Content-Type', 'text/plain')
      ->withStatus(404);
  }
?>