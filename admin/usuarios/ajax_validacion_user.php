<?php 

	include '../conexion/conexion.php';
	include '../extend/permiso.php';
	

	$user = htmlentities($_POST['user']);

	$sel = $con -> prepare("SELECT id_user FROM usuario WHERE user = ? ");
	$sel -> bind_param('s',$user);
	$sel -> execute();
	$sel -> bind_result($id_user);
	$sel -> store_result();
	$row = $sel -> num_rows();

	if ($row != 0){
		echo "<label style='color:red'> El nombre de usuario ya existe </label>";
	}else{
		echo "<label style='color:green'> El nombre de usuario esta disponible </label>";
	}
	$sel -> close();

	$con -> close();
 ?>