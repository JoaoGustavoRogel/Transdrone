<?php
	//Recebendo ID
	$idCarga = $_GET['idCarga'];
	$cont = $_GET['cont'];
	//Conectando com o BD
	include_once ("../banco/conexao.php");
	
	//Query de exclusão
	$query = "DELETE FROM carga WHERE idCarga = ?";
	$stm = $db -> prepare($query);
	$stm -> bindParam(1, $idCarga);
	
	if ($stm -> execute()) {
		if ($cont == 1) {
			header("location:acessoadm.php");
		}
		else if ($cont == 2){
			header("location:../empresa/perfil.php");
		}
	}
	else {
		print "Erro ao excluir!";
	}
?>