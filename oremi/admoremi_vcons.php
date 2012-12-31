<?php
  //Conectar a Base de Datos
  include("conecta/oremi.inc");
  $link = Conexion();

  // Constatar logeo previo
     global $userN, $passN, $Nniv, $id;
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

<body>
<?php
     // Conocer Responsable del Consolidado
	 // Para eso cuento con dos variables que vienen de admoremi_viewconR:
	 //          cCons=$row->idconsreg
	 //          userN=$userN
//echo "SELECT idconsreg, ConsolidaRegion.idfuente, nrocons, idtipoevento, nombre, cargo, ocurrencia, descinforme, nrocons FROM ConsolidaRegion INNER JOIN FUENTE ON ConsolidaRegion.idfuente = FUENTE.idfuente WHERE FUENTE.username='$userN' AND idconsreg='$cCons' ORDER BY ocurrencia DESC";
$cons = mysql_query("SELECT idconsreg, ConsolidaRegion.idfuente, nrocons, idtipoevento, nombre, cargo, ocurrencia, descinforme, nrocons FROM ConsolidaRegion INNER JOIN FUENTE ON ConsolidaRegion.idfuente = FUENTE.idfuente WHERE FUENTE.username='$userN' AND idconsreg='$cCons' ORDER BY ocurrencia DESC" ) or die( mysql_error() );
if ( $row = mysql_fetch_object( $cons ) ) {
     // Inicializo Variables
	    $idcr         = $row->idconsreg;
	    $nrconr       = $row->nrocons;
	    $nResponsable = $row->nombre;
		$nCargo       = $row->cargo;
		$nTipoEvento  = $row->idtipoevento;
		$nFecha       = $row->ocurrencia;
}
mysql_free_result( $cons );				
?>
<table width="761" border="0" cellpadding="0" cellspacing="1" bgcolor="666666" align="center" >
  <tr>
    <td><table width="760" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF">
        <tr> 
          <td><table width="99%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" align="center" >
              <tr> 
                <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="333333">
                    <tr> 
                      <td bgcolor="f7f7f7"> 
                        <div align="center"><strong>PLAN DEDOS - ONEMI</strong></div>
                        <div align="center"><strong>INFORME CONSOLIDADO REGIONAL <? echo $idcr ."/". $nCons;?> DE EMERGENCIA</strong></div>
                        <div align="center"><strong>REGI&Oacute;N DE COQUIMBO</strong></div></td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td>&nbsp;</td>
              </tr>
              <tr> 
                <td><table width="100%" border="0" cellspacing="1" cellpadding="0">
                    <tr> 
                      <td valign="middle" class="date" align="right"> 
                        <!-- INSERTAR FECHA -->
                        <script language="JavaScript">
                 <!--
                     document.write( dayNames[now.getDay()] + " " + now.getDate() + " de " + monthNames[now.getMonth()] + " " +" de " + year);
                 // -->
                 </script> </td>
                    </tr>
                    <tr> 
                      <td>&nbsp;</td>
                    </tr>
                    <tr> 
                      <td> <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr> 
                            <td> 
                              <table width="95%" border="0" cellpadding="0" cellspacing="1" bgcolor="666666">
                                <tr> 
                                  <td bgcolor="#DDE5F2">RESPONSABLE DEL INFORME</td>
                                </tr>
                                <tr> 
                                  <td align="center" valign="middle" bgcolor="#FFFFFF"><strong><? echo $nResponsable ."</strong><br>". $nCargo ?></strong></td>
                                </tr>
                              </table></td>
                            <td><table width="95%" border="0" cellpadding="0" cellspacing="1" bgcolor="666666">
                                <tr> 
                                  <td bgcolor="#DDE5F2">TIPO DE EVENTO</td>
                                </tr>
                                <tr> 
                                  <td align="center" valign="middle" bgcolor="#FFFFFF"><strong> 
                                    <?php
     // Consultar x el Tipo de Evento
	    $conevento = mysql_query( "SELECT tipoevento FROM TipoEvento WHERE idtipoevento = '$nTipoEvento' ") or die( mysql_error() );
        if ( $revento = mysql_fetch_object( $conevento ) ) {
		     echo $revento->tipoevento;
        }
        mysql_free_result( $conevento );
