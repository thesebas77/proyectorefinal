<?php include '../extend/header.php'; ?>

	<br>
	<div class="row">

		<div class="col s2 m2 l2 xl2">
			<a href="list_inactivos_clientes.php" class=" col s12 m12 l12 xl12 btn waves-effects red right">Lista</a>
		</div>

		<div class="col s8 m8 l8 xl8">
			<nav class="blue darken-3">
				<div class="nav-wrapper">
					<div class="input-field">
						<input type="search" id="buscar" autocomplete="off">
						<label for="buscar"><i class="material-icons">search</i></label>
						<i class="material-icons">close</i>
					</div>
				</div>
			</nav>
		</div>
	</div>

	<?php 

		$sel = $con -> prepare("SELECT id,nombre,apellido,razonSocial,dni,cuit,direccion,email,fechaAlta,localidad,grupo,tipo,observaciones FROM persona WHERE estado LIKE '%Regular%' ");

		$sel -> execute();
		$sel -> store_result();
		$sel -> bind_result($id_pro,$nom,$ape,$razon,$dni,$cuit,$domi,$mail,$fecha,$loca,$gru,$tipo,$obs);
		$row = $sel -> num_rows();
			 ?>
	  <div class="row">
	    <div class="col s12 m12 l12 xl12">

	 	  <p>Total de propietarios:  <?php echo $row ?></p> 

	          <table class="highlight" id="personas1">
	          	<thead>
	          		<tr class="cabecera">
		          		<th class="center">D.N.I/CUIT</th>
                        <th class="center">Apellido/Razon Social</th>
		          		<th class="center">Nombre</th>
		          		<th class="center">Domicilio</th>
		          		<th class="center">Localidad</th>
                        <th class="center">Tipo</th>
		          		<th class="center">Detalle</th>
		          		<?php if ($_SESSION['tipo'] == 3): ?>
		          		<?php else: ?>
		          		<th class="center">Modificar</th>
		          		<th class="center">Eliminar</th>
		          		<?php endif; ?>
	          		</tr>
	          	</thead>

	          	<?php while($sel -> fetch()){ ?>
	          	<tr>

	          		<td class="center"><?php if (empty($dni)){
	          			echo $cuit;
	          		}else{
	          			echo $dni; 
	          		}
	          		?></td>
	          		<td class="center"><?php if (empty($ape)){
	          			echo $razon;
	          		}else{
	          			echo $ape; 
	          		}?></td>
                    <td class="center"><?php echo $nom; ?></td>
	          		<td class="center"><?php echo $domi; ?></td>
	          		<td class="center"><?php echo $loca; ?></td>
                    <td class="center"><?php echo $tipo; ?></td>
		          		<td class="center"> 
		          			  <button data-target="modal1" onclick="enviar(this.value)" value="<?php echo $id_pro; ?>" class="btn-floating green"><i class="material-icons">visibility</i></button>

		          			
		          		</td>

		          		<?php if ($_SESSION['tipo'] == 3): ?>
		          		<?php else: ?>
		          		<td class="center"> 
		          			<a href="#" class="btn-floating blue" onclick="
		          				swal({
								  title: 'Desea modificar el propietario?',
								  text: 'Al modificarlo se van a reemplazar los datos anteriories!',
								  type: 'question',
								  showCancelButton: true,
								  confirmButtonColor: '#3085d6',
								  cancelButtonColor: '#d33',
								  confirmButtonText: 'Si, Modificar!'
								}).then(function () {
										location.href='modificar_cliente.php?id=<?php echo $id_pro; ?>';		      
								})
		          			"><i class="material-icons">autorenew</i></a> 
		          		</td>

						<td class="center"> 
		          			<a href="#" class="btn-floating red" onclick="
		          				swal({
								  title: 'Esta seguro que desea eliminar al propietario?',
								  text: 'Al hacerlo se desativaria el propietario!',
								  type: 'warning',
								  showCancelButton: true,
								  confirmButtonColor: '#3085d6',
								  cancelButtonColor: '#d33',
								  confirmButtonText: 'Si, Eliminarlo!'
								}).then(function () {
										location.href='eliminar_cliente.php?num=<?php echo $id_pro; ?>';		      
								})
		          			"><i class="material-icons">clear</i></a> 
		          		 </td>
	          		<?php endif; ?>
	          	</tr>

	          	<?php }
	          	$sel -> close();
	          	 ?>
	         </table>
	    </div>
	  </div>

        
  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Detalles</h4>

      <div class="res_modal">
      	
      </div>

    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Listo</a>
    </div>
  </div>

	<?php include '../extend/scripts.php'; ?>

	<script>



  	$(document).ready(function(){
    	$('.modal').modal();
 	 });
        
	

	function enviar(valor){
		$.get('../detalle/index.php', {
			id_pro:valor,

				beforeSend: function(){
					$('.res_modal').html("Espere un momento..");
				}
			
			}, function(respuesta){
				$('.res_modal').html(respuesta);
			}
		)
	}

	</script>

</body>
</html>