<?php include '../conexion/conexion.php'; 

	$dni = htmlentities($_POST['dni']);
	

	$sel = $con -> prepare("SELECT id FROM propietario WHERE numDocumento = ?");
	$sel -> bind_param('i',$dni);
	$sel -> execute();
	$sel -> bind_result($num);
	$sel -> store_result();
	$row = $sel -> num_rows();

	if ($row != 0){
		echo "<label style='color:green'> El propietario esta registrado (D.N.I) </label>
		<script>
				document.getElementById('btn_registrar').style.display='show';
			</script>
		";
	}else{
		echo "<label style='color:red'> El propietario no esta registrado (D.N.I)
			</label>
			<script>
				document.getElementById('btn_registrar').style.display='none';
			</script>
			";
	}

	$sel -> close();

	$con -> close();
?>