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
font:11px normal "Trebuchet MS", Arial, Verdana; color:#003366; background-color:#D5EABF; padding:3px;}
.resultadosV {
font:14px bold "Trebuchet MS", Arial, Verdana; color:#000; background-color:#E7F3DA; text-align:center;padding:3px;}
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
										<h1>Promedio de D&iacute;as en Responder a las Consultas</h1>
									    <div align="right">
											<!-- no hay agregar -->
										</div>
									</div><!-- FIN MAINCOL -->
									<div id="paginacion">
										<div style="border-bottom:1px dashed #555E77;" align="right">&nbsp;</div>
										<!-- INICIO: Paginacion -->
										<table width="550" border="0" align="center">
										  <tr><td colspan="2" height="5"></td></tr>
<?php
$rsql = new Recordset( $SERVER , $DB , $USER  , $PASSWORD );
$ssql = "SELECT AVG(
DATEDIFF( DATE( R.FECHA ) , DATE( C.FECHA ) )
) AS promedio
FROM BITACORA_C AS C, BITACORA_R AS R
WHERE C.COD_BITC = R.COD_BITC
AND C.RESPUESTA = \"S\"
";
$rsql->Open($ssql);
$rsql->moveNext();



echo "<tr><td colspan=\"2\" align=\"center\">
<table style=\"border:1px solid #996600; margin:0;padding:5px;color:#003366; background:#99CC66; font:12px bold Verdana, Arial, Helvetica, sans-serif;\">
	<tr><td class=\"resultados\">Promedio de Dias en Responder</td><td class=\"resultadosV\">".number_format($rsql->FieldByNumber(0),2)."</td></tr>
</table>
</td>
</tr>";

/*
SELECT DATE( R.FECHA ) AS respondida, DATE( C.FECHA ) AS realizada, DATEDIFF( DATE( R.FECHA ) , DATE( C.FECHA ) ) AS diferencia
FROM BITACORA_C AS C, BITACORA_R AS R
WHERE C.COD_BITC = R.COD_BITC
AND C.RESPUESTA = "S"
*/
?>										</table>
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