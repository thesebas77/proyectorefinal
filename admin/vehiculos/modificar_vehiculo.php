<?php include '../extend/header.php';
	  include '../extend/permiso.php';

	$cod = htmlentities($_GET['dom']);

	$sel = $con -> prepare("SELECT p.baseImponible, p.anioModelo, p.dominio, p.cod_vehiculo,p.fechaAlta,pro.apellido, v.id, v.id_marca, v.id_tipo, v.descripcion, m.marca, tv.tipo FROM padron as p INNER JOIN persona as pro ON p.propietario = pro.id INNER JOIN vehiculo as v ON p.cod_vehiculo = v.id INNER JOIN marca as m ON v.id_marca = m.id INNER JOIN tipo_vehiculo as tv ON v.id_tipo = tv.id WHERE p.dominio = ?");

		$sel -> bind_param('s',$cod);
		$sel -> execute();
		$sel -> store_result();
		$sel -> bind_result($base, $am,$dom,$cod_ve,$falta,$pro,$id_ve,$id_mar,$id_tip,$desc,$marca,$tipo);
		$row = $sel -> num_rows();
		if ($sel -> fetch()){}
?>

			 	<div class="row">
					<div class="col s12">
						<div class="card">
							<div class="card-content">
							

								<span class="card-title">Modificar vehiculo</span>	
					<form class="form" action="../vehiculos/up_vehiculo.php" method="post">

									
									<!-- Persona humano o persona juridica 

									  
								      <p>
										 <input class="with-gap" name="persona" type="radio" id="humana" checked/>
										  <label for="humana">Persona humana</label>
									  </p>

									  <p>
										 <input class="with-gap" name="persona" type="radio" id="juridica" />
										  <label for="juridica">Razon Social</label>
									  </p>

									  <div id="phumana">

									  	<div class="input-field">
											<input type="number" name="dni" title="Ingrese el D.N.I" id="dni" min="10000000" max="100000000">
											<label for="dni">D.N.I:</label>				
										</div>

										<div class="valid4"></div>
										

									  </div>
									  
									  <div id="pjuridica">

									  	<div class="input-field">
											<input type="number" name="cuil" title="Ingrese el CUIL" id="cuit" min="10000000000" max="100000000000">
											<label for="cuil">CUIL:</label>				
										</div>

										<div class="valid3"></div>

										

									  </div>
-->


									<!-- Input Dominio -->

									<div class="input-field">
										<input type="text" name="dom" title="Ingrese la patente del vehiculo" id="dom" value="<?php echo $cod; ?>" required>
										<label for="dom">Dominio:</label>
																			
									</div>

										<div class="validacion5"></div>


									<!-- Persona humano o persona juridica -->

									  
								       <!-- Switch -->
										  <div class="switch">
										    <label>
										      Nacional
										      <input type="checkbox">
										      <span class="lever"></span>
										      Importado
										    </label>
										  </div>



							<div id="pnacional">

								 		<!-- select marca -->
										<div class="input-field col s12">
											<select name="marca" id="marca">
												<option value="" disabled selected>Seleccione una marca</option>
												<?php 
												$ori = 'N';
												
												$sel = $con -> prepare('SELECT id, marca FROM marca WHERE origen = ?');
												$sel -> bind_param('s',$ori);
												$sel -> execute();
												$sel -> bind_result($id_marca, $marca);
												$sel -> store_result();

												while($sel -> fetch()){


												 ?>
												 <option value="<?php echo $id_marca; ?>"><?php echo $id_marca; ?> - <?php echo $marca; ?></option>

											
												<?php } ?>
												  												 
												
											</select>
										</div>

										<!-- select tipo vehiculo -->

										<div class="input-field col s12">
											<select name="tipo" class="tipo" id="tipo">
												<option value="" disabled selected>Seleccione un tipo</option>
												<?php 
												
												

												$sel = $con -> prepare('SELECT id, tipo FROM tipo_vehiculo');
												$sel -> execute();
												$sel -> bind_result($id_tipo, $tipo);
												$sel -> store_result();

												while($sel -> fetch()){


												 ?>
												 <option value="<?php echo $id_tipo; ?>"><?php echo $id_tipo; ?> - <?php echo $tipo; ?></option>
												 <?php 

												 
												}

												  ?>
												 
												
											</select>
										</div>
										

										<!-- select modelo vehiculo -->

		
										<div class="valid_ve">
											
										</div>

										  	
							 </div>

	

							<div id="pimportado">
									  		<!-- select marca -->
										<div class="input-field col s12">
											<select name="marca" id="marca_i">
												<option value="" disabled selected>Seleccione una marca</option>
												<?php 
												$orin = 'I';
												
												$sel = $con -> prepare('SELECT id, marca FROM marca WHERE origen = ?');
												$sel -> bind_param('s',$orin);
												$sel -> execute();
												$sel -> bind_result($id_marca, $marca);
												$sel -> store_result();

												while($sel -> fetch()){


												 ?>
												 <option value="<?php echo $id_marca; ?>"><?php echo $id_marca; ?> - <?php echo $marca; ?></option>

												
												 	<?php } ?>
			


												 
												
											</select>
										</div>

										<!-- select tipo vehiculo -->

										<div class="input-field col s12">
											<select name="tipo" class="tipo_i" id="tipo_i">
												<option value="" disabled selected>Seleccione un tipo</option>
												<?php 
												
												

												$sel = $con -> prepare('SELECT id, tipo FROM tipo_vehiculo');
												$sel -> execute();
												$sel -> bind_result($id_tipo, $tipo);
												$sel -> store_result();

												while($sel -> fetch()){


												 ?>
												 <option value="<?php echo $id_tipo; ?>"><?php echo $id_tipo; ?> - <?php echo $tipo; ?></option>
												 <?php 

												 
												}

												  ?>
												 
												
											</select>
										</div>

										<!-- select modelo vehiculo -->

		
										<div class="valid_vei">
											
										</div>
									  	
							</div>

										<!-- Año del auto -->								

										<div class="input-field col s12">
											<input type="number" value="<?php echo $am; ?>" name="anomodelo">
											<label for="anomodelo">Año del modelo: </label>
										</div>

										<!-- date fecha de alta -->

										<div class="input-field col s12">
											<input type="text" value="<?php echo $falta; ?>" class="datepicker" name="falta">
											<label for="falta">Ingrese la fecha de alta:</label>
										</div>

										<!-- input base imponible -->
										
										<div class="input-field col s12">
											<input type="number" value="<?php echo $base; ?>" name="base">
											<label for="base">Base imponible: $</label>
										</div>

										<br>
										
										<!-- Input boton -->

										  <button class="btn waves-effect waves-light" type="submit" id="btn_registrar">Actualizar
										    <i class="material-icons right">send</i>
										  </button>
									
								</form>


							</div>
						</div>
					</div>
				</div>

				

			<?php include '../extend/scripts.php';?>
			
			<script src="../js/validacion3.js"></script>
			<script src="../js/validacion4.js"></script>
			<script src="../js/validacion5.js"></script>
			<script src="../js/validacion_ve.js"></script>
			<script src="../js/validacion_vei.js"></script>

	</body>
</html>