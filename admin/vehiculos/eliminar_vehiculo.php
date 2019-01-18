<?php 
	include '../conexion/conexion.php';
	include '../extend/permiso.php';
	$dom = htmlentities($_GET['dom']);

	$del = $con -> prepare("DELETE FROM vehiculo WHERE dominio=? ");
	$del -> bind_param('s',$dom);
	$del -> execute();
	
	if($del){

			$del = $con -> prepare("DELETE FROM baseimponible WHERE dom=? ");
			$del -> bind_param('s',$dom);
			$del -> execute();

			$del = $con -> prepare("DELETE FROM cuota WHERE imp=? ");
			$del -> bind_param('s',$dom);
			$del -> execute();

			$del = $con -> prepare("DELETE FROM impuesto WHERE dom=? ");
			$del -> bind_param('s',$dom);
			$del -> execute();

			header('location:../extend/alerta.php?msj=El vehiculo ha sido eliminado&c=ve&p=liv&t=success');
		}else{
			header('location:../extend/alerta.php?msj=El vehiculo no ha podido ser eliminado&c=ve&p=liv&t=error');
		}

	$del -> close();
	$con -> close();
 ?>