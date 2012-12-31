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

<html>
<head>
<title>::... OREMI: Informe Alfa &middot;&middot;&middot;::</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../../estilos/oremicons.css" type="text/css">
<script language="JavaScript" src="js/vldfecha.js"></script>
<script language="JavaScript" src="js/oremi.js"></script>
</head>

<body>
<?php
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
?>
<div id="muestra">
  <div id="titulocons">
    <h2>Plan Dedos ONEMI</h2>
	<h4>Informe Consolidado Provincial de Emergencia Nº <?php echo $nroCons;?> de <?php echo $rsEvento->FieldByNumber(3);?></h4>
	<h4><?php echo $rsEvento->FieldByNumber(1);?></h4>
	<h5>Regi&oacute;n de Coquimbo</h5>
  </div>

  <div id="identificacons">
<table border="0" width="100%" cellpadding="0" cellspacing="1" bgcolor="666666">
<tr>
  <th >Nombre del Responsable</td>
  <th >Tipo del Evento</td>
  <th >Fecha y Hora</td>
</tr>
<tr>
  <td class="cprespo"><?php echo $rsEvento->FieldByNumber(6) . " " . $rsEvento->FieldByNumber(5);?></td>
  <td class="cprespo"><?php echo $rsEvento->FieldByNumber(7);?></td>
  <td class="cprespo"><?php echo fechaNuestra($rsEvento->FieldByNumber(9)) . "  " . $rsEvento->FieldByNumber(10);?></td>
</tr>
</table>

  </div>
  <br />
  
<?php
	// Buscamos todos los informes alfas que guarden relacion con este consolidado
	$rsAlfas = new Recordset($SERVER, $DB, $USER, $PASSWORD);
	$sqlAlfas = "SELECT INFORMEALFA_ID, FECHA, NRO_INFORME, COMUNA, TPEVENTO, EVENTOALFA_ID 
					FROM INFORMEALFA AS A, ENCARGADOS AS E, COMUNA AS C, TP_EVENTO AS T 
					WHERE A.ENCARGADO_ID=E.ENCARGADO_ID AND 
					E.COM_ID=C.COM_ID AND 
					T.TPEVENTO_ID=A.TPEVENTO_ID AND 
					CONSOLIDAPROV_ID=\"$consp\" ";
?>
  <div id="infalfascons">
      <h2>Respaldo</h2>
	  <table border="0" width="100%" cellpadding="0" cellspacing="1" bgcolor="666666">
	    <tr>
		  <th>Alfa</td>
		  <th>Fecha</td>
		  <th>Comuna</td>
		  <th>Tipo Evento</td>
		  <th>Comuna</td>
		</tr>
<?php
		$rsAlfas->Open($sqlAlfas);
		$nroAlfas=$rsAlfas->RecordCount();
		if($nroAlfas>0) {
		   while($rsAlfas->moveNext()) {
?>
		<tr>
		   <td bgcolor="#FFFFFF" align="center"><a href="<?php echo _rutaVeAlfa_ ;?>muestra.php?id=<?php echo $rsAlfas->FieldByNumber(5);?>&alfa=<?php echo $rsAlfas->FieldByNumber(0);?>" target="_blank"><?php echo $rsAlfas->FieldByNumber(2);?></a></td>
		   <td bgcolor="#FFFFFF" align="center"><a href="<?php echo _rutaVeAlfa_ ;?>muestra.php?id=<?php echo $rsAlfas->FieldByNumber(5);?>&alfa=<?php echo $rsAlfas->FieldByNumber(0);?>" target="_blank"><?php echo fechaNuestra($rsAlfas->FieldByNumber(1));?></a></td>
		   <td bgcolor="#FFFFFF"><a href="<?php echo _rutaVeAlfa_ ;?>muestra.php?id=<?php echo $rsAlfas->FieldByNumber(5);?>&alfa=<?php echo $rsAlfas->FieldByNumber(0);?>" target="_blank"><?php echo $rsAlfas->FieldByNumber(3);?></a></td>
		   <td bgcolor="#FFFFFF"><a href="<?php echo _rutaVeAlfa_ ;?>muestra.php?id=<?php echo $rsAlfas->FieldByNumber(5);?>&alfa=<?php echo $rsAlfas->FieldByNumber(0);?>" target="_blank"><?php echo $rsAlfas->FieldByNumber(4);?></a></td>
		   <td bgcolor="#FFFFFF"><a href="<?php echo _rutaVeAlfa_ ;?>muestra.php?id=<?php echo $rsAlfas->FieldByNumber(5);?>&alfa=<?php echo $rsAlfas->FieldByNumber(0);?>" target="_blank"><?php echo $rsAlfas->FieldByNumber(3);?></a></td>
		</tr>
<?php      } 
        } ?>
	  </table>

	
