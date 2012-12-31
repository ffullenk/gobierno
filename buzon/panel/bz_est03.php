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
										<h1>Total Preguntas, Preguntas Respondidas y Preguntas Sin Responder Registrados en el Sitio</h1>
									    <div align="right">
											<!-- no hay agregar -->
										</div>
									</div><!-- FIN MAINCOL -->
									<div id="paginacion">
										<div style="border-bottom:1px dashed #555E77;" align="right">&nbsp;</div>
										<!-- INICIO: Paginacion -->
										<table width="550" border="0" align="center">
<?php
// >>>>> Total Preguntas, Preguntas Respondidas y Preguntas Sin Responder Registrados en el Sitio <<<<<
// AND  ACTIVADO=\"S\" 
$rsSQL=new Recordset($SERVER , $DB , $USER , $PASSWORD);
$ssql = "SELECT SUM( 1  )  AS TOTAL, 
	SUM(  IF ( RESPUESTA =  \"N\", 1, 0 ) )  AS NO_RESPONDIDAS, 
	SUM(  IF ( RESPUESTA =  \"S\", 1, 0 ) )  AS RESPONDIDAS  
FROM BITACORA_C AS C, TEMAS AS T 
WHERE C.COD_TEMA=T.COD_TEMA";
$rsSQL->Open($ssql);
$conthit=0;
while($rsSQL->moveNext())
{$conthit++;
$encres=$rsSQL->FieldByNumber(0);

$enchit=$rsSQL->FieldByNumber(2); //Respondidas
$hit[$conthit]=$enchit;  //repondidas
$totenchit+=$enchit; 	//respondidas

$noresp=$rsSQL->FieldByNumber(1);	//No Respondidas
$Nhit[$conthit]=$noresp;  //No repondidas
$Ntotenchit+=$noresp; 	//No  respondidas

$encre[$conthit]=$encres;
}
$Nfi=0;

for ($porres=1;$porres<=$conthit;$porres++)
    {if ($totenchit==0){$subres=0;$subresimg=0;}
    else
    {

		$subres= round(((100*$encre[$porres])/$totenchit),2);
		$Porc_SR= round(((100*$hit[$porres])/$encre[$porres]),2);
		$Porc_NR= round(((100*$Nhit[$porres])/$encre[$porres]),2);
	 
		$subresimg= 1.5*round(((100*$hit[$porres])/$encre[$porres]),0);
		$subresimgN= 1.5*round(((100*$Nhit[$porres])/$encre[$porres]),0);}
		$totenc+=$subres;

		if($Nfi == 0 ) { $Tclass = "texto-contenido";$Nfi=1;} else { $Tclass = "texto-contenido_G";$Nfi=0;}
	
		$resenc.="<tr>
			    <td  class=$Tclass rowspan=\"2\">$encre[$porres]</strong></td>
				<td class=$Tclass>$hit[$porres]</td>
			    <td class=\"texto-contenido\"><img src=\"../imagenes/barra_sr.jpg\" border='0' width=$subresimg height=15>&nbsp; $Porc_SR%</td>
			  </tr>
			  <tr > 
				<td class=$Tclass >$Nhit[$porres]</td>
				<td class=\"texto-contenido\"><img src=\"../imagenes/barra_nr.jpg\" border='0' width=$subresimgN height=15>&nbsp; $Porc_NR%</td>
			  </tr>
			  <tr class=\"texto-contenido\">
			  	<td colspan=\"5\" height=\"3\"></td>
			  </tr>";
		}
?>
										<tr><td height="5" colspan="5"></td></tr>
										<tr class="texto-tablas">
											<td><strong>Total General</strong></td>
											<td><strong>Cantidad</strong></td>
											<td><strong>Porcentaje</strong></td>
										</tr>
										<?php echo $resenc;?>
										</table>
										<div style="border-bottom:1px dashed #555E77;" align="right">&nbsp;</div>
									</div>
										<!-- FIN Paginacion -->
										<!-- FIN: Paginacion -->
									</td>
								</tr>
								<tr><td height="15"></td></tr>
								<tr><td class="texto-contenido"><strong>Simbolog&iacute;a</strong>:<br />
										<img src="../imagenes/barra_sr.jpg" width="15" height="15"> Respondidas <br />
										<img src="../imagenes/barra_nr.jpg" width="15" height="15"> No Respondidas <br />
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