?>
                                    </strong></td>
                                </tr>
                              </table></td>
                            <td><table width="95%" border="0" cellpadding="0" cellspacing="1" bgcolor="666666">
                                <tr> 
                                  <td bgcolor="#DDE5F2">FECHA DE INICIO DEL EVENTO 
                                  </td>
                                </tr>
                                <tr> 
                                  <td bgcolor="#FFFFFF" align="center" valign="middle"><strong> 
                                    <?php
     // Convertir Fecha $nFecha
        list($year, $month, $day, $time) = split('[-. ]', $nFecha);
        $fecha = $day ."-". $month ."-". $year;
        $hora  = $time;
		
		                echo $fecha ." a las ". $time;
	 
?>
                                    </strong></td>
                                </tr>
                              </table></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td>&nbsp;</td>
              </tr>
              <tr> 
                <td valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="0">
                    <tr> 
                      <td><strong><em>Respaldo:</em></strong></td>
                      <td><strong><em>Evento Derivado:</em></strong></td>
                    </tr>
                    <tr> 
                      <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="666666">
                          <tr align="center" valign="middle" bgcolor="#DDE5F2"> 
                            <td>ALFA</td>
                            <td>FECHA</td>
                            <td>COMUNA</td>
                          </tr>
<?php
     // Leer 
	    // Cambiado por nuevo codigo
	    //$con_reg = mysql_query( "SELECT InfConsProvincia.idconsprov, InfConsProv.idinfconsprov, idalfa, idevento, alfa_fecha FROM InfConsProvincia INNER JOIN InfConsProv ON InfConsProvincia.idconsprov = InfConsProv.idconsprov INNER JOIN InformeAlfa ON InfConsProv.idinfconsprov = InformeAlfa.idinfconsprov WHERE InfConsProvincia.idinfconsreg = '$cCons' AND InfConsProvincia.idestadoevento = '2' ") or die( mysql_error() );
