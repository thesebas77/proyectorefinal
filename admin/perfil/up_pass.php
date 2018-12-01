<?php include '../conexion/conexion.php';
	

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$user = $_SESSION['user'];
		$pass = htmlentities($_POST['pass1']);
		$pass = sha1($pass);

		$up = $con -> prepare("UPDATE usuario SET pass= ? WHERE user= ? ");
		$up -> bind_param('ss',$pass,$user);
		$up -> execute();
		$up -> close();
		if ($up){
			
			header('location:../extend/alerta.php?msj=El password ha sido actualizado&c=perfil&p=pe&t=success');
			
		}else{
			header('location:../extend/alerta.php?msj=El password no pudo ser actualizado&c=perfil&p=pe&t=error');
		}
		$con -> close();
	
	}else{
		header('location:../extend/alerta.php?msj=El formato no es correcto&c=salir&p=salir&t=error');
	}
 ?>