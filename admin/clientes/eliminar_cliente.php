<?php 
	include '../conexion/conexion.php';
	include '../extend/permiso.php';
	$num = htmlentities($_GET['num']);

	$del = $con -> prepare("DELETE FROM propietario WHERE num=? ");
	$del -> bind_param('i',$num);
	$del -> execute();
	$del -> close();

	$del = $con -> prepare("DELETE FROM vehiculo WHERE propietario=? ");
	$del -> bind_param('i',$num);
	$del -> execute();
	$del -> close();

	if($del){
			header('location:../extend/alerta.php?msj=El propietario ha sido eliminado, con todos sus vehiculos asociados&c=cl&p=lic&t=success');
		}else{
			header('location:../extend/alerta.php?msj=El propietario no ha podido ser eliminado&c=cl&p=lic&t=error');
		}

	$con -> close();
 ?>