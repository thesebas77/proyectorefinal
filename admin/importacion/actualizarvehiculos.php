<?php 
     include '../extend/header.php';
     include '../extend/permiso.php';            
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
include'../conexion/conexion.php';
/*-----------------------------------------------------------------------------
Una vez creados los registros de las entidades tipos y marcas vamos a generar el registro de los modelos
el proceso se hara de a 500 registros para evitar conflictos con db
*/
$cant=1;
$desde=0;
$hasta=500;
$flag=0;
$contador=0;
$id_marca=0;
$id_vehiculo=0;
const valor=500;

for ($i=0; $i < $cant; $i++)
{ 	
	$flag=0;
 	$consulta="SELECT * FROM valuacion v WHERE v.id>$desde AND v.id<= $hasta";
 	$resultado=mysqli_query($con,$consulta);
 	while ($vec=mysqli_fetch_array($resultado)) 
 	{
 		$contador++;
 		$flag=1;
 		$selmarca=mysqli_query($con,"SELECT * FROM marcas");
		while ($vecMarc=mysqli_fetch_array($selmarca))
		{
			if($vec[1]==$vecMarc[1] & $vec[7]==$vecMarc[2])
			{
				$id_marca=$vecMarc[0];
			}

		}
		$selvehi=mysqli_query($con,"SELECT * FROM tipos_vehiculos");
		while($vecVehi=mysqli_fetch_array($selvehi))
		{	
			if($vec[6]==$vecVehi[1] & $vec[9]==$vecVehi[2])
			{
				$id_v=$vecVehi[0];
			}

		}
		
		$sql4=mysqli_query($con,"INSERT INTO vehiculos (id_marca,id_tipo,descripcion,okm,val_1,val_2,val_3,val_4,
			val_5,val_6,val_7,val_8,val_9,val_10,val_11,val_12,val_13,val_14,val_15,val_16,val_17,val_18,val_19,
			val_20,	val_21,val_22,val_23,val_24) 
			SELECT $id_marca, $id_v,'$vec[8]',$vec[10],$vec[11],$vec[12],$vec[13],$vec[14],$vec[15],$vec[16],
			$vec[17],$vec[18],$vec[19],$vec[20],$vec[21],$vec[22],$vec[23],$vec[24],$vec[25],$vec[26],$vec[27],
			$vec[28],$vec[29],$vec[30],$vec[31],$vec[32],$vec[33],$vec[34]
                FROM dual WHERE NOT EXISTS (
                SELECT id_marca,id_tipo,descripcion FROM vehiculos WHERE id_marca=$id_marca AND id_tipo=$id_v
                	AND descripcion='$vec[8]')");

	}

 	if ($flag==1) 
 	{
 		$cant++;
 		$desde=$desde + valor;
 		$hasta= $hasta + valor;
 	}
	set_time_limit(300);
}
echo "contador: ",$contador,"<br>";
echo "4to Paso: ";
echo "<a href='actualizarPrecios.php'>Actualizar Precios de Vehiculos</a><br>";
?>
</body>
</html>
