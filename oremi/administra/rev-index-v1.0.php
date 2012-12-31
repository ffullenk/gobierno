<?
   $myconn = @mysql_connect("130.0.4.206","oremi_iv","mollaco");
   if(!$myconn) { echo ('Imposible conectarse con MYSQL.'); exit();}
   if(!@mysql_select_db("oremi")) { echo ('Imposible conectarse con la BD.'); exit();}


function cabeceraHTML() {
echo <<< HTML
<html>
<head>
<title>OREMI</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../css/oremi.css" type="text/css">
<SCRIPT TYPE="text/javascript">
<!--
function valida()
{
  if(document.form.nroregion.value== "")
  {
    document.form.nroregion.focus();
    alert('Debe Ingresar El Número Correspondiente a la Región .. !!!');
    return false;
  }

  if(document.form.nnombreregion.value== "")
  {
    document.form.nnombreregion.focus();
    alert('Debe Ingresar el Nombre de la Región .. !!!');
    return false;
  }

  else
  {
    document.form.submit();
    return true;
  }
}
//-->
</SCRIPT>
</head>

<body bgcolor="#FFFFFF" text="#000000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<center>
<table width="720" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="145" height="75" valign="top" bgcolor="#dde5f2">&nbsp;</td>
    <td width="450" valign="top"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="450" height="75">
        <param name=movie value="../swf/oremi.swf">
        <param name=quality value=high>
        <embed src="../swf/oremi.swf" quality=high pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="450" height="75">
        </embed> 
      </object></td>
    <td width="125" valign="top"> 
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="25" valign="top" rowspan="5" bgcolor="#dde5f2">&nbsp;</td>
          <td width="100" valign="top" height="15">&nbsp;</td>
        </tr>
        <tr> 
          <td valign="top" height="15">&nbsp;</td>
        </tr>
        <tr> 
          <td valign="top" height="15">&nbsp;</td>
        </tr>
        <tr> 
          <td valign="top" height="15">&nbsp;</td>
        </tr>
        <tr> 
          <td valign="top" height="15">&nbsp;</td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<table width="720" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="720" height="25"></td>
  </tr>
</table>
<table width="720" border="0" cellpadding="0" cellspacing="0" >
  <tr> 
    <td width="150" valign="top" rowspan="2"> 
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="14" height="73"></td>
          <td valign="top"> 
            <table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableborder">
              <tr> 
                <td width="118" height="20" valign="top" bgcolor="#DDE5F2" class="topmenu"> 
                  <div align="center">Tabla Pa&iacute;s </div>
                </td>
              </tr>
              <tr> 
                <td valign="top" height="16" bgcolor="#FFFFFF" class="bluenone"><a href="$PHP_SELF?tabla=region">Regi&oacute;n</a></td>
              </tr>
              <tr> 
                <td height="16" valign="top" bgcolor="#FFFFFF"><a href="$PHP_SELF?tabla=provincia">Provincia</a></td>
              </tr>
              <tr> 
                <td height="16" valign="top" bgcolor="#FFFFFF"><a href="$PHP_SELF?tabla=comuna">Comuna</a></td>
              </tr>
            </table>
          </td>
          <td width="14"></td>
        </tr>
        <tr> 
          <td colspan="2" height="5" valign="top"></td>
          <td valign="top"></td>
        </tr>
        <tr> 
          <td height="39"></td>
          <td valign="top"> 
            <table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableborder">
              <tr> 
                <td width="118" height="20" valign="top" class="topmenu"> 
                  <div align="center">Tabla Ubicaci&oacute;n </div>
                </td>
              </tr>
              <tr> 
                <td valign="top" height="16" bgcolor="#FFFFFF"><a href="$PHP_SELF?tabla=ubicacion">Ubicaci&oacute;n</a></td>
              </tr>
            </table>
          </td>
          <td></td>
        </tr>
        <tr> 
          <td colspan="2" height="5" valign="top"></td>
          <td valign="top"></td>
        </tr>
        <tr> 
          <td height="39"></td>
          <td valign="top"> 
            <table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableborder">
              <tr> 
                <td width="118" height="20" valign="top" class="topmenu"> 
                  <div align="center">Tabla Tipo Evento</div>
                </td>
              </tr>
              <tr> 
                <td valign="top" height="16" bgcolor="#FFFFFF"><a href="$PHP_SELF?tabla=tipoevento">Tipo Evento</a></td>
              </tr>
            </table>
          </td>
          <td></td>
        </tr>
        <tr> 
          <td colspan="2" height="5" valign="top"></td>
          <td valign="top"></td>
        </tr>
		<tr> 
          <td height="39"></td>
          <td valign="top"> 
            <table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableborder">
              <tr> 
                <td width="118" height="20" valign="top" class="topmenu"> 
                  <div align="center">Tabla Cap. Respuesta</div>
                </td>
              </tr>
              <tr> 
                <td valign="top" height="16" bgcolor="#FFFFFF"><a href="$PHP_SELF?tabla=nivelrespuesta">Nivel Respuesta</a></td>
              </tr>
            </table>
          </td>
          <td></td>
        </tr>
        <tr> 
          <td colspan="2" height="5" valign="top"></td>
          <td valign="top"></td>
        </tr>
		<tr> 
          <td height="39"></td>
          <td valign="top"> 
            <table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableborder">
              <tr> 
                <td width="118" height="20" valign="top" class="topmenu"> 
                  <div align="center">Tabla Estado Alfa</div>
                </td>
              </tr>
              <tr> 
                <td valign="top" height="16" bgcolor="#FFFFFF"><a href="$PHP_SELF?tabla=estadoalfa">Estado Alfa</a></td>
              </tr>
            </table>
          </td>
          <td></td>
        </tr>
        <tr> 
          <td colspan="2" height="5" valign="top"></td>
          <td valign="top"></td>
        </tr>
		<tr> 
          <td height="39"></td>
          <td valign="top"> 
            <table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableborder">
              <tr> 
                <td width="118" height="20" valign="top" class="topmenu"> 
                  <div align="center">Tabla Estado Evento</div>
                </td>
              </tr>
              <tr> 
                <td valign="top" height="16" bgcolor="#FFFFFF"><a href="$PHP_SELF?tabla=estadoevento">Estado Evento</a></td>
              </tr>
            </table>
          </td>
          <td></td>
        </tr>
        <tr> 
          <td colspan="2" height="5" valign="top"></td>
          <td valign="top"></td>
        </tr>
		<tr> 
          <td height="39"></td>
          <td valign="top"> 
            <table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableborder">
              <tr> 
                <td width="118" height="20" valign="top" class="topmenu"> 
                  <div align="center">Tabla Tipo Recurso</div>
                </td>
              </tr>
              <tr> 
                <td valign="top" height="16" bgcolor="#FFFFFF"><a href="$PHP_SELF?tabla=tiporecurso">Tipo Recurso</a></td>
              </tr>
            </table>
          </td>
          <td></td>
        </tr>
        <tr> 
          <td colspan="2" height="5" valign="top"></td>
          <td valign="top"></td>
        </tr>
		<tr> 
          <td height="39"></td>
          <td valign="top"> 
            <table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableborder">
              <tr> 
                <td width="118" height="20" valign="top" class="topmenu"> 
                  <div align="center">Tabla Fuente</div>
                </td>
              </tr>
              <tr> 
                <td valign="top" height="16" bgcolor="#FFFFFF"><a href="$PHP_SELF?tabla=fuente">Fuente</a></td>
              </tr>
            </table>
          </td>
          <td></td>
        </tr>
        <tr> 
          <td colspan="2" height="5" valign="top"></td>
          <td valign="top"></td>
        </tr>
      </table>
    </td>
HTML;
}


