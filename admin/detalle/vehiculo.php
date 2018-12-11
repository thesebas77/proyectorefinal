<?php include '../extend/header.php'; 

		$dom = htmlentities($_GET['dominio']);

		$sel = $con -> prepare("SELECT * FROM vehiculo WHERE dominio = ?");
		$sel -> bind_param('s', $dom);
		$sel -> execute();
		$sel -> store_result();
		$sel -> bind_result($dominio,$marca,$modelo,$tipo,$ano,$falta,$pro,$base);
		$row = $sel -> num_rows();

		if ($sel -> fetch()){}
?>

				<div class="row">
					<div class="col s12">
						<div class="card transparent center">
							<div class="card-content">
								<span class="card-title">Dominio: <?php echo $dominio; ?></span>	
								<p>Estado de pagos</p>
							</div>
						</div>
					</div>
				</div>


		<h5 class="center">Vehiculo</h5>
	    <div class="divider"></div>

		<table class="highlight">
	          	<thead>
	          		<tr class="cabecera">
		          		<th>Propietario</th>
		          		<th>Marca</th>
		          		<th>Modelo</th>
		          		<th>Tipo</th>
		          		<th>Año</th>
		          		<th>F. alta</th>
		          		<th>Base imponible</th>
	          		</tr>
	          	</thead>

	          	<tr>
	          		<td><a href="../clientes/list_clientes.php"><?php echo $pro; ?></a></td>
	          		<td><?php echo $marca; ?></td>
	          		<td><?php echo $modelo; ?></td>
	          		<td><?php echo $tipo; ?></td>
	          		<td><?php echo $ano; ?></td>
	          		<td><?php echo $falta; ?></td>
	          		<td><?php echo $base; ?></td>

	   </table>


	   <?php 

	   		$sel = $con -> prepare('SELECT monto FROM impuesto WHERE dom = ?');
	   		$sel -> bind_param('s', $dominio);
	   		$sel -> execute();
	   		$sel -> store_result();
	   		$sel -> bind_result($monto);

	   		if ($sel -> fetch()){}

	    ?>


		   <div class="divider"></div>
		   <h5 class="center">Cuotas</h5>
		   <div class="divider"></div>
		   <p class="center"><b>Monto total:</b> $<?php echo $monto; ?></p>


		 <?php 

	   		$sel = $con -> prepare('SELECT * FROM cuota WHERE imp = ?');
	   		$sel -> bind_param('s', $dominio);
	   		$sel -> execute();
	   		$sel -> store_result();
	   		$sel -> bind_result($imp,$num, $valor, $fven, $fven2, $paga);

	   		if ($sel -> fetch()){}

	    ?>
	   <table class="highlight">
	          	<thead>
	          		<tr class="cabecera">
		          		<th>Cuota</th>
		          		<th>Pagada</th>
		          		<th>Pagar</th>
	          		</tr>
	          	</thead>

	          	<tr>
	          		<td><?php echo $monto; ?></td>
	          		<td><?php echo $falta; ?></td>
	          		<td><?php echo $base; ?></td>

	          	<?php 
	          	$sel -> close();
	          	 ?>
	   </table>


			<?php include '../extend/scripts.php'; ?>

		
	</body>
</html>