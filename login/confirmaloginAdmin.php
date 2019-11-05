<?php
	//Inicia Sessão
	session_start();
	$_SESSION = array();
	
	//Recebendo Dados
	$usuario = $_POST['usuario'];
	$senha = md5($_POST['senha']);
	
	//Conectando com o BD
	//include_once ("../banco/conexao.php");
	
	if ($usuario == "admin" && $senha == md5("admin")) {
		//Login OK
		$_SESSION['user'] = $usuario;
		header("location:../adm/index.php");
	}
	else {
		//Login errado
		print "Falha ao logar!";
	}
?>