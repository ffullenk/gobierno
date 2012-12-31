<?
  //Conectar a Base de Datos
  include("conecta/oremi.inc");
  $link = Conexion();

  // Constatar logeo previo
     Global $userN, $passN, $Nniv, $id, $cCons;
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
<table width="734" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="666666">
  <tr>
    <td width="734"><table width="735" border="0" cellpadding="0" cellspacing="0" class="tablebody" bgcolor="#DDE5F2">
        <tr> 
          <td width="485" height="95" valign="top" bgcolor="#DDE5F2"><img src="imagenes/imgsup-1.gif" width="182" height="95"><img src="imagenes/imgtit-1.gif" width="293" height="95"></td>
          <td width="250" valign="top" bgcolor="#eaeaea"> 
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebody">
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
                <td height="2" valign="top"></td>
                <td></td>
                <td></td>
                <td valign="top"></td>
                <td valign="top"></td>
              </tr>
            </table>
          </td>
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
          <td width="320" valign="top"> 
		     <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr> 
                <td width="320" height="21" valign="top">
				   <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebody">
                    <tr> 
                      <td width="320" height="20" valign="middle" align="left" class="topmenu"> 
                        <?	if ($Nniv == "1") { $msg01 = "&Uacute;ltimos Consolidados Provinciales "; }
                            elseif($Nniv == "2") { $msg01 = "&Uacute;ltimos Informes Alfas Comunales Despachados";}
                            else { $msg01 = "&Uacute;ltimos Informes Alfas Despachados"; }
                            echo " $msg01 ";
                        ?>
                      </td>
                    </tr>
                    <tr> 
                      <td valign="top" height="1" background="imagenes/vert.gif"></td>
                    </tr>
                   </table>
				</td>
              </tr>
              <tr> 
                <td height=""> 
                  <!-- height="375" -->
                  <!-- Listar Ultimos Informes/Consolidados Despachados aun en proceso [no cerrados] -->
                  <!--          <DIV align="left" style="padding-left: 5px; HEIGHT: 350px; OVERFLOW: auto; WIDTH: 318"> -->
                  <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#ffffff">
                    <?
                       if ($Nniv == "1") {
                       // Conocer el IDFUENTE del userN
                          $con_user = mysql_query("SELECT idfuente FROM FUENTE WHERE username= '$userN'") or die(mysql_error());
                          if ($row=mysql_fetch_array($con_user)) {
                              $fuente = $row[idfuente];
                              $region = substr($row[idfuente],0,2);
                              $provincia = substr($row[idfuente],2,2);
                              $xst = 0;
                              //echo "Region: $region --- Provincia: $provincia<br>";
                    ?>
                              <tr>
                                 <td> 
                                    <?
               						 // Conocer Las Provincias/[Comunas] a las que pertenece el IDFUENTE regional   AND idpro = '$provincia'
                                        $con_provincia = mysql_query("SELECT idreg, idpro, provincia FROM Provincia WHERE idreg = '$region' ") or die(mysql_error());
							
                                        echo('<form action="newconsregc.php" name="form" method="post">');
                                        echo('<input type="hidden" name="userN" value="'.$userN.'">');
                                        echo('<input type="hidden" name="cCons" value="'.$cCons.'">');

                                        while( $rprov = mysql_fetch_object( $con_provincia ) ) {
                                              $showprov = $rprov->provincia;
                                              $fuenteprovincia = $region.$rprov->idpro."00"; 
                                    ?>
                                         <table border=0 cellspacing=1 cellpadding=0 width=100% bgcolor=#F0F6F9>
                                            <tr> 
                                               <td bgcolor=#F0F6F9 colspan=2>Provincia: <strong class=topmenu><? echo $showprov; ?></strong></td>
                                            </tr>
<?                                          $cons_prov = mysql_query( "SELECT tblconsprov.idinfconsprov, tblconsprov.idconsprov, tblconsprov.idcons, tblconsprov.descinforme, ConsolidaProvincia.idfuente FROM tblconsprov INNER JOIN ConsolidaProvincia ON tblconsprov.idconsprov = ConsolidaProvincia.idconsprov WHERE tblconsprov.idconsreg_ = 0 AND ConsolidaProvincia.idfuente = '$fuenteprovincia' AND ConsolidaProvincia.idestadoevento BETWEEN 0 AND 1 ") or die( mysql_error() );
                                            while( $row=mysql_fetch_object( $cons_prov ) ) {

//                                                echo('<input type="hidden" name="IAlf" value="'.$row->idalfa.'">');
//                                                echo('<input type="hidden" name="id" value="'.$row->idevento.'">');
//                                                //Encuentra consolidado provincial
                                                  $xst = 1;
?>
                                            <tr>
                                                 <td bgcolor="#F8F8F8" align="center" valign="middle"> 
                                                    <?  echo('<input type="hidden" name="npro" value="'.$rprov->idpro.'">');
                                                        echo('<input type="radio" name="pro'.$rprov->idpro.'" value="'.$row->idinfconsprov.'" >'); ?>
                                                 </td>
                                                 <td bgcolor="#F8F8F8"> <? echo substr($row->descinforme,0,40). "..."; ?> </td>
                                            </tr>
											<tr><td height=2 bgcolor=#F0F6F9></td></tr>
                                            <tr><td> </td></tr>
                                            <tr><td height=5></td></tr>
                                            <tr><td></td></tr>

<?                                          }
                                            mysql_free_result($cons_prov); ?>
                                          </table>
<?                                        }
                                          mysql_free_result($con_provincia); ?>

                                 </td>
                               </tr>
							   

                               <tr><td height="15"></td></tr>
                               <tr bgcolor="#F0F6F9">
                                  <td align=center height="45" valign="middle" bgcolor="#F8F8F8"> 
               					  <? if ( $xst == 1 ) { ?>
                                          <input type="submit" name="consolidareg" class="btn_med" value=" Consolidar "> 
                                  <? } else {
								           echo "<strong>No Existen Informes Provinciales Para Consolidar</strong>";
									 }
								  ?>
                                  </td>
                               </tr>
                    <?    }
                          mysql_free_result($con_user);
                       }  ?>
                  </table>
                  <!--             </DIV>     -->
                </td>
              </tr>
              <tr>
                <td height="5" ></td>
              </tr>
              <tr> 
                <td align="right" valign="middle"> <a href="javascript:history.back();"> 
                  <img src="imagenes/atras.png" width="90" height="15" border="0"> 
                  </a> </td>
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
                        <?                  if ($Nniv == "1") { $msg02 = "Nuevo Consolidado Regional "; $path02 = "admoremi_eveR.php"; }
                    elseif($Nniv == "2") { $msg02 = "Nuevo Consolidado Provincial "; $path02 = "admoremi_eveP.php";}
                    else { $msg02 = "Nuevo Evento"; $path02 = "admoremi_eve.php";}
