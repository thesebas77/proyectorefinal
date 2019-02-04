			<?php include '../extend/header.php';
				  include '../extend/permiso.php';
			 ?>

				<div class="row">
					<div class="col s12">
						<div class="card">
							<div class="card-content">
								<span class="card-title">Registro de usuario</span>	
								<form class="form" action="ins_usuarios.php" method="post" >

									<!-- Input nick -->

									<div class="input-field">
										<input type="text" required autofocus name="user"  id="user" onblur="may(this.value, this.id)" >
										<label for="user">Usuario:</label>
									</div>

									<div class="validacion"></div>

									<!-- Input contraseña -->

									<div class="input-field">
										<input type="password" name="pass1" title="Contraseña con numeros, letras mayusculas y minusculas entre 8 y 15 caracteres" id="pass1"pattern="[a-zA-Z0-9]{8,15}" required>
										<label for="pass1">Contraseña:</label>
									</div>

									<!-- Input verificar contraseña -->

									<div class="input-field">
										<input type="password" name="pass2" title="Contraseña con numeros, letras mayusculas y minusculas entre 8 y 15 caracteres" id="pass2"pattern="[a-zA-Z0-9]{8,15}" required>
										<label for="pass2"> Verificar contraseña:</label>
									</div>

									<!-- Select tipo de usuario -->

									<select name="tipo" id="tipo" required>
										<option value="" disabled selected>Seleccione un cargo</option>
										<?php 
											$tipo = array('Administrador', 'Encargado', 'Empleado');
											$valor = array(1, 2, 3);

											for ($i = 0; $i <= count($tipo)-1; $i++){ 
										 ?>
										 <option value="<?php echo $valor[$i]; ?>"><?php echo $tipo[$i]; ?></option>

										<?php } ?>
									</select>


									<!-- Titulo-->

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

									  <button class="btn waves-effect waves-light" type="submit" id="btn_registrar">Registrar
									    <i class="material-icons right">send</i>
									  </button>

									
								</form>
							</div>
						</div>
					</div>
				</div>

			<?php include '../extend/scripts.php'; ?>

			<!-- validacion con metodo ajax -->

			<script src="../js/validacion.js"></script>

	</body>
</html>