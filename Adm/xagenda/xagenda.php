<?

function cabeceraHTML()
{
echo <<< HTML
 <html>
 <head>
 <title>Gobierno Regional de Coquimbo -Agenda Intendente-</title>
 <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
 <link rel="STYLESHEET" type="text/css" href="estilo.css">
 <script src="../../js/browser.js"></script>
 <script src="../../js/util.js"></script>
 <script language="JavaScript">
 if(is_nav4up) {
   document.write('<link rel="stylesheet" href="../../css/gore/ns.css">');
 }
 if(is_ie4up) {
   document.write('<link rel="stylesheet" href="../../css/gore/ie.css">');
 }
 </script>
 </head>
 <body marginwidth="0" marginheight="0" leftmargin="0" topmargin="0">
HTML;
}


if (!$_POST && !$HTTP_GET_VARS){
        $tiempo_actual = time();
        $mes = date("n", $tiempo_actual);
        $ano = date("Y", $tiempo_actual);
        $dia=date("d");
        $fecha=$ano . "-" . $mes . "-" . $dia;
}else {
        $mes = $nuevo_mes;
        $ano = $nuevo_ano;
        $dia = $dia;
        $fecha=$ano . "-" . $mes . "-" . $dia;
}


if (isset($HTTP_GET_VARS['error'])){

$error_accion_ms[0]= "No se puede borrar la actividad, debe existir por lo menos una.<br>Si desea borrarlo, primero cree una nueva.";
$error_accion_ms[1]= "Faltan Datos.";
$error_accion_ms[2]= "Passwords no coinciden.";
$error_accion_ms[3]= "No es Correcto el Valor Hora.";
$error_accion_ms[4]= "La Actividad ya está registrada.";

$error_cod = $HTTP_GET_VARS['error'];
echo "<div align='center'>$error_accion_ms[$error_cod]</div><br>";

}

include("calendario.php");
include("../../conexbd/conexion.php");
include("config_diames.php");

 $myconn = @mysql_connect($servidor,$usuario,$password);
 if(!$myconn) { echo ('Imposible conectarse con MYSQL.'); exit();}
 if(!@mysql_select_db($base_de_datos)) { echo ('Imposible conectarse con la BD.'); exit();}


if (!isset($HTTP_GET_VARS['accion'])){

cabeceraHTML();
echo "<center><BR><table width=600 border=0 cellspacing=1 cellpadding=1 bgcolor=#666666>";
echo "<tr valign='top'><td class='tdnrm' width=65%>";

     /*   Conectar a Tabla de Agenda de Actividades de Intendente Regional   */
    $con_ag = mysql_query("SELECT agen_activ.id, agen_activ.idagenda, hora, actividad FROM agen_activ INNER JOIN agen_intendente ON agen_activ.idagenda=agen_intendente.id INNER JOIN idanomes ON agen_intendente.idanomes = idanomes.id WHERE idanomes.idano=$ano and idanomes.idmes=$mes and agen_intendente.dia=$dia ORDER BY hora") or DIE("Imposible Realizar Consulta en Tabla Agenda de Actividades de Intendente");



   echo "<table border=0 cellspacing=1 cellpadding=2>";
   echo "<tr>";

   $someYear = date('Y',mktime(0,0,0,$mes,$dia,$ano));
   $someMes  = date('n',mktime(0,0,0,$mes,$dia,$ano));
   $someDia  = date('d',mktime(0,0,0,$mes,$dia,$ano));
   $someDiaSem  = date('w',mktime(0,0,0,$mes,$dia,$ano));

   echo "</tr><tr><td ColSpan=2 bgcolor='#EAEAEA'><HR></td></tr>";
   echo "<td class='cabnrm'><B><I>$dNames[$someDiaSem] $someDia de $Nmes[$someMes] de $someYear</I></B></td>";
echo <<< HTML
     <td class='cabnrm'><a href="$PHP_SELF?accion=nuevo&dia=$dia&mes=$mes&ano=$ano">  Agregar Actividad [+]  </a></td>
HTML;

   echo "</tr><tr><td ColSpan=2 bgcolor='#EAEAEA'><HR></td></tr>";
   echo "</tr><tr><td ColSpan=2>&nbsp;</td></tr>";
  
   echo "<tr valign=top><td>";
   echo "<table border=0 cellspacing=1 cellpadding=1 width=100%>";
   echo "  <tr  valign=center align=left bgcolor='#EAEAEA'><td><B>Hora</B></td><td><B>Actividad</B></td><td ColSpan=2><B>Acci&oacute;n</B></td></tr>";
   echo "  <tr><td ColSpan=4 bgcolor='#EAEAEA'><HR></td></tr>";
   echo "  <tr><td ColSpan=4 bgcolor='#ffffff'></td></tr>";

   WHILE($rowag=mysql_fetch_array($con_ag))
   {
         echo "<tr><td ColSpan=4 bgcolor='#EAEAEA'><HR></td></tr>";
         echo "<tr valign=center>";
         echo "<td bgcolor='#dcdcdc'>&nbsp;<B> $rowag[hora]</B>&nbsp;</td>";
         echo "<td>$rowag[actividad]</td>";
echo <<< HTML
         <td bgcolor="#dcdcdc"><a href="$PHP_SELF?accion=borrar&id=$rowag[id]&hora=$rowag[hora]">  Eliminar  </a></td>
         <td bgcolor="#dcdcdc"><a href="$PHP_SELF?accion=modificar&id=$rowag[id]&hora=$rowag[hora]">  Modificar  </a></td>
HTML;
         echo "</tr>";
         echo "<tr><td ColSpan=4 bgcolor='#EAEAEA'><HR></td></tr>";
         echo "<tr><td ColSpan=4 bgcolor='#ffffff'></td></tr>";
   }
   echo "</table>";

echo "</td>";
echo "<td valign=top width=33%>";
/*Fecha Seleccionada <input type=text name=fecha value=$fecha><BR>";*/
echo mostrar_calendario($dia,$mes,$ano);
echo "</td></tr>";
echo "</table></center>";

mysql_free_result($con_ag);
mysql_close();

}

