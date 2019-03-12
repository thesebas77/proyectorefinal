<?php include '../extend/header.php'; ?>

	<br>
	<div class="row">

		<div class="col s2 m2 l2 xl2"></div>

		<div class="col s8 m8 l8 xl8">
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

		$sel = $con -> prepare("SELECT * FROM padron ");

		$sel -> execute();
		$sel -> store_result();
		$sel -> bind_result($dom,$cod_ve,$falta,$pro);
		$row = $sel -> num_rows();
			 ?>
	  <div class="row">
	    <div class="col s12 m12 l12 xl12">
	 	 
	 	 <p>Total de vehiculos:  <?php echo $row ?></p> 

	          <table class="highlight">
	          	<thead>
	          		<tr class="cabecera">
		          		<th class="center">Dominio</th>
		          		<th class="center">Marca</th>
		          		<th class="center">Modelo</th>
		          		<th class="center">Tipo</th>
		          		<th class="center">Año</th>
		          		<th class="center">F. alta</th>
		          		<th class="center">Propietario</th>
		          		<?php if ($_SESSION['tipo'] == 3): ?>
		          		<?php else: ?>
		          		<th class="center">Modificar</th>
		          		<th class="center">Eliminar</th>
		          		<?php endif; ?>
	          		</tr>
	          	</thead>

	          	<?php while($sel -> fetch()){ ?>
	          	<tr>
	          		<td class="center"><?php echo $dom; ?></td>
	          		<td class="center"><?php echo $mar; ?></td>
	          		<td class="center"><?php echo $mod; ?></td>
	          		<td class="center"><?php echo $tipo; ?></td>
	          		<td class="center"><?php echo $ano; ?></td>
	          		<td class="center"><?php echo $falta; ?></td>
	          		<td class="center"><a href="../clientes/list_clientes.php"><?php echo $pro; ?></a></td>

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
									location.href='modificar_vehiculo.php?dom=<?php echo $dom; ?>';		      
							})
	          			"><i class="material-icons">autorenew</i></a> 
	          		</td>

					<td class="center"> 
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