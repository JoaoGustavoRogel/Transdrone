<?php
	include ("../login/verifica.php");
	include ("../login/preencherSessao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<link rel="icon" type="../image/png" href="../images/drone (1).png" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>TRANSDRONE</title>
		<link href="../css/styles.css" rel="stylesheet" type="text/css" />
		<script src="popUp.js"></script>
		<script src="edita.js"></script>
		<style>
			.h1Perfil {
				color: #90EE90;
			}
			#cadastro {
				margin-left: 23%;
				margin-right: auto;
			}
			#carga {
				float: right;
				margin-top: -44.5%;
				margin-right: auto;
				color: #a0b1c7;
			}
			#entrega {
				float: right;
				padding-top: 10%;
			}
			#nc {
				font-size: 20px;
				color: white;
			}
			.inpu {
			/*	background: none;*/
				background-color: #2c3847;
				border: none;				
				/*border-radius: 10px;*/
				color: #a0b1c7;
				font-weight: bold;
				padding: 4.5px;
			}
			.lb {
				font-weight: bold;
				color: white;
				display: inline-block;
				width: 100px;
			}
			#tableTH {
				color: white;
			}
			#tableEntregas td, #tableEntregas th {
				color: #a0b1c7;
				
				
				padding: 5px;
			}
			
			#tableEntregas {
				border-collapse: collapse;
				border-color: white;
			}
			
		</style>
	</head>
<body>
<div class="menu-wrapper">
  <div class="menu">
    <ul>
      <li><a href="../index.html">INÍCIO</a></li>
      <li><a href="../sobrenos.html">SOBRE NÓS</a></li>
      <li><a href="../cadastro.html">CADASTRO</a></li>
      <li><a href="../drones.html">DRONES</a></li>
      <li><a href="../contato.html">CONTATO</a></li>
    </ul>
  </div>
  <div class='logar'>
		<a href="../login/logout.php"><button id='botoes' type="button" class="button">Deslogar</button></a>
  </div>
</div>
<!--- menu-wrapper div end -->
<div class="clearing"></div>
<div class="border-bottom"></div>
<div class="logo-wrapper">
  <div class="leftshadow"><img src="../images/logo-wrap-left.jpg" /></div>
  <div class="logo">
    <img src="../images/LogoOficial.png" />
  </div>
  <div class="rightshadow"><img src="../images/logo-wrap-right.jpg" /></div>
