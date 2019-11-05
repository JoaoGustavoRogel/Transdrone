<?php
	//Recebendo Dados
	session_start();
	$cnpjEmpresa = $_SESSION['user'];
	$enderecoDestino = $_POST['enderecoDestino'];
	$statusDestino = 0;
	$idCarga = $_POST['idCarga'];
	$idDrone = $_POST['idDrone'];
	
	//Conectando com o BD
	include_once ("../banco/conexao.php");
	
	//Criando Query
	$query = "INSERT INTO destino (
				enderecoDestino,
				statusDestino,
				idCarga,
				idDrone,
				cnpjEmpresa
			  )VALUES (?,?,?,?,?)";
			  
	$stm = $db -> prepare($query);
	$stm -> bindParam(1, $enderecoDestino);
	$stm -> bindParam(2, $statusDestino);
	$stm -> bindParam(3, $idCarga);
	$stm -> bindParam(4, $idDrone);
	$stm -> bindParam(5, $cnpjEmpresa);
	
	//Executando Query
	if ($stm -> execute()) {
		header("location:../empresa/perfil.php");
	}
	else {
		print "<p>Erro ao cadastrar destino!</p>";
	}
?>