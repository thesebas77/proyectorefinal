<?php include '../conexion/conexion.php'; 

	$id_tipo = htmlentities($_POST['id_tipo']);
	$id_marca = htmlentities($_POST['id_marca']);
	

	?>


	<div class="input-field col s12">
		<select name="modelo" id="modelo" required>
			<option value="" disabled selected>Seleccione un modelo</option>
			<?php 
			

			$sel = $con -> prepare('SELECT id, descripcion FROM vehiculo WHERE id_marca = ? AND id_tipo = ?');
			$sel -> bind_param('ii',$id_marca, $id_tipo);
			$sel -> execute();
			$sel -> bind_result($id_vehiculo, $descripcion);
			$sel -> store_result();

			while($sel -> fetch()){


			 ?>
			 <option value="<?php echo $id_vehiculo; ?>"><?php echo $descripcion; ?></option>

			 <?php }

			  ?>
			 
			
		</select>
	</div>
	


<script>
		$('select').material_select();
</script>
