<?php
/* header("Cache-Control: no-store, no-cache, must-revalidate");
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
	global $global_qk;
	$global_qk=0;
	require("../detect.php");

if($loginCorrecto ) { 
    encOremi();
	izqOremi();
	modOremi("V");
?>
    <div >
       <div >
<!-- Central -->
<?php
  // Seteamos, que los campos se hayan completado
  $cEvento = $_POST["evento"];
  
  if($cEvento=="") {
      echo "
	      <div id=\"errorForm\">
		      <img src=\"../../imagenes/panel/informacion.gif\" /> &nbsp; 
			  No ha ingresado un Detalle para el Estado del Evento <br />
			  <a href=\"javascript:window.history.back();\"> Volver Atras </a>
          </div>
	  ";
  } else {
      // Procedemos a Grabar la informacion
        $rsEvento = new Recordset($SERVER, $DB, $USER, $PASSWORD);
		$rsEvento->FieldByInsert( "ESTADOEVENTO", "'$cEvento'" );
		$poneRegistro = $rsEvento->execInsert( "ESTADOEVENTOS" , 1);
		
		if($poneRegistro == true ) { 
		    /*El registro fue agregado corecctamente*/
			 mensaje("okForm","okBD","El Registro ha sido Añadido de forma satisfactoria.");
		} else {
			// Ocurrio un problema y no se ha podido añadir el registro a la Base de Datos
			mensaje("errorForm","errorBD","Ha ocurrido un problema interno y no se ha podido añadir el registro a la base de datos. Por favor, intente luego.");
		}
	}
?>
<!-- Central -->
       </div>
    </div>
  </div>
<?php
	pieOremi();

} else { header("Location: ../logout.php"); }
?>