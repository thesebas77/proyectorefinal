<?php include '../extend/header.php'; 

$num = htmlentities($_GET['num']);

$sel = $con -> prepare("SELECT * FROM propietario WHERE num = ?");
$sel -> bind_param('i', $num);
$sel -> execute();
$sel -> store_result();
$sel -> bind_result($nume,$tipo,$nom,$ape,$domi,$loca);
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
		          		<th>D.N.I/CUIL</th>
		          		<th>Tipo</th>
		          		<th>Nombre</th>
		          		<th>Apellido</th>
		          		<th>Domicilio</th>
		          		<th>Localidad</th>
		          		<?php if ($_SESSION['tipo'] == 3): ?>
		          		<?php else: ?>
		          		<th>Modificar</th>
		          		<th>Eliminar</th>
		          		<?php endif; ?>
	          		</tr>
	          	</thead>

	          	<?php while($sel -> fetch()){ ?>
	          	<tr>
	          		<td><?php echo $num; ?></td>
	          		<td><?php echo $tipo; ?></td>
	          		<td><?php echo $nom; ?></td>
	          		<td><?php echo $ape; ?></td>
	          		<td><?php echo $domi; ?></td>
	          		<td><?php echo $loca; ?></td>

	          		<?php if ($_SESSION['tipo'] == 3): ?>
		          	<?php else: ?>
	          		<td> 
	          			<a href="#" class="btn-floating blue" onclick="
	          				swal({
							  title: 'Desea modificar el propietario?',
							  text: 'Al modificarlo se van a reemplazar los datos anteriories!',
							  type: 'question',
							  showCancelButton: true,
							  confirmButtonColor: '#3085d6',
							  cancelButtonColor: '#d33',
							  confirmButtonText: 'Si, Modificar!'
							}).then(function () {
									location.href='../clientes/modificar_cliente.php?num=<?php echo $num; ?>';		      
							})
	          			"><i class="material-icons">autorenew</i></a> 
	          		</td>

					<td> 
	          			<a href="#" class="btn-floating red" onclick="
	          				swal({
							  title: 'Estas seguro que desea eliminar al propietario?',
							  text: 'Al eliminarlo se borraran todos los vehiculos asociados y no podra recuperarlos!',
							  type: 'warning',
							  showCancelButton: true,
							  confirmButtonColor: '#3085d6',
							  cancelButtonColor: '#d33',
							  confirmButtonText: 'Si, Eliminarlo!'
							}).then(function () {
									location.href='../clientes/eliminar_cliente.php?num=<?php echo $num; ?>';		      
							})
	          			"><i class="material-icons">clear</i></a> 
	          		</td>
	          		<?php endif; ?>
	          	</tr>


	    <?php } ?>
	    </table>
	    <div class="divider"></div>

		<h5 class="center">Vehiculos del propietario</h5>
	    <div class="divider"></div>

		<table class="highlight">
	          	<thead>
	          		<tr class="cabecera">
		          		<th>Dominio</th>
		          		<th>Marca</th>
		          		<th>Modelo</th>
		          		<th>Tipo</th>
		          		<th>Año</th>
		          		<th>F. alta</th>
		          		<th>Base imponible</th>
		          		<th>Detalle</th>
		          		<?php if ($_SESSION['tipo'] == 3): ?>
		          		<?php else: ?>
		          		<th>Modificar</th>
		          		<th>Eliminar</th>
		          		<?php endif; ?>
	          		</tr>
	          	</thead>

	          	<?php 
						$sel = $con -> prepare("SELECT * FROM vehiculo WHERE propietario = ?");
						$sel -> bind_param('i', $num);
						$sel -> execute();
						$sel -> store_result();
						$sel -> bind_result($dominio,$marca,$modelo,$tipo,$ano,$falta,$propietario,$baseimponible);
						$row = $sel -> num_rows();

						 while($sel -> fetch()){ 
				 ?>
	          	<tr>
	          		<td><?php echo $dominio; ?></td>
	          		<td><?php echo $marca; ?></td>
	          		<td><?php echo $modelo; ?></td>
	          		<td><?php echo $tipo; ?></td>
	          		<td><?php echo $ano; ?></td>
	          		<td><?php echo $falta; ?></td>
	          		<td><?php echo $baseimponible; ?></td>
	          		<td> 
		          			<a href="../detalle/vehiculo.php?dominio=<?php echo $dominio; ?>" class="btn-floating green"><i class="material-icons">assignment</i></a> 
		          	</td>
	          		<?php if ($_SESSION['tipo'] == 3): ?>
		          	<?php else: ?>
	          		<td> 
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

					<td> 
	          			<a href="#" class="btn-floating red" onclick="
	          				swal({
							  title: 'Estas seguro que desea eliminar al usuario?',
							  text: 'Al eliminarlo no podra recuperarlo!',
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

