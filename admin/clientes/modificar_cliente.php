<?php include '../extend/header.php';
	  include '../extend/permiso.php';

	  	$cod = htmlentities($_GET['num']);

		$sel = $con -> prepare("SELECT * FROM propietario where num = ?");

		$sel -> bind_param('i',$cod);
		$sel -> execute();
		$sel -> store_result();
		$sel -> bind_result($num,$tipo,$nom,$ape,$domi,$loca);
		$row = $sel -> num_rows();

		if($sel -> fetch()){}
				  
			 ?>

			 	<div class="row">
					<div class="col s12">
						<div class="card">
							<div class="card-content">
								<span class="card-title">Actualizacion de propietarios</span>	

									<form class="form" action="../clientes/up_cliente.php" method="post" >

									<!-- Persona humano o persona juridica -->

									  <p>
									  	<label for="nume">D.N.I/CUIL:</label>
									  	<input type="number" value="<?php echo $cod ?>" name="nume" readonly>	
									  </p>

									  <p>
									  	<label for="tp">Tipo:</label>
									  	<input type="text" value="Persona <?php echo $tipo ?>" name="tp" readonly>	
									  </p>

									  <p class="red-text">
									  	Estos datos debe ingresarlos nuevamente para modificar: PERSONA (HUMANA/JURIDICA), (D.N.I/CUIL).
									  </p>

									  <br>

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
										<input type="text" name="nom" title="Ingrese tu nombre" id="nom" pattern="[A-Za-z/s ]+" value="<?php echo $nom ?>" required>
										<label for="nom">Nombre:</label>
																			
									</div>

									<!-- Input apellido -->

									<div class="input-field">
										<input type="text" name="ape" title="Ingrese su apellido" id="ape" pattern="[A-Za-z/s ]+" value="<?php echo $ape ?>" required>
										<label for="ape">Apellido:</label>
																			
									</div>

									<!-- Select telefono 
									<div class="input-field">
							            <input type="text" name="tel"   id="tel"  >
							            <label for="tel">Telefono</label>
						          	</div> -->
																						
									<!-- Input dire -->

									<div class="input-field">
										<input type="text" name="dire" title="dire" id="dire" value="<?php echo $domi ?>" required>
										<label for="dire">Domicilio:</label>
																			
									</div>

									<div class="input-field">
										<input type="text" name="ciu" title="ciu" id="ciu" value="<?php echo $loca ?>" required>
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
									
									<br>
									
									<!-- Input boton -->

									  <button class="btn waves-effect waves-light" type="submit" id="btn_registrar">Modificar
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

	</body>
</html>