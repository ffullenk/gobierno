<?
include("conecta/oremi.inc");
$link = Conexion();
//include("utils/utils.inc");

function quitar($mensaje)
{
   $mensaje = str_replace("<","&lt;",$mensaje);
   $mensaje = str_replace(">","&gt;",$mensaje);
   $mensaje = str_replace("\'","&#39;",$mensaje);
   $mensaje = str_replace('\"',"&quot;",$mensaje);
   $mensaje = str_replace("\\\\","&#92",$mensaje);

   return $mensaje;
}

if(trim($HTTP_POST_VARS["oremiusername"] != "") && trim($HTTP_POST_VARS["oremipassword"] != ""))
//if(isset($HTTP_POST_VARS["oremiusername"])  && isset($HTTP_POST_VARS["oremipassword"]))
{

  $userN = quitar($HTTP_POST_VARS["oremiusername"]);
  $passN = quitar($HTTP_POST_VARS["oremipassword"]);
  $passN = md5($passN);
  $passN = substr($passN,0,16);

  $result = mysql_query("SELECT nombre, username, password, nivel FROM FUENTE WHERE username='$userN' AND password='$passN'") Or DIE("Imposible Efectuar Consulta a Tabla -> Check User From FUENTE Table");

  if($row = mysql_fetch_array($result))
  {
    $t = time();
    $sesionid = md5(uniqid("$userN:$t"));
    $Nniv = $row["nivel"];

    // Conocer último ingreso del USER
       $ult_access = mysql_query("SELECT username, password, nivel, sesionid, lastaccess, lastime, lastaddr FROM sesion WHERE username='$userN' AND password='$passN'") or DIE(mysql_error());

       if($rowultimoacceso = mysql_fetch_array($ult_access))
       {
         //Última Conexion
           $penultimoacceso = $rowultimoacceso["lastaccess"];
           $ultimoacceso    = $rowultimoacceso["lasttime"];

         //Actualizar ID de SESION y tiempo
           mysql_query("UPDATE sesion SET sesionid='$sesionid', lastaccess='$ultimoacceso', lastime='$t' WHERE username='$userN' AND password='$passN'") or DIE(mysql_error());

       }
       else
       {
         // No existen Registro de Sesiones Anteriores
         // Agregar ID de SESION y tiempo para USER

            $ipaddr = $REMOTE_ADDR;

            mysql_query("INSERT INTO sesion(username,password,nivel,sesionid,lastaccess,lastime,lastaddr) VALUES('$userN','$passN','$Nniv','$sesionid','$t','$t','$ipaddr')") or DIE(mysql_error());

        }
            mysql_free_result($ult_access);
            mysql_close();
          //90 days for the cookie
            setcookie("OREMIuser", $userN, $t+3600);
            setcookie("OREMIpass", $passN, $t+3600);
            setcookie("OREMIidse",$sesionid,$t+3600);  // 2 años de vida

            header("Location: admoremi.php");
   }
   else
   {
       // USER NI PASSWORD EXISTEN
          header("Location: admoremifail.php");
   }
   mysql_free_result($result);
}
?>

<html>
<head>
<title>Oficina Regional de Emergencia, Regi&oacute;n de Coquimbo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/oremi.css" type="text/css">
<script language="JavaScript" src="js/oremi.js"></script>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#F8F8F8">
<table width="735" border="0" cellpadding="0" cellspacing="0" class="tablebody" bgcolor="#DDE5F2">
  <tr> 
    <td width="485" height="95" valign="top" bgcolor="#DDE5F2">&nbsp;</td>
    <td width="250" valign="top">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#eaeaea" class="tablebody">
        <tr> 
          <td width="11" height="5"></td>
          <td width="64"></td>
          <td width="13"></td>
          <td width="13"></td>
          <td width="107"></td>
          <td width="10"></td>
          <td width="20"></td>
          <td width="12"></td>
        </tr>
        <form method="post" action="<? echo $PHP_SELF ?>">
        <tr> 
          <td height="15"></td>
          <td colspan="3" valign="top"><img src="imagenes/intranet.gif" width="90" height="15"></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr> 
          <td height="3"></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr> 
          <td valign="top" colspan="2" rowspan="7">&nbsp;</td>
          <td height="15"></td>
          <td valign="bottom" bgcolor="#eaeaea" colspan="2" class="notainc" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;usuario:</td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr> 
          <td height="6"></td>
          <td rowspan="2" colspan="2" valign="top" bgcolor="#eaeaea" align="right">
             <input type="text" name="oremiusername" size="15" maxlength="20" tabindex="1">
          </td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr> 
          <td height="9"></td>
          <td></td>
          <td rowspan="2" valign="top" bgcolor="#eaeaea">
             <input type="image" name="formuser" src="imagenes/go.gif" tabindex="3">
