<?php
/* header("Cache-Control: no-store, no-cache, must-revalidate");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");*/

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
    encOremi();
	izqOremi();
	modOremi("S");
?>
    <div >
       <div >
<!-- Central -->
<?php
  // Seteamos, que los campos se hayan completado
$alfa=$_POST["alfa"];
$id=$_POST["id"];
  
	$evento		= $_POST["evento"];
	$ubicacion	= $_POST["ubicacion"];
	$fecha		= $_POST["fecha"];
	$hora		= $_POST["hora"];
	$titulo		= $_POST["titulo"];
	$resumen	= $_POST["resumen"];
	$nivel		= $_POST["nivel"];
	$observaciones = $_POST["observaciones"];

	$dp_afectadas		= $_POST["dp_afectadas"];
	$dp_menorhab		= $_POST["dp_menorhab"];
	$dp_damnificadas	= $_POST["dp_damnificadas"];
	$dp_maynhab			= $_POST["dp_maynhab"];
	$dp_heridas			= $_POST["dp_heridas"];
	$dp_destirr			= $_POST["dp_destirr"];
	$dp_muertas			= $_POST["dp_muertas"];
	$dp_noevaluada		= $_POST["dp_noevaluada"];
	$dp_desaparecidas	= $_POST["dp_desaparecidas"];
	$dp_albergados		= $_POST["dp_albergados"];
  
	$servicios	= $_POST["servicios"];
	$montodanos	= $_POST["montodanos"];
  
  
  $cCont = 0;
  if($evento=="") { $faltaCampo[$cCont++] = " Debe Seleccionar el Tipo de Evento."; }
  if($ubicacion=="") { $faltaCampo[$cCont++] = " Debe Seleccionar la Ubicaci&oacute;n del Evento."; }
  if($fecha=="") { $faltaCampo[$cCont++] = " Debe Especificar la fecha de ocurrencia del Evento."; }
  if($hora=="") { $faltaCampo[$cCont++] = " Debe Especificar la hora de ocurrencia del Evento."; }
  if($titulo=="") { $faltaCampo[$cCont++] = " Debe Especificar un T&iacute;tulo para el Evento."; }
  if($resumen=="") { $faltaCampo[$cCont++] = " Debe Especificar un resumen para el Evento."; }
  
  if($dp_afectadas<0) {$faltaCampo[$cCont++] = " Personas Afectadas.";}
  if($dp_menorhab<0) {$faltaCampo[$cCont++] = " Daño Menor Habitable.";}
  if($dp_damnificadas<0) {$faltaCampo[$cCont++] = " Personas Damnificadas.";}
  if($dp_maynhab<0) {$faltaCampo[$cCont++] = " Daño Mayor No Habitable.";}
  if($dp_heridas<0) {$faltaCampo[$cCont++] = " Personas Heridas.";}
  if($dp_destirr<0) {$faltaCampo[$cCont++] = " Viviendas Destruidas Irrecuperable.";}
  if($dp_muertas<0) {$faltaCampo[$cCont++] = " Personas Muertas.";}
  if($dp_noevaluada<0) {$faltaCampo[$cCont++] = " Viviendas No Evaluadas.";}
  if($dp_desaparecidas<0) {$faltaCampo[$cCont++] = " Personas Desaparecidas.";}
  if($dp_albergados<0) {$faltaCampo[$cCont++] = " Personas Albergadas.";}
  
  
  if($servicios=="") { $faltaCampo[$cCont++] = " Debe Especificar una descrioci&oacute;n para los servicios."; }
  if($montodanos<0) { $faltaCampo[$cCont++] = " Debe Especificar monto en daños."; }
  

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

		$fecha_ = convertir_fecha($fecha);

		// Actualizamos Informe Alfa

        $rsEvento = new Recordset($SERVER, $DB, $USER, $PASSWORD);
		$rsEvento->FieldByUpdate( "ENCARGADO_ID" , "'$global_qk'" );
		$rsEvento->FieldByUpdate( "TPEVENTO_ID" , "'$evento'" );
		$rsEvento->FieldByUpdate( "TPUBICACION_ID" , "'$ubicacion'" );
		$rsEvento->FieldByUpdate( "TPCAPRESPUESTA_ID" , "'$nivel'" );
		$rsEvento->FieldByUpdate( "TITULOINFORME" , "'$titulo'" );
		$rsEvento->FieldByUpdate( "RESUMEN" , "'$resumen'" );
		$rsEvento->FieldByUpdate( "FECHA" , "'$fecha_'" );
		$rsEvento->FieldByUpdate( "HORA" , "'$hora'" );
		$rsEvento->FieldByUpdate( "OBSERVACIONES" , "'$observaciones'" );
		
		$rsEvento->WhereByUpdate( "INFORMEALFA_ID" , "$alfa" );
		$poneRegistro = $rsEvento->execUpdate( "INFORMEALFA" , 1);

