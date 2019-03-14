<?php include '../extend/header.php'; 

		$dom = htmlentities($_GET['dominio']);

		$sel = $con -> prepare("SELECT p.cod_vehiculo,p.fechaAlta,pro.apellido, v.id, v.id_marca, v.id_tipo, v.descripcion, m.marca, tv.tipo, cu.baseImponible, p.anioModelo FROM padron as p INNER JOIN propietario as pro ON p.propietario = pro.id INNER JOIN vehiculo as v ON p.cod_vehiculo = v.id INNER JOIN marca as m ON v.id_marca = m.id INNER JOIN tipo_vehiculo as tv ON v.id_tipo = tv.id INNER JOIN cuota as cu ON p.dominio = cu.imp WHERE p.dominio = ?");
		$sel -> bind_param('s', $dom);
		$sel -> execute();
		$sel -> store_result();
		$sel -> bind_result($cod_ve,$falta,$pro,$id_ve,$id_mar,$id_tip,$desc,$marca,$tipo,$monto,$ano);
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
	          		<td class="center"><a href="../clientes/list_clientes.php"><?php echo $pro; ?></a></td>
	          		<td class="center"><?php echo $marca; ?></td>
	          		<td class="center"><?php echo $desc; ?></td>
	          		<td class="center"><?php echo $tipo; ?></td>
	          		<td class="center"><?php echo $ano; ?></td>
	          		<td class="center"><?php echo $falta; ?></td>
	          		<td class="center"> <?php echo $monto; ?> </td>		
	          		

	   </table>


	   <?php 

	   		$sel = $con -> prepare('SELECT monto FROM impuesto WHERE dom = ?');
	   		$sel -> bind_param('s', $dom);
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
	   		$sel -> bind_param('s', $dom);
	   		$sel -> execute();
	   		$sel -> store_result();
	   		$sel -> bind_result($id_cu,$imp_cu,$base, $valor, $fven, $fven2, $paga, $usu, $fpago);

	    ?>
	   <table class="highlight">
	          	<thead>
	          		<tr class="cabecera">
	          			<th class="center">Id</th>
		          		<th class="center">Cuota</th>
		          		<th class="center">Fecha V1.</th>
		          		<th class="center">Fecha V2.</th>
		          		<th class="center">Pagada</th>
		          		<th class="center">Boleta</th> 
	          		</tr>
	          	</thead>

	          	<?php while ($sel -> fetch()){ ?>
	          	<tr>
	          		<td class="center"><?php echo $id_cu; ?></td>
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
									location.href='../pagos/upcuota.php?&imp=<?php echo $imp_cu; ?>&num=<?php echo $id_cu; ?>&pa=<?php echo $paga; ?>';		      
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
									location.href='../pagos/upcuota.php?&imp=<?php echo $imp_cu; ?>&num=<?php echo $id_cu; ?>&pa=<?php echo $paga; ?>';		      
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