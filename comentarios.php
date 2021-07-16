<?php 
session_start();
require('Posts.php');
$consult = new Posts;
$posts = $consult->postes();

$postId = filter_input(INPUT_GET, 'post_id');

$comentarios = $consult->comentarios($postId);
$usuarios = $consult->usuarios();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>comentarios</title>
    <link rel="stylesheet" href="coment.css">
</head>
<body>
    <a href="index.php">voltar para a home</a>
<div class="container d-flex justify-content-center mt-100 mb-100">
    <div class="row">
        <div class="col-md-12">

        



            <div class="card">

            <?php foreach($posts as $post){



                if($post->id == $postId){
                echo "<h1 style='color: blue;'><strong>$post->titulo</strong></h1>";
                }
            }
                ?>


                <div class="card-body">
                    <h4 class="card-title">Comentários recente</h4>
                    <h6 class="card-subtitle">Latest Comments section by users</h6>
                </div>



<?php 
if(count($comentarios) == 0){
    echo "<h2>Não há nenhum comentário!</h2>";

}
foreach($comentarios as $comentario) {
?>
                <div class="comment-widgets m-b-20">
                    <div class="d-flex flex-row comment-row">
                        <div class="p-2"><span class="round"></span></div>
                        <div class="comment-text w-100">
<?php 
foreach ($usuarios as $usuario) {
    if($usuario->id === $comentario->usuario_id){
        echo "<h5>$usuario->nome</h5>";
    }
}
?>
                            
                            
                            <div class="comment-footer"> <span class="date">-</span> <span class="label label-info"><?=$comentario->titulo?></span> <span class="action-icons"> <a href="#" data-abc="true"><i class="fa fa-pencil"></i></a> <a href="#" data-abc="true"><i class="fa fa-rotate-right"></i></a> <a href="#" data-abc="true"><i class="fa fa-heart"></i></a> </span> </div>
                            <p class="m-b-5 m-t-10"><?=$comentario->comentario?></p>
                        </div>
                    </div>               
        
                </div>

<?php } ?>





            </div>
        </div>


        <div class="texarea">
          <form action="comentar.php" method="post">
              <input type="hidden" name="postId" value="<?=$postId;?>">
              <input type="text" name="titulo" placeholder="Titulo do comentario"><br>
             <textarea name="texto"  cols="90" rows="10" placeholder="Conteúdo"></textarea><br>
             <input type="submit" value="Comentar">
          </form>
          <br><br>
      </div>
    </div>

    </div>
</div>
</body>
</html>