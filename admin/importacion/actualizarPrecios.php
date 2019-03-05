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


$sql=mysqli_query($con,"SELECT * FROM valuacion");
while ($vec=mysqli_fetch_array($sql))
{
	$sql2=mysqli_query($con, "SELECT v.id FROM vehiculos v JOIN marcas m ON m.id=v.id_marca 
		JOIN tipos_vehiculos t ON t.id=v.id_tipo WHERE m.origen='$vec[1]' AND m.marca='$vec[7]'
		AND t.tv='$vec[6]' AND t.tipo='$vec[9]' AND v.descripcion='$vec[8]'");
	while ($vec2=mysqli_fetch_array($sql2)) 
	{
	 	$sql3=mysqli_query($con,"UPDATE vehiculos SET okm=$vec[10],val_1=$vec[11],val_2=$vec[12],val_3=$vec[13],val_4=$vec[14],val_5=$vec[15],val_6=$vec[16],val_7=$vec[17],val_8=$vec[18],val_9=$vec[19],
				val_10=$vec[20],val_11=$vec[21],val_12=$vec[22],val_13=$vec[23],val_14=$vec[24],val_15=$vec[25],val_16=$vec[26],val_17=$vec[27],val_18=$vec[28],val_19=$vec[29],
			val_20=$vec[30],val_21=$vec[31],val_22=$vec[32],val_23=$vec[33],val_24=$vec[34] 
			WHERE id=$vec2[0]");
	}
	set_time_limit(30);
}
$affected = (int) (mysqli_affected_rows($con));
echo"se actualizo el valor de ",$affected2," vehiculos<br>";
?>
</body>
</html>
