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
    cabOremi();
	izqOremi();
	modOremi("R"); // Crea un Nuevo Informe Alfa/Consolidado
?>
    <div >
       <div >
	   <?php
echo"	<div id=\"mconregistro\">";
	// Seteamos las variables pasadas
		$id			= $_POST["id"];
		
		$nroEvento		= $_POST["nroEvento"];
		$evento			= $_POST["evento"];
		$titulo			= $_POST["titulo"];
		$ubicacion		= $_POST["ubicacion"];
		$fecha			= $_POST["fecha"];
		$hora			= $_POST["hora"];
		$nivel			= $_POST["nivel"];
		$iaC			= $_POST["iaC"];
  
		$cCont = 0;
		if($evento=="") { $faltaCampo[$cCont++] = " Debe Seleccionar el Tipo de Evento."; }
		if($titulo=="") { $faltaCampo[$cCont++] = " Debe Especificar un T&iacute;tulo para el Consolidado."; }
		if($ubicacion=="") { $faltaCampo[$cCont++] = " Debe Seleccionar la Ubicaci&oacute;n del Consolidado."; }
		if($fecha=="") { $faltaCampo[$cCont++] = " Debe Especificar la fecha de ocurrencia del Consolidado."; }
		if($hora=="") { $faltaCampo[$cCont++] = " Debe Especificar la hora de ocurrencia del Consolidado."; }
		if($nivel=="") { $faltaCampo[$cCont++] = " Debe Seleccionar el Nivel de Capacidad de Respuesta."; }
		if($iaC=="") { $faltaCampo[$cCont++] = " Debe Seleccionar Comunas a Consolidar."; }
  
		if( $cCont > 0 ) {
			echo "
			      <div id=\"errorForm\">
				      <img src=\"../../imagenes/panel/informacion.gif\" /> &nbsp; 
					  <strong>Se han detectado los siguientes errores:</strong> <br />
					  <ul>";
						  for($nError=0; $nError < $cCont; $nError++) {
						     echo "<li>". $faltaCampo[$nError] ."</li>";
						  }
				echo "</ul><br />
						<a href=\"javascript:history.back();\"> Volver Atras </a>
    		      </div>
			  ";
		} else {
			// Procedemos a presentar el Segundo Paso de este Formulario de Consolidacion Regional
echo "
			<Script language=\"JavaScript\" src=\"../../js/setea.js\" type=\"text/javascript\"></Script>
			<Script language=\"JavaScript\" src=\"../../js/chequeaforms.js\" type=\"text/javascript\"></Script>
			<Script language=\"JavaScript\" src=\"../../js/fecha.js\" type=\"text/javascript\"></Script>
			<Script language=\"JavaScript\" src=\"../../js/calendar1.js\" type=\"text/javascript\"></Script>

			<div id=\"informeForm\">
			    <H5>Consolidados Provinciales Disponibles para ". nombreInforme()."<br />- Segundo Paso -</H5>
			    <form action=\"consolida.php\" method=\"post\" name=\"formulario\" id=\"formulario\" onsubmit=\"return vldConsolida2();\" >
				<input type=\"hidden\" name=\"id\" value=\"$id\" />
				<input type=\"hidden\" name=\"nroEvento\" value=\"$nroEvento\" />
				<dl>
	";
	
			// Tenemos los consolidados provinciales que hemos elegidos se consoliden en el regional
			$aLista=array_keys($_POST["iaC"]);
			foreach($aLista as $iId) {
				$rsEncProv = new Recordset($SERVER, $DB, $USER, $PASSWORD);
				$sqlEncProv = "SELECT P.PROV_ID, PROVINCIA 
									FROM PROVINCIA AS P, ENCARGADOS AS E, COMUNA AS C, CONSOLIDAPROV AS T 
									WHERE T.ENCARGADO_ID=E.ENCARGADO_ID AND 
									E.COM_ID=C.COM_ID AND 
									C.PROV_ID=P.PROV_ID AND 
									T.CONSOLIDAPROV_ID=\"".$iaC[$iId]."\" ";
				$rsEncProv->Open($sqlEncProv);
				$nroEncProv = $rsEncProv->RecordCount();

				if($nroEncProv>0) {
					$rsEncProv->moveNext();
echo "
					<fieldset>
					   <legend>Provincia de ".$rsEncProv->FieldByNumber(1)."</legend>";
// Ahora vamos a INFORMEALFA, y de acuerdo al CONSOLIDAPROV_ID actual, listamos los informes alfas por Comunas
$rsEncCom = new Recordset($SERVER, $DB, $USER, $PASSWORD);
$sqlEncCom = "SELECT INFORMEALFA_ID, COMUNA 
				FROM INFORMEALFA AS A, COMUNA AS C, ENCARGADOS AS E  
				WHERE A.ENCARGADO_ID=E.ENCARGADO_ID AND 
				E.COM_ID=C.COM_ID AND 
				A.CONSOLIDAPROV_ID=\"".$iaC[$iId]."\" ";
$rsEncCom->Open($sqlEncCom);
$nroEncCom = $rsEncCom->RecordCount();
if($nroEncCom>0) {
	while($rsEncCom->moveNext()) {
		echo "<dt>Comuna de ".$rsEncCom->FieldByNumber(1)."</dt>";
	}
}

echo "				</fieldset>";

				}
				
			} // End FOR
		} // cCont

echo "	</form>	
		</div>
		</div>";
	   ?>
       </div>
    </div>
  </div>
<?php
	pieOremi();

} else { header("Location: ../../logout.php"); }
?>