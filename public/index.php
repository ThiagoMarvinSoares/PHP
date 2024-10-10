<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require "../bootstrap.php";

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {

    $compras = [
        ["titulo"=>"Carvão","desc"=>"5kg"],
        ["titulo"=>"Arroz","desc"=>"1kg"]
    ];

    $listaHTML = "";

    foreach($compras as $key => $value){
        $listaHTML .="<li>".$value['titulo']. ' - '.$value['desc'] . "</li>";
    }

    $pagina = "
        <!DOCTYPE html>
        <html>
            <head>
                <meta charset='utf-8'>
                <title>Principal</title>
            </head>
            <body>
                <h2>Página principal</h2>
                <ul>.$listaHTML.</ul>
            </body>
        </html>
    ";

    $response->getBody()->write($pagina);
    return $response;
});

$app->run();