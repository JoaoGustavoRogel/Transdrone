<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<link rel="icon" type="../image/png" href="images/drone (1).png" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>TRANSDRONE</title>
		<link href="../css/styles.css" rel="stylesheet" type="text/css" />
		<script src="validar.js"></script>
		<style>
			#tabela {
				margin-left: auto;
				margin-right: auto;
				color: #838d9d;
				border: solid 1px;
			}
			.campo {
				height: 20px;
				width: 250px;
				margin-left: 6%;
				padding: 5px;
			}
			.campo2 {
				height: 20px;
				width: 250px;
				margin-left: 42%;
				padding: 12px;
			}
			#botao {
				display: inline-block;
				background-color: #ccc;
				color: #444;
				padding: 10px 20px;
				text-decoration: none;
				box-sizing: border-box;
				font-family: Helvetica, Arial, sans-serif;
				font-size: 14px;
				border: 0px;
				border-radius: 4px;
			}
			#botao:hover {
				background-image: linear-gradient(to bottom, transparent, rgba(0,0,0,.15));
				cursor: pointer;
				border-radius: 4px;
			}
			.t {
				margin-left: 6.4%;
			}
			.line {
				background-color: white;
				border-radius: 3px;
			}
			.btx {
				border-radius: 2px;
			}
			#sele {
				margin-left: 41.9%;
				height: 30px;
				width: 80px;
			}
			#labelSele {
				margin-left: 41.9%;
				color: #838d9d;
			}
			.botaolu {
				margin-left: 41.9%;
			}
			#btEntrega {
				
			}
		</style>
	</head>
		<body>
			<div class="menu-wrapper">
				<div class="menu">
					<ul>
						<li>
							<a href="../index.html">INÍCIO</a>
						</li>
						<li>
							<a href="../empresa/acessoadm.php">EMPRESA</a>
						</li>
						<li>
							<a href="../carga/acessoadm.php">ENCOMENDA</a>
						</li>
						<li>
							<a href="../destino/acessoadm.php">ENTREGA</a>
						</li>
						<li>
							<a href="../drone/acessoadm.php">DRONE</a>
						</li>
					</ul>
				</div>
				<div class='logar'>
					<input id='botoes' type="button" class="button" value="LOGAR" />
				</div>
			</div>
			<!--- menu-wrapper div end -->
			<div class="clearing"></div>
			<div class="border-bottom"></div>
			<div class="logo-wrapper">
				<div class="leftshadow"><img src="../images/logo-wrap-left.jpg" />
				</div>
				<div class="logo">
					<img src="../images/LogoOficial.png" />
				</div>
				<div class="rightshadow"><img src="../images/logo-wrap-right.jpg" />
				</div>
			</div>
			<div class="clearing"></div>
			<!--- banner wrapper div end -->
			<div class="container">					
						<div class="title">
							<br>
							<h1 class="t">Listagem</h1>
						</div>
						<!-- Listagem -->
						
						<form method="post" action="acessoadm.php">
							<input placeholder="ID Entrega" name="idDestino" class="campo"/>
							<button type="submit" id="botao">
								Pesquisar
							</button>
						</form>
						<br>

			<?php
			$statusDestinoNominal;	
			$idDestino = "";
			if (isset($_POST['idDestino'])) {
				$idDestino = $_POST['idDestino'];
			}
		
			include("../banco/conexao.php");	

			//Query de listagem
			$query = "SELECT * FROM destino WHERE idDestino LIKE '%$idDestino%'";
			$stm = $db -> prepare($query);
					
			if ($stm -> execute()) {
				print "<table id='tabela'>
						<tr>
							<th>ID</th>
							<th>Endereço</th>
							<th>Status</th>
							<th>ID Entrega</th>
							<th>ID Drone</th>
						</tr>";
						$x = 0;
				while ($row = $stm -> fetch()) {
					$x++;
					$idDestino2 = $row['idDestino'];
					$enderecoDestino = $row['enderecoDestino'];
					$statusDestino = $row['statusDestino'];
					$idCarga = $row['idCarga'];
					$idDrone = $row['idDrone'];
					if ($statusDestino == 0) {
						$statusDestinoNominal = "Não entregue";
					}
					else if ($statusDestino == 1) {
						$statusDestinoNominal = "Entregado";
					}
					print "
					
							<tr>
								<td><input class='line' id='idDestino$x' value='$idDestino2' disabled/></td>							
								<td><input class='line' id='enderecoDestino$x' value='$enderecoDestino' disabled/></td>
								<td><input class='line' id='statusDestino$x' value='$statusDestinoNominal' disabled/></td>
								<td><input class='line' id='idCarga$x' value='$idCarga' disabled/></td>
								<td><input class='line' id='idDrone$x' value='$idDrone' disabled/></td>
							<td>
								<a href='deleta.php?idCarga=$idCarga&cont=1'>Excluir | </a>
								<button id='bt$x' type='submit' onclick='atualiza($x)'>Editar</button>	 
								<button id='bt2$x' type='button' style='display: none' onclick='submete($x)'>Atualizar</button>";
					if ($statusDestino == 0) {
						print "	<form action='atualizastatus.php' method='post'>
									<input type='hidden' name='idDestino' value='$idDestino2'/>
									<button id='btEntrega'>Entregue</button>
								</form>";
					}
					else if($statusDestino == 1) {
						print "	<form action='atualizastatus.php' method='post'>
									<input type='hidden' name='idDestino' value='$idDestino2'/>
									<button id='btEntrega' disabled>Entregue</button>
								</form>";
					}
					
				print "														
							<td>
						  <tr/>
						  </form>";
				}
				print "</table>";
			}
			else {
				print "Erro ao listar!";
			}
		?>
		<form id='xform' method='post' action='atualiza.php'>
			<input id='xidDestino' name="idDestino" type="hidden"/>
			<input id='xenderecoDestino' name="enderecoDestino" type='hidden'/>
			<input id='xstatusDestino' name="statusDestino" type='hidden'/>
			<input id='xidCarga'   name="idCarga" type='hidden'/>
			<input id='xidDrone' name="idDrone" type='hidden'/>
	    </form>
		<script>
			function atualiza(x) {
				document.getElementById("idDestino"+x).disabled = false;
				document.getElementById("enderecoDestino"+x).disabled = false;
				//document.getElementById("statusDestino"+x).disabled = false;
				document.getElementById("idCarga"+x).disabled = false;
				document.getElementById("idDrone"+x).disabled = false;
				
				document.getElementById("bt" + x).style.display = "none";
				document.getElementById("bt2" + x).style.display = "block";
			}
			
			function submete(x){
				document.getElementById("xidDestino").value = document.getElementById("idDestino"+x).value;;
				document.getElementById("xenderecoDestino").value = document.getElementById("enderecoDestino"+x).value;
				//document.getElementById("xstatusDestino").value = document.getElementById("statusDestino"+x).value;
				document.getElementById("xidCarga").value = document.getElementById("idCarga"+x).value;
				document.getElementById("xidDrone").value = document.getElementById("idDrone"+x).value;
				
				document.getElementById('xform').submit();
			}
		</script>
</html>
