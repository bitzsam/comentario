<?php

session_start();

require('Posts.php');
$query = new Posts;


$_SESSION['logado'] = filter_input(INPUT_GET, 'id');
// $_SESSION['nome'] = filter_input(INPUT_GET, 'nome');

if (filter_input(INPUT_GET, 'id')) {
    $usuario = $query->usuario($_SESSION['logado']);
    $_SESSION['id'] = $usuario->nome;
    $_SESSION['nome'] = $usuario->nome;
    $_SESSION['email'] = $usuario->nome;
    
}



header('Location: index.php');
exit;
