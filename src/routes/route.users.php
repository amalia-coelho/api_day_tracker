<?php 
  function get_users(Request $request, Response $response): Response{
    // Chama o modelo para pegar os usuários do banco
    $users = User::getAllUsers();

    // Retorna os dados em formato JSON
    $response->getBody()->write(json_encode($users));
    return $response
        ->withHeader('Content-Type', 'application/json')
        ->withStatus(200);
}


?>