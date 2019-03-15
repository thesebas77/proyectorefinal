<?php include '../conexion/conexion.php'; 

	$cuit= htmlentities($_POST['cuit']);

	$sel = $con -> prepare("SELECT id FROM persona WHERE cuit = ?");
	$sel -> bind_param('i',$cuit);
	$sel -> execute();
	$sel -> bind_result($cuit);
	$sel -> store_result();
	$row = $sel -> num_rows();

	if ($row != 0){
		echo "<label style='color:red'> La Razon Social esta registrada </label>
			<script>
                document.getElementById('btn_registrar').style.display='none';
			</script>
		";
	}else{
		echo "<label style='color:green'> La Razon Social no esta registrado </label>
			<script>
                document.getElementById('btn_registrar').style.display='block';
			</script>
			";
	}

	$sel -> close();

	$con -> close();
?>