<!--	<div id="derivado">
	  <h2>Evento Derivado</h2>
	</div> -->
	
  </div>
  <br />

  <div id="danoscons">
    <h2>Da&ntilde;os Personas y Viviendas</h2>
    <table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="666666">
      <tr align="center" valign="middle"> 
        <td rowspan="2" bgcolor="#dde5f2">Comuna</td>
        <td colspan="6" bgcolor="f7f7f7">Da&ntilde;os Personas</td>
        <td colspan="3" bgcolor="f7f7f7">Nro. Viviendas Con</td>
        <td rowspan="2" bgcolor="#dde5f2">Nro. Viviendas No Evaluadas</td>
      </tr>
      <tr> 
        <th>Afectadas</td>
        <th>Damnificadas</td>
        <th>Heridas</td>
        <th>Desaparecidas</td>
        <th>Albergadas</td>
        <th>Muertas</td>
        <th>Da&ntilde;o Menor</td>
        <th>Da&ntilde;o Mayor</td>
        <th>Destruidas</td>
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
	   while($rsDanos->moveNext()) {
?>
      <tr valign="middle" align="center"> 
        <td bgcolor="#FFFFFF"><strong><?php echo $rsDanos->FieldByNumber(10); ?></strong></td> <!-- comuna -->
        <td bgcolor="#FFFFFF"><?php echo $rsDanos->FieldByNumber(0); ?></td> <!-- afectadas -->
        <td bgcolor="#FFFFFF"><?php echo $rsDanos->FieldByNumber(1); ?></td> <!-- damnificadas -->
        <td bgcolor="#FFFFFF"><?php echo $rsDanos->FieldByNumber(2); ?></td> <!-- heridas -->
        <td bgcolor="#FFFFFF"><?php echo $rsDanos->FieldByNumber(4); ?></td> <!-- desaparecidas -->
        <td bgcolor="#FFFFFF"><?php echo $rsDanos->FieldByNumber(5); ?></td> <!-- albergadas -->
        <td bgcolor="#FFFFFF"><?php echo $rsDanos->FieldByNumber(3); ?></td> <!-- muertas -->
        <td bgcolor="#FFFFFF"><?php echo $rsDanos->FieldByNumber(6); ?></td> <!-- dano menor -->
        <td bgcolor="#FFFFFF"><?php echo $rsDanos->FieldByNumber(7); ?></td> <!-- dano mayor -->
        <td bgcolor="#FFFFFF"><?php echo $rsDanos->FieldByNumber(8); ?></td> <!-- destruidas -->
        <td bgcolor="#FFFFFF"><?php echo $rsDanos->FieldByNumber(9); ?></td> <!-- no evaluadas -->
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
      <tr align="center" valign="middle" bgcolor="f7f7f7"> 
        <td ><strong>Total Provincial</strong></td>
        <td><?php echo $cpers_afectadas; ?></td>
        <td><?php echo $cpers_damnifica; ?></td>
        <td><?php echo $cpers_heridas; ?></td>
        <td><?php echo $cpers_desaparec; ?></td>
        <td><?php echo $cpers_albergada; ?></td>
        <td><?php echo $cpers_muertas; ?></td>
        <td><?php echo $cviv_danomenor; ?></td>
        <td><?php echo $cviv_danomayor; ?></td>
        <td><?php echo $cviv_destruirre; ?></td>
        <td><?php echo $cviv_noevaluada; ?></td>
      </tr>
    </table>
  </div>
  <br />

  <div id="desicionescons">
    <h2>Desiciones</h2>
    <table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#666666">
      <tr> 
         <th width="62%">Acciones y Soluciones Inmediatas</td>
         <th width="38%">Oportunidad (Tpo.) Reestablecimiento</td>
      </tr>
      <tr><td colspan="2" height="5" bgcolor="#FFFFFF"></td></tr>
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
		while($rsDecisiones->moveNext()) { 
			echo "<tr><th colspan=\"2\">".$rsDecisiones->FieldByNumber(1)."</td></tr>";
			
			$rsAlfaDec = new Recordset($SERVER, $DB, $USER, $PASSWORD);
			$sqlAlfaDec = "SELECT ACCION, TIEMPO FROM ALFADECISIONES WHERE INFORMEALFA_ID=\"".$rsDecisiones->FieldByNumber(0)."\" ";
			$rsAlfaDec->Open($sqlAlfaDec);
			$nroAlfaDec=$rsAlfaDec->RecordCount();
			if($nroAlfaDec>0) {
				while($rsAlfaDec->moveNext()) {
					echo "
					<tr> 
					         <td bgcolor=\"#FFFFFF\">".$rsAlfaDec->FieldByNumber(0)."</td>
					         <td bgcolor=\"#FFFFFF\">".$rsAlfaDec->FieldByNumber(1)."</td>
					</tr>
					";
				}
			}
		}
	}
		?>
      
    </table>
  </div>
  <br />
  
  <div id="recursoscons">
    <h2>Recursos Involucrados</h2>
    <table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#666666">
	  <tr>
		<th>Tipo</td>
		<th>Recurso</td>
		<th>Cantidad</td>
		<th>Gasto</td>
	  </tr>
	  <tr><td colspan="4" height="5" bgcolor="#FFFFFF"></td></tr>
	  
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
		while($rsRecursos->moveNext()) { 
			echo "<tr><th colspan=\"4\">".$rsRecursos->FieldByNumber(1)."</td></tr>";
			
			$rsAlfaRec = new Recordset($SERVER, $DB, $USER, $PASSWORD);
			$sqlAlfaRec = "SELECT TIPORECURSO, DESCRIPCION, CANTIDAD, GASTO
							FROM ALFARECURSOS AS A, RECURSOS AS R
							WHERE A.RECURSO_ID=R.RECURSO_ID AND 
							INFORMEALFA_ID=\"".$rsRecursos->FieldByNumber(0)."\" ";
			$rsAlfaRec->Open($sqlAlfaRec);
			$nroAlfaRec=$rsAlfaDec->RecordCount();
			if($nroAlfaRec>0) {
				while($rsAlfaRec->moveNext()) {
					echo "
					  <tr>
						<td bgcolor=\"#FFFFFF\">".$rsAlfaRec->FieldByNumber(0)."</td>
						<td bgcolor=\"#FFFFFF\">".$rsAlfaRec->FieldByNumber(1)."</td>
						<td bgcolor=\"#FFFFFF\">".$rsAlfaRec->FieldByNumber(2)."</td>
						<td bgcolor=\"#FFFFFF\">".$rsAlfaRec->FieldByNumber(3)."</td>
					  </tr>
					 ";
					 $nroGasto = $nroGasto + $rsAlfaRec->FieldByNumber(3);
				}
			}
		}
	}?>	  
	  
	  <tr><td colspan="4" height="5" bgcolor="#FFFFFF"></td></tr>
	  <tr>
	    <td colspan="3" bgcolor="#f7f7f7">Total Provincia</td>
		<td bgcolor="#f7f7f7"><?php echo $nroGasto;?></td>
	  </tr>
    </table>
  </div>
  <br />
  
  <div id="necesidadescons">
    <h2>Evaluaci&oacute;n de Necesidades</h2>
    <table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#666666">
	  <tr>
		<th>Tipo</td>
		<th>Motivo</td>
		<th>Cantidad</td>
	  </tr>
	  <tr><td colspan="3" height="5" bgcolor="#FFFFFF"></td></tr>
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
		while($rsNecesidades->moveNext()) { 
			echo "<tr><th colspan=\"3\">".$rsNecesidades->FieldByNumber(1)."</td></tr>";
			
			$rsAlfaNec = new Recordset($SERVER, $DB, $USER, $PASSWORD);
			$sqlAlfaNec = "SELECT TIPO, CANTIDAD, MOTIVO 
							FROM ALFANECESIDADES 
							WHERE INFORMEALFA_ID=\"".$rsNecesidades->FieldByNumber(0)."\" ";
			$rsAlfaNec->Open($sqlAlfaNec);
			$nroAlfaNec=$rsAlfaNec->RecordCount();
			if($nroAlfaNec>0) {
				while($rsAlfaNec->moveNext()) {
					echo "
					  <tr>
						<td bgcolor=\"#FFFFFF\">".$rsAlfaNec->FieldByNumber(0)."</td>
						<td bgcolor=\"#FFFFFF\">".$rsAlfaNec->FieldByNumber(1)."</td>
						<td bgcolor=\"#FFFFFF\">".$rsAlfaNec->FieldByNumber(2)."</td>
					  </tr>
					 ";
					 $nroNecesidad =  $nroNecesidad + $rsAlfaNec->FieldByNumber(1);
				}
			}
		}
	} ?>
	  <tr><td colspan="3" bgcolor="#FFFFFF" height="5"></td></tr>
	  <tr>
	    <td colspan="2" bgcolor="#f7f7f7">Total Provincia</td>
		<td bgcolor="#f7f7f7"><?php echo $nroNecesidad;?></td>
	  </tr>
    </table>
  </div>
  <br />
  
  <div id="observcons">
	<table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#666666">
	  <tr>
		<th>Observaciones</th>
	  </tr>
	  <tr>
	    <td class="textotabla"><?php echo nl2br($rsEvento->FieldByNumber(11));?></td>
	  </tr>
	</table>
  </div>
  <br />

  <div id="piecons">
	<table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#666666">
	  <tr>
		<th>Capacidad de Respuesta</th>
		<td class="textotabla"><?php echo $rsEvento->FieldByNumber(8);?></td>
	</tr>
	</table>
  </div>
  <br />
</div>
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