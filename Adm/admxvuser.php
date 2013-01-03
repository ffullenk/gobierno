<?
// Confirmar Peticion de Inicio de Sesion de USER

  // Conectar con Base de Datos
  include("conexion.php");
  $link = Conexion();


  if(trim($HTTP_POST_VARS["uname"] != "") && trim($HTTP_POST_VARS["pname"] != ""))
    {
      $Ncta = $HTTP_POST_VARS["uname"];
      $Npas = $HTTP_POST_VARS["pname"];
/*	echo "Password Npas: $Npas<BR>"; */
      $Npas = md5($Npas);
/*	echo "Password Npas con md5: $Npas<BR>"; */
	$Npas = substr($Npas,0,16);
/* echo "Password Npas con md5: $Npas<BR>"; */


      $result = mysql_query("SELECT NOMBRE, USERNAME, PASSWORD, NIVEL FROM XUSER WHERE USERNAME='$Ncta' AND PASSWORD='$Npas'")or DIE (mysql_error());
      if($row = mysql_fetch_array($result))
        {
		$t = time();
		$sesionid = md5(uniqid("$Ncta:$t"));
		
		$Nniv = $row["NIVEL"];

		// Conocer último ingreso del USER
		$ult_access = mysql_query("SELECT USERNAME, PASSWORD, SESIONID, LASTACCESS, LASTIME, LASTADDR FROM XSESION WHERE USERNAME='$Ncta' AND PASSWORD='$Npas'") or DIE(mysql_error());

		if($rowultimoacceso = mysql_fetch_array($ult_access))
		{
			//Última Conexion
			$penultimoacceso = $rowultimoacceso["LASTACCESS"];
			$ultimoacceso    = $rowultimoacceso["LASTIME"];
			
			//Actualizar ID de SESION y tiempo
			mysql_query("UPDATE XSESION SET SESIONID='$sesionid', LASTACCESS='$ultimoacceso', LASTIME='$t' WHERE USERNAME='$Ncta' AND PASSWORD='$Npas'") or DIE(mysql_error());

		}
		else
		{
			// No existen Registro de Sesiones Anteriores
			// Agregar ID de SESION y tiempo para USER

			$ipaddr = $REMOTE_ADDR;

			mysql_query("INSERT INTO XSESION(USERNAME,PASSWORD,NIVEL,SESIONID,LASTACCESS,LASTIME,LASTADDR) VALUES('$Ncta','$Npas','$Nniv','$sesionid','$t','$t','$ipaddr')") or DIE(mysql_error());

		}
                mysql_free_result($ult_access);
                setcookie("AdmGORE",$Ncta,$t+63072000);  // 2 años de vida
                mysql_close($link);
                
                include("admxsite.php");
/*
		?>
			<SCRIPT LANGUAGE="javascript">
                              location.href="admxsite.php";
		           <!--   location.href="admxmain.php";  -->
			</SCRIPT>

		<?
*/
            }
            else
            {
		// USER NI PASSWORD EXISTEN
              echo "INVALID USERNAME  AND PASSWORD...!!";
            }
            mysql_free_result($result);
    }
    else
    {
      echo "Debe especificar su USERNAME y PASSWORD ...!!";
    }
/*    //Destruir las cookies
    setcookie("AdmGORE",x,time()-3600);
*/
    mysql_close($link);
?>
