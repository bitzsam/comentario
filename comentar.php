<?php 
session_start();
require('Posts.php');
$query = new Posts;

$titulo = filter_input(INPUT_POST, 'titulo');
$texto = filter_input(INPUT_POST, 'texto');
$postId = filter_input(INPUT_POST, 'postId');


if($titulo  and $texto and $postId){
    $titulo =  htmlspecialchars($titulo);
    $texto =  htmlspecialchars($texto);
    $postId =  htmlspecialchars($postId);

    $query->comentarPost($titulo, $texto, $_SESSION['logado'], $postId);

}


header("Location: comentarios.php?post_id=$postId");
exit;


?>