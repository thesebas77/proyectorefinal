<?php include '../extend/header.php'; ?>

	<div class="row">
		<div class="col s12">
			  <div class="card">
			    <div class="card-content">
			      <h1>Editar perfil</h1>
			    </div>
			    <div class="card-tabs">
			      <ul class="tabs tabs-fixed-width">
			        <li class="tab"><a href="#datos" class="active">Datos</a></li>
			        <li class="tab"><a href="#pass">Contraseña</a></li>
			      </ul>
			    </div>
			    <div class="card-content grey lighten-4">
			      <div id="datos">
			      		<form class="form" action="up_perfil.php" method="post">

							<!-- Input nombre -->

							<div class="input-field">
								<input type="text" name="nom" title="Ingrese tu nombre" id="nom" pattern="[a-zA-Z/s ]+" value="<?php echo $_SESSION['nom']; ?>" required>
								<label for="nom">Nombre:</label>
																	
							</div>

							<!-- Input apellido -->

							<div class="input-field">
								<input type="text" name="ape" title="Ingrese su apellido" id="ape" pattern="[a-zA-Z/s ]+" value="<?php echo $_SESSION['ape']; ?>" required>
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
							

							<!-- Input boton -->

							  <button class="btn waves-effect waves-light" type="submit">Editar
							    <i class="material-icons right">send</i>
							  </button>

									
						</form>
			      </div>
			      <div id="pass">

			      		<form class="form" action="up_pass.php" method="post">
			      			
			      			<!-- Input tu contraseña -->

							<div class="input-field">
								<input type="password" title="Contraseña con numeros, letras mayusculas y minusculas entre 8 y 15 caracteres" name='pass0' id="pass0"pattern="[a-zA-Z0-9]{8,15}" required>
								<label for="pass0">Tu contraseña:</label>
							</div>

							<div class="valid"></div>
			      			<!-- Input contraseña -->

							<div class="input-field">
								<input disabled type="password" name="pass1" title="Contraseña con numeros, letras mayusculas y minusculas entre 8 y 15 caracteres" id="pass1"pattern="[a-zA-Z0-9]{8,15}" required>
								<label for="pass1">Nueva contraseña:</label>
							</div>

							<!-- Input verificar contraseña -->

							<div class="input-field">
								<input disabled type="password" name="pass2" title="Contraseña con numeros, letras mayusculas y minusculas entre 8 y 15 caracteres" id="pass2"pattern="[a-zA-Z0-9]{8,15}" required>
								<label for="pass2"> Verificar contraseña:</label>
							</div>

							 <button class="btn waves-effect waves-light" type="submit" id="edit">Editar
							    <i class="material-icons right">send</i>
							  </button>
						</form>
			      </div>
			    </div>
			  </div>
		</div>
	</div>

<?php include '../extend/scripts.php'; ?>
<script src="../js/validacion2.js"></script>
		
</body>
</html>