			<?php include '../extend/header.php'; ?>

				<div class="row">
					<div class="col s12">
						<div class="card">
							<div class="card-content">
								<span class="card-title">Actividades</span>	
								<p>Seguimiento de cada accion de los empleados/encargados</p>
							</div>
						</div>
					</div>
				</div>


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

		$sel = $con -> prepare("SELECT usuario_id,accion,tabla,id_registro,valor,fecha FROM auditoria ");

		$sel -> execute();
		$sel -> store_result();
		$sel -> bind_result($usu,$acc,$tabla,$idreg,$valor,$fe);
		$row = $sel -> num_rows();
			 ?>
	  <div class="row">
	    <div class="col s12 m12 l12 xl12">
	 	 
	 	 <p>Total de acciones:  <?php echo $row ?></p> 

	          <table class="highlight">
	          	<thead>
	          		<tr class="cabecera">
		          		<th class="center">Usuario</th>
		          		<th class="center">Accion</th>
		          		<th class="center">Tabla</th>
		          		<th class="center">ID Registro</th>
		          		<th class="center">Fecha</th>
		          		<th class="center">Valor</th>
	          		</tr>
	          	</thead>

	          	<?php while($sel -> fetch()){ ?>
	          	<tr>
	          		<td class="center"><?php echo $usu; ?></td>
	          		<td class="center"><?php echo $acc; ?></td>
	          		<td class="center"><?php echo $tabla; ?></td>
	          		<td class="center"><?php echo $idreg; ?></td>
	          		<td class="center"><?php echo $fe; ?></td>
	          		<td class="center"><?php echo $valor; ?></td>

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