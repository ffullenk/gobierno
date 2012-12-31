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
	modOremi("M"); // 
?>
    <div >
       <div >
<!-- Central -->
<?php
  // Seteamos, que los campos se hayan completado
  
  $nombres		= $_POST["nombres"];
  $email		= $_POST["email"];

  $cuenta		= $_POST["cuenta"];
  $clave		= $_POST["clave"];
  $repite		= $_POST["repite"];
  
  $cCont = 0;
  if($nombres=="") { $faltaCampo[$cCont++] = " Debe Especificar sus Nombres completo."; }
  if($email=="") { $faltaCampo[$cCont++] = " Debe Especificar una cuenta de Correo Electr&oacute;nico."; }

  if($cuenta=="") { $faltaCampo[$cCont++] = " Debe Especificar un nombre para la cuenta de usuario."; }
  if($clave=="") { $faltaCampo[$cCont++] = " Debe Especificar un clave a ser usada con su cuenta de usuario."; }
  if($repite!=$clave) { $faltaCampo[$cCont++] = " Las contrase&ntilde;as no coinciden."; }  

  
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
      // Procedemos a Actualizar la informacion
	  $paswor=crypt($clave,$cuenta);

        $rsAdmin = new Recordset($SERVER, $DB, $USER, $PASSWORD);
		$rsAdmin->FieldByUpdate( "NOMBRES_PERSONA" , "'$nombres'" );
		$rsAdmin->FieldByUpdate( "EMAIL_PERSONA" , "'$email'" ); 
		$rsAdmin->FieldByUpdate( "NICK_PERSONA" , "'$cuenta'" ); 
		$rsAdmin->FieldByUpdate( "PASS_PERSONA" , "'$paswor'" );
		
		$rsAdmin->WhereByUpdate( "PERSONA_ID" , "$global_qk" );
		$poneRegistro = $rsAdmin->execUpdate( "FUCNIONARIOS" , 1);
		
		if($poneRegistro == true ) { 
		    /*El registro fue actualizado corecctamente*/
			 mensaje("okForm","okBD","El Registro ha sido Modificado de forma satisfactoria.");
		} else {
			// Ocurrio un problema y no se ha podido añadir el registro a la Base de Datos
			mensaje("errorForm","errorBD","Ha ocurrido un problema interno y no se ha podido Modificar el registro a la base de datos. Por favor, intente luego.");
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