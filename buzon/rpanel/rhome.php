<?php
  header("Cache-Control: no-store, no-cache, must-revalidate");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");

  umask(0);
  include('../bd/conecta.php');
  $link = Conexion();
  $legal_require_php = "bzrrevalidate";
  global $global_qk;
  $global_qk=0;
  global $ticket;
  $ticket = $_GET["tket"];


require('detect.php');
  global $c;

if($loginCorrecto ) {  
	/*se incluyen los archivos*/
	@include("../lib/grbz-sesion.php");
	@include("../lib/bc_lib.php");
	@include("../lib/global.php");
	@include("../lib/recordset.php");
	include("rfunciones.php");
?>
<html>
<head>
<title>Panel de Respuestas - Buzón Ciudadano :: Gobierno Regional de Coquimbo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="estilos/rpanel.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="722" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
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
						<?php MenuRPagina(); ?>
						<!-- Menu Principal -->
					  </td>
                      <td width="560" valign="top">
					    <!-- Seccion Central -->
					  	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td class="textoRuta"><?php Ruta("H");?></td>
                          </tr>
						  <tr><td height="15"></td></tr>
                          <tr>
                            <td>
							<!-- Parte  Central de la Pagina-->
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr><td>
									<p class="texto-contenido">Usted se encuentra en el M&oacute;dulo del Panel de Respuesta del Buzón Ciudadano.</p>
									<p class="texto-contenido">A trav&eacute;s de este M&oacute;dulo, podr&aacute;:
										<ol>
											<li>Responder Preguntas Llegadas a trav&eacute;s del Sitio Web de www.gorecoquimbo.gob.cl</li>
											<li>Ver las Preguntas Respondidas a trav&eacute;s del Sitio Web de www.gorecoquimbo.gob.cl</li>
										</ol>
									</p>
									
									<p class="texto-contenido">Todo esto, de acuerdo a los par&aacute;metros de permisos de los Temas que pueda visualizar.</p>

<?php
									if(isset($ticket)) { 
										$rsTicket = new Recordset($SERVER , $DB , $USER , $PASSWORD);
										$query = "SELECT COD_BITC, concat( NOMBRES, \" \", PATERNO, \" \", MATERNO ) , EMAIL, TIPO, TEMA, MENSAJE, FECHA  
													FROM PERSONA AS P, BITACORA_C AS BC, TIPO AS T, TEMAS AS M 
													WHERE BC.COD_PERS = P.COD_PERS AND 
													BC.COD_TIPO = T.COD_TIPO AND 
													BC.COD_TEMA = M.COD_TEMA AND 
													TMP_BITC = '". $ticket ."' AND
													RESPUESTA = 'N';";

										$rsTicket->Open($query);
										while($rsTicket->moveNext())
										{ 
											$fila["id"]			= $rsTicket->FieldByNumber(0);
											$fila["nombre"]		= $rsTicket->FieldByNumber(1);
											$fila["email"]		= $rsTicket->FieldByNumber(2);
											$fila["tipo"]		= $rsTicket->FieldByNumber(3);
											$fila["tema"]		= $rsTicket->FieldByNumber(4);
											$fila["mensaje"]	= nl2br($rsTicket->FieldByNumber(5));
											$fila["fecha"]		= $rsTicket->FieldByNumber(6);
											echo "<p class=\"texto-contenido\">El ingreso que usted ha realizado fue a trav&eacute;s del email que le reportamos para el siguiente caso:</p>";
											ListaMensaje("R",$fila);
										} 
									}?>

									</td></tr>
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
<?php
} else {
	// No logeado
	header("Location: index.php");
}
?>