?>
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
                <td height="276" valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborder">
                    <tr> 
                      <td width="133" height="25" valign="middle" align="center" class="topmenu"> 
                        <?                  if ($Nniv == "1") { $msg03 = "Consolidados Provinciales "; }
                    elseif($Nniv == "2") { $msg03 = "Informes Alfas Creados "; }
                    else { $msg03 = "Eventos en Proceso"; }
                   echo " $msg03 ";
?>
                      </td>
                    </tr>
                    <tr> 
                      <td valign="top" height="248" bgcolor="#FFFFFF"> 
                        <!-- Generar una Lista de al menos 7 Eventos que se encuentren en etapa de proceso del user actual -->
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebody">
                          <tr> 
                            <td height="3" ColSpan="2"></td>
                          </tr>
                          <?
                    if ($Nniv == "1") {
                       // Consultar x Consolidados Provinciales Realizados en el Ultimo Tiempo
                       // Consultar x Informes Alfas Creados en el Ultimo Tiempo
                       // Quien consulta es el Encargado Provincial, por lo tanto tenemos el idfuente: 040n00, donde:
                       // 04 -> Region    --> REG04
                       // 0n -> Provincia --> PRO0401
                       // 00 -> Comuna    --> COM040101
                       // 00 ->
					   
                       $con_user = mysql_query("SELECT idfuente FROM FUENTE WHERE username= '$userN'") or die(mysql_error());

                       if ($row=mysql_fetch_array($con_user)) {
                           $fuente = $row[idfuente];
                           $region = substr($row[idfuente],0,4);
                       }
                       mysql_free_result($con_user);

                       $con_eventos = mysql_query("SELECT Evento.idevento, idemergencia, idalfa, idfuente, idestadoevento, idestadoalfa, descinforme FROM Evento INNER JOIN InformeAlfa ON Evento.idevento=InformeAlfa.idevento WHERE idfuente LIKE '".$region."%' AND idfuente != '$fuente' AND InformeAlfa.idestadoalfa = 0") or die(mysql_error());

                       while($row=mysql_fetch_object($con_eventos)){
?>
                          <tr>
                            <td><a href="admoremi_evenproc.php?id=<? echo $row->idevento; ?>&userN=<? echo $userN; ?>&IAlf=<? echo $row->idalfa; ?>&IEme=<? echo $row->idemergencia; ?>"> 
                              <? echo substr($row->descinforme,0,15). "..."; ?> 
                              </a> </td>
                          </tr>
                          <tr>
                            <td></td>
                          </tr>
                          <?                   }
                   mysql_free_result($con_eventos); ?>
                        </table>
                        <?
}
elseif($Nniv == "2") { 
   // Consultar x Informes Alfas Creados en el Ultimo Tiempo
      // Quien consulta es el Encargado Provincial, por lo tanto tenemos el idfuente: 040n00, donde:
      // 04 -> Region    --> REG04
      // 0n -> Provincia --> PRO0401
      // 00 -> Comuna    --> COM040101
      // 00 ->
  // Buscar entre todos los Informes Alfas Creados por los encargados comunales en el ultimo tiempo, los correspondientes
  // a la provincia.

     $con_user = mysql_query("SELECT idfuente FROM FUENTE WHERE username= '$userN'") or die(mysql_error());

     if ($row=mysql_fetch_array($con_user)) {
         $fuente = $row[idfuente];
         $provincia = substr($row[idfuente],0,4);
     }
     mysql_free_result($con_user);


     $con_eventos = mysql_query("SELECT Evento.idevento, idemergencia, idalfa, idfuente, idestadoevento, idestadoalfa, descinforme FROM Evento INNER JOIN InformeAlfa ON Evento.idevento=InformeAlfa.idevento WHERE idfuente LIKE '".$provincia."%' AND idfuente != '$fuente' AND InformeAlfa.idestadoalfa = 0") or die(mysql_error());

                   while($row=mysql_fetch_object($con_eventos)){
                         echo('<td><a href="admoremi_evenproc.php?id='.$row->idevento.'&userN='.$userN.'&IAlf='.$row->idalfa.'&IEme='.$row->idemergencia.'">');
                         echo substr($row->descinforme,0,15). "... </a></td></tr>";
                         echo "<tr><td></td></tr><tr>";
                   }
                   mysql_free_result($con_eventos);
                   echo "</tr>";
                   echo "</table>";

}
else { 
   // Consultar a Tabla Eventos en Proceso del user
      $con_eventos = mysql_query("SELECT idevento, Evento.idfuente, idtipoevento, desctipoevento FROM Evento INNER JOIN FUENTE ON Evento.idfuente = FUENTE.idfuente WHERE FUENTE.username='$userN' AND idestadoevento=0 LIMIT 7") or die(mysql_error());

                       while($row=mysql_fetch_object($con_eventos)){
                            echo('<td><a href="admoremi_evenproc.php?id='.$row->idevento.'&userN='.$userN.'">');
                            echo substr($row->desctipoevento,0,15). "... </a></td></tr>";
                            echo "<tr><td></td></tr><tr>";
                       }
                    mysql_free_result($con_eventos);
                    echo "</tr>";
                  echo "</table>";
}
                       
