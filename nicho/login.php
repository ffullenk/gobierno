<?php
function quitar($mensaje)
{
$mensaje = str_replace("<","&lt;",$mensaje);
$mensaje = str_replace(">","&gt;",$mensaje);
$mensaje = str_replace("\'","&#39;",$mensaje);
$mensaje = str_replace('\"',"&quot;",$mensaje);
$mensaje = str_replace("\\\\","&#92",$mensaje);
return $mensaje;
}

if(trim($HTTP_POST_VARS["username"] != "") && trim($HTTP_POST_VARS["password"] != ""))
{
   $username=quitar($HTTP_POST_VARS["username"]);
   $password=quitar($HTTP_POST_VARS["password"]);
   //$mdpass=md5($password);
   include("../bd/conecta.php");
   $link = Conexion();
   $res=mysql_query("SELECT id, lastaccess, lasttime FROM usuarios WHERE nick='$username' AND password='$password'") or die("No se puede localizar usuario.");
   if($row = mysql_fetch_object($res)) {
        $t = time();
        $sesionid = md5(uniqid("$row->id:$t"));
	    $iduser = $row->id;
$ipaddr = getenv("REMOTE_ADDR");
$penultimoacceso = $row->lastaccess;
$ultimoacceso = $row->lasttime;
$qk="$iduser:$sesionid";
setcookie('qknicho', $qk, time() + 60*60*24*30, '/nicho', '', 0);
        mysql_query("UPDATE usuarios SET sesionid='$sesionid', lastaccess='$ultimoacceso', lasttime='$t', lastipad='$ipaddr' WHERE id=$iduser") or die(mysql_error());
        mysql_free_result($res); unset($row);
           header('Location: admservicios.php');
      } else {
	      // No Existe en tabla user ni passw
           header("Location: nopass.html");
	  }
} else {
  header("Location: error.php");
} ?>