<?php 
   require_once "../Models/Pergunta.php";
   require_once "../Conection.php";

  
   $conexao = new Conection();
   $todasPerguntas = new Pergunta($conexao);
   $todasPerguntas = $todasPerguntas->recuperar();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Página Inicial</title>
</head>
<style type="text/css">
	.pergunta{

		width: 500px;
		height: 200px;
	}

	.enviar{
		width: 100px;
		height: 50px;
		background-color: orange;
		color: white;
	}

	.titulo{
		width: 500px;
		height: 50px;
	}
</style>
<body>
 <h1>Lista de perguntas cadastradas</h1>
 <?php foreach($todasPerguntas as $key => $value){ ?>
 <div>
     <h3> <a href="pagina_da_pergunta.php?id_pergunta=<?=$value['id']?>"><?= $value['titulo']?></a></h3>
     <h4>Autor:<?= $value['nome_usuario']?> </h4>
 </div>
 <hr>
<?php } ?>
 <h2>Fazer uma nova pergunta?</h2>
 <div>
 	<?php if(isset($_GET['situacao']) && $_GET['situacao'] == "erro") {?>
 		<h4 style="color: red">Preencha todos os campos</h4>
 	<?php } ?>
 	<form method="post" action="../Controller/IndexController.php">
 		<input type="text" name="nome" placeholder="Seu Nome...."><br><br>
 		<input class="titulo" type="text" name="titulo" placeholder="Titulo da pergunta"><br><br>
 		<textarea class="pergunta" name="conteudo"></textarea><br>
 		<input class="enviar" type="submit" name="enviar" value="Perguntar">
 	</form>
 </div>

</body>
</html>