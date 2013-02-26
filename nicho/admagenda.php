<?php
session_start();
umask(0);
 include("conecta.php");
$link = Conexion();
$legal_require_php = "k28stv7s4";
global $global_qk;
$global_qk=0;
include("detectuser.php");

include("calendario.php");

global $tiempo_actual, $mes, $ano, $dia, $fecha, $nuevo_mes, $nuevo_ano, $fecha_;

function znsuperior() {
global $global_qk, $loginCorrecto;
global $tiempo_actual, $mes, $ano, $dia, $fecha, $nuevo_mes, $nuevo_ano, $fecha_;
?>
<html>
<head>
<title>Administraci&oacute;n de www.gorecoquimbo.cl</title>
<script language="JavaScript" src="../js/newgore.js" type="text/javascript"></script>
<script language="JavaScript" type="text/javascript">
function vldag() {
  if(document.form.titulo.value == '')
  {
    document.form.titulo.focus();
    alert('Debe especificar un Titulo para esta Actividad');
    return false;
  }
  if(document.form.descripcion.value == '')
  {
    document.form.descripcion.focus();
    alert('Debe Describir la Actividad Ha Desarrollarse');
    return false;
  }
  else
  {
    document.form.submit();
    return true;
  }
}   
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<STYLE type="text/css">
html,body {
	height: 100%;
	font-family: Tahoma, Verdana, Arial;
	font-size: 10px;
}
td, th {
	font-family: Tahoma, Verdana, Arial;
	font-size: 11px;
}
a {
	font-family: Tahoma, Verdana, Arial;
	font-size: 11px;
	color: #388BE8;
	text-decoration: none;
}
a:hover {
	font-family: Tahoma, Verdana, Arial;
	font-size: 11px;
	color: #87AC1;
	text-decoration: underline;
}
.textform, textarea {
	font-family: Tahoma, Verdana, Arial;
	font-size: 11px;
	border:1px dotted black;
	color: #666;
}
.selectform {
	font-family: Tahoma, Verdana, Arial;
	font-size: 10px;
	font-weight: normal;
	background-color: #FFFFFF;
	color: #000000;
	border-style: none;
	border-width: 0;
	width: 200px;
}
.boton {
	font-family: Tahoma, Verdana, Arial;
	font-size: 11px;
	font-weight: bold;
	color: #FFFFFF;
	background-color: #0098E1;
	margin:2px;
	border:2px ridge #003399;
}
/* Calendario Agenda de Actividades Intendente */
.altn
{
      font-family : verdana,arial,helvetica;
      font-size : 7pt;
      color: #ffffff;
      background-color: #cdcdcd
}

.tit
     {
      font-family : verdana,arial,helvetica;
      font-size : 7pt;
      color: #ffffff;
      background-color: #FFB252;
      font-weight: bold;
     }

.fs
    {
     font-family : verdana,arial,helvetica;
     background-color:  #C30000;
     color:#FFFFFF;
     font-size: 7pt;
     font-weight: bold;
     text-align:center
    }

.da
    {
     font-family : verdana,arial,helvetica;
     background-color: #FFB252;
     font-size: 7pt;
     color: #FFFFFF;
     font-weight: bold;
     text-align: center
    }
.normal {
     font-family : verdana,arial,helvetica;
     background-color: #FFFFFF;
     font-size: 7pt;
     color: #333333;
     font-weight: normal;
     text-align: center
    }
.dia{
	font-family: Tahoma, Verdana, Arial;
	font-size: 11px;
	color: #333;
	text-decoration: none;
}
.dia:hover {
	font-family: Tahoma, Verdana, Arial;
	font-size: 11px;
	color: #666;
	text-decoration: underline;
}

</STYLE>
</head>
<body>
<table width="750" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td bgcolor="#F2EEDB">&nbsp;</td>
  </tr>
</table>

<table width="750" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td bgcolor="#E5E5E5">&nbsp;</td>
  </tr>
</table>
<table width="750" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td align="right" bgcolor="#E5E5E5" valign="middle"> 
      <form action="logout.php" method="post">
	    <input type="hidden" name="global_qk" value="<?php echo $global_qk; ?>" />
	    <input type="submit" name="checkout"  class="boton" value="Cerrar Sesi&oacute;n  " />
	</form>
      &nbsp;&nbsp;&nbsp;</td>
	
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<br />
<table width="750" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="750" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="175" valign="top">
<table width="170" border="0" cellpadding="0" cellspacing="0" bgcolor="#E7E7B8">
              <tr> 
                <td><table width="170" border="0" cellpadding="0" cellspacing="0">
                    <tr> 
                      <td><div class="btn_men-ppal">Administraci&oacute;n Sitio</div></td>
                    </tr>
                    <tr> 
                      <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablemenppal">
                          <tr> 
                            <td>&nbsp;<a href="admservicios.php" class="enlace">Adm. 
                              Servicios P&uacute;blicos</a></td>
                          </tr>
                          <tr> 
                            <td>&nbsp;<a href="admagenda.php" class="enlace">Adm. Calendario Intendente</a></td>
                          </tr>
                          <tr> 
                            <td>&nbsp;<a href="admgober.php" class="enlace">Adm. Gobernadores Provinciales</a></td>
                          </tr>
                          <tr> 
                            <td>&nbsp;<a href="admconcurso.php" class="enlace">Adm. Concursos P&uacute;blicos</a></td>
                          </tr>
                          <tr> 
                            <td>&nbsp;<a href="admevento.php" class="enlace">Adm. Eventos Gobierno</a></td>
                          </tr>
                          <tr> 
                            <td>&nbsp;<a href="admalcaldes.php" class="enlace">Adm. 
                              Alcaldes de la Regi&oacute;n</a></td>
                          </tr>
                          <tr> 
                            <td>&nbsp;<a href="admconcejo.php" class="enlace">Adm. Concejales de la Regi&oacute;n</a></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td>&nbsp;</td>
              </tr>
              <tr> 
                <td>&nbsp;</td>
              </tr>
            </table>
          </td>
          <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td bgcolor="#F2EEDB" ><div id="mencab"><span class="info">Administraci&oacute;n 
                    de <strong><a href="<? $PHP_SELF?>?act=I" class="enlace">Agenda 
                    de Actividades Intendente</a></strong></span></div></td>
              </tr>
              <tr> 
                <td align="right"><span class="info"><a href="<? $PHP_SELF?>?act=k&fecha_=<?php echo $fecha_;?>" class="boton">Agregar 
                  Actividad [+]</a>&nbsp;&nbsp;</span></td>
              </tr>
              <tr> 
                <td>&nbsp;</td>
              </tr>
<?php
}


