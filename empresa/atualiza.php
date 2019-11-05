<?php
	//Recebendo dados do formulário
	$cnpj = $_POST['cnpj'];
	$nomeFantasia = $_POST['nomeFantasia'];
	$enderecoEmpresa = $_POST['enderecoEmpresa'];
	$cidadeEmpresa = $_POST['cidadeEmpresa'];
	$telefoneEmpresa = $_POST['telefoneEmpresa'];
	$representanteEmpresa = $_POST['representanteEmpresa'];
	$categoriaEmpresa = $_POST['categoriaEmpresa'];
	$razaoSocial = $_POST['razaoSocial'];
	$cont = $_POST['cont'];
	//$senha = md5($_POST['senhaEmpresa']);
	
	//Conexão com o BD
	include_once "../banco/conexao.php";
	
	//Query de atualização
	$query = "UPDATE empresa SET 
					 nomeFantasia = ?, 
					 enderecoEmpresa = ?, 
					 cidadeEmpresa = ?, 
					 telefoneEmpresa = ?, 
					 representanteEmpresa = ?, 
					 categoriaEmpresa = ?, 
					 razaoSocial = ?
			WHERE cnpj = ?";
			
	$stm = $db -> prepare($query);
	$stm -> bindParam (1, $nomeFantasia);
	$stm -> bindParam (2, $enderecoEmpresa);
	$stm -> bindParam (3, $cidadeEmpresa);
	$stm -> bindParam (4, $telefoneEmpresa);
	$stm -> bindParam (5, $representanteEmpresa);
	$stm -> bindParam (6, $categoriaEmpresa);
	$stm -> bindParam (7, $razaoSocial);
//	$stm -> bindParam (8, $senha);
	$stm -> bindParam (8, $cnpj);
	
	if ($stm -> execute()) {
		if ($cont == 1) {
			header("location:perfil.php");
		}
		else {
			header("location:acessoadm.php");
		}
	}
	else {
		print "<p>Erro ao editar empresa!</p>";
		print "<a href='../drone/empresa/acessoadm.php'>Voltar</a>";
	}
	
?>