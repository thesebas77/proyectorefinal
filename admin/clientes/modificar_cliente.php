<?php include '../extend/header.php';
	  include '../extend/permiso.php';

	  	$cod = htmlentities($_GET['id']);

		$sel = $con -> prepare("SELECT nombre,apellido,razonSocial,dni,cuit,direccion,email,localidad,tipo,grupo,estado,observaciones FROM persona where id = ?");

		$sel -> bind_param('i',$cod);
		$sel -> execute();
		$sel -> store_result();
		$sel -> bind_result($nom,$ape,$razon, $dni,$cuit,$domi,$email,$loca,$gru,$est,$tipo,$obs);
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
									  	<label for="nume">ID:</label>
									  	<input type="number" value="<?php echo $cod ?>" name="nume" readonly>	
									  </p>

									  <p>
									  	<label for="tp">Tipo:</label>
									  	<input type="text" value="Persona <?php echo $tipo ?>" name="tp" readonly>	
									  </p>
									  <br>

								      <p>
										 <input class="with-gap" name="tipo" type="radio" id="humana"value="Humana" checked/>
										  <label for="humana">Persona humana</label>
									  </p>

									  <p>
										 <input class="with-gap" name="tipo" type="radio" id="juridica" value="Juridica" />
										  <label for="juridica">Persona juridica</label>
									  </p>

									  <div id="phumana">

									  	<div class="input-field">
											<input value="<?php if(!empty($dni)){echo $dni;}  ?>" type="number" name="dni" title="Ingrese el D.N.I" id="dni" min="10000000" max="100000000" >
											<label for="dni">D.N.I:</label>				
										</div>

								
										<!-- Input nombre -->

									<div class="input-field">
										<input type="text" name="nom" title="Ingrese tu nombre" id="nom" pattern="[A-Za-z/s ]+" value="<?php echo $nom ?>" >
										<label for="nom">Nombre:</label>
																			
									</div>

									<!-- Input apellido -->

									<div class="input-field">
										<input type="text" name="ape" title="Ingrese su apellido" id="ape" pattern="[A-Za-z/s ]+" value="<?php echo $ape ?>" >
										<label for="ape">Apellido:</label>
																			
									</div>

									  </div>

									  <div id="pjuridica">

									  	<div class="input-field">
											<input value="<?php if(!empty($cuit)){echo $cuit;}?>"type="number" name="cuit" title="Ingrese el CUIT" id="cuit" min="1000000000" max="100000000000">
											<label for="cuit">CUIT:</label>				
										</div>

											
										<!-- Input nombre -->

									<div class="input-field">
										<input type="text" name="razon" title="Ingrese Razon Social" id="razon" pattern="[A-Za-z/s ]+" value="<?php echo $razon ?>">
										<label for="razon">Razon Social:</label>
																			
									</div>

									  </div>

									<span class="card-title">Datos personales</span>

									

									<!-- Select telefono 
									<div class="input-field">
							            <input type="text" name="tel"   id="tel"  >
							            <label for="tel">Telefono</label>
						          	</div> -->

						          	 	<div class="input-field">
							            <input value="<?php echo $email; ?>" name="email" id="email" type="email" class="validate">
							            <label for="email">Email:</label>
							            <span class="helper-text" data-error="wrong" data-success="right"></span>
							          </div>
																						
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
									<div class="input-field col s12">
										<select name="grupo"  id="grupo" required>
											<option value="" disabled selected>
												<?php 
													if($gru==1){echo"Es Contribuyente ";}
											 		else{echo"Es Contribuyente-Empleado ";} 
											 	?>Seleccione nuevo Grupo</option>
											<?php
											$sel = $con -> prepare('SELECT id, nombre FROM persona_grupo');
											$sel -> execute();
											$sel -> bind_result($id, $nombre);
											$sel -> store_result();

											while($sel -> fetch()){

											 ?>
											 <option value="<?php echo $id; ?>"> <?php echo $nombre; ?></option>
											 <?php 
									 
											}

								  ?>
												 
												
											</select>
										</div>

									<div class="input-field col s12">
							          <textarea name="observacion" id="textarea1" class="materialize-textarea"><?php echo $obs; ?></textarea>
							          <label for="textarea1">Observacion</label>
							        </div>
									
									<br>
									
									<!-- Input boton -->

									  <button class="btn waves-effect waves-light" type="submit" id="btn_registrar_modi">Modificar
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