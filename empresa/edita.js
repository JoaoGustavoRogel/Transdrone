var flag = 0;

window.onload = function(){
	document.getElementById("bt1").style.display = "none";
};

function edita1() {
	document.getElementById("nomeFantasia").disabled = false;
	document.getElementById("endereco").disabled = false;
	document.getElementById("telefone").disabled = false;
	document.getElementById("representante").disabled = false;
	document.getElementById("razaoSocial").disabled = false;
	document.getElementById("categoria").disabled = false;
	document.getElementById("cidade").disabled = false;
	
	document.getElementById("nomeFantasia").style.backgroundColor  = "#ffffff";
	document.getElementById("endereco").style.backgroundColor  = "#ffffff";
	document.getElementById("telefone").style.backgroundColor  = "#ffffff";
	document.getElementById("representante").style.backgroundColor  = "#ffffff";
	document.getElementById("razaoSocial").style.backgroundColor  = "#ffffff";
	document.getElementById("categoria").style.backgroundColor  = "#ffffff";
	document.getElementById("cidade").style.backgroundColor  = "#ffffff";
	
		document.getElementById("nomeFantasia").style.border  = "1px solid black";
	document.getElementById("endereco").style.border  = "1px solid black";
	document.getElementById("telefone").style.border  = "1px solid black";
	document.getElementById("representante").style.border  = "1px solid black";
	document.getElementById("razaoSocial").style.border  = "1px solid black";
	document.getElementById("categoria").style.border  = "1px solid black";
	document.getElementById("cidade").style.border  = "1px solid black";
	
	document.getElementById("bt").style.display = "none";
	document.getElementById("bt1").style.display = "block";
}

function edita2() {
	document.getElementById("formu").submit();
	
	document.getElementById("bt").style.display = "block";
	document.getElementById("bt1").style.display = "none";
}