function znbaja() {
global $global_qk, $loginCorrecto;
global $tiempo_actual, $mes, $ano, $dia, $fecha, $nuevo_mes, $nuevo_ano, $fecha_;
?>
            </table></td>
        </tr>
      </table></td>
  </tr>
</table>
<br />
<table width="750" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div id="mencab"><span class="texto"><strong>www.gorecoquimbo.cl</strong> Sitio desarrollado por Luis Jim&eacute;nez Villalobos para visualizarse en resoluci&oacute;n de 800x600 o superior.</span></div></td>
  </tr>
</table>
</body>
</html>
<?php
}

if( $_SESSION['logeado'] ) {

if ( ( !$_GET[act] ) || ( $_GET[act] == "I" ) ) {
if(!isset($nuevo_mes)) {
        $tiempo_actual = time();
        $mes = date("n", $tiempo_actual);
		$me2 = date("m", $tiempo_actual);
        $ano = date("Y", $tiempo_actual);
        $dia=date("d");
        $fecha=$ano . "-" . $mes . "-" . $dia;
		$fecha_ = $dia ."/". $me2 ."/". $ano;
}else {
        $mes = $nuevo_mes;
        $ano = $nuevo_ano;
        $dia = $dia;
        $fecha=$ano . "-" . $mes . "-" . $dia;
		if($dia < 10 ) { $di2 = 0 . $dia; } else { $di2 = $dia; }
		if($mes < 10 ) { $me2 = 0 . $mes; } else { $me2 = $mes; }
		$fecha_ = $di2 ."/". $me2 ."/". $ano;
}
znsuperior();
?>
			  <!-- COMIENZO: Fila Principal Administracion -->
              <tr> 
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0" summary="Tabla Principal de Administracion">
                    <tr>
                      <td>
					     <table width="100%" border="0" cellspacing="0" cellpadding="0">
						   <tr>
						      <td>
					             <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tablecat">
<tr>
<td valign="top">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><th align="left">Actividades del D&iacute;a <font color="#666666"><?php echo $fecha_;?></font></th></tr>
<tr><td height="15"></td></tr>

<?php
$res=mysql_query("SELECT id, hora, titulo, DATE_FORMAT(fecha,'%d-%m-%y') as fecha FROM calendario WHERE fecha='$fecha'") or die(mysql_error());
while($fila=mysql_fetch_object($res)) { ?>
<tr>
<td> 
<table width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#F2EEDB">
<tr><th bgcolor="#FFFFFF" width="5%"><font color="#666666">Hora</font></th><th bgcolor="#FFFFFF"><font color="#666666">T&iacute;tulo</font></th></tr>
<tr><td bgcolor="#FFFFFF"><font color="#666666"><?php echo $fila->hora;?></font></td><td bgcolor="#FFFFFF"><font color="#333333"><?php echo $fila->titulo;?></font></td></tr>
<tr><td align="center" valign="middle" colspan="2"><a href="<?php $PHP_SELF?>?act=m&id=<?php echo $fila->id;?>">Modificar</a> &nbsp;&nbsp; <a href="<?php $PHP_SELF?>?act=e&id=<?php echo $fila->id;?>">Eliminar</a></td></tr>
</table>
</td>
</tr>
<tr><td height="15"></td></tr>
<?php }
mysql_free_result($res); 
mysql_close($link);?>
</table>
</td>
<td align="right" valign="top"><?php echo mostrar_calendario($dia,$mes,$ano);?></td>
</tr>
<!-- -->                         </table>
							  </td>
						   </tr>
                    <tr><td height="10" bgcolor="#F2EEDB" valign="middle"><div id="lin-base">
                     </div></td></tr>
					     </table>
					  </td>
                    </tr>
                  </table></td>
              </tr>
			  <!-- FIN: Fila Principal Administracion -->
<?php
znbaja();
}


if( $_GET[act] == "k" )
{
znsuperior();
?>
			  <!-- COMIENZO: Fila Principal Administracion -->
              <tr> 
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0"summary="Tabla Principal de Administracion">
                    <tr>
                      <td>
					     <table width="100%" border="0" cellspacing="0" cellpadding="0">
						   <tr>
						      <td>
					             <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F2EEDB">
                                   <tr> 
                                      <td align="center" class="vdestacado">Formulario Crear Actividad en Agenda del Intendente</td>
                                   </tr>
                                   <tr><td>&nbsp;</td></tr>
                                   <tr> 
                                      <td align="center" valign="middle"> 
                                        <table width="65%" border="0" cellpadding="0" cellspacing="1" bgcolor="#D8CA94">
                                          <tr>
                                             <td bgcolor="#FFFFFF">
                                              <form action="<? $PHP_SELF ?>?act=g" method="post" name="form" id="form" onSubmit="return vldag();">
                                              <input type="hidden" name="global_qk" value="<?php echo $global_qk;?>">
											  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff" class="tableamd">
                                                <tr> 
                                                  <td width="35%" height="5" class="texto"></td>
                                                  <td width="65%"></td>
                                                </tr>
												<tr>
												   <td>&nbsp;Fecha:</td>
												   <td>
<?php
// Obtener Hora
   $horanow = getdate();
   $hora = $horanow[hours].":".$horanow[minutes]; ?>
                                                      <input name="fecha" type="text" value="<?php echo $fecha_;?>" size="14" maxlength="10" onFocus="if(this.value=='<?php echo $fecha_;?>')this.value='';" onBlur="if(this.value=='')this.value='<?php echo $fecha_;?>';" onChange="return validar(this.form.fecha.value);"> 
											</tr>
<tr>
   <td>&nbsp;Hora:</td>
   <td><input type="text" name="hora" value="<?php echo $hora;?>" size="5" maxlength="5"></td>
</tr>

                                                <tr><td class="texto" colspan="2">&nbsp;T&iacute;tulo Actividad:</td></tr>
                                                <tr><td class="texto" colspan="2" align="center"><input name="titulo" type="text" id="titulo" size="45" class="textform" maxlength="128" /></td></tr>
                                                <tr><td colspan="2" height="5">&nbsp;</td></tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Descripci&oacute;n Actividad:</td>
                                                  <td align="left">&nbsp;</td>
                                                </tr>
												<tr><td colspan="2" align="center"><textarea name="descripcion" cols="65" rows="10"></textarea></td></tr>
                                                <tr><td colspan="2" height="5">&nbsp;</td></tr> 
                                                <tr> 
                                                  <td class="texto">&nbsp;Contacto Actividad:</td>
                                                  <td align="left"><input name="contacto" type="text" id="contacto" size="45" class="textform" maxlength="128" /></td>
                                                </tr>
                                                <tr><td colspan="2" height="5">&nbsp;</td></tr>                                                <tr> 
                                                  <td class="texto">&nbsp;Email Contacto Actividad:</td>
                                                  <td align="left"><input name="email" type="text" id="email" size="45" class="textform" maxlength="128" /></td>
                                                </tr>
                                                <tr><td colspan="2" height="5">&nbsp;</td></tr>                                                <tr> 
                                                  <td class="texto">&nbsp;Tel&eacute;fono Contacto Actividad:</td>
                                                  <td align="left"><input name="fono" type="text" id="fono" size="32" class="textform" maxlength="32" /></td>
                                                </tr>
                                                <tr><td colspan="2" height="5">&nbsp;</td></tr>                                                <tr> 
                                                  <td class="texto">&nbsp;Sitio Web Relacionado con Actividad:</td>
                                                  <td align="left"><input name="web" type="text" id="web" size="45" class="textform" maxlength="128" /></td>
                                                </tr>
                                                <tr><td colspan="2" height="5">&nbsp;</td></tr>
                                                <tr> 
                                                  <td colspan="2" align="center" valign="middle">
                                                    <input name="crear" type="submit" id="crear" class="boton" value="Crear Actividad" />
                                                  </td>
                                                </tr>
                                              </table>
                                              </form>
                                             </td>
                                          </tr>
                                        </table>
                                      </td>
                                   </tr>
                                   <tr>
						             <td height="10" bgcolor="#F2EEDB" valign="middle">
					               </td>
						   </tr>
					     </table>
					  </td>
                    </tr>
                  </table></td>
              </tr>
			  <!-- FIN: Fila Principal Administracion -->
<?php
znbaja();
}


if( $_GET[act] == "g" )
{
//Chequeamos que la categoria no haya sido ingresado previamente
$vtitu = trim( $_POST['titulo'] );
$vdesc = trim( $_POST['descripcion'] );
$vcont = trim( $_POST['contacto'] );
$vweb = trim( $_POST['web'] );
$splfecha = split('[/.-]', $fecha);
$day = $splfecha[0];
$month = $splfecha[1];
$year = $splfecha[2];
$fecha = $year ."-". $month ."-". $day;

$res=mysql_query("SELECT id FROM calendario WHERE fecha='$fecha' AND hora='$hora'") or die("Imposible Seleccionar Agenda de BDTabla.");
if(mysql_num_rows($res) == 0 )
{ //Ahora, podemos insertar la actividad
    $res=mysql_query("INSERT INTO calendario(fecha, hora, titulo, descripcion, infocontacto, infoemail, infofono, infolink) VALUES('$fecha','$hora','$vtitu','$vdesc','$vcont','$email','$vfono','$vweb')") or die("Imposible Almacenar Actividad en BDTabla.");
	mysql_close($link);
}    header("Location: $PHP_SELF?act=I");
}



if( $_GET[act] == "m" )
{
$res=mysql_query("SELECT * FROM calendario WHERE id=$id") or die(mysql_error());
if($fila=mysql_fetch_object($res)) {
   list($year, $month, $day, $time) = split('[-. ]', $fila->fecha);
   $fecha = $day ."-". $month ."-". $year;
   list($hour, $minutes, $second) = split('[: ]', $fila->hora);
   $hora = $hour .":". $minutes;
   $vtitu = $fila->titulo;
   $vdesc = str_replace("<br>","\n",$fila->descripcion);
   $vcont = $fila->infocontacto;
   $vemai = $fila->infoemail;
   $vfono = $fila->infofono;
   $vweb  = $fila->infolink;
}
mysql_free_result($res);
mysql_close($link);

znsuperior();
?>
			  <!-- COMIENZO: Fila Principal Administracion -->
              <tr> 
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0"summary="Tabla Principal de Administracion">
                    <tr>
                      <td>
					     <table width="100%" border="0" cellspacing="0" cellpadding="0">
						   <tr>
						      <td>
					             <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F2EEDB">
                                   <tr> 
                                      <td align="center" class="vdestacado">Formulario Actualizar Actividad en Agenda del Intendente</td>
                                   </tr>
                                   <tr><td>&nbsp;</td></tr>
                                   <tr> 
                                      <td align="center" valign="middle"> 
                                        <table width="65%" border="0" cellpadding="0" cellspacing="1" bgcolor="#D8CA94">
                                          <tr>
                                             <td bgcolor="#FFFFFF">
                                              <form action="<? $PHP_SELF ?>?act=a" method="post" name="form" id="form" onSubmit="return vldag();">
                                              <input type="hidden" name="global_qk" value="<?php echo $global_qk;?>">
											  <input type="hidden" name="id" value="<?php echo $id;?>">
                                              <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff" class="tableamd">
                                                <tr> 
                                                  <td width="35%" height="5" class="texto"></td>
                                                  <td width="65%"></td>
                                                </tr>
												<tr>
												   <td>&nbsp;Fecha:</td>
												   <td>
                                                      <input name="fecha" type="text" value="<?php echo $fecha;?>" size="14"  class="textform" maxlength="10" onFocus="if(this.value=='<?php echo $fecha;?>')this.value='';" onBlur="if(this.value=='')this.value='<?php echo $fecha;?>';" onChange="return validar(this.form.fecha.value);"> 
											</tr>
<tr>
   <td>&nbsp;Hora:</td>
   <td><input type="text" name="hora" value="<?php echo $hora;?>" size="5"  class="textform" maxlength="5"></td>
</tr>

                                                <tr><td class="texto" colspan="2">&nbsp;T&iacute;tulo Actividad:</td></tr>
                                                <tr><td class="texto" colspan="2" align="center"><input name="titulo" type="text" id="titulo" value="<?php echo $vtitu;?>"  size="45" class="textform" maxlength="128" /></td></tr>
                                                <tr><td colspan="2" height="5">&nbsp;</td></tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Descripci&oacute;n Actividad:</td>
                                                  <td align="left">&nbsp;</td>
                                                </tr>
												<tr><td colspan="2" align="center"><textarea name="descripcion" cols="65" rows="10" value="<?php echo $vdesc;?>" ><?php echo $vdesc;?></textarea></td></tr>
                                                <tr><td colspan="2" height="5">&nbsp;</td></tr> 
                                                <tr> 
                                                  <td class="texto">&nbsp;Contacto Actividad:</td>
                                                  <td align="left"><input name="contacto" type="text" id="contacto"  value="<?php echo $vcont;?>" size="45" class="textform" maxlength="128" /></td>
                                                </tr>
                                                <tr><td colspan="2" height="5">&nbsp;</td></tr>                                                <tr> 
                                                  <td class="texto">&nbsp;Email Contacto Actividad:</td>
                                                  <td align="left"><input name="email" type="text" id="email" size="45"  value="<?php echo $vemai;?>" class="textform" maxlength="128" /></td>
                                                </tr>
                                                <tr><td colspan="2" height="5">&nbsp;</td></tr>                                                <tr> 
                                                  <td class="texto">&nbsp;Tel&eacute;fono Contacto Actividad:</td>
                                                  <td align="left"><input name="fono" type="text" id="fono" size="32" value="<?php echo $vfono;?>"  class="textform" maxlength="32" /></td>
                                                </tr>
                                                <tr><td colspan="2" height="5">&nbsp;</td></tr>                                                <tr> 
                                                  <td class="texto">&nbsp;Sitio Web Relacionado con Actividad:</td>
                                                  <td align="left"><input name="web" type="text" id="web" size="45" value="<?php echo $vweb;?>"  class="textform" maxlength="128" /></td>
                                                </tr>
                                                <tr><td colspan="2" height="5">&nbsp;</td></tr>
                                                <tr> 
                                                  <td colspan="2" align="center" valign="middle">
                                                    <input name="actualizar" type="submit" id="actualizar" class="boton" value="Actualizar Actividad" />
                                                  </td>
                                                </tr>
                                              </table>
                                              </form>
                                             </td>
                                          </tr>
                                        </table>
                                      </td>
                                   </tr>
                                   <tr>
						             <td height="10" bgcolor="#F2EEDB" valign="middle">
					               </td>
						   </tr>
					     </table>
					  </td>
                    </tr>
                  </table></td>
              </tr>
			  <!-- FIN: Fila Principal Administracion -->
<?php
znbaja();
}


if( $_GET[act] == "a" )
{
//Chequeamos que la categoria no haya sido ingresado previamente
$vtitu = trim( $_POST['titulo'] );
$vdesc = trim( $_POST['descripcion'] );
$vcont = trim( $_POST['contacto'] );
$vweb = trim( $_POST['web'] );
$splfecha = split('[/.-]', $fecha);
$day = $splfecha[0];
$month = $splfecha[1];
$year = $splfecha[2];
$fecha = $year ."-". $month ."-". $day;

$res=mysql_query("SELECT id FROM calendario WHERE id=$id") or die("Imposible Seleccionar Agenda de BDTabla.");
if(mysql_num_rows($res) == 1 )
{ //Ahora, podemos insertar la actividad
    $res=mysql_query("UPDATE calendario SET fecha='$fecha', hora='$hora', titulo='$vtitu', descripcion='$vdesc', infocontacto='$vcont', infoemail='$email', infofono='$vfono', infolink='$vweb' WHERE id=$id") or die("Imposible Actualizar Actividad en BDTabla.");
	mysql_close($link);
}    header("Location: $PHP_SELF?act=I");
}


} else{
  // No se encuentra logeado el usuario
  header("Location: nologin.html");
}
?>