//echo "SELECT idemergencia, idalfa, alfa_fecha, idevento, tblconsprov.idinfconsprov, tblconsreg.idconsreg_, tblconsreg.idconsreg FROM InformeAlfa INNER JOIN tblconsprov ON InformeAlfa.idinfconsprov = tblconsprov.idinfconsprov INNER JOIN tblconsreg ON tblconsprov.idconsreg_ = tblconsreg.idconsreg_ WHERE tblconsreg.idconsreg = '$cCons' AND tblconsreg.idcons = '$nCons' ";
		  $con_reg = mysql_query( "SELECT idemergencia, idalfa, alfa_fecha, idevento, tblconsprov.idinfconsprov, tblconsreg.idconsreg_, tblconsreg.idconsreg FROM InformeAlfa INNER JOIN tblconsprov ON InformeAlfa.idinfconsprov = tblconsprov.idinfconsprov INNER JOIN tblconsreg ON tblconsprov.idconsreg_ = tblconsreg.idconsreg_ WHERE tblconsreg.idconsreg = '$cCons' AND tblconsreg.idcons = '$nCons' ") or die( mysql_error() ); 
        while ( $rReg = mysql_fetch_object( $con_reg ) ) {
			  $nEvento = $rReg->idevento;
?>
                          <tr  align="center" valign="middle" bgcolor="#FFFFFF"> 
                            <td bgcolor="#FFFFFF"><a href="admoremi_valfac.php?alfa=<?php echo $rReg->idalfa. "&ev=". $rReg->idevento."&userN=".$userN; ?>"> 
                              </a><a href="admoremi_valfac.php?alfa=<?php echo $rReg->idalfa. "&ev=". $rReg->idevento."&userN=".$userN; ?>"><?php echo $rReg->idalfa; ?></a><a href="admoremi_valfac.php?alfa=<?php echo $rReg->idalfa. "&ev=". $rReg->idevento."&userN=".$userN; ?>"> 
                              </a> </td>
                            <td bgcolor="#FFFFFF"> 
                              <?php
                  // Convertir Fecha
                     list($year, $month, $day, $time) = split('[-. ]', $rReg->alfa_fecha);
                     $fecha = $day ."-". $month ."-". $year;

?>
                              <a href="admoremi_valfac.php?alfa=<?php echo $rReg->idalfa. "&ev=". $rReg->idevento."&userN=".$userN; ?>"> 
                              <?php echo $fecha; ?> </a> </td>
                            <td> 
                              <?php
                // Conocer Comuna
				   $con_id = mysql_query( "SELECT Evento.idfuente FROM Evento WHERE Evento.idevento = '$rReg->idevento' " ) or die( mysql_error() );
                   if ( $rEv = mysql_fetch_object( $con_id ) ) {
				        $FuenteRegion = substr( $rEv->idfuente, 0, 2);
						$FuenteProvin = substr( $rEv->idfuente, 2, 2);
				        $FuenteComuna = substr( $rEv->idfuente, 4, 2);
                   }
                   mysql_free_result( $con_id );
				   
				   $con_comuna = mysql_query( "SELECT comuna FROM Comuna WHERE idcom = '$FuenteComuna' AND idpro = '$FuenteProvin' AND idreg = '$FuenteRegion' ") or die( mysql_error() );
                   if ( $rCom = mysql_fetch_object( $con_comuna ) ) {
?>
                              <a href="admoremi_valfac.php?alfa=<?php echo $rReg->idalfa. "&ev=". $rReg->idevento."&userN=".$userN; ?>"> 
                              <?php echo $rCom->comuna; ?> </a> 
                              <?php
                   }
                   mysql_free_result( $con_comuna );
?>
                            </td>
                          </tr>
                          <?php
        }
        mysql_free_result( $con_reg );
?>
                        </table></td>
                      <td valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="666666">
                          <tr bgcolor="#DDE5F2"> 
                            <td height="13">TIPO DE EVENTOS DERIVADO</td>
                            <td>COMUNA</td>
                          </tr>
                          <tr bgcolor="#f8f8f8"> 
                            <?php
     // Leer 
	    // por cambio en nuevo codigo sale
		//$con_reg2 = mysql_query( "SELECT InfConsProvincia.idconsprov, InfConsProv.idinfconsprov, idalfa, idevento, alfa_fecha, InformeAlfa.descinforme FROM InfConsProvincia INNER JOIN InfConsProv ON InfConsProvincia.idconsprov = InfConsProv.idconsprov INNER JOIN InformeAlfa ON InfConsProv.idinfconsprov = InformeAlfa.idinfconsprov WHERE InfConsProvincia.idinfconsreg = '$cCons' AND InfConsProvincia.idestadoevento = '2' ") or die( mysql_error() );
		  $con_reg2 = mysql_query( "SELECT idemergencia, tblconsprov.idinfconsprov, alfa_fecha, idevento, InformeAlfa.descinforme, tblconsreg.idconsreg_, tblconsreg.idconsreg FROM InformeAlfa INNER JOIN tblconsprov ON InformeAlfa.idinfconsprov = tblconsprov.idinfconsprov INNER JOIN tblconsreg ON tblconsprov.idconsreg_ = tblconsreg.idconsreg_ WHERE tblconsreg.idconsreg = '$cCons' AND tblconsreg.idcons = '$nCons' ") or die( mysql_error() );
        while ( $rReg = mysql_fetch_object( $con_reg2 ) ) {
			  $nDescri = $rReg->descinforme;
                // Conocer Comuna y Desplegar Evento Derivado
				   $con_id = mysql_query( "SELECT Evento.idfuente FROM Evento WHERE Evento.idevento = '$rReg->idevento' " ) or die( mysql_error() );
                   if ( $rEv = mysql_fetch_object( $con_id ) ) {
				        $FuenteRegion = substr( $rEv->idfuente, 0, 2);
						$FuenteProvin = substr( $rEv->idfuente, 2, 2);
				        $FuenteComuna = substr( $rEv->idfuente, 4, 2);
                   }
                   mysql_free_result( $con_id );
?>
                            <td bgcolor="#FFFFFF">&nbsp;<?php echo $nDescri; ?></td>
                            <?php
				   $con_comuna = mysql_query( "SELECT comuna FROM Comuna WHERE idcom = '$FuenteComuna' AND idpro = '$FuenteProvin' AND idreg = '$FuenteRegion' ") or die( mysql_error() );
                   if ( $rCom = mysql_fetch_object( $con_comuna ) ) {
                        $Comuna = $rCom->comuna;
                   }
                   mysql_free_result( $con_comuna );
?>
                            <td bgcolor="#FFFFFF">&nbsp;<?php echo $Comuna; ?></td>
                          </tr>
                          <?php
        }
        mysql_free_result( $con_reg2 );
