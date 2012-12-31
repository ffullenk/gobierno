<?
  //Conectar a Base de Datos
  include("conecta/oremi.inc");
  $link = Conexion();

  // Constatar logeo previo
     Global $userN, $passN, $Nniv, $id;
     include("admoremi_sesid.inc");

  if(!$loginCorrecto)
  {
    Header("location: index.php");
  }
  else
  {

?>
<html>
<head>
<title>Oficina Regional de Emergencia, Regi&oacute;n de Coquimbo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/oremi.css" type="text/css">
<script language="JavaScript" src="js/vldfecha.js"></script>
<script language="JavaScript" src="js/oremi.js"></script>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="735" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="666666">
  <tr>
    <td><table width="735" border="0" cellpadding="0" cellspacing="0" class="tablebody" bgcolor="#DDE5F2">
        <tr> 
          <td width="485" height="95" valign="top" bgcolor="#DDE5F2"><img src="imagenes/imgsup-1.gif" width="182" height="95"><img src="imagenes/imgtit-1.gif" width="293" height="95"></td>
          <td width="250" valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#eaeaea" class="tablebody">
              <tr> 
                <td width="90" valign="top" rowspan="4">&nbsp;</td>
                <td width="11" height="29"></td>
                <td width="37"></td>
                <td width="20"></td>
                <td width="33"></td>
                <td width="59"></td>
              </tr>
              <tr> 
                <td height="15" colspan="2" valign="top"> <a href="admoremi_logout.php"><img src="imagenes/cerrar.gif" width="90" height="15" border="0"></a> 
                </td>
                <td></td>
                <td></td>
              </tr>
              <tr> 
                <td height="30"></td>
                <td></td>
                <td></td>
                <td></td>
                <td valign="top"></td>
              </tr>
              <tr> 
                <td height="15" valign="top"></td>
                <td></td>
                <td colspan="2" valign="middle" ><a href="administra/index.php" target="_blank" class="under"><img src="imagenes/auto.gif" width="92" height="15" border="0" align="absmiddle"></a></td>
                <td></td>
              </tr>
              <tr> 
                <td height="6" valign="top"></td>
                <td></td>
                <td></td>
                <td valign="top"></td>
                <td valign="top"></td>
              </tr>
            </table></td>
        </tr>
      </table>
      <table width="735" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr> 
          <td width="735" valign="middle" class="date" align="right"> 
            <!-- INSERTAR FECHA -->
            <script language="JavaScript">
    <!--
    document.write( dayNames[now.getDay()] + " " + now.getDate() + " de " + monthNames[now.getMonth()] + " " +" de " + year);
    // -->
    </script> </td>
        </tr>
        <tr> 
          <td width="735" height="5" valign="top"></td>
        </tr>
        <tr> 
          <td width="735" height="24" valign="top"></td>
        </tr>
        <tr> 
          <td width="735" height="1" valign="top" background="imagenes/lnbot-1.gif"></td>
        </tr>
        <tr> 
          <td width="735" height="5" valign="top"></td>
        </tr>
      </table>
      <table width="735" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="tablebody">
        <tr> 
          <td width="3" height="401" valign="top">&nbsp;</td>
          <td width="125" valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebody">
              <tr> 
                <td width="125" height="25" align="center" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td align="center" valign="middle"><a href="index.php"><img src="imagenes/home.gif" alt=" Volver P&aacute;gina de Inicio Sitio Oremi" width="17" height="16" border="0"></a></td>
                      <td align="center" valign="middle"><a href="index.php"><img src="imagenes/consulta.gif" alt=" Preguntas Frecuentes" width="17" height="16" border="0"></a></td>
                      <td align="center" valign="middle"><a href="mailto:oremiiv@gorecoquimbo.cl?subject=Contacto%20desde%20Sitio%20Web%20Oremi%20Regi%F3n%20de%20Coquimbo"><img src="imagenes/contacto.gif" alt=" Cont&aacute;ctese con Oremi Regi&oacute;n de Coquimbo" width="17" height="16" border="0"></a></td>
                      <td align="center" valign="middle"><img src="imagenes/otro.gif" width="17" height="16"></td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td height="93" align="center" valign="middle"><img src="imagenes/logogore.jpg" width="75" height="75"></td>
              </tr>
              <tr> 
                <td height="165" valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborderLinks">
                    <tr> 
                      <td width="125" height="30" valign="middle" align="center" class="topmenu">Sitios 
                        Relacionados</td>
                    </tr>
                    <tr> 
                      <td height="15" valign="top" bgcolor="#FFFFFF">&nbsp;<a href="http://www.onemi.cl" target="_blank" class="blueone" title="Enlace a Sitio Web de la Oficina Nacional de Emergencia [onemi]">Onemi</a></td>
                    </tr>
                    <tr> 
                      <td height="15" valign="top" bgcolor="#FFFFFF">&nbsp;<a href="http://www.gorecoquimbo.cl" target="_blank" class="blueone" title=" Enlace a Sitio Web del Gobierno Regional de Coquimbo [www.gorecoquimbo.cl]">GORE 
                        Coquimbo</a></td>
                    </tr>
                    <tr> 
                      <td height="15" valign="top" bgcolor="#FFFFFF">&nbsp;<a href="http://ssn.dgf.uchile.cl/cgi-bin/sismo_cab.pl" target="_blank" class="blueone" title=" Enlace a Sitio Web con el Informe de los Últimos 30 Sismos Sensibles ">Eventos 
                        S&iacute;smicos</a></td>
                    </tr>
                    <tr> 
                      <td height="15" valign="top" bgcolor="#FFFFFF">&nbsp;<a href="http://www.meteochile.cl" target="_blank" class="blueone" title=" Enlace a Sitio Web del Servicio de Meteorología de Chile">Meteorolog&iacute;a 
                        Chile</a></td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td height="65" valign="top"> <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr> 
                      <td colspan="2" class="topmenu">De Su Inter&eacute;s</td>
                    </tr>
                    <tr> 
                      <td height="1" colspan="2" valign="top" background="imagenes/vert.gif"></td>
                    </tr>
                    <tr> 
                      <td><img src="imagenes/flec.gif" border="0"></td>
                      <td><a href="http://www.onemi.cl/pageview.php?file=cat/cat.htm" target="_blank" class="blueone" title=" Centro de Alerta Temprana [onemi] ">Centro 
                        de Alerta Temprana</a></td>
                    </tr>
                    <tr> 
                      <td></td>
                      <td height="1" valign=top background="imagenes/lnbot-1.gif"></td>
                    </tr>
                    <tr> 
                      <td height="5" colspan="2" ></td>
                    </tr>
                    <tr> 
                      <td><img src="imagenes/flec.gif" border="0"></td>
                      <td><a href="http://www.onemi.cl/pageview.php?file=riesgos/riesgos.htm" target="_blank" class="blueone" title=" Guía de Riesgos [onemi] ">Gu&iacute;a 
                        de Riesgos</a></td>
                    </tr>
                    <tr> 
                      <td></td>
                      <td height="1" valign=top background="imagenes/lnbot-1.gif"></td>
                    </tr>
                    <tr> 
                      <td height="5" colspan="2" ></td>
                    </tr>
                    <tr> 
                      <td><img src="imagenes/flec.gif" border="0"></td>
                      <td> <a 
                            href="http://www.onemi.cl/pageview.php?file=orient_ciud/medirsismo.htm"
                            target="_blank"
                            class="blueone"
                            title=" Escala de Mediciones Técnicas [onemi] "> Escalas 
                        de Medici&oacute;n S&iacute;smica </a> </td>
                    </tr>
                    <tr> 
                      <td></td>
                      <td height="1" valign=top background="imagenes/lnbot-1.gif"></td>
                    </tr>
                    <tr> 
                      <td height="5" colspan="2" ></td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td height="3"></td>
              </tr>
            </table></td>
          <td width="9" background="imagenes/lnvert-1.gif"></td>
          <td width="320" valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr> 
                <td width="320" height="21" valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebody">
                    <tr> 
                      <td width="320" height="20" valign="middle" align="left" class="topmenu"> 
                        <?	if ($Nniv == "1") {echo "Consolidados Regionales "; } ?>
                      </td>
                    </tr>
                    <tr> 
                      <td valign="top" height="1" background="imagenes/vert.gif"></td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td height="345"> <DIV align="left" style="padding-left: 5px; HEIGHT: 345px; OVERFLOW: auto; WIDTH: 318"> 
                    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#ffffff">
                      <tr> 
                        <td bgcolor="#F0F6F9">&nbsp;Fecha</td>
                        <td bgcolor="#F0F6F9" align="center">&nbsp;NºInf.</td>
                        <td bgcolor="#F0F6F9">&nbsp;Descripci&oacute;n del Informe</td>
                      </tr>
                      <?      // Paginacion de resultados 
      /* Limito la busqueda */
         $TAMANO_PAGINA = 7;

      /* examino la página a mostrar y el inicio del registro a mostrar */
         $pagina = $HTTP_GET_VARS["pagina"];
         if (!$pagina) {
              $inicio = 0;
              $pagina=1;
         }
         else {
              $inicio = ($pagina - 1) * $TAMANO_PAGINA;
         }
		 
         $ssql = "SELECT idconsreg, ConsolidaRegion.idfuente, ocurrencia, descinforme, nrocons FROM ConsolidaRegion INNER JOIN FUENTE ON ConsolidaRegion.idfuente = FUENTE.idfuente WHERE FUENTE.username='$userN' AND idestadoevento=1 ORDER BY ocurrencia DESC";
         $rs = mysql_query($ssql);
         $num_total_registros = mysql_num_rows($rs);
		 
         /* calculo el total de páginas */
            $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
			
         /* pongo el número de registros total, el tamaño de página y la página que se muestra */
            $maxpags = 10;
            $minimo = $maxpags ? max(1, $pagina-ceil($maxpags/2)): 1;
            $maximo = $maxpags ? min($total_paginas, $pagina+floor($maxpags/2)): $total_paginas;
			
        /* construyo la sentencia SQL */
           $ssql = "SELECT idconsreg, ConsolidaRegion.idfuente, ocurrencia, descinforme, nrocons FROM ConsolidaRegion INNER JOIN FUENTE ON ConsolidaRegion.idfuente = FUENTE.idfuente WHERE FUENTE.username='$userN' AND idestadoevento BETWEEN 0 AND 1 ORDER BY ocurrencia DESC LIMIT " . $inicio . "," . $TAMANO_PAGINA;
           $rs = mysql_query($ssql);

           while($row=mysql_fetch_object($rs)) {
		      $x = 1;
		      while( $x <= $row->nrocons ) {
                 list($year, $month, $day, $time) = split('[-. ]', $row->ocurrencia);
                 $fecha = $day ."-". $month ."-". $year;
                 $describe = substr($row->descinforme,0,25) . "...";
?>
                      <tr bgcolor="#FfFfFf"> 
                        <td bgcolor="#F3F7F7"><a href="admoremi_vcons.php?cCons=<? echo $row->idconsreg; ?>&nCons=<? echo $x;?>&userN=<? echo $userN; ?>" class="enlace"><? echo $fecha; ?></a></td>
                        <td bgcolor="#F3F7F7" align="center"><a href="admoremi_vcons.php?cCons=<? echo $row->idconsreg; ?>&nCons=<? echo $x;?>&userN=<? echo $userN; ?>" class="enlace"><? echo $x ."/". $row->nrocons; ?></a></td>
                        <td bgcolor="#F3F7F7"><a href="admoremi_vcons.php?cCons=<? echo $row->idconsreg; ?>&nCons=<? echo $x;?>&userN=<? echo $userN; ?>" class="enlace"><? echo $describe; ?></a></td>
                      </tr>
          <?  $x++;
		      }
	       } ?>
                    </table>
                  </DIV></td>
              </tr>
              <tr> 
                <td> 
                  <? /* cerramos el conjunto de resultados y la conexión con la base de datos */
    mysql_free_result($rs);
    //mysql_close();
    if ($total_paginas > 1) { echo "P&aacute;gina &nbsp;"; }

/* muestro los distintos índices de las páginas, si es que hay varias páginas */
   if($pagina > 1)
   {
     echo "<a href='".$HTTP_SERVER["PHP_SELF"]."?pagina=".($pagina-1)."&userN=$userN'>";
     echo "<font face='verdana' size='-2'>anterior</font>";
     echo "</a>&nbsp;";
   }

   if ($total_paginas > 1)
   {
      for ($i=$minimo; $i<$pagina; $i++){
         echo "<a href='".$HTTP_SERVER["PHP_SELF"]."?pagina=".$i."'&userN=$userN>$i</a>&nbsp;";
      }

      for ($i=$pagina; $i<=$maximo; $i++){
         echo "<a href='".$HTTP_SERVER["PHP_SELF"]."?pagina=".$i."'&userN=$userN>$i</a>&nbsp;";
      }
   }

   if($pagina<$total_paginas)
   {
     echo "&nbsp;<a href='".$HTTP_SERVER["PHP_SELF"]."?pagina=" .($pagina+1). "&userN=$userN'>";
     echo "<font face='verdana' size='-2'>siguiente</font></a>";
   }

?>
                </td>
              </tr>
            </table></td>
          <td width="9" valign="top" background="imagenes/lnvert-1.gif"></td>
          <td width="135" valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebody">
              <tr> 
                <td width="135" height="38" valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborder">
                    <tr> 
                      <td width="133" height="20" valign="middle" align="center" class="topmenu">&nbsp;Eventos</td>
                    </tr>
                    <tr> 
                      <td height="15" valign="middle" align="center" bgcolor="#FFFFFF">&nbsp; 
                        <?                  if ($Nniv == "1") { $msg02 = "Nuevo Consolidado Regional "; $path02 = "admoremi_eveR.php"; } ?>
                        <a href="<? echo $path02; ?>" class="blueunder"><? echo $msg02; ?></a> 
                      </td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td height="12"></td>
              </tr>
              <tr> 
                <td height="35" valign="top">&nbsp;</td>
              </tr>
              <tr> 
                <td height="16"></td>
              </tr>
              <tr> 
                <td height="100" valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborder">
                    <tr> 
                      <td width="133" height="25" valign="middle" align="center" class="topmenu"> 
                        <?         if ($Nniv == "1") { $msg03 = "Consolidados Provinciales "; }
        elseif($Nniv == "2") { $msg03 = "Administraci&oacute;n de Eventos "; }
        else { $msg03 = "Eventos en Proceso"; }

                   echo " $msg03 ";
?>
                      </td>
                    </tr>
                    <tr> 
                      <td valign="top"  bgcolor="#FFFFFF"> 
                        <!-- height=248 -->
                        <!-- Generar una Lista de al menos 7 Eventos que se encuentren en etapa de proceso del user actual -->
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebody">
                          <tr> 
                            <td height="3" ColSpan="2"></td>
                          </tr>
                          <tr> 
                            <td align=center> 
                              <?
                          if ($Nniv == "1") {
                           // Consultar x Consolidados Provinciales Realizados en el Ultimo Tiempo ?>
                              <a href="admoremi_cerrarR.php?id=<? echo $row->idevento; ?>&userN=<? echo $userN; ?>" class="blueunder"> 
                              Cerrar Eventos </a> 
                              <? } ?>
                            </td>
                          </tr>
                        </table>
                        <!-- FIN de Generar una Lista de al menos 7 Eventos que se encuentren en etapa de proceso del user actual -->
                      </td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td height="100" valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborder">
                    <tr> 
                      <td width="133" height="25" valign="middle" align="center" class="topmenu"> 
                        <?                    if ($Nniv == "1") { echo "Consolidados Regionales "; } ?>
                      </td>
                    </tr>
                    <tr> 
                      <td valign="top"  bgcolor="#FFFFFF"> 
                        <!-- height=248 -->
                        <!-- Generar una Lista de al menos 7 Eventos que se encuentren en etapa de proceso del user actual -->
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebody">
                          <tr> 
                            <td height="3" ColSpan="2"></td>
                          </tr>
                          <tr> 
                            <td align=center> 
                              <? 
                         if ($Nniv == "1") {
                           echo('<a href="admoremi_viewconsR.php?userN='.$userN.'" class="blueunder">');
                           echo "Ver Consolidados</a>";
						 }
						?>
                            </td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
          <td width="9" valign="top" background="imagenes/lnvert-1.gif"></td>
          <td width="125" valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebody">
              <tr> 
                <td width="125" height="150" valign="top"> <table width="95%" border="0" align="center" cellpadding="0" cellspacing="1" class="tableborderAlerta">
                    <tr> 
                      <td width="123" height="25" valign="middle" align="center" class="topmenu">Alertas 
                        Vigentes</td>
                    </tr>
                    <tr> 
                      <td valign="top" height="122" bgcolor="#FFFFFF"> 
                        <?php
                             $fechadehoy = date('Y-m-d');
                             $last_week = date('Y-m-d', mktime(0,0,0, date(m), date(d)-7, date(Y)));
                            // Chequear Alertas Vigentes en el Transcurso de la Semana Actual
                               $con_alerta = mysql_query( "SELECT id, DATE_FORMAT(fecha,'%d-%m-%y') as fecha, extension, variable FROM alerta WHERE DATE_FORMAT(fecha,'%Y-%m-%d') BETWEEN '$last_week' AND '$fechadehoy' LIMIT 4") or die( mysql_error() );
                        ?>
                        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" >
                          <?php
                            if ( $nrows = mysql_num_rows( $con_alerta ) > 0 ) {
                            while ($rAler = mysql_fetch_object( $con_alerta ) ) {
                            echo "<tr><td><table border=0 cellpadding=0 cellspacing=0 class=alerta>";
                            echo "          <tr><td > Fecha:</td><td class=date><a class=date href=admoremi_valer.php?cId=$rAler->id>" . $rAler->fecha . "</a></td></tr>";
                            echo "          <tr><td >Extensi&oacute;n:</td><td><a class=date href=admoremi_valer.php?cId=$rAler->id>" . $rAler->extension . "</a></td></tr>";
                            echo "          <tr><td >Variable:</td><td><a class=date href=admoremi_valer.php?cId=$rAler->id>" . $rAler->variable . "</a></td></tr>";
                            echo "       </table></td>";
                            echo "</tr>";
                            echo "<tr><td height=5></td></tr>";
                            echo('<tr><td height="1" valign=top background="imagenes/lnbot-1.gif"></td></tr>');
                            echo "<tr><td height=5></td></tr>";
                            }
                            } else {
                              echo "<tr align=center><td><table border=0 cellpadding=0 cellspacing=0 class=alerta>";
                              echo "                       <tr align=center><td>No Existen Alertas Vigentes</td></tr>";
                              echo "                      </tr></table>";
                              echo "</td></tr>";
                            }
?>
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td height="51"></td>
              </tr>
              <tr> 
                <td height="156" valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="1">
                    <tr> 
                      <td width="123" height="154"></td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td height="44"></td>
              </tr>
            </table></td>
        </tr>
        <tr> 
          <td valign="top" height="35" colspan="8"> <table width="100%" border="0" cellpadding="0" cellspacing="0" class="notainc">
              <tr> 
                <td width="735" height="1" valign="top" background="imagenes/lnbot-1.gif"></td>
              </tr>
              <tr> 
                <td width="735" valign="top" align="center" class="notainc"> Desarrollado 
                  para la Oficina de Emergencia de la Regi&oacute;n de Coquimbo. 
                  Sitio Optimizado para una visualizaci&oacute;n de 800x600. Si 
                  usted tiene alg&uacute;n comentario o pregunta acerca de este 
                  sitio, cont&aacute;ctenos a oremisite@gorecoquimbo.cl</td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>
<? mysql_close();
   } ?>