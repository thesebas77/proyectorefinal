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

		$sel = $con -> prepare("SELECT p.anioModelo, p.dominio,pro.dni,pro.cuit,v.descripcion, m.marcas, tv.tipo, p.fechaBaja FROM bajavehiculo as p INNER JOIN persona as pro ON p.codPersona = pro.id INNER JOIN vehiculo as v ON p.codVehiculo = v.id INNER JOIN marca as m ON v.id_marca = m.id INNER JOIN tipo_vehiculo as tv ON v.id_tipo = tv.id");

		$sel -> execute();
		$sel -> store_result();
		$sel -> bind_result($ano,$dom,$dni,$cuit,$modelo,$marca,$tipo,$fbaja);
		$row = $sel -> num_rows();
			?>

	  <div class="row">
	    <div class="col s12 m12 l12 xl12">
	 	 
	 	 <p>Total de bajas:  <?php echo $row ?></p> 

	          <table class="highlight">
	          	<thead>
	          		<tr class="cabecera">
		          		<th class="center">Dominio</th>
		          		<th class="center">Propietario</th>
		          		<th class="center">Marca</th>
		          		<th class="center">Modelo</th>
		          		<th class="center">Tipo</th>
		          		<th class="center">Año</th>
		          		<th class="center">F. baja</th>
		          		<?php if ($_SESSION['tipo'] == 3):?>

		          		<?php else:?>
		          		<th class="center">Recuperar</th>
		          		<?php endif; ?>
	          		</tr>
	          	</thead>
	          	<?php while($sel -> fetch()){ ?>
	          	<tr>
	          		<td class="center"><?php echo $dom; ?></td>
	          		<?php if(empty($cuit)): ?>
	          		<a href="../clientes/list_clientes.php"><td class="center"><?php echo $dni; ?></td></a>
	          		<?php else: ?>
	          		<a href="../clientes/list_clientes.php"><td class="center"><?php echo $cuit; ?></td></a>
	          		<?php endif; ?>
	          		<td class="center"><?php echo $marca; ?></td>
	          		<td class="center"><?php echo $modelo; ?></td>
	          		<td class="center"><?php echo $tipo; ?></td>
	          		<td class="center"><?php echo $ano; ?></td> ?></td>
	          		<td class="center"><?php echo date('d/m/Y', strtotime($fbaja)); ?></td>
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