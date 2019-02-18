<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
<?php 
include 'conexion.php';
include 'simplexlsx.class.php';


$xlsx= 	htmlentities($_POST['archivo']);
$file= new SimpleXLSX( $xlsx );
$truncate->$con->prepare("truncate table valuacion");
$truncate->execute();
if($truncate)
{echo"borro";}
/*
$consulta = $con->prepare( "INSERT INTO valuacion (origen,cod_fabrica , cod_marca, cod_tipo,cod_modelo,tv,marca,descripcion,tipo,val_okm,val_1,val_2,val_3,val_4,val_5,val_6,val_7,val_8,val_9,val_10,val_11,val_12,val_13,val_14,val_15,val_16,val_17,val_18,val_19,val_20,val_21,val_22,val_23,val_24) VALUES (?, ?, ?, ?)");
$consulta->bindParam( 1, $origen);
$consulta->bindParam( 2, $cod_fabrica);
$consulta->bindParam( 3, $cod_marca);
$consulta->bindParam( 4, $cod_tipo);
$consulta->bindParam( 5, $cod_modelo);
$consulta->bindParam( 6, $tv);
$consulta->bindParam( 7, $marca);
$consulta->bindParam( 8, $descripcion);
$consulta->bindParam( 9, $tipo);
$consulta->bindParam( 10, $val_okm);
$consulta->bindParam( 11, $val_1);
$consulta->bindParam( 12, $val_2);
$consulta->bindParam( 13, $val_3);
$consulta->bindParam( 14, $val_4);
$consulta->bindParam( 15, $val_5);
$consulta->bindParam( 16, $val_6);
$consulta->bindParam( 17, $val_7);
$consulta->bindParam( 18, $val_8);
$consulta->bindParam( 19, $val_9);
$consulta->bindParam( 20, $val_10);
$consulta->bindParam( 21, $val_11);
$consulta->bindParam( 22, $val_12);
$consulta->bindParam( 23, $val_13);
$consulta->bindParam( 24, $val_14);
$consulta->bindParam( 25, $val_15);
$consulta->bindParam( 26, $val_16);
$consulta->bindParam( 27, $val_17);
$consulta->bindParam( 28, $val_18);
$consulta->bindParam( 29, $val_19);
$consulta->bindParam( 30, $val_20);
$consulta->bindParam( 31, $val_21);
$consulta->bindParam( 32, $val_22);
$consulta->bindParam( 33, $val_23);
$consulta->bindParam( 34, $val_24);

foreach ($file->rows() as $fields)
{
   $origen= $fields[0];
   $cod_fabrica= $fields[1];
   $cod_marca= $fields[2];
   $cod_tipo= $fields[3];
   $cod_modelo=$fields[4];
   $tv= $fields[5];
   $marca= $fields[6];
   $descripcion= $fields[7];
   $tipo= $fields[8];
   $val_okm= $fields[9];
   $val_1= $fields[10];
   $val_2= $fields[11];
   $val_3= $fields[12];
   $val_4= $fields[13];
   $val_5= $fields[14];
   $val_6= $fields[15];
   $val_7= $fields[16];
   $val_8= $fields[17];
   $val_9= $fields[18];
   $val_10= $fields[19];
   $val_11= $fields[20];
   $val_12= $fields[21];
   $val_13= $fields[22];
   $val_14= $fields[23];
   $val_15= $fields[24];
   $val_16= $fields[25];
   $val_17= $fields[26];
   $val_18= $fields[27];
   $val_19= $fields[28];
   $val_20= $fields[29];
   $val_21= $fields[30];
   $val_22= $fields[31];
   $val_23= $fields[32];
   $val_24= $fields[33];
   $consulta->execute();
}
*/
?>
</body>
</html>