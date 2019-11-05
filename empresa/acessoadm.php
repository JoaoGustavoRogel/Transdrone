<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<link rel="icon" type="../image/png" href="images/drone (1).png" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>TRANSDRONE</title>
		<link href="../css/styles.css" rel="stylesheet" type="text/css" />
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
							<h1 class="t">Listagem</h1>
						</div>
						<!-- Listagem -->
						
						<form method="post" action="acessoadm.php">
							<input placeholder="CNPJ" name="cnpj" class="campo"/>
							<button type="submit" id="botao">
								Pesquisar
							</button>
						</form>
						<br>

						<?php
						$cnpj = "";
						if (isset($_POST['cnpj'])) {
							$cnpj = $_POST['cnpj'];
						}

						include("../banco/conexao.php");

						//Query de listagem
						$query = "SELECT * FROM empresa WHERE cnpj LIKE '%$cnpj%'";
						$stm = $db -> prepare($query);

						if ($stm -> execute()) {
							print "<table id='tabela'>
						<tr>
							<th>CNPJ</th>
							<th>Nome Fantasia</th>
							<th>Endereço</th>
							<th>Cidade</th>
							<th>Telefone</th>
							<th>Representante</th>
							<th>Categoria</th>
							<th>Razão Social</th>
							<th>Ações</th>
						</tr>";
							$x = 0;
							while ($row = $stm -> fetch()) {
								$x++;
								$cnpj = $row['cnpj'];
								$nomeFantasia = $row['nomeFantasia'];
								$enderecoEmpresa = $row['enderecoEmpresa'];
								$cidadeEmpresa = $row['cidadeEmpresa'];
								$telefoneEmpresa = $row['telefoneEmpresa'];
								$representanteEmpresa = $row['representanteEmpresa'];
								$categoriaEmpresa = $row['categoriaEmpresa'];
								$razaoSocial = $row['razaoSocial'];

								print "
					
							<tr>
								<td><input class='line' id='cnpj$x' value='$cnpj' disabled/></td>							
								<td><input class='line' id='fantasia$x' value='$nomeFantasia' disabled/></td>
								<td><input class='line' id='endereco$x' value='$enderecoEmpresa' disabled/></td>
								<td><input class='line' id='cidade$x' value='$cidadeEmpresa' disabled/></td>
								<td><input class='line' id='telefone$x' value='$telefoneEmpresa' disabled/></td>
								<td><input class='line' id='representante$x' value='$representanteEmpresa' disabled/></td>
								<td><input class='line' id='categoria$x' value='$categoriaEmpresa' disabled/></td>
								<td><input class='line' id='razao$x' value='$razaoSocial' disabled/></td>
							<td>
								<a href='deleta.php?cnpj=$cnpj'>Excluir </a>
								<button id='bt$x'  class='btx' type='submit' onclick='atualiza($x)'>Editar</button>	 
								<button id='bt2$x' class='btx' type='button' style='display: none' onclick='submete($x)'>Atualizar</button>								
							<td>
						  <tr/>
						  </form>";
							}
							print "</table>";
						} else {
							print "Erro ao listar!";
						}
						?>
						<form id='xform' method='post' action='atualiza.php'>
							<input id='xcnpj' name="cnpj" type="hidden"/>
							<input id='xfantasia' name="nomeFantasia" type='hidden'/>
							<input id='xendereco' name="enderecoEmpresa" type='hidden'/>
							<input id='xcidade'   name="cidadeEmpresa" type='hidden'/>
							<input id='xtelefone' name="telefoneEmpresa" type='hidden'/>
							<input id='xrepresentante' name="representanteEmpresa" type='hidden'/>
							<input id='xcategoria' name="categoriaEmpresa" type='hidden'/>
							<input id='xrazao' name="razaoSocial" type='hidden'/>
						</form>
					
					<!--- panel wrapper div end -->
			
				<!--- container div end -->
				<div class="clearing"></div>
				<div class="footer-wrapper">
					<div class="footer">
						<p>
							© 2012 All Rights Reserved.<a href="http://www.alltemplates.com"> </a> Images From: <a href="http://photorack.net">www.photorack.net</a>
						</p>
					</div>
				</div>
		</body>
		<script>
			function atualiza(x) {
				document.getElementById("fantasia" + x).disabled = false;
				document.getElementById("endereco" + x).disabled = false;
				document.getElementById("cidade" + x).disabled = false;
				document.getElementById("telefone" + x).disabled = false;
				document.getElementById("representante" + x).disabled = false;
				document.getElementById("categoria" + x).disabled = false;
				document.getElementById("razao" + x).disabled = false;

				document.getElementById("bt" + x).style.display = "none";
				document.getElementById("bt2" + x).style.display = "block";
			}

			function submete(x) {
				document.getElementById("xcnpj").value = document.getElementById("cnpj" + x).value;
				document.getElementById("xfantasia").value = document.getElementById("fantasia" + x).value;
				document.getElementById("xendereco").value = document.getElementById("endereco" + x).value;
				document.getElementById("xcidade").value = document.getElementById("cidade" + x).value;
				document.getElementById("xtelefone").value = document.getElementById("telefone" + x).value;
				document.getElementById("xrepresentante").value = document.getElementById("representante" + x).value;
				document.getElementById("xcategoria").value = document.getElementById("categoria" + x).value;
				document.getElementById("xrazao").value = document.getElementById("razao" + x).value;

				document.getElementById('xform').submit();
			}
		</script>
</html>
