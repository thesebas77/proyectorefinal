<?php include '../conexion/conexion.php'; 

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$dni = htmlentities($_POST['dni']);
		$cuil = htmlentities($_POST['cuil']);
		$nom = htmlentities($_POST['nom']);
		$ape = htmlentities($_POST['ape']);
		$dire = htmlentities($_POST['dire']);
		$ciu = htmlentities($_POST['ciu']);

		if ($dni == 0){
			$tipo = 'Juridica';
		}else{
			$tipo = 'Humana';
		}

		$id = '';
		$nul = '1231';
		$razon ='';
		$razo ='no';
		$email = 'dada@geag.com';
		$gru = 0;
		$est = 'no se';
		$obs = 'hola';


		$ins = $con -> prepare("INSERT INTO propietario VALUES (?,?,?,?,?,?,?,?,?,?,?,?) ");

		if ($dni == 0){

			$ins -> bind_param('issiissssiss',$id,$nom,$ape,$cuil,$razon,$dire,$email,$ciu,$tipo,$gru,$est,$obs);

		}else{

			$ins -> bind_param('issiissssiss',$id,$nom,$ape,$razon,$dni,$dire,$email,$ciu,$tipo,$gru,$est,$obs);
		}
		
		
		$ins -> execute();
		$ins -> close();

		if($ins){
			header('location:../extend/alerta.php?msj=Se ha registrado el propietario con exito&c=cl&p=in&t=success');
			//print "<meta http-equiv=Refresh content=\"0 ; url=\">"; 
			
		}else{

			header('location:../extend/alerta.php?msj=No se ha podido registrar el propietario&c=cl&p=in&t=error');

		}

		
		return false;
	}else{
		header('location:../extend/alerta.php?msj=Utiliza el formulario&c=salir&p=salir&t=error');
	}

	$con -> close();

?>