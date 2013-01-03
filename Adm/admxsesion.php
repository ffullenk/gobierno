<?
  $loginCorrecto = false;
  $uname;
  $Nniv;
  $Nses;

  if(isset($HTTP_COOKIE_VARS["AdmGORE"]))
    {
	// Retomar SESION ID
	$Ncta= $HTTP_COOKIE_VARS["AdmGORE"];
/*	echo "USER es: $Ncta<BR>";  */

	// Verificar en Tabla XSESION

       $result = mysql_query("SELECT USERNAME, NIVEL, SESIONID FROM XSESION WHERE USERNAME='$Ncta'") or DIE(mysql_error());

      if($row = mysql_fetch_array($result))
        {
		$uname = $row["USERNAME"];
		setcookie("AdmGORE",$uname, time() + 63072000);

		$loginCorrecto = true;
		$Nniv = $row["NIVEL"];
		$Nses = $row["SESIONID"];
        }
        else
        {
          //Destruir las cookies
          setcookie("AdmGORE",x,time()-3600);
        }
          mysql_free_result($result);
        }
?>

