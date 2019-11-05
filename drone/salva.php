<?php
	//Recebendo dados por formulário
	$modeloDrone = $_POST['modeloDrone'];
	$pesoDrone = $_POST['pesoDrone'];
	$alturaDrone = $_POST['alturaDrone'];
	$larguraDrone = $_POST['larguraDrone'];
	$precoDrone = $_POST['precoDrone'];
	$fotoDrone = $_POST['fotoDrone'];
	$disponibilidadeDrone = 0;
	
	//Conectando com o banco
	include_once "../banco/conexao.php";
	
	//Query de inserção
	$query = "INSERT INTO drone(
				modeloDrone,
				pesoDrone,
				alturaDrone,
				larguraDrone,
				precoDrone,
				disponibilidadeDrone,
				fotoDrone
			  ) VALUES (?,?,?,?,?,?,?)";
			  
	$stm = $db -> prepare($query);
	$stm -> bindParam(1, $modeloDrone);
	$stm -> bindParam(2, $pesoDrone);
	$stm -> bindParam(3, $alturaDrone);
	$stm -> bindParam(4, $larguraDrone);
	$stm -> bindParam(5, $precoDrone);
	$stm -> bindParam(6, $disponibilidadeDrone);
	$stm -> bindParam(7, $fotoDrone);
	
	if ($stm -> execute()) {
		header("location:acessoadm.php");
	}
	else {
		print "<p>Erro ao cadastrar drone!</p>";
		print "<a href='index.php'>Voltar</a>";
	}
?>