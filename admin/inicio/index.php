<?php include '../extend/header.php';

	  if ($_SESSION['user'] == ''){
		print "<meta http-equiv=Refresh content=\"1 ; url=../extend/alerta.php?msj=Ingrese con su usuario&c=in2&p=in&t=error\">";
		exit;
	  }
 ?>


				<div class="parallax-container">
			      <div class="parallax"><img src="../img/background3.jpg"></div>
			      	
			      	<!-- Dentro de la pasarela -->

			    </div>
			    <div class="section white">
			      <div class="row container">
			        <h2 class="header">Inicio</h2>


			       <?php if ($_SESSION['tipo'] == 1 || $_SESSION['tipo'] == 2): ?>
			       
			       <!-- Atajos de propietarios -->
			        <div class="row">

					    <div class="col s6 m6 l6 xl6">
					      <div class="card z-depth-5">
					        <div class="card-image">
					          <img src="../img/registrar_p.jpg">
					          <span class="card-title">Registrar propietario</span>
					        </div>
					        <div class="card-content">
					          <p> Registrar propietario.</p>
					        </div>
					        <div class="card-action">
					          <a href="../clientes/index.php">Registrar</a>
					        </div>
					      </div>
					    </div>

					    <div class="col s6 m6 l6 xl6">
					      <div class="card z-depth-5">
					        <div class="card-image">
					          <img src="../img/lista_p.jpg">
					          <span class="card-title">Lista de propietarios</span>
					        </div>
					        <div class="card-content">
					          <p> Lista de propietarios.</p>
					        </div>
					        <div class="card-action">
					          <a href="../clientes/list_clientes.php">Lista</a>
					        </div>
					      </div>
					    </div>

					  </div>

					  <!-- Atajos de vehiculos -->

			        <div class="row">

					    <div class="col s6 m6 l6 xl6">
					      <div class="card z-depth-5">
					        <div class="card-image">
					          <img src="../img/registrar_v.jpg">
					          <span class="card-title">Registrar vehiculos</span>
					        </div>
					        <div class="card-content"> 
					          <p> Registrar vehiculos.</p>
					        </div>
					        <div class="card-action">
					          <a href="../vehiculos/index.php">Registrar</a>
					        </div>
					      </div>
					    </div>

					    <div class="col s6 m6 l6 xl6">
					      <div class="card z-depth-5">
					        <div class="card-image">
					          <img src="../img/lista_v.jpg">
					          <span class="card-title">Lista de vehiculos</span>
					        </div>
					        <div class="card-content"> 
					          <p> Lista de vehiculos.</p>
					        </div>
					        <div class="card-action">
					          <a href="../vehiculos/list_vehiculos.php">Lista</a>
					        </div>
					      </div>
					    </div>

					  </div>

					  <?php
					  		 else: 

					  	?>

					  	<div class="row">

						    <div class="col s6 m6 l6 xl6">
						      <div class="card z-depth-5">
						        <div class="card-image">
						          <img src="../img/lista_p.jpg">
						          <span class="card-title">Lista de propietarios</span>
						        </div>
						        <div class="card-content">
						          <p> Lista de propietarios.</p>
						        </div>
						        <div class="card-action">
						          <a href="../clientes/list_clientes.php">Lista</a>
						        </div>
						      </div>
						    </div>

						    <div class="col s6 m6 l6 xl6">
						      <div class="card z-depth-5">
						        <div class="card-image">
						          <img src="../img/lista_v.jpg">
						          <span class="card-title">Lista de vehiculos</span>
						        </div>
						        <div class="card-content">
						          <p> Lista de vehiculos.</p>
						        </div>
						        <div class="card-action">
						          <a href="../vehiculos/list_vehiculos.php">Lista</a>
						        </div>
						      </div>
						    </div>

						  </div>

						<?php endif; ?>

			      </div>
			    </div>
			    <div class="parallax-container">
			      <div class="parallax"><img src="../img/background2.jpg"></div>
			    </div>



			<?php include '../extend/scripts.php'; ?>
		
	</body>
</html>