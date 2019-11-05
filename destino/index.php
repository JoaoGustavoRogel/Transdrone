<?php
	include ("../login/verifica.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<link rel="icon" type="../image/png" href="../images/drone (1).png" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>TRANSDRONE</title>
		<link href="../css/styles.css" rel="stylesheet" type="text/css" />
		<meta charset="UTF-8">
		<link href="style.css" type="text/css" rel="stylesheet" />
		<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript" src="jquery.min.js"></script>
        <script type="text/javascript" src="mapa.js"></script>
        <script type="text/javascript" src="jquery-ui.custom.min.js"></script>
	</head>
<body>
<div class="menu-wrapper">
  <div class="menu">
    <ul>
      <li><a href="../index.html">INÍCIO</a></li>
      <li><a href="../sobrenos.html">SOBRE NÓS</a></li>
      <li><a href="../cadastro.html">CADASTRO</a></li>
      <li><a href="../drones.html">DRONES</a></li>
      <li><a href="../contato.html">CONTATO</a></li>
    </ul>
  </div>
  <div class='logar'>
		<a href="../login/logout.php"><button id='botoes' type="button" class="button">Deslogar</button></a>
  </div>
 </div>
<!--- menu-wrapper div end -->
<div class="clearing"></div>
<div class="border-bottom"></div>
<div class="logo-wrapper">
  <div class="leftshadow"><img src="../images/logo-wrap-left.jpg" /></div>
  <div class="logo">
    <img src="../images/LogoOficial.png" />
  </div>
  <div class="rightshadow"><img src="../images/logo-wrap-right.jpg" /></div>
</div>
<div class="clearing"></div>
<!--- banner wrapper div end -->
<div class="container">
  <div class="panel-wrapper">
      <div class='oicontent'>
      <div class="title">
        <h1>Realize sua entrega</h1>
        <h2>Selecione o Endereço</h2>
        
        <form method="post" action="salva.php">
        	<input class="campo" type="text" id="txtEndereco" name="enderecoDestino" placeholder="Endereço"/><input type="button" id="btnEndereco" name="btnEndereco" value="Mostrar no mapa" /><br><br>
			<div id="mapa"> </div><br>
			<button type="submit" id="btEntrega" class="button">Realizar Entrega</button><br><br>   
			<?php
				//Pegando idCarga e informações
				echo "<input name='idCarga' type='hidden' value='" . $_GET['idCarga'] . "'>";
				include_once ("../banco/conexao.php");
				
				$query =  "SELECT * FROM carga WHERE idCarga = ?";
				$stm = $db -> prepare($query);
				$stm -> bindParam(1, $_GET['idCarga']);
				
				$pesoCarga = 0;
				$larguraCarga = 0;
				$alturaCarga = 0;
				if ($stm -> execute()) {
					while($row = $stm -> fetch()) {
						$pesoCargaTemp = explode(" ", $row['pesoCarga']);
						$pesoCarga = (int)$pesoCargaTemp[0];
						$larguraCargaTemp = explode(" ", $row['larguraCarga']); 
						$larguraCarga = (int)$larguraCargaTemp[0];
						$alturaCargaTemp = explode(" ", $row['alturaCarga']);
						$alturaCarga = (int)$alturaCargaTemp[0];
					}
				}
				else {
					echo "Erro ao escolher DRONE contate o ADM!";
				}
				
				
				//Escolhendo DRONE
				$query = "SELECT * FROM drone";
				$stm = $db -> prepare($query);
				$i = 0;
				$dronesEscolhidos[] = array();
				$cargaDronesEscolhidos[] = array();
				$control = 0;
				if ($stm -> execute()) {
					while($row = $stm -> fetch()) {
							
						$idDrone = (int)$row['idDrone'];
						$larguraDroneTemp = explode(" ", $row['larguraDrone']);
						$larguraDrone = (int)$larguraDroneTemp[0];
						$alturaDroneTemp = explode(" ", $row['alturaDrone']);
						$alturaDrone = (int)$alturaDroneTemp[0];
						$pesoDroneTemp = explode(" ", $row['pesoDrone']);	
						$pesoDrone = (int)$pesoDroneTemp[0];	
						$disponibilidadeDrone = (int)$row['disponibilidadeDrone'];
						
						$dronesEscolhidos[$i] = array($i => 0);
						$cargaDronesEscolhidos[$i] 	= array($i => 0);
												
						if (($pesoCarga < $pesoDrone) && ($alturaCarga < $alturaDrone) && ($larguraCarga < $larguraDrone) && ($disponibilidadeDrone != 0)) {
							$dronesEscolhidos[$i] = (int)$idDrone;
							$cargaDronesEscolhidos[$i] = (int)$pesoDrone;					
						}
						else {
							$control = 1;
						}
						$i++;				
					}
					
					$flag = 0;
					$chosenCarga = 1000000;
					$chosenId = 0;
					for ($j = 1, $i = 0; $j < count($dronesEscolhidos); $j++, $i++) {
						if ($cargaDronesEscolhidos[$j] < $chosenCarga) {
							$chosenCarga = $cargaDronesEscolhidos[$j];
							$chosenId = $j;						
						}
					}
					
					
					if ($control != 1) {
						$drone = $dronesEscolhidos[$chosenId];	
						//Gerando Formulário
						print "<input name='idDrone' type='hidden' value='$drone'/>";					
					}
					else if ($control == 1) {
						echo "<p><b>Não existem Drones disponíveis, contate o administrador!</b></p>\n
							  <script>desabilita();</script>	
						";
					}
		
				}
			?>
			
	      <?php
		      if ($control != 1) {
		      	//MOSTRADNO INF DO DRONE ESCOLHIDO
		      	$query = "SELECT * FROM drone WHERE idDrone = ?";
				$stm = $db -> prepare($query);
				$stm -> bindParam(1, $drone);
				if ($stm -> execute()) {
					while ($row = $stm -> fetch()) {
						$img = $row['fotoDrone'];
						$mode = $row['modeloDrone'];
						print "<p id='pa'><b>O drone escolhido para sua entrega é: $mode</b></p>";
						print "<img id='imag' src='$img' width='300px' height='300px'/><br><br>";
					}
				}
		      }
			
	      ?>
        	 	
        </form>
      </div>

      <div class="content">
      	
      </div>
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
    <p> © 2016 All Rights Reserved. Images From: <a href="http://photorack.net">www.photorack.net</a> </p>
  </div>
</div>
</body>
</html>