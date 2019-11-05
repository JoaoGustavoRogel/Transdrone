<?php
	//Inicia sessão
	session_start();
	
	//Recebendo dados
	$usuario = $_POST['usuario'];
	$senha = md5($_POST['senha']);
	
	//Conectando com o BD
	include_once ("../banco/conexao.php");
	
	//Query de consulta
	$query = "SELECT * FROM empresa WHERE cnpj = ? AND senhaEmpresa = ?";
	$stm = $db -> prepare($query);
	$stm -> bindParam(1, $usuario);
	$stm -> bindParam(2, $senha);
	$stm -> execute();
	
	//Executando
	if ($stm -> fetch()) {
		//Login OK
		$_SESSION['user'] = $usuario;
		header("location:../empresa/perfil.php");
	}
	else {
		//Login errado
		header("location:../erro.html");
	}
?>