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
	<body>
		

<?php
	include '../conexion/conexion.php';

$num = htmlentities($_GET['id_pro']);

$sel = $con -> prepare("SELECT * FROM persona WHERE id = ?");
$sel -> bind_param('i', $num);
$sel -> execute();
$sel -> store_result();
$sel -> bind_result($nume,$nom,$ape,$razon,$cuil,$dni,$domi,$email,$f_alta,$loca,$tipo,$gru,$est,$obs);
$row = $sel -> num_rows();
?>



		<div class="row">
			<div class="col s12">
				<div class="card transparent center">
					<div class="card-content">
						<span class="card-title">Propietario: <?php echo $num ?></span>	
						<p>Todos los datos del propietario y sus vehiculos asociados.</p>
					</div>
				</div>
			</div>
		</div>

		<h5 class="center">Datos del propietario</h5>
	    <div class="divider"></div>

	    	 <table class="highlight">
	          	<thead>
	          		<tr class="cabecera">
		          		<th class="center">Email</th>
		          		<th class="center">Tipo</th>
		          		<th class="center">Nombre</th>
		          		<th class="center">Apellido</th>
		          		<th class="center">Estado</th>
		          		<th class="center">Fecha de alta</th>
	          		</tr>
	          	</thead>

	          	<?php while($sel -> fetch()){ ?>
	          	<tr>
	          		<td class="center"><?php echo $email; ?></td>
	          		<td class="center"><?php echo $tipo; ?></td>
	          		<td class="center"><?php echo $nom; ?></td>
	          		<td class="center"><?php echo $ape; ?></td>
	          		<td class="center"><?php echo $est; ?></td>
	          		<td class="center"><?php echo date('d/m/Y',strtotime($f_alta)); ?></td>
	          	</tr>


	    <?php } ?>
	    </table>
	    <div class="divider"></div>

		<h5 class="center">Vehiculos del propietario</h5>
	    <div class="divider"></div>

		<table class="highlight">
	          	<thead>
	          		<tr class="cabecera">
		          		<th class="center">Dominio</th>
		          		<th class="center">Fecha de Alta</th>
		          		<th class="center">Modelo</th>
		          		<th class="center">Detalle</th>
		          		<?php if ($_SESSION['tipo'] == 3): ?>
		          		<?php else: ?>
		          		<th class="center">Modificar</th>
		          		<th class="center">Eliminar</th>
		          		<?php endif; ?>
	          		</tr>
	          	</thead>

	          	<?php 
						$sel = $con -> prepare("SELECT padron.dominio,padron.fechaAlta, vehiculo.descripcion  FROM padron INNER JOIN vehiculo ON padron.codVehiculo = vehiculo.id WHERE padron.propietario = ?");
						$sel -> bind_param('i', $num);
						$sel -> execute();
						$sel -> store_result();
						$sel -> bind_result($dominio,$falta,$desc);
						$row = $sel -> num_rows();

						 while($sel -> fetch()){ 
				 ?>

	          	<tr>
	          		<td class="center"><?php echo $dominio; ?></td>
	          		<td class="center"><?php echo $falta; ?></td>
	          		<td class="center"><?php echo $desc; ?></td>



	          		<td class="center"> 
		          			<a href="../detalle/vehiculo.php?dominio=<?php echo $dominio; ?>" class="btn-floating green"><i class="material-icons">assignment</i></a> 
		          	</td>
	          		<?php if ($_SESSION['tipo'] == 3): ?>
		          	<?php else: ?>
	          		<td class="center"> 
	          			<a href="#" class="btn-floating blue" onclick="
	          				swal({
							  title: 'Desea modificar el vehiculo?',
							  text: 'Al modificarlo se van a reemplazar los datos anteriories!',
							  type: 'question',
							  showCancelButton: true,
							  confirmButtonColor: '#3085d6',
							  cancelButtonColor: '#d33',
							  confirmButtonText: 'Si, Modificar!'
							}).then(function () {
									location.href='../vehiculos/modificar_vehiculo.php?dom=<?php echo $dominio; ?>';		      
							})
	          			"><i class="material-icons">autorenew</i></a> 
	          		</td>

					<td class="center"> 
	          			<a href="#" class="btn-floating red" onclick="
	          				swal({
							  title: 'Estas seguro que desea eliminar al propietario?',
							  text: 'Al hacerlo se desativaria el propietario!',
							  type: 'warning',
							  showCancelButton: true,
							  confirmButtonColor: '#3085d6',
							  cancelButtonColor: '#d33',
							  confirmButtonText: 'Si, Eliminarlo!'
							}).then(function () {
									location.href='../vehiculos/eliminar_vehiculo.php?dom=<?php echo $dominio; ?>';		      
							})
	          			"><i class="material-icons">clear</i></a> 
	          		</td>
	          		<?php endif; ?>
	          	</tr>

	          	<?php }
	          	$sel -> close();
	          	 ?>
	         </table>


	<?php include '../extend/scripts.php'; ?>

