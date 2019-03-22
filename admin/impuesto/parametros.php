<?php include '../extend/header.php';
include '../extend/permiso.php';
include '../conexion/conexion.php'; 			  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Parametros</title>
</head>
<body>
<div class="row">
		<div class="col s12">
			<div class="card">
				<div class="card-content">
					<span class="card-title">Parametros</span>	
					<form class="form" action="procesarparametro.php" method="post" enctype="multipart/form-data">
						<div class="input-field col s12">
							<select name="var"  id="var" required>
								<option value="" disabled selected>Seleccione parametro</option>
									<?php 
										$sel = $con -> prepare('SELECT id, nombre FROM parametro');
										$sel -> execute();
										$sel -> bind_result($id, $nombre);
										$sel -> store_result();
										while($sel -> fetch()){
										 ?>
										 <option value="<?php echo $id; ?>"> <?php echo $nombre; ?></option>
									 <?php 
											 
									}
								  ?>
												 
												
											</select>
										</div>
										<br>
						<br><br><br>
						<div class="input-field">
							<input type="number" name="valor" title="Ingrese el Nuevo Valor" id="valor" min=".11" max="99.99"step="any">
								<label for="valor">Valor:</label>				
						</div>	

						<br>
									
									<!-- Input boton -->

									  <button class="btn waves-effect waves-light" name="submit" type="submit" id="btn_registrar">Registrar
									    <i class="material-icons right">send</i>
									  </button>

									</div>
								</form>
							</div>
						</div>
					</div>
				</div>

<?php include '../extend/scripts.php'; ?>
</body>
</html>