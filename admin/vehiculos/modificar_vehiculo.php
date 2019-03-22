<?php include '../extend/header.php';
	  include '../extend/permiso.php';

	$cod = htmlentities($_GET['dom']);

	$sel = $con -> prepare("SELECT p.baseImponible, p.anioModelo, p.dominio, p.cod_vehiculo,p.fechaAlta,pro.apellido, pro.id, v.id, v.id_marca, v.id_tipo, v.descripcion, m.marca, tv.tipo FROM padron as p INNER JOIN persona as pro ON p.propietario = pro.id INNER JOIN vehiculo as v ON p.cod_vehiculo = v.id INNER JOIN marca as m ON v.id_marca = m.id INNER JOIN tipo_vehiculo as tv ON v.id_tipo = tv.id WHERE p.dominio = ?");

		$sel -> bind_param('s',$cod);
		$sel -> execute();
		$sel -> store_result();
		$sel -> bind_result($base, $am,$dom,$cod_ve,$falta,$pro,$pro_id,$id_ve,$id_mar,$id_tip,$desc,$marca,$tipo);
		$row = $sel -> num_rows();
		if ($sel -> fetch()){}
?>

			 	<div class="row">
					<div class="col s12">
						<div class="card">
							<div class="card-content">
							

								<span class="card-title">Modificar vehiculo</span>	
					<form class="form" action="up_vehiculo.php" method="post">

									
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
									
									<input type="hidden" name="codigo" value="<?php echo $cod; ?>">

									<!-- Input Dominio -->

									<div class="input-field">
										<input type="text" name="dom" title="Ingrese la patente del vehiculo" id="dom" value="<?php echo $cod; ?>" required>
										<label for="dom">Dominio:</label>
																			
									</div>

										<div class="validacion5"></div>


									
										<!-- Año del auto -->								

										<div class="input-field col s12">
											<input type="number" value="<?php echo $am; ?>" name="anomodelo">
											<label for="anomodelo">Año del modelo: </label>
										</div>

										<?php 
										$sel = $con -> prepare('SELECT id, dni, cuit FROM persona WHERE id = ?');
												$sel -> bind_param('i',$pro_id);
												$sel -> execute();
												$sel -> bind_result($id_per1, $dni1, $cuit1);
												$sel -> store_result();

												if($sel -> fetch()){} ?>

										<!-- select persona -->
										<div class="input-field col s12">
											<select name="persona" id="persona">
												<option value="<?php echo $pro_id; ?>" disabled selected>
													<?php 

														if (empty($dni1)){
															echo $cuit1;
														}else{
															echo $dni1;
														}

													 ?>
												</option>
												<?php 
												
												
												$sel = $con -> prepare('SELECT id, dni, cuit FROM persona');
												$sel -> execute();
												$sel -> bind_result($id_per, $dni2, $cuit2);
												$sel -> store_result();

												while($sel -> fetch()){


												 ?>
												 <option value="<?php echo $id_per; ?>"><?php echo $id_per; ?> - <?php 

												 		if (empty($dni2)){
															echo $cuit2;
														}else{
															echo $dni2;
														}


												  ?></option>

											
												<?php } ?>
												  												 
												
											</select>

											<label for="persona">Cambiar de propietario</label>
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