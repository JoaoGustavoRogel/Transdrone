<?php
	//Recebendo dados
	$idCarga = $_POST['idCarga'];
	$nomeCarga = $_POST['nomeCarga'];
	$pesoCarga = $_POST['pesoCarga'];
	$alturaCarga = $_POST['alturaCarga'];
	$larguraCarga = $_POST['larguraCarga'];
	$profundidadeCarga = $_POST['profundidadeCarga'];
	$riscoCarga = $_POST['riscoCarga'];
	$cnpjEmpresa = $_POST['cnpjEmpresa'];
	
	//Conectando com o BD
	include_once ("../banco/conexao.php");
	
	//Query de atualização
	$query = "UPDATE carga SET
				nomeCarga = ?,
				pesoCarga = ?,
				alturaCarga = ?,
				larguraCarga = ?,
				profundidadeCarga = ?,
				riscoCarga = ?,
				cnpjEmpresa = ?
			WHERE idCarga = ?";
			
	$stm = $db -> prepare($query);
	
	$stm -> bindParam(1, $nomeCarga);
	$stm -> bindParam(2, $pesoCarga);
	$stm -> bindParam(3, $alturaCarga);
	$stm -> bindParam(4, $larguraCarga);
	$stm -> bindParam(5, $profundidadeCarga);
	$stm -> bindParam(6, $riscoCarga);
	$stm -> bindParam(7, $cnpjEmpresa);
	$stm -> bindParam(8, $idCarga);
	
	if ($stm -> execute()) {
		header("location:acessoadm.php");
	}
	else {
		print "Erro ao atualizar!";
	}
	
	
?>