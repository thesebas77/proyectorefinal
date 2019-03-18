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
include '../conexion/conexion.php';

$ruta = 'Upload/';
foreach ($_FILES as $key) {

      $nombre=$key["name"];
      $ruta_temporal=$key["tmp_name"];
	  $type=$key["type"];       
      $destino=$ruta.$nombre;
      $explo=explode(".",$nombre);
	  if($explo[1]!= 'csv')
   {
	   echo"
	   	<div class='main'>
			<div class='col s12 m6'>
			  <div class='card blue darken-3'>
				<div class='card-content white-text'>
				  <span class='card-title'>Error de Extensión</span>
				  <p>El Archivo Tiene una Extencion ".$explo[1].", Ingrese una extensión valida.</p>
				</div>
				<div class='card-action'>  </div>
			  </div>
			</div>
		  </div>
			";
	   return false;
	   }
      move_uploaded_file($ruta_temporal, $destino);
   }
   
//-------------------------Validacion---------------------------------------------------
  $fp = fopen($destino, "r");
  $fila = 0;
  $valid=true;
  while ($datos = fgetcsv($fp, 1000, ";")) 
  {
     $fila++;
     $numero = count($datos);
     if($numero >34)
	 {	
	 	echo"
	   	<div class='main'>
			<div class='col s12 m6'>
			  <div class='card blue darken-3'>
				<div class='card-content white-text'>
				  <span class='card-title'>Error </span>
				  <p>La línea $fila tiene mas columnas de las esperadas.</p>
				</div>
				<div class='card-action'>  </div>
			  </div>
			</div>
		  </div>
			";
       return false;
      }
   		
      if(!ctype_alpha ($datos[0]))
      {	
	  	echo"
	   	<div class='main'>
			<div class='col s12 m6'>
			  <div class='card blue darken-3'>
				<div class='card-content white-text'>
				  <span class='card-title'>Error </span>
				  <p>Error en la columna 1 fila $fila, el tipo de dato no es Alfabetico.</p>
				</div>
				<div class='card-action'>  </div>
			  </div>
			</div>
		  </div>
			";
       return false;
      }
	  if(!ctype_alpha($datos[5]))
      {
        echo"
			<div class='main'>
				<div class='col s12 m6'>
				  <div class='card blue darken-3'>
					<div class='card-content white-text'>
					  <span class='card-title'>Error </span>
					  <p>Error en la columna 6 fila $fila, el tipo de dato no es Alfabetico.</p>
					</div>
					<div class='card-action'>  </div>
				  </div>
				</div>
			  </div>";
       return false;
      }
	  
	  if(!is_string ($datos[8]))
      {	
	  	echo"
			<div class='main'>
				<div class='col s12 m6'>
				  <div class='card blue darken-3'>
					<div class='card-content white-text'>
					  <span class='card-title'>Error </span>
					  <p>Error en la columna 9 fila $fila, el tipo de dato no es Alfanumerico.</p>
					</div>
					<div class='card-action'>  </div>
				  </div>
				</div>
			  </div>";
       return false;
      }
	  
	  for($i=9;$i<25;$i++)
	  {    
	  	  $datos[$i]=str_replace(",", "",$datos[$i]);
		  $datos[$i]=str_replace(".", "",$datos[$i]);
		  if(!ctype_digit($datos[$i])& !empty($datos[$i]))
		  {	
		  	echo"
				<div class='main'>
					<div class='col s12 m6'>
					  <div class='card blue darken-3'>
						<div class='card-content white-text'>
						  <span class='card-title'>Error </span>
						  <p>Error en la columna $i fila $fila, el tipo de dato no es Numérico.</p>
						</div>
						<div class='card-action'>  </div>
					  </div>
					</div>
				  </div>";
		    return false;
		  }
	  }
  }
   //------------------------Fin Validacion------------------------------------------------
	  
		$truncate=$con->prepare("truncate table valuacion");
		$truncate->execute();
		 
		$sql='LOAD DATA LOCAL INFILE "'.$destino.'" INTO TABLE valuacion FIELDS TERMINATED BY \';\'
		 LINES TERMINATED BY \'\n\' (origen,cod_fabrica , cod_marca, cod_tipo,cod_modelo,tv,marca,descripcion,tipo,val_okm,val_1,val_2,val_3,val_4,val_5,val_6,val_7,val_8,val_9,val_10,val_11,val_12,val_13,val_14,val_15,val_16,val_17,val_18,val_19,val_20,val_21,val_22,val_23,val_24)'; 
		$res=mysqli_query($con,$sql);
	
		$affected = (int) (mysqli_affected_rows($con));
		echo"
			
				<div class='main '>
					<div class='col s12 m6'>
					  <div class='card blue darken-3'>
						<div class='card-content white-text'>
						  <span class='card-title'>Operación Exitosa </span>
						  <p>Se Insertaron ",$affected," nuevos registros.</p>
						  <p>El Proceso de actualizacion de datos puede demorar varios minutos siga los links hasta finalizar el proceso</p>
					   	</div>
						<div class='card-action'> <a href='actualizarTipos.php' id='link'>Paso 1: Actualizar Tipos de Vehiculos</a></div>
					</div>
				</div>";
?>
<?php include '../extend/scripts.php'; ?>
<script>
	window.addEventListener('load',() => {

			setTimeout(() => {
				document.getElementById("cargando").className="hide";
				$(.main).show();
			}, timeout 3000);

},true);
</script>
</body>
</html>


