<?
      //Conectar a Base de Datos
        include("conecta/oremi.inc");
        $link = Conexion();
        include("utils/utils.inc");

if(isset($consolida)) {
   // Grabar Datos Formulario
   // hidden -> IDInfConsReg

   // Actualizar Tabla de InfConsRegion
      mysql_query("UPDATE InfConsRegion SET descinforme = '$describeevento', idcapresp = '$respuesta', idestadoevento = '1', resumen = '$resumenevento' WHERE idconsreg = '$IDInfConsReg' ") or Die("Error ... Imposible Actualizar Tabla Informe Consolidado Region.");
      mysql_close();
      header("Location: admoremi.php");

} else {

    // Mostrar Informacion de la Tabla Consolidado Provincial que viene de antes

       $con_ninf = mysql_query("SELECT idconsreg, ConsolidaRegion.idfuente, ConsolidaRegion.idtipoevento, ocurrencia, idubicacion, nrocons, resumen FROM ConsolidaRegion INNER JOIN FUENTE ON ConsolidaRegion.idfuente = FUENTE.idfuente WHERE FUENTE.username='$userN' AND idconsreg = '$cCons' ") or die(mysql_error());
       if($row=mysql_fetch_object($con_ninf)) {

          list($year, $month, $day, $time) = split('[-. ]', $row->ocurrencia);
          $fecha = $day ."-". $month ."-". $year;

          $TipoEvento = $row->idtipoevento;
          $Fuente     = $row->idfuente;
          $Ocurrencia = $row->ocurrencia;
          $Ubicacion  = $row->idubicacion;
          $region = substr($row->idfuente,0,2);
          $provincia = substr($row->idfuente,2,2);

          //echo('Para El Consolidado Provincial Nro. <strong>'. $row->idconsprov .'</strong>: <BR>');
          //echo('Con Fecha <strong>'. $fecha .'</strong> Se Proceder� a Consolidar la Provincia de [nombre-provincia] ocurrido el evento : <BR> <strong>'. $row->desctipoevento .'</strong> <BR>');
          //echo('El Resumen a este Consolidado del Evento es el siguiente: <BR> <strong>'. $row->resumen .'</strong><BR>');

         // Incrementar nrocons para actualizar Nro. Informe Consolidado Para el Evento Consolidado
            $nroconsreg = $row->nrocons + 1;

         // Actualizar en Tabla Consolidado Provincial nrocons
            if ( $nroconsreg == 1 ) {
                 mysql_query("UPDATE ConsolidaRegion SET nrocons = '$nroconsreg', idestadoevento = '1' WHERE idconsreg= '$cCons'") or Die("Error ... Imposible Actualizar Nro Consolidado en Tabla Consolida Region.");
            } else {
                 mysql_query("UPDATE ConsolidaRegion SET nrocons = '$nroconsreg' WHERE idconsreg= '$cCons'") or Die("Error ... Imposible Actualizar Nro Consolidado en Tabla Consolida Region.");
            }

         // Ahora nrcons contiene el nro de informe del consolidado que se desea ejecutar

         // Crear Registro en Tabla InfConsProv
         // Este Creara un enlace para el nro de inf prov actual asociandolo con el evento del consolidado
         // para guiar idinfvonsreg las demas tablas de consolidados regional.

         // Campos: idinfconsreg | idconsreg | idcons
            mysql_query("INSERT INTO InfConsReg(idconsreg, idcons) VALUES('$cCons','$nroconsreg')") or Die("Error ... Imposible A�adir Nro Consolidado Provincial Para Informe Consolidado en Tabla Informe Consolidado Regional.");

        // Conoce ID del InfConsReg creado recientemente
      
           $con_infcons = mysql_query("SELECT idinfconsreg, idconsreg FROM InfConsReg WHERE idconsreg = '$cCons' AND idcons = '$nroconsreg'") or Die("Error ... Imposible Conocer ID de Informe Consolidado Regional.");

           if($rInfCons=mysql_fetch_object($con_infcons)) {
              $IDInfConsReg = $rInfCons->idinfconsreg;
           }
           mysql_free_result($con_infcons);


       }
       mysql_free_result($con_ninf);

       $aDescribeInf[1] = "";
       $aObservacion[1] = "";

       for($i=1; $i <= $npro; $i++) {
           if($i < 10) { $v= "0".$i; } else { $v = $i;}
           $vProvincia = "pro".$v;
           //     $vComuna = "com".$v;


          // Debemos Conocer los Consolidados Provinciales:
          // En Tabla [ConsolidaProvincia] del ID Actual: $$vProvincia

          // en Tabla InformeAlfa del ID Actual: $$vComuna  
          // Correspondiente a la Comuna  $vComuna   [Comuna: $v ]

         //   ID. emergencia ID. InfAlfa ID. Evento ID. EstadoAlfa ID. Consolidado Prov. 
         //   InformeAlfa: idestadoalfa -> 0 = Cuando se crea Informe
         //                                1 = Cuando se despacha
         //                                2 = Cuando se fue consolidado


         // Conocer Las Comunas a las que pertenece el IDFUENTE provincial
            //        $con_comunas = mysql_query("SELECT idreg, idpro, idcom, comuna FROM Comuna WHERE idreg = '$region' AND idpro = '$provincia' AND idcom='$v'") or die(mysql_error());

           $con_provincias = mysql_query("SELECT idreg, idpro, provincia FROM Provincia WHERE idreg = '$region' AND idpro='$v'  ORDER BY idreg, idpro, idcom") or die(mysql_error());
           if($rProv = mysql_fetch_object($con_provincias)) {
              $nProvincia = $rProv->provincia;
           }
           mysql_free_result($con_provincias);

           //       $con_IAlf = mysql_query("SELECT idemergencia, idalfa, idevento, descinforme, idestadoalfa, idinfconsprov, observaciones FROM InformeAlfa WHERE idemergencia = '". $$vProvincia ."' ") or Die(mysql_error());
           //       echo "SELECT InfConsProv.idinfconsprov, InfConsProv.idconsprov, InfConsProv.idcons, descinforme, resumen FROM InfConsProv INNER JOIN InfConsProvincia ON InfConsProv.idconsprov = InfConsProvincia.idconsprov WHERE InfConsProv.idinfconsprov ='". $$vProvincia ."' ";

                    $con_consp = mysql_query("SELECT InfConsProv.idinfconsprov, InfConsProv.idconsprov, InfConsProv.idcons, descinforme, resumen FROM InfConsProv INNER JOIN InfConsProvincia ON InfConsProv.idconsprov = InfConsProvincia.idconsprov WHERE InfConsProv.idinfconsprov ='". $$vProvincia ."' ") or die(mysql_error());

        //          echo "Comuna: $nComuna <BR>";
		
          if($rconsp=mysql_fetch_object($con_consp)) {
             //echo "Describe Informe: ". $rIAlf->descinforme ."<BR>";
             $aDescribeInf[$i] = $nProvincia .": ". $rconsp->descinforme ."<BR>";
             //echo $aDescribeInf[$i] ."<br><br>";
             $aObservacion[$i] = $nProvincia .": ". $rconsp->resumen ."<BR>";
             // Rescato idinfconsprov
			 $infid = $rconsp->idconsprov;
          }
          mysql_free_result($con_consp);

         // Edita InfConsProvincia/ConsolidaProvincia mediante el cual se consolidara 
         // Actualizar InfConsProvincia/ConsolidaProvincia con el ID del informe consolidado regional [idinfconsprov]

         // --> Deberia obtener primero el id de idinfconsprov de la tabla infconsprov para recien despues
         //     actualizar la tabla infconsprovincia

          mysql_query("UPDATE InfConsProvincia SET idinfconsreg = '$IDInfConsReg', idestadoevento = '2' WHERE idconsprov = '". $infid ."' ") or Die("Error ... Imposible Actualizar Informe Alfa a ser Consolidado Con Id del Consolidado Actual.");

          $con_DanosP = mysql_query("SELECT * FROM ConsProvDanos WHERE idinfconsprov = '". $$vProvincia ."' ") or die("Error ... Imposible Acceder a Registro en Tabla Consolidado Provincial Da�os.");
          while($rAD = mysql_fetch_object($con_DanosP)) {

             // Grabar Registro en Tabla ConsRegDanos
             // Campos de ConsRegDanos
             // idinfconsreg, idprov, pers_afectadas, pers_damnifica, pers_heridas, pers_muertas, pers_desaparec, pers_albergada, viv_danomenor, viv_destruirre, viv_noevaluada, serviciobasico, montodanos
             //

                mysql_query("INSERT INTO ConsRegDanos(idinfconsreg, idprov, pers_afectadas, pers_damnifica, pers_heridas, pers_muertas, pers_desaparec, pers_albergada, viv_danomenor, viv_danomayor, viv_destruirre, viv_noevaluada, serviciobasico, montodanos) VALUES('$IDInfConsReg','$v','$rAD->pers_afectadas','$rAD->pers_damnifica','$rAD->pers_heridas','$rAD->pers_muertas','$rAD->pers_desaparec','$rAD->pers_albergada','$rAD->viv_danomenor','$rAD->viv_danomayor','$rAD->viv_destruirre','$rAD->viv_noevaluada','$rAD->serviciobasico','$rAD->montodanos')") or Die("Error ... Imposible A�adir Registro en Consolidado Da�os.");
          }
          mysql_free_result($con_DanosP);
       
          $con_Dec = mysql_query("SELECT * FROM ConsProvDecisiones WHERE idinfconsprov = '". $$vProvincia ."' ") or die("Error ... Imposible Acceder a Registro en Tabla Consolidado Provincial Decisiones.");
          while($rADec = mysql_fetch_object($con_Dec)) {
                mysql_query("INSERT INTO ConsRegDecisiones(idinfconsreg, idprov, accion, tiemporestablece) VALUES('$IDInfConsReg','$v','$rADec->accion','$rADec->tiemporestablece')") or Die("Error ... Imposible A�adir Registro en Tabla Consolidado Decisiones.");
          }
          mysql_free_result($con_Dec);

          $con_Nec = mysql_query("SELECT * FROM ConsProvNecesidades WHERE idinfconsprov = '". $$vProvincia ."' ") or die("Error ... Imposible Acceder a Registro en Tabla Alfa Necesidades.");
          while($rANec = mysql_fetch_object($con_Nec)) {
                mysql_query("INSERT INTO ConsRegNecesidades(idinfconsreg, idprov, cantidad, tipo, motivo) VALUES('$IDInfConsReg','$v','$rANec->cantidad','$rANec->tipo','$rANec->motivo')") or Die("Error ... Imposible A�adir Registro en Tabla Consolidado Necesidades.");
          }
          mysql_free_result($con_Nec);

          $con_Rec = mysql_query("SELECT * FROM ConsProvRecursos WHERE idinfconsprov = '". $$vProvincia ."' ") or die("Error ... Imposible Acceder a Registro en Tabla Alfa Recursos.");
          while($rARec = mysql_fetch_object($con_Rec)) {
                mysql_query("INSERT INTO ConsRegRecursos(idinfconsreg, idprov, idtiporecurso, descrirecurso, cantidadrecur, gastoestimado) VALUES('$IDInfConsReg','$v','$rARec->idtiporecurso','$rARec->descrirecurso','$rARec->cantidadrecur','$rARec->gastoestimado')") or die("Error ... Imposible A�adir Registro en Tabla Consolidado Recursos.");
          }
          mysql_free_result($con_Rec);

       }   

       $descripcion = " ";
       $observacion = " " ;
       // Generar Registro en Tabla InfConsRegion
          for($x=1; $x <= $npro; $x++) {
              $descripcion.= $aDescribeInf[$x];
              $observacion.= $aObservacion[$x];
          }
          // Convertir fecha
             $tiempo = getdate(); 
             $splfecha = split('[/.-]', $fecha);
             $day = $splfecha[0];
             $month = $splfecha[1];
             $year = $splfecha[2];

             $hour = $tiempo['hours'];
             $minute = $tiempo['minutes'];
             $second = $tiempo['seconds'];
             $fecha_act = date("Y-m-d H:i:s",mktime($hour,$minute,$second,$month,$day,$year));

             mysql_query("INSERT INTO InfConsRegion(idconsreg, idtipoevento, idfuente, descinforme, ocurrencia, idestadoevento, idubicacion, resumen) VALUES('$IDInfConsReg','$TipoEvento','$Fuente','$descripcion','$fecha_act','0','$Ubicacion','$observacion')") or die("Error ... Imposible Generar Registro para Tabla Informe Consolidado Region.");

             // Visualizar Consolidado

?>
<html>
<head>
<title>Oficina Regional de Emergencia, Regi&oacute;n de Coquimbo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/oremi.css" type="text/css">
<script language="JavaScript" src="js/oremi.js"></script>
<script language="JavaScript" src="js/calendario.js"></script>
<script language="JavaScript" src="js/vldfecha.js"></script>
<script language="JavaScript" src="js/vldevento.js"></script>
<script language="javascript" src="js/utils.js"></script>
<script language="javascript" src="js/vldIAlfa.js"></script>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="735" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="666666">
  <tr>
    <td><table width="735" border="0" cellpadding="0" cellspacing="0" class="tablebody" bgcolor="#DDE5F2">
        <tr> 
          <td width="485" height="95" valign="top" bgcolor="#DDE5F2"><img src="imagenes/imgsup-1.gif" width="182" height="95"><img src="imagenes/imgtit-1.gif" width="293" height="95"></td>
          <td width="250" valign="top" bgcolor="eaeaea"> 
            <table width="100%" border="0" cellpadding="0" cellspacing="0"  class="tablebody">
              <!--DWLayoutTable-->
              <tr> 
                <td width="101" valign="top" rowspan="3"></td>
                <td width="52" height="29"></td>
                <td width="38"></td>
                <td width="54"></td>
                <td width="5"></td>
              </tr>
              <tr> 
                <td height="15" colspan="2" valign="top"> <a href="admoremi_logout.php"><img src="imagenes/cerrar.gif" width="90" height="15" border="0"></a> 
                </td>
                <td></td>
                <td></td>
              </tr>
              <tr> 
                <td height="32">&nbsp;</td>
                <td>&nbsp;</td>
                <td valign="top"></td>
                <td valign="top"></td>
              </tr>
              <tr> 
                <td height="15" valign="top"></td>
                <td></td>
                <td colspan="2" valign="middle" ><a href="administra/index.php" class="under"><img src="imagenes/auto.gif" width="92" height="15" border="0" align="absmiddle"></a></td>
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
          <td width="735" height="20" valign="top">&nbsp; </td>
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
                      <td height="15" valign="top" bgcolor="#FFFFFF">&nbsp;<a href="http://ssn.dgf.uchile.cl/cgi-bin/sismo_cab.pl" target="_blank" class="blueone" title=" Enlace a Sitio Web con el Informe de los �ltimos 30 Sismos Sensibles ">Eventos 
                        S&iacute;smicos</a></td>
                    </tr>
                    <tr> 
                      <td height="15" valign="top" bgcolor="#FFFFFF">&nbsp;<a href="http://www.meteochile.cl" target="_blank" class="blueone" title=" Enlace a Sitio Web del Servicio de Meteorolog�a de Chile">Meteorolog&iacute;a 
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
                      <td><a href="http://www.onemi.cl/pageview.php?file=riesgos/riesgos.htm" target="_blank" class="blueone" title=" Gu�a de Riesgos [onemi] ">Gu&iacute;a 
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
                            title=" Escala de Mediciones T�cnicas [onemi] "> Escalas 
                        de Medici&oacute;n S&iacute;smica </a> </td>
                    </tr>
                    <tr> 
                      <td></td>
                      <td height="1" valign=top background="imagenes/lnbot-1.gif"></td>
                    </tr>
                    <tr> 
                      <td height="6" colspan="2" ></td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td height="3"></td>
              </tr>
            </table></td>
          <td width="9" background="imagenes/lnvert-1.gif"></td>
          <td width="455" valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <!--DWLayoutTable-->
              <tr> 
                <td width="455" height="21" valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabl
ebody">
                    <tr> 
                      <td width="455" height="20" valign="middle" align="left" class="topmenu">&nbsp;Consolidado 
                        Provincial </td>
                    </tr>
                    <tr> 
                      <td valign="top" height="1" background="imagenes/vert.gif"></td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td height="390" valign="top"> 
                  <?
// Acceder a Registro Creados a partir de Consolidado Actual

//echo "SELECT * FROM InfConsRegion WHERE idconsreg = '$IDInfConsReg'";
   $con_infcons = mysql_query("SELECT * FROM InfConsRegion WHERE idconsreg = '$IDInfConsReg'") or die("Error ... Imposible Acceder a Registro en Tabla Informe Consolidado Region.");

   if($rConsolidado=mysql_fetch_object($con_infcons)) {
      $IDinforme = $rConsolidado->idconsreg;
        $descripcion = str_replace("<BR>","\r\n", $rConsolidado->descinforme);
        $resumen = str_replace("<BR>","\r\n", $rConsolidado->resumen);		
   }
   mysql_free_result($con_infcons);

   //-$descripcion = str_replace("<BR>","\r\n", $descripcion); 
   //-$observacion = str_replace("<BR>","\r\n", $observacion);

   // Convertir fecha
      $tiempo = getdate();
      $splfecha = split('[/.-]', $fecha);
      $day = $splfecha[0];
      $month = $splfecha[1];
      $year = $splfecha[2];

      $hour = $tiempo['hours'];
      $minute = $tiempo['minutes'];
      $second = $tiempo['seconds'];

      $fecha_act = date("Y-m-d H:i:s",mktime($hour,$minute,$second,$month,$day,$year));
      $fecha = $day ."-". $month ."-". $year;

?>
                  <form name="form" method="post" action="<? $PHP_SELF ?>" onSubmit="return ValidaFormConsReg();">
                    <input type=hidden name="IDInfConsReg" value="<? echo $IDInfConsReg; ?>">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebody">
                      <!--DWLayoutTable-->
                      <tr> 
                        <td height="15" colspan="3" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                      </tr>
                      <tr> 
                        <td width="130" height="15" valign="top"><img src="imagenes/graf_tipeven.gif" width="130" height="15"></td>
                        <td width="60"></td>
                        <td width="130" valign="top"><img src="imagenes/graf_ocurre.gif" width="130" height="15"></td>
                      </tr>
                      <tr> 
                        <td height="20" colspan="2" valign="top" bgcolor="#F7F7F7">&nbsp; 
                          <?
//                    VeTipoEvento();
                  $con_tipoevento = mysql_query("SELECT tipoevento FROM TipoEvento WHERE idtipoevento = '$TipoEvento'") or die("Error ... Imposible Acceder a Registro en Tabla Tipo de Evento.");

                  if($rTipo = mysql_fetch_object($con_tipoevento)) {
                       $tipo = $rTipo->tipoevento;
                  }
                  mysql_free_result($con_tipoevento);
                  
?>
                          <input name="tipo" type="text" value="<? echo $tipo; ?>" DISABLED> 
                        </td>
                        <td valign="top" bgcolor="#F7F7F7" align="right"> <input name="fecha" type="text" value="<? echo $fecha; ?>" DISABLED> 
                          &nbsp;</td>
                      </tr>
                      <tr> 
                        <td height="10" colspan="3" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                      </tr>
                      <tr> 
                        <td height="15"></td>
                        <td></td>
                        <td valign="top"><img src="imagenes/graf_desceven.gif" width="130" height="15"></td>
                      </tr>
                      <tr bgcolor="#F7F7F7"> 
                        <td height="80" colspan="3" valign="middle" align="center"> 
                          <textarea name="describeevento" rows="5" cols="55" value="<? echo $descripcion; ?>"><? echo $descripcion; ?></textarea> 
                          &nbsp;</td>
                      </tr>
                      <tr> 
                        <td height="10" colspan="3" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                      </tr>
                      <tr> 
                        <td height="15" valign="top"><img src="imagenes/graf_ubieven.gif" width="130" height="15"></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr bgcolor="#F7F7F7"> 
                        <td height="20" colspan="3" valign="top">&nbsp; 
                          <?
//                    VeUbicacion();
                  $con_ubicacion = mysql_query("SELECT ubicacion FROM Ubicacion WHERE idubicacion = '$Ubicacion'") or Die("error ... Imposible Acceder a Registro en Tabla Ubicacion.");


                  if($rUbicacion = mysql_fetch_object($con_ubicacion)) {
                       $ubica = $rUbicacion->ubicacion;
                  }
                  mysql_free_result($con_ubicacion);
?>
                          <input name="ubica" type="text" value="<? echo $ubica; ?>" DISABLED> 
                        </td>
                      </tr>
                      <tr> 
                        <td height="10" colspan="3" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                      </tr>
                      <tr> 
                        <td height="15"></td>
                        <td></td>
                        <td valign="top"><img src="imagenes/graf_reseven.gif" width="130" height="15"></td>
                      </tr>
                      <tr bgcolor="#F7F7F7"> 
                        <td height="80" colspan="3" valign="middle" align="center"> 
                          <textarea name="resumenevento" rows="5" cols="55" value="<? echo $resumen; ?>"><? echo $resumen; ?></textarea> 
                          &nbsp;</td>
                      </tr>
                      <tr> 
                        <td height="10" colspan="3" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                      </tr>
                      <tr> 
                        <td align="left" valign="middle" colspan="2">Cap. de Respuesta</td>
                        <td valign="middle" bgcolor="#FFFFFF"> 
                          <?                            VeCapRespuesta(); ?>
                        </td>
                      </tr>
                      <tr> 
                        <td height="10" colspan="3" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                      </tr>
                      <tr bgcolor="#F7F7F7"> 
                        <td height="30" colspan="3" valign="middle" align="center"> 
                          <input type="submit" name="consolida" value="Despachar Consolidado"> 
                        </td>
                      </tr>
                      <tr> 
                        <td height="25" colspan="3" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                      </tr>
                    </table>
                  </form></td>
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
          <td valign="top" height="26" colspan="8"> 
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="notainc">
              <tr> 
                <td width="735" height="1" valign="top" background="imagenes/lnbot-1.gif"></td>
              </tr>
              <tr> 
                <td width="735" height="25" valign="middle" align="center" class="notainc"> 
                  Desarrollado para la Oficina de Emergencia de la Regi&oacute;n 
                  de Coquimbo. Sitio Optimizado para una visualizaci&oacute;n 
                  de 800x600.</td>
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
// FIN IF isset
mysql_close(); 
?>