function centroHTML() {
echo <<< HTML
<!-- De Acuerdo A Tabla Escogida -->
    <td width="450" height="355" valign="top"> 
	<!-- Sección Central - Carga de Actualizaciones -->
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="450" height="355"></td>
        </tr>
      </table>
	  <!-- FIN Sección Central - Carga de Actualizaciones -->
<!-- De Acuerdo A Tabla Escogida -->
HTML;
}


function restoHTML() {
echo <<< HTML
    </td>
    <td width="120" valign="top" rowspan="2"> 
	<!-- Sección Lateral Derecha  -->
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="120" height="330"></td>
        </tr>
        <tr>
          <td valign="top" height="60"> 
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr> 
                <td width="120" height="60" valign="top">&nbsp;</td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
	  <!-- FIN Sección Lateral Derecha -->
    </td>
  </tr>
  <tr> 
    <td height="25" valign="top"> 
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="450" height="25"></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
</center>
</body>
</html>
HTML;
}

function mensaje_error($error_accion_ms) {
echo <<< HTML
<!-- Sección Central - Carga de Actualizaciones -->
      <table width="450" border="0" cellpadding="0" cellspacing="0">
HTML;
          echo "<tr><td valign=middle class=topmenu><img src='../imagenes/linvert_acc.gif' border=0 align=center valign=middle
>ERROR</td></tr>";
          echo "<tr><td valign=middle background='../imagenes/linea.gif'></td></tr>";
          echo "<tr><td height=15></td></tr>";
          echo "<tr><td>";
          echo "$error_accion_ms</td></tr>";
          echo('<tr><td height="30" bgcolor="#ffffff" align="right"><a href="javascript:history.back()"><img src="../imagenes/volver.gif" border="0"></a></tr>');
          echo "</table>";
}


