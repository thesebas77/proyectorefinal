<?php include '../extend/header.php'; ?>

	<br>
	<div class="row">

		<div class="col s2 m2 l2 xl2">
			<a href="list_clientes.php" class=" col s12 m12 l12 xl12 btn waves-effects green right">Lista</a>
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

	<h4 class="center">Propietarios inactivos</h4>


	<?php 

		$sel = $con -> prepare("SELECT id,razonSocial,dni,cuit,tipo,nombre,apellido,domicilio,grupo,localidad FROM persona WHERE estado LIKE '%Inactivo%' ");

		$sel -> execute();
		$sel -> store_result();
		$sel -> bind_result($id_pro,$razon,$dni,$cuit,$tipo,$nom,$ape,$domi,$gru,$loca);
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
	          	</tr>

	          	<?php }
	          	$sel -> close();
	          	 ?>
	         </table>
	    </div>
	  </div>

	<?php include '../extend/scripts.php'; ?>


</body>
</html>