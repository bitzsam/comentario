<?php 
session_start();
require('Posts.php');
$query = new Posts;

$titulo = filter_input(INPUT_POST, 'titulo');
$texto = filter_input(INPUT_POST, 'texto');

if($titulo and $texto){
    
$titulo = htmlspecialchars($titulo);
$texto = htmlspecialchars($texto);
    $query->postarPost($titulo, $texto, $_SESSION['logado']);
}

header('Location: index.php');
exit;

?>