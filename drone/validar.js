var verifica = 0;
function validarDrone(cont){
	
	var modelo = document.getElementById('modelo').value;
	var peso = document.getElementById('peso').value;
	var altura = document.getElementById('altura').value;
	var largura = document.getElementById('largura').value;
	var preco = document.getElementById('preco').value;
	
	if (cont == 1 && modelo == ""){
		document.getElementById('botao').disabled = true;
		document.getElementById('imodelo').src = "../images/cancel.png";
		verifica++;
	}
	else if(cont == 1 && modelo != ""){
		document.getElementById('modelo').value;
		document.getElementById('imodelo').src = "../images/correct.png";
		document.getElementById("botao").disabled = false;
		verifica = 0;
	}
	
	if(cont == 2 && peso == ""){
		document.getElementById('botao').disabled = true;
		document.getElementById('ipeso').src = "../images/cancel.png";
		document.getElementById("botao").disabled = false;
		verifica++;
	}
	else if(cont == 2 && peso != ""){
		document.getElementById('peso').value = peso + " kg";
		document.getElementById('ipeso').src = "../images/correct.png";
		document.getElementById("botao").disabled = false;
		verifica = 0;
	}
	
	if(cont == 3 && altura == ""){
		document.getElementById('botao').disabled = true;
		document.getElementById('ialtura').src = "../images/cancel.png";
		verifica++;
	}
	else if(cont == 3 && altura != ""){
		document.getElementById('altura').value = altura + " cm";
		document.getElementById('ialtura').src = "../images/correct.png";
		document.getElementById("botao").disabled = false;
		verifica = 0;
	}
	
	if(cont == 4 && largura == ""){
		document.getElementById('botao').disabled = true;
		document.getElementById('ilargura').src = "../images/cancel.png";
		verifica++;
	}
	else if(cont == 4 && largura != ""){
		document.getElementById('largura').value = largura + " cm";
		document.getElementById('ilargura').src = "../images/correct.png";
		document.getElementById("botao").disabled = false;
		verifica = 0;
	}
	
	if (cont == 5 && preco == ""){
		document.getElementById('botao').disabled = true;
		document.getElementById('ipreco').src = "../images/cancel.png";
		verifica++;
	}
	else if (cont == 5 && preco!= ""){
		document.getElementById('preco').value = "R$ " + preco;
		document.getElementById('ipreco').src = "../images/correct.png";
		document.getElementById("botao").disabled = false;
		verifica = 0;
	}
	
	if(cont == 50 && verifica != 0){
		document.getElementById("botao").disabled = true;
	}
	else if(cont == 50 && (modelo == "" || peso == "" || altura == "" || largura == "" || preco == "")){
		document.getElementById("botao").disabled = true;
	}
	else if (verifica == 0 && cont == 50){
		document.getElementById("botao").disabled = false;
	}
	//alert (verifica);
}