?>
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td>&nbsp;</td>
              </tr>
              <tr> 
                <td valign="top"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td align="center"><strong>SITUACI&Oacute;N POR COMUNAS 
                        PERSONAS Y VIVIENDAS</strong></td>
                    </tr>
                    <tr> 
                      <td>&nbsp;</td>
                    </tr>
                    <tr> 
                      <td> 
                        <?php
     // Leer desde Tabla InfConsProvincia:
	 //		idinfconsreg
     //		idfuente --> Para Sacar El Nombre de la Provincia
$rpers_afectadas = 0;
$rpers_damnifica = 0;
$rpers_desaparec = 0;
$rpers_albergada = 0;
$rviv_danomenor = 0;
$rviv_danomayor = 0;
$rviv_destruirre = 0;
$rviv_noevaluada = 0;
	 // tblconsreg.idconsreg = '$cCons' AND tblconsreg.idcons = '$nCons'
	    // x Cambio en codigo nuevo, sale
		//$cons_prov = mysql_query( "SELECT idfuente, idconsprov FROM InfConsProvincia WHERE idinfconsreg = '$cCons' ") or die( mysql_error() );
          $cons_prov = mysql_query( "SELECT idinfconsprov, idfuente, tblconsprov.idconsprov, tblconsprov.idconsreg_ FROM tblconsprov INNER JOIN ConsolidaProvincia ON tblconsprov.idconsprov = ConsolidaProvincia.idconsprov INNER JOIN tblconsreg ON tblconsprov.idconsreg_ = tblconsreg.idconsreg_ WHERE tblconsreg.idconsreg = '$cCons' AND tblconsreg.idcons = '$nCons' " ) or die( mysql_error() );
