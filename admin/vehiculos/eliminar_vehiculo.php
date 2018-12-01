<?php 
	include '../conexion/conexion.php';
	include '../extend/permiso.php';
	$dom = htmlentities($_GET['dom']);

	$del = $con -> prepare("DELETE FROM vehiculo WHERE dominio=? ");
	$del -> bind_param('s',$dom);
	$del -> execute();
	$del -> close();
	if($del){
			header('location:../extend/alerta.php?msj=El vehiculo ha sido eliminado&c=ve&p=liv&t=success');
		}else{
			header('location:../extend/alerta.php?msj=El vehiculo no ha podido ser eliminado&c=ve&p=liv&t=error');
		}

	$con -> close();
 ?>