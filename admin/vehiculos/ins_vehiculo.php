<?php include '../conexion/conexion.php'; 

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$dni = htmlentities($_POST['dni']);
		$cuil = htmlentities($_POST['cuil']);
		$dom = htmlentities($_POST['dom']);
		$marca = htmlentities($_POST['marca']);
		$modelo = htmlentities($_POST['modelo']);
		$tipo = htmlentities($_POST['tipo']);
		$ano = htmlentities($_POST['ano']);
		$base = htmlentities($_POST['base']);
		$falta = htmlentities($_POST['falta']);

		$mont = ($base*10)/100;
		$cuo = $mont/6; 
		$no = 2;

		$ins = $con -> prepare("INSERT INTO vehiculo VALUES (?,?,?,?,?,?,?) ");
		if ($dni == 0){
			$ins -> bind_param('ssssisi',$dom,$marca,$modelo,$tipo,$ano,$falta,$cuil);
		}else{
			$ins -> bind_param('ssssisi',$dom,$marca,$modelo,$tipo,$ano,$falta,$dni);	
		}
		
		$ins -> execute();
		

		if($ins){

			$ins = $con -> prepare("INSERT INTO impuesto VALUES (?,?) ");
			$ins -> bind_param('sd',$dom,$mont);
			$ins -> execute();
			
			$au = 0;

			if($ins){

				$res = include '../extend/fecha.php';
				$aa = date('Y');

				for ($i=0;$i<$res;$i++){

					$num = $i+1;

					$au = $au + 2;
					$au2 = $au + 1;

					$fven = '20/'.$au.'/'.$aa;
					$fven2 = '20/'.$au2.'/'.$aa;

					if ($au2 == 13){
						$fven2 = '20/01/'.$aa+1;						
					}

					$ins = $con -> prepare("INSERT INTO cuota VALUES (?,?,?,?,?,?) ");
					$ins -> bind_param('sidssi',$dom,$num,$cuo,$fven,$fven2,$no);
					$ins -> execute();	
				}
				
				$ins = $con -> prepare("INSERT INTO baseimponible VALUES(?,?,?)");
				$ins -> bind_param('sds',$dom,$base,$aa);
				$ins -> execute();

				header('location:../extend/alerta.php?msj=Se ha registrado el vehiculo con exito&c=ve&p=in&t=success');
				//print "<meta http-equiv=Refresh content=\"0 ; url=\">"; 

			}else{

				header('location:../extend/alerta.php?msj=No se ha podido registrar el vehiculo&c=ve&p=in&t=error');

			}
			
		}else{

			header('location:../extend/alerta.php?msj=No se ha podido registrar el vehiculo&c=ve&p=in&t=error');

		}

		$ins -> close();
		
		return false;
	}else{
		header('location:../extend/alerta.php?msj=Utiliza el formulario&c=salir&p=salir&t=error');
	}

	$con -> close();

?>