//echo "Para rProv ->  SELECT idinfconsprov, idfuente, tblconsprov.idconsprov, tblconsprov.idconsreg_ FROM tblconsprov INNER JOIN ConsolidaProvincia ON tblconsprov.idconsprov = ConsolidaProvincia.idconsprov INNER JOIN tblconsreg ON tblconsprov.idconsreg_ = tblconsreg.idconsreg_ WHERE tblconsreg.idconsreg = '$cCons' AND tblconsreg.idcons = '$nCons' ";
        while( $rProv = mysql_fetch_object( $cons_prov ) ) {
               $nRegion    = substr( $rProv->idfuente, 0, 2); 
		       $nProvincia = substr( $rProv->idfuente, 2, 2);
			   

?>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td><strong> 
                              <?php
			   // Consulta x nombre de la Provincia
//echo "SELECT provincia FROM Provincia WHERE idreg = '$nRegion' AND idpro = '$nProvincia' ";
			      $cons_nomprov = mysql_query( "SELECT provincia FROM Provincia WHERE idreg = '$nRegion' AND idpro = '$nProvincia' ") or die( mysql_error() );
                  if( $nProv = mysql_fetch_object( $cons_nomprov ) ) {
				  
                   echo "PROVINCIA DE ";
?>
                              <a href="admoremi_valfap.php?alfa=<?php echo $rProv->idinfconsprov. "&ev=". $rProv->idconsprov."&userN=".$userN; ?>"> 
                              <?php echo $nProv->provincia; ?> </a> 
                              <?php
                  }
                  mysql_free_result( $cons_nomprov );
?>
                              </strong></td>
                          </tr>
                          <tr> 
                            <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="666666">
                                <!-- <tr><td>Comuna</td></tr> -->
                                <tr align="center" valign="middle" bgcolor="#DDE5F2"> 
                                  <td rowspan="2">Comuna</td>
                                  <td colspan="2">Nro. Personas Damnificadas</td>
                                  <td rowspan="2">Nro. Personas Albergadas</td>
                                  <td rowspan="2" bgcolor="#DDE5F2">Nro. Albergues</td>
                                  <td rowspan="2">Nro. Personas Aisladas</td>
                                  <td colspan="3">Nro. Viviendas Con</td>
                                  <td rowspan="2">Nro. Viviendas No Evaluadas</td>
                                </tr>
                                <tr> 
                                  <td align="center" valign="middle" bgcolor="#DDE5F2">Habitacional</td>
                                  <td align="center" valign="middle" bgcolor="#DDE5F2">Laboral</td>
                                  <td align="center" valign="middle" bgcolor="#DDE5F2">Da&ntilde;o 
                                    Menor</td>
                                  <td align="center" valign="middle" bgcolor="#DDE5F2">Da&ntilde;o 
                                    Mayor</td>
                                  <td align="center" valign="middle" bgcolor="#DDE5F2">Destruidas</td>
                                </tr>
                                <?php
// x Cambio en codigo de nuevo, sale
//      $cons_vcom = mysql_query( "SELECT idinfconsprov FROM InfConsProv WHERE idconsprov = '$rProv->idconsprov' ") or die( mysql_error() );
//echo "SELECT idinfconsprov FROM tblconsprov WHERE idconsprov = '$rProv->idconsprov' AND idconsreg_ = '$rProv->idconsreg_'";
      $cons_vcom = mysql_query( "SELECT idinfconsprov FROM tblconsprov WHERE idconsprov = '$rProv->idconsprov'  AND idconsreg_ = '$rProv->idconsreg_'") or die( mysql_error() );
      if ( $rVcom = mysql_fetch_object( $cons_vcom ) ) {
$cpers_afectadas = 0;
$cpers_damnifica = 0;
$cpers_desaparec = 0;
$cpers_albergada = 0;
$cviv_danomenor = 0;
$cviv_danomayor = 0;
$cviv_destruirre = 0;
$cviv_noevaluada = 0;

	       // Leo desde ConsProvDanos info WHERE idinfconsprov='$rVcom->idinfconsprov' 
//echo "SELECT * FROM ConsProvDanos WHERE idinfconsprov='$rVcom->idinfconsprov' ";
             $con_danos = mysql_query( "SELECT * FROM ConsProvDanos WHERE idinfconsprov='$rVcom->idinfconsprov' ") or die( mysql_error() );
             while( $rDanos = mysql_fetch_object( $con_danos ) )
			 {
                  $cpers_afectadas = $cpers_afectadas + $rDanos->pers_afectadas;
                  $cpers_damnifica = $cpers_damnifica + $rDanos->pers_damnifica;
                  $cpers_desaparec = $cpers_desaparec + $rDanos->pers_desaparec;
                  $cpers_albergada = $cpers_albergada + $rDanos->pers_albergada;
                  $cviv_danomenor = $cviv_danomenor + $rDanos->viv_danomenor;
                  $cviv_danomayor = $cviv_danomayor + $rDanos->viv_danomayor;
                  $cviv_destruirre = $cviv_destruirre + $rDanos->viv_destruirre;
                  $cviv_noevaluada = $cviv_noevaluada + $rDanos->viv_noevaluada;				  
?>
                                <tr valign="middle" align="center"> 
                                  <td bgcolor="#FFFFFF">&nbsp; 
                                    <?php
// Consulta Comuna
   $con_comu = mysql_query( "SELECT comuna FROM Comuna WHERE idcom = '$rDanos->idcom'  AND idpro = '$nProvincia' AND idreg = '$nRegion' ") or die( mysql_error() );
   if( $rComu = mysql_fetch_object( $con_comu ) )
   {
       echo $rComu->comuna;
   }
   mysql_free_result( $con_comu );
?>
                                  </td>
                                  <td bgcolor="#FFFFFF">&nbsp;<?php echo $rDanos->pers_afectadas; ?></td>
                                  <td bgcolor="#FFFFFF">&nbsp;<?php echo $rDanos->pers_damnifica; ?></td>
                                  <td bgcolor="#FFFFFF">&nbsp;<?php echo $rDanos->pers_albergada; ?></td>
                                  <td bgcolor="#FFFFFF">&nbsp;</td>
                                  <td bgcolor="#FFFFFF">&nbsp;<?php echo $rDanos->pers_desaparec; ?></td>
                                  <td bgcolor="#FFFFFF">&nbsp;<?php echo $rDanos->viv_danomenor; ?></td>
                                  <td bgcolor="#FFFFFF">&nbsp;<?php echo $rDanos->viv_danomayor; ?></td>
                                  <td bgcolor="#FFFFFF">&nbsp;<?php echo $rDanos->viv_destruirre; ?></td>
                                  <td bgcolor="#FFFFFF">&nbsp;<?php echo $rDanos->viv_noevaluada; ?></td>
                                </tr>
                                <?php
             }
			 mysql_free_result( $con_danos );
       }
	   mysql_free_result( $cons_vcom );

?>
                                <!-- Para Mostrar eL total x Provincia -->
                                <tr align="center" valign="middle" bgcolor="f7f7f7"> 
                                  <td ><strong>Total Provincial</strong></td>
                                  <td><?php echo $cpers_afectadas; ?></td>
                                  <td><?php echo $cpers_damnifica; ?></td>
                                  <td><?php echo $cpers_albergada; ?></td>
                                  <td>&nbsp;</td>
                                  <td><?php echo $cpers_desaparec; ?></td>
                                  <td><?php echo $cviv_danomenor; ?></td>
                                  <td><?php echo $cviv_danomayor; ?></td>
                                  <td><?php echo $cviv_destruirre; ?></td>
                                  <td><?php echo $cviv_noevaluada; ?></td>
                                </tr>
                              </table>
                              <!-- Fin Tabla Provincia -->
                            </td>
                          </tr>
                          <tr>
                            <td height="25"></td>
                          </tr>
                          <?php
$rpers_afectadas = $rpers_afectadas + $cpers_afectadas;
$rpers_damnifica = $rpers_damnifica + $cpers_damnifica;
$rpers_desaparec = $rpers_desaparec + $cpers_desaparec;
$rpers_albergada = $rpers_albergada + $cpers_albergada;
$rviv_danomenor = $rviv_danomenor + $cviv_danomenor;
$rviv_danomayor = $rviv_danomayor + $cviv_danomayor;
$rviv_destruirre = $rviv_destruirre + $cviv_destruirre;
$rviv_noevaluada = $rviv_noevaluada + $cviv_noevaluada;
    }
	mysql_free_result( $cons_prov );
	
