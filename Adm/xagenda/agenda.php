<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2//EN">
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

<div align="center">
<?
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


if(!(isset($accion))){
echo "<BR><table width=650 border=0 cellspacing=1 cellpadding=1>";
echo "<tr valign='top'><td class='tdnrm' width=65%>";
     $myconn = @mysql_connect($servidor,$usuario,$password);
     if(!$myconn) { echo ('Imposible conectarse con MYSQL.'); exit();}
     if(!@mysql_select_db($base_de_datos)) { echo ('Imposible conectarse con la BD.'); exit();}

     /*   Conectar a Tabla de Agenda de Actividades de Intendente Regional   */
    $con_ag = mysql_query("SELECT hora, actividad FROM activ_agenda INNER JOIN agenda ON activ_agenda.idag=agenda.idag INNER JOIN anomes ON agenda.idano = anomes.idano where anomes.ano=$ano and anomes.mes=$mes and agenda.dia=$dia ORDER BY hora") or DIE("Imposible Realizar Consulta en Tabla Agenda de Actividades de Intendente");


   echo "<table border=0 cellspacing=0 cellpadding=0>";
   echo "<tr>";

   $someYear = date('Y',mktime(0,0,0,$mes,$dia,$ano));
   $someMes  = date('n',mktime(0,0,0,$mes,$dia,$ano));
   $someDia  = date('d',mktime(0,0,0,$mes,$dia,$ano));
   $someDiaSem  = date('w',mktime(0,0,0,$mes,$dia,$ano));

   echo "</tr><tr><td bgcolor='#EAEAEA'><HR></td></tr>";
   echo "<td class='cabnrm'><B><I>$dNames[$someDiaSem] $someDia de $Nmes[$someMes] de $someYear</I></B></td>";
   echo "</tr><tr><td bgcolor='#EAEAEA'><HR></td></tr>";
   echo "</tr><tr><td>&nbsp;</td></tr><tr>";

   echo "<tr><td>";
   if($rowag=mysql_fetch_array($con_ag)){

   echo "<table border=0 cellspacing=1 cellpadding=1>";
   echo "<tr><td ColSpan=4>";
/*    echo('<FORM ACTION="'.$PHP_SELF.'?dia='.$dia.'&nuevo_mes='.$mes.'&nuevo_ano='.$ano.'"  METHOD="POST">');  */
  
   echo "</td></tr>";
   echo "<tr><td>Hora</td><td>Actividad</td><td ColSpan=2>Acci&oacute;n</td></tr>";

     DO
       {
         $actividad = $rowag["actividad"];
         $hora = $rowag["hora"];
         echo "<input type=hidden name=f_hora value=$hora>";
         echo "<input type=hidden name=f_acti value=$actividad>";
         echo "<tr>";
         echo "<td bgcolor='#dcdcdc'><B>$hora</B>";
         echo "<td bgcolor='#dcdcdc'>$actividad</td>";
         echo "<td bgcolor='#EAEAEA'>";

         echo <<< HTML
         <a href="$PHP_SELF?dia=$dia&nuevo_mes=$mes&nuevo_ano=$ano&f_hora=$hora&f_acti=$actividad&accion='borrar'" class=boton tabindex='2' onMouseOver='inset(this, 1)' onMouseOut='outset(this,1)'>  Eliminar  </a></td>
         HTML;


/*         echo "<input type=submit name=accion value='  Elimina  ' class=boton tabindex='4' onMouseOver='inset(this, 1)' onMouseOut='outset(this,1)'></td>";  
*/
         echo "<td bgcolor='#EAEAEA'>";

         echo <<< HTML
              <a href="$PHP_SELF?dia=$dia&nuevo_mes=$mes&nuevo_ano=$ano&f_hora=$hora&f_acti=$actividad&accion='modificar'" class=boton tabindex='2' onMouseOver='inset(this, 1)' onMouseOut='outset(this,1)'>  Modificar  </a></td>
         HTML;



/*         echo "<input type=submit name=accion value='  Modifica  ' class=boton tabindex='4' onMouseOver='inset(this, 1)' onMouseOut='outset(this,1)'></td>";  
*/

         echo "</tr>";

         echo "</tr><tr><td bgcolor='#cdcdcd' ColSpan=4></td></tr>";
         

       }
     WHILE($rowag=mysql_fetch_array($con_ag));
/*     echo "</FORM>";  */
     echo "</table>";
   }
   echo "</td></tr>";
   echo "<td></td></tr></table>";

/*      mysql_free_result($rowag);  */
      /*mysql_close($con_ag);*/
   

echo "</td>";
echo "<td width=33%>";
/*Fecha Seleccionada <input type=text name=fecha value=$fecha><BR>";*/
echo mostrar_calendario($dia,$mes,$ano);
echo "</td></tr>";
echo "</table>";

}
else
{
 // Presionastes algun boton
 if($accion=='  Elimina  ')
 { //Elimina Registro<BR>
   echo "<table border=0 cellspacing=1 cellpadding=1>";
   echo "  <tr><td>Hora:</td><td>$f_hora</td></tr>";
   echo "  <tr><td>Actividad:</td><td>$f_acti</td></tr>";
   echo "  <tr><td ColSpan=2><HR></td></tr>";
   echo "  <tr><td ColSpan=2>Esta actividad Ha Sido Eliminada de la Agenda del Intendente</td></tr>";
   echo "</table>";
   echo "<BR>";
   echo "<p align=center><a href='javascript:window.history.back()'> Volver Atr&aacute;s  </a></p>";

 }
 if(accion=='  Modificar  '){ echo "Modifica Registro<BR>";}

 $mes = $nuevo_mes;
 $ano = $nuevo_ano;
 $dia = $dia;
 $fecha=$ano . "-" . $mes . "-" . $dia;
/*   Header("Location: '.$PHP_SELF.' " );  */

}
?>
</div>


</body>
</html>
