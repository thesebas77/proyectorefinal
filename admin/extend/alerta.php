<?php include '../conexion/conexion.php' ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Proceso</title>
	<link rel="stylesheet" href="../css/sweetalert2.css">
</head>
<body>
	
	<?php 
		$mensaje = htmlentities($_GET['msj']);
		$c = htmlentities($_GET['c']);
		$p = htmlentities($_GET['p']);
		$t = htmlentities($_GET['t']);

		switch ($c) {
			case 'cl':
				$carpeta = '../clientes/';
				break;
			case 'us':
				$carpeta = '../usuarios/';
				break;
			case 'home':
				$carpeta = '../inicio/';
				break;
			case 'salir':
				$carpeta = '../../';
				break;
			case 'salir2':
				$carpeta = '../../';
				break;
			case 'perfil':
				$carpeta = '../perfil/';
				break;
			case 've':
				$carpeta = '../vehiculos/';
				break;
			case 'in':
				$carpeta = '../';
				break;
		}

		switch ($p) {
			case 'in':
				$pagina = 'index.php';
				break;
			case 'lic':
				$pagina = 'list_clientes.php';
				break;
			case 'liv':
				$pagina = 'list_vehiculos.php';
				break;
			case 'li':
				$pagina = 'list_usuarios.php';
				break;
			case 'home':
				$pagina = 'index.php';
				break;
			case 'salir':
				$pagina = 'salir.php';
				break;
			case 'pe':
				$pagina = 'index.php';
				break;
			case 'par':
				$pagina = 'participa.php';
				break;
			case 'fp':
				$pagina = 'fotoperfil.php';
				break;
		}

		$dir = $carpeta.$pagina;

		if ($t == "error"){
			$titulo = "Error";
		}else{
			$titulo = "Buen trabajo!";
		}

	 ?>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"   integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="   crossorigin="anonymous"></script>
	<script src="../js/sweetalert2.js"> </script>
	<script>
		
		swal({
		  title: '<?php echo $titulo ?>',
		  text: "<?php echo $mensaje ?>",
		  type: '<?php echo $t ?>',
		  confirmButtonColor: '#3085d6',
		  confirmButtonText: 'Ok'
		}).then(function () {
		  location.href='<?php echo $dir ?>';
		});		

		$(document).click(function(){
			location.href='<?php echo $dir ?>';
		});

		$(document).keyup(function(){
			if (e.which == 27){
				location.href='<?php echo $dir ?>';	
			}
			
		});

	</script>
</body>
</html>