<?php include '../extend/header.php'; 

		$dom = htmlentities($_GET['dominio']);

		$sel = $con -> prepare("SELECT padron.cod_vehiculo,padron.fechaAlta,padron.propietario FROM padron INNER JOIN vehiculo WHERE padron.dominio = ?");
		$sel -> bind_param('s', $dom);
		$sel -> execute();
		$sel -> store_result();
		$sel -> bind_result($dominio,$marca,$modelo,$tipo,$ano,$falta,$pro);
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

		<?php 
			$sel = $con -> prepare("SELECT valor FROM baseimponible WHERE dom = ?"); 
			$sel -> bind_param('s', $dom);
			$sel -> execute();
			$sel -> store_result();
			$sel -> bind_result($valor);

			if ($sel -> fetch()){}

		?>		


		<h5 class="center">Vehiculo</h5>
	    <div class="divider"></div>

		<table class="highlight">
	          	<thead>
	          		<tr class="cabecera">
		          		<th class="center">Propietario</th>
		          		<th class="center">Marca</th>
		          		<th class="center">Modelo</th>
		          		<th class="center">Tipo</th>
		          		<th class="center">Año</th>
		          		<th class="center">F. alta</th>
		          		<th class="center">Base imponible</th>
	          		</tr>
	          	</thead>

	          	<tr>
	          		<td class="center"><a href="../clientes/list_clientes.php"><?php echo $pro; ?></a></td>
	          		<td class="center"><?php echo $marca; ?></td>
	          		<td class="center"><?php echo $modelo; ?></td>
	          		<td class="center"><?php echo $tipo; ?></td>
	          		<td class="center"><?php echo $ano; ?></td>
	          		<td class="center"><?php echo $falta; ?></td>
	          		<td class="center"> <?php echo $valor; ?> </td>		
	          		

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

		   <p class="center">
	   		<strong>Emitir todo junto</strong>
	   		<br>
	   		<a href="#" class="btn green" onclick="
  				swal({
				  title: 'Estas seguro que desea emitir la boleta de pago?',
				  text: 'Al hacerlo se descargara la boleta!',
				  type: 'question',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Si, Emitir!'
				}).then(function () {
						location.href='../pagos/crearPdf2.php?dom=<?php echo $dominio; ?>&num=<?php echo $pro; ?>';		      
				})
  			"><i class="material-icons">picture_as_pdf</i></a>
  			<br>
  			 (Descuento del 10%)
	   		</p>

		 <?php 

	   		$sel = $con -> prepare('SELECT * FROM cuota WHERE imp = ?');
	   		$sel -> bind_param('s', $dominio);
	   		$sel -> execute();
	   		$sel -> store_result();
	   		$sel -> bind_result($imp,$num, $valor, $fven, $fven2, $paga);

	    ?>
	   <table class="highlight">
	          	<thead>
	          		<tr class="cabecera">
	          			<th class="center">Numero</th>
		          		<th class="center">Cuota</th>
		          		<th class="center">Fecha V1.</th>
		          		<th class="center">Fecha V2.</th>
		          		<th class="center">Pagada</th>
		          		<th class="center">Boleta</th> 
	          		</tr>
	          	</thead>

	          	<?php while ($sel -> fetch()){ ?>
	          	<tr>
	          		<td class="center"><?php echo $num; ?></td>
	          		<td class="center"><?php echo $valor; ?></td>
	          		<td class="center"><?php echo $fven; ?></td>
	          		<td class="center"><?php echo $fven2; ?></td>
	          		<?php if ($_SESSION['tipo'] == 3): ?>

	          		<td class="center">
	          			<?php if ($paga == 2):
	          				$ban = 0;?>
	          			<p>No</p>
	          			<?php else: 
	          				$ban = 1;?>
	          				<p>Si</p>
	          			<?php endif; ?>
	          		</td>
	          		
	          		<?php else: ?>

	          		<td class="center"><?php 
	          			 

	          			if ($paga == 2):
	          				$ban = 0;?>
	          				<a href="#" class="btn-floating blue center" onclick="
	          				swal({
							  title: 'Seguro que la boleta esta pagada?',
							  text: 'Si esta seguro continue!',
							  type: 'question',
							  showCancelButton: true,
							  confirmButtonColor: '#3085d6',
							  cancelButtonColor: '#d33',
							  confirmButtonText: 'Si!'
							}).then(function () {
									location.href='../pagos/upcuota.php?&imp=<?php echo $imp; ?>&num=<?php echo $num; ?>&pa=<?php echo $paga; ?>';		      
							})
	          			">No</a>
	          			<?php  	
	          			else:
	          				$ban = 1;?>
	          				<a href="#" class="btn-floating blue center" onclick="
	          				swal({
							  title: 'Seguro que quiere modificar el pago?',
							  text: 'Si esta seguro continue!',
							  type: 'question',
							  showCancelButton: true,
							  confirmButtonColor: '#3085d6',
							  cancelButtonColor: '#d33',
							  confirmButtonText: 'Si!'
							}).then(function () {
									location.href='../pagos/upcuota.php?&imp=<?php echo $imp; ?>&num=<?php echo $num; ?>&pa=<?php echo $paga; ?>';		      
							})
	          			">Si</a> 

	          			<?php endif; ?>
	          			

	          		</td>

	          	<?php endif; ?>

	          		<?php if ($ban == 1): ?>
	          		<td style="display: none;">
	          		<?php else: ?>
	          		<td class="center">
	          		<?php endif; ?>
	          			<a href="#" class="btn-floating green" onclick="
	          				swal({
							  title: 'Estas seguro que desea emitir la boleta de pago?',
							  text: 'Al hacerlo se descargara la boleta!',
							  type: 'question',
							  showCancelButton: true,
							  confirmButtonColor: '#3085d6',
							  cancelButtonColor: '#d33',
							  confirmButtonText: 'Si, Emitir!'
							}).then(function () {
									location.href='../pagos/crearPdf.php?dom=<?php echo $dominio; ?>&num=<?php echo $pro; ?>&ncuo=<?php echo $num; ?>';		      
							})
	          			"><i class="material-icons">picture_as_pdf</i></a> 
	          		</td>
	          	<?php 
	          	}
	          	
	          	 ?>
	   </table>

	   <?php $sel -> close(); ?>
			<?php include '../extend/scripts.php'; ?>

		
	</body>
</html>