			<?php include '../extend/header.php'; ?>

				<div class="row">
					<div class="col s2 m2"></div>

					 <div class="col s8 m8">
					    <h2 class="header">Cambiar foto de perfil</h2>
					    <br><br><br>
					    <div class="card horizontal center">
					      <div class="card-image">
					        <img src="<?php echo $_SESSION['foto']; ?>" width="200" height="200">
					      </div>
					      <div class="card-stacked">
					        <div class="card-content">
					          <p>Esta es su foto actual,</p>
					          <p>¿desea cambiarla?.</p>


					          		<div class="file-field input-field">
										<div class="btn">
											<span>Foto</span>
											<input type="file" name="foto">
										</div>

										<div class="file-path-wrapper">
											<input class="file-path validate" type="text">
										</div>
								  	</div>
					        </div>
					        <div class="card-action">
					          <a href="#">Cambiar</a>
					        </div>
					      </div>
					    </div>
					  </div>	


					  <div class="col s2 m2"></div>
				</div>

			<?php include '../extend/scripts.php'; ?>

		
	</body>
</html>