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

if(trim($_POST["cuenta"] != "") && trim($_POST["passwo"] != ""))
{
   $username=quitar($_POST["cuenta"]);
   $password=quitar($_POST["passwo"]);
	$pasword = crypt($password,$username);
   //ahora, detectamos en la TABLA al usuario
     include('../bd/conecta.php');
     $link = Conexion();
     $res=mysql_query("SELECT COD_FUNCIONARIO FROM FUNCIONARIO WHERE USER_FUNCIONARIO=\"$username\" AND PASS_FUNCIONARIO=\"$pasword\" ") or die(mysql_error());
     if( $user_obj = mysql_fetch_object($res) ) {
			$t = time();
			$sesionid = md5(uniqid("$user_obj->COD_FUNCIONARIO:$t"));
			$iduser = $user_obj->COD_FUNCIONARIO;
			$qk = "$iduser:$sesionid";
			setcookie('Bzr', $qk); //, time() + 60*60*24*30, '', '', 0);
	       //Ahora, actualizamos la información en la Tabla
			mysql_query("UPDATE FUNCIONARIO SET SESIONID=\"$sesionid\" WHERE COD_FUNCIONARIO=\"$iduser\" ") or die(mysql_error());
			mysql_free_result($res); unset($user_obj);
			mysql_close($link);
			echo "<HTML><HEAD><META HTTP-EQUIV=Refresh CONTENT='0; URL=home.php'></HEAD><Body BgColor=White></Body></HTML>";
			die();
      } else {
        //Usuario invalido --> username o password
		  global $valor;
  		  $valor=1;
		  
          header("Location: index.php");
      }
} else {
//Reporto un login invalido
  header("Location: index.php");
}
?>