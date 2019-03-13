<?php 
	  include '../extend/header.php';
	  include '../extend/permiso.php';
				  
?>
<title>Importar Valuacion</title>
</head>
<br>
<br>
<br>
<br>
<br>
<div class="row">
	<div class="col s2 m2 l2 xl2">
		
	</div>
	<div class="col s8 m8 l8 xl8 ">
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
							
		<button class="btn waves-effect waves-light" type="submit" id="btn_registrar">Subir
			<i class="material-icons right">send</i>
		</button>
                  		 	
						
            	</form>
			</div>
		</div>
	</div>

	<div class="col s2 m2 l2 xl2">
		
	</div>
</div>
<?php include '../extend/scripts.php'; ?>
                 
</body>	
</html>