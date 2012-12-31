<?php
require('../../../../html2fpdf/html2fpdf.php');
// activate Output-Buffer:
ob_start();
//START-OF-PHP code(...) 

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
</head>

<body>
<?php

$rsEvento = new Recordset($SERVER, $DB, $USER, $PASSWORD);
$sqlEvento = "SELECT CONSOLIDAREG_ID, P.TITULOEVENTO, NRO_CONSOLIDADO, APELLIDOS, NOMBRES, TPEVENTO, TPCAPRESPUESTA, FECHA, HORA, OBSERVACIONES, NRO_EVENTOS, O.TITULOEVENTO   
				FROM CONSOLIDAREG AS P, ENCARGADOS AS A, TP_CAPRESPUESTA AS N, TP_EVENTO AS E, TP_UBICACION AS U, EVENTOREGION AS O  
				WHERE P.ENCARGADO_ID=A.ENCARGADO_ID AND 
				P.TPEVENTO_ID=E.TPEVENTO_ID AND 
				P.TPCAPRESPUESTA_ID=N.TPCAPRESPUESTA_ID AND 
				P.TPUBICACION_ID=U.TPUBICACION_ID AND 
				P.EVENTOREGION_ID=O.EVENTOREGION_ID AND 
				O.EVENTOREGION_ID = \"$id\" ";
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
  <td>Informe Consolidado Regional de Emergencia Nº <?php echo $rsEvento->FieldByNumber(10);?> de <?php echo $nroCons;?></td>
</tr>
<tr><td><?php echo $rsEvento->FieldByNumber(11);?></td></tr>
<tr><td>Regi&oacute;n de Coquimbo</td></tr>
<tr><td><a href="convierte.php">Convertir PDF</a></td></tr>
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
		<td><a href="<?php echo _rutaVeAlfa_ ;?>muestra.php?id=<?php echo $rsAlfas->FieldByNumber(1);?>&alfa=<?php echo $rsAlfas->FieldByNumber(0);?>" target="_blank"><?php echo $rsAlfas->FieldByNumber(3);?></a>
		</td>
		<td><a href="<?php echo _rutaVeAlfa_ ;?>muestra.php?id=<?php echo $rsAlfas->FieldByNumber(1);?>&alfa=<?php echo $rsAlfas->FieldByNumber(0);?>" target="_blank"><?php echo fechaNuestra($rsAlfas->FieldByNumber(2));?></a>
		</td>
		<td><a href="<?php echo _rutaVeAlfa_ ;?>muestra.php?id=<?php echo $rsAlfas->FieldByNumber(1);?>&alfa=<?php echo $rsAlfas->FieldByNumber(0);?>" target="_blank"><?php echo $rsAlfas->FieldByNumber(4);?></a>
		</td>
		<td><a href="<?php echo _rutaVeAlfa_ ;?>muestra.php?id=<?php echo $rsAlfas->FieldByNumber(1);?>&alfa=<?php echo $rsAlfas->FieldByNumber(0);?>" target="_blank"><?php echo $rsAlfas->FieldByNumber(5);?></a>
		</td>
	</tr>
<?php
   } 
}?>
</table>
<br />

