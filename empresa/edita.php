<html lang="pt-br">
	<head>
		<title>Cadastro Empresa</title>
		<meta charset="UTF-8"/>
		<script src="validaCampos.js"></script>
	</head>
	<body>
		<h3>Cadastrar Empresa</h3>
		<form action="salva.php" method="post">
			<input placeholder="CNPJ" name="cnpj" id="cnpj" onblur="validaCadastro(1)"/><img src="" id="icnpj"/><p>Digite no formato: XX.XXX.XXX/YYYY-ZZ</p><br>
			<input placeholder="Nome Fantasia" name="nomeFantasia" id="nome" onblur="validaCadastro(2)"/><img src="" id="inome"><br>
			<input placeholder="Endereço" name="enderecoEmpresa" id="endereco" onblur="validaCadastro(3)"/><img src="" id="iendereco"/><br>
			<input placeholder="Cidade" name="cidadeEmpresa" id="cidade" onblur="validaCadastro(4)"/><img src="" id="icidade"/><br>
			<input placeholder="Telefone" name="telefoneEmpresa" id="telefone" onblur="validaCadastro(5)"/><img id="itelefone" src=""/><p>Digite no formato: (XX)XXXXX-XXXXX<p/><br>
			<input placeholder="Representante" name="representanteEmpresa" id="representante" onblur="validaCadastro(6)"/><img src="" id="irepresentante"/><br>
			<input placeholder="Categoria" name="categoriaEmpresa" id="categoria" onblur="validaCadastro(7)"/><img src="" id="icategoria"/><br>
			<input placeholder="Razão Social" name="razaoSocial" id="razao" onblur="validaCadastro(8)"/><img src="" id="irazao"/><br>
			<input placeholder="Senha" name="senhaEmpresa" type="password" id="senha" onblur="validaCadastro(9)"/><p id="psenha"></p><br>
			<button type="submit" onmouseover="validaCadastro(50)" id="botao">Cadastrar</button>
		</form>
	</body>
</html>