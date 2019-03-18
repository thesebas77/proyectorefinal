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
$flag=0;
$id_marca=0;
$id_v=0;

 $consulta="SELECT origen,tv,marca,descripcion,tipo FROM valuacion";
 $resultado=mysqli_query($con,$consulta);
 	while ($vec=mysqli_fetch_array($resultado)) 
 	{	
 		
 		$flag=1;
 		$selmarca=mysqli_query($con,"SELECT marca.id FROM marca WHERE marca.origen='$vec[0]' AND marca.marcas='$vec[2]'");
		while ($vecMarc=mysqli_fetch_array($selmarca))
		{
				$id_marca=$vecMarc[0];
		}
		$selvehi=mysqli_query($con,"SELECT tipo_vehiculo.id FROM tipo_vehiculo
			WHERE tipo_vehiculo.tv='$vec[1]' AND tipo_vehiculo.tipo='$vec[4]'");
		while($vecVehi=mysqli_fetch_array($selvehi))
		{	
				$id_v=$vecVehi[0];

		}
		
		$sql4=mysqli_query($con,"INSERT INTO vehiculo (id_marca,id_tipo,descripcion) 
			SELECT $id_marca, $id_v,'$vec[3]'
                FROM dual WHERE NOT EXISTS (
                SELECT id_marca,id_tipo,descripcion FROM vehiculo WHERE id_marca=$id_marca AND id_tipo=$id_v
                AND descripcion='$vec[3]')");
		set_time_limit(30);

	}
	$affected = (int) (mysqli_affected_rows($con));
echo"
	<div class='main' id='myDiv'>
		<div class='col s12 m6'>
			<div class='card blue darken-3'>
				<div class='card-content white-text'>
					<span class='card-title'>Operación Exitosa </span>
						<p>Se registraron ",$affected," nuevos modelos.</p>
						<p>El Proceso de actualizacion de datos puede demorar varios minutos siga los links hasta finalizar el proceso</p>
					</div>
				<div class='card-action'> <a href='actualizarPrecios.php' id='lin'>Paso 4: Actualizar Precios de Vehiculos</a></div>
			</div>
		</div>
	</div>";
?>
<?php include '../extend/scripts.php'; ?>
</body>
</html>
