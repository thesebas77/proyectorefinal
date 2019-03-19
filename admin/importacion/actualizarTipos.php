<?php
include '../extend/header.php';
include '../extend/permiso.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Actualizar Tipos</title>
</head>
<body >
<div class="center" id="cargando">
		 <div class="preloader-wrapper big active">
		    <div class="spinner-layer spinner-blue-only">
		      <div class="circle-clipper left">
		        <div class="circle"></div>
		      </div><div class="gap-patch">
		        <div class="circle"></div>
		      </div><div class="circle-clipper right">
		        <div class="circle"></div>
		      </div>
    </div>
  </div>
	</div>
<?php     
include'../conexion/conexion.php'; 
/*---------------------------------------------------------------------------
Una vez creada las marcas se creara la entidad con los tipos de vehiculos
Selecciona las marcas y origen de valuacion
El resultado se pasa a array para poder iterar el resulset
Si tv y tipo ya estan registrados en la tabla tipos_vehiculos omite el insert de lo contrario lo inserta.
----------------------------------------------------------------------------*/
$res2=mysqli_query($con,"SELECT DISTINCT(v.tv),v.tipo  from valuacion v ORDER BY v.tipo");
while($v2=mysqli_fetch_array($res2))
{
	
	$sql2=$con->prepare("INSERT INTO tipo_vehiculo (tv, tipo)
            SELECT '$v2[0]', '$v2[1]'
                FROM dual
                WHERE NOT EXISTS (SELECT tv,tipo FROM tipo_vehiculo
                                      WHERE tv='$v2[0]' AND tipo='$v2[1]')");
	$sql2->execute();
}
$affected2 = (int) (mysqli_affected_rows($con));
echo"
	<div class='main'>
		<div class='col s12 m6 push-6'>
			<div class='card blue darken-3'>
				<div class='card-content white-text'>
					<span class='card-title'>Operación Exitosa </span>
						<p>Se registraron ",$affected2," nuevos tipos de vehículos.</p>
						<p>El Proceso de actualizacion de datos puede demorar varios minutos siga los links hasta finalizar el proceso</p>
					</div>
				<div class='card-action'> <a href='actualizarMarcas.php' id='link'>Paso 2: Actualizar Marcas</a></div>
			</div>
		</div>
	</div>";

?>
<?php include '../extend/scripts.php'; ?>
<script>
	window.addEventListener('load',() => {

setTimeout(() => {
	document.getElementById("cargando").className="hide";
	$(.main).show();
}, timeout 1500);

},true);
</script>
</body>
</html>