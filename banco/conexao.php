<?php
	//Conectando com o banco
	/*$datasource = 'mysql:host=mysql.hostinger.com.br;dbname=u921404355_drone';
	$user = 'u921404355_joao';
	$pass = '34226653';
	$db = new PDO($datasource, $user, $pass);*/
	
	$datasource = 'mysql:host=localhost;dbname=drone';
	$user = 'root';
	$pass = 'vertrigo';
	$db = new PDO($datasource, $user, $pass);
?>