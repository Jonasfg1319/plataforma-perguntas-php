<?php 

class Resposta{
      
     private $id = null;
     private $nome_usuario = null;
     private $id_pergunta = null;
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
        $query = "INSERT INTO resposta(nome_usuario,id_pergunta,conteudo) VALUES(?,?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1,$this->__get("nome_usuario"));
        $stmt->bindValue(2,$this->__get("id_pergunta"));
        $stmt->bindValue(3,$this->__get("conteudo"));
        $stmt->execute();
     }


     public function recuperarResposta($id){
        $query = "SELECT nome_usuario,conteudo FROM resposta WHERE id_pergunta = $id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }
 }

?>