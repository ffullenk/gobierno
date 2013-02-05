<?
if(trim($_POST["name"] != "") && trim($_POST["uname"] != "") &&  trim($_POST["pname"] != ""))
    {
	$Nnom = $_POST["name"];
	$Ncta = $_POST["uname"];
	$Npas = $_POST["pname"];
	$Nniv = $_POST["acceso"];

	// Conectar con Base de Datos
	include("conexion.php");
	$link = Conexion();

      $result = mysql_query("SELECT USERNAME FROM XUSER WHERE USERNAME='$Ncta'");
      if($row = mysql_fetch_array($result))
        {
	echo " ya existe .. debe especificar otro .. !!! ";
        }
        else
        {
          	// Si No Existe el USER .. crear registro

		/* Para Efectos de Supervisión: USER: Administrador Sitio Web GORE-COQUIMBO  */
		/*				NICK: GOREADMIN					*/
		/*				PASSWORD: UIGORE4				*/
		/*				NIVEL: X					*/

		$Npas = md5($Npas);
		mysql_query("INSERT INTO XUSER(NOMBRE, USERNAME, PASSWORD, NIVEL) VALUES('$Nnom', '$Ncta', '$Npas', '$Nniv')") or DIE(mysql_error());

        }
        mysql_free_result($result);
    }
    else
    {
      echo "Debe especificar su Nombre, UserName y Password ...!!";
    }
/*    mysql_close($result); */
?>
