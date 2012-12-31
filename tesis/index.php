<?php
include("bd/conecta.php");
$link = conexion();
?>
<html>
<head>
<title>&middot;::&middot; Gobierno Regional de Coquimbo &middot;&middot;&middot;: Tesis :&middot;&middot;&middot;</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="imagenes/gore.ico" rel="SHORTCUT ICON">
<link href="estilo/tesis.css" rel="stylesheet" type="text/css">
<script src="js/fecha.js" type="text/javascript"></script>
<script language="JavaScript" type="text/javascript">
  function subWin(loc, nom, ancho, alto, posx, posy) {
    var options="toolbar=0,status=0,menubar=0,scrollbars=1,resizable=1,location=0,directories=0,width=" + ancho + ",height=" + alto;      
        
    win = window.open(loc, nom, options);                 
    win.focus();
    win.moveTo(posx, posy);    
  }

function vldstarea () {
  if(document.formstarea.st_area.value == '-') {
     document.formstarea.st_area.focus();
	 alert('Seleccione un Area.');
	 return false;
  } else {
     document.formstarea.submit();
	 return true;
  }
}
function vldsttipo () {
  if(document.formsttipo.st_tipo.value == '-') {
     document.formsttipo.st_tipo.focus();
	 alert('Seleccione un Tipo.');
	 return false;
  } else {
     document.formsttipo.submit();
	 return true;
  }
}
function vldtit () {
  if(document.formtit.ctitulo.value == '') {
     document.formtit.ctitulo.focus();
	 alert('Debe escribir alguna palabra.');
	 return false;
  } else {
     document.formtit.submit();
	 return true;
  }
}
function vldarea () {
  if(document.formarea.carea.value == '-') {
     document.formarea.carea.focus();
	 alert('Seleccione un Area.');
	 return false;
  } else {
     document.formarea.submit();
	 return true;
  }
}
function vldtipo () {
  if(document.formtipo.ctipo.value == '-') {
     document.formtipo.ctipo.focus();
	 alert('Seleccione un Tipo.');
	 return false;
  } else {
     document.formtipo.submit();
	 return true;
  }
}
function vldinst () {
  if(document.forminst.cinst.value == '-') {
     document.forminst.cinst.focus();
	 alert('Seleccione una Institucion.');
	 return false;
  } else {
     document.forminst.submit();
	 return true;
  }
}
</script>
<style type="text/css">
<!--
.Estilo1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-weight: bold;
}
-->
</style>
</head>
<body bgcolor="#eaeaeb">
<table width="750" border="0" cellpadding="0" cellspacing="1" bgcolor="#333333">
  <tr><td>
<table width="750" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="75" height="75" bgcolor="#F2F2F2"><img src="imagenes/logogore.png" width="75" height="75"></td>
    <td bgcolor="#C6CFE5"><img src="imagenes/bnppal.png" width="675" height="75"></td>
  </tr>
</table>
<table width="750" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#FFFFFF" height="1"></td>
  </tr>
</table>
<table width="750" border="0" cellpadding="0" cellspacing="0">
  <tr>
          <td bgcolor="#5475C6" align="left" class="texto-peq">&nbsp;<a href="index.php">&laquo; 
            Volver Portada</a></td>
          <td bgcolor="#5475C6" align="right" class="texto-peq"><font color="#FFFFFF"> 
            <!-- INSERTAR FECHA -->
            <script language="JavaScript">
      <!--
document.write( dayNames[now.getDay()] + " " + now.getDate() + " de " + monthNames[now.getMonth()] + " " +" de " + year);
      // -->
      </script>
            &nbsp;&nbsp;</font> </td>
  </tr>
</table>
<table width="750" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td bgcolor="#FFFFFF" height="10"></td>
  </tr>
