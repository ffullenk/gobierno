<?php
/*  header("Cache-Control: no-store, no-cache, must-revalidate");
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
    @include("utiles/utiles.php");
    cabOremi();
	izqOremi();
	modOremi("I");
?>
    <div >
       <div >
<?php
$despacha = "S";
$rsEvento = new Recordset($SERVER, $DB, $USER, $PASSWORD);
$rsEvento->FieldByUpdate( "DESPACHADO" , "'$despacha'" );
$rsEvento->WhereByUpdate( "INFORMEALFA_ID" , "$alfa" );
$poneRegistro = $rsEvento->execUpdate( "INFORMEALFA" , 1);

echo "<div style=\"margin:0 auto;text-align:center;border:1px solid #990000;font:10pt Verdana;color:#333;width:75%;\">";
		if($poneRegistro==true) {
			echo "El Informe Alfa ha sido Despachado. Un correo electr&oacute;nico se ha enviado al Director Provincial y Regional inform&aacute;ndoles que este Informe Alfa, se encuentra disponible para ser Consolidado. <br />";

// *************************************************************************** //
// **  ENVIAMOS UN EMAIL AL ENCARGADO PROVINCIAL Y REGIONAL MENCIONANDO QUE ** //
// **              EL INFORMEALFA HA SIDO GENERADO Y ENVIADO.               ** //
// *************************************************************************** //

// Vemos la provincia del $global_qk actual
$rsProvCom = new Recordset($SERVER, $DB, $USER, $PASSWORD);
$sqlProvCom = "SELECT P.PROV_ID, COMUNA, PROVINCIA FROM ENCARGADOS AS E, COMUNA AS C, PROVINCIA AS P WHERE E.COM_ID=C.COM_ID AND C.PROV_ID=P.PROV_ID AND E.ENCARGADO_ID=\"".$global_qk."\" ";
$rsProvCom->Open($sqlProvCom);
$nroProvCom = $rsProvCom->RecordCount();

if($nroProvCom>0) {
  $rsProvCom->moveNext();
  // Buscamos al Encargado Provincial
  $rsProv= new Recordset($SERVER, $DB, $USER, $PASSWORD);
  $sqlProv = "SELECT APELLIDOS, NOMBRES, EMAIL FROM ENCARGADOS AS E, COMUNA AS C WHERE E.COM_ID=C.COM_ID AND C.PROV_ID=\"".$rsProvCom->FieldByNumber(0)."\" AND E.CARGO_ID=2";
  $rsProv->Open($sqlProv);
  $nroProv = $rsProv->RecordCount();

  if($nroProv>0) {
    $email_ep = array();
    while($rsProv->moveNext()) {
      $email_ep[] = $rsProv->FieldByNumber(2);
    }


// ************************************************************************
// ** Recogeremos datos respecto del Tipo de Evento, Titulo del Evento y
// ** resumen y observaciones, para agregarlos en el email
// ************************************************************************
$rsConoceAlfa = new Recordset($SERVER, $DB, $USER, $PASSWORD);
$sqlConoceAlfa = "SELECT informealfa_id, tpevento, tituloinforme, resumen, observaciones FROM INFORMEALFA AS i, TP_EVENTO AS e WHERE i.tpevento_id = e.tpevento_id AND informealfa_id =$alfa";

$rsConoceAlfa->Open($sqlConoceAlfa);
if($rsConoceAlfa->RecordCount() > 0 ) { 
   $rsConoceAlfa->moveNext();
   $tipoEvento = $rsConoceAlfa->FieldByNumber(1);
   $tituloEvento = $rsConoceAlfa->FieldByNumber(2);
   $resumenEvento = $rsConoceAlfa->FieldByNumber(3);
   $observacionesEvento = $rsConoceAlfa->FieldByNumber(4);
}



    // Teniendo cargado a los Encargados Provinciales, les mando el email.
    @include("../../../lib/correo.php");
    $emailEmisor="oremiiv@gorecoquimbo.cl";
    $asunto="Informes Alfas:: OREMI Coquimbo";
    $mail = new correo();
    $mail->setEmisor("Informe Alfa Despachado",$emailEmisor);
$Mensaje_A_Responsables = " 
El Sistema de Proteccion Civil de la Region de Coquimbo, informa de la Municipalidad de ".$rsProvCom->FieldByNumber(1)." ha despachado un informe ALFA correspondiente al EVENTO ".$tipoEvento.", ".$tituloEvento."\n\n

Para su conocimiento y fines. \n\n


Atte.,
Coordinacion Sistema de Generacion de Informes Alfas
OREMI Region de Coquimbo.";

for($i=0; $i<count($email_ep);$i++) {
  $mail->putCorreo($email_ep[$i], $asunto, $Mensaje_A_Responsables);
}
/*$mail->putCorreo(_emailOREMI_, $asunto, $Mensaje_A_Responsables);
$mail->putCorreo(_emailCAT_, $asunto, $Mensaje_A_Responsables);*/
$mail->putCorreo(_jefeOREMIIV_, $asunto, $Mensaje_A_Responsables);
$mail->putCorreo(_onemi04_, $asunto, $Mensaje_A_Responsables);
$mail->putCorreo(_oficina04_, $asunto, $Mensaje_A_Responsables);
$mail->sendCorreo();

    }
  }


		} else {
			echo "Error... Ha ocurrido un error interno y no se ha podido despachar el Informe Alfa. Por favor, intente de nuevo, si el problema persiste, p&oacute;ngase en contacto con el Administrador del Sistema. <br />";
		
		}
echo "<form action=\"index.php\" method=\"post\">
				<input type=\"hidden\" name=\"id\" value=\"$id\" />
				<input type=\"submit\" name=\"actualiza\" value=\"Aceptar\">
	</form>
</div>";
?>	   
       </div>
    </div>
  </div>
<?php
	pieOremi();

} else { header("Location: ../../logout.php"); }
?>