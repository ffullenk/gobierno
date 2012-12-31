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
										<h1>Cuantas Preguntas se Respondieron en a lo menos m&aacute;s de cuatro d&iacute;as</h1>
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
 
* 
SELECT count( 1 ) AS totalRespondidas, SUM( IF( DATEDIFF( R.FECHA, C.FECHA ) <=4, 1, 0 ) ) AS MenorIgualA4, SUM( IF( DATEDIFF( R.FECHA, C.FECHA ) >4, 1, 0 ) ) AS MayorA4
   FROM BITACORA_R AS R, BITACORA_C AS C, PERSONA AS P
   WHERE R.COD_BITC = C.COD_BITC
      AND C.COD_PERS = P.COD_PERS
      AND C.FECHA
      BETWEEN '$fechaD'
      AND '$fechaH'* 
*/
           
/* Consultemos cuantas Preguntas se respondieron en a lo mas 4 dias */
  $rsSQL=new Recordset($SERVER , $DB , $USER , $PASSWORD);
  $ssqlD = "SELECT count( 1 ) AS TotalPreguntas, SUM( IF( DATEDIFF( R.FECHA, C.FECHA ) <=4, 1, 0 ) ) AS MenorIgualA4, SUM( IF( DATEDIFF( R.FECHA, C.FECHA ) >4, 1, 0 ) ) AS MayorA4
           FROM BITACORA_R AS R, BITACORA_C AS C, PERSONA AS P
           WHERE
           C.COD_PERS = P.COD_PERS AND
           R.COD_BITC=C.COD_BITC AND
           DATE( C.FECHA ) BETWEEN '$fechaD' AND '$fechaH'";
  
  
  
  
  $rsSQL->Open($ssqlD);
  $rsSQL->moveNext();
  
  $totalPreguntas = $rsSQL->FieldByNumber(0);
  $totalMenorIgualA4 = $rsSQL->FieldByNumber(1);
  $totalMayorA4 = $rsSQL->FieldByNumber(2);
  
  $indicadorPrincipal_MIA4 = (($totalMenorIgualA4/$totalPreguntas) * 100);
  $indicadorPrincipal_MA4 = (($totalMayorA4/$totalPreguntas) * 100);
  

/* 
* 
"SELECT count( 1 ) AS TotalMenorIgualA4, ".
              "SUM(IF(GENERO=\"M\",1,0)) AS TMIA4_Hombre, ".
              "SUM(IF(GENERO=\"F\",1,0)) AS TMIA4_Mujer ".
              "FROM BITACORA_C AS C, BITACORA_R AS R, PERSONA AS P ".
              "WHERE ".
              "C.COD_PERS = P.COD_PERS AND ".
              "R.COD_BITC=C.COD_BITC AND ".
              "DATEDIFF( R.FECHA, C.FECHA ) <=4 AND ".
              "DATE( C.FECHA ) BETWEEN '$fechaD' AND '$fechaH'";* 
* 
*/
/* Consultemos cuantos son menores o igual a 4 */
$rsH=new Recordset($SERVER , $DB , $USER , $PASSWORD);
$sqlHombres = 
"SELECT count( 1 ) AS TotalMenorIgualA4, ".
              "SUM(IF(GENERO=\"M\",1,0)) AS TMIA4_Hombre, ".
              "SUM(IF(GENERO=\"F\",1,0)) AS TMIA4_Mujer ".
              "FROM BITACORA_C AS C, BITACORA_R AS R, PERSONA AS P ".
              "WHERE ".
              "C.COD_PERS = P.COD_PERS AND ".
              "R.COD_BITC=C.COD_BITC AND ".
              "DATEDIFF( R.FECHA, C.FECHA ) <4 AND ".
              "DATE( C.FECHA ) BETWEEN '$fechaD' AND '$fechaH'";