?>
                        </table></td>
                    </tr>
                    <tr> 
                      <td>&nbsp;</td>
                    </tr>
                    <tr> 
                      <td>&nbsp;</td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td>&nbsp;</td>
              </tr>
              <tr> 
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td align="center"><strong>TOTALES REGIONALES</strong></td>
                    </tr>
                    <tr> 
                      <td>&nbsp;</td>
                    </tr>
                    <tr> 
                      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="666666">
                                <!-- <tr><td>Comuna</td></tr> -->
                                <tr align="center" valign="middle" bgcolor="#DDE5F2"> 
                                  <td colspan="2">Nro. Personas Damnificadas</td>
                                  <td rowspan="2">Nro. Personas Albergadas</td>
                                  <td rowspan="2">Nro. Albergues</td>
                                  <td rowspan="2">Nro. Personas Aisladas</td>
                                  <td colspan="3">Nro. Viviendas Con</td>
                                  <td rowspan="2">Nro. Viviendas No Evaluadas</td>
                                </tr>
                                <tr> 
                                  <td align="center" valign="middle" bgcolor="#DDE5F2">Habitacional</td>
                                  <td align="center" valign="middle" bgcolor="#DDE5F2">Laboral</td>
                                  <td align="center" valign="middle" bgcolor="#DDE5F2">Da&ntilde;o 
                                    Menor</td>
                                  <td align="center" valign="middle" bgcolor="#DDE5F2">Da&ntilde;o 
                                    Mayor</td>
                                  <td align="center" valign="middle" bgcolor="#DDE5F2">Destruidas</td>
                                </tr>
                                <tr align="center"> 
                                  <td bgcolor="#FFFFFF"><?php echo $rpers_afectadas; ?></td>
                                  <td bgcolor="#FFFFFF"><?php echo $rpers_damnifica; ?></td>
                                  <td bgcolor="#FFFFFF"><?php echo $rpers_albergada; ?></td>
                                  <td bgcolor="#FFFFFF">&nbsp;</td>
                                  <td bgcolor="#FFFFFF"><?php echo $rpers_desaparec; ?></td>
                                  <td bgcolor="#FFFFFF"><?php echo $rviv_danomenor; ?></td>
                                  <td bgcolor="#FFFFFF"><?php echo $rviv_danomayor; ?></td>
                                  <td bgcolor="#FFFFFF"><?php echo $rviv_destruirre; ?></td>
                                  <td bgcolor="#FFFFFF"><?php echo $rviv_noevaluada; ?></td>
                                </tr>
                              </table></td>
                          </tr>
                          <tr>
                            <td height="25"></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr> 
                      <td>&nbsp;</td>
                    </tr>
                    <tr> 
                      <td>&nbsp;</td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td>&nbsp;</td>
              </tr>
              <tr> 
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td align="center"><strong>PUNTOS CR&Iacute;TICOS</strong></td>
                    </tr>
                    <tr> 
                      <td>&nbsp;</td>
                    </tr>
                    <tr> 
                      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="666666">
                                <!-- <tr><td>Comuna</td></tr> -->
                                <tr align="center" valign="middle" bgcolor="#DDE5F2"> 
                                  <td width="16%">Identificaci&oacute;n</td>
                                  <td width="15%">Ubicaci&oacute;n</td>
                                  <td width="26%">Servicios B&aacute;sicos</td>
                                  <td width="19%">Recursos Involucrados</td>
                                  <td width="24%">Decisiones</td>
                                </tr>
                                <tr> 
                                  <td bgcolor="#FFFFFF" valign="top">&nbsp;</td>
                                  <td bgcolor="#FFFFFF" valign="top">&nbsp;</td>
                                  <td bgcolor="#FFFFFF" valign="top">