function mensaje_aviso($aviso_accion_ms) {
echo <<< HTML
<!-- Sección Central - Carga de Actualizaciones -->
      <table width="450" border="0" cellpadding="0" cellspacing="0">
HTML;
          echo "<tr><td valign=middle class=topmenu><img src='../imagenes/linvert_acc.gif' border=0 align=center valign=middle
>ATENCI&Oacute;N</td></tr>";
          echo "<tr><td valign=middle background='../imagenes/linea.gif'></td></tr>";
          echo "<tr><td height=15></td></tr>";
          echo "<tr><td>";
          echo "$aviso_accion_ms</td></tr>";
          echo "</table>";
}



if (isset($HTTP_GET_VARS['id'])) {
   if ($HTTP_GET_VARS['accion']=="borra_region"){
        $id_borrar= $HTTP_GET_VARS['id'];
        $precede = $HTTP_GET_VARS['tabla'];
        mysql_query("DELETE FROM Region WHERE idreg=$id_borrar") or die("Imposible Eliminar Región .. !!!");
        mysql_close();

        header ("Location: $PHP_SELF?tabla=$precede");
        exit;
  }
}


if (!isset($HTTP_GET_VARS['tabla'])){
  cabeceraHTML();
  centroHTML();
  restoHTML();
}


