<?php 	
	include '../conexion/conexion.php'; 
	if (!isset($_SESSION['user'])){
		header('location:../');
	}
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width-device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../css/materialize.min.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="../css/sweetalert2.css">
		<style media="screen">
			
			header, main, footer {
			  padding-left: 300px;
			}
			.button-collpase{
				display: none;
			}

			@media only screen and (max-width : 992px) {
			  header, main, footer {
			    padding-left: 0;
			  }
			 .button-collpase{
				display: inherit;
			}
			}
		</style>
	</head>
	<body background="../img/background1.jpg">
		<main>
		<?php

			if ($_SESSION['tipo'] == 1){
				include 'menu_admin.php';	
			}else{

				if ($_SESSION['tipo'] == 2){
					include 'menu_encargado.php';
				}else{
					include 'menu_empleado.php';
				}
				
			}

	
		?>