?>
                        <!-- FIN de Generar una Lista de al menos 7 Eventos que se encuentren en etapa de proceso del user actual -->
                      </td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td height="25" valign="top">&nbsp;</td>
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
                      <td width="123" height="154" valign="top">
<table width="95%" border="0" cellpadding="0" cellspacing="1" class="tableborder" align="center">
                          <tr> 
                            <td width="123" height="20" valign="middle" align="center" class="topmenu">&nbsp;Resumen Evento</td>
                          </tr>
                          <tr> 
                            <td height="15" valign="middle" align="center" bgcolor="#FFFFFF">&nbsp; 
                              <?                  if ($Nniv == "1") { $msg02 = "Actualizar Resumen "; $path02 = "admoremi_actres.php?cCons=". $cCons;; }
                    elseif($Nniv == "2") { $msg02 = "Nuevo Consolidado Provincial "; $path02 = "admoremi_eveP.php";}
                    else { $msg02 = "Nuevo Evento"; $path02 = "admoremi_eve.php";}
?>
                              <a href="<? echo $path02; ?>" class="blueunder"><? echo $msg02; ?></a> 
                            </td>
                          </tr>
                        </table>
                      </td>
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
                <td width="735" height="32" valign="middle" align="center" class="notainc"> 
                  Desarrollado para la Oficina de Emergencia de la Regi&oacute;n 
                  de Coquimbo. Sitio Optimizado para una visualizaci&oacute;n 
                  de 800x600. </td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>
<?
}
?>
