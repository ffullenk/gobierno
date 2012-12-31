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
//setlocale(LC_MONETARY, 'sp_SP');
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
	background-color: #0099CC;
}
-->
</style></head>

<body>
<?php
/*  Recupera valores para relacionar ID y CONSR */
$id = $_POST['id'];
$consr = $_POST['consr'];
/*  Recupera valores para relacionar ID y CONSR */


$rsEvento = new Recordset($SERVER, $DB, $USER, $PASSWORD);
$sqlEvento = "SELECT CONSOLIDAREG_ID, P.TITULOEVENTO, NRO_CONSOLIDADO, APELLIDOS, NOMBRES, TPEVENTO, TPCAPRESPUESTA, FECHA, HORA, OBSERVACIONES, NRO_EVENTOS, O.TITULOEVENTO   
				FROM CONSOLIDAREG AS P, ENCARGADOS AS A, TP_CAPRESPUESTA AS N, TP_EVENTO AS E, TP_UBICACION AS U, EVENTOREGION AS O  
				WHERE P.ENCARGADO_ID=A.ENCARGADO_ID AND 
				P.TPEVENTO_ID=E.TPEVENTO_ID AND 
				P.TPCAPRESPUESTA_ID=N.TPCAPRESPUESTA_ID AND 
				P.TPUBICACION_ID=U.TPUBICACION_ID AND 
				P.EVENTOREGION_ID=O.EVENTOREGION_ID AND 
				O.EVENTOREGION_ID = \"$id\" AND CONSOLIDAREG_ID=\"$consr\" ";
