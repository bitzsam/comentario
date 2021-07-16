<?php 


class Connect {
     
    protected $pdo;
    private $dbName = "comentarios";
    private $host = "localhost";
    private $user = "root";
    private $pass = "";

    public function __construct(){
        $dbName = $this->dbName;
        $host = $this->host;
        $user = $this->user;
        $pass = $this->pass;
        $conn = new PDO("mysql:dbname=" . $dbName . ";host=" . $host, $user, $pass);
        $this->pdo = $conn;
    }
    
}