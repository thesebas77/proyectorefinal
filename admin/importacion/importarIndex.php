<?php 
	  include '../extend/header.php';
	  include '../extend/permiso.php';
				  
?>
<!doctype html>
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
<title>Importar Valuacion</title>
</head>
<body>
<br>
<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<span class="card-title">Importación de Valuación Nacional</span>	
				<form class="form" action="../importacion/procesarImportacion.php" method="post" enctype="multipart/form-data">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Archivo CSV</span>
                            <input type="file" name="archivo">
                                </div>
                                    <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
					</div>
				</div>
                <br>
 		<!-- Input boton -->
		<br>
							
		<button class="btn waves-effect waves-light" type="submit" id="btn_registrar">Registrar
			<i class="material-icons right">send</i>
		</button>
                  		 	
						
            	</form>
			</div>
		</div>
	</div>
</div>
<?php include '../extend/scripts.php'; ?>
			<script src="../js/validacion3.js"></script>
			<script src="../js/validacion4.js"></script>                 
</body>	
</html>