echo "<div style=\"margin:0 auto;text-align:center;border:1px solid #990000;font:10pt Verdana;color:#333;width:75%;\">";
		if($poneRegistro==true) {
			// Registro Actualizado satisfactoriamente
			
			
			$rsAlfaDanos = new Recordset($SERVER, $DB, $USER, $PASSWORD);
			$rsAlfaDanos->FieldByUpdate( "PERSONAS_AFECTADAS", "'$dp_afectadas'" );
			$rsAlfaDanos->FieldByUpdate( "PERSONAS_DAMNIFICADAS", "'$dp_damnificadas'" );
			$rsAlfaDanos->FieldByUpdate( "PERSONAS_HERIDAS", "'$dp_heridas'" );
			$rsAlfaDanos->FieldByUpdate( "PERSONAS_MUERTAS", "'$dp_muertas'" );
			$rsAlfaDanos->FieldByUpdate( "PERSONAS_DESAPARECIDAS", "'$dp_desaparecidas'" );
			$rsAlfaDanos->FieldByUpdate( "PERSONAS_ALBERGADAS", "'$dp_albergados'" );
			$rsAlfaDanos->FieldByUpdate( "VIVIENDAS_DANO_MENOR", "'$dp_menorhab'" );
			$rsAlfaDanos->FieldByUpdate( "VIVIENDAS_DANO_MAYOR", "'$dp_maynhab'" );
			$rsAlfaDanos->FieldByUpdate( "VIVIENDAS_DESTRUIDA", "'$dp_destirr'" );
			$rsAlfaDanos->FieldByUpdate( "VIVIENDAS_NOEVALUADAS", "'$dp_noevaluada'" );
			$rsAlfaDanos->FieldByUpdate( "SERVICIOS_BASICOS", "'$servicios'" );
			$rsAlfaDanos->FieldByUpdate( "MONTO_DANOS", "'$montodanos'" );

			$rsAlfaDanos->WhereByUpdate( "INFORMEALFA_ID", "$alfa" );
			$poneAlfaDanos = $rsAlfaDanos->execUpdate( "ALFADANOS" , 1);
			
			if($poneAlfaDanos==true) {
				echo "El Informe Alfa ha sido Actualizado de forma satisfactoria.<br />";} 
			else { echo "El Informe Alfa ha sido Actualizado de forma satisfactoria. Pero al tratar de actualizar la informaci&oacute;n correspondiente a Da&ntilde;os Personas, Servicios B&aacute;sicos, Infraestructura y Otros, ocurri&oacute; un problema interno y &eacute;stos datos no se pudieron actualizar.<br />";	}

		} else {
			// FIN Pone registro sobre InformeAlfa
echo "Ha ocurrido un problema interno y no se ha podido añadir el registro a la base de datos. Por favor, intente luego.";			
		}
echo "<form action=\"../ver/index.php\" method=\"post\">
				<input type=\"hidden\" name=\"id\" value=\"$id\" />
				<input type=\"submit\" name=\"actualiza\" value=\"Aceptar\">
	</form>
</div>";
		
  } // FIN Contador de Variables

?>
<!-- Central -->
       </div>
    </div>
  </div>
<?php
	pieOremi();

} else { header("Location: ../logout.php"); }
?>