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
function vldcon() {
  if(document.form.origen.value == '0')
  {
    document.form.origen.focus();
    alert('Debe Señalar Quien Convoca el Concurso');
    return false;
  }
  if(document.form.titulo.value == '')
  {
    document.form.titulo.focus();
    alert('Debe Especificar un Título Mediante el Cual se Relacione el Concurso');
    return false;
  }
  if(document.form.intro.value == '')
  {
    document.form.intro.focus();
    alert('Debe Señalar un texto introductorio para el concurso.');
    return false;
  }
  if(document.form.requisito.value == '')
  {
    document.form.requisito.focus();
    alert('Debe Señalar que Requisitos debe Cumplir el Participante');
    return false;
  }
  if(document.form.descemail.value == '')
  {
    document.form.descemail.focus();
    alert('Debe Detallar una Glosa que Aparecerá en el Campo Asunto al enviar el Email del Participante.');
    return false;
  }
  if(document.form.email.value == '')
  {
    document.form.email.focus();
    alert('Debe Especificar quien (cuenta correo electrónico) recepcionará las postulaciones.');
    return false;
  }
  if(document.form.recepcion.value == '')
  {
    document.form.recepcion.focus();
    alert('Debe Especificar Detalles en cuanto a la Recepción de Antecedentes.');
    return false;
  }
  if(document.form.fecha.value == 'dd/mm/aaaa')
  {
    document.form.fecha.focus();
    alert('Debe Estipular una Fecha de Inicio para el Llamado a Concurso.');
    return false;
  }
  if(document.form.fechaf.value == 'dd/mm/aaaa')
  {
    document.form.fechaf.focus();
    alert('Debe Estipular una Fecha de Término para el Llamado a Concurso.');
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
                    de <strong><a href="<? $PHP_SELF?>?act=dmin" class="enlace">Concursos P&uacute;blicos</a></strong></span></div></td>
              </tr>
              <tr> 
                <td align="right"><span class="info"><a href="<? $PHP_SELF?>?act=k" class="boton">Agregar 
                  Concurso [+]</a>&nbsp;&nbsp;</span></td>
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

								   $ssql = "SELECT id, titulo FROM concurso";
								   $rs = mysql_query($ssql);
								   $num_total_registros = mysql_num_rows($rs);

								/* calculo el total de p&aacute;ginas */
								   $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
								/* pongo el n&uacute;mero de registros total, el tama&ntilde;o de p&aacute;gina y la p&aacute;gina que se muestra */
								   $maxpags= 4;
								   $minimo = $maxpags ? max(1, $compag-ceil($maxpags/2)): 1;
								   $maximo = $maxpags ? min($total_paginas, $pagina+floor($maxpags/2)): $total_paginas;

								/* construyo la sentencia SQL */
								   $ssql = "SELECT id, titulo FROM concurso LIMIT ". $inicio . "," . $TAMANO_PAGINA;
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
                                      <td align="center" class="vdestacado">Formulario Crear Detalle Concurso P&uacute;blico</td>
                                   </tr>
                                   <tr><td>&nbsp;</td></tr>
                                   <tr> 
                                      <td align="center" valign="middle"> 
                                        <table width="65%" border="0" cellpadding="0" cellspacing="1" bgcolor="#D8CA94">
                                          <tr>
                                             <td bgcolor="#FFFFFF">
                                              <form action="<? $PHP_SELF ?>?act=g" method="post" name="form" id="form" onsubmit="return vldcon();">
                                              <input type="hidden" name="global_qk" value="<?php echo $global_qk;?>">
											  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff" class="tableamd">
                                                <tr><td  height="5" class="texto"></td></tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Origen Concurso:</td></tr>
												<tr>
                                                  <td align="center">
												     <select name="origen" size="1" class="selectform">
													   <option value="0">Seleccione Origen del Concurso...</option>
													   <option value="1">Gobierno Regional</option>
													   <option value="2">Intendencia</option>
													   <option value="3">Servicio Publico</option>
													 </select>
												  </td>
												</tr>
                                                <tr><td height="5">&nbsp;</td></tr>
                                                <tr><td class="texto">&nbsp;T&iacute;tulo Concurso:</td></tr>
												<tr>
                                                  <td align="center"><input name="titulo" type="text" id="titulo" size="50" class="textform" maxlength="255" /></td>
                                                </tr>
                                                <tr><td height="5">&nbsp;</td></tr>
                                                <tr><td class="texto">&nbsp;Introducci&oacute;n Llamado a Concurso:</td></tr>
												<tr>
                                                  <td align="center"><textarea name="intro" id="intro" rows="7" cols="45" /></textarea></td>
                                                </tr>
                                                <tr><td height="5">&nbsp;</td></tr>
												
												<tr><td class="texto">&nbsp;Cargo:</td></tr>
												<tr>
                                                  <td align="center"><input name="cargo" type="text" id="cargo" size="50" class="textform" maxlength="128" /></td>
                                                </tr>
                                                <tr><td height="5">&nbsp;</td></tr>
												
												<tr><td class="texto">&nbsp;Grado:</td></tr>
												<tr>
                                                  <td align="center"><input name="grado" type="text" id="grado" size="50" class="textform" maxlength="128" /></td>
                                                </tr>
                                                <tr><td height="5">&nbsp;</td></tr>
												
												<tr><td class="texto">&nbsp;Remuneraci&oacute;n:</td></tr>
												<tr>
                                                  <td align="center"><input name="remunera" type="text" id="remunera" size="9" class="textform" maxlength="9" /></td>
                                                </tr>
                                                <tr><td height="5">&nbsp;</td></tr>
												
                                                <tr><td class="texto">&nbsp;Detalle de Requisitos:</td></tr>
												<tr>
                                                  <td align="center"><textarea name="requisito" id="requisito" rows="7" cols="45" /></textarea></td>
                                                </tr>
                                                <tr><td height="5">&nbsp;</td></tr>
                                                <tr><td class="texto">&nbsp;Descripci&oacute;n en Campo Asunto para env&iacute;o de Email:</td></tr>
												<tr>
                                                  <td align="center"><input name="descemail" type="text" id="descemail" size="45" class="textform" maxlength="128" /></td>
                                                </tr>
                                                <tr><td height="5">&nbsp;</td></tr>

                                                <tr><td class="texto">&nbsp;Email de Quien Recepcionar&aacute; los antecedentes:</td></tr>
												<tr>
                                                  <td align="center"><input name="email" type="text" id="email" size="45" class="textform" maxlength="50" /></td>
                                                </tr>
                                                <tr><td height="5">&nbsp;</td></tr>
                                                <tr><td class="texto">&nbsp;Recepci&oacute;n de Antecedentes:</td></tr>
												<tr>
                                                  <td align="center"><textarea name="recepcion" id="recepcion" rows="7" cols="45" /></textarea></td>
                                                </tr>
                                                <tr><td height="5">&nbsp;</td></tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Fecha Inicio Recepci&oacute;n:</td></tr>
												<tr><td align="center">
												    <?php $fecha = date('d/m/Y');?>
												    <input name="fecha" type="text" id="fecha" value="<?php echo $fecha;?>" size="10" class="textform" maxlength="10"   onfocus="if(this.value=='<?php echo $fecha;?>')this.value='';" onblur="if(this.value=='')this.value='<?php echo $fecha;?>';"/></td></tr>
                                                <tr><td height="5">&nbsp;</td></tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Fecha T&eacute;rmino Recepci&oacute;n:</td></tr>
												<tr>
                                                  <td align="center"><input name="fechaf" type="text" id="fechaf" value="<?php echo $fecha;?>" size="10" class="textform" maxlength="10"  onfocus="if(this.value=='<?php echo $fecha;?>')this.value='';" onblur="if(this.value=='')this.value='<?php echo $fecha;?>';"/></td>
                                                </tr>
                                                <tr><td height="5">&nbsp;</td></tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Leyes a Cumplir:</td></tr>
												<tr>
                                                  <td align="center"><input type="checkbox" name="l575" value="1">Ley Nº18.575 <br>
                                                                   <input type="checkbox" name="l834" value="1">Ley Nº18.834 <br>
                                                                   <input type="checkbox" name="l300" value="1">Ley Nº19.300 <br>
												  
												  </td>
                                                </tr>
                                                <tr><td height="5">&nbsp;</td></tr>
                                                <tr> 
                                                  <td align="center" valign="middle">
                                                    <input name="crear" type="submit" id="crear" class="boton" value="Crear Concurso " />
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
/*$titulo = trim( strtoupper( $HTTP_POST_VARS['titulo'] ) );
$descemail = trim( strtoupper( $HTTP_POST_VARS['descemail'] ) );*/
if(!isset($l575)) { $l575 = "0"; }
if(!isset($l834)) { $l834 = "0"; }
if(!isset($l300)) { $l300 = "0"; }

/* Fecha */
$cfecini = split('[/.-]', $fecha);
$day = $cfecini[0];
$month = $cfecini[1];
$year = $cfecini[2];
$fecha = $year ."-". $month ."-". $day;

$cfecfin = split('[/.-]', $fechaf);
$day = $cfecfin[0];
$month = $cfecfin[1];
$year = $cfecfin[2];
$fechaf = $year ."-". $month ."-". $day;

$res=mysql_query("SELECT id FROM concurso WHERE titulo='$titulo' AND origen='$origen'") or die("Imposible Seleccionar Informacion de BDTabla.");
if(mysql_num_rows($res) == 0 )
{ //Ahora, podemos insertar la marca
    $res=mysql_query("INSERT INTO concurso(origen, titulo, intro, detreq, cargo, grado, remuneracion, detemail, email, fecini, fecfin, l575, l834, l300) VALUES('$origen','$titulo','$intro', '$requisito','$cargo','$grado','$remunera','$descemail','$email','$fecha','$fechaf','$l575','$l834','$l300')") or die("Imposible Almacenar Info en Llamado a Concurso en BDTabla.");
	mysql_close();
}    header("Location: $PHP_SELF?act=dmin");
}



if( $_GET[act] == "m" )
{
$res = mysql_query("SELECT * FROM concurso WHERE id=$id") or die(mysql_error());
if(mysql_num_rows($res) > 0 ) {
   $obj_con = mysql_fetch_object($res);
   $origen = $obj_con->origen;
   $titulo = $obj_con->titulo;
   $intro = str_replace( "<br>", "\n", $obj_con->intro );
   $cargo = $obj_con->cargo;
   $grado = $obj_con->grado;
   $remunera = $obj_con->remuneracion;
   $requisito = str_replace( "<br>", "\n", $obj_con->detreq );
   $descemail = $obj_con->detemail;
   $email = $obj_con->email;
   $recepcion = str_replace( "<br>", "\n", $obj_con->recepcion );
   list( $year, $mes, $dia ) = split( '[-.: ]', $obj_con->fecini );
   $fecha = $dia ."-". $mes ."-". $year;
   list( $year, $mes, $dia ) = split( '[-.: ]', $obj_con->fecfin );
   $fechaf = $dia ."-". $mes ."-". $year;
   $l575 = $obj_con->l575;
   $l834 = $obj_con->l834;
   $l300 = $obj_con->l300;
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
                                              <form action="<? $PHP_SELF ?>?act=a" method="post" name="form" id="form" onsubmit="return vldcon();">
                                              <input type="hidden" name="global_qk" value="<?php echo $global_qk;?>">
											  <input type="hidden" name="id" value="<?php echo $id;?>">
                                              <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff" class="tableamd">
                                                <tr><td  height="5" class="texto"></td></tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Origen Concurso:</td></tr>
												<tr>
                                                  <td align="center"><input type="text" name="origen" value="<?php if($origen=='1') { echo 'Gobierno Regional';} else { echo 'Intendencia';}?>" disabled  class="textform" alt=" Informaci&oacute;n no Modificable "/>
												  </td>
												</tr>
                                                <tr><td height="5">&nbsp;</td></tr>
                                                <tr><td class="texto">&nbsp;T&iacute;tulo Concurso:</td></tr>
												<tr>
                                                  <td align="center"><input name="titulo" type="text" id="titulo" size="50" class="textform" maxlength="255" value="<?php echo $titulo;?>" /></td>
                                                </tr>
                                                <tr><td height="5">&nbsp;</td></tr>
                                                <tr><td class="texto">&nbsp;Introducci&oacute;n Llamado a Concurso:</td></tr>
												<tr>
                                                  <td align="center"><textarea name="intro" id="intro" rows="7" cols="45" /><?php echo $intro;?></textarea></td>
                                                </tr>
                                                <tr><td height="5">&nbsp;</td></tr>
												<tr><td class="texto">&nbsp;Cargo:</td></tr>
												<tr>
                                                  <td align="center"><input name="cargo" type="text" id="cargo" size="50" class="textform" maxlength="128" value="<?php echo $cargo;?>"/></td>
                                                </tr>
                                                <tr><td height="5">&nbsp;</td></tr>
												
												<tr><td class="texto">&nbsp;Grado:</td></tr>
												<tr>
                                                  <td align="center"><input name="grado" type="text" id="grado" size="50" class="textform" maxlength="128" value="<?php echo $grado;?>"  /></td>
                                                </tr>
                                                <tr><td height="5">&nbsp;</td></tr>
												
												<tr><td class="texto">&nbsp;Remuneraci&oacute;n:</td></tr>
												<tr>
                                                  <td align="center"><input name="remunera" type="text" id="remunera" size="9" class="textform" maxlength="9" value="<?php echo $remunera;?>" /></td>
                                                </tr>


                                                <tr><td height="5">&nbsp;</td></tr>
                                                <tr><td class="texto">&nbsp;Detalle de Requisitos:</td></tr>
												<tr>
                                                  <td align="center"><textarea name="requisito" id="requisito" rows="7" cols="45" /><?php echo $requisito;?></textarea></td>
                                                </tr>
                                                <tr><td height="5">&nbsp;</td></tr>
                                                <tr><td class="texto">&nbsp;Descripci&oacute;n en Campo Asunto para env&iacute;o de Email:</td></tr>
												<tr>
                                                  <td align="center"><input name="descemail" type="text" id="descemail" size="45" class="textform" maxlength="128" value="<?php echo $descemail;?>" /></td>
                                                </tr>
                                                <tr><td height="5">&nbsp;</td></tr>

                                                <tr><td class="texto">&nbsp;Email de Quien Recepcionar&aacute; los antecedentes:</td></tr>
												<tr>
                                                  <td align="center"><input name="email" type="text" id="email" size="45" class="textform" maxlength="50" value="<?php echo $email;?>"/></td>
                                                </tr>
                                                <tr><td height="5">&nbsp;</td></tr>
                                                <tr><td class="texto">&nbsp;Recepci&oacute;n de Antecedentes:</td></tr>
												<tr>
                                                  <td align="center"><textarea name="recepcion" id="recepcion" rows="7" cols="45" /><?php echo $recepcion;?></textarea></td>
                                                </tr>
                                                <tr><td height="5">&nbsp;</td></tr>
                                                <tr> 
                                                <tr> 
                                                  <td class="texto">&nbsp;Fecha Inicio Recepci&oacute;n:</td></tr>
												<tr><td align="center">
												    <input name="fecha" type="text" id="fecha" value="<?php echo $fecha;?>" size="10" class="textform" maxlength="10"   onfocus="if(this.value=='<?php echo $fecha;?>')this.value='';" onblur="if(this.value=='')this.value='<?php echo $fecha;?>';"/></td></tr>
                                                <tr><td height="5">&nbsp;</td></tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Fecha T&eacute;rmino Recepci&oacute;n:</td></tr>
												<tr>
                                                  <td align="center"><input name="fechaf" type="text" id="fechaf" value="<?php echo $fechaf;?>" size="10" class="textform" maxlength="10"  onfocus="if(this.value=='<?php echo $fechaf;?>')this.value='';" onblur="if(this.value=='')this.value='<?php echo $fechaf;?>';"/></td>
                                                </tr>
                                                <tr><td height="5">&nbsp;</td></tr>
                                                <tr> 
                                                  <td class="texto">&nbsp;Leyes a Cumplir:</td></tr>
												<tr>
                                                  <td align="center"><input type="checkbox" name="l575" value="1" <?php if($l575 == "1") { echo "checked";}?>>Ley Nº18.575 <br>
                                                                   <input type="checkbox" name="l834" value="1"   <?php if($l834 == "1") { echo "checked";}?>>Ley Nº18.834 <br>
                                                                   <input type="checkbox" name="l300" value="1"   <?php if($l300 == "1") { echo "checked";}?>>Ley Nº19.300 <br>
												  </td>
                                                </tr>
                                                <tr><td height="5">&nbsp;</td></tr>
                                                <tr><td class="texto">&nbsp;Nombre de Quien se Adjudica el Concurso:</td></tr>
												<tr>
                                                  <td align="center"><input name="ganador" type="text" id="ganador" size="50" class="textform" maxlength="128"/></td>
                                                </tr>
                                                <tr><td height="25">&nbsp;</td></tr>

                                                <tr> 
                                                  <td align="center" valign="middle">
                                                    <input name="actualizar" type="submit" id="crear" class="boton" value="Actualizar Concurso " />
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
/*$titulo = trim( strtoupper( $titulo ) );
$descemail = trim( strtoupper( $descemail ) );
$ganador = trim( strtoupper( $ganador ) );*/
if(!isset($ganador)) { $ganador="";}
if(!isset($l575)) { $l575 = "0"; }
if(!isset($l834)) { $l834 = "0"; }
if(!isset($l300)) { $l300 = "0"; }

/* Fecha */
$cfecini = split('[/.-]', $fecha);
$day = $cfecini[0];
$month = $cfecini[1];
$year = $cfecini[2];
$fecha = $year ."-". $month ."-". $day;

$cfecfin = split('[/.-]', $fechaf);
$day = $cfecfin[0];
$month = $cfecfin[1];
$year = $cfecfin[2];
$fechaf = $year ."-". $month ."-". $day;


$res=mysql_query("SELECT id FROM concurso WHERE id=$id") or die("Imposible Seleccionar Informacion de BDTabla.");
if(mysql_num_rows($res) == 1 )
{ //Ahora, podemos insertar la marca
    $res=mysql_query("UPDATE concurso SET titulo='$titulo', intro='$intro', detreq='$requisito', cargo='$cargo', grado='$grado', remuneracion='$remunera',detemail='$descemail', email='$email', recepcion='$recepcion', fecini='$fecha', fecfin='$fechaf', ganador='$ganador', l575='$l575', l834='$l834', l300='$l300' WHERE id=$id") or die("Imposible Actualizar Info en Llamado a Concurso en BDTabla.");
	mysql_close();
}    header("Location: $PHP_SELF?act=dmin");
}

} else{
  // No se encuentra logeado el usuario
  header("Location: nologin.html");
}
?>