<table border="0" cellpadding="0" cellspacing="1" id="consdanos">
<tr>
  <th colspan="7">Situaci&oacute;n por Comunas  Personas y Viviendas</th>
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

		<tr><td class="danTE" colspan="7"></td></tr>
		<tr><td>Provincia</td><td colspan="6">&nbsp;<?php echo $rsConsP->FieldByNumber(1);?></td></tr>
		<tr><td class="danTE" colspan="7"></td></tr>

		<?php
	   // Chequeamos en CONSOLISIT x COMUNA y lo comparamos con PROV_ID para saber si corresponde y ademas CONSR
	   $rsConsI = new Recordset($SERVER, $DB, $USER, $PASSWORD);
	   $sqlConsI = "SELECT PERSONAS_DAMNIFICADAS, PERSONAS_ALBERGADAS, VIVIENDAS_DANO_MENOR, VIVIENDAS_DANO_MAYOR, VIVIENDAS_DESTRUIDA, VIVIENDAS_NOEVALUADAS, COMUNA 
	   FROM CONSREGSIT AS CS, COMUNA AS C 
	   WHERE CONSOLIDAREG_ID=\"$consr\" AND 
	   CS.COM_ID=C.COM_ID AND 
	   C.PROV_ID=\"".$rsConsP->FieldByNumber(0)."\" ";
	   
	   $rsConsI->Open($sqlConsI);
	   $nroConsI=$rsConsI->RecordCount();
	   if($nroConsI>0) { ?>
		
			<tr><td rowspan="2" class="danT">Comuna</td>
				<td colspan="2" class="danT">Personas</td>
				<td colspan="3" class="danT">Nro. Viviendas</td>
				<td rowspan="2" class="danT">Nro. Viviendas no Evaluadas </td>
			</tr>
			<tr>
				<td class="danT3">Damnificadas</td>
				<td class="danT3">Albergadas</td>
				<td class="danT3">Da&ntilde;o Menor </td>
				<td class="danT3">Da&ntilde;o Mayor </td>
				<td class="danT3">Destruidas</td>
			</tr>
			<?php
				$p_damnificadas = $p_albergadas = $p_vmenor = $p_vmayor = $p_vdestruidas = $p_vnoevaluadas = 0;
				while($rsConsI->moveNext()) { ?>
				   	<tr>
				        <td class="danT2"><?php echo $rsConsI->FieldByNumber(6); ?></td> <!-- damnificadas -->
				        <td class="danT2"><?php echo $rsConsI->FieldByNumber(0); ?></td> <!-- albergadas -->
				        <td class="danT2"><?php echo $rsConsI->FieldByNumber(1); ?></td> <!-- dano menor -->
				        <td class="danT2"><?php echo $rsConsI->FieldByNumber(2); ?></td> <!-- dano mayor -->
				        <td class="danT2"><?php echo $rsConsI->FieldByNumber(3); ?></td> <!-- destruidas -->
				        <td class="danT2"><?php echo $rsConsI->FieldByNumber(4); ?></td> <!-- no evaluadas -->
				        <td class="danT2"><?php echo $rsConsI->FieldByNumber(5); ?></td> <!-- no evaluadas -->
				    </tr>
<?php
				//PERSONAS_DAMNIFICADAS
				$p_damnificadas = $p_damnificadas + $rsConsI->FieldByNumber(0);
				//PERSONAS_ALBERGADAS
				$p_albergadas = $p_albergadas + $rsConsI->FieldByNumber(1);
				//VIVIENDAS_DANO_MENOR
				$p_vmenor = $p_vmenor + $rsConsI->FieldByNumber(2);
				//VIVIENDAS_DANO_MAYOR
				$p_vmayor = $p_vmayor + $rsConsI->FieldByNumber(3);
				//VIVIENDAS_DESTRUIDA
				$p_vdestruidas = $p_vdestruidas + $rsConsI->FieldByNumber(4);
				//VIVIENDAS_NOEVALUADAS
				$p_vnoevaluadas = $p_vnoevaluadas + $rsConsI->FieldByNumber(5);
		
			   } ?>
	       <!-- Para Mostrar eL total x Provincia -->
	      <tr > 
    	    <td class="danT" >Total Provincia</td>
	        <td class="danT3"><?php echo $p_damnificadas; ?></td>
    	    <td class="danT3"><?php echo $p_albergadas; ?></td>
	        <td class="danT3"><?php echo $p_vmenor; ?></td>
	        <td class="danT3"><?php echo $p_vmayor; ?></td>
	        <td class="danT3"><?php echo $p_vdestruidas; ?></td>
	        <td class="danT3"><?php echo $p_vnoevaluadas; ?></td>
	      </tr>
		<tr><td class="danTE" colspan="7"></td></tr>

<?php
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
		<tr><td class="danTE" colspan="7"></td></tr>
	      <tr > 
    	    <td class="danT" >Total Regional</td>
	        <td class="danT3"><?php echo $r_damnificadas; ?></td>
    	    <td class="danT3"><?php echo $r_albergadas; ?></td>
	        <td class="danT3"><?php echo $r_vmenor; ?></td>
	        <td class="danT3"><?php echo $r_vmayor; ?></td>
	        <td class="danT3"><?php echo $r_vdestruidas; ?></td>
	        <td class="danT3"><?php echo $r_vnoevaluadas; ?></td>
	      </tr>
		<tr><td class="danTE" colspan="7"></td></tr>
	  
</table>
<br/>



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
			<tr><td class="recT3" colspan="2"><?php echo $rsPuntos->FieldByNumber(1);?></td>
			</tr>
			<tr><td class="recT4" colspan="2">Gesti&oacute;n y Recursos (Humanos-T&eacute;cnicos-Financieros)</td>
			</tr>
			<tr><td class="recT3" colspan="2"><?php echo $rsPuntos->FieldByNumber(5);?></td>
			</tr>
			<tr><td class="recT4" colspan="2">Da&ntilde;o</td>
			</tr>
			<tr><td class="recT3" colspan="2"><?php echo $rsPuntos->FieldByNumber(2);?></td>
			</tr>
			<tr><td class="recT4" colspan="2">Estado ActualViviendas</td>
			</tr>
			<tr><td class="recT3" colspan="2"><?php echo $rsPuntos->FieldByNumber(3);?></td>
			</tr>
			<tr><td class="recT4" colspan="2">Soluci&oacute;n en Proceso</td>
			</tr>
			<tr><td class="recT3" colspan="2"><?php echo $rsPuntos->FieldByNumber(4);?></td>
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

// PHP code here
//END-OF-PHP code
// Output-Buffer in variable:
$htmlbuffer=ob_get_contents();
// delete Output-Buffer :
ob_end_clean();
require('../../../../html2fpdf/html2fpdf.php');
$pdf=new PDF();
$pdf->AddPage();
$pdf->WriteHTML($htmlbuffer);
$pdf->Output(); //Outputs on browser screen
?>