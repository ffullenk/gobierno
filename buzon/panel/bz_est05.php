<?php
  header("Cache-Control: no-store, no-cache, must-revalidate");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");

  umask(0);
  include('../bd/conecta.php');
  $link = Conexion();
  $legal_require_php = "bcrevalidate";
  global $global_qk;
  $global_qk=0;
  require('bc_detect.php');
  global $c;

if($loginCorrecto ) {  
	@include("rfunciones.php");
	@include("../lib/grbz-sesion.php");
	@include("../lib/global.php");
	@include("../lib/recordset.php");
?>
<html>
<head>
<title>Panel de Respuestas - Buzón Ciudadano :: Gobierno Regional de Coquimbo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="css/rpanel.css" rel="stylesheet" type="text/css">
<script language="javaScript" src="../js/calendar1.js"></script>
<script language="javaScript" src="../js/fecha.js"></script>
<style media="screen" type="text/css">
.resultados {
font:11px normal "Trebuchet MS", Arial, Verdana; color:#003366; background-color:#D5EABF; }
.resultadosV {
font:14px bold "Trebuchet MS", Arial, Verdana; color:#000; background-color:#E7F3DA; text-align:center;}
</style>
</head>

<body style="margin:0px 0px;padding:0px;">
<table width="722" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="1">&nbsp;</td>
    <td width="720">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>
		  	<?php
				CabeceraRPagina();
				LineaComando();
			?>
		  </td>
        </tr>
        <tr>
           <td height="25"><table width="720" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="160" valign="top">
					    <!-- Menu Principal -->
						<?php MenuRPagina(TipoFuncionario($global_qk)); ?>
						<!-- Menu Principal -->
					  </td>
                      <td width="560" valign="top">
					    <!-- Seccion Central -->
					  	<table width="98%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td class="textoRuta"><?php Ruta("G");?></td>
                          </tr>
						  <tr><td height="15"></td></tr>
                          <tr>
                            <td>
							<!-- Parte  Central de la Pagina-->
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td>
									<div id="maincol" >
										<h1>Consultas Recibidas y Respondidas en un rango de Fechas</h1>
									    <div align="right">
											<!-- no hay agregar -->
										</div>
									</div><!-- FIN MAINCOL -->
									<div id="paginacion">
										<div style="border-bottom:1px dashed #555E77;" align="right">&nbsp;</div>
										<!-- INICIO: Paginacion -->
										<table width="550" border="0" align="center">
										  <form method="post" id="formulario" name="formulario">
										  <tr><td colspan="2" style="font:14px bold 'Trebuchet MS', Arial, Verdana; color:#000033;">Seleccione el Rango de Fechas</td></tr>
										  <tr><td colspan="2" align="center">
										  		<table style="border:1px solid #996600; margin:0;padding:5px;color:#003366; background:#99CC66; font:12px bold Verdana, Arial, Helvetica, sans-serif;">
										  <tr><td>Entre el : </td>
										      <td><input type=text name="desde" class=lic size="12" maxlength="10" onChange="return ValidaFecha2(this.value);">&nbsp;
				<a href="javascript:cal1.popup();"><img src="../imagenes/cal.gif" width="16" height="16" border="0" alt="Fecha"></a>&nbsp;<font size="-3">formato (dd-mm-aaaa)</font>
<script language="JavaScript">
<!-- // 
	var cal1 = new calendar1(document.forms['formulario'].elements['desde']);
	cal1.year_scroll = true;
	cal1.time_comp = false;
//-->
</script>
</td></tr>
										  <tr><td>Hasta el : </td><td><input type=text name="hasta" class=lic size="12" maxlength="10" onChange="return ValidaFecha2(this.value);">&nbsp;
				<a href="javascript:cal2.popup();"><img src="../imagenes/cal.gif" width="16" height="16" border="0" alt="Fecha"></a>&nbsp;<font size="-3">formato (dd-mm-aaaa)</font>
<script language="JavaScript">
<!-- // 
	var cal2 = new calendar1(document.forms['formulario'].elements['hasta']);
	cal2.year_scroll = true;
	cal2.time_comp = false;
//-->
</script>
</td></tr>
												
												</table>
										  </td></tr>
										  <tr><td colspan="2" height="5"></td></tr>
										  <tr><td colspan="2" align="center"><input type="submit" name="indicador" value="Ver Estad&iacute;sticas"></td></tr>
										  <tr><td colspan="2" height="15"></td></tr>

</form>										
<?php
if(isset($indicador) && ( !empty($desde) || !empty($hasta) ) ) {
  // >>>>>  <<<<<
  $desde = $_POST["desde"];
  $hasta = $_POST["hasta"];
  $fechaD_ = split("-", $desde );
  $fechaD = $fechaD_[2] . "-" . $fechaD_[1] . "-" . $fechaD_[0];
  $fechaH_ = split("-", $hasta );
  $fechaH = $fechaH_[2] . "-" . $fechaH_[1] . "-" . $fechaH_[0];

/*
$sql = 'SELECT count(1) as recibidas, SUM(IF(GENERO="M",1,0)) AS Masculino, SUM(IF(GENERO="F",1,0)) AS Femenino FROM BITACORA_C AS R, PERSONA AS P WHERE R.COD_PERS=P.COD_PERS AND DATE(R.FECHA) between \'2007-01-01\' AND \'2007-01-31\'';
*/

  $rsSQL=new Recordset($SERVER , $DB , $USER , $PASSWORD);
  $ssqlD = "SELECT count(1) as recibidas, SUM(IF(GENERO=\"M\",1,0)) AS MasculinoR, SUM(IF(GENERO=\"F\",1,0)) AS FemeninoR  FROM BITACORA_C AS R, PERSONA AS P WHERE R.COD_PERS=P.COD_PERS AND DATE(R.FECHA) between '$fechaD' AND '$fechaH' ";
  $rsSQL->Open($ssqlD);
  $rsSQL->moveNext();

/* */
/* Consultemos cuantos a cuantos Hombres le han respondido en ese rango de fechas. */
/*
$rsH=new Recordset($SERVER , $DB , $USER , $PASSWORD);
$sqlHombres = "select count(1) as Hombres FROM BITACORA_R as R, BITACORA_C as C, PERSONA AS P WHERE  R.COD_BITC=C.COD_BITC AND C.COD_PERS=P.COD_PERS AND GENERO=\"M\" AND C.FECHA BETWEEN '$fechaD' AND '$fechaH'";
$rsH->Open($sqlHombres);
$rsH->moveNext();
$cantidadH = $rsH->FieldByNumber(0);
$indicadorH = (($cantidadH / $rsSQL->FieldByNumber(1))*100);
*/
/* Consultemos cuantos a cuantas Mujeres le han respondido en ese rango de fechas. */
/*
$rsM=new Recordset($SERVER , $DB , $USER , $PASSWORD);
$sqlMujeres = "select count(1) as Mujeres FROM BITACORA_R as R, BITACORA_C as C, PERSONA AS P WHERE  R.COD_BITC=C.COD_BITC AND C.COD_PERS=P.COD_PERS AND GENERO=\"F\" AND C.FECHA BETWEEN '$fechaD' AND '$fechaH'";
$rsM->Open($sqlMujeres);
$rsM->moveNext();
$cantidadM = $rsM->FieldByNumber(0);
$indicadorM = (($cantidadM / $rsSQL->FieldByNumber(2))*100);
$totalHM = $cantidadH + $cantidadM;
*/
/* */


/* 05.01.2009 */
$rsIndicador = new Recordset($SERVER , $DB , $USER , $PASSWORD);
$qIndicador = "SELECT count( 1 ) AS TotalMenorIgualA4, SUM(IF(GENERO=\"M\",1,0)) AS TMIA4_Hombre, SUM(IF(GENERO=\"F\",1,0)) AS TMIA4_Mujer ".
"FROM BITACORA_C AS C, BITACORA_R AS R, PERSONA AS P ".
"WHERE ".
"C.COD_PERS = P.COD_PERS AND ".
"R.COD_BITC=C.COD_BITC AND ".
"DATE( C.FECHA ) BETWEEN '$fechaD' AND '$fechaH' ";
$rsIndicador->Open($qIndicador);
$rsIndicador->moveNext();

$cantidadH = $rsIndicador->FieldByNumber(1);
$indicadorH = (($cantidadH / $rsSQL->FieldByNumber(1))*100);
$cantidadM = $rsIndicador->FieldByNumber(2);
$indicadorM = (($cantidadM / $rsSQL->FieldByNumber(2))*100);
$totalHM = $cantidadH + $cantidadM;
/* 05.01.2009 */





/*
  $rsSQH=new Recordset($SERVER , $DB , $USER , $PASSWORD);
  $ssqlH = "SELECT count(1) as respondidas, SUM(IF(GENERO=\"M\",1,0)) AS MasculinoT, SUM(IF(GENERO=\"F\",1,0)) AS FemeninoT FROM BITACORA_R AS T,  PERSONA AS P, BITACORA_C AS R WHERE T.COD_BITC=R.COD_BITC AND R.COD_PERS=P.COD_PERS AND DATE(T.FECHA) between '$fechaD' AND '$fechaH' ";
  $rsSQH->Open($ssqlH);
  $rsSQH->moveNext();
*/

echo "<tr><td colspan=\"2\" align=\"center\">
<table style=\"border:1px solid #996600; margin:0;padding:5px;color:#003366; background:#99CC66; font:12px bold Verdana, Arial, Helvetica, sans-serif;\">
	<tr><td align=\"center\">
	<table style=\"border:1px solid #999;\" width=\"85%\">
		<tr><td  class=\"resultados\"colspan=\"2\"><strong>Recibidas</strong></td></tr>
		<tr><td  class=\"resultados\"colspan=\"2\">Recibidas entre el $desde y $hasta</td></tr>
		<tr><td class=\"resultados\">Total:</td><td class=\"resultadosV\"><strong>".$rsSQL->FieldByNumber(0)."</strong></td></tr>
		<tr><td class=\"resultados\">Hombres:</td><td class=\"resultadosV\">".$rsSQL->FieldByNumber(1)."</td></tr>
		<tr><td class=\"resultados\">Mujeres:</td><td class=\"resultadosV\">".$rsSQL->FieldByNumber(2)."</td></tr>
	</table>
	</td></tr>

	<tr><td align=\"center\">
	<table style=\"border:1px solid #999;\" width=\"85%\">
		<tr><td  class=\"resultados\"colspan=\"2\"><strong>Respondidas</strong></td></tr>
		<tr><td  class=\"resultados\"colspan=\"2\">Respondidas entre el $desde y $hasta</td></tr>
		<tr><td class=\"resultados\">Total:</td><td class=\"resultadosV\"><strong>".$totalHM."</strong></td></tr>
		<tr><td class=\"resultados\">Hombres:</td><td class=\"resultadosV\">".$cantidadH." (".number_format($indicadorH,2)." %)</td></tr>
		<tr><td class=\"resultados\">Mujeres:</td><td class=\"resultadosV\">".$cantidadM." (".number_format($indicadorM,2)." %)</td></tr>
	</table>
	</td></tr>

	";
/*
$rsSQH->FieldByNumber(1)
$rsSQH->FieldByNumber(2)
($rsSQH->FieldByNumber(0)!=0)
*/

if( ($totalHM!=0) && ($rsSQL->FieldByNumber(0)!=0) ) { 
	$indicador = (($totalHM / $rsSQL->FieldByNumber(0))*100);
echo "<tr><td align=\"center\">
	<table style=\"border:1px solid #999;\" width=\"85%\">
		<tr ><td class=\"resultados\">El Indicador para el Rango de Fechas entre el $desde Hasta $hasta es de</td><td class=\"resultadosV\">".number_format($indicador,2)."%</td></tr>
	</table>
	</td></tr>";
} else {
echo "<tr ><td class=\"resultados\" colspan=\"2\">No se puede realizar la operaci&oacute;n para calcular el indicador.</td></tr>";
}
echo "
</table>
</td>
</tr>";

/*
SELECT DATE( R.FECHA ) AS respondida, DATE( C.FECHA ) AS realizada, DATEDIFF( DATE( R.FECHA ) , DATE( C.FECHA ) ) AS diferencia
FROM BITACORA_C AS C, BITACORA_R AS R
WHERE C.COD_BITC = R.COD_BITC
AND C.RESPUESTA = "S"


SELECT AVG(
DATEDIFF( DATE( R.FECHA ) , DATE( C.FECHA ) )
) AS promedio
FROM BITACORA_C AS C, BITACORA_R AS R
WHERE C.COD_BITC = R.COD_BITC
AND C.RESPUESTA = "S"
*/

}?>										</table>
										<div style="border-bottom:1px dashed #555E77;" align="right">&nbsp;</div>
									</div>
										<!-- FIN Paginacion -->
										<!-- FIN: Paginacion -->
									</td>
								</tr>
								<tr><td height="15"></td></tr>
								</table>
							<!-- Parte  Central de la Pagina-->
							</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                        </table>
					    <!-- Seccion Central -->
					  </td>
                    </tr>

                  </table></td>
              </tr>
        <tr>
          <td><?php PieRPagina();?></td>
        </tr>
      </table></td>
    <td width="1">&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?php // FIN LoginCorrecto True
} else{
  // No se encuentra logeado el usuario
  header("Location: index.php");
} ?>
