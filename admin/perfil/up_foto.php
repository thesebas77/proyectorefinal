<?php include '../conexion/conexion.php';
		
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$user = $_SESSION['user'];
		$foto = $_SESSION['foto'];

		
		$extension = '';
		$ruta = 'foto_perfil';
		$archivo = $_FILES['foto']['tmp_name'];
		$nomarchivo = $_FILES['foto']['name'];
		$info = pathinfo($nomarchivo);
		if ($archivo != ''){
			$extension = $info['extension'];
			if ($extension == 'png' || $extension == 'PNG' || $extension == 'JPG' || $extension == 'jpg'|| $extension == 'JPEG' || $extension == 'jpeg'){
				
				if($foto != 'foto_perfil/perfil.png'){
					unlink($foto);
				}
				
				$rand = rand(000,999);
				move_uploaded_file($archivo, '../perfil/foto_perfil/'.$user.$rand.'.'.$extension);
				$ruta = $ruta.'/'.$user.$rand.'.'.$extension;
			}else{
				header('location:../extend/alerta.php?msj=El formato no es valido&c=us&p=in&t=error');	
				exit;
			}
		}else{

				$ruta = 'foto_perfil/perfil.png';
			}
		
	
		$up = $con -> prepare("UPDATE usuario SET foto=? WHERE user=? ");
		$up -> bind_param('ss',$ruta,$user);
		$up -> execute();
		$up -> close();

		if ($up){
			$_SESSION['foto'] = $ruta;

			header('location:../extend/alerta.php?msj= Se ha actualizado la foto&c=perfil&p=fp&t=success');
				exit;

				

		}else{
			header('location:../extend/alerta.php?msj=No se pudo actualizar la foto&c=perfil&p=fp&t=error');	
				exit;
		}

		$con -> close();

	}else{
		header('location:../extend/alerta.php?msj=Utiliza el formulario&c=us&p=in&t=error');
		exit;
	}

 ?>