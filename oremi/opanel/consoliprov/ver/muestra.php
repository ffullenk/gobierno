<?php
	@include("../../../lib/config.php");
	@include("../../../lib/oremi.php");
    @include("../../utiles/utiles.php");

	global $SERVER, $DB, $USER, $PASSWORD;
	@include("../../../lib/global.php");
	@include("../../../lib/recordset.php");

	/*  umask(0);*/
	$require_php = "ra28xbEblRnj";
	global $global_qk, $global_cg;
	$global_qk=0;
	$global_cg=0;

	require("../../detect.php");

if($loginCorrecto ) { 
    @include("../utiles/utiles.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>::... OREMI: Informe Alfa &middot;&middot;&middot;::</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../../estilos/oremi2.css" type="text/css">
<script language="JavaScript" src="js/vldfecha.js"></script>
<script language="JavaScript" src="js/oremi.js"></script>
<style type="text/css">
<!--
body {
	background-color: #CCCCCC;
}
-->
</style></head>

<body>
<?php

$rsEvento = new Recordset($SERVER, $DB, $USER, $PASSWORD);
$sqlEvento = "SELECT P.CONSOLIDAPROV_ID, P.TITULOEVENTO, O.TITULOEVENTO, NRO_EVENTOS, NRO_CONSOLIDADO, APELLIDOS, NOMBRES, TPEVENTO, TPCAPRESPUESTA, FECHA, HORA, OBSERVACIONES, CONSOLIDAREG_ID
        FROM CONSOLIDAPROV AS P, ENCARGADOS AS A, TP_CAPRESPUESTA AS N, TP_EVENTO AS E, TP_UBICACION AS U, EVENTOPROVINCIA AS O 
        WHERE P.ENCARGADO_ID=A.ENCARGADO_ID AND 
        P.TPEVENTO_ID=E.TPEVENTO_ID AND 
        P.TPCAPRESPUESTA_ID=N.TPCAPRESPUESTA_ID AND 
        P.TPUBICACION_ID=U.TPUBICACION_ID AND 
        P.EVENTOPROVINCIA_ID=O.EVENTOPROVINCIA_ID AND 
        O.EVENTOPROVINCIA_ID =\"$id\" AND P.CONSOLIDAPROV_ID=\"$consp\" ";
$rsEvento->Open($sqlEvento);
$nroEvento = $rsEvento->RecordCount();
if( $nroEvento > 0 ) {
	$rsEvento->moveNext();
	$tituloCons = $rsEvento->FieldByNumber(1);
	$nroCons = $rsEvento->FieldByNumber(4);
?>
<!--<div id="enmarca">-->
<table border="0" align="center" cellpadding="0" cellspacing="0" id="enmarca">
<tr><td align="center">
<table border="0" cellpadding="0" cellspacing="1" id="constitulo">
<tr><td>Plan Dedos ONEMI</td></tr>
<tr><td>Informe Consolidado Provincial de Emergencia Nº <?php echo $nroCons;?> de <?php echo $rsEvento->FieldByNumber(3);?></td></tr>
<tr><td><?php echo $rsEvento->FieldByNumber(1);?></td></tr>
<tr><td>Regi&oacute;n de Coquimbo</td></tr>
</table>
<br />

<table border="0" cellpadding="0" cellspacing="1" id="considentifica">
<tr><th>Nombre del Evento</th><th>Tipo del Evento</th><th>Fecha y Hora</th></tr>
<tr>
<td><?php echo $rsEvento->FieldByNumber(6) . " " . $rsEvento->FieldByNumber(5);?></td>
<td><?php echo $rsEvento->FieldByNumber(7);?></td>
<td><?php echo fechaNuestra($rsEvento->FieldByNumber(9)) . "  " . $rsEvento->FieldByNumber(10);?></td></tr>
</table>
<br/>

<table border="0" cellpadding="0" cellspacing="1" id="consrespaldo">
<tr><th colspan="4">Respaldo</th></tr>
<tr><td class="respT">NºAlfa</td>
<td class="respT">Fecha</td>
<td class="respT">Comuna</td>
<td class="respT">Tipo de Evento</td>
</tr>
<?php
	// Buscamos todos los informes alfas que guarden relacion con este consolidado
	$rsAlfas = new Recordset($SERVER, $DB, $USER, $PASSWORD);
	$sqlAlfas = "SELECT INFORMEALFA_ID, FECHA, NRO_INFORME, COMUNA, TPEVENTO, EVENTOALFA_ID 
					FROM INFORMEALFA AS A, ENCARGADOS AS E, COMUNA AS C, TP_EVENTO AS T 
					WHERE A.ENCARGADO_ID=E.ENCARGADO_ID AND 
					E.COM_ID=C.COM_ID AND 
					T.TPEVENTO_ID=A.TPEVENTO_ID AND 
					CONSOLIDAPROV_ID=\"$consp\" ";
		$rsAlfas->Open($sqlAlfas);
		$nroAlfas=$rsAlfas->RecordCount();
		if($nroAlfas>0) {
		   while($rsAlfas->moveNext()) { ?>

<tr>
<td><a href="<?php echo _rutaVeAlfa_ ;?>muestra.php?id=<?php echo $rsAlfas->FieldByNumber(5);?>&alfa=<?php echo $rsAlfas->FieldByNumber(0);?>" target="_blank"><?php echo $rsAlfas->FieldByNumber(2);?></a></td>
<td><a href="<?php echo _rutaVeAlfa_ ;?>muestra.php?id=<?php echo $rsAlfas->FieldByNumber(5);?>&alfa=<?php echo $rsAlfas->FieldByNumber(0);?>" target="_blank"><?php echo fechaNuestra($rsAlfas->FieldByNumber(1));?></a></td>
<td><a href="<?php echo _rutaVeAlfa_ ;?>muestra.php?id=<?php echo $rsAlfas->FieldByNumber(5);?>&alfa=<?php echo $rsAlfas->FieldByNumber(0);?>" target="_blank"><?php echo $rsAlfas->FieldByNumber(3);?></a></td>
<td><a href="<?php echo _rutaVeAlfa_ ;?>muestra.php?id=<?php echo $rsAlfas->FieldByNumber(5);?>&alfa=<?php echo $rsAlfas->FieldByNumber(0);?>" target="_blank"><?php echo $rsAlfas->FieldByNumber(4);?></a></td>
</tr>
<?php     } 
		}?>
</table>
<br />

<table border="0" cellpadding="0" cellspacing="1" id="consdanos">
<tr><th colspan="11">Da&ntilde;os Personas y Viviendas</th></tr>
<tr><td rowspan="2" class="danT">Comuna</td>
<td colspan="6" class="danT">Da&ntilde;os Personas</td>
<td colspan="3" class="danT">Nro. Viviendas</td>
<td rowspan="2" class="danT">Nro. Viviendas no Evaluadas </td>
</tr>
<tr>
<td class="danT3">Afectadas</td>
<td class="danT3">Damnificadas</td>
<td class="danT3">Heridas</td>
<td class="danT3">Desaparecidas</td>
<td class="danT3">Albergadas</td>
<td class="danT3">Muertas</td>
<td class="danT3">Da&ntilde;o Menor </td>
<td class="danT3">Da&ntilde;o Mayor </td>
<td class="danT3">Destruidas</td>
</tr>
<?php
	$rsDanos = new Recordset($SERVER, $DB, $USER, $PASSWORD);
	$sqlDanos = "SELECT PERSONAS_AFECTADAS, PERSONAS_DAMNIFICADAS, PERSONAS_HERIDAS, PERSONAS_MUERTAS, PERSONAS_DESAPARECIDAS, PERSONAS_ALBERGADAS, VIVIENDAS_DANO_MENOR, VIVIENDAS_DANO_MAYOR, VIVIENDAS_DESTRUIDA, VIVIENDAS_NOEVALUADAS, COMUNA 
					FROM ALFADANOS AS D, INFORMEALFA AS A, COMUNA AS C, ENCARGADOS AS E 
					WHERE A.CONSOLIDAPROV_ID=\"$consp\" AND 
					A.ENCARGADO_ID=E.ENCARGADO_ID AND 
					E.COM_ID=C.COM_ID AND 
					A.INFORMEALFA_ID=D.INFORMEALFA_ID";
					
	$rsDanos->Open($sqlDanos);
	$nroDanos=$rsDanos->RecordCount();
	if($nroDanos>0) {
	   $cpers_afectadas = $cpers_damnifica = $cpers_heridas = $cpers_desaparec = $cpers_albergada = $cpers_muertas = $cviv_danomenor = $cviv_danomayor = $cviv_destruirre = $cviv_noevaluada = 0;
	   while($rsDanos->moveNext()) { ?>
	   	<tr>
	        <td class="danT2"><?php echo $rsDanos->FieldByNumber(10); ?></td> 
	        <!-- comuna -->
	        <td class="danT2"><?php echo $rsDanos->FieldByNumber(0); ?></td> <!-- afectadas -->
	        <td class="danT2"><?php echo $rsDanos->FieldByNumber(1); ?></td> <!-- damnificadas -->
	        <td class="danT2"><?php echo $rsDanos->FieldByNumber(2); ?></td> <!-- heridas -->
	        <td class="danT2"><?php echo $rsDanos->FieldByNumber(4); ?></td> <!-- desaparecidas -->
	        <td class="danT2"><?php echo $rsDanos->FieldByNumber(5); ?></td> <!-- albergadas -->
	        <td class="danT2"><?php echo $rsDanos->FieldByNumber(3); ?></td> <!-- muertas -->
	        <td class="danT2"><?php echo $rsDanos->FieldByNumber(6); ?></td> <!-- dano menor -->
	        <td class="danT2"><?php echo $rsDanos->FieldByNumber(7); ?></td> <!-- dano mayor -->
	        <td class="danT2"><?php echo $rsDanos->FieldByNumber(8); ?></td> <!-- destruidas -->
	        <td class="danT2"><?php echo $rsDanos->FieldByNumber(9); ?></td> <!-- no evaluadas -->
    </tr>
<?php
		$cpers_afectadas	= $cpers_afectadas + $rsDanos->FieldByNumber(0);
		$cpers_damnifica	= $cpers_damnifica + $rsDanos->FieldByNumber(1);
		$cpers_heridas		= $cpers_heridas + $rsDanos->FieldByNumber(2);
		$cpers_desaparec	= $cpers_desaparec + $rsDanos->FieldByNumber(4);
		$cpers_albergada	= $cpers_albergada + $rsDanos->FieldByNumber(5);
		$cpers_muertas		= $cpers_muertas + $rsDanos->FieldByNumber(3);
		$cviv_danomenor		= $cviv_danomenor + $rsDanos->FieldByNumber(6);
		$cviv_danomayor		= $cviv_danomayor + $rsDanos->FieldByNumber(7);
		$cviv_destruirre	= $cviv_destruirre + $rsDanos->FieldByNumber(8);
		$cviv_noevaluada	= $cviv_noevaluada + $rsDanos->FieldByNumber(9);
		
   }
     } ?>
	       <!-- Para Mostrar eL total x Provincia -->
      <tr > 
        <td class="danT" >Total Provincia</td>
        <td class="danT3"><?php echo $cpers_afectadas; ?></td>
        <td class="danT3"><?php echo $cpers_damnifica; ?></td>
        <td class="danT3"><?php echo $cpers_heridas; ?></td>
        <td class="danT3"><?php echo $cpers_desaparec; ?></td>
        <td class="danT3"><?php echo $cpers_albergada; ?></td>
        <td class="danT3"><?php echo $cpers_muertas; ?></td>
        <td class="danT3"><?php echo $cviv_danomenor; ?></td>
        <td class="danT3"><?php echo $cviv_danomayor; ?></td>
        <td class="danT3"><?php echo $cviv_destruirre; ?></td>
        <td class="danT3"><?php echo $cviv_noevaluada; ?></td>
      </tr>

</table>
<br/>

<table border="0" cellpadding="0" cellspacing="1" id="consdecision">
<tr><th colspan="2">Decisiones</th></tr>
<?php
	$rsDecisiones = new Recordset($SERVER, $DB, $USER, $PASSWORD);
	$sqlDecisiones = "SELECT INFORMEALFA_ID, COMUNA 
					FROM INFORMEALFA AS A, COMUNA AS C, ENCARGADOS AS E 
					WHERE A.CONSOLIDAPROV_ID=\"$consp\" AND 
					A.ENCARGADO_ID=E.ENCARGADO_ID AND 
					E.COM_ID=C.COM_ID";
					
	$rsDecisiones->Open($sqlDecisiones);
	$nroDecisiones=$rsDecisiones->RecordCount();
	if($nroDecisiones>0) {
		while($rsDecisiones->moveNext()) { ?>
			<tr><td class="decTE" colspan="2"></td></tr>
			<tr><td class="decT1" colspan="2">Comuna: &nbsp; <?php echo $rsDecisiones->FieldByNumber(1);?></td>
			<tr><td class="decT2">Acciones y Soluciones Inmediatas</td>
				<td class="decT2">Oportunidad [tpo.] Reestablecimiento</td>
			</tr>
			
<?php
			$rsAlfaDec = new Recordset($SERVER, $DB, $USER, $PASSWORD);
			$sqlAlfaDec = "SELECT ACCION, TIEMPO FROM ALFADECISIONES WHERE INFORMEALFA_ID=\"".$rsDecisiones->FieldByNumber(0)."\" ";
			$rsAlfaDec->Open($sqlAlfaDec);
			$nroAlfaDec=$rsAlfaDec->RecordCount();
			if($nroAlfaDec>0) {
				while($rsAlfaDec->moveNext()) { ?>
					<tr>
						<td><?php echo $rsAlfaDec->FieldByNumber(0);?></td>
						<td><?php echo $rsAlfaDec->FieldByNumber(1);?></td>
					</tr>
<?php
				}
			}
		}
	}
?>
<tr><td class="decTE" colspan="2"></td></tr>
</table>
<br />



<table border="0" cellpadding="0" cellspacing="1" id="consrecurso">
<tr><th colspan="3">Recursos Involucrados</th></tr>
<?php
	$rsRecursos = new Recordset($SERVER, $DB, $USER, $PASSWORD);
	$sqlRecursos = "SELECT INFORMEALFA_ID, COMUNA 
					FROM INFORMEALFA AS A, COMUNA AS C, ENCARGADOS AS E 
					WHERE A.CONSOLIDAPROV_ID=\"$consp\" AND 
					A.ENCARGADO_ID=E.ENCARGADO_ID AND 
					E.COM_ID=C.COM_ID";
					
	$rsRecursos->Open($sqlRecursos);
	$nroRecursos=$rsRecursos->RecordCount();
	if($nroRecursos>0) {
		$nroGasto = 0;
		while($rsRecursos->moveNext()) { ?>
			<tr><td class="recTE" colspan="3"></td></tr>
			<tr><td class="recT1" colspan="3">Comuna: &nbsp; <?php echo $rsRecursos->FieldByNumber(1);?></td>
			<tr>
				<td class="recT2">Recurso</td>
				<td class="recT2">Cantidad</td>
				<td class="recT2">Gasto</td>
			</tr>
<?php
			$rsAlfaRec = new Recordset($SERVER, $DB, $USER, $PASSWORD);
			$sqlAlfaRec = "SELECT TIPORECURSO, DESCRIPCION, CANTIDAD, GASTO
							FROM ALFARECURSOS AS A, RECURSOS AS R
							WHERE A.RECURSO_ID=R.RECURSO_ID AND 
							INFORMEALFA_ID=\"".$rsRecursos->FieldByNumber(0)."\" ";
			$rsAlfaRec->Open($sqlAlfaRec);
			$nroAlfaRec=$rsAlfaDec->RecordCount();
			if($nroAlfaRec>0) {
				while($rsAlfaRec->moveNext()) { ?>
					<tr>
					<td><?php echo $rsAlfaRec->FieldByNumber(0). " - ".$rsAlfaRec->FieldByNumber(1);?></td>
					<td><?php echo $rsAlfaRec->FieldByNumber(2);?></td>
					<td><?php echo $rsAlfaRec->FieldByNumber(3);?></td>
					</tr>
<?php
				 $nroGasto = $nroGasto + $rsAlfaRec->FieldByNumber(3);
				} ?>
<tr><td class="recT1" colspan="2">Total</td><td class="recT2"><?php echo $nroGasto;?></td>
<tr><td class="recTE" colspan="3"></td></tr>
<?php				
			}
		}
	}?>	  
					
					
</table>
<br />


<table border="0" cellpadding="0" cellspacing="1" id="consnecesidad">
<tr><th colspan="3">Evaluaci&oacute;n de Necesidades</th></tr>
<?php
	$rsNecesidades = new Recordset($SERVER, $DB, $USER, $PASSWORD);
	$sqlNecesidades = "SELECT INFORMEALFA_ID, COMUNA 
					FROM INFORMEALFA AS A, COMUNA AS C, ENCARGADOS AS E 
					WHERE A.CONSOLIDAPROV_ID=\"$consp\" AND 
					A.ENCARGADO_ID=E.ENCARGADO_ID AND 
					E.COM_ID=C.COM_ID";
					
	$rsNecesidades->Open($sqlNecesidades);
	$nroNecesidades=$rsNecesidades->RecordCount();
	if($nroNecesidades>0) {
		$nroNecesidad = 0;
		while($rsNecesidades->moveNext()) { ?>
			<tr><td class="necTE" colspan="3"></td></tr>
			<tr><td class="necT1" colspan="3">Comuna: &nbsp;<?php echo $rsNecesidades->FieldByNumber(1);?></td>
			<tr><td class="necT2">Necesidades</td>
				<td class="necT2">Cantidad</td>
				<td class="necT2">Motivo</td>
			</tr>
<?php
			$rsAlfaNec = new Recordset($SERVER, $DB, $USER, $PASSWORD);
			$sqlAlfaNec = "SELECT TPNECESIDAD, CANTIDAD, MOTIVO 
							FROM ALFANECESIDADES AS N, TP_NECESIDAD AS T 
							WHERE N.TPNECESIDAD_ID=T.TPNECESIDAD_ID AND INFORMEALFA_ID=\"".$rsNecesidades->FieldByNumber(0)."\" ";
			$rsAlfaNec->Open($sqlAlfaNec);
			$nroAlfaNec=$rsAlfaNec->RecordCount();
			if($nroAlfaNec>0) {
				while($rsAlfaNec->moveNext()) { ?>
					<tr>
						<td><?php echo $rsAlfaNec->FieldByNumber(0);?></td>
						<td><?php echo $rsAlfaNec->FieldByNumber(1);?></td>
						<td><?php echo $rsAlfaNec->FieldByNumber(2);?></td>
					</tr>
<?php 					 $nroNecesidad =  $nroNecesidad + $rsAlfaNec->FieldByNumber(1);
				}
			}
		}
	} ?>
</table>
<br />



<table border="0" cellpadding="0" cellspacing="1" id="consobservacion">
<tr><th>Observaciones</th></tr>
<tr><td><?php echo nl2br($rsEvento->FieldByNumber(11));?></td>
</tr>
</table>
<br />

<table border="0" cellpadding="0" cellspacing="1" id="conscapresp">
<tr><th>Capacidad de Respuesta</th></tr>
<tr><td><?php echo $rsEvento->FieldByNumber(8);?></td>
</tr>
</table>
<br />

<!--</div>-->
</td></tr>
</table>
<?php
} //nroEvento
else {
	// No encontró el ID del Evento actual
}
?>
</body>
</html>
<?php
} else { header("Location: ../../logout.php"); }
?>