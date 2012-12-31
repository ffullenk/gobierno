<?php
if( $legal_require_php != "pvtesis" ) exit;
$loginCorrecto = false;

if(isset($HTTP_COOKIE_VARS["tsis"])) {
   $qkuser = $HTTP_COOKIE_VARS["tsis"];
   $qkparsea = explode(":", $qkuser);
   $qk_uid = $qkparsea[0];
   $qk_ses = $qkparsea[1];
   if(is_numeric( $qk_uid )) {
      $res = mysql_query("SELECT id, idinst, nivel, sesionid, lasttime FROM admuser WHERE id=$qk_uid") or die(mysql_error());
	  if($fila=mysql_fetch_object($res)) {
	     if( $fila->sesionid == $qk_ses ) {
		     $loginCorrecto = true;
			 $ultimoacceso = $fila->lasttime;
			 $t = time();
			 $sesionid = md5(uniqid("$fila->id:$t"));
			 $iduser = $fila->id;
			 mysql_query("UPDATE admuser SET sesionid='$sesionid', lasttime='$t', lastaccess='$ultimoacceso' WHERE id=$iduser") or die(mysql_error());
			 $qk = "$iduser:$sesionid";
			 setcookie('tsis', $qk, time() + 60*60*24*30, '/tesis', '', 0);
			 $global_qk = $iduser;
         } else {
		     setcookie('tsis', '', 0, '/tesis', '', 0);
			 header("Location: index.php");
		 }
	  } else {
		     setcookie('tsis', '', 0, '/tesis', '', 0);
			 header("Location: index.php");
	  }
	  mysql_free_result($res); unset($fila);
   } else {
		     setcookie('tsis', '', 0, '/tesis', '', 0);
			 header("Location: index.php");
   }
}
?>