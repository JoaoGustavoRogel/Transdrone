<?php
	//Recebendo dados do formulário
	$modelo = $_POST['modeloDrone'];
	$peso = $_POST['pesoDrone'];
	$altura = $_POST['alturaDrone'];
	$largura = $_POST['larguraDrone'];
	$preco = $_POST['precoDrone'];
	$idDrone = $_POST['idDrone'];
	
	//Conexão com o BD
	include_once "../banco/conexao.php";
	
	//Query de atualização
	$query = "UPDATE drone SET 
				modeloDrone = ?,
				pesoDrone = ?,
				alturaDrone = ?,
				larguraDrone = ?,
				precoDrone = ?
			 WHERE  iddrone = ?";
			 
	
	$stm = $db -> prepare($query);
	$stm -> bindParam(1, $modelo);
	$stm -> bindParam(2, $peso);
	$stm -> bindParam(3, $altura);
	$stm -> bindParam(4, $largura);
	$stm -> bindParam(5, $preco);
	$stm -> bindParam(6, $idDrone);
	
	if ($stm -> execute()) {
		#header("location:acessoadm.php");
	}
	else {
		print "<p>Erro ao atualizar drone!</p>";
		print "<a href='acessoadm.php'>Voltar</a>";
	}
?>