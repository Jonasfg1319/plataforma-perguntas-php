<?php 
   
   require_once "../Models/Pergunta.php";
   require_once "../Conection.php";
   require_once "../Models/Resposta.php";

  
   $conexao = new Conection();
   $pergunta = new Pergunta($conexao);
   $perguntaAtual = $pergunta->recuperarPergunta($_GET['id_pergunta']);
   $respostas = new Resposta($conexao);
   $respostasDoPost = $respostas->recuperarResposta($_GET['id_pergunta']);

   if(count($perguntaAtual) == 0){

   	  header("Location: erro.php");
   }


 
   

 ?>
<!DOCTYPE html>
<html>
<head>
	<title><?= $perguntaAtual[0]['titulo'] ?></title>
</head>
<style type="text/css">
	.caixa{
		width: 500px;
		height: 200px;
	}
</style>
<body>

 <h1><?= $perguntaAtual[0]['titulo'] ?></h1>
 <p><?= $perguntaAtual[0]['conteudo'] ?></p>
 <b>Pergunta feita por: <?= $perguntaAtual[0]['nome_usuario'] ?></b>
 <hr>
 <?php if(count($respostasDoPost) > 0){ ?>
 <?php foreach($respostasDoPost as $key => $value){?>
 	<h2><?= $value['nome_usuario'] ?> Respondeu:</h2>
 	<p><?= $value['conteudo'] ?></p>
 <?php } ?>

<?php } else {?>
 <p> Ainda não há respostas para essa pergunta...</p>
<?php } ?>
 <hr>
 <?php if(isset($_GET['situacao']) && $_GET['situacao'] == "erro") {?>
 		<h4 style="color: red">Preencha todos os campos</h4>
 	<?php } ?>
 <form action="../Controller/IndexController.php" method="post">
 	<input type="text" name="nome" placeholder="Seu Nome..."><br><br>
 	<textarea class="caixa" type="text" name="resposta" > </textarea><br>
 	<input type="hidden" readonly="true" name="id_pergunta" value="<?= $_GET['id_pergunta'] ?>" >
 	<input type="submit" name="enviar_resposta" value="Responder">
 </form>

</body>
</html>