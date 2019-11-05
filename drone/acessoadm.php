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
			<form action="salva.php" method="post" enctype="multipart/form-data">
				<input class="campo2" placeholder="Modelo" onblur="validarDrone(1)" name="modeloDrone" id="modelo"/>
				<img src="" id="imodelo"/>
				<br>
				<input class="campo2" placeholder="Peso" onblur="validarDrone(2)" name= "pesoDrone" id="peso"/>
				<label><font color="gray">Kg</font></label><img src="" id="ipeso"/>
				<br>
				<input class="campo2" placeholder="Altura" onblur="validarDrone(3)" name="alturaDrone" id="altura"/>
				<label><font color="gray">Centímetros</font></label><img src="" id="ialtura"/>
				<br>
				<input class="campo2" placeholder= "Largura" onblur="validarDrone(4)" name="larguraDrone" id="largura"/>
				<label><font color="gray">Centímetros</font></label><img src="" id="ilargura"/>
				<br>
				<input class="campo2" placeholder= "Preço" onblur="validarDrone(5)" name="precoDrone" id="preco"/>
				<label><font color="gray">Reais</font></label><img src="" id="preco"/>
				<br>
				<input class="campo2" placeholder="URL Foto" name="fotoDrone"/>
				<br><br>
				<button type="submit" id='botao' class="botaolu" onmouseover="validarDrone(50)">
					Cadastrar
				</button>
			</form>

			<form method="post" action="acessoadm.php">
				<input placeholder="Modelo" name="modelo" class="campo"/>
				<button type="submit" id="botao">
					Pesquisar
				</button>
			</form>
			<br>

			<?php
			$modelo = "";
			if (isset($_POST['modelo'])) {
				$modelo = $_POST['modelo'];
			}

			include("../banco/conexao.php");

			//Query de listagem
			$query = "SELECT * FROM drone WHERE modeloDrone LIKE '%$modelo%'";
			$stm = $db -> prepare($query);

			if ($stm -> execute()) {
				print "<table id='tabela'>
							<tr>
								<th>ID</th>
								<th>Modelo</th>
								<th>Largura</th>
								<th>Peso</th>
								<th>Altura</th>
								<th>Preço</th>
								<th>Disponibilidade</th>
								<th>Ações</th>
							</tr>";
				$x = 0;
				while ($row = $stm -> fetch()) {
					$x++;
					$idDrone = $row['idDrone'];
					$modeloDrone = $row['modeloDrone'];
					$larguraDrone = $row['larguraDrone'];
					$pesoDrone = $row['pesoDrone'];
					$alturaDrone = $row['alturaDrone'];
					$precoDrone = $row['precoDrone'];
					$disponibilidadeDrone = $row['disponibilidadeDrone'];

					print "

							<tr>
								<td><input class='line' id='id$x' value='$idDrone' disabled/></td>
								<td><input class='line' id='modelo$x' value='$modeloDrone' disabled/></td>
								<td><input class='line' id='largura$x' value='$larguraDrone' disabled/></td>
								<td><input class='line' id='peso$x' value='$pesoDrone' disabled/></td>
								<td><input class='line' id='altura$x' value='$alturaDrone' disabled/></td>
								<td><input class='line' id='preco$x' value='$precoDrone' disabled/></td>
								<td><input class='line' id='disponibilidade$x' value='$disponibilidadeDrone' disabled/></td>
								<td>
								<a href='deleta.php?idDrone=$idDrone'>Excluir</a>
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
			<form id='xform' method='post' action="atualiza.php">
				<input id='xid' name="idDrone" type="hidden"/>
				<input id='xmodelo' name="modeloDrone" type='hidden'/>
				<input id='xlargura' name="larguraDrone" type='hidden'/>
				<input id='xpeso'   name="pesoDrone" type='hidden'/>
				<input id='xaltura' name="alturaDrone" type='hidden'/>
				<input id='xpreco' name="precoDrone" type='hidden'/>
				<input id='xdisponibilidade' name="disponibilidadeDrone" type='hidden'/>
			</form>
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
			document.getElementById("modelo" + x).disabled = false;
			document.getElementById("largura" + x).disabled = false;
			document.getElementById("peso" + x).disabled = false;
			document.getElementById("altura" + x).disabled = false;
			document.getElementById("preco" + x).disabled = false;
			document.getElementById("disponibilidade" + x).disabled = false;

			document.getElementById("bt" + x).style.display = "none";
			document.getElementById("bt2" + x).style.display = "block";
		}

		function submete(x) {
			/*alert('x -> ' + x);
			alert('modelo -> ' + document.getElementById("modelo" + x).value);
			alert('largura -> ' + document.getElementById("largura" + x).value);
			alert('peso -> ' + document.getElementById("peso" + x).value);*/
			document.getElementById("xid").value = document.getElementById("id" + x).value;
			document.getElementById("xmodelo").value = document.getElementById("modelo" + x).value;
			document.getElementById("xlargura").value = document.getElementById("largura" + x).value;
			document.getElementById("xpeso").value = document.getElementById("peso" + x).value;
			document.getElementById("xaltura").value = document.getElementById("altura" + x).value;
			document.getElementById("xpreco").value = document.getElementById("preco" + x).value;
			document.getElementById("xdisponibilidade").value = document.getElementById("disponibilidade" + x).value;
			
			document.getElementById('xform').submit();
		}
	</script>
</html>
