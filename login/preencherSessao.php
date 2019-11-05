<?php
	//Recebendo ID através da sesão
	$cnpj = $_SESSION['user'];
	
	//Conectando com o BD
	include_once ("../banco/conexao.php");
	
	//Criando SQL
	$query = "SELECT * FROM empresa WHERE cnpj = ?";
	$stm = $db -> prepare($query);
	$stm -> bindParam(1, $cnpj);
	
	//Executando
	if ($stm -> execute()) {
		while ($row = $stm -> fetch()) {
			//Preenchendo sessão
			$_SESSION['nomeFantasia'] = $row['nomeFantasia'];
			$_SESSION['cidadeEmpresa'] = $row['cidadeEmpresa'];
			$_SESSION['telefoneEmpresa'] = $row['telefoneEmpresa'];
			$_SESSION['representanteEmpresa'] = $row['representanteEmpresa'];
			$_SESSION['categoriaEmpresa'] = $row['categoriaEmpresa'];
			$_SESSION['razaoSocial'] = $row['razaoSocial'];
			$_SESSION['senhaEmpresa'] = $row['senhaEmpresa'];
			$_SESSION['enderecoEmpresa'] = $row['enderecoEmpresa'];
		}
	}
?>