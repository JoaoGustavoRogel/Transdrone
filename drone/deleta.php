 <?php
 	//Recebendo Dados do Drone
	$idDrone = $_GET['idDrone'];
	
 	//Conectando com o BD
 	include_once ("../banco/conexao.php");
	
	//Criando Query de exclusão
	$query = "DELETE FROM drone WHERE iddrone = ?";
	
	$stm = $db -> prepare($query);
	$stm -> bindParam (1, $idDrone);
	
	//Executado a query
	if ($stm -> execute()) {
		print "<script>location.href='acessoadm.php';</script>";
	}
	else {
		print "Erro ao deletar drone";
	}
 ?>