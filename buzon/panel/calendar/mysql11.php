<?php
require_once('classes/tc_calendar.php');
require_once("excel.php");
require_once("excel-ext.php");
  $date5=$_GET["prod"];
    $date6=$_GET["prod"];
  ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<title>GORE COQUIMBO</title>


<link href="calendar.css" rel="stylesheet" type="text/css" /> <script language="javascript" src="calendar.js"></script>

<style type="text/css">
body { font-size: 11px; font-family: "verdana"; }

pre { font-family: "verdana"; font-size: 10px; background-color: #FFFFCC; padding: 5px 5px 5px 5px; } pre .comment { color: #008000; } pre .builtin { color:#FF0000;  } </style> <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> </head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0"> <table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="5">
        <tr>
          <td><form name="form1" method="post" action="">
            <table border="0" cellspacing="0" cellpadding="2">
              <tr>
                <td nowrap>Fecha Inicial :</td>
                <td><?php
						  $myCalendar = new tc_calendar("date5", true, false);
						  $myCalendar->setIcon("images/iconCalendar.gif");
						  $myCalendar->setDate(date('d'), date('m'), date('Y'));
						  $myCalendar->setPath("./");
						  $myCalendar->setYearInterval(2000, 2015);
						  $myCalendar->dateAllow('2008-05-13', '2015-03-01');
						  $myCalendar->setDateFormat('j F Y');
						  //$myCalendar->setHeight(350);	  
						  //$myCalendar->autoSubmit(true, "form1");
						  $myCalendar->writeScript();
				  ?></td>
                <td><input type="submit" name="ver" id="ver2" value="Ver Fechas""></td>
              <tr>
                <td nowrap>Fecha Final :</td>
                <td><?php
						  $myCalendar = new tc_calendar("date6", true, false);
						  $myCalendar->setIcon("images/iconCalendar.gif");
						  $myCalendar->setDate(date('d'), date('m'), date('Y'));
						  $myCalendar->setPath("./");
						  $myCalendar->setYearInterval(2000, 2015);
						  $myCalendar->dateAllow('2008-05-13', '2015-03-01');
						  $myCalendar->setDateFormat('j F Y');
						  //$myCalendar->setHeight(350);	  
						  //$myCalendar->autoSubmit(true, "form1");
						  $myCalendar->writeScript();
					  ?></td>
              </tr>
            </table>
            <table border="0" cellspacing="0" cellpadding="2">
              <tr>
                <td nowrap>Fecha Inicial :</td>
                <td><input name="date5" type="text" id="date5"></td>
                <td><input type="submit" name="ver2" id="ver" value="Ver""></td>
              <tr>
                <td nowrap>Fecha Final :</td>
                <td><input name="date6" type="text" id="date6"></td>
              </tr>
            </table>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
                        <p>&nbsp;</p>
          </form>
          </td>
        </tr>
      </table>
  </tr>
</table>
</body>
</html>



<?php

// Consultamos los datos desde MySQL
$conEmp = mysql_connect("localhost","grbc_coqbo","g0r3citzen");
mysql_select_db("grbuzon", $conEmp);
$queEmp = "SELECT BITACORA_C.COD_BITC AS CODIGO_CONSULTA, TIPO.TIPO,TEMAS.TEMA,PERSONA.NOMBRES AS Nombre_Usuario,
PERSONA.PATERNO AS App_Usuario, PERSONA.EMAIL AS Email_Usuario, BITACORA_C.FECHA as Fecha_Consulta, FUNCIONARIO.NOMBRES AS Nombre_Funcionario,
FUNCIONARIO.APPAT AS App_Funcionario, BITACORA_R.FECHA AS Fecha_Respuesta
FROM BITACORA_C, BITACORA_R, FUNCIONARIO, PERSONA,TEMAS, TIPO
WHERE BITACORA_C.COD_BITC = BITACORA_R.COD_BITC
AND BITACORA_R.COD_FUNCIONARIO = FUNCIONARIO.COD_FUNCIONARIO
AND BITACORA_C.COD_PERS = PERSONA.COD_PERS
AND BITACORA_C.COD_TIPO = TIPO.COD_TIPO
AND BITACORA_C.COD_TEMA =TEMAS.COD_TEMA
AND SUBSTRING(BITACORA_C.FECHA,1,10) BETWEEN $date5 AND $date6 ORDER BY CODIGO_CONSULTA";
$resEmp = mysql_query($queEmp, $conEmp) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);
// Creamos el array con los datos
while($datatmp = mysql_fetch_assoc($resEmp)) { 
    $data[] = $datatmp; 
}
// Generamos el Excel  
createExcel("excel-mysql.xls", $data);
exit; ?>
