<?php
	//Conectando com o BD
	include_once ("../banco/conexao.php");
	
	//Recebendo ID
	$idDestino = $_POST['idDestino'];
	
	//Query 
	$query = "UPDATE destino SET statusDestino = 1 WHERE idDestino = ?";
	$stm = $db -> prepare($query);
	
	$stm -> bindParam(1, $idDestino);
	
	if($stm -> execute()) {
		header("location:acessoadm.php");
	}
	else {
		echo "Erro contate o adm!";
	}
?>