if (isset($HTTP_GET_VARS['id'])){

   if ($HTTP_GET_VARS['accion']=="borrar"){
	$id_borrar= $HTTP_GET_VARS['id'];
	mysql_query("DELETE FROM agen_activ WHERE id=$id_borrar") or die(mysql_error());
	mysql_close();

	header ("Location: $PHP_SELF");
	exit;

  }

  if ($HTTP_GET_VARS['accion']=="modificar"){ 
     $modi = $HTTP_GET_VARS['id'];
     $modh = $HTTP_GET_VARS['hora'];

/*     echo "ID: $modi --- --- HORA: $modh<BR>";   */

     $activ_consulta = mysql_query("SELECT id, idagenda, hora, actividad FROM agen_activ WHERE id='$modi' AND hora='$modh'") or die(mysql_error());
     
    cabeceraHTML();
    echo "<BR>";

    while($resultados = mysql_fetch_array($activ_consulta)) {

echo <<< HTML
      <form method="post" action="$PHP_SELF?accion=edita_actividad">
      <input type="hidden" name="id" value="$resultados[id]">
      <table width="400" border="0" cellspacing="1" cellpadding="4" align="center" bgcolor="#666666">
        <tr>
          <td colspan="2" height="30" bgcolor="#666666" align="center">
           <b><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#FFFFFF">.: Modificar Actividad :.</font></b>
          </td>
        </tr>
        <tr bgcolor="#dcdcdc">
          <td width="100" align="right">
            <font face="Verdana, Arial, Helvetica, sans-serif" size="2"><B>Hora:</B> </font>
          </td>
          <td width="300"><b><input type=text name=hora value=$resultados[hora]></b></td>
        </tr>
        <tr bgcolor="#dcdcdc">
          <td width="100" align="right"><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><B>Actividad :</B></font></td>
          <td width="300"><textarea name="actividad" rows="7" cols="6">$resultados[actividad]</textarea></td>
        </tr>
        <tr bgcolor="#dcdcdc">
          <td colspan="2" height="40">
            <div align="center">
              <input type="submit" name="Submit" value="  Actualizar  " class="botones" >
            </div>
          </td>
        </tr>
      </table>
      </form>
HTML;
    }
    mysql_free_result($activ_consulta);
    mysql_close();
  }
}

if ($HTTP_GET_VARS['accion']=="edita_actividad"){
   $id = $_POST['id'];

   mysql_query("UPDATE agen_activ SET hora='$hora', actividad='$actividad' WHERE id='$id'") or DIE(mysql_error());
   mysql_close();
  header ("Location: $PHP_SELF");
  exit;
}


