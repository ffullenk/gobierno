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

//if($loginCorrecto ) { 
//    @include("../utiles/utiles.php"); ?>

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
/*
$rsEvento = new Recordset($SERVER, $DB, $USER, $PASSWORD);
$sqlEvento = "SELECT P.CONSOLIDAPROV_ID, P.TITULOEVENTO, O.TITULOEVENTO, NRO_EVENTOS,NRO_CONSOLIDADO, APELLIDOS, NOMBRES, TPEVENTO, TPCAPRESPUESTA, FECHA, HORA, OBSERVACIONES, CONSOLIDAREG_ID
        FROM CONSOLIDAPROV AS P, ENCARGADOS AS A, TP_CAPRESPUESTA AS N, TP_EVENTO AS E, TP_UBICACION AS U, EVENTOPROVINCIA AS O 
        WHERE P.ENCARGADO_ID=A.ENCARGADO_ID AND 
        P.TPEVENTO_ID=E.TPEVENTO_ID AND 
        P.TPCAPRESPUESTA_ID=N.TPCAPRESPUESTA_ID AND 
        P.TPUBICACION_ID=U.TPUBICACION_ID AND 
        P.EVENTOPROVINCIA_ID=O.EVENTOPROVINCIA_ID AND 
        O.EVENTOPROVINCIA_ID =\"$id\" ";
$rsEvento->Open($sqlEvento);
$nroEvento = $rsEvento->RecordCount();
if( $nroEvento > 0 ) {
	$rsEvento->moveNext();
	$tituloCons = $rsEvento->FieldByNumber(1);
	$nroCons = $rsEvento->FieldByNumber(4);
*/?>
<div id="enmarca">
<table border="0" cellpadding="0" cellspacing="1" id="constitulo">
<tr><td>Plan Dedos ONEMI</td></tr>
<tr><td>Informe Consolidado Provincial de Emergencia Nº <?php echo $nroCons;?> de <?php /*echo $rsEvento->FieldByNumber(3);*/?></td></tr>
<tr><td><?php /*echo $rsEvento->FieldByNumber(1);*/?></td></tr>
<tr><td>Regi&oacute;n de Coquimbo</td></tr>
</table>
<br />

<table border="0" cellpadding="0" cellspacing="1" id="considentifica">
<tr><th>Nombre del Evento</th><th>Tipo del Evento</th><th>Fecha y Hora</th></tr>
<tr><td>Encargado Provincial de Elqui</td><td>Sismo</td><td>17-07-2006  16:21</td></tr>
</table>
<br/>

<table border="0" cellpadding="0" cellspacing="1" id="consrespaldo">
<tr><th colspan="4">Respaldo</th></tr>
<tr><td class="respT">NºAlfa</td>
<td class="respT">Fecha</td>
<td class="respT">Comuna</td>
<td class="respT">Tipo de Evento</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
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
<td class="danT2">Afectadas</td>
<td class="danT2">Damnificadas</td>
<td class="danT2">Heridas</td>
<td class="danT2">Desaparecidas</td>
<td class="danT2">Albergadas</td>
<td class="danT2">Muertas</td>
<td class="danT2">Da&ntilde;o Menor </td>
<td class="danT2">Da&ntilde;o Mayor </td>
<td class="danT2">Destruidas</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
</table>
<br/>

<table border="0" cellpadding="0" cellspacing="1" id="consdecision">
<tr><th colspan="2">Decisiones</th></tr>
<tr><td class="decTE" colspan="2"></td></tr>
<tr><td class="decT1" colspan="2">Comuna:</td>
<tr><td class="decT2">Acciones y Soluciones Inmediatas</td>
<td class="decT2">Oportunidad [tpo.] Reestablecimiento</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr><td class="decTE" colspan="2"></td></tr>

</table>
<br />



<table border="0" cellpadding="0" cellspacing="1" id="consrecurso">
<tr><th colspan="3">Recursos Involucrados</th></tr>
<tr><td class="recTE" colspan="3"></td></tr>
<tr><td class="recT1" colspan="3">Comuna:</td>
<tr><td class="recT2">Recurso</td>
<td class="recT2">Cantidad</td>
<td class="recT2">Gasto</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr><td class="recT1" colspan="2">Total</td><td class="recT2">&nbsp;</td>
<tr><td class="recTE" colspan="3"></td></tr>
</table>
<br />


<table border="0" cellpadding="0" cellspacing="1" id="consnecesidad">
<tr><th colspan="3">Evaluaci&oacute;n de Necesidades</th></tr>
<tr><td class="necTE" colspan="3"></td></tr>
<tr><td class="necT1" colspan="3">Comuna:</td>
<tr><td class="necT2">Necesidades</td>
<td class="necT2">Motivo</td>
<td class="necT2">Cantidad</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr><td class="necTE" colspan="3"></td></tr>
</table>
<br />



<table border="0" cellpadding="0" cellspacing="1" id="consobservacion">
<tr><th>Observaciones</th></tr>
<tr><td class="obsT">&nbsp;</td>
</tr>
</table>
<br />

<table border="0" cellpadding="0" cellspacing="1" id="conscapresp">
<tr><th>Capacidad de Respuesta</th></tr>
<tr><td class="capT">&nbsp;</td>
</tr>
</table>
<br />

</div>
<?php
/* } */ //nroEvento
?>
</body>
</html>
