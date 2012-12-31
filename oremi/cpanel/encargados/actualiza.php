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
	modOremi("E");
?>
    <div >
       <div >
<!-- Central -->
<?php
   $id = $_POST["id"];
  // Seteamos, que los campos se hayan completado
  $nombres		= $_POST["nombres"];
  $apellidos	= $_POST["apellidos"];
  $email		= $_POST["email"];
  $cargos		= $_POST["cargos"];
  $fono1		= $_POST["fono1"];
  $fono2		= $_POST["fono2"];
  $celu1		= $_POST["celu1"];
  $celu2		= $_POST["celu2"];
  $fax			= $_POST["fax"];
  $cuenta		= $_POST["cuenta"];
  $contrasenya	= $_POST["repite"];
  $clave		= $_POST["clave"];
  
  $cCont = 0;
  if($nombres=="") { $faltaCampo[$cCont++] = " Debe Especificar sus Nombres completo."; }
  if($apellidos=="") { $faltaCampo[$cCont++] = " Debe Especificar sus Apellidos."; }
  if($email=="") { $faltaCampo[$cCont++] = " Debe Especificar una cuenta de Correo Electr&oacute;nico."; }
  if($cargos=="") { $faltaCampo[$cCont++] = " Debe Seleccionar el Tipo de Cargo que ocupar&aacute; el usuario."; }
  if($fono1=="") { $faltaCampo[$cCont++] = " Debe Seleccionar el Tel&eacute;fono."; }
  if($celu1=="") { $faltaCampo[$cCont++] = " Debe Seleccionar al menos un m&oacute;vil."; }
  if($cuenta=="") { $faltaCampo[$cCont++] = " Debe Especificar un nombre para la cuenta de usuario."; }
  if($contrasenya=="") { $faltaCampo[$cCont++] = " Debe Especificar un clave a ser usada con su cuenta de usuario."; }
  if($contrasenya!=$clave) { $faltaCampo[$cCont++] = " Las contrase&ntilde;as no coinciden."; }  

  
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
	  

		$password = crypt($contrasenya,$cuenta);
		
        $rsAlertas = new Recordset($SERVER, $DB, $USER, $PASSWORD);
		
		$rsAlertas->FieldByUpdate( "CARGO_ID" , "'$cargos'" );
		$rsAlertas->FieldByUpdate( "APELLIDOS" , "'$apellidos'" );
		$rsAlertas->FieldByUpdate( "NOMBRES" , "'$nombres'" );
		$rsAlertas->FieldByUpdate( "FONO" , "'$fono1'" );
		if($fono2!="") { $rsAlertas->FieldByUpdate( "FONO2" , "'$fono2'" ); }
		$rsAlertas->FieldByUpdate( "MOVIL" , "'$celu1'" );
		if($movil2!="") { $rsAlertas->FieldByUpdate( "MOVIL2" , "'$celu2'" ); }
		if($fax!="") { $rsAlertas->FieldByUpdate( "FAX" , "'$fax'" ); }
		$rsAlertas->FieldByUpdate( "EMAIL" , "'$email'" );
		$rsAlertas->FieldByUpdate( "CUENTA" , "'$cuenta'" );
		$rsAlertas->FieldByUpdate( "CONTRASENYA" , "'$password'" );
		
		$rsAlertas->WhereByUpdate( "ENCARGADO_ID" , "$id" );
		$poneRegistro = $rsAlertas->execUpdate( "ENCARGADOS" , 1);
		
		if($poneRegistro == true ) { 
		    /*El registro fue agregado corecctamente*/
			 mensaje("okForm","okBD","El Registro ha sido Actualizado de forma satisfactoria. Un Email ha sido dirigido a ". $email . " informando los datos para acceder al Sistema de Administraci&oacute;n.");

/*  Averiguamos: 
		1. Nombre del Cargo
		2. Comuna
*/

$rsCargo=new Recordset($SERVER , $DB , $USER , $PASSWORD);
$sqlCargo = "SELECT CARGO_ID, CARGO FROM CARGOS WHERE CARGO_ID=\"$cargos\" ";
$rsCargo->Open($sqlCargo);
$regcargos = $rsCargo->RecordCount();
if($regcargos>0) {
$rsCargo->moveNext();
$tCargo = $rsCargo->FieldByNumber(1);
}

$rsComuna=new Recordset($SERVER , $DB , $USER , $PASSWORD);
$sqlComuna = "SELECT COMUNA FROM COMUNA AS C, ENCARGADOS AS E WHERE C.COM_ID=E.COM_ID AND E.ENCARGADO_ID=\"$id\" ";
$rsComuna->Open($sqlComuna);
$regcomuna = $rsComuna->RecordCount();
if($regcomuna>0) {
$rsComuna->moveNext();
$tComuna = $rsComuna->FieldByNumber(0);

}



echo "
<table border='1' cellpadding='0' cellspacing='0' bordercolor='#CCCCCC' align='center'>
<tr><td>
<table>
<tr><th class='formtitulo' colspan='2' align='center' >Registro de Usuario</th></tr>
<tr><td class='formlabel'>Cargo:</td><td class='formlabel'>".$tCargo."</td></tr>
<tr><td class='formlabel'>Comuna:</td><td class='formlabel'>".$tComuna."</td></tr>
<tr><td class='formlabel'>Nombres:</td><td class='formlabel'>".$nombres."</td></tr>
<tr><td class='formlabel'>Apellidos:</td><td class='formlabel'>".$apellidos."</td></tr>
<tr><td class='formlabel'>Email:</td><td class='formlabel'>".$email."</td></tr>
<tr><td class='formlabel'>Telefono:</td><td class='formlabel'> ".$fono1."</td></tr>
<tr><td class='formlabel'>Telefono (2):</td><td class='formlabel'> ".$fono2."</td></tr>
<tr><td class='formlabel'>Celular:</td><td class='formlabel'> ".$celu1."</td></tr>
<tr><td class='formlabel'>Celular (2):</td><td class='formlabel'> ".$celu2."</td></tr>
<tr><td class='formlabel'>Fax:</td><td class='formlabel'> ".$fax."</td></tr>


<tr><td class='formlabel'>Nombre de Usuario:</td><td class='formlabel'> ".$cuenta."</td></tr>
<tr><td class='formlabel'>Contraseña:</td><td class='formlabel'> ".$contrasenya."</td></tr>

</table>
</td></tr>
</table>
";


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