<?php 
session_start();

require('Posts.php');

$consult = new Posts();
$posts = $consult->postes();
$usuarios = $consult->usuarios();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container {
            text-align: center;
        }
        .posts {
            font-size: 1.4rem;
            color: white;
            background-color: #123456;
            margin: 50px auto;
            width: 80%;
            border: 1px solid green;
            
        }
     
        header .box {
            display: inline-block;
            background-color: black;
            padding: 5px;
            margin: 50px;
        }
        a {
            font-weight: bold;
            text-decoration: none;
            color: yellow;
            /* background-color: black; */
        }
        .perfile {
            background-color: red;
            float: right;
            padding: 10px;
            border-radius: 110px;
            text-align: center;
            align-items: center;
            
        }
        .perfile a {
           color: white;
           
           
        }
    </style>
</head>
<body>
<header>
    <?php foreach($usuarios as $usuario){
      
        if($_SESSION['logado'] == $usuario->id){
     ?>
        <div class="box"><a href="#">LOGADO COMO: <?=$usuario->nome?></a></div>
        <?php    
        } else { 
        ?>

    <div class="box"><a href="conta.php?id=<?=$usuario->id?>&nome=<?=$usuario->nome?>">Usuario: <?=$usuario->nome?></a></div>
    <?php } }?>

    <div class="perfile"><div><a href="meuPerfil.php">Perfil: <?=$_SESSION['nome']?></a></div></div>

</header>    

    <div class="container">
    <?php 
                if(count($posts) == 0){
                    echo "<h5 style='color: red;'>Não tem nenhum post</h5>";
                                }
                ?>
            
        <?php foreach($posts as $post){
            
            ?>

            <div class="posts">
            <div class="box">
              
                <h1><?=$post->titulo?></h1>
                <p><?=$post->texto?></p>
                <br>

                <?php 
                foreach ($usuarios as $usuario) {
                    if($post->usuario_id == $usuario->id){
?>
<p style="background-color:gray;color: black;"><strong>Postado por: <?=$usuario->nome?></strong></p>
<?php 
                    }
                }
               
                ?>



                <br><br>
                <a href="comentarios.php?post_id=<?=$post->id?>">Comentarios</a>
            </div>
            </div>
            <?php } ?>

     
       
    </div>
</body>
</html>