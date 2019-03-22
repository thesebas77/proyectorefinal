<?php include '../extend/header.php'; 

	$id_cu = htmlentities($_GET['id']);

	$sel = $con -> prepare('SELECT * FROM cuota WHERE id = ?');
	   		$sel -> bind_param('i', $id_cu);
	   		$sel -> execute();
	   		$sel -> store_result();
	   		$sel -> bind_result($id_cu,$imp_cu,$numpe, $valor, $fven, $fven2, $paga, $fpago);
	   		if ($sel -> fetch()){}
?>

				<div class="row">
					<div class="col s12">
						<div class="card">
							<div class="card-content">
								<span class="card-title">Modificar Cuota</span>	
								<p>En esta opcion puede cambiar los valores de la cuota seleccionada.</p>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col s2 m2 l2 xl2"></div>
					<div class="col s8 m8 l8 xl8">
					
						<form action="mod_cuota.php" method="post">
						
							<div class="input-field">
								<input class="center" title='Campo solo de lectura' type="text" name="id_cu" value="<?php echo $id_cu; ?>" readonly>
								<label for="numcu">ID</label>					
							</div>

							<div class="input-field">
								<input class="center" title='Campo solo de lectura' type="text" name="periodo" value="<?php echo $numpe; ?>" readonly>
								<label for="periodo">Periodo</label>					
							</div>

							<h6 class="center">Campos modificables</h6>
							<div class="divider"></div>

							<div class="input-field">
								<input required class="center" type="number" name="valor" value="<?php echo $valor; ?>" >
								<label for="valor">Valor</label>					
							</div>

							<button class=" col s12 m12 l12 xl12 btn waves-effects" type="submit">Modificar</button>
						
						
						</form>	


					</div>
					<div class="col s2 m2 l2 xl2"></div>
				</div>
				
			<?php include '../extend/scripts.php'; ?>

		
	</body>
</html>