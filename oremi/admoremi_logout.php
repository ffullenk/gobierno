<?
  //Conectar a Base de Datos
  include("conecta/oremi.inc");
  $link = Conexion();

  if(isset($HTTP_COOKIE_VARS["OREMIuser"]))
  {
   // Retomar SESION ID
      $idsesion = $HTTP_COOKIE_VARS["OREMIidse"];
      $NameUser = $HTTP_COOKIE_VARS["OREMIuser"];

   // Verificar en Tabla SESION
      $result = mysql_query("SELECT username, nivel, sesionid FROM sesion WHERE username='$NameUser' AND sesionid='$idsesion'") or DIE(mysql_error());

      if($row = mysql_fetch_array($result))
      {
          $t = $row[lastime];

        //Destruir las cookies
          setcookie("OREMIuser", x, $t+3600);
          setcookie("OREMIpass", x, $t+3600);
          setcookie("OREMIidse", x, $t+3600);
      }  
      mysql_free_result($result);
      mysql_close($link);
    }
    Header("Location: index.php");
?>