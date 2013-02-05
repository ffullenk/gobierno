<?
  //Conectar a Base de Datos
  include("../conexion.php");
  $link = Conexion();

  // Constatar logeo previo
//  include("../admxsesion.php");

//  if($loginCorrecto)
//  {
        // Se Había Logeado Previamente
echo <<< HTML

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2//EN">
<html>
<head>
<title>Administración Sitio Web gorecoquimbo.cl</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="STYLESHEET" type="text/css" href="../css_adm.css">
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
<body marginwidth="0" marginheight="0" leftmargin="0" topmargin="0" bgcolor="#cdcdcd">

<div align="center">
HTML;


include("calendario.php");
include("../../conexbd/conexion.php");

    $dNames[0] = "Domingo";
    $dNames[1] = "Lunes";
    $dNames[2] = "Martes";
    $dNames[3] = "Mi&eacute;rcoles";
    $dNames[4] = "Jueves";
    $dNames[5] = "Viernes";
    $dNames[6] = "S&aacute;bado";

    $Nmes[1] = "Enero";
    $Nmes[2] = "Febrero";
    $Nmes[3] = "Marzo";
    $Nmes[4] = "Abril";
    $Nmes[5] = "Mayo";
    $Nmes[6] = "Junio";
    $Nmes[7] = "Julio";
    $Nmes[8] = "Agosto";
    $Nmes[9] = "Septiembre";
    $Nmes[10] = "Octubre";
    $Nmes[11] = "Noviembre";
    $Nmes[12] = "Diciembre";



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

echo "<BR><table width=450 border=0 cellspacing=1 cellpadding=1 bgcolor=#666666>";
echo "<tr valign='center'><td class='cabnrm' ColSpan='2' align='center' height='35'>";

   $someYear = date('Y',mktime(0,0,0,$mes,$dia,$ano));
   $someMes  = date('n',mktime(0,0,0,$mes,$dia,$ano));
   $someDia  = date('d',mktime(0,0,0,$mes,$dia,$ano));
   $someDiaSem  = date('w',mktime(0,0,0,$mes,$dia,$ano));

   echo "<table width=450 border=0 cellspacing=1 cellpadding=1 bgcolor=#eeeeee>";
   echo "<tr valign=center align=center><td class='cabnrm'>";
   echo "<B><I>$dNames[$someDiaSem] $someDia de $Nmes[$someMes] de $someYear</I></B></td>";
   echo "</td></tr>";
   echo "</table>";

echo "</td></tr>";


     $myconn = @mysql_connect($servidor,$usuario,$password);
     if(!$myconn) { echo ('Imposible conectarse con MYSQL.'); exit();}
     if(!@mysql_select_db($base_de_datos)) { echo ('Imposible conectarse con la BD.'); exit();}

     /*   Conectar a Tabla IDANOMES   */
    $con_idanomes = mysql_query("SELECT idano, idmes FROM idanomes WHERE idano=$ano AND idmes=$mes") or DIE(mysql_error());

    if(!($rw_idanomes = mysql_fetch_array($con_idanomes)))
    {
      /* No Existe mes actual en tabla */
      /* Desde 1 de Enero de 2003 en adelante */
      if($ano >= 2003){
         mysql_query("INSERT INTO idanomes(idano,idmes) VALUES('$ano', '$mes')") or DIE(mysql_error());
      }
    }
