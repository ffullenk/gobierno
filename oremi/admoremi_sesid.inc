<?
  Global $userN, $passN, $Nniv;
  $loginCorrecto = false;
  $userN;
  $passN;
  $Nniv;


  if(isset($HTTP_COOKIE_VARS["OREMIuser"]))
    {
   // Retomar SESION ID
      $idsesion = $HTTP_COOKIE_VARS["OREMIidse"];
      $NameUser = $HTTP_COOKIE_VARS["OREMIuser"];

   // Verificar en Tabla SESION
      $result = mysql_query("SELECT username, nivel, sesionid FROM sesion WHERE username='$NameUser' AND sesionid='$idsesion'") or DIE(mysql_error());

      if($row = mysql_fetch_array($result))
        {
                $userN = $row["username"];
//                setcookie("OREMIuser",$userN, time() + 3600);
                $loginCorrecto = true;
                $Nniv = $row["nivel"];
                $Nses = $row["sesionid"];
        }
        else
        {
          //Destruir las cookies
//          setcookie("AdmGORE",x,time()-3600);
            setcookie("OREMIuser", x, time()+3600);
            setcookie("OREMIpass", x, time()+3600);
            setcookie("OREMIidse", x, time()+3600);
        }
          mysql_free_result($result);
        }
?>