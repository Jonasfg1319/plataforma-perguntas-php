<?php 

 class Conection{
    

    public function alo(){
    	echo "Olá galera";
    }

    public function conexao(){
     try {
 	   $pdo = new PDO("mysql:host=localhost;dbname=forum","root","");
      
      return $pdo;
    }catch(PDOException $e){
          
          echo($e->getMessage());
    }
    }
  
 }






?>