<?php include '../conexion/conexion.php'; 

	$cuit= htmlentities($_POST['cuit']);

	$sel = $con -> prepare("SELECT cuit FROM propietario WHERE  cuit=?");
	$sel -> bind_param('s',$cuit);
	$sel -> execute();
	$sel -> bind_result($cuit);
	$sel -> store_result();
	$row = $sel -> num_rows();

	if ($row != 0){
		echo "<label style='color:red'> La Razon Social esta registrada </label>
		";
	}else{
		echo "<label style='color:green'> La Razon Social no esta registrado </label>
			";
	}

	$sel -> close();

	$con -> close();
?>