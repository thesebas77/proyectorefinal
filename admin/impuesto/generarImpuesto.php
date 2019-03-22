

<!DOCTYPE html>
<html>
<head>
	<title>Generar Impuesto</title>
</head>
<body>
<?php 
include '../extend/header.php';
include '../extend/permiso.php';
include'../conexion/conexion.php';
//para cacular el impuesto al momento del alta descomenta la consulta, copia y pega debajo del insertar, si se inserto y modifica la variable de control del for por $res
/*$registro=mysqli_query($con,"SELECT impuesto.id FROM impuesto  ORDER BY 1 DESC LIMIT 1");
		while($idIm=mysqli_fetch_array($registro))
		{ para el calculo despues del insert todo el codigo de abajo va ACÁ}*/

$anio=date('Y');
$tri="TRIBUTO";
$iv="IVA";
$min="MINIMO";
$importe=0;
$descuento=0;
$cuo=0;
$au = -1;
//Traigo los parametros de la tabla parametros.
$parametro=$con ->prepare("SELECT par.valor FROM parametro AS par WHERE nombre= ?");
$parametro -> bind_param('s',$tri);
$parametro -> execute();
$parametro -> bind_result($tributo);
$parametro -> store_result();
$parametro -> fetch();
$parametro=$con ->prepare("SELECT par.valor FROM parametro AS par WHERE nombre= ?");
$parametro -> bind_param('s',$iv);
$parametro -> execute();
$parametro -> bind_result($iva);
$parametro -> store_result();
$parametro -> fetch();
$parametro=$con ->prepare("SELECT par.valor FROM parametro AS par WHERE nombre= ?");
$parametro -> bind_param('s',$min);
$parametro -> execute();
$parametro -> bind_result($minimo);
$parametro -> store_result();
$parametro -> fetch();
//traigo todos los datos del vehiculo inscripto en el padron

$sel= $con->prepare("SELECT p.*, per.id, per.grupo,v.* FROM padron as p
    JOIN persona AS per ON per.id=p.propietario
    JOIN vehiculo AS v ON v.id=p.codVehiculo ");//aca deberia ir el where con id de padron que estas por dar de baja.
$sel->execute();
$sel-> bind_result($pid,$pdom,$pcodv,$pfecha,$pprop,$paniomod,$situacion,$perId,$perGru,$vId,$vIdM,$vIdT,$descrip,$val0,$val1,$val2,$val3,$val4,$val5,$val6,$val7,$val8,$val9,$val10,$val11,$val12,$val13,$val14,$val15,$val16,$val17,$val18,$val19,$val20,$val21,$val22,$val23,$val24);
$sel -> store_result();
while($sel -> fetch())
{
	//resto al año actual el año de modelo
	$edadAuto= $anio -$paniomod;
	//dependiendo de la edad le va a coresponer un numero de valucion 
	if($edadAuto==0){$valu=$val0;}
	if($edadAuto==1){$valu=$val1;}
	if($edadAuto==2){$valu=$val2;}
	if($edadAuto==3){$valu=$val3;}
	if($edadAuto==4){$valu=$val4;}
	if($edadAuto==5){$valu=$val5;}
	if($edadAuto==6){$valu=$val6;}
	if($edadAuto==7){$valu=$val7;}
	if($edadAuto==8){$valu=$val8;}
	if($edadAuto==9){$valu=$val9;}
	if($edadAuto==10){$valu=$val10;}
	if($edadAuto==11){$valu=$vval11;}
	if($edadAuto==12){$valu=$val12;}
	if($edadAuto==13){$valu=$val13;}
	if($edadAuto==14){$valu=$val14;}
	if($edadAuto==15){$valu=$val15;}
	if($edadAuto==16){$valu=$val16;}
	if($edadAuto==17){$valu=$val17;}
	if($edadAuto==18){$valu=$val18;}
	if($edadAuto==19){$valu=$val19;}
	if($edadAuto==20){$valu=$val20;}
	if($edadAuto==21){$valu=$val21;}
	if($edadAuto==22){$valu=$val22;}
	if($edadAuto==23){$valu=$val23;}
	if($edadAuto==24){$valu=$val24;}
	if($edadAuto==25){$valu=$val25;}
	if($edadAuto > 25){$valu=60;}

	//si la edad es menor de 25 años y el iba existe
	if($iva !=0 & $edadAuto<= 25){

		$base= $valu -($valu * $iva / 100);
		
	}//si ya no se cobra iba y el auto es menor a 25 años la base imponible es igual al de nacion
	elseif ($edadAuto <= 25){

		$base= $valu;
	}else{
		//si el auto es mayor de 25 años se le asigna un valor minimo de tributo fijado en la tabla parametros
		$base=$minimo;
	}
	//calculo el valor a tributar si el auto no esta exento por ser de la muni

	if($situacion != "EXENTO" & $edadAuto <= 25)
	{
		$importe= $base * $tributo / 100;
	}
	elseif ($situacion != "EXENTO" & $edadAuto >25){
		//si el auto no es de la muni y es mayor a 25 años el valor sigue siendo el minimo
		$importe=$base;

	}
	else{
		//si el auto es de la muni el importe es 0 pero se registra igual en el padron.
		$importe=0;
	}
	if($perGru==2)
	{
		$descuento= $importe * 0.5;
		$importe= $importe - $descuento;
	}
	$insImpuesto= $con ->prepare("INSERT INTO impuesto (idpadron,importe,anio,descuento,baseImponible) VALUES (?,?,?,?,?)");
	$insImpuesto -> bind_param('ididd',$pid,$importe,$anio,$descuento,$base);
	$insImpuesto ->execute();
	echo $situacion;
	if($insImpuesto)
	{
		//traigo el ultimo id registrado en impuesto y genero las cuotas
		$registro=mysqli_query($con,"SELECT impuesto.id FROM impuesto  ORDER BY 1 DESC LIMIT 1");
		while($idIm=mysqli_fetch_array($registro))
		{
			$valorCuota=$importe /6;
			$estado = 'Activo';
			$res = include '../extend/fecha.php';
			$aa = date('Y');
			for ($i=0;$i<6;$i++){

				$num = $i+1;

				$au = $au + 2;
				$au2 = $au + 1;

				if ($au < 10 && $au2 < 10){
					$fven = '15/'.'0'.$au.'/'.$aa;
					$fven2 = '15/'.'0'.$au2.'/'.$aa;
				}elseif ($au < 10 && $au2 >= 10)
				 {
					$fven = '15/'.'0'.$au.'/'.$aa;
					$fven2 = '15/'.$au2.'/'.$aa;	
					}elseif ($au >= 10 && $au2 >=10) {
						$fven = '15/'.$au.'/'.$aa;
						$fven2 = '15/'.$au2.'/'.$aa;	
					}
												

						/*if ($au2 == 13){
							$fven2 = '20/01/'.date('Y', strtotime($anio."+ 1 year"));						
						}*/

						$cuo ++;
						

						$ins = $con -> prepare("INSERT INTO cuota (idImpuesto,numPeriodo,importe,vencimiento1,vencimiento2,estado)VALUES (?,?,?,?,?,?) ");
						$ins -> bind_param('iidsss',$idIm,$cuo,$valorCuota,$fven,$fven2,$estado);
						$ins -> execute();	
			}
						
		}
	}
	//seteo la conexion
	set_time_limit(30);
	//en el caso de el calculo despues del insert en el padron el seteo no es necesario.
}

//


?>
</body>
</html>