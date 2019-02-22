<?php include '../conexion/conexion.php';
	include '../extend/permiso.php';
		
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$user = htmlentities($_POST['user']);
		$pass1 = htmlentities($_POST['pass1']);
		$nom = htmlentities($_POST['nom']);
		$ape = htmlentities($_POST['ape']);
		$tipo = htmlentities($_POST['tipo']);

		if (empty($user)|| empty($nom)|| empty($ape)){
			header('location:../extend/alerta.php?msj=Hay un campo sin especificar&c=us&p=in&t=error');	
			exit;
		}
		/*if (!ctype_alpha($user)){
			header('location:../extend/alerta.php?msj=El nick no contiene solo letras&c=us&p=in&t=error');	
			exit;	
		}*/
		
		$caracteres = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyz";
		for ($i=0; $i < strlen($nom); $i++) { 
			$buscar = substr($nom,$i,1);
			if (strpos($caracteres,$buscar) === false){
				header('location:../extend/alerta.php?msj=El nombre no contiene solo letras&c=us&p=in&t=error');
				exit;
			}
		}

		for ($i=0; $i < strlen($ape); $i++) { 
			$buscar = substr($ape,$i,1);
			if (strpos($caracteres,$buscar) === false){
				header('location:../extend/alerta.php?msj=El apellido no contiene solo letras&c=us&p=in&t=error');
				exit;
			}
		}

		$usuario = strlen($user);
		$contra = strlen($pass1);

		if ($usuario < 8 || $usuario > 20){
			header('location:../extend/alerta.php?msj=El nick debe contener entre 8 y 20 caracteres&c=us&p=in&t=error');
			exit;
		}
		if ($contra < 8 || $contra > 15){
			header('location:../extend/alerta.php?msj=La contraseña debe contener entre 8 y 15 caracteres&c=us&p=in&t=error');	
			exit;
		}

		
		$extension = '';
		$ruta = 'foto_perfil';
		$archivo = $_FILES['foto']['tmp_name'];
		$nomarchivo = $_FILES['foto']['name'];
		$info = pathinfo($nomarchivo);
		if ($archivo != ''){
			$extension = $info['extension'];
			if ($extension == 'png' || $extension == 'PNG' || $extension == 'JPG' || $extension == 'jpg'){
				move_uploaded_file($archivo, '../perfil/foto_perfil/'.$user.'.'.$extension);
				$ruta = $ruta.'/'.$user.'.'.$extension;
			}else{
				header('location:../extend/alerta.php?msj=El formato no es valido&c=us&p=in&t=error');	
				exit;
			}
		}else{

				$ruta = 'foto_perfil/perfil.png';
			}
		
		

		$pass1 = sha1($pass1);
	
		$id_user = '';
		$ins = $con -> prepare("INSERT INTO usuario VALUES (?,?,?,?,?,?,?) ");
		$ins -> bind_param('issssis',$id_user,$user,$pass1,$nom,$ape,$tipo,$ruta);
		$ins -> execute();
		$ins -> close();

		if ($ins){
			header('location:../extend/alerta.php?msj=El usuario ha sido registrado&c=us&p=in&t=success');
				exit;

		}else{
			header('location:../extend/alerta.php?msj=El usuario no se pudo registrar&c=us&p=in&t=error');	
				exit;
		}

		$con -> close();

	}else{
		header('location:../extend/alerta.php?msj=Utiliza el formulario&c=us&p=in&t=error');
		exit;
	}

 ?>