<!-- <img src="imagenes/go.gif" width="20" height="20"> -->
          </td>
          <td></td>
        </tr>
        <tr> 
          <td height="11"></td>
          <td rowspan="2" valign="bottom" bgcolor="#eaeaea" colspan="2" class="notainc" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;password:</td>
          <td></td>
          <td></td>
        </tr>
        <tr> 
          <td height="4"></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr> 
          <td height="15"></td>
          <td colspan="2" valign="top" bgcolor="#eaeaea" align="right">
             <input type="password" name="oremipassword" size="15" maxlength="16" tabindex="2">
          </td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        </form>
        <tr> 
          <td height="12"></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </table>
      
    </td>
  </tr>
</table>
<table width="735" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
<tr> 
   <td width="735" valign="middle" class="date" align="right">
      <!-- INSERTAR FECHA -->
      <script language="JavaScript">
      <!--
document.write( dayNames[now.getDay()] + " " + now.getDate() + " de " + monthNames[now.getMonth()] + " " +" de " + year);
      // -->
      </script>
   </td>
</tr>
<tr> 
   <td width="735" height="5" valign="top"></td>
</tr>
<tr> 
  <td width="735" height="24" valign="top"></td>
</tr>
<tr> 
  <td width="735" height="1" valign="top" background="imagenes/lnbot-1.gif"></td>
</tr>
<tr> 
  <td width="735" height="5" valign="top"></td>
</tr>
</table>

<table width="735" border="0" cellpadding="0" cellspacing="0" class="tablebody" bgcolor="#FFFFFF">
  <tr> 
    <td width="3" height="401" valign="top">&nbsp;</td>
    <td width="125" valign="top"> 
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebody">
        <tr> 
          <td width="125" height="75" valign="top">&nbsp;</td>
        </tr>
        <tr> 
          <td height="43"></td>
        </tr>
        <tr> 
          <td height="165" valign="top"> 
            <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborderLinks">
              <tr> 
                <td width="125" height="30" valign="middle" align="center" class="topmenu">Sitios 
                  Relacionados</td>
              </tr>
              <tr> 
                <td height="15" valign="top" bgcolor="#FFFFFF">&nbsp;<a href="http://www.onemi.cl" target="_blank" class="blueone">Onemi</a></td>
              </tr>
              <tr> 
                <td height="15" valign="top" bgcolor="#FFFFFF">&nbsp;<a href="http://www.gorecoquimbo.cl" target="_blank" class="blueone">GORE 
                  Coquimbo</a></td>
              </tr>
              <tr> 
                <td height="15" valign="top" bgcolor="#FFFFFF">&nbsp;<a href="http://ssn.dgf.uchile.cl/cgi-bin/sismo_cab.pl" target="_blank" class="blueone">Eventos 
                  S&iacute;smicos</a></td>
              </tr>
              <tr> 
                <td height="15" valign="top" bgcolor="#FFFFFF">&nbsp;<a href="http://www.meteochile.cl" target="_blank" class="blueone">Meteorolog&iacute;a 
                  Chile</a></td>
              </tr>
              <tr> 
                <td height="15" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
              </tr>
              <tr> 
                <td height="15" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
              </tr>
              <tr> 
                <td height="15" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
              </tr>
              <tr> 
                <td height="15" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
              </tr>
              <tr> 
                <td height="15" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
              </tr>
            </table>
          </td>
        </tr>
        <tr> 
          <td height="34"></td>
        </tr>
        <tr>
          <td height="65" valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td height="3"></td>
        </tr>
      </table>
    </td>
    <td width="9" background="imagenes/lnvert-1.gif"></td>
    <td width="320" valign="top"> 
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="320" height="21" valign="top"> 
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebody">
              <tr> 
                <td width="320" height="20" valign="middle" align="left" class="topmenu">&Uacute;ltimos Eventos</td>
              </tr>
              <tr> 
                <td valign="top" height="1" background="imagenes/vert.gif"></td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td height="371">
          <!-- Listar Ultimos Informes/Consolidados Despachados aun en proceso [no cerrados] -->
          <DIV align="left" style="padding-left: 5px; HEIGHT: 350px; OVERFLOW: auto; WIDTH: 318">
              <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#ffffff">
