<?php include '../conexion/conexion.php';
	
	$fdes = htmlentities($_GET['fdes']);
	$fhas = htmlentities($_GET['fhas']);
	$pa = 1;	



		$sel = $con -> prepare(" SELECT valor, vencimiento1, vencimiento2 FROM cuota WHERE paga = ? ");

		$sel -> bind_param('i',$pa);
		$sel -> execute();
		$sel -> store_result();
		$sel -> bind_result($valor, $fven, $fven2);
		$row = $sel -> num_rows();

		if (empty($fdes) && empty($fhas)):
		else:
			 ?>


	  <div class="row">
	    <div class="col s12 m12 l12 xl12"> 

	          <table class="highlight">
	          	<thead>
	          		<tr class="cabecera">
		          		<th class="center">Total Recaudado</th>
		          		<th class="center">F.vencimiento 1</th>
		          		<th class="center">F.vencimiento 2</th>
	          		</tr>
	          	</thead>

	          	<?php while($sel -> fetch()){ ?>
	          	<tr>
	          		<td class="center">$<?php echo $valor; ?></td>
	          		<td class="center"><?php echo $fven; ?></td>
	          		<td class="center"><?php echo $fven2; ?></td>
	          	</tr>

	          	<?php }

	          endif;
	          	$sel -> close();
	          	 ?>
	         </table>
	    </div>
	  </div>

