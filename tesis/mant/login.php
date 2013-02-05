<?php 
function quitar($mensaje) {
$mensaje = str_replace("<","&lt;",$mensaje);
$mensaje = str_replace(">","&gt;",$mensaje);
$mensaje = str_replace("\'","&#39;",$mensaje);
$mensaje = str_replace('\"',"&quot;",$mensaje);
$mensaje = str_replace("\\\\","&#92",$mensaje);
return $mensaje;
}


if( (trim($_POST["usname"])) & (trim($_POST["uspass"])) ) {
// leemos los valores asociados a estos atributos
   $usname=quitar($_POST["usname"]);
   $uspass=quitar($_POST["uspass"]);
   include("../bd/conecta.php");
   $link=conexion();
   $res=mysql_query("SELECT id, nivel, lastaccess, lasttime FROM admuser WHERE nameus='$usname' AND passus='$uspass'") or die(mysql_error());
   if($row=mysql_fetch_object($res)) {
      $t=time();
	  $sesionid=md5(uniqid("$row->id:$t"));
	  $iduser=$row->id;
	  $ipaddr=getenv("REMOTE_ADDR");
	  $penultimoacceso=$row->lastaccess;
	  $ultimoacceso=$row->lasttime;
	  $qk="$iduser:$sesionid";
	  setcookie('tsis', $qk, time() + 60*60*24*30, '/tesis', '', 0);
	  mysql_query("UPDATE admuser SET sesionid='$sesionid', lastaccess='$ultimoacceso', lasttime='$t', lastaddress='$ipaddr' WHERE id=$iduser") or die(mysql_error());
      mysql_free_result($res); unset($row);
	  header("Location: admtesis.php");
   } else {
     header("Location: index.php");
	 exit;
   }
   
} else {
//Reporto un login invalido
  header("Location: index.php");
  exit;
}	   
?>