<?

// Desplegar Consolidados Creados

   $con_ninf = mysql_query("SELECT idconsreg, ConsolidaRegion.idfuente, ocurrencia, descinforme, nrocons FROM ConsolidaRegion WHERE idestadoevento=0 ORDER BY ocurrencia DESC LIMIT 8") or die(mysql_error());

   while($row=mysql_fetch_object($con_ninf)) {
         list($year, $month, $day, $time) = split('[-. ]', $row->ocurrencia);
         $fecha = $day ."-". $month ."-". $year;
         $describe = substr($row->descinforme,0,40) . "...";
echo <<< HTML

             <tr bgcolor="#FfFfFf">
               <td bgcolor="#F3F7F7" RowsPan=2 width=15 align="center" valign="middle" >
                   <strong>$row->idconsreg</strong>
               </td>
               <td class="date">
                  $fecha
               </td>

             </tr>
             <tr> 
               <td bgcolor="#FFFFFF" class="eventos">
                  <!-- <a href="admoremi_veven.php?cCons=$row->idconsreg" class="enlace">$describe</a> -->
				  <a href="nuevavis.php?cCons=$row->idconsreg" class="enlace">$describe</a>
               </td>
            </tr>
            <tr>
                <td valign="top" ColSpan=2 height="1" background="imagenes/lnbot-1.gif"></td>
            </tr>
            <tr>
                <td valign="top" ColSpan=2 height="10"></td>
            </tr>

HTML;
   }
   mysql_free_result($con_ninf);
?>
            </table>
            </DIV>
          </td>
        </tr>
      </table>
    </td>
    <td width="9" valign="top" background="imagenes/lnvert-1.gif"></td>
    <td width="135" valign="top"> 
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebody">
        <tr> 
          <td width="135" height="50" valign="top">&nbsp;</td>
        </tr>
        <tr> 
          <td height="13"></td>
        </tr>
        <tr>
          <td height="25" valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td height="16"></td>
        </tr>
        <tr> 
          <td height="276" valign="top"> 
            <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborder">
              <tr> 
                <td width="133" height="25" valign="middle" align="center" class="topmenu">Eventos 
                  en Proceso</td>
              </tr>
              <tr> 
                <td valign="top" height="248" bgcolor="#FFFFFF">&nbsp;</td>
              </tr>
            </table>
          </td>
        </tr>
        <tr> 
          <td height="25" valign="top">&nbsp;</td>
        </tr>
      </table>
    </td>
    <td width="9" valign="top" background="imagenes/lnvert-1.gif"></td>
    <td width="125" valign="top">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebody">
        <tr> 
          <td width="125" height="150" valign="top"> 
            <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborderAlerta">
              <tr> 
                <td width="123" height="25" valign="middle" align="center" class="topmenu">Alertas 
                  Vigentes</td>
              </tr>
              <tr> 
                <td valign="top" height="122" bgcolor="#FFFFFF">&nbsp;</td>
              </tr>
            </table>
          </td>
        </tr>
        <tr> 
          <td height="71"></td>
        </tr>
        <tr>
          <td height="135" valign="top"> 
            <table width="100%" border="0" cellpadding="0" cellspacing="1">
              <tr> 
                <td width="123" height="133"></td>
              </tr>
            </table>
          </td>
          </tr>
        <tr>
          <td height="45"></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr> 
    <td valign="top" height="35" colspan="8"> 
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="notainc">
        <tr> 
          <td width="735" height="1" valign="top" background="imagenes/lnbot-1.gif"></td>
        </tr>
        <tr> 
          <td width="735" height="32" valign="top" align="center" class="notainc"> 
            Desarrollado para la Oficina de Emergencia de la Regi&oacute;n de 
            Coquimbo. Sitio Optimizado para una visualizaci&oacute;n de 800x600. 
            Si usted tiene alg&uacute;n comentario o pregunta acerca de este sitio, 
            cont&aacute;ctenos a oremisite@gorecoquimbo.cl </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
</body>
</html>
