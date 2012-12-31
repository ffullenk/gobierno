<?php
/*  header("Cache-Control: no-store, no-cache, must-revalidate");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");*/
  
	@include("../lib/config.php");
	@include("../lib/oremi.php");

	global $SERVER, $DB, $USER, $PASSWORD;
	@include("../lib/global.php");
	@include("../lib/recordset.php");

	/*  umask(0);*/
	$require_php = "ra28xbEblRnj";
	global $global_qk;
	$global_qk=0;
	require("detect.php");

if($loginCorrecto ) { 
    @include("utiles/utiles.php");
    cabOremi();
	izqOremi();
	modOremi("I");
?>
    <div >
       <div >
       </div>
    </div>
  </div>
<?php
	pieOremi();

} else { header("Location: logout.php"); }
?>