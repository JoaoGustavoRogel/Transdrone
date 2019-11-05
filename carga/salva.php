<?php
	//Recebendo dados por formulário
	$pesoCarga = $_POST['pesoCarga'];
	$alturaCarga = $_POST['alturaCarga'];
	$larguraCarga = $_POST['larguraCarga'];
	$profundidadeCarga = $_POST['profundidadeCarga'];
	$riscoCarga = $_POST['riscoCarga'];
	$cnpjEmpresa = $_POST['cnpjEmpresa'];
	$nomeCarga = $_POST['nomeCarga'];
	$cont = $_POST['cont'];
	if ($riscoCarga == "Sim") {
		$riscoCarga = "1";
	}
	else if ($riscoCarga == "Não") {
		$riscoCarga = "0";
	}
	
	//Conectando com o banco
	include_once "../banco/conexao.php";
	
	//Query de inserção
	$query = "INSERT INTO carga(
				pesoCarga,
				alturaCarga,
				larguraCarga,
				profundidadeCarga,
				riscoCarga, 
				cnpjEmpresa,
				nomeCarga
			  ) VALUES (?,?,?,?,?,?,?)";
			  
	$stm = $db -> prepare($query);
	$stm -> bindParam(1, $pesoCarga);
	$stm -> bindParam(2, $alturaCarga);
	$stm -> bindParam(3, $larguraCarga);
	$stm -> bindParam(4, $profundidadeCarga);
	$stm -> bindParam(5, $riscoCarga);
	$stm -> bindParam(6, $cnpjEmpresa);
	$stm -> bindParam(7, $nomeCarga);
	
	if ($stm -> execute()) {
		if ($cont == 1) {
			header("location:../empresa/perfil.php");
		}
		else {
			header("location:acessoadm.php");	
		}
		print ("<script>alert('Sucesso ao cadastrar!')</script>");
	}
	else {
		print "<p>Erro ao cadastrar carga!</p>";
		print "<a href='index.php'>Voltar</a>";
	}
?>