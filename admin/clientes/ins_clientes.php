<?php include '../conexion/conexion.php'; 

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$dni = htmlentities($_POST['dni']);
		$cuit = htmlentities($_POST['cuit']);
		$nom = htmlentities($_POST['nom']);
		$ape = htmlentities($_POST['ape']);
		$razon = htmlentities($_POST['razon']);
		$dire = htmlentities($_POST['dire']);
		$ciu = htmlentities($_POST['ciu']);
		$email = htmlentities($_POST['email']);
		$gru= htmlentities($_POST['grupo']);
		$obs = htmlentities($_POST['observacion']);
		$fecha=date("d-m-Y");
		$estado="Regular";
		$usuario=$_SESSION['user'];
	
		if (empty($dni))
		{	
			$tipo = 'Juridica';
			$ins=$con->prepare("INSERT INTO propietario (razonSocial,cuit,domicilio,email,localidad,tipo,grupo,estado,observaciones) 
			VALUES ('$razon',$cuit,'$dire','$email','$ciu','$tipo',$gru,'$estado','$obs') ");
			$ins -> execute();
		}
		else{
			$tipo = 'Humana';
			echo $tipo."<br>";
			$ins = $con -> prepare("INSERT INTO propietario(nombre,apellido,dni,domicilio,email,localidad,tipo,grupo,estado,observaciones)
			 VALUES ('$nom','$ape',$dni,'$dire','$email','$ciu','$tipo',$gru,'$estado','$obs') ");
			 $ins -> execute();
		}


		if($ins){
			$log= $con->prepare("INSERT INTO auditoria");
			header('location:../extend/alerta.php?msj=Se ha registrado el propietario con exito&c=cl&p=in&t=success');
			//print "<meta http-equiv=Refresh content=\"0 ; url=\">"; 
			
		}
		else{

			header('location:../extend/alerta.php?msj=No se ha podido registrar el propietario&c=cl&p=in&t=error');

		}

		
		return false;
	}
else{
		header('location:../extend/alerta.php?msj=Utiliza el formulario&c=salir&p=salir&t=error');
	}


?>