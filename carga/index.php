<?php
	session_start();
?>
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
							<a href="../carga/acessoadm.php">CARGA</a>
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
					<h1 class="t">Cadastre sua carga</h1>
				</div>
				<?php 
						//Recebendo uma ID de controle
						$contTemp = $_GET['cont'];
						//1 usuario. 2 adm
						//USANDO ID DA SESSÃO
						//session_start();
						$cnpj = $_SESSION['user'];
					?>
				<form method="post" action="salva.php">
					<input class="campo2" placeholder="CNPJ" name="cnpjEmpresa" id="cnpj" maxlength="14" readonly="readonly" value=<?php echo $cnpj;?> /><img src="" id="icnpj"/><br>
					<input class="campo2" placeholder="Peso" name="pesoCarga" id="peso" onblur="validaCarga(1)"/><img src="" id="ipeso"/><br>
					<input class="campo2" placeholder="Altura" name="alturaCarga" id="altura" onblur="validaCarga(2)"/><img src="" id="ialtura"/><br>
					<input class="campo2" placeholder="Largura" name="larguraCarga" id="largura" onblur="validaCarga(3)"/><img src="" id="ilargura"/><br>
					<input class="campo2" placeholder="Profundidade" name="profundidadeCarga" id="profundidade" onblur="validaCarga(4)"/><img src="" id="iprofundidade"/><br>
					<input class="campo2" placeholder="Nome" name="nomeCarga" id="nome" onblur="validaCarga(5)"/><img src="" id="inome"/><br>
					<label id="labelSele">Carga de risco?</label><br>
					<?php
						echo "<input type='hidden' value='$contTemp' name='cont'/>";
					?>
					<select name="riscoCarga" id="sele">
						<option>Sim</option>
						<option>Não</option>
					</select><br><br>
					<button type="submit" id="botao" class="botaolu" onmouseover="validaCarga(50)">Cadastrar</button>
				</form>
</html>
