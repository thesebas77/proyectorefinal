
<?php include '../conexion/conexion.php';

	$dom = htmlentities($_GET['dom']);
	$num = htmlentities($_GET['num']);

	$sel = $con -> prepare("SELECT num,tipo,nom,ape,domicilio,localidad FROM propietario WHERE num = ?");
		$sel -> bind_param('d',$num);
		$sel -> execute();
		$sel -> store_result();
		$sel -> bind_result($num,$tipo,$nom,$ape,$domi,$loca);
		$row = $sel -> num_rows();
		if ($sel -> fetch()){}



	$sel = $con -> prepare("SELECT marca, modelo, tipo, ano FROM vehiculo WHERE dominio = ?");
		$sel -> bind_param('s',$dom);
		$sel -> execute();
		$sel -> store_result();
		$sel -> bind_result($mar, $mod, $tip, $ano);
		$row = $sel -> num_rows();
		if ($sel -> fetch()){}
			
	



ob_start() ?>


 <table style="border-collapse: collapse;" border="1"; width="520"> 

        <tr>
            
            <td  height="18">
                <p align="center">
                 <font size=1>   Boleta - Rentas - Municipalidad de Tolhuin</font>
                </p>
            </td>
            <td  height="18">
                <p align="center">
                   <font size=1> <strong>Cuota</strong>
                </p>
            </td>
            <td  colspan="3"  height="10">
                <p align="center">
                  <font size=1>  FSW-100
                </p>
            </td>
        </tr>
        <tr>
            <td  height="18">
                <p align="center">
                   <font size=1> <strong>Fecha de vencimiento 1: </strong>
                    <strong></strong>
                </p>
            </td>
            <td  rowspan="2"  height="10">
                <p align="center">
                   <font size=1> <strong>Fecha de emision</strong>
                </p>
            </td>
            <td  colspan="3" rowspan="2"  height="10">
                <p align="center">
                  <font size=1>  <?php echo date('d-n-Y'); ?>
                </p>
            </td>
        </tr>
        <tr>
            <td  height="18">
                <p align="center">
                 <font size=1>  <strong>Fecha de vencimiento 2:</strong>
                </p>
            </td>
        </tr>

    </tbody>
</table>

<br>

<font size=2> 
    <table style="border-collapse: collapse; text-align: justify; margin-left: 4.8pt; margin-right: 4.8pt;" width="515">
<tbody>
<tr style="page-break-inside: avoid; height: 7.0pt;">
<td style="width: 519.25pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0cm 0cm 0cm 0cm; height: 7.0pt;" colspan="2" width="692">
<p><strong>Nombre del propietario: </strong>seva mars</p>
</td>
</tr>
<tr style="height: 7.4pt;">
<td style="width: 259.65pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0cm 0cm 0cm 0cm; height: 7.4pt;" width="346">
<p><strong>D.N.I/Cuil:</strong> 323232 </p>
</td>
<td style="width: 259.55pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0cm 0cm 0cm 0cm; height: 7.4pt;" width="346">
<p><strong>Domicilio:</strong> dada </p>
<p><strong>Localidad:</strong> dadad  </p>
</td>
</tr>
<tr style="height: 6.4pt;">
<td style="width: 519.25pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0cm 0cm 0cm 0cm; height: 6.4pt;" colspan="2" width="692">
<p><strong>Dominio:</strong> fefe2323 </p>
</td>
</tr>
</tbody>
</table>

<br>

<font size=2> 
    <table style="border-collapse: collapse; text-align: justify; margin-left: 4.8pt; margin-right: 4.8pt;" width="515">
<tbody>
<tr style="height: 7.4pt;">
<td style="width: 259.55pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0cm 0cm 0cm 0cm; height: 7.4pt;" width="346">
<p><strong>Marca:</strong> dada </p>
<p><strong>Modelo:</strong> dadad  </p>
</td>
<td style="width: 259.55pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0cm 0cm 0cm 0cm; height: 7.4pt;" width="346">
<p><strong>Tipo:</strong> dada </p>
<p><strong>Año:</strong> dadad  </p>
</td>
</tr>
<tr style="page-break-inside: avoid; height: 7.0pt;">
<td style="width: 519.25pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0cm 0cm 0cm 0cm; height: 7.0pt;" colspan="2" width="692">

<table style="border-collapse: collapse;" border="1"; width="520">
	  <tr>
            
            <td  height="10">
                <p align="center">
                 <font size=1> <strong>Cuota</strong></font>
                </p>
            </td>
            <td  height="10">
                <p align="center">
                   <font size=1> <strong>Valor de cuota</strong>
                </p>
            </td>
           
            <td  colspan="3"  height="10">
                <p align="center">
                  <font size=1>  <strong>Total a pagar</strong>
                </p>
            </td>
        </tr>

        <tr>
            
            <td  height="10">
                <p align="center">
                 <font size=1> 1</font>
                </p>
            </td>
            <td  height="10">
                <p align="center">
                   <font size=1> 1600
                </p>
            </td>
           
            <td  colspan="3"  height="10">
                <p align="center">
                  <font size=1>  <strong>1600</strong>
                </p>
            </td>
        </tr>

</table>

 <p style="text-align: center;">codigo de barra </p>
</td>
</tr>
</tbody>
</table>






<?php
// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

// Introducimos HTML de prueba

 
// Instanciamos un objeto de la clase DOMPDF.
$pdf = new DOMPDF();

// Definimos el tamaño y orientación del papel que queremos.
$pdf->set_paper("latter", "portrait");
//$pdf->set_paper(array(0,0,104,250));
 
// Cargamos el contenido HTML.
$pdf->load_html(ob_get_clean());
 
// Renderizamos el documento PDF.
$pdf->render();
 
// Enviamos el fichero PDF al navegador.
$pdf->stream('Boleta-'.$num.'.pdf');


function file_get_contents_curl($url) {
	$crl = curl_init();
	$timeout = 5;
	curl_setopt($crl, CURLOPT_URL, $url);
	curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($crl, CURLOPT_CONNECTTIMEOUT, $timeout);
	$ret = curl_exec($crl);
	curl_close($crl);
	return $ret;
}

$sel -> close();
$con -> close();
?>
