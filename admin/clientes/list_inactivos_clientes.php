<?php include '../extend/header.php'; ?>

	<br>
	<div class="row">

		<div class="col s2 m2 l2 xl2">
			<a href="list_clientes.php" class=" col s12 m12 l12 xl12 btn waves-effects green right">Lista</a>
		</div>

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

	<h4 class="center">Propietarios inactivos</h4>


	<?php 

		$sel = $con -> prepare("SELECT id,nombre,apellido,razonSocial,dni,cuit,direccion,email,localidad ,grupo,tipo,observaciones FROM persona WHERE estado LIKE '%Inactivo%' ");

		$sel -> execute();
		$sel -> store_result();
		$sel -> bind_result($id_pro,$nom,$ape,$razon,$dni,$cuit,$domi,$mail,$loca,$gru,$tipo,$obs);
		$row = $sel -> num_rows();
			 ?>
	  <div class="row">
	    <div class="col s12 m12 l12 xl12">

	 	  <p>Total de propietarios:  <?php echo $row ?></p> 

	          <table class="highlight" id="personas1">
	          	<thead>
	          		<tr class="cabecera">
		          		<th class="center">D.N.I/CUIT</th>
                        <th class="center">Apellido/Razon Social</th>
		          		<th class="center">Nombre</th>
		          		<th class="center">Domicilio</th>
		          		<th class="center">Email</th>
		          		<th class="center">Localidad</th>
		          		<th class="center">Grupo</th>
                        <th class="center">Tipo</th>
                        <?php if ($_SESSION['tipo'] == 3): ?>
		          		<?php else: ?>
                        <th class="center">Recuperar</th>
                    	<?php endif; ?>
	          		</tr>
	          	</thead>

	          	<?php while($sel -> fetch()){ ?>
	          	<tr>

	          		<td class="center"><?php if (empty($dni)){
	          			echo $cuit;
	          		}else{
	          			echo $dni; 
	          		}
	          		?></td>
	          		<td class="center"><?php if (empty($ape)){
	          			echo $razon;
	          		}else{
	          			echo $ape; 
	          		}?></td>
                    <td class="center"><?php echo $nom; ?></td>
	          		<td class="center"><?php echo $domi; ?></td>
	          		<td class="center"><?php echo $mail; ?></td>
	          		<td class="center"><?php echo $loca; ?></td>
	          		<td class="center"><?php echo $gru; ?></td>
                    <td class="center"><?php echo $tipo; ?></td>
                    <?php if ($_SESSION['tipo'] == 3): ?>
		          	<?php else: ?>
	          		<td class="center"> 
	          			<a href="#" class="btn-floating green" onclick="
	          				swal({
							  title: 'Desea recuperar el propietario?',
							  text: 'Al hacerlo, se recuperara y volvera a la lista de propietarios activos!',
							  type: 'question',
							  showCancelButton: true,
							  confirmButtonColor: '#3085d6',
							  cancelButtonColor: '#d33',
							  confirmButtonText: 'Si, Recuperar!'
							}).then(function () {
									location.href='recuperar_propietario.php?id=<?php echo $id_pro; ?>';		      
							})
	          			"><i class="material-icons">supervised_user_circle</i></a> 
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