</table>
<table width="750" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr> 
    <td width="450" height="400" valign="top"><table width="445" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr> 
          <td align="center"><img src="imagenes/secport.png" width="438" height="60"></td>
        </tr>
        <tr> 
          <td><p><a href="../tesis/descargas.php" class="Estilo1">DESCARGAR TESIS</a><span class="texto-titr"><img src="imagenes/nuevo.png" alt="nuevo" border="0"></span></p>
            <p>&nbsp;</p></td>
        </tr>
        <tr>
          <td><table width="95%" border="0" cellspacing="1" cellpadding="0">
              <tr>
                      <td height="20" background="imagenes/bckimg-1.png" class="texto-titr"> 
                        Base de Datos Tesis Regionales, buscar:</td>
              </tr>
		      <tr> 
                <td bgcolor="#F2F2F2"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="tableform">
                   <tr><td height="15"></td></tr>
                    <tr>
                            <td valign="top" height="25">Por Instituci&oacute;n&nbsp;</td>
                          </tr>
                     <tr><td align="right" valign="middle"> 
                        <form action="tsis1.php" method="post" name="forminst" onSubmit="return vldinst();">
					      <?php 
				   $res = mysql_query("SELECT * FROM institucion WHERE idinst != 1 ORDER BY institucion") or die( mysql_error());
				   if(mysql_num_rows($res) > 0 ) {
				      $xpos = 0;
					  $Iins[$xpos] = "-";
					  $Nins[$xpos] = " Seleccione Instituci&oacute;n... ";
					  $xpos++;
                      $Iins[$xpos] = "x";
					  $Nins[$xpos] = " Todas las Instituciones ";
					  $xpos++;
					  
					  while($flinst=mysql_fetch_object($res)) {
					    $Iins[$xpos] = $flinst->idinst;
						$Nins[$xpos] = $flinst->institucion;
						$xpos++;
					  } ?>
					      <select name="cinst" size="1" id="cinst">
                            <?php for($ypos=0; $ypos < $xpos; $ypos++) { ?>
                            <option value="<?php echo $Iins[$ypos];?>"><?php echo $Nins[$ypos];?></option>
						<?php } ?>
					  </select><?php
                       unset($flinst);
				   } mysql_free_result($res);?>
						  <input type="submit" name="bscinst" value=" ir ">
                        </form></td>
                    </tr>
                    <tr>
                            <td height="25" valign="top">Por Tipo de Tesis&nbsp;</td>
                          </tr>
                      <tr><td align="right" valign="middle"> 
                        <form action="tsis2.php" method="post" name="formtipo" onSubmit="return vldtipo();">
					      <?php
				   $res=mysql_query("SELECT * FROM tipo ORDER BY tipo") or die(mysql_error());
				   if(mysql_num_rows($res) > 0 ) {
				      $xt = 0;
					  $Ites[$xt] = "-";
					  $Ntes[$xt] = "Seleccione Tipo de Tesis... ";
					  $xt++;
					  
					  while($flxt=mysql_fetch_object($res) ) {
					     $Ites[$xt] = $flxt->idtipo;
						 $Ntes[$xt] = $flxt->tipo;
						 $xt++;
					  }?>
					      <select name="ctipo" size="1" id="ctipo">
                            <?php for($yt=0; $yt < $xt; $yt++) { ?>
                            <option value="<?php echo $Ites[$yt];?>"><?php echo $Ntes[$yt];?></option>
					  <?php } ?>
					  </select><?php
				   }
				   mysql_free_result($res); ?>
						  <input type="submit" name="bsctipo" value=" ir ">
                        </form></td>
                    </tr>
                    <tr>
                            <td valign="top" height="25">Por &Aacute;rea de Estudio&nbsp;</td>
                          </tr>
                      <tr><td align="right" valign="middle"> 
                        <form action="tsis3.php" method="post" name="formarea" onSubmit="return vldarea();">
					      <?php
				   $res=mysql_query("SELECT * FROM area ORDER BY area") or die(mysql_error());
				   if(mysql_num_rows($res) > 0 ) {
				      $xa = 0;
					  $Iare[$xa] = "-";
					  $Nare[$xa] = "Seleccione &Aacute;rea... ";
					  $xa++;
					  while($flxa=mysql_fetch_object($res) ) {
					     $Iare[$xa] = $flxa->idarea;
						 $Nare[$xa] = substr($flxa->area,0,50);
						 $xa++;
					  }?>
					      <select name="carea" size="1" id="carea">
                            <?php for($ya=0; $ya < $xa; $ya++) { ?>
                            <option value="<?php echo $Iare[$ya];?>"><?php echo $Nare[$ya];?></option>
					  <?php } ?>
					  </select><?php
				   }
				   mysql_free_result($res); ?>
						  <input type="submit" name="bscarea" value=" ir ">
                        </form></td>
                    </tr>
                    <tr valign="bottom"> 
                            <td height="15" valign="bottom">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Buscar 
                              por Palabra en T&iacute;tulo de Tesis</td>
                    </tr>
					<tr align="right"> 
                            <td align="right" valign="middle" > 
                              <form action="tsis0.php" method="post" name="formtit" onSubmit="return vldtit();">
					      <input name="ctitulo" type="text" id="ctitulo" size="80" maxlength="255">
						  <input type="submit" name="bsctitulo" value=" Buscar ">
                        </form></td>
                    </tr>                  </table></td>
              </tr>
            </table></td>
        </tr>
		<tr>
                <td height="5"></td>
              </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><table width="95%" border="0" cellspacing="1" cellpadding="0">
                    <tr>
                      <td><table width="95%" border="0" cellspacing="1" cellpadding="0">
                          <tr> 
                            <td height="20" background="imagenes/bckimg-1.png" class="texto-titr"> 
                              Ofertas Vigentes Temas de Estudio, buscar: <img src="imagenes/nuevo.png" border="0"></td>
                          </tr>
                          <tr> 
                            <td bgcolor="#F2F2F2"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="tableform">
                                <tr> 
                                  <td height="15"></td>
                                </tr>
                                <tr> 
                                  <td valign="top" height="25">Por Tipo de Estudio&nbsp;</td>
                                </tr>
                                  <tr><td align="right" valign="middle"> <form name="formsttipo" action="tsis_st01.php" method="post" onSubmit="return vldsttipo();">
                                      <?php
				   $res=mysql_query("SELECT * FROM tipo ORDER BY tipo") or die(mysql_error());
				   if(mysql_num_rows($res) > 0 ) {
				      $xr = 0;
					  $Irins[$xr] = "-";
					  $Nrins[$xr] = " Seleccione por Tipo de Estudio... ";
					  $xr++;
                      $Irins[$xr] = "x";
					  $Nrins[$xr] = " Todas los Tipos ";
					  $xr++;
					  
					  
					  while($flxt=mysql_fetch_object($res) ) {
					     $Irins[$xr] = $flxt->idtipo;
						 $Nrins[$xr] = $flxt->tipo;
						 $xr++;
					  }?>
                                      <select name="st_tipo" size="1" id="st_tipo">
                                        <?php for($yt=0; $yt < $xr; $yt++) { ?>
                                        <option value="<?php echo $Irins[$yt];?>"><?php echo $Nrins[$yt];?></option>
                                        <?php } ?>
                                      </select>
                                      <?php
				   }
				   mysql_free_result($res); ?>
                                      <input type="submit" name="bsc_tipost" value=" ir ">
                                    </form></td>
                                </tr>
                                <tr> 
                                  <td valign="top" height="25">Por &Aacute;rea 
                                    de Estudio&nbsp;</td>
                                </tr>
                                  <tr><td align="right" valign="middle"> <form action="tsis_st02.php" method="post" name="formstarea" onSubmit="return vldstarea();">
                                      <?php
				   $res=mysql_query("SELECT * FROM area ORDER BY area") or die(mysql_error());
				   if(mysql_num_rows($res) > 0 ) {
				      $xo = 0;
					  $Iarea[$xo] = "-";
					  $Narea[$xo] = " Seleccione por &Aacute;rea de Estudio... ";
					  $xo++;
                      $Iarea[$xo] = "x";
					  $Narea[$xo] = " Todas las &Aacute;rea ";
					  $xo++;
					  while($flxa=mysql_fetch_object($res) ) {
					     $Iarea[$xo] = $flxa->idarea;
						 $Narea[$xo] = substr($flxa->area,0,50);
						 $xo++;
					  }?>
                                      <select name="st_area" size="1" id="st_area">
                                        <?php for($ya=0; $ya < $xo; $ya++) { ?>
                                        <option value="<?php echo $Iarea[$ya];?>"><?php echo $Narea[$ya];?></option>
                                        <?php } ?>
                                      </select>
                                      <?php
				   }
				   mysql_free_result($res); ?>
                                      <input type="submit" name="bsc_areast" value=" ir ">
                                    </form></td>
                                </tr>
                              </table></td>
                          </tr>
                        </table>
                        
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <h6 class="Estilo1">&nbsp;</h6>
                      <p>&nbsp;</p></td>
                    </tr>
                  </table></td>
                  
                  
        </tr>
      </table>
      </td>
    <td width="300" valign="top"><table width="295" align="center" border="0" cellpadding="0" cellspacing="0">
              <tr> 
                <td height="20" align="center" background="imagenes/bckimg-1.png" bgcolor="#E3E3E3" class="texto-tit"><strong>Disposici&oacute;n 
                  de Tesis </strong></td>
              </tr>
              <tr> 
                <td height="200" valign="top" bgcolor="#F2F2F2" class="texto-tsis"><p>El 
                    Gobierno Regional de Coquimbo, en conjunto con los centros 
                    de estudios superiores de la regi&oacute;n, ponen a disposici&oacute;n 
                    de los estudiantes y usuarios en general, de una completa 
                    biblioteca con los trabajos de tesis que han desarrollado 
                    los estudiantes de las distintas casas de estudios de la regi&oacute;n.</p>
                  <p>En s&iacute;, ser&aacute; posible buscar informaci&oacute;n 
                    de acuerdo a par&aacute;metros de b&uacute;squedas como lo 
                    son: tipo de instituci&oacute;n, tipo de tesis, &aacute;rea 
                    de estudio de la tesis, a&ntilde;o de edici&oacute;n y t&iacute;tulo 
                    de la tesis.</p>
                  <p>Cualquier informaci&oacute;n extra con respecto a la tesis 
                    requerida, se podr&aacute; encontrar con un correo electr&oacute;nico 
                    de contacto de los estudiantes que desarrollaron tal tesis.</p>
                  <p>Cualquier informaci&oacute;n adicional con respecto a esta 
                    p&aacute;gina web, por favor remitirla a <a href="mailto:tesis@gorecoquimbo.cl?subject=Respecto Pagina Tesis">tesis@gorecoquimbo.cl</a></p>
                  <p>&nbsp;</p></td>
              </tr>
              <tr> 
                <td height="15" valign="top" bgcolor="#FFFFFF" class="texto-tsis">&nbsp;</td>
              </tr>
              <tr> 
                <td height="20" align="center" background="imagenes/bckimg-1.png" bgcolor="#E3E3E3" class="texto-tit"><strong>Solicitud 
                  de Temas <img src="imagenes/nuevo.png" width="45" height="10"></strong></td>
              </tr>
              <tr> 
                <td height="200" valign="top" bgcolor="#F2F2F2" class="texto-tsis"><p>Se 
                    dispone de una nueva secci&oacute;n para solicitar por parte 
                    de empresas temas que requieran estudios los cuales podr&aacute;n 
                    ser ingresados a fin que las instituciones y/o estudiantes 
                    de la regi&oacute;n puedan tener la posibilidad de conocer 
                    que ofertas existen para la formulaci&oacute;n de sus tesis.</p>
                  <p>Por lo tanto, si usted desea solicitar temas que requieran 
                    estudios, lo invitamos a ingresar su <strong><a href="tsis_st.php">Solicitud 
                    de Tema</a></strong>.</p>
                  <p>&nbsp;</p></td>
              </tr>
            </table></td>
  </tr>
</table>
<table border="0" width="750" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
<tr>
   <td><div id="lin-footer"></div></td>
</tr>
</table>
</td>
</tr>
</table>
<!-- Begin Nedstat Basic code -->
<!-- Title: Gobierno Regional de Coquimbo, Tesis -->
<!-- URL: http://www.gorecoquimbo.cl/tesis -->
<!--<script language="JavaScript" type="text/javascript" src="http://m1.nedstatbasic.net/basic.js">
</script>
<script language="JavaScript" type="text/javascript" >
<!--
  nedstatbasic("AC7hNQUr2AUBUbHV+OnaLewoIaug", 0);
// -->
<!--</script>-->
<noscript>

<!-- End Nedstat Basic code -->
</body>
</html>
