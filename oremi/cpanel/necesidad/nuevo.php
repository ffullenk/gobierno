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
	modOremi("D");
?>
    <div >
       <div >
<!-- Central -->
<?php
	echo "
			<div id=\"mconregistro\">
						
			<div id=\"zeroForm\">
			    <H5>Formulario Ingreso Detalle Tipo de Necesidades</H5>
			    <form action=\"graba.php\" method=\"post\" name=\"agrega\">
				  <dl>
				      <dt>Tipo de Necesidad:</dt>
					  <dd><input type=\"text\" name=\"necesidad\" size=\"30\" maxlenght=\"75\" /></dd>
					  <dd><input type=\"submit\" value=\" Grabar \" class=\"submit\" /></dd>
				  </dl>
				</form>
			</div>
		</div>
	";

?>
<!-- Central -->
       </div>
    </div>
  </div>
<?php
	pieOremi();

} else { header("Location: ../logout.php"); }
?>