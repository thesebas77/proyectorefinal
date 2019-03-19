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

		$sel = $con -> prepare("SELECT * FROM bajavehiculo ");

		$sel -> execute();
		$sel -> store_result();
		$sel -> bind_result($dom,$mar,$mod,$tipo,$ano,$falta,$fbaja,$pro);
		$row = $sel -> num_rows();
			 ?>
	  <div class="row">
	    <div class="col s12 m12 l12 xl12">
	 	 
	 	 <p>Total de bajas:  <?php echo $row ?></p> 

	          <table class="highlight">
	          	<thead>
	          		<tr class="cabecera">
		          		<th class="center">Dominio</th>
		          		<th class="center">Marca</th>
		          		<th class="center">Modelo</th>
		          		<th class="center">Tipo</th>
		          		<th class="center">Año</th>
		          		<th class="center">F. alta</th>
		          		<th class="center">F. baja</th>
		          		<th class="center">Propietario</th>
		          		<?php if ($_SESSION['tipo'] == 3): ?>
		          		<?php else: ?>
		          		<th class="center">Recuperar</th>
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
	          		<td class="center"><?php echo $fbaja; ?></td>
	          		<td class="center"><p><?php echo $pro; ?></p></td>
	          		<?php if ($_SESSION['tipo'] == 3): ?>
		          	<?php else: ?>
	          		<td class="center"> 
	          			<a href="#" class="btn-floating green" onclick="
	          				swal({
							  title: 'Desea recuperar el vehiculo?',
							  text: 'Al hacerlo, se recuperara y volvera a la lista de vehiculos!',
							  type: 'question',
							  showCancelButton: true,
							  confirmButtonColor: '#3085d6',
							  cancelButtonColor: '#d33',
							  confirmButtonText: 'Si, Recuperar!'
							}).then(function () {
									location.href='recuperar_vehiculo.php?dom=<?php echo $dom; ?>';		      
							})
	          			"><i class="material-icons">directions_car</i></a> 
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