if (isset($HTTP_GET_VARS['tabla'])) {
  cabeceraHTML();
  if ($HTTP_GET_VARS['tabla'] == "region") {
echo <<< HTML
    <td width="450" height="355" valign="top">
    <!-- Sección Central - Carga de Actualizaciones -->
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td>
          <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">
            <tr>
              <td width="450" height="5" ColSpan="2" valign="top" background="../imagenes/linsup.gif"></td>
            </tr>
            <tr height="25">
              <td class="topmenu" valign="middle">&nbsp;TABLA:&nbsp;&nbsp;&nbsp;R&nbsp; E&nbsp; G&nbsp; I&nbsp; O&nbsp; N&nbsp; E&nbsp; S&nbsp;&nbsp;&nbsp;</td>
              <td align="right" valign="middle">:: <a href="$PHP_SELF?tabla=region&accion=agregar">Agregar</a></td>
            </tr>
            <tr>
             <td width="450" height="5" ColSpan="2" valign="top" background="../imagenes/lininf.gif"></td>
            </tr>
HTML;

    if (!isset($HTTP_GET_VARS['accion'])) {
      // Visualizar Registro de Tabla Region
      $con_region = mysql_query("SELECT * FROM Region") Or Die("Imposible Realizar Consulta a Tabla Región en estos Momentos ... Ha ocurrido un error inesperado.. !!! ");
       echo "<tr><td ColSpan=2 height=25></td></tr>";
       echo "<tr><td ColSpan=2>";
       if (mysql_num_rows($con_region) > 0 ) {
           echo('<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">');
           echo('  <tr bgcolor=#dde5f2><td align=center>Id.Regi&oacute;n</td><td width=1 bgcolor=#ffffff></td><td>Regi&oacute;n</td><td ColSpan=4></tr>'); 

           while($row=mysql_fetch_object($con_region)) {
             echo "<tr bgcolor=#eaeaea>";
             echo "<td align=center>$row->idreg</td><td width=1 bgcolor=#ffffff></td>";
             echo "<td>$row->region</td><td width=1 bgcolor=#ffffff></td>";
echo <<< HTML
            <td align=center><a href="$PHP_SELF?tabla=region&accion=modifica_region&id=$row->idreg" class="orangenone">Modificar</td>
            <td width=1 bgcolor=#ffffff></td>
            <td align=center><a href="$PHP_SELF?tabla=region&accion=borra_region&id=$row->idreg" class="orangenone">Eliminar</td>
HTML;
             echo "<tr bgcolor=#ffffff><td ColSpan=2 height=1></td></tr>";
           }
           echo "</table>";
       }
       mysql_free_result($con_region);
       echo "</td></tr>";
HTML;
   }  


  if ($HTTP_GET_VARS['accion']=="modifica_region"){
     $id = $HTTP_GET_VARS['id'];
     $precede = $HTTP_GET_VARS['tabla'];

     $con_region = mysql_query("SELECT * FROM Region WHERE idreg='$id'") or die("Imposible Leer Registro desde Tabla Region");

     echo "<tr><td ColSpan=2 height=25></td></tr>";
     echo "<tr><td Colspan=2 valign=middle class=topmenu><img src='../imagenes/linvert_acc.gif' border=0 align=center valign=middle>Modificar Registro</td></tr>";
     echo "<tr><td Colspan=2 valign=middle background='../imagenes/linea.gif'></td></tr>";
     echo "<tr><td Colspan=2 height=15></td></tr>";
     echo "<tr><td ColSpan=2>";
     while($resultados = mysql_fetch_array($con_region)) {

echo <<< HTML
      <form method="post" action="$PHP_SELF?tabla=region&accion=edita_region" onSubmit="return valida();" name="form">
      <input type="hidden" name="id" value="$resultados[idreg]">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">
        <tr align=center bgcolor=#dde5f2>
          <td>Id. Regi&oacute;n</td><td>Regi&oacute;n</td>
        </tr>
        <tr align="center" bgcolor=#eaeaea>
          <td><input type="text" name='nroregion' size="2" maxlength="2" value=$resultados[idreg] disabled style="FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif; FONT-SIZE: 9px">
          </td>
          <td><input type="text" name='nnombreregion' size="30" maxlength="30" value=$resultados[region] style="FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif; FONT-SIZE: 9px">
          </td>
        </tr>
        <tr align="center" bgcolor=#ffffff>
          <td ColSpan="2" class="nota">Id. Regi&oacute;n debe ser valor comprendido entre 1 a 12, Regi&oacute;n Metropolitana debe ser RM</td>
        <tr><td height=15 ColSpan="2"></td></tr>
        <tr bgcolor="#ffffff">
          <td colspan="2" height="40">
             <div align="center">
               <input type="image" name="agregaregion" src="../imagenes/modificar.gif">
             </div>
          </td>
        </tr>
        <tr>
          <td colspan="2" height="30" bgcolor="#ffffff" align="right"><a href="javascript:history.back()"><img src="../imagenes/volver.gif" border="0"></a>
          </td>
        </tr>
        <tr><td height=5 ColSpan="2"></td></tr>
        <tr><td ColSpan="2" valign=middle background='../imagenes/linea.gif'></td></tr>
        </form>
      </table>
HTML;
     }
     mysql_free_result($con_region);
     mysql_close();
    echo "</td></tr>";
  }

  if ($HTTP_GET_VARS['accion']=="edita_region"){
   $id = $HTTP_POST_VARS['id'];
   $precede = $HTTP_GET_VARS['tabla'];
   // Convertir a Mayúsculas Nombre de la Región
      $nnombreregion = strtoupper($nnombreregion);


   mysql_query("UPDATE Region SET region='nnombregion' WHERE idreg='$id'") or DIE("Imposible Modificar Región .. !!!");
   mysql_close();
   header ("Location: $PHP_SELF?tabla=$precede");
   exit;
  }



   if ($HTTP_GET_VARS['accion'] == "agregar") {
       // Agregar Region
          echo "<tr><td ColSpan=2 height=25></td></tr>";
          echo "<tr><td valign=middle class=topmenu ColSpan=2><img src='../imagenes/linvert_acc.gif' border=0 align=center valign=middle>Agrega Region</td></tr>";
          echo "<tr><td ColSpan=2 valign=middle background='../imagenes/linea.gif'></td></tr>";
          echo "<tr><td height=15 ColSpan=2></td></tr>";
          echo "<tr><td ColSpan=2>";
          echo('  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">');
          echo "    <tr align=center bgcolor=#dde5f2>";
echo <<< HTML
                <form method="post" action="$PHP_SELF?tabla=region&accion=hacernuevo" onSubmit="return valida();" name="form">
                      <td>Id. Regi&oacute;n</td><td>Regi&oacute;n</td>
                    </tr>
                    <tr align="center" bgcolor=#eaeaea>
                      <td><input type="text" name='nroregion' size="2" maxlength="2" style="FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif; FONT-SIZE: 9px">&nbsp;</td>
                      <td><input type="text" name='nnombreregion' size="30" maxlength="30" style="FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif; FONT-SIZE: 9px">&nbsp;</td>
                    </tr>
                    <tr align="center" bgcolor=#ffffff>
                      <td ColSpan="2" class="nota">Id. Regi&oacute;n debe ser valor comprendido entre 1 a 12, Regi&oacute;n Metropolitana debe ser RM</td>
                    </tr>
                    <tr><td height=15 ColSpan="2"></td></tr>
                    <tr bgcolor="#ffffff">
                      <td colspan="2" height="40">
                        <div align="center">
                          <input type="image" name="agregaregion" src="../imagenes/agregar.gif"> 
                        </div>
                      </td>
                   </tr>
                   <tr>
                     <td colspan="2" height="30" bgcolor="#ffffff" align="right"><a href="javascript:history.back()"><img src="../imagenes/volver.gif" border="0"></a>
<!-- <a href="javascript:history.back()">Volver Atr&aacute;s</a> -->
                     </td>
                   </tr>
                    <tr><td height=5 ColSpan="2"></td></tr>
                    <tr><td ColSpan="2" valign=middle background='../imagenes/linea.gif'></td></tr>
                   </form>
                </table>
        </td>
      </tr>
HTML;
  }
 
  if ($HTTP_GET_VARS['accion'] == "hacernuevo") {
  // Agregar Region a Tabla de Regiones
    echo "<tr><td ColSpan=2 height=25></td></tr>";
    echo "<tr><td ColSpan=2>";

    // Chequear Variables
       if (strlen($nroregion) == 1) {
          $nroregion = "0".$nroregion;
       }

       if ($nroregion == "00"){
          $error_accion_ms = "El Id. de Región debe ser un valor comprendido entre 1 y 12 ..!!!";
          mensaje_error($error_accion_ms);
       } else {

         // Convertir a Mayúsculas Nombre de la Región
            $nnombreregion = strtoupper($nnombreregion);

        // Chequear en Tabla Region, existencia de dato a ingresar
           $con_region = mysql_query("SELECT idreg FROM Region WHERE idreg=$nroregion") Or DIE("Imposible Relizar Consulta en Tabla Regiones en este Momento ... Intente Nuevamente");

           if (mysql_num_rows($con_region) > 0) {
             // Región Existe en Tabla
                $error_accion_ms = "La Información que desea incorporar ha sido agregada previamente ..!!!";
                mensaje_error($error_accion_ms);  
           } else {
            //Agregar a Tabla Regiones
              $nnombreregion = strtoupper($nnombreregion);
              mysql_query("INSERT INTO Region(idreg,region) VALUES('$nroregion','$nnombreregion')") or DIE("Imposible Guardar Registro en Tabla de Regiones .. Ha Surgido un Problema Inesperado..!!");

             $aviso_accion_ms = "Se Ha Agregado la Siguiente Informaci&oacute;n: Regi&oacute;n ". $nroregion.",". $nnombreregion. " ";
             mensaje_aviso($aviso_accion_ms);
          }
          mysql_free_result($con_region);
        }
        echo "</td></tr>";
   }
}
echo <<< HTML
              <tr>
               <td width="450" height="5" ColSpan="2" valign="top"></td>
              </tr>
            </table>
          </td>
        </tr>
        <tr><td height="35"></td></tr>
      </table>
          <!-- FIN Sección Central - Carga de Actualizaciones -->
HTML;

  restoHTML();
}  
?>
