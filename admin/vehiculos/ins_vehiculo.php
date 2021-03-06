<?php include '../conexion/conexion.php'; 

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$dni = htmlentities($_POST['dni']);
		$cuil = htmlentities($_POST['cuil']);
		$dom = htmlentities($_POST['dom']);
		$id_modelo = htmlentities($_POST['modelo']);
		$tipo = htmlentities($_POST['tipo']);
		$base = htmlentities($_POST['base']);
		$falta = htmlentities($_POST['falta']);
		$anmo = htmlentities($_POST['anomodelo']);

		if ($dni == 0){

					$sel = $con -> prepare("SELECT id,grupo FROM persona WHERE cuit = ?");
					$sel -> bind_param('i',$cuil);
					$sel -> execute();
					$sel -> bind_result($num,$gru);
					$sel -> store_result();
					$row = $sel -> num_rows();
					if($sel -> fetch()){}					

		}else{
					$sel = $con -> prepare("SELECT id,grupo FROM persona WHERE dni = ?");
					$sel -> bind_param('i',$dni);
					$sel -> execute();
					$sel -> bind_result($num,$gru);
					$sel -> store_result();
					$row = $sel -> num_rows();
					if($sel -> fetch()){}								
		}


		if ($gru == 2){
			$cuenta = ($base*6)/100;	
			$mont = $cuenta/2;
		}else{
			$mont = ($base*6)/100;
		}
		
		$c = $mont/6; 
		$cuo = round($c,2);
		$no = 2;
		$id_im = '';
		$activo = 'Activo';

		$ins = $con -> prepare("INSERT INTO padron VALUES (?,?,?,?,?,?,?) ");
		
		$ins -> bind_param('isisiis',$id_im,$dom,$id_modelo,$falta,$num,$anmo,$activo);
		$ins -> execute();
		

		if($ins){

			$ins = $con -> prepare("INSERT INTO impuesto VALUES (?,?,?,?,?) ");
			$ins -> bind_param('isdis',$id_im,$dom,$mont,$anmo,$base);
			$ins -> execute();
			
			$au = 0;

			if($ins){

				$res = include '../extend/fecha.php';
				$aa = date('Y');

				for ($i=0;$i<=$res;$i++){

					$num = $i+1;

					$au = $au + 2;
					$au2 = $au + 1;

					if ($au < 10 && $au2 < 10){
						$fven = '20/'.'0'.$au.'/'.$aa;
						$fven2 = '20/'.'0'.$au2.'/'.$aa;

							}elseif ($au < 10 && $au2 >= 10) {
								$fven = '20/'.'0'.$au.'/'.$aa;
								$fven2 = '20/'.$au2.'/'.$aa;	

								}elseif ($au >= 10 && $au2 >=10) {
									$fven = '20/'.$au.'/'.$aa;
									$fven2 = '20/'.$au2.'/'.$aa;	
							}
											

					//if ($au2 == 13){
					//	$fven2 = '20/01/'.date('Y', strtotime($aa."+ 1 year"));						
					//}

					$id_cuo = '';
					$id_use = '';
					$fpago = '';

					$ins = $con -> prepare("INSERT INTO cuota VALUES (?,?,?,?,?,?,?,?) ");
					$ins -> bind_param('isidssis',$id_cuo,$dom,$num,$cuo,$fven,$fven2,$no,$fpago);
					$ins -> execute();	
				}
				

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
		header('location:../extend/alerta.php?msj=Utilice el formulario&c=salir&p=salir&t=error');
	}

	$con -> close();

?>