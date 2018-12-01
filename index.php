<?php include 'admin/conexion/conexion.php'; 

// Desactivar toda notificación de error
//error_reporting(0);
 
// Notificar solamente errores de ejecución
//error_reporting(E_ERROR | E_WARNING | E_PARSE);
 
// Notificar E_NOTICE también puede ser bueno (para informar de variables
// no inicializadas o capturar errores en nombres de variables ...)
//error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
 
// Notificar todos los errores excepto E_NOTICE
// Este es el valor predeterminado establecido en php.ini
//error_reporting(E_ALL ^ E_NOTICE);
 
// Notificar todos los errores de PHP (ver el registro de cambios)
//error_reporting(E_ALL);
 
// Notificar todos los errores de PHP
//error_reporting(-1);
 
// Lo mismo que error_reporting(E_ALL);
//ini_set('error_reporting', E_ALL);

//echo 'Current PHP version: ' . phpversion();
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="google-site-verification" content="xONUlWX_KIESMgubmAs4Wcac7cEhaFA-SNDfJo6iEow">
	<title>Municipalidad de Tolhuin | Rentas</title>
	<link rel="stylesheet" href="admin/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="admin/css/sweetalert2.css">
	<link rel="stylesheet" href="admin/css/contador.css">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"   integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="   crossorigin="anonymous"></script>
	<script src="admin/js/materialize.js"> </script>
	<script src="admin/js/sweetalert2.js"> </script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


</head>
<body>
	
		<nav class="blue">
			<div class="nav-wrapper">
				<a class="brand-logo left"><img src="admin/img/logo.png"style="width:140px "></a>
				<ul id="nav-mobile" class="right">
				
				<?php if ($_SESSION['nick'] != ''): ?>	
					<li><a href="admin/inicio/index.php"  class="purple btn waves-light white-text s2 m4 l6">Inicio</a></li>
				<?php endif; ?>

				</ul>
			</div>
		</nav>


		<div class="row">
			<br>
			<br>
			<br>
			<br>
			<h3 class="center">Rentas - Municipalidad de Tolhuin </h3>
		</div>
		
		<div class="divider"></div>

			<br>
			<br>
			<br>


		<div class="row">
			
			<div class="col s3 m3 l3 xl3"></div>

			<div class="col s6 m6 l6 xl6">
				<div class="card">
					<div class="card-content">
						 <span class="card-title"><center>Inicio de sesion</center></span>
				          <form action="admin/login/index.php" method="post" autocomplete="off">


				          	<div class="input-field">
				          		<i class="material-icons prefix ">perm_identity</i>
				          		<input type="text" name="usuario" title="Ingrese su nombre de usuario" id="usuario" required pattern="[A-Za-z0-9]{4,20}" autofocus>
				          		<label for="usuario">Usuario:</label>
				          											
				          	</div>

				          	<div class="input-field">
				          		<i class="material-icons prefix">vpn_key</i>
				          		<input type="password" name="contra" title="Ingrese su contraseña" id="contra" required pattern="[A-Za-Z0-9]{8,15}">
				          		<label for="contra">Contraseña:</label>
				          											
				          	</div>

				          	
				          	<div class="input-field center">
				          		<button type="submit" class="btn waves-effect waves-light blue">Acceder</button>
				          											
				          	</div>
				          	
				          </form>
					</div>
				</div>
			</div>

		
		</div>
		

</body>
</html>