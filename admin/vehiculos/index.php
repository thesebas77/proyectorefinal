	<?php include '../extend/header.php';
				  include '../extend/permiso.php';
			 ?>

			 	<div class="row">
					<div class="col s12">
						<div class="card">
							<div class="card-content">
								
								<p>
										Si el propietario del vehiculo que va a registrar, no esta registrado. hacer click <a href="../clientes/index.php">aqui</a>
								</p>

								<span class="card-title">Registro de vehiculo</span>	
					<form class="form" action="../vehiculos/ins_vehiculo.php" method="post">

									
									<!-- Persona humano o persona juridica -->

									  
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
											<input type="number" name="cuil" title="Ingrese el CUIL" id="cuil" min="10000000000" max="100000000000">
											<label for="cuil">CUIL:</label>				
										</div>

										<div class="valid3"></div>

										

									  </div>


									<span class="card-title">Datos del vehiculo</span>

									<!-- Input Dominio -->

									<div class="input-field">
										<input type="text" name="dom" title="Ingrese la patente del vehiculo" id="dom" required>
										<label for="dom">Dominio:</label>
																			
									</div>

										<div class="validacion5"></div>


									<!-- Persona humano o persona juridica -->

									  
								      <p>
										 <input class="with-gap" name="origen" type="radio" id="nacional" checked/>
										  <label for="nacional">Nacional</label>
									  </p>

									  <p>
										 <input class="with-gap" name="origen" type="radio" id="importado" />
										  <label for="importado">Importado</label>
									  </p>


							<div id="pnacional">

								 		<!-- select marca -->
										<div class="input-field col s12">
											<select name="marca" id="marca" required>
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
											<select name="tipo" class="tipo" id="tipo" required>
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
		
										<!-- date fecha de alta -->

										<div class="input-field col s12">
											<input type="text" class="datepicker" name="falta">
											<label for="falta">Ingrese la fecha de alta:</label>
										</div>

										<!-- input base imponible -->
										
										<div class="input-field col s12">
											<input type="number" name="base">
											<label for="base">Base imponible: $</label>
										</div>

										<br>

										  	
							 </div>

									  


							<div id="pimportado">
									  		<!-- select marca -->
										<div class="input-field col s12">
											<select name="marca_i" id="marca_i" required>
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
											<select name="tipo_i" class="tipo_i" id="tipo_i" required>
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
		
										<!-- date fecha de alta -->

										<div class="input-field col s12">
											<input type="text" class="datepicker" name="falta">
											<label for="falta">Ingrese la fecha de alta:</label>
										</div>

										<!-- input base imponible -->
										
										<div class="input-field col s12">
											<input type="number" name="base">
											<label for="base">Base imponible: $</label>
										</div>

										<br>
									  	
							</div>



										
										<!-- Input boton -->

										  <button class="btn waves-effect waves-light" type="submit" id="btn_registrar">Registrar
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