/* *** *** *** *** *** *** *** *** *** *** *** */
/* *** Accion: Nueva Actividad             *** */
if ($HTTP_GET_VARS['accion']=="nuevo"){
  $dia=$HTTP_GET_VARS['dia'];
  $mes=$HTTP_GET_VARS['mes'];
  $ano=$HTTP_GET_VARS['ano'];
/*  echo " Dia: $dia -- Mes: $mes -- Año: $ano<BR>";  */
cabeceraHTML();
echo "<BR>";

echo <<< HTML
  <form method="post" action="$PHP_SELF?accion=hacernuevo">
   <input type="hidden" name="dia" value="$dia">
   <input type="hidden" name="mes" value="$mes">
   <input type="hidden" name="ano" value="$ano">
  
  <table width="400" border="0" cellspacing="1" cellpadding="4" align="center" bgcolor=#666666>
    <tr>
      <td colspan="2" height="30" bgcolor="#666666" align="center">
       <font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#FFFFFF"><B>.: Registrar Actividad :.</B></font>
      </td>
    </tr>
    <tr bgcolor="#dcdcdc">
      <td width="100" align="right">
        <font face="Verdana, Arial, Helvetica, sans-serif" size="2"><B>Hora:</B></font>
      </td>
      <td width="300"><b><input type="text" name="hora" size="5" maxlength="5"></b></td>
    </tr>
    <tr bgcolor="#dcdcdc">
      <td width="100" align="right"><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><B>Actividad:</B></font></td>
      <td width="300"><textarea name="actividad" rows="7" cols="6"></textarea></td>
    </tr>
    <tr bgcolor="#dcdcdc">
      <td colspan="2" height="40">
        <div align="center">
          <input type="submit" name="Submit" value="  Registrar Actividad  " class="botones" >
        </div>
      </td>
    </tr>
    <tr>
      <td colspan="2" height="30" bgcolor="#666666" align="left">
          <a href="javascript:history.back()">Volver Atr&aacute;s</a>
      </td>
    </tr>
  </table>
  </form>
HTML;
}


/* *** *** *** *** *** *** *** *** *** *** *** */
/* ***                                     *** */
if ($HTTP_GET_VARS['accion']=="hacernuevo"){

  $hora=$_POST["hora"];
  $actividad=$_POST["actividad"];
  $dia=$_POST["dia"];
  $mes=$_POST["mes"];
  $ano=$_POST["ano"];

/* echo "Hora: $hora -- Actividad: $actividad<BR>"; */

  if ($hora=="" or $actividad=="") {
  	 header ("Location: $PHP_SELF?accion=nuevo&error=1");
	 exit;
  }

  if (!eregi("[0-9][0-9]:[0-9][0-9]",$hora)){
  	 header ("Location: $PHP_SELF?accion=nuevo&error=3");
	 exit;
  }


  if($ano >= 2003){

    $conyear = mysql_query("SELECT id, idano, idmes FROM idanomes WHERE idano=$ano AND idmes=$mes") or DIE("Consultando mes y año");
    $rwyear=mysql_num_rows($conyear);

    if ($rwyear != 0){
       $infoyear = mysql_fetch_array($conyear);
       $id = $infoyear["id"];


    mysql_free_result($conyear);
    $conmes = mysql_query("SELECT id, idanomes, dia FROM agen_intendente WHERE idanomes='$id' AND dia='$dia'") or DIE(mysql_error());
    $rwmes = mysql_num_rows($conmes);

       if ($rwmes != 0) {
          $infomes = mysql_fetch_array($conmes);
          $ag_int = $infomes["id"];
          $iddia = $infomes["dia"];
       }
       else
       {
         /* *** *** No se Encontró día *** *** */
         mysql_query("INSERT INTO agen_intendente(idanomes, dia) VALUES('$id','$dia')") or DIE(mysql_error());

        $conmes1 = mysql_query("SELECT id, idanomes, dia FROM agen_intendente WHERE idanomes='$id' AND dia='$dia'") or DIE(mysql_error());
       $rwmes = mysql_num_rows($conmes1);

       if ($rwmes != 0) {
          $infomes = mysql_fetch_array($conmes1);
          $ag_int = $infomes["id"];
          $iddia = $infomes["dia"];
       }
       mysql_free_result($conmes1);
       }
       mysql_free_result($conmes);
    }
    else
    {
      /* *** *** No Encontró Año/Mes *** *** */
      mysql_query("INSERT INTO idanomes(id, idano, idmes) VALUES('$ano','$mes')") or DIE("Insertando Año/Mes");

     $conyear1 = mysql_query("SELECT id, idano, idmes FROM idanomes WHERE idano=$ano AND idmes=$mes") or DIE("Consultando mes y año");
    $rwyear=mysql_num_rows($conyear1);

    if ($rwyear != 0){
       $infoyear = mysql_fetch_array($conyear1);
       $id = $infoyear["id"];
    }

    }

    $activ_consulta = mysql_query("SELECT agen_activ.id, agen_activ.idagenda FROM agen_activ INNER JOIN agen_intendente ON agen_activ.idagenda=agen_intendente.id INNER JOIN idanomes ON agen_intendente.idanomes=idanomes.id WHERE hora='$hora' AND actividad='$actividad' AND agen_intendente.dia=$dia AND idanomes.idano=$ano AND idanomes.idmes=$mes") or die(mysql_error());

    $total_encontrados = mysql_num_rows ($activ_consulta);
    mysql_free_result($activ_consulta);

    if ($total_encontrados != 0) {
    	 header ("Location: $PHP_SELF?accion=nuevo&error=4");
	 exit;
    }

    mysql_query("INSERT INTO agen_activ(idagenda,hora,actividad) values('$ag_int','$hora','$actividad')") or die(mysql_error());
    mysql_close();
  }

  header ("Location: $PHP_SELF");
  exit;
}
?>
</body>
</html>
