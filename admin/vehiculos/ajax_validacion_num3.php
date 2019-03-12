<?php include '../conexion/conexion.php'; 

	$dom = htmlentities($_POST['dom']);
	

	$sel = $con -> prepare("SELECT dominio FROM padron WHERE dominio = ?");
	$sel -> bind_param('s',$dom);
	$sel -> execute();
	$sel -> bind_result($dominio);
	$sel -> store_result();
	$row = $sel -> num_rows();

	if ($row != 0){
		echo "<label style='color:red'> El dominio ya se encuentra registrado </label>		
		";
		echo "<script> $('#btn_registrar').hide(); </script>";
	}else{
		echo "<label style='color:green'> El dominio no se encuentra registrado
			</label>
			";
		echo "<script> $('#btn_registrar').show(); </script>";
	}

	$sel -> close();

	$con -> close();
?>