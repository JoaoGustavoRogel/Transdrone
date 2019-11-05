<?php
	//Recebendo dados por formulário
	$cnpj = $_POST['cnpj'];
	$nomeFantasia = $_POST['nomeFantasia'];
	$enderecoEmpresa = $_POST['enderecoEmpresa'];
	$cidadeEmpresa = $_POST['cidadeEmpresa'];
	$telefoneEmpresa = $_POST['telefoneEmpresa'];
	$representanteEmpresa = $_POST['representanteEmpresa'];
	$categoriaEmpresa = $_POST['categoriaEmpresa'];
	$razaoSocial = $_POST['razaoSocial'];
	$senha = md5($_POST['senhaEmpresa']);
	
	//Conectando com o banco
	include_once "../banco/conexao.php";
	
	//Query de inserção
	$query = "INSERT INTO empresa(
				cnpj,
				nomeFantasia,
				enderecoEmpresa,
				cidadeEmpresa,
				telefoneEmpresa,
				representanteEmpresa,
				categoriaEmpresa,
				razaoSocial,
				senhaEmpresa
			  ) VALUES (?,?,?,?,?,?,?,?,?)";
			  
	$stm = $db -> prepare($query);
	$stm -> bindParam(1, $cnpj);
	$stm -> bindParam(2, $nomeFantasia);
	$stm -> bindParam(3, $enderecoEmpresa);
	$stm -> bindParam(4, $cidadeEmpresa);
	$stm -> bindParam(5, $telefoneEmpresa);
	$stm -> bindParam(6, $representanteEmpresa);
	$stm -> bindParam(7, $categoriaEmpresa);
	$stm -> bindParam(8, $razaoSocial);
	$stm -> bindParam(9, $senha);
	
	if ($stm -> execute()) {
		print ("<script>
			alert('Sucesso ao cadastrar!');
			window.location.href = '../login/login.html';
		</script>");
	}
	else {
		header("location:../erro.html");
	}
?>