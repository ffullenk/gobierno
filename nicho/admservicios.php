<?php
session_start();
umask(0);
 include("conecta.php");
$link = Conexion();
$legal_require_php = "k28stv7s4";
global $global_qk;
$global_qk=0;
//echo "bien";
//exit;
include("detectuser.php");

if(isset($_GET['id'])){

   $id= $_GET['id'];
}

function znsuperior() {
global $global_qk, $loginCorrecto;
?>
<html>
<head>
<title>Administraci&oacute;n de www.gorecoquimbo.cl</title>
<script language="JavaScript" src="../js/newgore.js" type="text/javascript"></script>
<script language="JavaScript" type="text/javascript">
function vldserv() {
  if(document.form.nomser.value == '')
  {
    document.form.nomser.focus();
    alert('Debe especificar un Nombre de Servicio');
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
                            <td>&nbsp;<a href="admservicios.php" class="enlace">Adm. Servicios P&uacute;blicos</a></td>
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
                            <td>&nbsp;<a href="admalcaldes.php" class="enlace">Adm. Alcaldes de la Regi&oacute;n</a></td>
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
                <td bgcolor="#F2EEDB" ><div id="mencab"><span class="info">Administraci&oacute;n de <strong><a href="<? $PHP_SELF?>?act=dmin" class="enlace">Servicios P&uacute;blicos</a></strong></span></div></td>
              </tr>
              <tr> 
                <td align="right"><span class="info"><a href="<? $PHP_SELF?>?act=k" class="boton">Agregar Servicio P&uacute;blico [+]</a>&nbsp;&nbsp;</span></td>
              </tr>
              <tr> 
                <td>&nbsp;</td>
              </tr>
<?php
}


function znbaja() {
global $global_qk, $loginCorrecto;
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

if ( ( !$_GET['act'] ) || ( $_GET['act'] == "dmin" ) ) {
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
<?php								/* Limito la busqueda */
									$TAMANO_PAGINA = 25;

								  /* examino la p&aacute;gina a mostrar y el inicio del registro a mostrar */
								   $pagina = $_GET["pagina"];
								   if (!$pagina) {
								        $inicio = 0;
								        $pagina = 1;
								   }
								   else {
								        $inicio = ($pagina - 1) * $TAMANO_PAGINA;
								   }

								   $ssql = "SELECT id, servicio FROM servpub ORDER BY servicio";
								   $rs = mysql_query($ssql);
								   $num_total_registros = mysql_num_rows($rs);

								/* calculo el total de p&aacute;ginas */
								   $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
								/* pongo el n&uacute;mero de registros total, el tama&ntilde;o de p&aacute;gina y la p&aacute;gina que se muestra */
								   $maxpags= 4;
								   $minimo = $maxpags ? max(1, $compag-ceil($maxpags/2)): 1;
								   $maximo = $maxpags ? min($total_paginas, $pagina+floor($maxpags/2)): $total_paginas;

								/* construyo la sentencia SQL */
								   $ssql = "SELECT id, servicio FROM servpub  ORDER BY servicio LIMIT ". $inicio . "," . $TAMANO_PAGINA;
								   $rs = mysql_query($ssql);

								   while ($fila=mysql_fetch_object($rs))
								   { ?>
								    <tr>
									   <td><?php echo $fila->servicio; ?></td>
                                       <td width="5">&nbsp;</td>
                                       <td  align="center"><a href="<?php $PHP_SELF?>?act=m&id=<?php echo $fila->id;?>" class="enlace">Modificar</a></td>
                                       <td width="2">&nbsp;</td>
                                       <td align="center"><a href="<?php $PHP_SELF?>?act=e&id=<?php echo $fila->id;?>" class="enlace">Eliminar</a></td>
									</tr>
									<tr><td colspan="5" height="15">&nbsp;</td></tr>
<?php                              } ?>
                                 </table>
							  </td>
						   </tr>
                    <tr><td height="10" bgcolor="#F2EEDB" valign="middle"><div id="lin-base">
<?php

    /* cerramos el conjunto de resultados y la conexi&oacute;n con la base de datos */
    mysql_free_result($rs);
    mysql_close();

    if ($total_paginas > 1) { echo "&nbsp;<span class=info><strong><font color='#004686'>P&aacute;gina </font></strong></span>&nbsp;"; }

/* muestro los distintos &iacute;ndices de las p&aacute;ginas, si es que hay varias p&aacute;ginas */
   if($pagina > 1)
   {
     echo "<a href='".$_SERVER["PHP_SELF"]."?act=dmin&pagina=".($pagina-1)."'>";
     echo "<font face='verdana' size='-2'> anterior</font>";
     echo "</a>&nbsp;";
   }

   if ($total_paginas > 1)
   {
      for ($i=$minimo; $i<$pagina; $i++){
         echo "<a href='".$_SERVER["PHP_SELF"]."?act=dmin&pagina=".$i."'> $i</a>&nbsp;";
      }
	  
	  echo "<font face='verdana' size='-2'>[". $pagina. "] </font>&nbsp;";

      for ($i=$pagina+1; $i<=$maximo; $i++){
         echo "<a href='".$_SERVER["PHP_SELF"]."?act=dmin&pagina=".$i."'>$i</a>&nbsp;";
      }
   }

   if($pagina<$total_paginas)
   {
     echo "&nbsp;<a href='".$_SERVER["PHP_SELF"]."?act=dmin&pagina=" .($pagina+1). "'>";
     echo "<font face='verdana' size='-2'>siguiente</font></a>";
   }
?>
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


if( $_GET['act'] == "k" )
{
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
					             <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F2EEDB">
                                   <tr> 
                                      <td align="center" class="vdestacado">Formulario Crear Informaci&oacute;n Para Servicio P&uacute;blico</td>
                                   </tr>
                                   <tr><td>&nbsp;</td></tr>
                                   <tr> 
                                      <td align="center" valign="middle"> 
                                        <table width="65%" border="0" cellpadding="0" cellspacing="1" bgcolor="#D8CA94">
                                          <tr>
                                             <td bgcolor="#FFFFFF">
                                              <form action="<?php $PHP_SELF?>?act=g" method="post" name="form" id="form" onSubmit="return vldserv();" enctype="multipart/form-data">
                                              <input type="hidden" name="global_qk" value="<?php echo $global_qk;?>">
											  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff" class="tableamd">
                                                <tr> 
                                                  <td width="35%" height="5" class="texto"></td>
                                                  <td width="65%"></td>
                                                </tr>
												<tr>
												   <td>&nbsp;Tipo de Servicio:</td>
												   <td><select name="tipo" size="1" class="selectform">
												         <option value="0">Elija Tipo de Servicio ...</option>
														 <option value="1">Secretar&iacute;a Regional Ministerial</option>
														 <option value="2">Servicio Regional</option>
												       </select></td>
												</tr>
												<tr>
												   <td>&nbsp;Acr&oacute;nimo:</td>
												   <td><input type="text" name="acronimo" size="25" maxlength="100" class="textform"></td>
												</tr>
<?php
$res = mysql_query("SELECT id, acronimo FROM servpub WHERE dependencia=0") or die(mysql_error());
if(mysql_num_rows($res) > 0 ) {
   $xpos = 0;
   $ISer[$xpos] = "-";
   $NSer[$xpos] = "Este Servicio Depende de ...";
   $xpos++;
   $ISer[$xpos] = "0";
   $NSer[$xpos] = "Sin Dependencia de Servicio";
   $xpos++;
   
   while($fila=mysql_fetch_object($res)) {
     $ISer[$xpos] = $fila->id;
	 $NSer[$xpos] = $fila->acronimo;
	 $xpos++;
   }
   mysql_free_result($res); ?>
<tr>
   <td>&nbsp;Dependencia:</td>
   <td>
   <select name="depende" size="1" class="selectform">
<?php for($i=0;$i<$xpos;$i++)
      { ?>
	    <option value="<?php echo $ISer[$i];?>"><?php echo $NSer[$i];?></option>  
<?php }
?>
</select>
</td>
</tr>
<?php      
}
?>
                                                <tr> 
                                                  <td class="texto">&nbsp;Nombre Servicio:</td>
                                                  <td align="left"><input name="nomser" type="text" id="nomser" size="45" class="textform" maxlength="100" /></td>
                                                </tr>
												<tr><td height="5"></td></tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Direcci&oacute;n:</td>
                                                  <td align="left"><input name="ubdir" type="text" id="ubdir" size="45" class="textform" maxlength="50" /></td>
                                                </tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Ciudad:</td>
                                                  <td align="left"><input name="ubciu" type="text" id="ubciu" size="45" class="textform" maxlength="25" /></td>
                                                </tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Tel&eacute;fono:</td>
                                                  <td align="left"><input name="ubfon" type="text" id="ubfon" size="9" class="textform" maxlength="9" /></td>
                                                </tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Fax:</td>
                                                  <td align="left"><input name="ubfax" type="text" id="ubfax" size="9" class="textform" maxlength="9" /></td>
                                                </tr>
												<tr><td height="5"></td></tr>
												<tr> 
                                                  <td class="texto">&nbsp;Sitio Web:  http://</td>
                                                  <td align="left"><input name="nomweb" type="text" id="nomweb" size="45" class="textform" maxlength="100" /></td>
                                                </tr>

                                                <tr> 
                                                  <td class="texto">&nbsp;Email Contacto Servicio:</td>
                                                  <td align="left"><input name="nomema" type="text" id="nomema" size="45" class="textform" maxlength="50" /></td>
                                                </tr>
												<tr><td height="5"></td></tr>												
                                                <tr> 
                                                  <td class="texto">&nbsp;Nombre Jefe Servicio:</td>
                                                  <td align="left"><input name="nomjef" type="text" id="nomjef" size="45" class="textform" maxlength="100" /></td>
                                                </tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Adjuntar Foto Jefe Servicio:</td>
                                                  <td align="left"><input name="foto" type="file" id="foto" class="textform" size="25" /></td>
                                                </tr>
												<tr><td height="5"></td></tr>												
                                                <tr> 
                                                  <td class="texto">&nbsp;Horario de Atenci&oacute;n P&uacute;blico:</td>
                                                  <td align="left"><input name="nomhor" type="text" id="nomhor" class="textform" size="25" maxlength="50" /></td>
                                                </tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Biograf&iacute;a Resumida:</td>
                                                  <td align="left">&nbsp;</td>
                                                </tr>
                                                <tr><td colspan="2" align="center"><textarea name="bio" cols="65" rows="10"></textarea></td></tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Hitos:</td>
                                                  <td align="left">&nbsp;</td>
                                                </tr>
                                                <tr><td colspan="2" align="center"><textarea name="hito" cols="65" rows="10"></textarea></td></tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Objetivos:</td>
                                                  <td align="left">&nbsp;</td>
                                                </tr>
                                                <tr><td colspan="2" align="center"><textarea name="obj" cols="65" rows="10"></textarea></td></tr>
												
                                                <tr><td colspan="2" height="5">&nbsp;</td></tr>
                                                <tr> 
                                                  <td colspan="2" align="center" valign="middle">
                                                    <input name="crear" type="submit" id="crear" class="boton" value="Crear Categor&iacute;a" />
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


if( $_GET['act'] == "g" )
{
//Chequeamos que la categoria no haya sido ingresado previamente
$vacro = trim( $_POST['acronimo'] );
$vserv = trim( $_POST['nomser'] );
$vjefe = trim( $_POST['nomjef'] );
$vdire = trim( $_POST['ubdir'] );
$vciud = trim( $_POST['ubciu'] );
$vweb = trim( $_POST['nomweb'] );
$vhor = trim( $_POST['nomhor'] );

/* Foto Jefe Servicio */
if ($HTTP_POST_FILES["foto"]["name"] != "") {
    if(is_uploaded_file($foto)) {
        $upload_img = $HTTP_POST_FILES["foto"]["name"];
        $dir_img_uploads = "../jefes/fotos/";
        copy($foto, $dir_img_uploads . $upload_img);
        $atimg = $upload_img;
    } else { echo "$upload_img, No se ha podido Subir al Servidor<BR>"; }
} else { $atimg = ""; }



$res=mysql_query("SELECT id FROM servpub WHERE servicio='$vserv'") or die("Imposible Seleccionar Servicios Publicos de BDTabla.");
if(mysql_num_rows($res) == 0 )
{ //Ahora, podemos insertar la marca
    $res=mysql_query("INSERT INTO servpub(acronimo, tiposerv, dependencia, servicio, ub_dir, ub_ciu, ub_fon, ub_fax, ub_ema, ub_web, jefe, foto, biografia, hitos, objetivos,ub_horario) VALUES('$vacro','$tipo','$depende','$vserv','$vdire','$vciud','$ubfon','$ubfax','$nomema','$nomweb','$vjefe','$atimg','$bio','$hito','$obj','$nomhor')") or die("Imposible Almacenar Servicio Publico en BDTabla.");
	mysql_close();
}    header("Location: $PHP_SELF?act=dmin");

}



if( $_GET['act'] == "m" )
{

$res=mysql_query("SELECT * FROM servpub WHERE id=$id") or die("Error ... Imposible Seleccionar Info de Servicio Publico en BDTabla.");
if($flser = mysql_fetch_object($res)) {
   $acronimo = $flser->acronimo;
   $tiposerv = $flser->tiposerv;
   $dependencia = $flser->dependencia;
   $biografia = str_replace("<br>","\n",$flser->biografia);
   $objetivos = str_replace("<br>","\n",$flser->objetivos);
   $hitos = str_replace("<br>","\n",$flser->hitos);
   $servicio = $flser->servicio;
   $ub_ciu = $flser->ub_ciu;
   $ub_dire = $flser->ub_dir;
   $ub_fono = $flser->ub_fon;
   $ub_fax = $flser->ub_fax;
   $ub_ema = $flser->ub_ema;
   $ub_horario = $flser->ub_horario;
   $jefe = $flser->jefe;
   $foto = $flser->foto;
   $horario = $flser->ub_horario;
   $web = $flser->ub_web;
}
mysql_free_result($res); unset($flser);
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
					             <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F2EEDB">
                                   <tr> 
                                      <td align="center" class="vdestacado">Formulario Actualizar Informaci&oacute;n Para Servicio P&uacute;blico</td>
                                   </tr>
                                   <tr><td>&nbsp;</td></tr>
                                   <tr> 
                                      <td align="center" valign="middle"> 
                                        <table width="65%" border="0" cellpadding="0" cellspacing="1" bgcolor="#D8CA94">
                                          <tr>
                                             <td bgcolor="#FFFFFF">
                                              <form action="<?php $PHP_SELF?>?act=a" method="post" name="form" id="form" onSubmit="return vldserv();" enctype="multipart/form-data">
                                              <input type="hidden" name="global_qk" value="<?php echo $global_qk;?>">
											  <input type="hidden" name="id" value="<?php echo $id;?>">
											  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff" class="tableamd">
                                                <tr> 
                                                  <td width="35%" height="5" class="texto"></td>
                                                  <td width="65%"></td>
                                                </tr>
												<tr>
												   <td>&nbsp;Tipo de Servicio:</td>
												   <td><?php if($tiposerv == "1" ) { $ctipo = "Secretar&iacute;a Regional Ministerial"; }
												         elseif($tiposerv == "2" ) { $ctipo = "Servicio P&uacute;blico Regional"; } ?>
												      <input type="text" name="tipo" size="25" maxlength="100" class="textform" value="<?php echo $ctipo;?>" disabled>
												   </td>
												</tr>
												<tr>
												   <td>&nbsp;Acr&oacute;nimo:</td>
												   <td><input type="text" name="acronimo" size="25" maxlength="100" class="textform" value="<?php echo $acronimo;?>"></td>
												</tr>
<?php
$res = mysql_query("SELECT id, acronimo FROM servpub WHERE dependencia=0") or die(mysql_error());
if(mysql_num_rows($res) > 0 ) {
   $xpos = 0;
   $ISer[$xpos] = "-";
   $NSer[$xpos] = "Este Servicio Depende de ...";
   $xpos++;
   $ISer[$xpos] = "0";
   $NSer[$xpos] = "Sin Dependencia de Servicio";
   $xpos++;
   
   while($fila=mysql_fetch_object($res)) {
     $ISer[$xpos] = $fila->id;
	 $NSer[$xpos] = $fila->acronimo;
	 $xpos++;
   }
   mysql_free_result($res); ?>
<tr>
   <td>&nbsp;Dependencia:</td>
   <td>
   <select name="depende" size="1" class="selectform">
<?php for($i=0;$i<$xpos;$i++)
      { if( $dependencia == $ISer[$i] ) { ?>
	        <option value="<?php echo $ISer[$i];?>" selected><?php echo $NSer[$i];?></option>
<?php   } else{ ?>
	        <option value="<?php echo $ISer[$i];?>"><?php echo $NSer[$i];?></option>  
<?php   }
      }
?>
</select>
</td>
</tr>
<?php      
}
?>
												<tr> 
                                                  <td class="texto">&nbsp;Nombre Servicio:</td>
                                                  <td align="left"><input name="nomser" type="text" id="nomser" size="45" class="textform" maxlength="100" value="<?php echo $servicio;?>" /></td>
                                                </tr>
                                                <tr><td height="5"></td></tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Direcci&oacute;n:</td>
                                                  <td align="left"><input name="ubdir" type="text" id="ubdir" size="45" class="textform" maxlength="50" value="<?php echo $ub_dire;?>"/></td>
                                                </tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Ciudad:</td>
                                                  <td align="left"><input name="ubciu" type="text" id="ubciu" size="45" class="textform" maxlength="25" value="<?php echo $ub_ciu;?>" /></td>
                                                </tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Tel&eacute;fono:</td>
                                                  <td align="left"><input name="ubfon" type="text" id="ubfon" size="9" class="textform" maxlength="9" value="<?php echo $ub_fono;?>"/></td>
                                                </tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Fax:</td>
                                                  <td align="left"><input name="ubfax" type="text" id="ubfax" size="9" class="textform" maxlength="9" value="<?php echo $ub_fax;?>"/></td>
                                                </tr>
                                                <tr><td height="5"></td></tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Sitio Web:  http://</td>
                                                  <td align="left"><input name="nomweb" type="text" id="nomweb" size="45" class="textform" maxlength="100" value="<?php echo $web;?>"/></td>
                                                </tr>

                                                <tr> 
                                                  <td class="texto">&nbsp;Email Contacto Servicio:</td>
                                                  <td align="left"><input name="nomema" type="text" id="nomema" size="45" class="textform" maxlength="50" value="<?php echo $ub_ema;?>"/></td>
                                                </tr>
                                                <tr><td height="5"></td></tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Nombre Jefe Servicio:</td>
                                                  <td align="left"><input name="nomjef" type="text" id="nomjef" size="45" class="textform" maxlength="100" value="<?php echo $jefe;?>"/></td>
                                                </tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Foto Jefe Servicio:</td>
                                                  <td align="left"><input name="afoto" type="text" id="afoto" class="textform" size="25" value="<?php echo $foto;?>" disabled/></td>
                                                </tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Actualizar Foto Jefe Servicio:</td>
                                                  <td align="left"><input name="nfoto" type="file" id="nfoto" class="textform" size="25" /></td>
                                                </tr>
                                                <tr><td height="5"></td></tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Horario Atenci&oacute;n P&uacute;blico:</td>
                                                  <td align="left"><input name="nomhor" type="text" id="nomhor" size="45" class="textform" maxlength="50" value="<?php echo $horario;?>"/></td>
                                                </tr>
                                                <tr><td height="5"></td></tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Biograf&iacute;a Resumida:</td>
                                                  <td align="left">&nbsp;</td>
                                                </tr>
                                                <tr><td colspan="2" align="center"><textarea name="bio" cols="65" rows="10" value="<?php echo $biografia;?>"><?php echo $biografia;?></textarea></td></tr>
                                                <tr><td height="5"></td></tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Hitos:</td>
                                                  <td align="left">&nbsp;</td>
                                                </tr>
                                                <tr><td colspan="2" align="center"><textarea name="hito" cols="65" rows="10"value="<?php echo $hitos;?>"><?php echo $hitos;?></textarea></td></tr>
                                                <tr><td height="5"></td></tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Objetivos:</td>
                                                  <td align="left">&nbsp;</td>
                                                </tr>
                                                <tr><td colspan="2" align="center"><textarea name="obj" cols="65" rows="10"value="<?php echo $objetivos;?>"><?php echo $objetivos;?></textarea></td></tr>
                                                <tr><td height="5"></td></tr>												
                                                <tr><td colspan="2" height="5">&nbsp;</td></tr>
                                                <tr> 
                                                  <td colspan="2" align="center" valign="middle">
                                                    <input name="Actualizar" type="submit" id="crear" class="boton" value="Actualizar Servicio" />
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


if( $_GET['act'] == "a" )
{
//Chequeamos que la categoria no haya sido ingresado previamente
$vacro = trim( $_POST['acronimo'] );
$vserv = trim( $_POST['nomser'] );
$vjefe = trim( $_POST['nomjef'] );
$vdire = trim( $_POST['ubdir'] );
$vciud = trim( $_POST['ubciu'] );
$vweb = trim( $_POST['nomweb'] );
$vhor = trim( $_POST['nomhor'] );
$vema = trim( $_POST['nomema'] );

/* Foto Jefe Servicio */
if ($HTTP_POST_FILES["nfoto"]["name"] != "") {
  if (is_uploaded_file($nfoto)) {
      $upload_img = $HTTP_POST_FILES["nfoto"]["name"];
      $dir_img_uploads = "../jefes/fotos/";
	  if($upload_img != $afoto ) {
         copy($nfoto, $dir_img_uploads . $upload_img);
         $atimg = $upload_img;
	     mysql_query("UPDATE servpub SET foto='$atimg' WHERE id=$id") or die("Error ... Imposible Actualizar Fotografia Alcalde.");
	     if(!empty( $afoto ) ) {
            unlink("../jefes/fotos/".$afoto);
            clearstatcache();
	     }
      }
  } else { echo "$upload_img, No se ha podido Subir al Servidor<BR>"; }
} else { $atimg = ""; }

$res=mysql_query("SELECT id FROM servpub WHERE id=$id") or die("Imposible Seleccionar Servicios Publicos de BDTabla.");
if(mysql_num_rows($res) == 1 )
{ //Ahora, podemos insertar la marca
    $res=mysql_query("UPDATE servpub SET acronimo='$vacro', dependencia='$depende', servicio='$vserv', ub_dir='$ubdir', ub_ciu='$ubciu', ub_fon='$ubfon', ub_fax='$ubfax', ub_ema='$vema', ub_web='$vweb', jefe='$vjefe', biografia='$bio', hitos='$hito', objetivos='$obj', ub_horario='$vhor' WHERE id='$id' ") or die(mysql_error());
	mysql_close();
}    header("Location: $PHP_SELF?act=dmin");

}


} else{
  // No se encuentra logeado el usuario
  header("Location: nologin.html");
}
?>