/*
"SELECT count( 1 ) AS TotalMenorIgualA4,SUM( IF( GENERO = \"F\", 1, 0 ) ) AS TMenorIgualA4_Mujer, SUM( IF( GENERO = \"M\", 1, 0 ) ) AS TMenorIgualA4_Hombre ".
"FROM BITACORA_R AS R, BITACORA_C AS C, PERSONA AS P ".
"WHERE R.COD_BITC = C.COD_BITC ".
"AND C.COD_PERS = P.COD_PERS ".
"AND DATEDIFF( R.FECHA, C.FECHA ) <=4 ".
"AND C.FECHA ".
"BETWEEN '$fechaD' ".
"AND '$fechaH'";
 */             
$rsH->Open($sqlHombres);
$rsH->moveNext();

$tot_menorIgualA4 = $rsH->FieldByNumber(0);
$tot_MIA4_Hombre = $rsH->FieldByNumber(1);
$tot_MIA4_Mujer = $rsH->FieldByNumber(2);

/*
 "SELECT count( 1 ) AS TotalMayorA4, ".
              "SUM(IF(GENERO=\"M\",1,0)) AS TMA4_Hombre, ".
              "SUM(IF(GENERO=\"F\",1,0)) AS TMA4_Mujer ".
              "FROM BITACORA_C AS C, BITACORA_R AS R, PERSONA AS P ".
              "WHERE ".
              "C.COD_PERS = P.COD_PERS AND ".
              "R.COD_BITC=C.COD_BITC AND ".
              "DATEDIFF( R.FECHA, C.FECHA ) >4 AND ".
              "DATE( C.FECHA ) BETWEEN '$fechaD' AND '$fechaH'";



*/
/* Consultemos cuantos son mayor a 4 */
$rsM=new Recordset($SERVER , $DB , $USER , $PASSWORD);
$sqlMujeres = "SELECT count( 1 ) AS TotalMayorA4, ".
              "SUM(IF(GENERO=\"M\",1,0)) AS TMA4_Hombre, ".
              "SUM(IF(GENERO=\"F\",1,0)) AS TMA4_Mujer ".
              "FROM BITACORA_C AS C, BITACORA_R AS R, PERSONA AS P ".
              "WHERE ".
              "C.COD_PERS = P.COD_PERS AND ".
              "R.COD_BITC=C.COD_BITC AND ".
              "DATEDIFF( R.FECHA, C.FECHA ) >4 AND ".
              "DATE( C.FECHA ) BETWEEN '$fechaD' AND '$fechaH'";

/*
"SELECT count( 1 ) AS TotalMayorA4, SUM( IF( GENERO = \"F\", 1, 0 ) ) AS TMenorIgualA4_Mujer, SUM( IF( GENERO = \"M\", 1, 0 ) ) AS TMenorIgualA4_Hombre ".
"FROM BITACORA_R AS R, BITACORA_C AS C, PERSONA AS P ".
"WHERE R.COD_BITC = C.COD_BITC ".
"AND C.COD_PERS = P.COD_PERS ".
"AND DATEDIFF( R.FECHA, C.FECHA ) >4 ".
"AND C.FECHA ".
"BETWEEN '$fechaD' ".
"AND '$fechaH'";
*/

$rsM->Open($sqlMujeres);
$rsM->moveNext();

$tot_mayorA4 = $rsM->FieldByNumber(0);
$tot_MA4_Hombre = $rsM->FieldByNumber(1);
$tot_MA4_Mujer = $rsM->FieldByNumber(2);


/* Otros Indicadores */
$indicador_Hombres = (($tot_MIA4_Hombre/($tot_MIA4_Hombre+$tot_MA4_Hombre))*100);

$indicador_Mujeres = (($tot_MIA4_Mujer/($tot_MIA4_Mujer+$tot_MA4_Mujer))*100);

/*
$indicador_Hombres = (($tot_MIA4_Hombre*100)/$tot_menorIgualA4);
$indicador_Mujeres = (($tot_MIA4_Mujer*100)/$tot_menorIgualA4);
*/

