function abrir(x) {
	var url = "../carga/detalhes.php?idCarga=" + x;
	window.open(url, 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESIZABLE=NO, SCROLLBARS=NO, TOP=10, LEFT=10, WIDTH=770, HEIGHT=400');
}
 function abrir2(y, z) {
 	var url = "../carga/edita.php?idCarga=" + y +"&cnpj=" + z;
 	window.open(url, 'Pagina', "STATUS=YES, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESIZABLE=NO, SCROLLBARS=NO, TOP=10, LEFT=10, WIDTH=850, HEIGHT=600");
 }
