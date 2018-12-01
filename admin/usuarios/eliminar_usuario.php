<?php 
	include '../conexion/conexion.php';
	include '../extend/permiso.php';
	$id_user = htmlentities($_GET['id_user']);

	$del = $con -> prepare("DELETE FROM usuario WHERE id_user=? ");
	$del -> bind_param('i',$id_user);
	$del -> execute();
	$del -> close();
	if($del){
			header('location:../extend/alerta.php?msj=El usuario ha sido eliminado&c=us&p=li&t=success');
		}else{
			header('location:../extend/alerta.php?msj=El usuario no ha podido ser eliminado&c=us&p=li&t=error');
		}

	$con -> close();
 ?>