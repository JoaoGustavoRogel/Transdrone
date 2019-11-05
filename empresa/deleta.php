<?php
	//Recebendo ID
	$cnpj = $_GET['cnpj'];
	
	//Conectando com o BD
	include_once ("../banco/conexao.php");
	
	//Criando SQL
	$query = "DELETE FROM empresa WHERE cnpj = ?";
	
	$stm = $db -> prepare($query);
	$stm -> bindParam(1, $cnpj);
	
	//Executando Query
	if ($stm -> execute()) {
		print "<script>location.href='acessoadm.php';</script>";
	}
	else {
		print "<p>Erro ao deletar Empresa!</p>";
	}
?>