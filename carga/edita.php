<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<link rel="icon" type="image/png" href="images/drone (1).png" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>TRANSDRONE</title>
		<link href="../css/styles.css" rel="stylesheet" type="text/css" />
		<script src="validar.js"></script>
		<style>
			.campo2 {
				height: 20px;
				width: 250px;
				margin-left: 15%;
				padding: 12px;
			}
			#labelSele{
				margin-left: 15%;
				color: white;
			}
			#sele {
				margin-left: 15%;
				border-radius: 3px;
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
			//Pegando ID e CNPJ
			$idCarga = $_GET['idCarga'];
			$cnpj = $_GET['cnpj'];
		?>
		<body onunload="window.opener.location.reload()">
		<form method="post" action="atualiza2.php">
			<input class="campo2" placeholder="CNPJ" name="cnpjEmpresa" id="cnpj" maxlength="14" readonly="readonly" value=<?php echo $cnpj;?> /><img src="" id="icnpj"/><br>
			<input class="campo2" placeholder="Peso" name="pesoCarga" id="peso" onblur="validaCarga(1)"/><img src="" id="ipeso"/><br>
			<input class="campo2" placeholder="Altura" name="alturaCarga" id="altura" onblur="validaCarga(2)"/><img src="" id="ialtura"/><br>
			<input class="campo2" placeholder="Largura" name="larguraCarga" id="largura" onblur="validaCarga(3)"/><img src="" id="ilargura"/><br>
			<input class="campo2" placeholder="Profundidade" name="profundidadeCarga" id="profundidade" onblur="validaCarga(4)"/><img src="" id="iprofundidade"/><br>
			<input class="campo2" placeholder="Nome" name="nomeCarga" id="nome" onblur="validaCarga(5)"/><img src="" id="inome"/><br>
			<input type="hidden" name="idCarga" value=<?php echo "$idCarga"?>/>
			<label id="labelSele"><b>Carga de risco?</b></label><br>
			<select name="riscoCarga" id="sele">
				<option>Sim</option>
				<option>Não</option>
			</select><br><br>
			<button type="submit" id="botao" class="button" onmouseover="validaCarga(50)">Atualizar</button>
		</form>
				</div>
				<div class="clearing"> </div>
			</div>
			<!--- panel wrapper div end -->
		</div>
		<!--- container div end -->
	</body>
</html>