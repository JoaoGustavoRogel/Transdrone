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
						<li><a href="../drone/acessoadm.php">DRONE</a></li>
						<li><a href="../destino/acessoadm.php">ENTREGA</a></li>
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
					<h1 class="t">Cadastro</h1>
				</div>
				<form method="post" action="salva.php">
					<input class="campo2" placeholder="CNPJ" name="cnpjEmpresa" id="cnpj" maxlength="14"/><img src="" id="icnpj"/><br>
					<input class="campo2" placeholder="Peso" name="pesoCarga" id="peso" onblur="validaCarga(1)"/><img src="" id="ipeso"/><br>
					<input class="campo2" placeholder="Altura" name="alturaCarga" id="altura" onblur="validaCarga(2)"/><img src="" id="ialtura"/><br>
					<input class="campo2" placeholder="Largura" name="larguraCarga" id="largura" onblur="validaCarga(3)"/><img src="" id="ilargura"/><br>
					<input class="campo2" placeholder="Profundidade" name="profundidadeCarga" id="profundidade" onblur="validaCarga(4)"/><img src="" id="iprofundidade"/><br>
					<input class="campo2" placeholder="Nome" name="nomeCarga" id="nome" onblur="validaCarga(5)"/><img src="" id="inome"/><br>
					<input name="cont" type="hidden" value="2"/>
					<label id="labelSele">Carga de risco?</label><br>
					<select name="riscoCarga" id="sele">
						<option>Sim</option>
						<option>Não</option>
					</select><br><br>
					<button type="submit" id="botao" class="botaolu" onmouseover="validaCarga(50)">Cadastrar</button>
				</form>
					
						<div class="title">
							<br>
							<h1 class="t">Listagem</h1>
						</div>
						<!-- Listagem -->
						
						<form method="post" action="acessoadm.php">
							<input placeholder="Nome" name="nome" class="campo"/>
							<button type="submit" id="botao">
								Pesquisar
							</button>
						</form>
						<br>

						<?php
			$nome = "";
			if (isset($_POST['nome'])) {
				$nome = $_POST['nome'];
			}
		
			include("../banco/conexao.php");

			//Query de listagem
			$query = "SELECT * FROM carga WHERE nomeCarga LIKE '%$nome%'";
			$stm = $db -> prepare($query);
					
			if ($stm -> execute()) {
				print "<table id='tabela'>
						<tr>
							<th>ID</th>
							<th>Nome</th>
							<th>Peso</th>
							<th>Altura</th>
							<th>Largura</th>
							<th>Profundidade</th>
							<th>Risco</th>
							<th>CNPJ</th>
							<th>Ações</th>
						</tr>";
						$x = 0;
				while ($row = $stm -> fetch()) {
					$x++;
					$idCarga = $row['idCarga'];
					$nomeCarga = $row['nomeCarga'];
					$pesoCarga = $row['pesoCarga'];
					$alturaCarga = $row['alturaCarga'];
					$larguraCarga = $row['larguraCarga'];
					$profundidadeCarga = $row['profundidadeCarga'];
					$riscoCarga = $row['riscoCarga'];
					$cnpjEmpresa = $row['cnpjEmpresa'];
					
					print "
					
							<tr>
								<td><input class='line' id='idCarga$x' value='$idCarga' disabled/></td>							
								<td><input class='line' id='nomeCarga$x' value='$nomeCarga' disabled/></td>
								<td><input class='line' id='pesoCarga$x' value='$pesoCarga' disabled/></td>
								<td><input class='line' id='alturaCarga$x' value='$alturaCarga' disabled/></td>
								<td><input class='line' id='larguraCarga$x' value='$larguraCarga' disabled/></td>
								<td><input class='line' id='profundidadeCarga$x' value='$profundidadeCarga' disabled/></td>
								<td><input class='line' id='riscoCarga$x' value='$riscoCarga' disabled/></td>
								<td><input class='line' id='cnpjEmpresa$x' value='$cnpjEmpresa' disabled/></td>
							<td>
								<a href='deleta.php?idCarga=$idCarga&cont=1'>Excluir | </a>
								<button id='bt$x' type='submit' onclick='atualiza($x)'>Editar</button>	 
								<button id='bt2$x' type='button' style='display: none' onclick='submete($x)'>Atualizar</button>								
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
			<input id='xidCarga' name="idCarga" type="hidden"/>
			<input id='xnomeCarga' name="nomeCarga" type='hidden'/>
			<input id='xpesoCarga' name="pesoCarga" type='hidden'/>
			<input id='xalturaCarga'   name="alturaCarga" type='hidden'/>
			<input id='xlarguraCarga' name="larguraCarga" type='hidden'/>
			<input id='xprofundidadeCarga' name="profundidadeCarga" type='hidden'/>
			<input id='xriscoCarga' name="riscoCarga" type='hidden'/>
			<input id='xcnpjEmpresa' name="cnpjEmpresa" type='hidden'/>
	    </form>
		<script>
			function atualiza(x) {
				document.getElementById("idCarga"+x).disabled = false;
				document.getElementById("nomeCarga"+x).disabled = false;
				document.getElementById("pesoCarga"+x).disabled = false;
				document.getElementById("alturaCarga"+x).disabled = false;
				document.getElementById("larguraCarga"+x).disabled = false;
				document.getElementById("profundidadeCarga"+x).disabled = false;
				document.getElementById("riscoCarga"+x).disabled = false;
				document.getElementById("cnpjEmpresa"+x).disabled = false;
				
				document.getElementById("bt" + x).style.display = "none";
				document.getElementById("bt2" + x).style.display = "block";
			}
			
			function submete(x){
				document.getElementById("xidCarga").value = document.getElementById("idCarga"+x).value;;
				document.getElementById("xnomeCarga").value = document.getElementById("nomeCarga"+x).value;
				document.getElementById("xpesoCarga").value = document.getElementById("pesoCarga"+x).value;
				document.getElementById("xalturaCarga").value = document.getElementById("alturaCarga"+x).value;
				document.getElementById("xlarguraCarga").value = document.getElementById("larguraCarga"+x).value;
				document.getElementById("xprofundidadeCarga").value = document.getElementById("profundidadeCarga"+x).value;
				document.getElementById("xriscoCarga").value = document.getElementById("riscoCarga"+x).value;
				document.getElementById("xcnpjEmpresa").value = document.getElementById("cnpjEmpresa"+x).value;
				
				document.getElementById('xform').submit();
			}
		</script>
</html>
