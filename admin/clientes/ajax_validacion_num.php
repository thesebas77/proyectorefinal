<?php include '../conexion/conexion.php'; 

	$cuil = htmlentities($_POST['cuil']);
	

	$sel = $con -> prepare("SELECT num FROM propietario WHERE num = ?");
	$sel -> bind_param('i',$cuil);
	$sel -> execute();
	$sel -> bind_result($num);
	$sel -> store_result();
	$row = $sel -> num_rows();

	if ($row != 0){
		echo "<label style='color:red'> El propietario esta registrado (CUIL) </label>
		";
	}else{
		echo "<label style='color:green'> El propietario no esta registrado (CUIL)
			</label>
			";
	}

	$sel -> close();

	$con -> close();
?>