<?php include '../extend/header.php';
	  include '../extend/permiso.php';



		$cod = htmlentities($_GET['dom']);

		$sel = $con -> prepare("SELECT * FROM vehiculo where dominio = ?");

		$sel -> bind_param('s',$cod);
		$sel -> execute();
		$sel -> store_result();
		$sel -> bind_result($dom1,$marca1,$modelo1,$tipo1,$ano1,$falta1,$propietario1);
		$row = $sel -> num_rows();

		if($sel -> fetch()){}

			$sel = $con -> prepare("SELECT valor FROM baseimponible WHERE dom = ?"); 
			$sel -> bind_param('s', $cod);
			$sel -> execute();
			$sel -> store_result();
			$sel -> bind_result($valor);

			if ($sel -> fetch()){}
			 ?>

			 	<div class="row">
					<div class="col s12">
						<div class="card">
							<div class="card-content">

								<span class="card-title">Actualizacion de vehiculo</span>	
								<form class="form" action="../vehiculos/up_vehiculo.php" method="post">

									
									<!-- Persona humano o persona juridica -->

									<span class="card-title">Datos del vehiculo</span>

									<input type="hidden" name="cod" value="<?php echo $cod ?>">

									<div class="input-field">
										<input type="text" name="num" readonly value="<?php echo $propietario1 ?>">
										<label for="num">Propietario:</label>
									</div>
									
									<!-- Input nombre -->

									<div class="input-field">
										<input type="text" name="dom" title="Ingrese la patente del vehiculo" value="<?php echo $dom1 ?>" id="dom" required>
										<label for="dom">Dominio:</label>
																			
									</div>

										<div class="validacion5"></div>


									<!-- select marca -->

									<div class="input-field col s12">
										<select name="marca" id="marca" required>
											<option value="<?php echo $marca1 ?>" selected><?php echo $marca1 ?></option>
											<?php 


											$sel = $con -> prepare('SELECT marca FROM marca');
											$sel -> execute();
											$sel -> bind_result($marca);
											$sel -> store_result();

											while($sel -> fetch()){


											 ?>
											 <option value="<?php echo $marca; ?>"><?php echo $marca; ?></option>

											 <?php }

											  ?>
											 
											
										</select>
										<label for="num">Marca:</label>
									</div>
									
									<!-- select modelo -->

									<div class="input-field col s12">

										<select name="modelo" id="modelo" required>
											<option value="<?php echo $modelo1 ?>" selected><?php echo $modelo1 ?></option>
											<?php 


											$sel1 = $con -> prepare('SELECT cod_mod FROM modelo');
											$sel1 -> execute();
											$sel1 -> bind_result($cod_mod);
											$sel1 -> store_result();

											while($sel1 -> fetch()){


											 ?>
											 <option value="<?php echo $cod_mod; ?>"><?php echo $cod_mod; ?></option>

											 <?php }

											  ?>
											 
											
										</select>

										<label for="num">Modelo:</label>
									</div>

									<!-- select tipo -->

									<div class="input-field col s12">

										<select name="tipo" id="tipo" required>
											<option value="<?php echo $tipo1 ?>" selected><?php echo $tipo1 ?></option>
											<?php 


											$sel1 = $con -> prepare('SELECT * FROM tipo');
											$sel1 -> execute();
											$sel1 -> bind_result($cod_tipo,$tipo);
											$sel1 -> store_result();

											while($sel1 -> fetch()){


											 ?>
											 <option value="<?php echo $tipo; ?>"><?php echo $tipo; ?></option>

											 <?php }

											  ?>
											 
											
										</select>
										<label for="num">Tipo:</label>
									</div>
									<!-- select año -->

									<div class="input-field col s12">

										<select name="ano" id="ano" required>
											<option value="<?php echo $ano1 ?>" selected><?php echo $ano1 ?></option>
											<?php 


											$sel1 = $con -> prepare('SELECT * FROM ano');
											$sel1 -> execute();
											$sel1 -> bind_result($anos);
											$sel1 -> store_result();

											while($sel1 -> fetch()){


											 ?>
											 <option value="<?php echo $anos; ?>"><?php echo $anos; ?></option>

											 <?php }

											  ?>
											 
											
										</select>
										<label for="num">Año:</label>
									</div>

									<!-- date fecha de alta -->

									<div class="input-field col s12">
										<input type="text" class="datepicker" name="falta" value="<?php echo $falta1 ?>">
										<label for="falta">Ingrese la fecha de alta:</label>
									</div>

									<!-- input base imponible -->
									
									<div class="input-field col s12">
										<input type="text" name="base" value="<?php echo $valor ?>">
										<label for="base">Base imponible: $</label>
									</div>

									<br>
									
									<!-- Input boton -->

									  <button class="btn waves-effect waves-light" type="submit" id="btn_registrar">modificar
									    <i class="material-icons right">send</i>
									  </button>

									
								</form>
							</div>
						</div>
					</div>
				</div>


			<?php include '../extend/scripts.php'; ?>
			
			<script src="../js/validacion3.js"></script>
			<script src="../js/validacion4.js"></script>
			<script src="../js/validacion5.js"></script>

	</body>
</html>