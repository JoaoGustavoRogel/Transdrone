var verifica = 0;
function validaCarga(cont){
	
	var peso = document.getElementById('peso').value;
	var altura = document.getElementById('altura').value;
	var largura = document.getElementById('largura').value;
	var profundidade = document.getElementById('profundidade').value;
	var nome = document.getElementById('nome').value;
	
	if (cont == 1 && peso == ""){
		document.getElementById('botao').disabled = true;
		document.getElementById('ipeso').src = "../images/cancel.png";
		verifica++;
	}
	else if(cont == 1 && peso != ""){
		document.getElementById('peso').value = peso + " Kg";
		document.getElementById('ipeso').src = "../images/correct.png";
		document.getElementById("botao").disabled = false;
		verifica = 0;
	}
	
	if(cont == 2 && altura == ""){
		document.getElementById('botao').disabled = true;
		document.getElementById('ialtura').src = "../images/cancel.png";
		verifica++;
	}
	else if(cont == 2 && altura != ""){
		document.getElementById('altura').value = altura + " cm";
		document.getElementById('ialtura').src = "../images/correct.png";
		document.getElementById("botao").disabled = false;
		verifica = 0;
	}
	
	if(cont == 3 && largura == ""){
		document.getElementById('botao').disabled = true;
		document.getElementById('ilargura').src = "../images/cancel.png";
		verifica++;
	}
	else if(cont == 3 && largura != ""){
		document.getElementById('largura').value = largura + " cm";
		document.getElementById('ilargura').src = "../images/correct.png";
		document.getElementById("botao").disabled = false;
		verifica = 0;
	}
	
	if (cont == 4 && profundidade == ""){
		document.getElementById('botao').disabled = true;
		document.getElementById('iprofundidade').src = "../images/cancel.png";
		verifica++;
	}
	else if (cont == 4 && profundidade != ""){
		document.getElementById('profundidade').value = profundidade + " cm";
		document.getElementById('iprofundidade').src = "../images/correct.png";
		document.getElementById("botao").disabled = false;
		verifica = 0;
	}
	
	if (cont == 5 && nome == ""){
		document.getElementById('botao').disabled = true;
		document.getElementById('inome').src = "../images/cancel.png";
		verifica++;
	}
	else if (cont == 5 && nome != ""){
		document.getElementById('inome').src = "../images/correct.png";
		document.getElementById("botao").disabled = false;
		verifica = 0;
	}
	
	if(cont == 50 && verifica != 0){
		document.getElementById("botao").disabled = true;
	}
	else if(cont == 50 && (peso == "" || altura == "" || largura == "" || profundidade == "")){
		document.getElementById("botao").disabled = true;
	}
	else if (verifica == 0 && cont == 50){
		document.getElementById("botao").disabled = false;
	}
	
}