/*   else
    { */
      /* Existe el mes actual en tabla */

      /* ***************************** */
      /* Conocer Valor de U.F. del día */
      /* ***************************** */

     $con_uf = mysql_query("SELECT valor FROM valor_uf INNER JOIN idanomes ON valor_uf.idanomes = idanomes.id WHERE idanomes.idano=$ano AND idanomes.idmes=$mes AND dia=$dia") or DIE("Imposible Consultar por Valor de UF");

     if($rowuf=mysql_fetch_array($con_uf)){
       $ufdia=$rowuf["valor"];
       $ufdia = number_format($ufdia,2,',','.');
     }
     mysql_free_result($con_uf);


     /* ***************************** */
     /* Conocer Valor de I.V.P.       */
     /* ***************************** */

     $con_ivp =  mysql_query("SELECT valor FROM valor_ivp INNER JOIN idanomes ON valor_ivp.idanomes = idanomes.id WHERE idanomes.idano=$ano AND idanomes.idmes=$mes AND dia=$dia") or DIE("Imposible Consultar por Valor de IVP");

    if($rowivp=mysql_fetch_array($con_ivp)){
      $ivp=$rowivp["valor"];
      $ivp = number_format($ivp,2,',','.');
    }
    mysql_free_result($con_ivp);


    /* ***************************** */
    /* Conocer Valor Dólar Observado */
    /* ***************************** */
    $con_dlrob = mysql_query("SELECT valor from valor_dolar INNER JOIN idanomes ON valor_dolar.idanomes= idanomes.id WHERE dia=$dia AND idanomes.idano=$ano AND idanomes.idmes=$mes") or DIE("Imposible Consultar por Valor del Dolar Observado");

    if($rowdlrob=mysql_fetch_array($con_dlrob)){
      $dlrob=$rowdlrob["valor"];
      $dlrob = number_format($dlrob,2,',','.');
    }
    mysql_free_result($con_dlrob);
 

    /* ***************************** */
    /* Conocer Valor U.T.M Mensual   */
    /* ***************************** */
    $con_utm = mysql_query("SELECT valor, mes from utmv WHERE idano=$ano and mes=$mes") or DIE("Imposible Consultar por U.T.M");


    if($rowutm=mysql_fetch_array($con_utm)){
      $utm=$rowutm["valor"];
      $mesutm=$rowutm["mes"];
      $utm = number_format($utm,2,',','.');
    }
    mysql_free_result($con_utm);

    mysql_close($myconn);


  echo "<tr valign='center' align='center'><td class='tdnrm'>";

    echo "<br>";
/* <FORM ACTION="$PHP_SELF?" METHOD="POST"> */

    echo('<FORM ACTION="'.$PHP_SELF.'?dia='.$dia.'&nuevo_mes='.$mes.'&nuevo_ano='.$ano.'"  METHOD="POST">');
    echo "<input type=hidden name=f_mes value=$mes>";
    echo "<input type=hidden name=f_ano value=$ano>";
    echo "<input type=hidden name=f_dia value=$dia>";

    echo "<table border='0' cellpadding='0' cellspacing='0'>";
    echo "  <tr><td align='center' class='graybg'>";
    echo "        <table border='0' cellpadding='1' cellspacing='1' width='100%'>";
    echo "          <tr>";

    echo "            <td class='cabnrm' align='left' width='85%'>D&oacute;lar Observado</td>";
    echo "            <td class='tdnrm' align='left' width='15%'><input type=text name=f_dolar value=$dlrob></td>";
    echo "          </tr>";

    echo "          <tr>";
    echo "            <td class='cabnrm' align='left' width='85%'>Unidad de Fomento (U.F.)</td>";
    echo "            <td class='tdnrm' align='left' width='15%' ><input type=text name=f_uf value=$ufdia></td>";
    echo "          </tr>";

    echo "          <tr>";
    echo "            <td class='cabnrm' align='left' width='85%'>&Iacute;ndice Valor Promedio (I.V.P)</td>";
    echo "            <td class='tdnrm' align='left' width='15%' ><input type=text name=f_ivp value=$ivp></td>";
    echo "          </tr>";

    echo "          <tr>";
    echo "            <td class='cabnrm' align='left' width='85%'>Unidad Tributaria Mensual (U.T.M) Mes $Nmes[$mesutm]</td>";
    echo "            <td class='tdnrm' align='left' width='15%' ><input type=text name=f_utm value=$utm></td>";
    echo "          </tr>";
    echo "          <tr>";
    echo "            <td class='tdnrm' align='center' ColSpan='2' height='35'><input type=submit name=actvalecon class=boton tabindex='4' onMouseOver='inset(this, 1)' onMouseOut='outset(this,1)' value='  Actualizar Valores  '></td>";
    echo "          </tr>";
    echo "        </table>";
    echo "  </td></tr>";
    echo "</table>";
    echo "</FORM>";
    echo "<br>";
echo "</td>";

