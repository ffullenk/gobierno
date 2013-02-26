<?php
session_start();
umask(0);
 include("conecta.php");
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
function vldalc() {
  if(document.form.comuna.value == '-')
  {
    document.form.comuna.focus();
    alert('Debe Seleccionar una Comuna');
    return false;
  }
  if(document.form.alcalde.value == '')
  {
    document.form.alcalde.focus();
    alert('Debe Digitar el Nombre Completo del Alcalde');
    return false;
  }
  if(document.form.bio.value == '')
  {
    document.form.bio.focus();
    alert('Debe Describir una biografía resumida para el Alcalde');
    return false;
  }
  if(document.form.ub_dire.value == '')
  {
    document.form.ub_dire.focus();
    alert('Debe Especificar Dirección en la cual se ubica Municipio');
    return false;
  }
  if(document.form.ub_fono.value == '')
  {
    document.form.ub_fono.focus();
    alert('Debe Especificar Número Telefónico del Municipio');
    return false;
  }
  if(document.form.ub_fax.value == '')
  {
    document.form.ub_fax.focus();
    alert('Debe Especificar un Número Fax del Municipio');
    return false;
  }
  /*if(document.form.ub_ema.value == '')
  {
    document.form.ub_ema.focus();
    alert('Debe Especificar un Correo Electrónico del Municipio');
    return false;
  }*/
  if(document.form.ub_hor.value == '')
  {
    document.form.ub_hor.focus();
    alert('Debe Especificar Cual es el Horario de Atención del Municipio (Desde las hh:mm hasta las hh:mm)');
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
                    de <strong><a href="<? $PHP_SELF?>?act=dmin" class="enlace">Alcaldes 
                    de la Regi&oacute;n</a></strong></span></div></td>
              </tr>
              <tr> 
                <td align="right"><span class="info"><a href="<? $PHP_SELF?>?act=k" class="boton">Agregar 
                  Alcalde [+]</a>&nbsp;&nbsp;</span></td>
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

								   $ssql = "SELECT idalcalde, comuna, nombre FROM alcaldes INNER JOIN comuna ON alcaldes.idcom=comuna.id_com";
								   $rs = mysql_query($ssql);
								   $num_total_registros = mysql_num_rows($rs);

								/* calculo el total de p&aacute;ginas */
								   $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
								/* pongo el n&uacute;mero de registros total, el tama&ntilde;o de p&aacute;gina y la p&aacute;gina que se muestra */
								   $maxpags= 4;
								   $minimo = $maxpags ? max(1, $compag-ceil($maxpags/2)): 1;
								   $maximo = $maxpags ? min($total_paginas, $pagina+floor($maxpags/2)): $total_paginas;

								/* construyo la sentencia SQL */
								   $ssql = "SELECT idalcalde, comuna, nombre FROM alcaldes INNER JOIN comuna ON alcaldes.idcom=comuna.id_com LIMIT ". $inicio . "," . $TAMANO_PAGINA;
								   $rs = mysql_query($ssql);

								   while ($fila=mysql_fetch_object($rs))
								   { ?>
								    <tr>
									   <td><?php echo $fila->comuna; ?><br>
									       <strong><?php echo $fila->nombre;?></strong></td>
                                       <td width="5">&nbsp;</td>
									   <td  align="center"><a href="<?php $PHP_SELF?>?act=m&id=<?php echo $fila->idalcalde;?>" class="enlace">Modificar</a></td>
                                       <td width="2">&nbsp;</td>
                                       <td align="center"><a href="<?php $PHP_SELF?>?act=e&id=<?php echo $fila->idalcalde;?>" class="enlace">Eliminar</a></td>
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
     echo "<a href='".$HTTP_SERVER["PHP_SELF"]."?act=dmin&pagina=".($pagina-1)."'>";
     echo "<font face='verdana' size='-2'> anterior</font>";
     echo "</a>&nbsp;";
   }

   if ($total_paginas > 1)
   {
      for ($i=$minimo; $i<$pagina; $i++){
         echo "<a href='".$HTTP_SERVER["PHP_SELF"]."?act=dmin&pagina=".$i."'> $i</a>&nbsp;";
      }
	  
	  echo "<font face='verdana' size='-2'>[". $pagina. "] </font>&nbsp;";

      for ($i=$pagina+1; $i<=$maximo; $i++){
         echo "<a href='".$HTTP_SERVER["PHP_SELF"]."?act=dmin&pagina=".$i."'>$i</a>&nbsp;";
      }
   }

   if($pagina<$total_paginas)
   {
     echo "&nbsp;<a href='".$HTTP_SERVER["PHP_SELF"]."?act=dmin&pagina=" .($pagina+1). "'>";
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
                                      <td align="center" class="vdestacado">Formulario Detalle Alcaldes</td>
                                   </tr>
                                   <tr><td>&nbsp;</td></tr>
                                   <tr> 
                                      <td align="center" valign="middle"> 
                                        <table width="65%" border="0" cellpadding="0" cellspacing="1" bgcolor="#D8CA94">
                                          <tr>
                                             <td bgcolor="#FFFFFF">
                                              <form action="<? $PHP_SELF ?>?act=g" method="post" name="form" id="form" onsubmit="return vldalc();" enctype="multipart/form-data">
                                              <input type="hidden" name="global_qk" value="<?php echo $global_qk;?>">
											  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff" class="tableamd">
                                                <tr><td height="15" class="texto"></td></tr>
                                                <?php
												  $res = mysql_query("SELECT id_com, comuna FROM comuna") or die(mysql_error());
												  if(mysql_num_rows($res) > 0 ) {
												     $xcom = 0;
													 $ICom[$xcom] = "-";
													 $NCom[$xcom] = " Seleccione una Comuna ...";
													 $xcom++;
													 
													 while($filcom=mysql_fetch_object($res)) {
													    $ICom[$xcom] = $filcom->id_com;
														$NCom[$xcom] = $filcom->comuna;
														$xcom++;
													 } ?>
                                                     <tr><td class="texto">&nbsp;<strong>Representante de la Comuna de:</strong></td></tr>
                                                     <tr><td align="left">&nbsp;
													    <select name="comuna" size="1" class="selectform"><?php
														  for($icom=0; $icom < $xcom; $icom++ ) { ?>
														     <option value="<?php echo $ICom[$icom];?>"><?php echo $NCom[$icom];?></option>
													<?php } ?>
														</select>
											<?php }
											      mysql_free_result($res); unset($filcom); ?>
												  </td>
                                                </tr>
												<tr><td height="5"></td></tr>
                                                <tr><td class="texto">&nbsp;<strong>Nombre Alcalde:</strong></td></tr>
                                                <tr><td align="left">&nbsp;<input name="alcalde" type="text" id="alcalde" size="45" class="textform" maxlength="128" /></td>
                                                </tr>
												<tr><td height="5"></td></tr>
                                                <tr><td class="texto">&nbsp;<strong>Adjuntar Fotograf&iacute;a Alcalde:</strong></td></tr>
                                                <tr><td align="left">&nbsp;<input name="foto" type="file" id="foto" size="45" class="textform"/></td>
                                                </tr>
												<tr><td height="5"></td></tr>
                                                <tr><td class="texto">&nbsp;<strong>Biograf&iacute;a Resumida:</strong></td></tr>
                                                <tr><td align="center">&nbsp;<textarea name="bio" cols="65" rows="10"></textarea></td></tr>
                                                <tr><td height="5">&nbsp;</td></tr>
                                                <tr><td class="texto">&nbsp;<strong>Enlace a Sitio Web Municipio:</strong></td></tr>
                                                <tr><td align="left">&nbsp;<input name="ub_link" type="text" id="ub_link" class="textform" size="45" maxlength="128" /></td>
                                                </tr>
												<tr><td height="15"></td></tr>
                                                <tr><td class="texto">&nbsp;<strong>Direcci&oacute;n Municipio:</strong></td></tr>
                                                <tr><td align="left">&nbsp;<input name="ub_dire" type="text" id="ub_dire" class="textform" size="45" maxlength="128" /></td>
                                                </tr>
												<tr><td height="15"></td></tr>
                                                <tr><td class="texto">&nbsp;<strong>Tel&eacute;fono Municipio:</strong></td></tr>
                                                <tr><td align="left">&nbsp;<input name="ub_fono" type="text" id="ub_fono" class="textform" size="12" maxlength="12" /></td>
                                                </tr>
												<tr><td height="15"></td></tr>
                                                <tr><td class="texto">&nbsp;<strong>Fax Municipio:</strong></td></tr>
                                                <tr><td align="left">&nbsp;<input name="ub_fax" type="text" id="ub_fax" class="textform" size="12" maxlength="12" /></td>
                                                </tr>
												<tr><td height="15"></td></tr>
                                                <tr><td class="texto">&nbsp;<strong>Correo Electr&oacute;nico Municipio:</strong></td></tr>
                                                <tr><td align="left">&nbsp;<input name="ub_ema" type="text" id="ub_ema" class="textform" size="45" maxlength="50" /></td>
                                                </tr>
												<tr><td height="15"></td></tr>
                                                <tr><td class="texto">&nbsp;<strong>Horario de Atenci&oacute;n en Municipio:</strong></td></tr>
                                                <tr><td align="left">&nbsp;<input name="ub_hor" type="text" id="ub_hor" class="textform" size="45" maxlength="50" /></td>
                                                </tr>
												<tr><td height="15"></td></tr>
                                                <tr> 
                                                  <td align="center" valign="middle">
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
//$alcalde = trim( strtoupper( $_POST['alcalde'] ) );

/* Foto Alcalde */
if ($HTTP_POST_FILES["foto"]["name"] != "") {
if (is_uploaded_file($foto)) {
$upload_img = $HTTP_POST_FILES["foto"]["name"];
$dir_img_uploads = "../alcaldes/fotos/";
copy($foto, $dir_img_uploads . $upload_img);
$atimg = $upload_img;
} else { echo "$upload_img, No se ha podido Subir al Servidor<BR>"; }
} else { $atimg = ""; }



$res=mysql_query("SELECT idalcalde FROM alcaldes WHERE idcom='$comuna'") or die("Imposible Seleccionar Informacion de BDTabla.");
if(mysql_num_rows($res) == 0 )
{ //Ahora, podemos insertar la marca
    $res=mysql_query("INSERT INTO alcaldes(idcom, nombre, foto, biografia, ub_link, ub_dire, ub_fono, ub_fax, ub_ema, ub_horario) VALUES('$comuna','$alcalde','$atimg','$bio','$ub_link','$ub_dire','$ub_fono','$ub_fax','$ub_ema','$ub_hor')") or die("Imposible Almacenar Info en Alcaldes BDTabla.");
	mysql_close();
}   header("Location: $PHP_SELF?act=dmin");
}



if( $_GET[act] == "m" )
{
$res=mysql_query("SELECT * FROM alcaldes WHERE idalcalde=$id") or die("Error ... Imposible Seleccionar Info de Alcaldes en BDTabla.");
if($flgob = mysql_fetch_object($res)) {
   $comuna = $flgob->idcom;
   $alcalde = $flgob->nombre;
   $foto = $flgob->foto;
   $biografia = str_replace("<br>","\n",$flgob->biografia);
   $ub_link = $flgob->ub_link;
   $ub_dire = $flgob->ub_dire;
   $ub_fono = $flgob->ub_fono;
   $ub_fax = $flgob->ub_fax;
   $ub_ema = $flgob->ub_ema;
   $ub_horario = $flgob->ub_horario;
   $foto = $flgob->foto;
}
mysql_free_result($res); unset($flgob);
/*mysql_close();*/
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
                                      <td align="center" class="vdestacado">Formulario Actualizar Detalle Alcaldes</td>
                                   </tr>
                                   <tr><td>&nbsp;</td></tr>
                                   <tr> 
                                      <td align="center" valign="middle"> 
                                        <table width="65%" border="0" cellpadding="0" cellspacing="1" bgcolor="#D8CA94">
                                          <tr>
                                             <td bgcolor="#FFFFFF">
                                              <form action="<? $PHP_SELF?>?act=a" method="post" name="form" id="form" onsubmit="return vldalc();" enctype="multipart/form-data">
                                              <input type="hidden" name="global_qk" value="<?php echo $global_qk;?>">
											  <input type="hidden" name="id" value="<?php echo $id;?>">
                                              <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff" class="tableamd">
                                                <tr><td height="15" class="texto"></td></tr>
                                                <tr><td class="texto">&nbsp;<font color="#666666">Representante de la Comuna de:</font></td></tr>
                                                <tr><td align="left">&nbsp;
												    <?php
													$res=mysql_query("SELECT comuna FROM comuna WHERE id_com=$comuna") or die(mysql_error());
													if($flcom=mysql_fetch_object($res)) { $vcomuna = $flcom->comuna; }
													mysql_free_result($res); unset($flcom); mysql_close();?>
												    <input type="text" name="comuna" value="<?php echo $vcomuna;?>" disabled class="textform" >

												<tr><td height="5"></td></tr>
                                                <tr><td class="texto">&nbsp;<font color="#666666">Nombre Alcalde:</font></td></tr>
                                                <tr><td align="left">&nbsp;<input name="alcalde" type="text" id="alcalde" size="45" class="textform" maxlength="128" value="<?php echo $alcalde;?>"/></td>
                                                </tr>
												<tr><td height="5"></td></tr>
                                                <tr><td class="texto">&nbsp;<font color="#666666">Nombre Fotograf&iacute;a Adjuntada:</font></td></tr>
                                                <tr><td align="left">&nbsp;<input name="afoto" type="text" id="afoto" size="45" class="textform" value="<?php echo $foto;?>" disabled/></td>
                                                </tr>
												<tr><td height="5"></td></tr>
												<tr><td height="5"></td></tr>
                                                <tr><td class="texto">&nbsp;<font color="#666666">Adjuntar Nueva Fotograf&iacute;a de Alcalde:</font></td></tr>
                                                <tr><td align="left">&nbsp;<input name="foto" type="file" id="foto" size="45" class="textform" /></td>
                                                </tr>
												<tr><td height="5"></td></tr>
                                                <tr><td class="texto">&nbsp;<font color="#666666">Biograf&iacute;a Resumida:</font></td></tr>
                                                <tr><td align="center">&nbsp;<textarea name="bio" cols="65" rows="10" value="<?php echo $biografia;?>"><?php echo $biografia;?></textarea></td></tr>
                                                <tr><td height="5">&nbsp;</td></tr>
                                                <tr><td class="texto">&nbsp;<font color="#666666">Enlace a Sitio Web Municipio:</font></td></tr>
                                                <tr><td align="left">&nbsp;<input name="ub_link" type="text" id="ub_link" class="textform" size="45" maxlength="128" value="<?php echo $ub_link;?>" /></td>
                                                </tr>
												<tr><td height="15"></td></tr>
                                                <tr><td class="texto">&nbsp;<font color="#666666">Direcci&oacute;n Municipio:</font></td></tr>
                                                <tr><td align="left">&nbsp;<input name="ub_dire" type="text" id="ub_dire" class="textform" size="45" maxlength="128" value="<?php echo $ub_dire;?>" /></td>
                                                </tr>
												<tr><td height="15"></td></tr>
                                                <tr><td class="texto">&nbsp;<font color="#666666">Tel&eacute;fono Municipio:</font></td></tr>
                                                <tr><td align="left">&nbsp;<input name="ub_fono" type="text" id="ub_fono" class="textform" size="12" maxlength="12"  value="<?php echo $ub_fono;?>"/></td>
                                                </tr>
												<tr><td height="15"></td></tr>
                                                <tr><td class="texto">&nbsp;<font color="#666666">Fax Municipio:</font></td></tr>
                                                <tr><td align="left">&nbsp;<input name="ub_fax" type="text" id="ub_fax" class="textform" size="12" maxlength="12"  value="<?php echo $ub_fax;?>"/></td>
                                                </tr>
												<tr><td height="15"></td></tr>
                                                <tr><td class="texto">&nbsp;<font color="#666666">Correo Electr&oacute;nico Municipio:</font></td></tr>
                                                <tr><td align="left">&nbsp;<input name="ub_ema" type="text" id="ub_ema" class="textform" size="45" maxlength="50"  value="<?php echo $ub_ema;?>"/></td>
                                                </tr>
												<tr><td height="15"></td></tr>
                                                <tr><td class="texto">&nbsp;<font color="#666666">Horario de Atenci&oacute;n en Municipio:</font></td></tr>
                                                <tr><td align="left">&nbsp;<input name="ub_hor" type="text" id="ub_hor" class="textform" size="45" maxlength="50"  value="<?php echo $ub_horario;?>"/></td>
                                                </tr>
												<tr><td colspan="2" height="15"></td></tr>
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
//$alcalde = trim( strtoupper( $_POST['alcalde'] ) );

/* Foto Alcalde */
if ($HTTP_POST_FILES["foto"]["name"] != "") {
  if (is_uploaded_file($foto)) {
      $upload_img = $HTTP_POST_FILES["foto"]["name"];
      $dir_img_uploads = "../alcaldes/fotos/";
	  if($upload_img != $afoto ) {
         copy($foto, $dir_img_uploads . $upload_img);
         $atimg = $upload_img;
	     mysql_query("UPDATE alcaldes SET foto='$atimg' WHERE idalcalde='$id'") or die("Error ... Imposible Actualizar Fotografia Alcalde.");
	     if(!empty( $afoto ) ) {
            unlink("../alcaldes/fotos/".$afoto);
            clearstatcache();
	     }
      }
  } else { echo "$upload_img, No se ha podido Subir al Servidor<BR>"; }
} else { $atimg = ""; }

  // Actualizar Info de Alcalde
     mysql_query("UPDATE alcaldes SET nombre='$alcalde', biografia='$bio', ub_link='$ub_link', ub_dire='$ub_dire', ub_fono='$ub_fono', ub_fax='$ub_fax', ub_ema='$ub_ema', ub_horario='$ub_hor' WHERE idalcalde='$id'") or die(mysql_error());
	 mysql_close();
	 header("Location: $PHP_SELF?act=dmin");
}

} else{
  // No se encuentra logeado el usuario
  header("Location: nologin.html");
}

?>