$rsEvento->Open($sqlEvento);
$nroEvento = $rsEvento->RecordCount();
if( $nroEvento > 0 ) {
	$rsEvento->moveNext();
	$tituloCons = $rsEvento->FieldByNumber(1);
	$nroCons = $rsEvento->FieldByNumber(2);
	$observConsR = nl2br($rsEvento->FieldByNumber(9));
?>
<!--<div id="enmarca">-->
<table border="0" align="center" cellpadding="0" cellspacing="0" id="enmarca">
<tr><td align="center">
<table border="0" cellpadding="0" cellspacing="1" id="constitulo">
<tr><td>Plan Dedos ONEMI</td></tr>
<tr>
  <td>Informe Consolidado Regional de Emergencia Nº <?php echo $nroCons;?> de <?php echo $rsEvento->FieldByNumber(10);?></td>
</tr>
<tr><td><?php echo $rsEvento->FieldByNumber(11);?></td></tr>
<tr><td>Regi&oacute;n de Coquimbo</td></tr>
<!--<tr><td><a href="convierte.php">Convertir PDF</a></td></tr>-->
</table>
<br />

<table border="0" cellpadding="0" cellspacing="1" id="considentifica">
<tr>
  <th>Responsable del Informe </th>
  <th>Tipo del Evento</th><th>Fecha y Hora</th></tr>
<tr>
<td><?php echo $rsEvento->FieldByNumber(4) . " " . $rsEvento->FieldByNumber(3);?></td>
<td><?php echo $rsEvento->FieldByNumber(5);?></td>
<td><?php echo fechaNuestra($rsEvento->FieldByNumber(7)) . "  " . $rsEvento->FieldByNumber(8);?></td></tr>
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
$sqlAlfas = "SELECT INFORMEALFA_ID, EVENTOALFA_ID, I.FECHA, NRO_INFORME, COMUNA, TPEVENTO 
FROM INFORMEALFA AS I, ENCARGADOS AS E, COMUNA AS C, CONSOLIDAPROV AS P, TP_EVENTO AS T 
WHERE P.CONSOLIDAREG_ID=\"$consr\" AND 
I.CONSOLIDAPROV_ID=P.CONSOLIDAPROV_ID AND 
I.ENCARGADO_ID=E.ENCARGADO_ID AND 
E.COM_ID=C.COM_ID AND 
I.TPEVENTO_ID=T.TPEVENTO_ID";

$rsAlfas->Open($sqlAlfas);
$nroAlfas=$rsAlfas->RecordCount();
if($nroAlfas>0) {
   while($rsAlfas->moveNext()) { ?>
	<tr>
		<td><a href="<?php echo _rutaVeAlfa_ ;?>muestra.php?alfa=<?php echo $rsAlfas->FieldByNumber(0);?>&id=<?php echo $rsAlfas->FieldByNumber(1);?>" target="_blank"><?php echo $rsAlfas->FieldByNumber(3);?></a>
		</td>
		<td><a href="<?php echo _rutaVeAlfa_ ;?>muestra.php?alfa=<?php echo $rsAlfas->FieldByNumber(0);?>&id=<?php echo $rsAlfas->FieldByNumber(1);?>" target="_blank"><?php echo fechaNuestra($rsAlfas->FieldByNumber(2));?></a>
		</td>
		<td><a href="<?php echo _rutaVeAlfa_ ;?>muestra.php?alfa=<?php echo $rsAlfas->FieldByNumber(0);?>&id=<?php echo $rsAlfas->FieldByNumber(1);?>" target="_blank"><?php echo $rsAlfas->FieldByNumber(4);?></a>
		</td>
		<td><a href="<?php echo _rutaVeAlfa_ ;?>muestra.php?alfa=<?php echo $rsAlfas->FieldByNumber(0);?>&id=<?php echo $rsAlfas->FieldByNumber(1);?>" target="_blank"><?php echo $rsAlfas->FieldByNumber(5);?></a>
		</td>
	</tr>
<?php
   } 
}?>
</table>
<br />

<table border="0" cellpadding="0" cellspacing="1" id="consdanos">
<tr>
  <th colspan="8">Situaci&oacute;n por Comunas  Personas y Viviendas</th>
</tr>
<?php
// Buscamos los Informes Alfas de Acuerdo a los Consolidados Regionales
/* CONSOLIDAREG -> ENCARGADO -> REGION -> PROVINCIA -> COMUNA*/ 
$rsConsR = new Recordset($SERVER, $DB, $USER, $PASSWORD);
$sqlConsR = "SELECT P.REGION_ID 
FROM CONSOLIDAREG AS A, PROVINCIA AS P, ENCARGADOS AS E, COMUNA AS C 
WHERE A.ENCARGADO_ID = E.ENCARGADO_ID 
AND E.COM_ID = C.COM_ID 
AND C.PROV_ID = P.PROV_ID 
AND A.CONSOLIDAREG_ID=\"$consr\"";

$rsConsR->Open($sqlConsR);
$nroConsR=$rsConsR->RecordCount();
if($nroConsR>0) {
   $rsConsR->moveNext();
   
   // Buscamos las Provincias de la Region Actual
	$rsConsP = new Recordset($SERVER, $DB, $USER, $PASSWORD);
	$sqlConsP = "SELECT PROV_ID, PROVINCIA FROM PROVINCIA WHERE REGION_ID=\"".$rsConsR->FieldByNumber(0)."\" ";
	$rsConsP->Open($sqlConsP);
	$nrConsP=$rsConsP->RecordCount();
	if($nrConsP>0) {
	   $r_damnificadas=$r_albergadas=$r_vmenor=$r_vmayor=$r_vdestruidas=$r_vnoevaluadas=0;

	   while($rsConsP->moveNext()) { ?>

		<tr><td class="danTE" colspan="8"></td></tr>
		<tr><td>Provincia</td><td colspan="7">&nbsp;<?php echo $rsConsP->FieldByNumber(1);?></td></tr>
		<tr><td class="danTE" colspan="8"></td></tr>

		<?php
	   // Chequeamos en CONSOLISIT x COMUNA y lo comparamos con PROV_ID para saber si corresponde y ademas CONSR
	   $rsConsI = new Recordset($SERVER, $DB, $USER, $PASSWORD);
	   
	
	$sqlConsI = "SELECT PERSONAS_AFECTADAS, PERSONAS_DAMNIFICADAS, PERSONAS_ALBERGADAS, VIVIENDAS_DANO_MENOR, VIVIENDAS_DANO_MAYOR, VIVIENDAS_DESTRUIDA, VIVIENDAS_NOEVALUADAS, COMUNA 
	   FROM CONSREGSIT AS CS, COMUNA AS C 
	   WHERE CONSOLIDAREG_ID=\"$consr\" AND 
	   CS.COM_ID=C.COM_ID AND 
	   C.PROV_ID=\"".$rsConsP->FieldByNumber(0)."\" ";
	
	   
	   $rsConsI->Open($sqlConsI);
	   $nroConsI=$rsConsI->RecordCount();
	   if($nroConsI>0) { ?>
		
			<tr><td rowspan="2" class="danT">Comuna</td>
				<td colspan="3" class="danT">Personas</td>
				<td colspan="3" class="danT">Nro. Viviendas</td>
				<td rowspan="2" class="danT">Nro. Viviendas no Evaluadas </td>
			</tr>
			<tr>
				<td class="danT3">Afectadas</td>
				<td class="danT3">Damnificadas</td>
				<td class="danT3">Albergadas</td>
				<td class="danT3">Da&ntilde;o Menor </td>
				<td class="danT3">Da&ntilde;o Mayor </td>
				<td class="danT3">Destruidas</td>
			</tr>
			<?php
				$p_afectadas = $p_damnificadas = $p_albergadas = $p_vmenor = $p_vmayor = $p_vdestruidas = $p_vnoevaluadas = 0;
				while($rsConsI->moveNext()) { ?>
				   	<tr>
						<td class="danT2"><?php echo $rsConsI->FieldByNumber(7); ?></td> <!-- comuna -->
				        <td class="danT2"><?php echo $rsConsI->FieldByNumber(0); ?></td> <!-- afectadas -->
						<td class="danT2"><?php echo $rsConsI->FieldByNumber(1); ?></td> <!-- damnificadas -->
				        <td class="danT2"><?php echo $rsConsI->FieldByNumber(2); ?></td> <!-- albergadas -->
				        <td class="danT2"><?php echo $rsConsI->FieldByNumber(3); ?></td> <!-- dano menor -->
				        <td class="danT2"><?php echo $rsConsI->FieldByNumber(4); ?></td> <!-- dano mayor -->
				        <td class="danT2"><?php echo $rsConsI->FieldByNumber(5); ?></td> <!-- destruidas -->
				        <td class="danT2"><?php echo $rsConsI->FieldByNumber(6); ?></td> <!-- no evaluadas -->
				    </tr>
<?php
				//PERSONAS_Afetadas
				$p_afectadas = $p_afectadas + $rsConsI->FieldByNumber(0);
				//PERSONAS_DAMNIFICADAS
				$p_damnificadas = $p_damnificadas + $rsConsI->FieldByNumber(1);
				//PERSONAS_ALBERGADAS
				$p_albergadas = $p_albergadas + $rsConsI->FieldByNumber(2);
				//VIVIENDAS_DANO_MENOR
				$p_vmenor = $p_vmenor + $rsConsI->FieldByNumber(3);
				//VIVIENDAS_DANO_MAYOR
				$p_vmayor = $p_vmayor + $rsConsI->FieldByNumber(4);
				//VIVIENDAS_DESTRUIDA
				$p_vdestruidas = $p_vdestruidas + $rsConsI->FieldByNumber(5);
				//VIVIENDAS_NOEVALUADAS
				$p_vnoevaluadas = $p_vnoevaluadas + $rsConsI->FieldByNumber(6);
		
			   } ?>
	       <!-- Para Mostrar eL total x Provincia -->
	      <tr > 
    	    <td class="danT" >Total Provincia</td>
	        <td class="danT3"><?php echo number_format($p_afectadas, 0, ',', '.'); ?></td>
			<td class="danT3"><?php echo number_format($p_damnificadas, 0, ',', '.'); ?></td>
    	    <td class="danT3"><?php echo number_format($p_albergadas, 0, ',', '.'); ?></td>
	        <td class="danT3"><?php echo number_format($p_vmenor, 0, ',', '.'); ?></td>
	        <td class="danT3"><?php echo number_format($p_vmayor, 0, ',', '.'); ?></td>
	        <td class="danT3"><?php echo number_format($p_vdestruidas, 0, ',', '.'); ?></td>
	        <td class="danT3"><?php echo number_format($p_vnoevaluadas, 0, ',', '.'); ?></td>
	      </tr>
		<tr><td class="danTE" colspan="8"></td></tr>

<?php
			$r_afectadas	= $r_afectadas + $p_afectadas;
			$r_damnificadas	= $r_damnificadas + $p_damnificadas;
			$r_albergadas	= $r_albergadas + $p_albergadas;
			$r_vmenor		= $r_vmenor + $p_vmenor;
			$r_vmayor		= $r_vmayor + $p_vmayor;
			$r_vdestruidas	= $r_vdestruidas + $p_vdestruidas;
			$r_vnoevaluadas	= $r_vnoevaluadas + $p_vnoevaluadas;

 } //ENDIF nroConsI ?>
<br /><br />
<?php
      } //ENDWHILE rsConsP 
	  } //ENDIF nrConsP 
} //ENDIF nroConsR ?>
		<tr><td class="danTE" colspan="8"></td></tr>
	      <tr > 
    	    <td class="danT" >Total Regional</td>
	        <td class="danT3"><?php echo number_format($r_afectadas, 0, ',', '.'); ?></td>
			<td class="danT3"><?php echo number_format($r_damnificadas, 0, ',', '.'); ?></td>
    	    <td class="danT3"><?php echo number_format($r_albergadas, 0, ',', '.'); ?></td>
	        <td class="danT3"><?php echo number_format($r_vmenor, 0, ',', '.'); ?></td>
	        <td class="danT3"><?php echo number_format($r_vmayor, 0, ',', '.'); ?></td>
	        <td class="danT3"><?php echo number_format($r_vdestruidas, 0, ',', '.'); ?></td>
	        <td class="danT3"><?php echo number_format($r_vnoevaluadas, 0, ',', '.'); ?></td>
	      </tr>
		<tr><td class="danTE" colspan="8"></td></tr>
	  
</table>
<br/><br/>

<!--
------------------------------------------------------------------------------------------------------
MUESTRA APARTADO DE DECISIONES POR CONSOLIDADO REGIONAL
------------------------------------------------------------------------------------------------------
********************* SACAR ESTE APARTADO ************************

<table border="0" cellpadding="0" cellspacing="1"  id="consdecision">
	<tr><th colspan="3">Decisiones</th></tr>
	<tr><td class="decTE" colspan="3"></td></tr>
<?php
/*$sqlDecisiones = "SELECT PROVINCIA, COMUNA, ACCION, TIEMPO, alfa.INFORMEALFA_ID, comu.COM_ID, comu.PROV_ID 
FROM PROVINCIA AS prov, COMUNA AS comu, ENCARGADOS AS usuario, ALFADECISIONES AS desci, INFORMEALFA AS alfa, CONSOLIDAPROV AS consprov
WHERE prov.PROV_ID=comu.PROV_ID AND 
comu.COM_ID=usuario.COM_ID AND 
usuario.ENCARGADO_ID=alfa.ENCARGADO_ID AND 
alfa.INFORMEALFA_ID=desci.INFORMEALFA_ID AND 
consprov.CONSOLIDAPROV_ID=alfa.CONSOLIDAPROV_ID AND 
consprov.CONSOLIDAREG_ID=\"$consr\" 
ORDER BY comu.PROV_ID, comu.COM_ID";
$qryDecisiones = mysql_query($sqlDecisiones);
$nrDecisiones = mysql_num_rows($qryDecisiones);
if($nrDecisiones>0) {
	$rsDecisiones = mysql_fetch_array($qryDecisiones);

	while($rsDecisiones) {
		$actualProvincia =$rsDecisiones['PROV_ID'];
		echo "<tr><td>Provincia: </td><td colspan=\"2\"><b>".$rsDecisiones['PROVINCIA']."</b></td></tr>
				<tr><th class=\"decT\">Comuna</th><th class=\"decT\">Acciones y Soluciones Inmediatas</th><th class=\"decT\">Oportunidad (tiempo) Reestablecimiento</th></tr>
		";
		while($actualProvincia==$rsDecisiones['PROV_ID']) {
			echo "
			<tr><td class=\"decT3\">".$rsDecisiones['COMUNA']."</td>
				<td class=\"decT3\">".$rsDecisiones['ACCION']."</td>
				<td class=\"decT3\">".$rsDecisiones['TIEMPO']."</td>
			</tr>		
			";
			$rsDecisiones = mysql_fetch_array($qryDecisiones);
		}
		echo "<tr><td  class=\"decTE\" colspan=\"3\"></td></tr>";
	}
}
*/
?>
</table>
<br/><br/>
-->


<!-- CONSOLIDAREG_ID=\"$consr\" -->
<!--
----------------------------------------------------------------------------------------------------------------------------
MUESTRA APARTADO DE RECURSOS INVOLUCRADOS POR CONSOLIDADO REGIONAL
----------------------------------------------------------------------------------------------------------------------------
********************* SACAR ESTE APARTADO **********************************

<table border="0" cellpadding="0" cellspacing="1"  id="consrecurso">
	<tr><th colspan="5">Recursos Involucrados</th></tr>
	<tr><td class="recTE" colspan="5"></td></tr>
<?php
/*$sqlRecInv = "SELECT PROVINCIA, COMUNA, TIPORECURSO, DESCRIPCION, CANTIDAD, GASTO, alfa.INFORMEALFA_ID, comu.COM_ID, comu.PROV_ID
					FROM PROVINCIA AS prov, COMUNA AS comu, ENCARGADOS AS usuario, ALFARECURSOS AS R, INFORMEALFA AS alfa, CONSOLIDAPROV AS consprov, RECURSOS AS tipo
					WHERE prov.PROV_ID=comu.PROV_ID AND 
						comu.COM_ID=usuario.COM_ID AND 
						usuario.ENCARGADO_ID=alfa.ENCARGADO_ID AND
						alfa.INFORMEALFA_ID=R.INFORMEALFA_ID AND
						R.RECURSO_ID=tipo.RECURSO_ID AND 
						consprov.CONSOLIDAPROV_ID=alfa.CONSOLIDAPROV_ID AND 
						consprov.CONSOLIDAREG_ID=\"$consr\"
						ORDER BY comu.PROV_ID, comu.COM_ID
						";
$qryRecInv = mysql_query($sqlRecInv);
$nrRecInv = mysql_num_rows($qryRecInv);
$gastoRecInvRegion = 0;
if($nrRecInv>0) {
	$rsRecInv = mysql_fetch_array($qryRecInv);
	$gastoRecInvComuna = 0;
	
	while($rsRecInv) {
		$actualProvincia =$rsRecInv['PROV_ID'];
		echo "<tr><td>Provincia: </td><td colspan=\"4\"><b>".$rsRecInv['PROVINCIA']."</b></td></tr>
				<tr><th class=\"recT\">Comuna</th><th class=\"recT\">Recurso</th><th class=\"recT\">Motivo</th><th class=\"recT\">Cantidad</th><th class=\"recT\">Gasto</th></tr>
		";
		while($actualProvincia==$rsRecInv['PROV_ID']) {
			echo "
			<tr><td class=\"recT3\">".$rsRecInv['COMUNA']."</td>
				<td class=\"recT3\">".$rsRecInv['TIPORECURSO']."</td>
				<td class=\"recT3\">".$rsRecInv['DESCRIPCION']."</td>				
				<td class=\"recT3\">".$rsRecInv['CANTIDAD']."</td>
				<td class=\"recT3\">".$rsRecInv['GASTO']."</td>
			</tr>		
			";
			$gastoRecInvComuna = $gastoRecInvComuna + $rsRecInv['GASTO'];
			$rsRecInv = mysql_fetch_array($qryRecInv);
		}
		echo "
		<tr><th class=\"recT3\" colspan=\"4\">Gasto Total Provincia</th><td class=\"recT\" >".number_format($gastoRecInvComuna)."</td></tr>
		<tr><td class=\"recTE\" colspan=\"5\" height=\"10\"></td></tr>";
		$gastoRecInvRegion = $gastoRecInvRegion + $gastoRecInvComuna;
	}
	echo "<tr><th class=\"recT3\" colspan=\"4\">Gasto Total Regional</th><td class=\"recT\" >".number_format($gastoRecInvRegion)."</td></tr>
	<tr><td class=\"recTE\" colspan=\"5\" height=\"10\"></td></tr>";
}
*/
?>

</table>
<br/><br/>
-->

<!--
-------------------------------------------------------------------------------------
MUESTRA APARTADO DE Evaluacion de Necesidades POR CONSOLIDADO REGIONAL
-------------------------------------------------------------------------------------
-->
<table border="0" cellpadding="0" cellspacing="1"  id="consnecesidad">
	<tr><th colspan="2">Evaluacion de Necesidades</th></tr>
	<tr><td class="necTE" colspan="2"></td></tr>
<?php
$sqlEvNec = "SELECT TPNECESIDAD, sum( CANTIDAD ) as TOTAL 
FROM PROVINCIA AS prov, COMUNA AS comu, ENCARGADOS AS usuario, ALFANECESIDADES AS N, INFORMEALFA AS alfa, CONSOLIDAPROV AS consprov, TP_NECESIDAD AS tipo
WHERE prov.PROV_ID = comu.PROV_ID
AND comu.COM_ID = usuario.COM_ID
AND usuario.ENCARGADO_ID = alfa.ENCARGADO_ID
AND alfa.INFORMEALFA_ID = N.INFORMEALFA_ID
AND N.TPNECESIDAD_ID = tipo.TPNECESIDAD_ID
AND consprov.CONSOLIDAPROV_ID = alfa.CONSOLIDAPROV_ID
AND consprov.CONSOLIDAREG_ID = \"$consr\"
GROUP BY TPNECESIDAD";



/*
$sqlEvNec = "SELECT PROVINCIA, COMUNA, TPNECESIDAD, CANTIDAD, MOTIVO, alfa.INFORMEALFA_ID, comu.COM_ID, comu.PROV_ID ".
	"FROM PROVINCIA AS prov, COMUNA AS comu, ENCARGADOS AS usuario, ALFANECESIDADES AS N, INFORMEALFA AS alfa, ".
	"CONSOLIDAPROV AS consprov, TP_NECESIDAD AS tipo ".
	"WHERE prov.PROV_ID=comu.PROV_ID AND ".
	"comu.COM_ID=usuario.COM_ID AND ".
	"usuario.ENCARGADO_ID=alfa.ENCARGADO_ID AND ".
	"alfa.INFORMEALFA_ID=N.INFORMEALFA_ID AND ".
	"N.TPNECESIDAD_ID=tipo.TPNECESIDAD_ID AND ".
	"consprov.CONSOLIDAPROV_ID=alfa.CONSOLIDAPROV_ID AND ".
	"consprov.CONSOLIDAREG_ID=\"$consr\" ".
	"ORDER BY comu.PROV_ID, comu.COM_ID";
*/

$qryEvNec = mysql_query($sqlEvNec);
$nrEvNec = mysql_num_rows($qryEvNec);

if($nrEvNec>0) {
	/* $rsEvNec = mysql_fetch_array($qryEvNec); */
	echo "<tr><tr><th class=\"necT\">Necesidad</th><th class=\"necT\">Total</th></tr>";
	while($rsEvNec = mysql_fetch_array($qryEvNec)) {
		echo "<tr>
				<td class=\"necT3\">".$rsEvNec['TPNECESIDAD']."</td>
				<td  class=\"necT3\" style=\"text-align: right;\">".number_format($rsEvNec['TOTAL'], 0, ',', '.')."</td>
			  </tr>";
	}
	echo "<tr><td class=\"necTE\" colspan=\"2\"></td></tr>";
	
/*	while($rsEvNec) {
		$actualProvincia =$rsEvNec['PROV_ID'];
		echo "<tr><td>Provincia: </td><td colspan=\"3\"><b>".$rsEvNec['PROVINCIA']."</b></td></tr>
				<tr><th class=\"necT\">Comuna</th><th class=\"necT\">Necesidad</th><th class=\"necT\">Cantidad</th><th class=\"necT\">Motivo</th></tr>
		";
		while($actualProvincia==$rsEvNec['PROV_ID']) {
			echo "
			<tr>
				<td class=\"necT2\">".$rsEvNec['COMUNA']."</td>
				<td class=\"necT2\">".$rsEvNec['TPNECESIDAD']."</td>
				<td class=\"necT2\">".$rsEvNec['CANTIDAD']."</td>
				<td class=\"necT2\">".$rsEvNec['MOTIVO']."</td>
			</tr>		
			";
			$rsEvNec = mysql_fetch_array($qryEvNec);
		}
		echo "
		<tr><td class=\"necTE\" colspan=\"4\"></td></tr>";
	}
*/	
}

?>
</table>
<br/><br/>


<table border="0" cellpadding="0" cellspacing="1" id="consrecurso">
<tr>
  <th colspan="2">Puntos Cr&iacute;ticos </th>
</tr>
<?php
// Puntos Criticos
$rsPuntos = new Recordset($SERVER, $DB, $USER, $PASSWORD);
$sqlPuntos = "SELECT IDENTIFICACION, UBICACION, DANO, ESTADOACTUAL, SOLUCION, GESTION 
				FROM CONSREGPUNTOS 
				WHERE CONSOLIDAREG_ID=\"$consr\"";
$rsPuntos->Open($sqlPuntos);
$nroPuntos=$rsPuntos->RecordCount();
if($nroPuntos>0) { 
	while($rsPuntos->moveNext()) {?>
			<tr><td class="recTE" colspan="2"></td></tr>
			<tr>
				<td class="recT1" colspan="2">
					Identificaci&oacute;n: &nbsp; <?php echo $rsPuntos->FieldByNumber(1);?>
				</td>
			</tr>
			<tr><td class="recTE" colspan="2"></td></tr>
			<tr><td class="recT4" colspan="2">Ubicaci&oacute;n (Comuna/Sector/Km.)</td>
			</tr>
			<tr><td class="recT3" colspan="2"><?php echo nl2br($rsPuntos->FieldByNumber(1));?></td>
			</tr>
			<tr><td class="recTE" colspan="2"></td></tr>
			<tr><td class="recT4" colspan="2">Gesti&oacute;n y Recursos (Humanos-T&eacute;cnicos-Financieros)</td>
			</tr>
			<tr><td class="recT3" colspan="2"><?php echo nl2br($rsPuntos->FieldByNumber(5));?></td>
			</tr>
			<tr><td class="recTE" colspan="2"></td></tr>
			<tr><td class="recT4" colspan="2">Da&ntilde;o</td>
			</tr>
			<tr><td class="recT3" colspan="2"><?php echo nl2br($rsPuntos->FieldByNumber(2));?></td>
			</tr>
			
			<tr><td class="recTE" colspan="2"></td></tr>
			<tr><td class="recT4" colspan="2">Estado ActualViviendas</td>
			</tr>
			<tr><td class="recT3" colspan="2"><?php echo nl2br($rsPuntos->FieldByNumber(3));?></td>
			</tr>
			
			<tr><td class="recTE" colspan="2"></td></tr>
			<tr><td class="recT4" colspan="2">Soluci&oacute;n en Proceso</td>
			</tr>
			<tr><td class="recT3" colspan="2"><?php echo nl2br($rsPuntos->FieldByNumber(4));?></td>
			</tr>
			<tr><td class="recTE" colspan="2"></td></tr>
			<tr><td class="recTE" colspan="2"></td></tr>
<?php	

			}
		}?>	  
					
					
</table>
<br />


<table border="0" cellpadding="0" cellspacing="1" id="consobservacion">
<tr><th>Observaciones</th></tr>
<tr><td><?php echo $observConsR;?></td>
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