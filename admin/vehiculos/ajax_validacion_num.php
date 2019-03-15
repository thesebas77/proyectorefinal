<?php include '../conexion/conexion.php'; 

	$cuil = htmlentities($_POST['cuil']);
	

	$sel = $con -> prepare("SELECT id FROM persona WHERE cuit = ?");
	$sel -> bind_param('i',$cuil);
	$sel -> execute();
	$sel -> bind_result($num);
	$sel -> store_result();
	$row = $sel -> num_rows();

	if ($row != 0){
		echo "<label style='color:green'> El propietario esta registrado (CUIL) </label>
		<script>
				document.getElementById('btn_registrar').style.display='show';
			</script>
		";
	}else{
		echo "<label style='color:red'> El propietario no esta registrado (CUIL)
			</label>
			<script>
				document.getElementById('btn_registrar').style.display='none';
			</script>
			";
	}

	$sel -> close();

	$con -> close();
?>