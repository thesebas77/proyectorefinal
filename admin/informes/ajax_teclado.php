<?php include '../conexion/conexion.php';
	
	$fdes = htmlentities($_GET['fdes']);
	$fhas = htmlentities($_GET['fhas']);
	$pa = 1;

	



		$sel = $con -> prepare(" SELECT sum(valor) FROM cuota WHERE paga = ?, fven BETWEEN fven (?) AND fven2 (?) ");

		$sel -> bind_param('iss',$pa, $fdes, $fhas);
		$sel -> execute();
		$sel -> store_result();
		$sel -> bind_result($rec);
		$row = $sel -> num_rows();
			 ?>
	  <div class="row">
	    <div class="col s12 m12 l12 xl12"> 

	          <table class="highlight">
	          	<thead>
	          		<tr class="cabecera">
		          		<th class="center">D.N.I/CUIL</th>
		          		<th class="center">Tipo</th>
		          		<th class="center">Nombre</th>
		          		<th class="center">Apellido</th>
		          		<th class="center">Domicilio</th>
		          		<th class="center">Localidad</th>
	          		</tr>
	          	</thead>

	          	<?php while($sel -> fetch()){ ?>
	          	<tr>
	          		<td class="center"><?php echo $rec; ?></td>
	          		<td class="center"><?php echo ''; ?></td>
	          		<td class="center"><?php echo ''; ?></td>
	          		<td class="center"><?php echo ''; ?></td>
	          		<td class="center"><?php echo ''; ?></td>
	          		<td class="center"><?php echo ''; ?></td>
	          	</tr>

	          	<?php }
	          	$sel -> close();
	          	 ?>
	         </table>
	    </div>
	  </div>

