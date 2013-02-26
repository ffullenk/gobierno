<?php
session_start();
umask(0);
 include("conecta.php");
$link = Conexion();
$legal_require_php = "k28stv7s4";
global $global_qk;
$global_qk=0;
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
function vldeve() {
  if(document.form.origen.value == '0')
  {
    document.form.origen.focus();
    alert('Debe Señalar Quien Crea el Evento');
    return false;
  }
  if(document.form.titulo.value == '')
  {
    document.form.titulo.focus();
    alert('Debe Especificar un Título Mediante el Cual se Relacione el Evento');
    return false;
  }
  if(document.form.fecha.value == 'dd/mm/aaaa')
  {
    document.form.fecha.focus();
    alert('Debe Estipular una Fecha de Inicio para el Evento.');
    return false;
  }
  if(document.form.intro.value == '')
  {
    document.form.intro.focus();
    alert('Debe dar una Descripción el Evento.');
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
	color: #666;
	font-size: 11px;
	border:1px dotted black;
}
.selectform {
	font-family: Tahoma, Verdana, Arial;
	font-size: 10px;
	font-weight: normal;
	background-color: #FFFFFF;
	color: #666;
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
                <td bgcolor="#F2EEDB" ><div id="mencab"><span class="info">Administraci&oacute;n 
                    de <strong><a href="<? $PHP_SELF?>?act=dmin" class="enlace">Eventos Gobierno</a></strong></span></div></td>
              </tr>
              <tr> 
                <td align="right"><span class="info"><a href="<? $PHP_SELF?>?act=k" class="boton">Agregar 
                  Evento [+]</a>&nbsp;&nbsp;</span></td>
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

								   $ssql = "SELECT id, titulo FROM eventos";
								   $rs = mysql_query($ssql);
								   $num_total_registros = mysql_num_rows($rs);

								/* calculo el total de p&aacute;ginas */
								   $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
								/* pongo el n&uacute;mero de registros total, el tama&ntilde;o de p&aacute;gina y la p&aacute;gina que se muestra */
								   $maxpags= 4;
								   $minimo = $maxpags ? max(1, $compag-ceil($maxpags/2)): 1;
								   $maximo = $maxpags ? min($total_paginas, $pagina+floor($maxpags/2)): $total_paginas;

								/* construyo la sentencia SQL */
								   $ssql = "SELECT id, titulo FROM eventos LIMIT ". $inicio . "," . $TAMANO_PAGINA;
								   $rs = mysql_query($ssql);

								   while ($fila=mysql_fetch_object($rs))
								   { ?>
								    <tr>
									   <td><?php echo $fila->titulo; ?></td>
                                       <td width="5">&nbsp;</td>
                                       <td  align="center"><a href="<?php PHP_SELF?>?act=m&id=<?php echo $fila->id;?>" class="enlace">Modificar</a></td>
                                       <td width="2">&nbsp;</td>
                                       <td align="center"><a href="<?php PHP_SELF?>?act=e&id=<?php echo $fila->id;?>" class="enlace">Eliminar</a></td>
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
                                      <td align="center" class="vdestacado">Formulario Crear Detalle Evento Gobierno</td>
                                   </tr>
                                   <tr><td>&nbsp;</td></tr>
                                   <tr> 
                                      <td align="center" valign="middle"> 
                                        <table width="65%" border="0" cellpadding="0" cellspacing="1" bgcolor="#D8CA94">
                                          <tr>
                                             <td bgcolor="#FFFFFF">
                                              <form action="<? $PHP_SELF ?>?act=g" method="post" name="form" id="form" onsubmit="return vldeve();">
                                              <input type="hidden" name="global_qk" value="<?php echo $global_qk;?>">
											  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff" class="tableamd">
                                                <tr><td  height="5" class="texto"></td></tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Origen Evento:</td></tr>
												<tr>
                                                  <td align="center">
												     <select name="origen" size="1" class="selectform">
													   <option value="0">Seleccione Origen del Evento...</option>
													   <option value="1">Evento del GORE</option>
													   <option value="2">Evento de Intendencia</option>
													   <option value="3">Evento de Servicio Publico</option>
													 </select>
												  </td>
												</tr>
                                                <tr><td height="5">&nbsp;</td></tr>
                                                <tr><td class="texto">&nbsp;T&iacute;tulo Evento:</td></tr>
												<tr>
                                                  <td align="center"><input name="titulo" type="text" id="titulo" size="50" class="textform" maxlength="255" /></td>
                                                </tr>
                                                <tr><td height="5">&nbsp;</td></tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Fecha del Evento:</td></tr>
												<tr><td align="center">
												    <?php $fecha = date('d/m/Y');?>
												    <input name="fecha" type="text" id="fecha" value="<?php echo $fecha;?>" size="10" class="textform" maxlength="10"   onfocus="if(this.value=='<?php echo $fecha;?>')this.value='';" onblur="if(this.value=='')this.value='<?php echo $fecha;?>';"/></td></tr>
                                                <tr><td height="5">&nbsp;</td></tr>

                                                <tr><td class="texto">&nbsp;Descripci&oacute;n Evento:</td></tr>
												<tr>
                                                  <td align="center"><textarea name="intro" id="intro" rows="7" cols="45" /></textarea></td>
                                                </tr>
                                                <tr><td height="5">&nbsp;</td></tr>
												
												<tr><td class="texto">&nbsp;Logo Evento:</td></tr>
												<tr>
                                                  <td align="center"><input name="logo" type="file" id="logo" size="50" class="textform"/></td>
                                                </tr>
                                                <tr><td height="5">&nbsp;</td></tr>
                                                <tr><td height="5">&nbsp;</td></tr>
												
												<tr><td class="texto">&nbsp;Adjuntar Imagen:</td></tr>
												<tr>
                                                  <td align="center"><input name="imagen" type="file" id="imagen" size="50" class="textform"/></td>
                                                </tr>
                                                <tr><td height="5">&nbsp;</td></tr>
												
												<tr><td class="texto">&nbsp;Adjuntar Documento:</td></tr>
												<tr>
                                                  <td align="center"><input name="docto" type="file" id="docto" size="50" class="textform"/></td>
                                                </tr>
                                                <tr><td height="5">&nbsp;</td></tr>
                                                <tr><td class="texto">&nbsp;Nombre Contacto:</td></tr>
												<tr>
                                                  <td align="center"><input name="ub_cont" type="text" id="ub_cont" size="45" class="textform" maxlength="128" /></td>
                                                </tr>
                                                <tr><td height="5">&nbsp;</td></tr>
                                                <tr><td class="texto">&nbsp;Direcci&oacute;n Contacto:</td></tr>
												<tr>
                                                  <td align="center"><input name="ub_dire" type="text" id="ub_dire" size="45" class="textform" maxlength="128" /></td>
                                                </tr>
                                                <tr><td height="5">&nbsp;</td></tr>
                                                <tr><td class="texto">&nbsp;Ciudad Contacto:</td></tr>
												<tr>
                                                  <td align="center"><input name="ub_ciu" type="text" id="ub_ciu" size="25" class="textform" maxlength="25" /></td>
                                                </tr>
                                                <tr><td height="5">&nbsp;</td></tr>
                                                <tr><td class="texto">&nbsp;Fono Contacto:</td></tr>
												<tr>
                                                  <td align="center"><input name="ub_fono" type="text" id="ub_fono" size="12" class="textform" maxlength="12" /></td>
                                                </tr>
                                                <tr><td class="texto">&nbsp;Email Contacto:</td></tr>
												<tr>
                                                  <td align="center"><input name="email" type="text" id="email" size="45" class="textform" maxlength="50" /></td>
                                                </tr>
                                                <tr><td height="5">&nbsp;</td></tr>
                                                <tr><td class="texto">&nbsp;Enlace Web Relacionado con Evento:</td></tr>
												<tr>
                                                  <td align="center"><input name="ub_link" type="text" id="ub_link" size="45" class="textform" maxlength="128" /></td>
                                                </tr>
                                                <tr><td height="5">&nbsp;</td></tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Activar Contacto:</td></tr>
												<tr>
                                                  <td align="center"><input type="radio" name="activa" value="1" checked>Activado &nbsp;
                                                                   <input type="radio" name="activa" value="0">No 
												  
												  </td>
                                                </tr>
                                                <tr><td height="5">&nbsp;</td></tr>
                                                <tr> 
                                                  <td align="center" valign="middle">
                                                    <input name="crear" type="submit" id="crear" class="boton" value="Crear Evento " />
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
$titulo = trim( strtoupper( $HTTP_POST_VARS['titulo'] ) );

/* Fecha */
$cfecini = split('[/.-]', $fecha);
$day = $cfecini[0];
$month = $cfecini[1];
$year = $cfecini[2];
$fecha = $year ."-". $month ."-". $day;

if($origen == "1") { 
   $dir_img_uploads = "../eventos/gobierno/imagenes/";
   $dir_doc_uploads = "../eventos/gobierno/doctos/";
   $dir_eve_uploads = "../eventos/gobierno/logos/";
} elseif($origen == "2") {
   $dir_img_uploads = "../eventos/intendencia/imagenes/";
   $dir_doc_uploads = "../eventos/intendencia/doctos/";
   $dir_eve_uploads = "../eventos/intendencia/logos/";   
} elseif($origen == "3") {
   $dir_img_uploads = "../eventos/servicios/imagenes/";
   $dir_doc_uploads = "../eventos/servicios/doctos/";
   $dir_eve_uploads = "../eventos/servicios/logos/";   
}

/* Imagen atachada */
if ($HTTP_POST_FILES["imagen"]["name"] != "") {
if (is_uploaded_file($imagen)) {
$upload_img = $HTTP_POST_FILES["imagen"]["name"];
copy($imagen, $dir_img_uploads . $upload_img);
$atimg = $upload_img;
} else { echo "$upload_img, No se ha podido Subir al Servidor<BR>"; }
} else { $atimg = ""; }


/* Documento atachado */
if ($HTTP_POST_FILES["docto"]["name"] != "") {
if (is_uploaded_file($docto)) {
$upload_doc = $HTTP_POST_FILES["docto"]["name"];
copy($docto, $dir_doc_uploads . $upload_doc);
$atdoc = $upload_doc;
} else { echo "$upload_doc, No se ha podido Subir al Servidor<BR>"; }
} else { $atdoc = ""; }

/* Documento atachado */
if ($HTTP_POST_FILES["logo"]["name"] != "") {
if (is_uploaded_file($logo)) {
$upload_log = $HTTP_POST_FILES["logo"]["name"];
copy($logo, $dir_eve_uploads . $upload_log);
$atlog = $upload_log;
} else { echo "$upload_log, No se ha podido Subir al Servidor<BR>"; }
} else { $atlog = ""; }

$res=mysql_query("SELECT id FROM eventos WHERE titulo='$titulo' AND tipo='$origen'") or die("Imposible Seleccionar Informacion de BDTabla.");
if(mysql_num_rows($res) == 0 )
{ //Ahora, podemos insertar la marca
    $res=mysql_query("INSERT INTO eventos(tipo, titulo, fecha, descripcion, logoev, imagen, adjunto, ub_dire, ub_ciu, ub_fono, ub_ema, ub_link, ub_cont, activo) VALUES('$origen','$titulo','$fecha','$intro','$logo','$atimg','$atdoc','$ub_dire','$ub_ciu','$ub_fono','$email','$ub_link','$ub_cont','$activa')") or die("Imposible Almacenar Info de Evento en BDTabla.");
	mysql_close();
}    header("Location: $PHP_SELF?act=dmin");
}



if( $_GET[act] == "m" )
{
$res = mysql_query("SELECT * FROM eventos WHERE id=$id") or die(mysql_error());
if(mysql_num_rows($res) > 0 ) {
   $obj_con = mysql_fetch_object($res);
   $origen = $obj_con->tipo;
   $titulo = $obj_con->titulo;
   list( $year, $mes, $dia ) = split( '[-.: ]', $obj_con->fecha );
   $fecha = $dia ."-". $mes ."-". $year;
   $intro = str_replace( "<br>", "\n", $obj_con->descripcion );
   $imagen = $obj_con->imagen;
   $docto = $obj_con->docto;
   $ub_dire = $obj_con->ub_dire;
   $ub_ciu = $obj_con->ub_ciu;
   $ub_fono = $obj_con->ub_fono;
   $email = $obj_con->ub_ema;
   $ub_cont = $obj_con->ub_cont;
   $activa = $obj_con->activo;
   $ub_link = $obj_con->ub_link;
   $logeve = $obj_con->logoev;
}
mysql_free_result($res);   
mysql_close($link);
   
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
                                      <td align="center" class="vdestacado">Formulario Actualizar Detalle Concurso P&uacute;blico</td>
                                   </tr>
                                   <tr><td>&nbsp;</td></tr>
                                   <tr> 
                                      <td align="center" valign="middle"> 
                                        <table width="65%" border="0" cellpadding="0" cellspacing="1" bgcolor="#D8CA94">
                                          <tr>
                                             <td bgcolor="#FFFFFF">
                                              <form action="<? $PHP_SELF ?>?act=a" method="post" name="form" id="form" onsubmit="return vldeve();" enctype="multipart/form-data">
                                              <input type="hidden" name="global_qk" value="<?php echo $global_qk;?>">
											  <input type="hidden" name="id" value="<?php echo $id;?>">
											  <input type="hidden" name="origen" value="<?php echo $origen;?>">
                                              <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff" class="tableamd">
                                                <tr><td  height="5" class="texto"></td></tr>

                                                <tr><td class="texto">&nbsp;Origen Evento:</td></tr>
												<tr><td align="center"><input type="text" name="origen" class="textform"  value="<?php if($origen=='1') { echo 'Evento del GORE';} elseif($origen =='2' ) { echo 'Evento de Intendencia';} else { echo 'Evento de Cultura';} ?>" disabled /></td></tr>

                                                <tr><td height="5">&nbsp;</td></tr>
                                                <tr><td class="texto">&nbsp;T&iacute;tulo Evento:</td></tr>
												<tr><td align="center"><input name="titulo" type="text" id="titulo" size="50" class="textform" maxlength="255" value="<?php echo $titulo;?>" /></td></tr>
                                                <tr><td height="5">&nbsp;</td></tr>
												
                                                <tr><td class="texto">&nbsp;Fecha del Evento:</td></tr>
												<tr><td align="center"><input name="fecha" type="text" id="fecha" value="<?php echo $fecha;?>" size="10" class="textform" maxlength="10" onfocus="if(this.value=='<?php echo $fecha;?>')this.value='';" onblur="if(this.value=='')this.value='<?php echo $fecha;?>';"/></td></tr>
                                                <tr><td height="5">&nbsp;</td></tr>

                                                <tr><td class="texto">&nbsp;Descripci&oacute;n Evento:</td></tr>
												<tr><td align="center"><textarea name="intro" id="intro" rows="7" cols="45" value="<?php echo $intro;?>" /><?php echo $intro;?></textarea></td></tr>
                                                <tr><td height="5">&nbsp;</td></tr>
												
												<tr><td class="texto">&nbsp;Logo Adjuntado :</td></tr>
												<tr><td align="center"><input name="alogo" type="text" id="alogo" size="50" class="textform" value="<?php echo $logoeve;?>" disabled/></td></tr>
                                                <tr><td height="5">&nbsp;</td></tr>


												<tr><td class="texto">&nbsp;Adjuntar Logo:</td></tr>
												<tr><td align="center"><input name="logo" type="file" id="logo" size="50" class="textform"/></td></tr>
                                                <tr><td height="5">&nbsp;</td></tr>
												
												
												<tr><td class="texto">&nbsp;Imagen Adjuntada :</td></tr>
												<tr><td align="center"><input name="aimagen" type="text" id="aimagen" size="50" class="textform" value="<?php echo $imagen;?>" disabled/></td></tr>
                                                <tr><td height="5">&nbsp;</td></tr>


												<tr><td class="texto">&nbsp;Adjuntar Imagen:</td></tr>
												<tr><td align="center"><input name="imagen" type="file" id="imagen" size="50" class="textform"/></td></tr>
                                                <tr><td height="5">&nbsp;</td></tr>
												
												<tr><td class="texto">&nbsp;Documento Adjuntado :</td></tr>
												<tr><td align="center"><input name="adocto" type="text" id="adocto" size="50" class="textform" value="<?php echo $docto;?>" disabled/></td></tr>
                                                <tr><td height="5">&nbsp;</td></tr>

												<tr><td class="texto">&nbsp;Adjuntar Documento:</td></tr>
												<tr><td align="center"><input name="docto" type="file" id="docto" size="50" class="textform"/></td></tr>
                                                <tr><td height="5">&nbsp;</td></tr>
												
                                                <tr><td class="texto">&nbsp;Nombre Contacto:</td></tr>
												<tr>
                                                  <td align="center"><input name="ub_cont" type="text" id="ub_cont" size="45" class="textform" maxlength="128" value="<?php echo $ub_cont;?>" /></td>
                                                </tr>
                                                <tr><td height="5">&nbsp;</td></tr>
                                                <tr><td class="texto">&nbsp;Direcci&oacute;n Contacto:</td></tr>
												<tr>
                                                  <td align="center"><input name="ub_dire" type="text" id="ub_dire" size="45" class="textform" maxlength="128" value="<?php echo $ub_dire;?>" /></td>
                                                </tr>
                                                <tr><td height="5">&nbsp;</td></tr>
                                                <tr><td class="texto">&nbsp;Ciudad Contacto:</td></tr>
												<tr>
                                                  <td align="center"><input name="ub_ciu" type="text" id="ub_ciu" size="25" class="textform" maxlength="25" value="<?php echo $ub_ciu;?>" /></td>
                                                </tr>
                                                <tr><td height="5">&nbsp;</td></tr>
                                                <tr><td class="texto">&nbsp;Fono Contacto:</td></tr>
												<tr>
                                                  <td align="center"><input name="ub_fono" type="text" id="ub_fono" size="12" class="textform" maxlength="12" value="<?php echo $ub_fono;?>" /></td>
                                                </tr>
                                                <tr><td class="texto">&nbsp;Email Contacto:</td></tr>
												<tr>
                                                  <td align="center"><input name="email" type="text" id="email" size="45" class="textform" maxlength="50" value="<?php echo $email;?>" /></td>
                                                </tr>
                                                <tr><td height="5">&nbsp;</td></tr>
                                                <tr><td class="texto">&nbsp;Enlace Web Relacionado con Evento:</td></tr>
												<tr>
                                                  <td align="center"><input name="ub_link" type="text" id="ub_link" size="45" class="textform" maxlength="128" value="<?php echo $ub_link;?>" /></td>
                                                </tr>
                                                <tr><td height="5">&nbsp;</td></tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Activar Contacto:</td></tr>
												<tr>
                                                  <td align="center"><input type="radio" name="activa" value="1" <?php if($activa == "1") { echo "checked";}?> >Activado &nbsp;
                                                                   <input type="radio" name="activa" value="0" <?php if($activa == "0") { echo "checked";}?>>No 
												  </td>
                                                </tr>
                                                <tr><td height="5">&nbsp;</td></tr>
                                                <tr> 
                                                  <td align="center" valign="middle">
                                                    <input name="actualiza" type="submit" id="actualiza" class="boton" value="Actualizar Evento " />
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
$titulo = trim( strtoupper( $titulo ) );

/* Fecha */
$cfecini = split('[/.-]', $fecha);
$day = $cfecini[0];
$month = $cfecini[1];
$year = $cfecini[2];
$fecha = $year ."-". $month ."-". $day;

if($origen == "1") { 
   $dir_img_uploads = "../eventos/gobierno/imagenes/";
   $dir_doc_uploads = "../eventos/gobierno/doctos/";
   $dir_eve_uploads = "../eventos/gobierno/logos/";
} elseif($origen == "2") {
   $dir_img_uploads = "../eventos/intendencia/imagenes/";
   $dir_doc_uploads = "../eventos/intendencia/doctos/";
   $dir_eve_uploads = "../eventos/intendencia/logos/";
} elseif($origen == "3") {
   $dir_img_uploads = "../eventos/servicios/imagenes/";
   $dir_doc_uploads = "../eventos/servicios/doctos/";
   $dir_eve_uploads = "../eventos/servicios/logos/";
}


/* Imagen Evento */
if ($HTTP_POST_FILES["imagen"]["name"] != "") {
  if (is_uploaded_file($imagen)) {
      $upload_img = $HTTP_POST_FILES["imagen"]["name"];
	  if($upload_img != $aimagen ) {
         copy($imagen, $dir_img_uploads . $upload_img);
         $atimg = $upload_img;
	     mysql_query("UPDATE eventos SET logoev='$imagen' WHERE id='$id'") or die("Error ... Imposible Actualizar Imagen Relacionada Con Evento.");
	     if(!empty( $aimagen ) ) {
            unlink($dir_img_uploads.$afoto);
            clearstatcache();
	     }
      }
  } else { echo "$upload_img, No se ha podido Subir al Servidor<BR>"; }
} else { $atimg = ""; }


/* Documento Evento */
if ($HTTP_POST_FILES["docto"]["name"] != "") {
  if (is_uploaded_file($docto)) {
      $upload_doc = $HTTP_POST_FILES["docto"]["name"];
	  if($upload_doc != $adocto ) {
         copy($docto, $dir_doc_uploads . $upload_doc);
         $atdoc = $upload_doc;
	     mysql_query("UPDATE eventos SET adjunto='$docto' WHERE id='$id'") or die("Error ... Imposible Actualizar Documento Relacionado Con Evento.");
	     if(!empty( $adocto ) ) {
            unlink($dir_doc_uploads.$afoto);
            clearstatcache();
	     }
      }
  } else { echo "$upload_img, No se ha podido Subir al Servidor<BR>"; }
} else { $atdoc = ""; }


/* Logo Evento */
if ($HTTP_POST_FILES["logo"]["name"] != "") {
  if (is_uploaded_file($logo)) {
      $upload_log = $HTTP_POST_FILES["logo"]["name"];
	  if($upload_log != $adocto ) {
         copy($logo, $dir_eve_uploads . $upload_log);
         $atlog = $upload_log;
	     mysql_query("UPDATE eventos SET logoev='$logo' WHERE id='$id'") or die("Error ... Imposible Actualizar Documento Relacionado Con Evento.");
	     if(!empty( $alogo ) ) {
            unlink($dir_eve_uploads.$alogo);
            clearstatcache();
	     }
      }
  } else { echo "$upload_log, No se ha podido Subir al Servidor<BR>"; }
} else { $atlog = ""; }


$res=mysql_query("SELECT id FROM eventos WHERE id=$id") or die("Imposible Seleccionar Informacion de BDTabla.");
if(mysql_num_rows($res) == 1 )
{ //Ahora, podemos insertar la marca
    $res=mysql_query("UPDATE eventos SET tipo='$origen', titulo='$titulo', descripcion='$intro', ub_dire='$ub_dire', ub_ciu='$ub_ciu',ub_fono='$ub_fono', ub_ema='$email', ub_cont='$ub_cont', activo='$activa' WHERE id=$id") or die("Imposible Actualizar Info de Evento en BDTabla.");
	mysql_close();
}   header("Location: $PHP_SELF?act=dmin");
}

} else{
  // No se encuentra logeado el usuario
  header("Location: nologin.html");
}

?>
