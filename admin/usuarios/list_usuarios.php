<?php include '../extend/header.php';?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Lista de usuarios</title>
	
</head>
<body>
	<?php 

		$sel = $con -> prepare("SELECT id_user,user,nom,ape,tipo FROM usuario ");

		$sel -> execute();
		$sel -> store_result();
		$sel -> bind_result($id_user, $user,$nom,$ape,$tipo);
		$row = $sel -> num_rows();
	?>
	  <div class="row">
	    <div class="col s12 m12">
	      <div class="card orange darken-1">
	        <div class="card-content white-text">
	          <span class="card-title">Usuarios (total: <?php echo $row ?>)</span>


	          <h5 class="red-text">Administrador</h5>
	          <div class="divider"></div>

	          <table>
	          	<thead>
	          		<tr class="cabecera">
		          		<th>Usuario</th>
		          		<th>Nombre</th>
		          		<th>Apellido</th>
	          		</tr>
	          	</thead>

	          	<?php while($sel -> fetch()){ ?>

	          	<?php if ($tipo == 1): ?>
	          
	          	<tr>
	          		<td><?php echo $user; ?></td>
	          		<td><?php echo $nom; ?></td>
	          		<td><?php echo $ape; ?></td>
	          		<!-- <td>
	          			<?php //if ($bloqueo == '1'): ?> 
	          			<a href="bloqueo_manual.php?us=<?php //echo $id_user; ?>&bl=<?php //echo $bloqueo; ?>"><i class="material-icons">lock_open</i></a>	
	          			<?php //else: ?>
	          				<a href="bloqueo_manual.php?us=<?php //echo $id_user; ?>&bl=<?php //echo $bloqueo; ?>"><i class="material-icons red-text">lock_outline</i></a>	
	          			<?php //endif; ?>
	          			 
	          		</td> -->
	          		<!-- <td> 
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
									location.href='eliminar_usuario.php?id_us=<?php echo $id_user; ?>';		      
							})
	          			"><i class="material-icons">clear</i></a> 
	          		</td> -->
	          	</tr>

	          	<?php endif; }
	          	$sel -> close();
	          	 ?>

	          </table>

	          <div class="divider black"></div>

	<?php 

		$sel = $con -> prepare("SELECT id_user,user,nom,ape,tipo FROM usuario ");

		$sel -> execute();
		$sel -> store_result();
		$sel -> bind_result($id_user, $user,$nom,$ape,$tipo);
		$row = $sel -> num_rows();
	?>

          <h5 class="yellow-text">Encargado</h5>
          <div class="divider"></div>

          <table>
          	<thead>
          		<tr class="cabecera">
	          		<th>Usuario</th>
	          		<th>Nombre</th>
	          		<th>Apellido</th>
	          		<th>Eliminar</th>
          		</tr>
          	</thead>

          	<?php while($sel -> fetch()){ ?>

          	<?php if ($tipo == 2): ?>
          
          	<tr>
          		<td><?php echo $user; ?></td>
          		<td><?php echo $nom; ?></td>
          		<td><?php echo $ape; ?></td>
          		<!-- <td>
          			<?php //if ($bloqueo == '1'): ?> 
          			<a href="bloqueo_manual.php?us=<?php //echo $id_user; ?>&bl=<?php //echo $bloqueo; ?>"><i class="material-icons">lock_open</i></a>	
          			<?php //else: ?>
          				<a href="bloqueo_manual.php?us=<?php //echo $id_user; ?>&bl=<?php //echo $bloqueo; ?>"><i class="material-icons red-text">lock_outline</i></a>	
          			<?php //endif; ?>
          			 
          		</td> -->
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
								location.href='eliminar_usuario.php?id_user=<?php echo $id_user; ?>';		      
						})
          			"><i class="material-icons">clear</i></a> 
          		</td>
          	</tr>
          	
          	<?php endif; }
          	$sel -> close();
          	 ?>

          </table>

          	<div class="divider black"></div>

          <?php 

		$sel = $con -> prepare("SELECT id_user,user,nom,ape,tipo FROM usuario ");

		$sel -> execute();
		$sel -> store_result();
		$sel -> bind_result($id_user, $user,$nom,$ape,$tipo);
		$row = $sel -> num_rows();
			?>

			<h5 class="blue-text">Empleado</h5>
	          <div class="divider"></div>

	          <table>
	          	<thead>
	          		<tr class="cabecera">
		          		<th>Usuario</th>
		          		<th>Nombre</th>
		          		<th>Apellido</th>
		          		<th>Eliminar</th>
	          		</tr>
	          	</thead>

	          	<?php while($sel -> fetch()){ ?>

	          	<?php if ($tipo == 3): ?>
	          
	          	<tr>
	          		<td><?php echo $user; ?></td>
	          		<td><?php echo $nom; ?></td>
	          		<td><?php echo $ape; ?></td>
	          		<!-- <td>
	          			<?php //if ($bloqueo == '1'): ?> 
	          			<a href="bloqueo_manual.php?us=<?php //echo $id_user; ?>&bl=<?php //echo $bloqueo; ?>"><i class="material-icons">lock_open</i></a>	
	          			<?php //else: ?>
	          				<a href="bloqueo_manual.php?us=<?php //echo $id_user; ?>&bl=<?php //echo $bloqueo; ?>"><i class="material-icons red-text">lock_outline</i></a>	
	          			<?php //endif; ?>
	          			 
	          		</td> -->
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
									location.href='eliminar_usuario.php?id_user=<?php echo $id_user; ?>';		      
							})
	          			"><i class="material-icons">clear</i></a> 
	          		</td>
	          	</tr>

	          	<?php endif; }
	          	$sel -> close();
	          	 ?>

	          </table>	          

	        </div>
	      </div>
	    </div>
	  </div>
	  


	<?php include '../extend/scripts.php'; ?>

</body>
</html>

