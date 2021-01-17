<?php 

  require_once "../Models/Pergunta.php";
  require_once "../Conection.php";
  require_once "../Models/Resposta.php";
  
  $conexao = new Conection();
  $pergunta = new Pergunta($conexao);
  $respostas = new Resposta($conexao);
  
  print_r($_POST);



  if(isset($_POST['enviar'])){
      
  
        if($_POST['nome'] != "" && $_POST['conteudo'] != "" && $_POST['titulo'] != ""){
      	 $pergunta->__set("nome_usuario",$_POST['nome']);
  		 $pergunta->__set("titulo",$_POST['titulo']);
    	 $pergunta->__set("conteudo",$_POST['conteudo']);

	     $pergunta->cadastrar();


	     header("Location: ../index.php");
      }else{
      	 header("Location: ../Views/index.php?situacao=erro");
      }
 
  }else if(isset($_POST['enviar_resposta'])){
        if($_POST['resposta'] != "" && $_POST['nome'] != "" && $_POST['id_pergunta'] != ""){

  	 print_r($_POST);
  	 $respostas->__set("conteudo", $_POST['resposta']);
  	 $respostas->__set("nome_usuario", $_POST['nome']);
  	 $respostas->__set("id_pergunta", $_POST['id_pergunta']);
  	 $respostas->cadastrar();

  	 header("Location: ../Views/pagina_da_pergunta.php?id_pergunta=".$_POST['id_pergunta']);
    echo "a-----";
  }else{
  	header("Location: ../Views/pagina_da_pergunta.php?situacao=erro&id_pergunta=".$_POST['id_pergunta']);

  	//echo "xxxx";
  }
  }

  	
   

 


  
    
  


 ?>