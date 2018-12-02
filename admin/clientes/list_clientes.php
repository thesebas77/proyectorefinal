<?php include '../extend/header.php'; ?>

	<br>
	<div class="row">
		<div class="col s6 m8">
			<nav class="blue darken-3">
				<div class="nav-wrapper">
					<div class="input-field">
						<input type="search" id="buscar" autocomplete="off">
						<label for="buscar"><i class="material-icons">search</i></label>
						<i class="material-icons">close</i>
					</div>
				</div>
			</nav>
		</div>
	</div>

	<?php 

		$sel = $con -> prepare("SELECT num,tipo,nom,ape,domicilio,localidad FROM propietario ");

		$sel -> execute();
		$sel -> store_result();
		$sel -> bind_result($num,$tipo,$nom,$ape,$domi,$loca);
		$row = $sel -> num_rows();
			 ?>
	  <div class="row">
	    <div class="col s12 m12 l12 xl12">
	      <div class="card">
	        <div class="card-content">
	          <span class="card-title">Propietarios(Total: <?php echo $row ?>)</span>
	          </div>
	 	  </div>

	          <table class="highlight">
	          	<thead>
	          		<tr class="cabecera">
		          		<th>D.N.I/CUIL</th>
		          		<th>Tipo</th>
		          		<th>Nombre</th>
		          		<th>Apellido</th>
		          		<th>Domicilio</th>
		          		<th>Localidad</th>
		          		<th>Detalle</th>
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
		          		<td> 
		          			<a href="../detalle/index.php?num=<?php echo $num; ?>" class="btn-floating green"><i class="material-icons">assignment</i></a> 
		          		</td>

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
										location.href='modificar_cliente.php?num=<?php echo $num; ?>';		      
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
										location.href='eliminar_cliente.php?num=<?php echo $num; ?>';		      
								})
		          			"><i class="material-icons">clear</i></a> 
		          		 </td>
	          		<?php endif; ?>
	          	</tr>

	          	<?php }
	          	$sel -> close();
	          	 ?>
	         </table>
	    </div>
	  </div>

	<?php include '../extend/scripts.php'; ?>

</body>
</html>