<?php
	// Servicios Básicos
	   $conreg = mysql_query( "SELECT idconsreg_ FROM tblconsreg WHERE idconsreg = '$cCons' AND idcons = '$nCons' " ) or die( mysql_error() );
	   if( $ridreg = mysql_fetch_object( $conreg ) ) {
           $id_ = $ridreg->idconsreg_;
	   }
	   mysql_free_result( $conreg );
	   	   
	   $con_serv = mysql_query( "SELECT provincia, serviciobasico FROM ConsRegDanos INNER JOIN Provincia ON ConsRegDanos.idprov = Provincia.idpro WHERE idconsreg_ = '$id_' AND idreg = '$FuenteRegion'") or die( mysql_error() );
       $rservprov = mysql_fetch_object( $con_serv );
	   while( $rservprov ) {
	          $fservprov = $rservprov->provincia; ?>
              <table border="0" width="98%" cellspacing="1" cellpadding="1" bgcolor="#c0c0c0">
                <tr><td bgcolor="#EAEAEA">Provincia: &nbsp; <strong><? echo $rservprov->provincia;?></strong></td></tr>
<?                  while( $fservprov == $rservprov->provincia ) { ?>
	                  <tr bgcolor="#ffffff">
                      <td><? echo $rservprov->serviciobasico;?></td>
                      </tr>
<?                    $rservprov = mysql_fetch_object( $con_serv );
                    } ?>
                    </table>					
<?
           }
		   mysql_free_result( $con_serv );	    ?>
								  </td>
                                  <td bgcolor="#FFFFFF" valign="top">
