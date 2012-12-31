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
$id=$_POST["id"];
$alfa=$_POST["alfa"];
$nroeventos=$_POST["nroeventos"];

/* Eliminar ID desde Alfa Daños */
$rsAlfaDanos = new Recordset($SERVER, $DB, $USER, $PASSWORD);
$sacaAlfaDanos=$rsAlfaDanos->Open( "DELETE FROM ALFADANOS WHERE INFORMEALFA_ID=\"".$alfa."\" ");
						
/* Eliminar ID desde Alfa Decisiones */						
$rsAlfaDecisiones = new Recordset($SERVER, $DB, $USER, $PASSWORD);
$sacaAlfaDecisiones=$rsAlfaDecisiones->Open( "DELETE FROM ALFADECISIONES WHERE INFORMEALFA_ID=\"".$alfa."\" ");

/* Eliminar ID desde Alfa Necesidades */
$rsAlfaNecesidades = new Recordset($SERVER, $DB, $USER, $PASSWORD);
$sacaAlfaNecesidades=$rsAlfaNecesidades->Open( "DELETE FROM ALFANECESIDADES WHERE INFORMEALFA_ID=\"".$alfa."\" ");

/* Eliminar ID desde Alfa Recursos */
$rsAlfaRecursos = new Recordset($SERVER, $DB, $USER, $PASSWORD);
$sacaAlfaRecursos=$rsAlfaRecursos->Open( "DELETE FROM ALFARECURSOS WHERE INFORMEALFA_ID=\"".$alfa."\" ");

/* Eliminamos el Informe Alfa */
$rsAlfa = new Recordset($SERVER, $DB, $USER, $PASSWORD);
$sacaAlfa=$rsAlfa->Open( "DELETE FROM INFORMEALFA WHERE INFORMEALFA_ID=\"".$alfa."\" ");
						
/* Volvemos sobre EVENTOALFA para decrementar el NRO_INFORMES */
$rsDnEvento = new Recordset($SERVER, $DB, $USER, $PASSWORD);
if($nroeventos>0) { $nroAlfa=$nroeventos-1; } else { $nroAlfa=0;}
				
$rsDnEvento->FieldByUpdate( "NRO_EVENTOS", "'$nroAlfa'" );
$rsDnEvento->WhereByUpdate( "EVENTOALFA_ID", "$id" );
$poneRegistro = $rsDnEvento->execUpdate( "EVENTOALFA" , 1);

echo "<div style=\"margin:0 auto;text-align:center;border:1px solid #990000;font:10pt Verdana;color:#333;width:75%;\">";

if($poneRegistro == true ) { 
	echo "El Informe Alfa ha sido Eliminado satisfactoriamente.";
} else {
	echo "Error... Ha ocurrido un error interno y no se ha podido Eliminar el Informe Alfa. Por favor, intente de nuevo, si el problema persiste, p&oacute;ngase en contacto con el Administrador del Sistema. <br />";
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