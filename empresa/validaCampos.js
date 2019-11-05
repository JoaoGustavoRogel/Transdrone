var verifica = 0;
function validaCadastro(cont) {
	var cnpj = document.getElementById("cnpj").value;
	var nome = document.getElementById("nome").value;
	var endereco = document.getElementById("endereco").value;
	var cidade = document.getElementById("cidade").value;
	var representante = document.getElementById("representante").value;
	var senha = document.getElementById("senha").value;
	var razao = document.getElementById("razao").value;
	var categoria = document.getElementById("categoria").value;
	var telefone = document.getElementById("telefone").value;
	
	if (senha.length < 8 && cont == 9) {
		document.getElementById("psenha").innerHTML = "Senha deve ter no mínimo 8 caracteres";
		document.getElementById("psenha").style.color = "red";
		document.getElementById("botao").disabled = true;
		verifica++;
	}
	else if (cont == 9) {
		document.getElementById("psenha").style.color = "#90ee90";
		document.getElementById("psenha").innerHTML = "Senha Ok.";
		document.getElementById("botao").disabled = false;
		verifica = 0;
	}
	
	if (cnpj == "" && cont == 1) {
		document.getElementById("icnpj").src = "../images/cancel.png";
		document.getElementById("botao").disabled = true;
		verifica++;
	}
	else if (cont == 1){
		document.getElementById("icnpj").src = "../images/correct.png";
		document.getElementById("botao").disabled = false;
		verifica = 0;
	}
	
	//Campos que não exigem formatação
	if (nome == "" && cont == 2) {
		document.getElementById("inome").src = "../images/cancel.png";
		document.getElementById("botao").disabled = true;
		verifica++;
	}
	else if (cont == 2){
		document.getElementById("inome").src = "../images/correct.png";
		document.getElementById("botao").disabled = false;
		verifica = 0;
	}
	
	if (endereco == "" && cont == 3) {
		document.getElementById("iendereco").src = "../images/cancel.png";
		document.getElementById("botao").disabled = true;
		verifica++;
	}
	else if (cont == 3){
		document.getElementById("iendereco").src = "../images/correct.png";
		document.getElementById("botao").disabled = false;
		verifica = 0;
	}
	
	
	if (cidade == "" && cont == 4) {
		document.getElementById("icidade").src = "../images/cancel.png";
		document.getElementById("botao").disabled = true;
		verifica++;
	}
	else if (cont == 4){
		document.getElementById("icidade").src = "../images/correct.png";
		document.getElementById("botao").disabled = false;
		verifica = 0;
	}
	
	if (representante == "" && cont == 6) {
		document.getElementById("irepresentante").src = "../images/cancel.png";
		document.getElementById("botao").disabled = true;
		verifica++;
	}
	else if (cont == 6){
		document.getElementById("irepresentante").src = "../images/correct.png";
		document.getElementById("botao").disabled = false;
		verifica = 0;
	}
	
	if (categoria == "" && cont == 7) {
		document.getElementById("icategoria").src = "../images/cancel.png";
		document.getElementById("botao").disabled = true;
		verifica++;
	}
	else if (cont == 7) {
		document.getElementById("icategoria").src = "../images/correct.png";
		document.getElementById("botao").disabled = true;
		verifica = 0;
	}
	
	if (razao == "" && cont == 8) {
		document.getElementById("irazao").src = "../images/cancel.png";
		document.getElementById("botao").disabled = true;
		verifica++;
	}
	else if (cont == 8) {
		document.getElementById("irazao").src = "../images/correct.png";
		document.getElementById("botao").disabled = true;
		verifica = 0;
	}
	
	if (telefone == "" && cont == 5) {
		document.getElementById("itelefone").src = "../images/cancel.png";
		document.getElementById("botao").disabled = true;
		verifica++;
	}
	else if (cont == 5){
		document.getElementById("itelefone").src = "../images/correct.png";
		document.getElementById("botao").disabled = true;
		verifica = 0;
	}
	
	if (cont == 50 && verifica != 0) {
		document.getElementById("botao").disabled = true;		
	}
	else if(cont == 50 && (cnpj == "" || nome == "" || endereco == "" || cidade == "" || telefone == "" || representante == "" || categoria == "" || razao == "" || senha == "")) {
		document.getElementById("botao").disabled = true;	
	}
	else if (verifica == 0 && cont == 50) {
		document.getElementById("botao").disabled = false;	
	}
}

window.onload = function(){
	document.getElementById("botao").disabled = true;
};