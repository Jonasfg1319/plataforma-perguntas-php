<?php 

 

 class Pergunta{
      
     private $id = null;
     private $nome_usuario = null;
     private $titulo = null;
     private $conteudo = null;
     private $conn = null;
     
     public function __construct($conn){
         $this->conn = $conn->conexao();
     }

     public function __get($attr){
     	return $this->$attr;
     }

     public function __set($attr,$val){
     	return $this->$attr = $val;
     }
    

     public function cadastrar(){
        $query = "INSERT INTO perguntas(nome_usuario,titulo,conteudo) VALUES(?,?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1,$this->__get("nome_usuario"));
        $stmt->bindValue(2,$this->__get("titulo"));
        $stmt->bindValue(3,$this->__get("conteudo"));
        $stmt->execute();
     }

     public function recuperar(){
        $query = "SELECT id,nome_usuario,titulo FROM perguntas";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }

     public function recuperarPergunta($id){
        $query = "SELECT nome_usuario,titulo,conteudo FROM perguntas WHERE id = $id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }
 }


?>