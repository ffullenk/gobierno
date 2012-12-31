<?php
if( $legal_require_php != "pvtemas" ) exit;
$loginCorrecto = false;

if(isset($HTTP_COOKIE_VARS["tsis_emp"])) {
   $qkuser = $HTTP_COOKIE_VARS["tsis_emp"];
   $qkparsea = explode(":", $qkuser);
   $qk_uid = $qkparsea[0];
   $qk_ses = $qkparsea[1];
   if(is_numeric( $qk_uid )) {
      $res = mysql_query("SELECT id, sesionid, lasttime FROM admemp WHERE id=$qk_uid") or die(mysql_error());
	  if($fila=mysql_fetch_object($res)) {
	     if( $fila->sesionid == $qk_ses ) {
		     $loginCorrecto = true;
			 $ultimoacceso = $fila->lasttime;
			 $t = time();
			 $sesionid = md5(uniqid("$fila->id:$t"));
			 $iduser = $fila->id;
			 mysql_query("UPDATE admemp SET sesionid='$sesionid', lasttime='$t', lastaccess='$ultimoacceso' WHERE id=$iduser") or die(mysql_error());
			 $qk = "$iduser:$sesionid";
			 setcookie('tsis_emp', $qk, time() + 60*60*24*30, '/tesis', '', 0);
			 $global_qk = $iduser;
         } else {
		     setcookie('tsis_emp', '', 0, '/tesis', '', 0);
			 header("Location: index.php");
		 }
	  } else {
		     setcookie('tsis_emp', '', 0, '/tesis', '', 0);
			 header("Location: index.php");
	  }
	  mysql_free_result($res); unset($fila);
   } else {
		     setcookie('tsis_emp', '', 0, '/tesis', '', 0);
			 header("Location: index.php");
   }
}
?>