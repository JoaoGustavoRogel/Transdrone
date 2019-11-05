<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<link rel="icon" type="image/png" href="images/drone (1).png" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>TRANSDRONE</title>
		<link href="../css/styles.css" rel="stylesheet" type="text/css" />
		<style>
			label {
				color: white;
				margin-left: 10%;
			}
		</style>
	</head>
	<body>
		<!--- menu-wrapper div end -->
		<div class="clearing"> </div>
		<div class="border-bottom"> </div>
		<div class="logo-wrapper">
			<div class="leftshadow"><img src="../images/logo-wrap-left.jpg" />
			</div>
			<div class="logo">
				<img src="../images/LogoOficial.png" />
			</div>
			<div class="rightshadow"><img src="../images/logo-wrap-right.jpg" />
			</div>
		</div>
		<div class="clearing"> </div>
		<!--- banner wrapper div end -->
		<div class="container">
			<div class="panel-wrapper">
				<div class='oicontent'>
		<?php
			//Listando carga
			//Recebendo ID
			$idCarga = $_GET['idCarga'];

			//Conectando com o BD
			include_once ("../banco/conexao.php");
			
			//Criando QUERY
			$query = "SELECT * FROM carga WHERE idCarga = ?";
			$stm = $db -> prepare($query);
			$stm -> bindParam(1, $idCarga);
			
			//Executando 
			if ($stm -> execute()) {
				while ($row = $stm -> fetch()) {
					$nomeCarga = $row['nomeCarga'];
					$pesoCarga = $row['pesoCarga'];
					$alturaCarga = $row['alturaCarga'];
					$larguraCarga = $row['larguraCarga'];
					$profundidadeCarga = $row['profundidadeCarga'];
					
					echo "<label clas='lb'><b>Nome:			</b>	$nomeCarga			</label><br>";
					echo "<label clas='lb'><b>Peso:			</b>	$pesoCarga			</label><br>";
					echo "<label clas='lb'><b>Altura:		</b>	$alturaCarga		</label><br>";
					echo "<label clas='lb'><b>Largura:	 	</b>	$larguraCarga		</label><br>";
					echo "<label clas='lb'><b>Profundidade:	</b>	$profundidadeCarga	</label><br>";
				}
			}
		?>
				</div>
				<div class="clearing"> </div>
			</div>
			<!--- panel wrapper div end -->
		</div>
		<!--- container div end -->
		<div class="clearing"> </div>
		<div class="footer-wrapper">
			<div class="footer">
				<p>
					© 2012 All Rights Reserved.<a href="http://www.alltemplates.com">  www.alltemplateneeds.com ></a> Images From: <a href="http://photorack.net">www.photorack.net</a>
				</p>
			</div>
		</div>
	</body>
</html>