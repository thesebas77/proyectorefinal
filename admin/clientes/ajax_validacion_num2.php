<?php include '../conexion/conexion.php'; 

	$dni = htmlentities($_POST['dni']);
	

	$sel = $con -> prepare("SELECT num FROM propietario WHERE num = ?");
	$sel -> bind_param('i',$dni);
	$sel -> execute();
	$sel -> bind_result($num);
	$sel -> store_result();
	$row = $sel -> num_rows();

	if ($row != 0){
		echo "<label style='color:red'> El propietario esta registrado (D.N.I) </label>
		";
	}else{
		echo "<label style='color:green'> El propietario no esta registrado (D.N.I)
			</label>
			";
	}

	$sel -> close();

	$con -> close();
?>