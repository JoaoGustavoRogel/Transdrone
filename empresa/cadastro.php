<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<link rel="icon" type="../image/png" href="../images/drone (1).png" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>TRANSDRONE</title>
		<link href="../css/styles.css" rel="stylesheet" type="text/css" />
		<script src="validaCampos.js"></script>
		<style>
			.campo {
				height: 30px;
				width: 300px;
				margin-left: 20%;
				padding: 5px;
			}
			.inform {
				margin-left: 20%;
			}
			#botao {
				margin-left: 20%;
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
						<a href="../sobrenos.html">SOBRE NÓS</a>
					</li>
					<li>
						<a href="../cadastro.html" class="active" >CADASTRO</a>
					</li>
					<li>
						<a href="../drones.html">DRONES</a>
					</li>
					<li>
						<a href="../contato.html">CONTATO</a>
					</li>
				</ul>
			</div>
		</div>
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
		<div class="clearing"></div>
		<!--- banner wrapper div end -->
		<div class="container">
			<div class="panel-wrapper">

				<div class="contact">
					<div class="title">
						<h1>Cadastrar Empresa</h1>
							<form action="salva.php" method="post">
								<input class="campo" maxlength="14" placeholder="CNPJ" name="cnpj" id="cnpj" onblur="validaCadastro(1)"/><img src="" id="icnpj"/><p class="inform">Digite no formato: XX.XXX.XXX/YYYY-ZZ</p><br>
								<input class="campo" placeholder="Nome Fantasia" name="nomeFantasia" id="nome" onblur="validaCadastro(2)"/><img src="" id="inome"><br>
								<input class="campo" placeholder="Endereço" name="enderecoEmpresa" id="endereco" onblur="validaCadastro(3)"/><img src="" id="iendereco"/><br>
								<input class="campo" placeholder="Cidade" name="cidadeEmpresa" id="cidade" onblur="validaCadastro(4)"/><img src="" id="icidade"/><br>
								<input class="campo" placeholder="Telefone" name="telefoneEmpresa" id="telefone" onblur="validaCadastro(5)"/><img id="itelefone" src=""/><p class="inform" >Digite no formato: (XX)XXXXX-XXXXX</p><br>
								<input class="campo" placeholder="Representante" name="representanteEmpresa" id="representante" onblur="validaCadastro(6)"/><img src="" id="irepresentante"/><br>
								<input class="campo" placeholder="Categoria" name="categoriaEmpresa" id="categoria" onblur="validaCadastro(7)"/><img src="" id="icategoria"/><br>
								<input class="campo" placeholder="Razão Social" name="razaoSocial" id="razao" onblur="validaCadastro(8)"/><img src="" id="irazao"/><br>
								<input class="campo" placeholder="Senha" name="senhaEmpresa" type="password" id="senha" onblur="validaCadastro(9)"/><p class="inform" id="psenha"> </p><br>
								<button type="submit" onmouseover="validaCadastro(50)" id="botao">Cadastrar</button>
							</form>
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
				<p>
					© 2012 All Rights Reserved.<a href="http://www.alltemplates.com"> </a> Images From: <a href="http://photorack.net">www.photorack.net</a>
				</p>
			</div>
		</div>
	</body>
</html>
