<?php include '../conexion/conexion.php'; 

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$nick = htmlentities($_POST['nick']);
		$pass = htmlentities($_POST['pass1']);
		$nom = htmlentities($_POST['nom']);
		$ape = htmlentities($_POST['ape']);
		$correo = htmlentities($_POST['email']);
		$tel = htmlentities($_POST['tel']);
		$dire = htmlentities($_POST['dire']);

		print($nick);
		print($pass);
		print($nom);
		print($ape);
		print($correo);
		print($tel);
		print($dire);

		$usuario = strlen($nick);
		$contra = strlen($pass);

		if ($usuario < 4 || $usuario > 20){
			header('location:../extend/alerta.php?msj=El nick debe contener entre 4 y 20 caracteres&c=cl&p=in&t=error');
			exit;
		}
		if ($contra < 8 || $contra > 15){
			header('location:../extend/alerta.php?msj=La contraseña debe contener entre 8 y 15 caracteres&c=cl&p=in&t=error');	
			exit;
		}

		if (empty($correo)){
			if(!filter_var($correo,FILTER_VALIDATE_EMAIL)){
				header('location:../extend/alerta.php?msj=El email no es valido&c=cl&p=in&t=error');	
				exit;
			}
		}

		$pass = sha1($pass);
		$edad = 1;
		$bl = 1;
		$id_cl ='';

		$ins = $con -> prepare("INSERT INTO cliente VALUES (?,?,?,?,?,?,?,?,?,?) ");
		$ins -> bind_param('isssssssii',$id_cl,$nick,$pass,$nom,$ape,$correo,$tel,$dire,$edad,$bl);
		$ins -> execute();
		$ins -> close();

		if($ins){
			print "<meta http-equiv=Refresh content=\"1 ; url=../extend/alerta.php?msj=Se ha registrado el usuario con exito&c=home&p=in&t=success\">"; 
			
		}else{

			print "<meta http-equiv=Refresh content=\"1 ; url=../extend/alerta.php?msj=No se ha podido registrar el usuario&c=cl&p=in&t=error\">"; 
			
		}

		$con -> close();
	}else{
		header('location:../extend/alerta.php?msj=Utiliza el formulario&c=salir&p=salir&t=error');
	}

?>