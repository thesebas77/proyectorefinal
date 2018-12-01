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

		$sel = $con -> prepare("SELECT * FROM vehiculo ");

		$sel -> execute();
		$sel -> store_result();
		$sel -> bind_result($dom,$mar,$mod,$tipo,$ano,$falta,$pro,$base);
		$row = $sel -> num_rows();
			 ?>
	  <div class="row">
	    <div class="col s12 m12 l12 xl12">
	      <div class="card">
	        <div class="card-content">
	          <span class="card-title">Vehiculos(Total: <?php echo $row ?>)</span>
	         </div>
	 	  </div>

	          <?php if ($row != 0): ?>
	          <table class="highlight">
	          	<?php else: ?>
	          <table class="highlight">
	          	<?php endif; ?>
	          	<thead>
	          		<tr class="cabecera">
		          		<th>Dominio</th>
		          		<th>Marca</th>
		          		<th>Modelo</th>
		          		<th>Tipo</th>
		          		<th>Año</th>
		          		<th>F. alta</th>
		          		<th>Propietario</th>
		          		<th>Base imponible</th>
		          		<th>Modificar</th>
		          		<th>Eliminar</th>
	          		</tr>
	          	</thead>

	          	<?php while($sel -> fetch()){ ?>
	          	<tr>
	          		<td><?php echo $dom; ?></td>
	          		<td><?php echo $mar; ?></td>
	          		<td><?php echo $mod; ?></td>
	          		<td><?php echo $tipo; ?></td>
	          		<td><?php echo $ano; ?></td>
	          		<td><?php echo $falta; ?></td>
	          		<td><a href="../clientes/list_clientes.php"><?php echo $pro; ?></a></td>
	          		<td><?php echo $base; ?></td>

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
									location.href='modificar_vehiculo.php?dom=<?php echo $dom; ?>';		      
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
									location.href='eliminar_vehiculo.php?dom=<?php echo $dom; ?>';		      
							})
	          			"><i class="material-icons">clear</i></a> 
	          		</td>
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