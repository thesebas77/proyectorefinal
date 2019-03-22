<?php
include '../extend/header.php';
     include '../extend/permiso.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Actualizar Tipos</title>
</head>
<body>
<?php
include'../conexion/conexion.php';


$sql=mysqli_query($con,"SELECT * FROM valuacion");
while ($vec=mysqli_fetch_array($sql)) {

	$sql2=mysqli_query($con,"SELECT vehiculo.id FROM vehiculo
		JOIN marca ON marca.id=vehiculo.id_marca
		JOIN tipo_vehiculo ON tipo_vehiculo.id=vehiculo.id_tipo
		WHERE marca.origen='$vec[1]' AND marca.marca='$vec[7]'
		AND tipo_vehiculo.tv='$vec[6]' AND tipo_vehiculo.tipo='$vec[9]'
		AND vehiculo.descripcion='$vec[8]'");

	while($vector=mysqli_fetch_array($sql2))
	{	
	 	$sql3=mysqli_query($con,"UPDATE vehiculo SET okm=$vec[10],val1=$vec[11],val2=$vec[12],val3=$vec[13],
	 		val4=$vec[14],val5=$vec[15],val6=$vec[16],val7=$vec[17],val8=$vec[18],val9=$vec[19],
			val10=$vec[20],val11=$vec[21],val12=$vec[22],val13=$vec[23],val14=$vec[24],val15=$vec[25],
			val16=$vec[26],val17=$vec[27],val18=$vec[28],val19=$vec[29],
			val20=$vec[30],val21=$vec[31],val22=$vec[32],val23=$vec[33],val24=$vec[34] 
			WHERE id=$vector[0]");}
	
	set_time_limit(30);
}
echo"
	<div class='main' id='myDiv'>
		<div class='col s12 m6'>
			<div class='card blue darken-3'>
				<div class='card-content white-text'>
					<span class='card-title'>Operación Exitosa </span>
						<p></p>
						<p>El Proceso ha actualizado</p>
					</div>
				<div class='card-action'> <a href=#'></a></div>
			</div>
		</div>
	</div>";

?>
</body>
</html>