<?php
    // Recursos Involucrados
		   $crec = mysql_query( "SELECT provincia, recurso, descrirecurso FROM ConsRegRecursos INNER JOIN Provincia ON ConsRegRecursos.idprov = Provincia.idpro INNER JOIN TipoRecurso ON ConsRegRecursos.idtiporecurso = TipoRecurso.idtiporecurso WHERE idconsreg_ = '$id_' AND idreg = '$FuenteRegion' ") or die( mysql_error() );
           $rprov = mysql_fetch_object( $crec );
           while( $rprov ) {
		          $fprov = $rprov->provincia; ?>
                    <table border="0" width="98%" cellspacing="1" cellpadding="1" bgcolor="#c0c0c0">
                    <tr><td colspan="2" bgcolor="#EAEAEA">Provincia: &nbsp; <strong><? echo $rprov->provincia;?></strong></td></tr>
					<tr bgcolor="#f3f7f7"><td>Recurso</td><td>Descripci&oacute;n</td></tr>
				  
<?                  while( $fprov == $rprov->provincia ) { ?>
	                  <tr bgcolor="#ffffff">
                      <td><? echo $rprov->recurso;?></td>
                      <td><? echo $rprov->descrirecurso;?></td>
                      </tr>
<?                    $rprov = mysql_fetch_object( $crec );
                    } ?>
                    </table>					
<?
           }
		   mysql_free_result( $crec );	   
?>
								  </td>
                                  <td bgcolor="#FFFFFF" valign="top">
<?php
    // Decisiones
		   $cdec = mysql_query( "SELECT provincia, accion, tiemporestablece FROM ConsRegDecisiones INNER JOIN Provincia ON ConsRegDecisiones.idprov = Provincia.idpro WHERE idconsreg_ = '$id_' AND idreg = '$FuenteRegion' ") or die( mysql_error() );
           $rprov = mysql_fetch_object( $cdec );
           while( $rprov ) {
		          $fprov = $rprov->provincia; ?>
                    <table border="0" width="98%" cellspacing="1" cellpadding="1" bgcolor="#c0c0c0">
                    <tr><td colspan="2" bgcolor="#EAEAEA">Provincia: &nbsp; <strong><? echo $rprov->provincia;?></strong></td></tr>
					<tr bgcolor="#f3f7f7"><td>Acci&oacute;n</td><td>Tpo. Restablec.</td></tr>
				  
<?                  while( $fprov == $rprov->provincia ) { ?>
	                  <tr bgcolor="#ffffff">
                      <td><? echo $rprov->accion;?></td>
                      <td><? echo $rprov->tiemporestablece;?></td>
                      </tr>
<?                    $rprov = mysql_fetch_object( $cdec );
                    } ?>
                    </table>					
<?
           }
		   mysql_free_result( $cdec );	   
?>
								  </td>
                                </tr>
                              </table></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr> 
                      <td>&nbsp;</td>
                    </tr>
                    <tr> 
                      <td>&nbsp;</td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td>&nbsp;</td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>
<?php
}
mysql_close();
?>