echo "<tr valign='middle' align='center'><td class='tdnrm'><br>";
echo mostrar_calendario($dia,$mes,$ano);
echo "<br></td></tr>";
echo "</table>";


   if(isset($actvalecon))
   {
     $myconn = @mysql_connect($servidor,$usuario,$password);
     if(!$myconn) { echo ('Imposible conectarse con MYSQL.'); exit();}
     if(!@mysql_select_db($base_de_datos)) { echo ('Imposible conectarse con la BD.'); exit();}


     $idfecha = mysql_query("SELECT id FROM idanomes WHERE idano=$f_ano AND idmes=$f_mes") or DIE(mysql_error());
     if($rwidfecha = mysql_fetch_array($idfecha))
     {
       $anomes = $rwidfecha["id"];

       /* *** Actualiza Inserta Valor UF  *** */
       if ($f_uf <> $ufdia)
       { // Cambiastes UF
         $iduf = mysql_query("SELECT valor FROM valor_uf WHERE idanomes=$anomes AND dia=$f_dia") or DIE(mysql_error());
         if($rwiduf = mysql_fetch_array($iduf))
         {
           // Actualizo UF
           mysql_query("UPDATE valor_uf set valor=$f_uf WHERE idanomes=$anomes AND dia=$f_dia") or DIE(mysql_error());
         }
         else
         {
           // Inserto Valor UF
           mysql_query("INSERT INTO valor_uf(idanomes,dia,valor) VALUES($anomes,$f_dia,$f_uf)") or DIE(mysql_error());
         }
         mysql_free_result($iduf);
       }

       /* *** Actualiza Inserta Valor Dolar  *** */
       if ($f_dolar <> $dlrob)
       { // Cambiastes Dolar Observado
         $iddolarob = mysql_query("SELECT valor FROM valor_dolar WHERE idanomes=$anomes AND dia=$f_dia") or DIE(mysql_error());
         if($rwiddolarob = mysql_fetch_array($iddolarob))
         {
           // Actualizo Dolar
           mysql_query("UPDATE valor_dolar set valor=$f_dolar WHERE idanomes=$anomes AND dia='$f_dia'") or DIE(mysql_error());
         }
         else
         {
           // Inserto Valor Dolar
           mysql_query("INSERT INTO valor_dolar(idanomes,dia,valor) VALUES($anomes,$f_dia,$f_dolar)") or DIE(mysql_error());

         }
         mysql_free_result($iddolarob);
       }

       /* *** Actualiza Inserta Valor IVP  *** */
       if ($f_ivp <> $ivp)
       {
          // Cambiastes IVP
         $idivp = mysql_query("SELECT valor FROM valor_ivp WHERE idanomes=$anomes AND dia=$f_dia") or DIE(mysql_error());
         if($rwidivp = mysql_fetch_array($idivp))
         {
           // Actualizo IVP
           mysql_query("UPDATE valor_ivp set valor=$f_ivp WHERE idanomes=$anomes AND dia='$f_dia'") or DIE(mysql_error());
         }
         else
         {
           // Inserto Valor IVP
           mysql_query("INSERT INTO valor_ivp(idanomes,dia,valor) VALUES($anomes,$f_dia,$f_ivp)") or DIE(mysql_error());

         }
         mysql_free_result($idivp);
       }

       /* *** Actualiza Inserta Valor UTM  *** */
       if ($f_utm <> $utm)
       {
         // Cambiastes UTM
         $idutm = mysql_query("SELECT valor FROM utmv WHERE idano=$f_ano AND mes=$f_mes") or DIE(mysql_error());
         if($rwidutm = mysql_fetch_array($idutm))
         {
           // Actualizo UTM
           mysql_query("UPDATE utmv set valor=$f_utm WHERE idano=$f_ano AND mes='$f_mes'") or DIE(mysql_error());
         }
         else
         {
           // Inserto Valor UTM
           mysql_query("INSERT INTO utmv(idano,mes,valor) VALUES($f_ano,$f_mes,$f_utm)") or DIE(mysql_error());

         }
         mysql_free_result($idutm);
       }
       echo "Para el mes $f_mes del año $f_ano";
     }
     mysql_free_result($idfecha);
     mysql_close($myconn);
   }

echo <<< HTML
</div>


</body>
</html>
HTML;

//}
//else
//{
        // Nunca Se Logeo
//        echo "Logeate primero puh ...";
//}

?>