$indicador_Hombres2 = (($tot_MA4_Hombre/($tot_MIA4_Hombre+$tot_MA4_Hombre))*100);
$indicador_Mujeres2 = (($tot_MA4_Mujer/($tot_MIA4_Mujer+$tot_MA4_Mujer))*100);

/*
$indicador_Hombres2 = (($tot_MA4_Hombre*100)/$tot_mayorA4);
$indicador_Mujeres2 = (($tot_MA4_Mujer*100)/$tot_mayorA4);
*/

/* */

echo "<tr><td colspan=\"2\" align=\"center\">
<table width=\"80%\" style=\"border:1px solid #996600; margin:0;padding:5px;color:#003366; background:#99CC66; font:12px bold Verdana, Arial, Helvetica, sans-serif;\">
	<tr><td align=\"center\">
	<table style=\"border:1px solid #999;\" width=\"100%\">
		<tr><td  class=\"resultados\"colspan=\"2\"><strong>Resultados:</strong></td></tr>
		<tr><td  class=\"resultados\"colspan=\"2\">Respondidas entre el $desde y $hasta</td></tr>
		<tr><td class=\"resultados\">Total Preguntas:</td><td class=\"resultadosV\"><strong>".$totalPreguntas."</strong></td></tr>
		<tr><td class=\"resultados\" rowspan=\"2\">Total Respondidas a lo m&aacute;s en 4 d&iacute;as:</td><td class=\"resultadosV\">".$totalMenorIgualA4."</td></tr>
		<tr><td class=\"resultados\">(".number_format($indicadorPrincipal_MIA4,2)." %)</td></tr>
		<tr><td class=\"resultados\" rowspan=\"2\">Total Respondidas despu&eacute;s de 4 d&iacute;as:</td><td class=\"resultadosV\">".$totalMayorA4."</td></tr>
		<tr><td class=\"resultados\">(".number_format($indicadorPrincipal_MA4,2)." %)</td></tr>
		
	</table>
	</td></tr>

	<tr><td align=\"center\">
	<table style=\"border:1px solid #999;\" width=\"100%\">
		<tr><td  class=\"resultados\"colspan=\"2\"><strong>Respondidas a lo m&aacute;s en 4 d&iacute;as</strong></td></tr>
		<tr><td class=\"resultados\" rowspan=\"2\">De Hombres:</td><td class=\"resultadosV\">".$tot_MIA4_Hombre."</td></tr>
		<tr><td class=\"resultados\">(".number_format($indicador_Hombres,2)." %)</td></tr>
		<tr><td class=\"resultados\" rowspan=\"2\">De Mujeres:</td><td class=\"resultadosV\">".$tot_MIA4_Mujer."</td></tr>
		<tr><td class=\"resultados\">(".number_format($indicador_Mujeres,2)." %)</td></tr>
	</table>
	</td></tr>
	
	<tr><td align=\"center\">
	<table style=\"border:1px solid #999;\" width=\"100%\">
		<tr><td  class=\"resultados\"colspan=\"2\"><strong>Respondidas Despu&eacute;s de 4 d&iacute;as</strong></td></tr>
		<tr><td class=\"resultados\" rowspan=\"2\">De Hombres:</td><td class=\"resultadosV\">".$tot_MA4_Hombre."</td></tr>
		<tr><td class=\"resultados\">(".number_format($indicador_Hombres2,2)." %)</td></tr>
		<tr><td class=\"resultados\" rowspan=\"2\">De Mujeres:</td><td class=\"resultadosV\">".$tot_MA4_Mujer."</td></tr>
		<tr><td class=\"resultados\">(".number_format($indicador_Mujeres2,2)." %)</td></tr>
	</table>
	</td></tr>
	
</table>
</td>
</tr>";

}?>						</table>
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