</div>
<div class="clearing"></div>
<!--- banner wrapper div end -->
<div class="container">
  <div class="panel-wrapper">
      <div class='oicontent'>

      <div class="content">
      	<div id="cadastro">
      <div class="title">
        <h1 class="h1Perfil">Seu cadastro</h1>
      </div>
      	<form action="atualiza.php" method="post" id="formu">
      		<input type="hidden" value="1" name="cont"/>
	      	<?php
	      		$cnpj = $_SESSION['user'];
				$nomeFantasia = $_SESSION['nomeFantasia'];
				$telefone = $_SESSION['telefoneEmpresa'];
				$representante = $_SESSION['representanteEmpresa'];
				$categoria = $_SESSION['categoriaEmpresa'];
				$razaoSocial = $_SESSION['razaoSocial'];
				$endereco = $_SESSION['enderecoEmpresa'];
				$cidade = $_SESSION['cidadeEmpresa'];
				print "
					<label  class='lb'>CNPJ: </label>			<input id='cnpj' 			class='inpu' value='$cnpj' 			readonly='readonly'	 name='cnpj'/>							<br>
					<label  class='lb'>Nome fantasia: </label>	<input id='nomeFantasia' 	class='inpu' value='$nomeFantasia' 	disabled name='nomeFantasia'/>					<br>
					<label  class='lb'>Endereço: </label>		<input id='endereco' 		class='inpu' value='$endereco' 		disabled name='enderecoEmpresa'/>				<br>
					<label  class='lb'>Cidade: </label>			<input id='cidade' 			class='inpu' value='$cidade' 		disabled name='cidadeEmpresa'/>					<br>
					<label  class='lb'>Telefone: </label>		<input id='telefone' 		class='inpu' value='$telefone' 		disabled name='telefoneEmpresa'/>				<br>
					<label  class='lb'>Representante: </label>	<input id='representante' 	class='inpu' value='$representante' disabled name='representanteEmpresa'/>			<br>
					<label  class='lb'>Categoria: </label>		<input id='categoria'	 	class='inpu' value='$categoria' 	disabled name='categoriaEmpresa'/>				<br>
					<label  class='lb'>Razão social: </label>	<input id='razaoSocial' 	class='inpu' value='$razaoSocial' 	disabled name='razaoSocial'/>				<br><br>
					";			
			?>

		</form>
		<button type="button" id="bt" class="button" onclick="edita1()">Editar Dados</button>
		<button type="button" id="bt1" class="button" onclick="edita2()">Atualizar Dados</button>
		</div>
      </div>
            <div id="carga">
      	<h1 class="h1Perfil">Suas Encomendas</h1><br>

      	<?php
      		//Listando cargas
      		//Conectando com o BD
      		include ("../banco/conexao.php");
      		//Pegando ID
      		$cnpj = $_SESSION['user'];
			
			//CRIANDO QUERY
			$query = "SELECT * FROM carga WHERE cnpjEmpresa = ?";
			$stm = $db -> prepare($query);
			$stm -> bindParam(1, $cnpj);
			 
			 //Executando 
			 if ($stm -> execute()) {
			 	while ($row = $stm -> fetch()) {
			 		$nome = $row['nomeCarga'];
			 		$idCarga = $row['idCarga'];
					print "<p id='nc'>$nome</p> <a href='../destino/index.php?idCarga=$idCarga'>Entregar</a> <a href='' onclick='abrir2($idCarga, $cnpj)'>Editar</a> <a href='../carga/deleta.php?idCarga=$idCarga&cont=2'>Excluir</a> <a href='' onclick='abrir($idCarga)'>Exibir</a><br>";
			 	}
			 }
			 else {
			 	echo "Erro ao listar suas cargas contate o administrador!";
			 }

			
      	?>
      	<br>  
      	<a href="../carga/index.php?cont=1"><button id="botes" class="button">Cadastrar Carga</button></a>
      </div>
      <center>
      <div id="entrega">
      	<h1 class="h1Perfil">Suas Entregas</h1><br>
	      	<?php
		      	include ("../banco/conexao.php");
		      	$ids = array();
		      	$nomes = array();
		      	$cont = 0;
		      	$enderecoDestino = "";
		      	$statusDestino = "";
		      	//Criando QUERY
				$query = "SELECT * FROM carga WHERE cnpjEmpresa = ?";
				$stm = $db -> prepare($query);
				$stm -> bindParam(1, $cnpj);
				
				//Executando
				if ($stm -> execute()) {
					while($row = $stm -> fetch()) {
						$ids[$cont] = $row['idCarga'];
						$nomes[$cont] = $row['nomeCarga'];
						$cont++;
					}
				}
								
				echo "		<table id='tableEntregas' border='1px'>
      							<tr id='tableTH'>
      								<th>Encomenda</th>
      								<th>Endereço</th>
      								<th>Situação</th>
      							</tr>";
				for ($cont = 0; $cont < count($ids); $cont++) {
					$query = "SELECT * FROM destino WHERE idCarga = ?";
					$stm = $db -> prepare($query);
					$stm -> bindParam(1, $ids[$cont]);
					
					if ($stm -> execute()) {
						while($row = $stm -> fetch()) {
							$enderecoDestino = $row['enderecoDestino'];
							$statusDestino = $row['statusDestino'];  
							if ($statusDestino == 0) {
								echo "
									<tr>
										<td>$nomes[$cont]</td>
										<td>$enderecoDestino</td>
										<td>Não entregue</td>
									</tr>
								";
							}
							else if($statusDestino == 1) {
								echo "
									<tr>
										<td>$nomes[$cont]</td>
										<td>$enderecoDestino</td>
										<td>Entregue</td>
									</tr>
								";
							}

						}
					}
				}
				echo "</table>"
	      	?>
      </div>
</center>
  </div>
    </div>
    <div class="clearing"></div>
  </div>
  <!--- panel wrapper div end -->
</div>
<!--- container div end -->
<div class="clearing"></div>
<div class="footer-wrapper">
  <div class="footer">
    <p> © 2016 All Rights Reserved.</p>
  </div>
</div>
</body>
</html>