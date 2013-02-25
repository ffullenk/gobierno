<?php
umask(0);
include('../bd/conecta.php');
$link = Conexion();
$legal_require_php = "k28stv7s4";
global $global_qk;
$global_qk=0;
include("detectuser.php");

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
                            <td>&nbsp;<a href="admalcaldes.php" class="enlace">Adm. Provincias de la Regi&oacute;n</a></td>
                          </tr>
                          <tr> 
                            <td>&nbsp;<a href="admcomuna.php" class="enlace">Adm. Comunas de la Regi&oacute;n</a></td>
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
                    de <strong><a href="<? $PHP_SELF?>?act=dmin" class="enlace">Gobernadores 
                    Provinciales </a></strong></span></div></td>
              </tr>
              <tr> 
                <td align="right"><span class="info"><a href="<? $PHP_SELF?>?act=k" class="boton">Agregar 
                  Gobernador [+]</a>&nbsp;&nbsp;</span></td>
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

if( $loginCorrecto ) {

if ( ( !$_GET[act] ) || ( $_GET[act] == "dmin" ) ) {
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
									$TAMANO_PAGINA = 9;

								  /* examino la p&aacute;gina a mostrar y el inicio del registro a mostrar */
								   $pagina = $_GET["pagina"];
								   if (!$pagina) {
								        $inicio = 0;
								        $pagina = 1;
								   }
								   else {
								        $inicio = ($pagina - 1) * $TAMANO_PAGINA;
								   }

								   $ssql = "SELECT id, servicio FROM goberna";
								   $rs = mysql_query($ssql);
								   $num_total_registros = mysql_num_rows($rs);

								/* calculo el total de p&aacute;ginas */
								   $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
								/* pongo el n&uacute;mero de registros total, el tama&ntilde;o de p&aacute;gina y la p&aacute;gina que se muestra */
								   $maxpags= 4;
								   $minimo = $maxpags ? max(1, $compag-ceil($maxpags/2)): 1;
								   $maximo = $maxpags ? min($total_paginas, $pagina+floor($maxpags/2)): $total_paginas;

								/* construyo la sentencia SQL */
								   $ssql = "SELECT id, servicio FROM goberna LIMIT ". $inicio . "," . $TAMANO_PAGINA;
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


if( $_GET[act] == "k" )
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
                                      <td align="center" class="vdestacado">Formulario Detalle Gobernaciones</td>
                                   </tr>
                                   <tr><td>&nbsp;</td></tr>
                                   <tr> 
                                      <td align="center" valign="middle"> 
                                        <table width="65%" border="0" cellpadding="0" cellspacing="1" bgcolor="#D8CA94">
                                          <tr>
                                             <td bgcolor="#FFFFFF">
                                              <form action="<? $PHP_SELF ?>?act=g" method="post" name="form" id="form" onsubmit="return vldserv();" enctype="multipart/form-data">
                                              <input type="hidden" name="global_qk" value="<?php echo $global_qk;?>">
											  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff" class="tableamd">
                                                <tr> 
                                                  <td width="35%" height="5" class="texto"></td>
                                                  <td width="65%"></td>
                                                </tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Acronimo:</td>
                                                  <td align="left"><input name="nomacr" type="text" id="nomacr" size="15" class="textform" maxlength="15" /></td>
                                                </tr>
												<tr><td colspan="2" height="5"></td></tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Nombre Servicio:</td>
                                                  <td align="left"><input name="nomser" type="text" id="nomser" size="45" class="textform" maxlength="100" /></td>
                                                </tr>
												<tr><td colspan="2" height="5"></td></tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Direcci&oacute;n:</td>
                                                  <td align="left"><input name="ubdir" type="text" id="ubdir" size="45" class="textform" maxlength="50" /></td>
                                                </tr>
												<tr><td colspan="2" height="5"></td></tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Ciudad:</td>
                                                  <td align="left"><input name="ubciu" type="text" id="ubciu" size="45" class="textform" maxlength="25" /></td>
                                                </tr>
												<tr><td colspan="2" height="5"></td></tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Tel&eacute;fono:</td>
                                                  <td align="left"><input name="ubfon" type="text" id="ubfon" size="9" class="textform" maxlength="9" /></td>
                                                </tr>
												<tr><td colspan="2" height="5"></td></tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Fax:</td>
                                                  <td align="left"><input name="ubfax" type="text" id="ubfax" size="9" class="textform" maxlength="9" /></td>
                                                </tr>
												<tr><td colspan="2" height="5"></td></tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Email Contacto Servicio:</td>
                                                  <td align="left"><input name="nomema" type="text" id="nomema" size="45" class="textform" maxlength="50" /></td>
                                                </tr>
												<tr><td colspan="2" height="5"></td></tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Nombre Jefe Servicio:</td>
                                                  <td align="left"><input name="nomjef" type="text" id="nomjef" size="45" class="textform" maxlength="100" /></td>
                                                </tr>
												<tr><td colspan="2" height="5"></td></tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Adjuntar Foto Jefe Servicio:</td>
                                                  <td align="left"><input name="foto" type="file" id="foto" class="textform" size="25" /></td>
                                                </tr>
												<tr><td colspan="2" height="5"></td></tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Biograf&iacute;a Resumida:</td>
                                                  <td align="left">&nbsp;</td>
                                                </tr>
                                                <tr><td colspan="2" align="center"><textarea name="bio" cols="65" rows="10"></textarea></td></tr>
                                                <tr><td colspan="2" height="5">&nbsp;</td></tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Enlace a Sitio Web Gobernaci&oacute;n:</td>
                                                  <td align="left"><input name="ub_link" type="text" id="ub_link" class="textform" size="45" maxlength="128" /></td>
                                                </tr>
												<tr><td colspan="2" height="15"></td></tr>
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
                                                    <input name="crear" type="submit" id="crear" class="boton" value="Crear " />
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
$vacro = trim( $_POST['nomacr'] );
$vserv = trim( $_POST['nomser'] );
$vjefe = trim( $_POST['nomjef'] );
$vdire = trim( $_POST['ubdir'] );
$vciud = trim( $_POST['ubciu'] );

/* Foto Gobernador */
if ($HTTP_POST_FILES["foto"]["name"] != "") {
if (is_uploaded_file($foto)) {
$upload_img = $HTTP_POST_FILES["foto"]["name"];
$dir_img_uploads = "../goberna/fotos/";
copy($foto, $dir_img_uploads . $upload_img);
$atimg = $upload_img;
} else { echo "$upload_img, No se ha podido Subir al Servidor<BR>"; }
} else { $atimg = ""; }



$res=mysql_query("SELECT id FROM goberna WHERE servicio='$vserv'") or die("Imposible Seleccionar Informacion de BDTabla.");
if(mysql_num_rows($res) == 0 )
{ //Ahora, podemos insertar la marca
    $res=mysql_query("INSERT INTO goberna(acronimo, servicio, ub_dir, ub_ciu, ub_fono, ub_fax, ub_ema, ub_link, jefe, foto, biografia,hitos,objetivos) VALUES('$vacro','$vserv','$vdire','$vciud','$ubfon','$ubfax','$ubema','$ub_link','$vjefe','$atimg','$bio','$hito','$obj')") or die("Imposible Almacenar Info en Gobernacion en BDTabla.");
	mysql_close();
}    header("Location: $PHP_SELF?act=dmin");
}



if( $_GET[act] == "m" )
{
$res=mysql_query("SELECT * FROM goberna WHERE id=$id") or die("Error ... Imposible Seleccionar Info de Gobernacion en BDTabla.");
if($flgob = mysql_fetch_object($res)) {
   $nomacr = $flgob->acronimo;
   $nomser = $flgob->servicio;
   $ubdir = $flgob->ub_dir;
   $ubciu = $flgob->ub_ciu;
   $ubfon = $flgob->ub_fono;
   $ubfax = $flgob->ub_fax;
   $nomema = $flgob->ub_ema;
   $nomjef = $flgob->jefe;
   $cara = $flgob->foto;
   $bio = str_replace("<br>","\n",$flgob->biografia);
   $hitos = str_replace("<br>","\n",$flgob->hitos);
   $objetivos = str_replace("<br>","\n",$flgob->objetivos);
   $ub_link = $flgob->ub_link;
}
mysql_free_result($res); unset($flgob);
mysql_close();
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
                                      <td align="center" class="vdestacado">Formulario Actualizar Detalle Gobernaciones</td>
                                   </tr>
                                   <tr><td>&nbsp;</td></tr>
                                   <tr> 
                                      <td align="center" valign="middle"> 
                                        <table width="65%" border="0" cellpadding="0" cellspacing="1" bgcolor="#D8CA94">
                                          <tr>
                                             <td bgcolor="#FFFFFF">
                                              <form action="<? $PHP_SELF?>?act=a" method="post" name="form" id="form" onsubmit="return vldserv();" enctype="multipart/form-data">
                                              <input type="hidden" name="global_qk" value="<?php echo $global_qk;?>">
											  <input type="hidden" name="id" value="<?php echo $id;?>">
                                              <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff" class="tableamd">
                                                <tr> 
                                                  <td width="35%" height="5" class="texto"></td>
                                                  <td width="65%"></td>
                                                </tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Acronimo:</td>
                                                  <td align="left"><input name="nomacr" type="text" id="nomacr" size="15" class="textform" maxlength="15" value="<?php echo $nomacr;?>" /></td>
                                                </tr>
												<tr><td colspan="2" height="5"></td></tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Nombre Servicio:</td>
                                                  <td align="left"><input name="nomser" type="text" id="nomser" size="45" class="textform" maxlength="100" value="<?php echo $nomser;?>"/></td>
                                                </tr>
												<tr><td colspan="2" height="5"></td></tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Direcci&oacute;n:</td>
                                                  <td align="left"><input name="ubdir" type="text" id="ubdir" size="45" class="textform" maxlength="50" value="<?php echo $ubdir;?>"/></td>
                                                </tr>
												<tr><td colspan="2" height="5"></td></tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Ciudad:</td>
                                                  <td align="left"><input name="ubciu" type="text" id="ubciu" size="45" class="textform" maxlength="25" value="<?php echo $ubciu;?>"/></td>
                                                </tr>
												<tr><td colspan="2" height="5"></td></tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Tel&eacute;fono:</td>
                                                  <td align="left"><input name="ubfon" type="text" id="ubfon" size="9" class="textform" maxlength="9" value="<?php echo $ubfon;?>"/></td>
                                                </tr>
												<tr><td colspan="2" height="5"></td></tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Fax:</td>
                                                  <td align="left"><input name="ubfax" type="text" id="ubfax" size="9" class="textform" maxlength="9" value="<?php echo $ubfax;?>"/></td>
                                                </tr>
												<tr><td colspan="2" height="5"></td></tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Email Contacto Servicio:</td>
                                                  <td align="left"><input name="nomema" type="text" id="nomema" size="45" class="textform" maxlength="50" value="<?php echo $nomema;?>"/></td>
                                                </tr>
												<tr><td colspan="2" height="5"></td></tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Nombre Jefe Servicio:</td>
                                                  <td align="left"><input name="nomjef" type="text" id="nomjef" size="45" class="textform" maxlength="100" value="<?php echo $nomjef;?>"/></td>
                                                </tr>
												<tr><td colspan="2" height="5"></td></tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Foto Jefe Servicio Adjuntada:</td>
                                                  <td align="left"><input name="afoto" type="text" id="afoto" class="textform" size="25" value="<?php echo $cara;?>" disabled/></td>
                                                </tr>
												<tr><td colspan="2" height="5"></td></tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Adjuntar Nueva Foto Jefe Servicio :</td>
                                                  <td align="left"><input name="nfoto" type="file" id="nfoto" class="textform" size="25"/></td>
                                                </tr>
												<tr><td colspan="2" height="5"></td></tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Biograf&iacute;a Resumida:</td>
                                                  <td align="left">&nbsp;</td>
                                                </tr>
                                                <tr><td colspan="2" align="center"><textarea name="bio" cols="65" rows="10" value="<?php echo $bio;?>"><?php echo $bio;?></textarea></td></tr>
                                                <tr><td colspan="2" height="5">&nbsp;</td></tr>
												<tr><td colspan="2" height="5"></td></tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Enlace a Sitio Web Gobernaci&oacute;n:</td>
                                                  <td align="left"><input name="ub_link" type="text" id="ub_link" class="textform" size="45" maxlength="128"  value="<?php echo $ub_link;?>"/></td>
                                                </tr>
												<tr><td colspan="2" height="15"></td></tr>
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
                                                    <input name="actualizar" type="submit" id="actualizar" class="boton" value=" Actualizar " />
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


if( $_GET[act] == "a" ) {
//Chequeamos que la categoria no haya sido ingresado previamente
$vacro = trim( $_POST['nomacr'] );
$vserv = trim( $_POST['nomser'] );
$vjefe = trim( $_POST['nomjef'] );
$vdire = trim( $_POST['ubdir'] );
$vciud = trim( $_POST['ubciu'] );
/* Foto Gobernador */
if ($HTTP_POST_FILES["nfoto"]["name"] != "") {
  if (is_uploaded_file($nfoto)) {
      $upload_img = $HTTP_POST_FILES["nfoto"]["name"];
      $dir_img_uploads = "../goberna/fotos/";
	  if($upload_img != $afoto ) {
         copy($nfoto, $dir_img_uploads . $upload_img);
         $atimg = $upload_img;
	     mysql_query("UPDATE goberna SET foto='$atimg' WHERE id='$id'") or die("Error ... Imposible Actualizar Fotografia Gobernador.");
	     if(!empty( $afoto ) ) {
            unlink("../goberna/fotos/".$afoto);
            clearstatcache();
	     }
      }
  } else { echo "$upload_img, No se ha podido Subir al Servidor<BR>"; }
} else { $atimg = ""; }

  // Actualizar Info de Gobernador
     mysql_query("UPDATE goberna SET acronimo='$nomacr', servicio='$nomser', ub_dir='$ubdir', ub_ciu='$ubciu', ub_fono='$ubfon', ub_fax='$ubfax', ub_ema='$nomema', ub_link='$ub_link', jefe='$nomjef', biografia='$bio', hitos='$hito',objetivos='$obj' WHERE id='$id'") or die(mysql_error());
	 mysql_close();
	 header("Location: $PHP_SELF?act=dmin");
}

} else{
  // No se encuentra logeado el usuario
  header("Location: nologin.html");
}
?>
