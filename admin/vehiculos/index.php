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
										  <label for="juridica">Persona juridica</label>
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

									<!-- Input nombre -->

									<div class="input-field">
										<input type="text" name="dom" title="Ingrese la patente del vehiculo" id="dom" required>
										<label for="dom">Dominio:</label>
																			
									</div>

										<div class="validacion5"></div>


									<!-- select marca -->

									<div class="input-field col s12">
										<select name="marca" id="marca" required>
											<option value="" disabled selected>Seleccione una marca</option>
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
									</div>
									
									<!-- select modelo -->

									<div class="input-field col s12">

										<select name="modelo" id="modelo" required>
											<option value="" disabled selected>Seleccione un modelo</option>
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
									</div>

									<!-- select tipo -->

									<div class="input-field col s12">

										<select name="tipo" id="tipo" required>
											<option value="" disabled selected>Seleccione un tipo</option>
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
									</div>
									<!-- select año -->

									<div class="input-field col s12">

										<select name="ano" id="ano" required>
											<option value="" disabled selected>Seleccione un año</option>
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
									</div>

									<!-- date fecha de alta -->

									<div class="input-field col s12">
										<input type="text" class="datepicker" name="falta">
										<label for="falta">Ingrese la fecha de alta:</label>
									</div>

									<!-- input base imponible -->
									
									<div class="input-field col s12">
										<input type="text" name="base">
										<label for="base">Base imponible: $</label>
									</div>

									<br>
									
									<!-- Input boton -->

									  <button class="btn waves-effect waves-light" type="submit" id="btn_registrar">Registrar
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