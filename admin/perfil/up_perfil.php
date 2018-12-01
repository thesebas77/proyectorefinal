<?php include '../conexion/conexion.php';
	
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$user = $_SESSION['user'];
		$nom = htmlentities($_POST['nom']);
		$ape = htmlentities($_POST['ape']);

		$up = $con -> prepare("UPDATE usuario SET nom=?, ape=? WHERE user=? ");
		$up -> bind_param('sss',$nom,$ape,$user);
		$up -> execute();
		$up -> close();

		if ($up){
			$_SESSION['nom'] = $nom;
			$_SESSION['ape'] = $ape;
			header('location:../extend/alerta.php?msj=Datos actualizados&c=perfil&p=pe&t=success');
		}else{
			header('location:../extend/alerta.php?msj=Datos no actualizados&c=perfil&p=pe&t=error');
		}
		$con -> close();
	}else{
		header('location:../extend/alerta.php?msj=El formato no es correcto&c=salir&p=salir&t=error');
	}
	
 ?>