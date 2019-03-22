<?php include '../extend/header.php'; 

		$dom = htmlentities($_GET['dominio']);

		$sel = $con -> prepare("SELECT p.id,p.codVehiculo,p.fechaAlta,pro.id,pro.apellido,pro.razonSocial, v.id, v.id_marca, v.id_tipo, v.descripcion, m.marcas, tv.tipo, p.anioModelo, im.baseImponible FROM padron as p INNER JOIN persona as pro ON p.propietario = pro.id INNER JOIN vehiculo as v ON p.codVehiculo = v.id INNER JOIN marca as m ON v.id_marca = m.id INNER JOIN tipo_vehiculo as tv ON v.id_tipo = tv.id INNER JOIN impuesto as im ON p.dominio = im.dom WHERE p.dominio = ?");
		$sel -> bind_param('s', $dom);
		$sel -> execute();
		$sel -> store_result();
		$sel -> bind_result($id_padron,$cod_ve,$falta,$id_pro,$pro,$razon,$id_ve,$id_mar,$id_tip,$desc,$marca,$tipo,$ano,$base);
		$row = $sel -> num_rows();

		if ($sel -> fetch()){}
?>

				<div class="row">
					<div class="col s12">
						<div class="card transparent center">
							<div class="card-content">
								<span class="card-title">Dominio: <?php echo $dom ?></span>	
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
	          		<?php if(empty($pro)): ?>
	          			<td class="center"><a href="../clientes/list_clientes.php"><?php echo $razon; ?></a></td>
	          		<?php else: ?>
	          			<td class="center"><a href="../clientes/list_clientes.php"><?php echo $pro; ?></a></td>
	          		<?php endif; ?>
	          		<td class="center"><?php echo $marca; ?></td>
	          		<td class="center"><?php echo $desc; ?></td>
	          		<td class="center"><?php echo $tipo; ?></td>
	          		<td class="center"><?php echo $ano; ?></td>
	          		<td class="center"><?php echo $falta; ?></td>
	          		<td class="center"> $<?php echo $base; ?> </td>		
	          		

	   </table>


	   <?php 

	   		$sel = $con -> prepare('SELECT id,monto FROM impuesto WHERE dom = ?');
	   		$sel -> bind_param('s', $dom);
	   		$sel -> execute();
	   		$sel -> store_result();
	   		$sel -> bind_result($id_impuesto,$monto);

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
						location.href='../pagos/crearPdf2.php?dom=<?php echo $dom; ?>&num=<?php echo $id_pro; ?>';		      
				})
  			"><i class="material-icons">picture_as_pdf</i></a>
  			<br>
  			 (Descuento del 10%)
	   		</p>

		 <?php 

	   		$sel = $con -> prepare('SELECT * FROM cuota WHERE dom = ?');
	   		$sel -> bind_param('s', $dom);
	   		$sel -> execute();
	   		$sel -> store_result();
	   		$sel -> bind_result($id_cu,$imp_cu,$numpe, $valor, $fven, $fven2, $paga, $fpago);

	    ?>
	   <table class="highlight">
	          	<thead>
	          		<tr class="cabecera">
	          			<th class="center">Numero</th>
		          		<th class="center">Cuota</th>
		          		<th class="center">Fecha V1.</th>
		          		<th class="center">Fecha V2.</th>
		          		<?php if ($_SESSION['tipo'] != 3): ?>
		          		<th class="center">Modificar</th>
		          		<?php endif; ?>
		          		<th class="center">Pagada</th>
		          		<th class="center">Boleta</th> 
	          		</tr>
	          	</thead>

	          	<?php while ($sel -> fetch()){ ?>
	          	<tr>
	          		<td class="center"><?php echo $numpe; ?></td>
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

	          		<td class="center">
	          			<a href="#" class="btn-floating blue" onclick="
	          				swal({
							  title: 'Estas seguro que desea modificar la cuota?',
							  text: 'Al hacerlo cambiara solo la de este periodo!',
							  type: 'question',
							  showCancelButton: true,
							  confirmButtonColor: '#3085d6',
							  cancelButtonColor: '#d33',
							  confirmButtonText: 'Si, Modificar!'
							}).then(function () {
									location.href='../pagos/modificar_cuota.php?id=<?php echo $id_cu;?>';		      
							})
	          			"><i class="material-icons">autorenew</i></a> 
	          		</td>

	          		<td class="center"><?php 
	          			 

	          			if ($paga == 2):
	          				$ban = 0;?>
	          				<a href="#" class="btn-floating red center" onclick="
	          				swal({
							  title: 'Seguro que la boleta esta pagada?',
							  text: 'Si esta seguro continue!',
							  type: 'question',
							  showCancelButton: true,
							  confirmButtonColor: '#3085d6',
							  cancelButtonColor: '#d33',
							  confirmButtonText: 'Si!'
							}).then(function () {
									location.href='../pagos/upcuota.php?&imp=<?php echo $imp_cu; ?>&num=<?php echo $id_cu; ?>&pa=<?php echo $paga; ?>';		      
							})
	          			">No</a>
	          			<?php  	
	          			else:
	          				$ban = 1;?>
	          				<?php if ($_SESSION['tipo'] == 1): ?>
	          				<a href="#" class="btn-floating orange center" onclick="
	          				swal({
							  title: 'Seguro que quiere modificar el pago?',
							  text: 'Si esta seguro continue!',
							  type: 'question',
							  showCancelButton: true,
							  confirmButtonColor: '#3085d6',
							  cancelButtonColor: '#d33',
							  confirmButtonText: 'Si!'
							}).then(function () {
									location.href='../pagos/upcuota.php?&imp=<?php echo $imp_cu; ?>&num=<?php echo $id_cu; ?>&pa=<?php echo $paga; ?>';		      
							})
	          			">Si</a> 
	          				<?php else: ?>
	          					<div class="center">Si</div>
	          				<?php endif; ?>
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
									location.href='../pagos/crearPdf.php?dom=<?php echo $dom; ?>&num=<?php echo $id_pro; ?>&ncuo=<?php echo $numpe; ?>';		      
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