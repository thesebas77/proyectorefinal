			<?php include '../extend/header.php';
				  include '../extend/permiso.php';
				  
			 ?>

			 	<div class="row">
					<div class="col s12">
						<div class="card">
							<div class="card-content">
								<span class="card-title">Registro de propietarios</span>	
								<form class="form" action="../clientes/ins_clientes.php" method="post" enctype="multipart/form-data">

									
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
											<input type="number" name="cuil" title="Ingrese el CUIL" id="cuil" min="1000000000" max="100000000000">
											<label for="cuil">CUIL:</label>				
										</div>

											<div class="valid3"></div>

									  </div>

									<span class="card-title">Datos personales</span>

									<!-- Input nombre -->

									<div class="input-field">
										<input type="text" name="nom" title="Ingrese tu nombre" id="nom" pattern="[A-Za-z/s ]+" required>
										<label for="nom">Nombre:</label>
																			
									</div>

									<!-- Input apellido -->

									<div class="input-field">
										<input type="text" name="ape" title="Ingrese su apellido" id="ape" pattern="[A-Za-z/s ]+" required>
										<label for="ape">Apellido:</label>
																			
									</div>

									<!-- Select telefono 
									<div class="input-field">
							            <input type="text" name="tel"   id="tel"  >
							            <label for="tel">Telefono</label>
						          	</div> -->

						          	<!-- Input Email -->
									
						          	<div class="input-field">
							            <input name="email" id="email" type="email" class="validate">
							            <label for="email">Email:</label>
							            <span class="helper-text" data-error="wrong" data-success="right"></span>
							          </div>
							        

									<!-- Input dire -->

									<div class="input-field">
										<input type="text" name="dire" title="dire" id="dire" required>
										<label for="dire">Domicilio:</label>
																			
									</div>

									<div class="input-field">
										<input type="text" name="ciu" title="ciu" id="ciu" required>
										<label for="ciu">Localidad:</label>
																			
									</div>

									<!-- foto

									<div class="file-field input-field">
										<div class="btn">
											<span>Foto</span>
											<input type="file" name="foto">
										</div>

										<div class="file-path-wrapper">
											<input class="file-path validate" type="text">
										</div>
									</div>
									
									-->

									<div class="input-field col s12">
							          <textarea name="observacion" id="textarea1" class="materialize-textarea"></textarea>
							          <label for="textarea1">Observacion</label>
							        </div>
									
									<br>
									
									<!-- Input boton -->

									  <button class="btn waves-effect waves-light" type="submit" id="btn_registrar">Registrar
									    <i class="material-icons right">send</i>
									  </button>

									</div>
								</form>
							</div>
						</div>
					</div>
				</div>


			<?php include '../extend/scripts.php'; ?>
			<script src="../js/validacion3.js"></script>
			<script src="../js/validacion4.js"></script>

	</body>
</html>