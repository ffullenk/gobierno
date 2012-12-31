<?php
  header("Cache-Control: no-store, no-cache, must-revalidate");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");

  umask(0);
  include('../bd/conecta.php');
  $link = Conexion();
  $legal_require_php = "slkad98n32f";
  global $global_qk;
  $global_qk=0;
  require('detecta.php');


if($loginCorrecto ) {  
	@include("../lib/grbz-sesion.php");
?>
<html>
<head>
<title>Buz&oacute;n Ciudadano :: Gobierno Regional de Coquimbo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="estilos/estilos.css" rel="stylesheet" type="text/css">
</head>

<body style="margin:0px 0px;padding:0px;background-color:#3d3d3d;">
<table width="722" border="0" align="center" cellpadding="0" cellspacing="0" style="margin:5px; padding:5px; background-color:#fff;">
  <tr> 
    <td width="1" bgcolor="#497f27">&nbsp;</td>
    <td width="720">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>
		  </td>
        </tr>
        <tr>
           <td height="25"><table width="720" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="160" valign="top">&nbsp;</td>
                      <td width="560" valign="top">
					    <!-- Seccion Central -->
					  	<table width="98%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td class="textoRuta"></td>
                          </tr>
						  <tr><td height="15"></td></tr>
                          <tr>
                            <td>
							<!-- Parte  Central de la Pagina-->
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td>
									<div id="maincol" >
<h1>Encuesta de Satisfacci&oacute;n: Buz&oacute;n Ciudadano Gobierno Regional de Coquimbo</h1>

<p class="texto-contenido">El Gobierno Regional de Coquimbo, agradece a usted que se haya tomado el tiempo en responder la encuesta de satisfacci&oacute;n.</p>

<p class="texto-contenido">La informaci&oacute;n suministrada por usted de gran importancia puesto que nos servir&aacute;a para mejorar nuestro servicio del Buz&oacute;n Ciudadano .</p>

<p class="texto-contenido">Gracias por su colaboraci&oacute;n, No olvide hacer clic sobre <strong>Cerrar Encuesta</strong>.</p>


<?php 
// Grabamos la info la Encuesta
$tiempo 	= $HTTP_GET_VARS['tiempo'];
$facilidad 	= $HTTP_GET_VARS['facilidad'];
$relacion 	= $HTTP_GET_VARS['relacion'];
$respuesta 	= $HTTP_GET_VARS['respuesta'];
$claridad 	= $HTTP_GET_VARS['claridad'];
$utilidad 	= $HTTP_GET_VARS['utilidad'];
$diseno 	= $HTTP_GET_VARS['diseno'];

$actualiza=mysql_query("UPDATE ENCUESTADOS 
SET  ESTADO='R', TIEMPO=\"".$tiempo."\", FACILIDAD=\"".$facilidad."\", RELACION=\"".$relacion."\", RESPUESTA=\"".$respuesta."\", CLARIDAD=\"".$claridad."\", UTILIDAD=\"".$utilidad."\", DISENO=\"".$diseno."\" 
WHERE COD_PERS='$global_qk' ");


?>

<p class="texto-contenido">
	<form action="logout.php" action="post" name="formlist" id="formlist">
		<input type="hidden" name="global_qk" value="<?php echo $global_qk;?>" />
		<input type="submit" class="btn" name="emite" value="Cerrar Encuesta" />
	</form>
									</div>
									</td>
								</tr>
								
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
          <td></td>
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