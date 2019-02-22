<?php 
	include '../conexion/conexion.php';

 	
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$user = htmlentities($_POST['usuario']);
		$pass = htmlentities($_POST['contra']);
		$candado = ' ';
		$str_u = strpos($user,$candado);
		if (is_int($str_u)){
			$user = '';
		}else{
			$usuario = $user;
		}

		$str_p = strpos($pass,$candado);
		if (is_int($str_p)){
			$pass = '';
		}else{
			$password = sha1($pass);
		}

		if ($user == null && $pass == null){
			header('location:../extend/alerta.php?msj=El formato no es correcto&c=salir&p=salir&t=error');
		}else{
			$bl = 1;
			$sel = $con -> prepare("SELECT user,pass,nom,ape,tipo,foto FROM usuario WHERE user = ? AND pass = ?");
			$sel -> bind_param('ss',$usuario,$password);
			$sel -> execute();
			$sel -> store_result();
			$sel -> bind_result($usuario,$password,$nom,$ape,$tipo,$foto);
			$row = $sel -> num_rows();
			if($row == 1){
				if ($sel -> fetch()){
					$nick = $usuario;
					$contra = $password;
					$nom1 = $nom;
					$ape1 = $ape;
					$tipo1 = $tipo;
					$foto1 = $foto;
				}

				if ($nick == $usuario && $contra == $password){
					$_SESSION['user'] = $nick;
					$_SESSION['nom'] = $nom1;
					$_SESSION['ape'] = $ape1;
					$_SESSION['tipo'] = $tipo1;
					$_SESSION['foto'] = $foto1;
					

					header('location:../extend/alerta.php?msj=Bienvenido&c=home&p=home&t=success');
	
				}
				
				$sel -> close();
			}else{
				header('location:../extend/alerta.php?msj=Nombre de usuario o contraseña incorrecta&c=salir&p=salir&t=error');
			}
		}

	}else{
		header('location:../extend/alerta.php?msj=Utiliza el formulario&c=salir&p=salir&t=error');
	}

	$con -> close();


 ?>
