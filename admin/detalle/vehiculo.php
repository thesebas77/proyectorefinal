<?php include '../extend/header.php'; 

		$dom = htmlentities($_GET['dominio']);

		$sel = $con -> prepare("SELECT * FROM vehiculo WHERE dominio = ?");
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
	          		<td> <?php echo $valor; ?> </td>		
	          		

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

	    ?>
	   <table class="highlight">
	          	<thead>
	          		<tr class="cabecera">
	          			<th>Numero</th>
		          		<th>Cuota</th>
		          		<th>Fecha V1.</th>
		          		<th>Fecha V2.</th>
		          		<th>Pagada</th>
		          		<th>Pagar</th>
	          		</tr>
	          	</thead>

	          	<?php while ($sel -> fetch()){ ?>
	          	<tr>
	          		<td><?php echo $num; ?></td>
	          		<td><?php echo $valor; ?></td>
	          		<td><?php echo $fven; ?></td>
	          		<td><?php echo $fven2; ?></td>
	          		<td><?php 
	          			if ($paga == 2){
	          				echo 'No'; 	
	          				$ban = 0;
	          			}else{
	          				echo "Si";
	          				$ban = 1;
	          			}
	          			

	          		?></td>

	          		<?php if ($ban == 1): ?>
	          		<td style="display: none;">
	          		<?php else: ?>
	          		<td>
	          		<?php endif; ?>
	          			<a href="#" class="btn-floating green" onclick="
	          				swal({
							  title: 'Estas seguro que desea emitir la boleta de pago?',
							  text: 'Al hacerlo podra cancelarlo mas adelante!',
							  type: 'question',
							  showCancelButton: true,
							  confirmButtonColor: '#3085d6',
							  cancelButtonColor: '#d33',
							  confirmButtonText: 'Si, Emitir!'
							}).then(function () {
									location.href='../pagos/emitir.php?dom=<?php echo $dominio; ?>';		      
							})
	          			"><i class="material-icons">attach_money</i></a> 
	          		</td>

	          	<?php 
	          	}
	          	$sel -> close();
	          	 ?>
	   </table>


			<?php include '../extend/scripts.php'; ?>

		
	</body>
</html>