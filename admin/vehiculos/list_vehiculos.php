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
		$act = 'Activo';

		$sel = $con -> prepare("SELECT p.anioModelo, p.dominio, p.cod_vehiculo,p.fechaAlta,pro.apellido,pro.dni,pro.cuit, v.id, v.id_marca, v.id_tipo, v.descripcion, m.marca, tv.tipo FROM padron as p INNER JOIN persona as pro ON p.propietario = pro.id INNER JOIN vehiculo as v ON p.cod_vehiculo = v.id INNER JOIN marca as m ON v.id_marca = m.id INNER JOIN tipo_vehiculo as tv ON v.id_tipo = tv.id WHERE p.situacion = ?");

		$sel -> bind_param('s',$act);
		$sel -> execute();
		$sel -> store_result();
		$sel -> bind_result($am,$dom,$cod_ve,$falta,$pro,$dni,$cuit,$id_ve,$id_mar,$id_tip,$desc,$marca,$tipo);
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
	          		<td class="center"><?php echo $marca; ?></td>
	          		<td class="center"><?php echo $desc; ?></td>
	          		<td class="center"><?php echo $tipo; ?></td>
	          		<td class="center"><?php echo $am; ?></td>
	          		<td class="center"><?php echo $falta; ?></td>
	          	
	          		<td class="center"> <a href="../clientes/list_clientes.php"><?php if (empty($dni)){
	          			echo $cuit;
	          		}else{
	          			echo $dni; 
	          		}
	          		?></a></td> 

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