<?php include '../conexion/conexion.php';
	
	$pa = 1;	


		$sel = $con -> prepare(" SELECT SUM(importe) FROM cuota WHERE pagado = ?");

		$sel -> bind_param('i',$pa);
		$sel -> execute();
		$sel -> store_result();
		$sel -> bind_result($valor);
		$row = $sel -> num_rows();
			 ?>


	  <div class="row">
	    <div class="col s12 m12 l12 xl12"> 
	    	<h5 class="center">Recaudaciones</h5>
	          <table class="highlight">
	          	<thead>
	          		<tr class="cabecera">

		          		<th class="center">
		          		Total Recaudado
		          	</th>
	          		</tr>
	          	</thead>
	          	<?php
	          	 		
					
		 		?>
	          	<?php while($sel -> fetch()){ ?>
	          	<tr>
	          		<td class="center">$<?php echo $valor; ?></td>
	          	</tr>

	          	<?php }
	          		$sel -> close();
	          	 ?>
	         </table>
	    </div>
	  </div>


	  <?
	
	$pa1 = 2;	


		$sel1 = $con -> prepare(" SELECT SUM(importe) FROM cuota WHERE pagado = ?");

		$sel1 -> bind_param('i',$pa1);
		$sel1 -> execute();
		$sel1 -> store_result();
		$sel1 -> bind_result($valor1);
		$row = $sel1 -> num_rows();
			 ?>


	  <div class="row">
	    <div class="col s12 m12 l12 xl12"> 
	    	<h5 class="center">Monto impago</h5>
	          <table class="highlight">
	          	<thead>
	          		<tr class="cabecera">
	          			
		          		<th class="center">

		          		Total deuda de contribuyentes
		          	</th>
	          		</tr>
	          	</thead>
	          	<?php
	          	 		
					
		 		?>
	          	<?php while($sel1 -> fetch()){ ?>
	          	<tr>
	          		<td class="center">$<?php echo $valor1; ?></td>
	          	</tr>

	          	<?php }

	          	
	          	$sel1 -> close();
	          	 ?>
	         </table>
	    </div>
	  </div>


