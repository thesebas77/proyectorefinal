<?php include '../conexion/conexion.php'; 

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		
		$nume = htmlentities($_POST['nume']);
		$dni = htmlentities($_POST['dni']);
		$cuil = htmlentities($_POST['cuil']);
		$nom = htmlentities($_POST['nom']);
		$ape = htmlentities($_POST['ape']);
		$dire = htmlentities($_POST['dire']);
		$ciu = htmlentities($_POST['ciu']);
		$email = htmlentities($_POST['email']);
		$obs = htmlentities($_POST['observacion']);


		if ($dni == 0){
			$tipo = 'Juridica';
		}else{
			$tipo = 'Humana';
		}

		$razon = '';

		$ins = $con -> prepare("UPDATE propietario SET  nombre=?, apellido=?, razonSocial=?, numDocumento=?, domicilio=?, email=?, localidad=?, tipo=?, observaciones=? WHERE id = ?");
		if ($dni == 0){
			$ins -> bind_param('ssiisssssi',$nom,$ape,$cuil,$razon,$dire,$email,$ciu,$tipo,$obs,$nume);
		}else{
			$ins -> bind_param('ssiisssssi',$nom,$ape,$razon,$dni,$dire,$email,$ciu,$tipo,$obs,$nume);
		}
		
		$ins -> execute();
		$ins -> close();

		if($ins){
			header('location:../extend/alerta.php?msj=Se ha actualizado el propietario con exito&c=cl&p=lic&t=success');
			//print "<meta http-equiv=Refresh content=\"0 ; url=\">"; 
			
		}else{

			header('location:../extend/alerta.php?msj=No se ha podido actualizar el propietario&c=cl&p=lic&t=error');

		}

		
		return false;
	}else{
		header('location:../extend/alerta.php?msj=Utiliza el formulario&c=salir&p=salir&t=error');
	}

	$con -> close();

?>