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

if(trim($_POST["email"] != ""))
{
   $email=quitar($_POST["email"]);

   //ahora, detectamos en la TABLA al usuario
     include('../bd/conecta.php');
     $link = Conexion();
     $res=mysql_query("SELECT COD_PERS FROM PERSONA WHERE EMAIL=\"$email\" ") or die(mysql_error());
     if( $user_obj = mysql_fetch_object($res) ) {
			$t = time();
			$sesionid = md5(uniqid("$user_obj->COD_PERS:$t"));
			$iduser = $user_obj->COD_PERS;
			$qk = "$iduser:$sesionid";
			setcookie('gore', $qk); //, time() + 60*60*24*30, '', '', 0);

	       //Ahora, confirmado el user con su email, chequeamos que no haya realizado la encuesta ya
	       
	       $bscUsuario=mysql_query("SELECT COD_PERS FROM ENCUESTADOS WHERE COD_PERS=\"".$iduser."\" ") or die(mysql_error());
	       
			if( $user_bsc = mysql_fetch_object($bscUsuario)) {
				  // El usuario ya ha realizado la encuesta, por lo que debemos presentar un mensaje agradeciendo el hecho de haber participado en ella.

				  echo "<HTML><HEAD><META HTTP-EQUIV=Refresh CONTENT='0; URL=gracias.php'></HEAD><Body BgColor=White></Body></HTML>";

				  die();
			} else {
			
				// El usuario no ha respondido la encuesta, los dejamos ingresado en la tabla correspondiente

				mysql_query("INSERT INTO ENCUESTADOS(COD_PERS,SESIONID) VALUES('".$iduser."','".$sesionid."') ") or die(mysql_error());
			}
			mysql_free_result($bscUsuario); unset($user_bsc);

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