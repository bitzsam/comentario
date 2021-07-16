<?php

require("Connect.php");

class Posts extends Connect
{



    public function postes()
    {
        $sql = $this->pdo->query("SELECT * FROM posts");
        $query = $sql->fetchAll(PDO::FETCH_OBJ);
        return $query;
    }

    public function usuarios(){
        $sql = $this->pdo->query("SELECT * FROM usuarios");
        $query = $sql->fetchAll(PDO::FETCH_OBJ);
        return $query;
        
    }

    public function usuario($userId){
        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE id = :userid");
        $sql->bindValue(":userid", $userId);
        $sql->execute();
        $query = $sql->fetch(PDO::FETCH_OBJ);
        return $query;
    }

    // 
    // public function usuario($userId){
    //     $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE id = :userid");
    //     $sql->bindValue(":userid", $userId);
    //     $sql->execute();
    //     $query = $sql->fetchAll(PDO::FETCH_OBJ);
    //     return $query;
        
    // }
    
    public function meusComentarios($postId){
        $sql = $this->pdo->prepare("SELECT * FROM comentarios WHERE usuario_id = :postId");
        $sql->bindValue(":postId", $postId);
        $sql->execute();
        $query = $sql->fetchAll(PDO::FETCH_OBJ);
        return $query;
    }

    public function meusPosts($postId){
        $sql = $this->pdo->prepare("SELECT * FROM posts WHERE id = :postId");
        $sql->bindValue(":postId", $postId);
        $sql->execute();
        $query = $sql->fetchAll(PDO::FETCH_OBJ);
        return $query;
    }


    public function comentarios($postId){
        $sql = $this->pdo->prepare("SELECT * FROM comentarios  WHERE post_id = :postId ORDER BY id DESC");
        $sql->bindValue(":postId", $postId);
        $sql->execute();
        $query = $sql->fetchAll(PDO::FETCH_OBJ);
        return $query;
    }

    public function postarPost($titulo, $texto, $meuId){
        $sql = $this->pdo->prepare("INSERT INTO posts (titulo, texto, usuario_id) VALUES (:titulo, :texto, :meuId)");
        $sql->bindValue(":titulo", $titulo);
        $sql->bindValue(":texto", $texto);
        $sql->bindValue(":meuId", $meuId);
        $sql->execute();
    }
    
    public function comentarPost($titulo, $texto, $meuId, $postId){
        $sql = $this->pdo->prepare("INSERT INTO comentarios (titulo, comentario, usuario_id, post_id) VALUES (:titulo, :comentario, :meuId, :post_id)");
        $sql->bindValue(":titulo", $titulo);
        $sql->bindValue(":comentario", $texto);
        $sql->bindValue(":meuId", $meuId);
        $sql->bindValue(":post_id", $postId);

        $sql->execute();
    }
    

    

}
