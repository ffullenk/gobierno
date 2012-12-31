<?php
/*  header("Cache-Control: no-store, no-cache, must-revalidate");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");*/
  
	@include("../../lib/config.php");
	@include("../../lib/oremi.php");
    @include("../utiles/utiles.php");

	global $SERVER, $DB, $USER, $PASSWORD;
	@include("../../lib/global.php");
	@include("../../lib/recordset.php");

	/*  umask(0);*/
	$require_php = "ra28xbEblRnj";
	global $global_qk, $global_cg;
	$global_qk=0;
	$global_cg=0;

	require("../detect.php");

if($loginCorrecto ) { 
    cabOremi();
	izqOremi();
	modOremi("P"); // Servicio Periodistico
?>
    <div >
       <div >
	   <?php
//		echo "<div id=\"mconregistro\">";
		$id = $_POST["id"];
		
		$titulo = $_POST["titulo"];
		$fecha = $_POST["fecha"];
		$observaciones = $_POST["observaciones"];
		
		$cCont = 0;
		if($titulo=="") { $faltaCampo[$cCont++] = " Debe Especificar una Materia."; }
		if($fecha=="") { $faltaCampo[$cCont++] = " Debe Seleccionar una Fecha."; }
		if($observaciones=="") { $faltaCampo[$cCont++] = " Debe Especificar una Descripci&oacute;n del Informe."; }

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
			// Procedemos a Actualizar
			
			$fecha_ = convertir_fecha($fecha);

			$rsInf = new Recordset($SERVER, $DB, $USER, $PASSWORD);
			$rsInf->FieldByUpdate( "FECHA" , "'$fecha_'" );
			$rsInf->FieldByUpdate( "MATERIA" , "'$titulo'" );
			$rsInf->FieldByUpdate( "RESUMEN" , "'$observaciones'" );

			$rsInf->WhereByUpdate( "INFORMATIVO_ID" , "$id" );
			$poneRegistro = $rsInf->execUpdate( "INFORMATIVO" , 1);

			if($poneRegistro==true) {
				// Grabamos consolidado
					mensaje("okForm","okBD","El Registro ha sido Actualizado de forma satisfactoria.");
			} else {
					mensaje("errorForm","errorBD","Ha ocurrido un problema interno y no se ha podido Actualizar el registro a la base de datos. Por favor, intente luego.");
			}

		}
	   ?>
       </div>
    </div>
  </div>
<?php
	pieOremi();

} else { header("Location: ../logout.php"); }
?>