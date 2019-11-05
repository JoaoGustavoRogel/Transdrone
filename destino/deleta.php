<?php
	//Recebendo
	$idCarga = $_GET['idCarga'];
	
	//Conectando com o BD
	include_once ("../banco/conexao.php");
	
	//Query
	$query = "DELETE FROM destino WHERE idCarga = ?";
	
	$stm = $db -> prepare($query);
	$stm -> bindParam(1, $idCarga);
	
	//Executando
	if ($stm -> execute()) {
		header("location:acessoadm.php");
	}
	else {
		echo "Erro ao deletar. Contate o adm!";
	}
?>