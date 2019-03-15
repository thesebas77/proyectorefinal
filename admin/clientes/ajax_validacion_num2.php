<?php include '../conexion/conexion.php'; 

	$dni = htmlentities($_POST['dni']);
	
	$sel = $con -> prepare("SELECT dni FROM persona WHERE dni = ?");
	$sel -> bind_param('i',$dni);
	$sel -> execute();
	$sel -> bind_result($dni);
	$sel -> store_result();
	$row = $sel -> num_rows();

	if ($row != 0){
		echo "<label style='color:red'> El propietario esta registrado (D.N.I) </label>
			<script>
                document.getElementById('btn_registrar').style.display='none';
			</script>
		";
	}else{
		echo "<label style='color:green'> El propietario no esta registrado (D.N.I)
			</label>
			<script>
                document.getElementById('btn_registrar').style.display='block';
			</script>
			";
	}

	$sel -> close();

	$con -> close();
?>