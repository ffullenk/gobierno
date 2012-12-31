<?php
include("../bd/conecta.php");
$link = conexion();
$legal_require_php = "pvtemas";
global $global_qk, $nivel, $idins;
$global_qk=0;
include("detect.php");

function tsismens( $valor ) {
global $global_qk, $nivel, $idins;
?>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td align="left" class="texto-cab">&nbsp;Mensaje de Error</td>
        </tr>
        <tr><td height="35"></td></tr>
        <tr> 
          <td><?php echo $valor;?></td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
        </tr>
      </table>
<?php
}



function tsiscab() {
global $global_qk, $nivel, $idins;?>
<html>
<head>
<title>&middot;::&middot; Gobierno Regional de Coquimbo &middot;&middot;&middot;: Tesis :&middot;&middot;&middot;</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../estilo/tesis.css" rel="stylesheet" type="text/css">
<script src="../js/tesis.js" type="text/javascript"></script>
<script language="JavaScript">
  function subWin(loc, nom, ancho, alto, posx, posy) {
    var options="toolbar=0,status=0,menubar=0,scrollbars=1,resizable=1,location=0,directories=0,width=" + ancho + ",height=" + alto;      
        
    win = window.open(loc, nom, options);                 
    win.focus();
    win.moveTo(posx, posy);    
  }
</script>
<script language="JavaScript" type="text/javascript">
function vldtema() {
  if(document.formtemas.tipo.value == '-') {
     document.formtemas.focus();
	 alert('Debe Seleccionar el Tipo de Tema que desea ingresar.');
	 return false;
  }
  if(document.formtemas.area.value == '-') {
     document.formtemas.focus();
	 alert('Debe Seleccionar el Área a la cual pertenece el Tema que desea ingresar.');
	 return false;
  }
  if(document.formtemas.titulo.value == '') {
     document.formtemas.titulo.focus();
	 alert('Debe Colocar un Título para el Tema a Ingresar.');
	 return false;
  }
  if(document.formtemas.resumen.value == '') {
     document.formtemas.resumen.focus();
	 alert('Debe Digitar en Detalle un Resumen para el Tema a Solicitar.');
	 return false;
  } else {
     document.formtemas.submit();
	 return true;
  }
}

function vldfin() {
  if(document.formfin.conclusiones.value == '') {
     document.formfin.conclusiones.focus();
	 alert('Debe Detallar una Conclusion del Tema de Estudio.');
	 return false;
  } else {
     document.formfin.submit();
	 return true;
  }
}
</script>
</head>

<body bgcolor="#eaeaeb">
<table width="750" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr> 
    <td width="240" height="75" bgcolor="#C6CFE5"><img src="../imagenes/logogore.png" width="75" height="75"></td>
    <td width="256" valign="middle" bgcolor="#C6CFE5"> 
      <?php
		  $res=mysql_query("SELECT nombre, empresa, email FROM admemp WHERE id='$global_qk'") or die(mysql_error());
		  if(mysql_num_rows($res) > 0 ) {
		     $flres = mysql_fetch_object($res);
			 $empresa = $flres->empresa;
			 $email = $flres->email;
			 $nombre = $flres->nombre;
		  }
		  mysql_free_result($res); unset($flres);?>
      <table width="250" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center" class="texto-peq">Sesi&oacute;n de Trabajo de</td>
        </tr>
        <tr>
          <td align="center" class="texto-tit"><?php echo $empresa; ?>
		  </td>
        </tr>
        <tr>
          <td align="center" class="texto-peq">Contacto: <a href="mailto:<?php echo $email;?>"><?php echo $nombre;?></a></td>
        </tr>
      </table>
    </td>
    <td width="254" bgcolor="#C6CFE5">
<table width="250" border="0" cellpadding="0" cellspacing="0" bgcolor="#C6CFE5">
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="right" valign="top" bgcolor="#C6CFE5"> 
            <form action="logout.php" method="post">
	               <input type="hidden" name="global_qk" value="<?php echo $global_qk; ?>">
	               <input type="submit" name="checkout" value="Cerrar Sesi&oacute;n  ">
            </form>
            &nbsp;</td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<table width="750" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#FFFFFF" height="1"></td>
  </tr>
</table><table width="750" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#5475C6">&nbsp;</td>
  </tr>
</table>
<table width="750" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td bgcolor="#FFFFFF" height="10"></td>
  </tr>
 </table>
<table width="750" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr> 
    <td width="550" height="400" valign="top"> 
      <?php
}



function tsispie() {
global $global_qk, $nivel, $idins, $loginCorrecto; ?>
    </td>
    <td width="5" valign="top">&nbsp; </td>
    <td width="100" valign="top" bgcolor="#C6CFE5"><table width="180" border="0" align="right" cellpadding="0" cellspacing="0" bgcolor="#C6CFE5">
        <tr> 
          <td align="center" class="texto-tit">Directorio</td>
        </tr>
        <tr> 
          <td height="10"></td>
        </tr>
        <tr> 
          <td>
		      <table width="95%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#ffffff" class="table-menu">

              <tr> 
                <td align="center" bgcolor="#5475C6">Temas de Estudio</td>
              </tr>
              <tr> 
                <td bgcolor="#FFFFFF">&nbsp;<a href="<?php $PHP_SELF?>?s=pt">Principal 
                  Temas Solicitados</a></td>
              </tr>
              <tr> 
                <td bgcolor="#FFFFFF">&nbsp;<a href="<?php $PHP_SELF?>?s=at">Ingresar 
                  Solicitud de Tema</a></td>
              </tr>
            </table>
			</td>
        </tr>
        <tr> 
          <td height="10"></td>
        </tr>
        <tr> 
          <td height="10"></td>
        </tr>
        <tr> 
          <td height="10"></td>
        </tr>
        <tr> 
          <td height="75"></td>
        </tr>
      </table></td>
  </tr>
</table>
<table width="750" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
<tr>
   <td><div id="lin-footer"><strong>www.gorecoquimbo.cl:</strong>&nbsp;P&aacute;gina desarrollada por Luis Jim&eacute;nez Villalobos, Departamento de Inform&aacute;tica Servicio Administrativo GORE-COQUIMBO.</div></td>
</tr>
</table>
</body>
</html>
<?php }



if( $loginCorrecto ) {

if( (!$HTTP_GET_VARS[s] ) || ($HTTP_GET_VARS[s] == "d" ) ) {
tsiscab();
?>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td align="center">&nbsp;</td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
        </tr>
      </table>
<?php
tsispie();
}



if($HTTP_GET_VARS[s] == "pt" ) {
tsiscab();
?>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td align="left" class="texto-cab">&nbsp;usted se encuentra en <strong>Principal Administraci&oacute;n Temas de Estudios Solicitados</strong></td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td style="padding-left:2px;"><!-- Principio Paginacion Tesis -->
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<?php         /* Limito la busqueda */
                 $TAMANO_PAGINA = 30;

              /* examino la página a mostrar y el inicio del registro a mostrar */
                 $pagina = $HTTP_GET_VARS["pagina"];
                 if (!$pagina) { $inicio = 0; $pagina=1;
                 } else { $inicio = ($pagina - 1) * $TAMANO_PAGINA; }
									 
                 $ssql = "SELECT temas.id, idemp, temas.idtipo, tipo, temas.idarea, area, tituloestudio, fechasol, realizado FROM temas INNER JOIN tipo ON temas.idtipo=tipo.idtipo INNER JOIN area ON temas.idarea=area.idarea INNER JOIN admemp ON temas.idemp = admemp.id";
			     $ssql.= " WHERE admemp.id = \"$global_qk\" ";
				 $ssql.= " ORDER BY fechasol DESC";
                 $rs = mysql_query($ssql);
                 $num_total_registros = mysql_num_rows($rs);

                 /* calculo el total de páginas */
                    $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);

                 /* pongo el número de registros total, el tamaño de página y la página que se muestra */
                    $maxpags = 10;
                    $minimo = $maxpags ? max(1, $pagina-ceil($maxpags/2)): 1;
                    $maximo = $maxpags ? min($total_paginas, $pagina+floor($maxpags/2)): $total_paginas;

                 /* construyo la sentencia SQL */
                    $ssql.= " LIMIT ". $inicio . "," . $TAMANO_PAGINA;
                    $rs = mysql_query($ssql);
					$num_total_actual = mysql_num_rows($rs);
					$minreg = min(1, $num_total_actual );
					$maxreg = max(1,$num_total_registros);
					if($num_total_actual > 0 ) {?>
					<tr><td colspan="7" align="right" class="info"><div id="lin-base">mostrando <?php echo $pagina;?> de <?php echo $num_total_registros;?></div></td></tr>
                    <tr><td colspan="7" height="10"></td></tr><?php
					
                    while ($fila=mysql_fetch_object($rs)) { ?>                                                        
						   <tr>
						     <td class="secc-ppal" bgcolor="#FFFFFF">
						      <table border="0" cellpadding="0" cellspacing="0">
							    <tr>
								  <td class="texto-peq" >Tipo Estudio</td><td class="secc-ppal">:</td>
								  <td class="texto-peq" align="left"><font color="#943410"><?php echo $fila->tipo;?></font></td>
								</tr>
								<tr>
								  <td class="texto-peq">&Aacute;ea</td><td class="secc-ppal">:</td>
								  <td class="texto-peq" align="left"><font color="#943410"><?php echo $fila->area;?></font></td>
								</tr>
							  </table>
                            </td>
							<td width="5"></td>
							<td align="center">
							 <?php if($fila->realizado == "0" || empty($fila->realizado)) { ?>
							   <form action="<?php $PHP_SELF?>?s=ft" method="post">
                                  <input type="hidden" name="id" value="<?php echo $fila->id; ?>">
                                  <input type="image" border="0" src="../imagenes/btn_fin.png" alt=" Finalizar Tema " align="middle">
                                </form>
							 <?php } ?>
							</td>
                            <td width="5"></td>
							<td align="center"><form action="<?php $PHP_SELF?>?s=mt" method="post">
                                  <input type="hidden" name="id" value="<?php echo $fila->id; ?>">
                                  <input type="image" border="0" src="../imagenes/btn_mod.png" alt=" Modificar Registro " align="middle">
                                </form></td>
							<td width="5"></td>
							<td align="center"><form action="<?php $PHP_SELF;?>?s=et" method="post">
							    <input type="hidden"name="id" value="<?php echo $fila->id;?>">
								<input type="image" src="../imagenes/btn_eli.png" border="0" alt=" Eliminar Registro " align="middle">
								</form></td>
							</tr>
							<tr><td colspan="7" class="secc-ppal" ><strong><? echo $fila->tituloestudio;?></strong></td></tr>
							<tr><td colspan="7" height="5" style="padding-left:2px;"><div id="lin-div"></div></td></tr>
							<tr><td colspan="7" height="10" style="padding-left:2px;"></td></tr>
                     <?php } 
					 } ?>
                         </table>
		  </td><!-- FIN Paginacion Tesis -->
        </tr>
<?php

    /* cerramos el conjunto de resultados y la conexión con la base de datos */
    mysql_free_result($rs);
    //mysql_close();


   if ($total_paginas > 1)
   {?> <tr><td height="10" valign="middle" class="info" style="padding-left:2px;"><div id="lin-sup">mostrar m&aacute;s avisos en p&aacute;gina <?php
      for ($i=$minimo; $i<$pagina; $i++){
         echo "<a href='".$HTTP_SERVER["PHP_SELF"]."?s=pt&pagina=".$i."'>$i</a>&nbsp;";
      }
	  
	  echo "<font face='verdana' size='-2'>[". $pagina. "] </font>&nbsp;";

      for ($i=$pagina+1; $i<=$maximo; $i++){
         echo "<a href='".$HTTP_SERVER["PHP_SELF"]."?s=pt&pagina=".$i."'>$i</a>&nbsp;";
      }
   

   if($pagina<$total_paginas)
   {
     echo "&nbsp;<a href='".$HTTP_SERVER["PHP_SELF"]."?s=pt&pagina=" .($pagina+1). "'>";
     echo "<font face='verdana' size='-2'>siguiente &raquo;&raquo;</font></a>";
   }?> </div></td></tr> <?php
  } ?>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
      </table>
<?php
tsispie();
}



if($HTTP_GET_VARS[s] == "at" ) {
tsiscab();
?>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td align="left" class="texto-cab">&nbsp;usted se encuentra en <strong>Agregar Tema de Estudio</strong></td>
        </tr>
		<tr><td height="35"></td></tr>
        <tr> 
          <td><form name="formtemas" method="post" action="<?php $PHP_SELF?>?s=gt" onSubmit="return vldtemas();">
		     <input type="hidden" name="global_qk" value="<?php echo $global_qk;?>">
		  <table border="0" cellpadding="0" cellspacing="1" align="center" bgcolor="#666666">
		  <tr><td>
		     <table border="0" cellpadding="3" cellspacing="0" class="tableform" bgcolor="#E4E4E4">
			   <tr><td colspan="2" align="center" class="texto-tit">Ficha Ingreso de Solicitud de Temas de Estudio</td></tr>
			   <tr><td colspan="2" height="25"></td></tr>
			   <tr><td>Tipo</td>
			       <td><?php
				   $res=mysql_query("SELECT * FROM tipo ORDER BY tipo") or die(mysql_error());
				   if(mysql_num_rows($res) > 0 ) {
				      $xt = 0;
					  $Ites[$xt] = "-";
					  $Ntes[$xt] = "Seleccione Tipo de Tema Estudio... ";
					  $xt++;
					  
					  while($flxt=mysql_fetch_object($res) ) {
					     $Ites[$xt] = $flxt->idtipo;
						 $Ntes[$xt] = $flxt->tipo;
						 $xt++;
					  }?>
					  <select name="tipo" size="1">
					  <?php for($yt=0; $yt < $xt; $yt++) { ?>
					          <option value="<?php echo $Ites[$yt];?>"><?php echo $Ntes[$yt];?></option>
					  <?php } ?>
					  </select><?php
				   }
				   mysql_free_result($res); ?>
				   </td>
               </tr>
			   <tr><td colspan="2" height="5"></td></tr>
			   <tr><td>&Aacute;rea</td>
			       <td><?php
				   $res=mysql_query("SELECT * FROM area ORDER BY area") or die(mysql_error());
				   if(mysql_num_rows($res) > 0 ) {
				      $xa = 0;
					  $Iare[$xa] = "-";
					  $Nare[$xa] = "Seleccione &Aacute;rea del Tema... ";
					  $xa++;
					  while($flxa=mysql_fetch_object($res) ) {
					     $Iare[$xa] = $flxa->idarea;
						 $Nare[$xa] = $flxa->area;
						 $xa++;
					  }?>
					  <select name="area" size="1">
					  <?php for($ya=0; $ya < $xa; $ya++) { ?>
					          <option value="<?php echo $Iare[$ya];?>"><?php echo $Nare[$ya];?></option>
					  <?php } ?>
					  </select><?php
				   }
				   mysql_free_result($res); ?></td>
			   </tr>
			   <tr><td colspan="2" height="5"></td></tr>
			   <tr><td colspan="2">T&iacute;tulo Tema de Estudio</td></tr>
			   <tr><td colspan="2"><input type="text" name="titulo" size="100" maxlength="255"></td></tr>
			   <tr><td colspan="2" height="5"></td></tr>
			   <tr><td colspan="2">Resumen Ejecutivo Tema de Estudio Solicitado</td></tr>
			   <tr>
			      <td colspan="2">
				  <textarea name="resumen" rows="12" cols="55"></textarea>
				  </td>
			   </tr>
			   <tr><td colspan="2" height="5"></td></tr>
			   <tr><td colspan="2">Condiciones</td></tr>
			   <tr>
			      <td colspan="2">
				  <textarea name="condiciones" rows="12" cols="55"></textarea>
				  </td>
			   </tr>
			   <tr><td colspan="2" height="5"></td></tr>
			   <tr><td>Este Tema de Estudio ser&aacute; Pagado?</td>
			       <td><input type="radio" name="paga" value="1">Si &nbsp;&nbsp;&nbsp;
				       <input type="radio" name="paga"  value="0" checked>No
				   </td>
			   </tr>
			   <tr><td colspan="2" height="5"></td></tr>
			   <tr><td colspan="2">Otras Consideraciones</td></tr>
			   <tr>
			      <td colspan="2">
				  <textarea name="otro" rows="12" cols="55"></textarea>
				  </td>
			   </tr>
			   <tr><td colspan="2" height="35"></td></tr>
			   <tr><td colspan="2" height="45" align="center" valign="middle">
			       <input type="submit" name="ktma" value="  Grabar Tema  ">
				   </td>
			   </tr>
		   </table>
		  </td></tr>
		  </table></form>
		</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
      </table>
<?php
tsispie();
}


if($HTTP_GET_VARS[s] == "gt" ) {
   // Insertar Tesis
      $titulo = strtoupper($titulo);
      $res=mysql_query("SELECT id FROM temas WHERE tituloestudio='$titulo'") or die(mysql_error());
      if(mysql_num_rows($res) == 0 ) {
	     $fecha = date('Y-m-d');
         mysql_query("INSERT INTO temas(idemp, idtipo, idarea, tituloestudio, fechasol, resumen, condicion, pagado) VALUES('$global_qk','$tipo','$area','$titulo','$fecha','$resumen','$condiciones','$paga')") or die(mysql_error());
         header("Location: $PHP_SELF?s=pt");   
      } else { // Se encontro un Registro previo
        tsiscab();
        $mens = " Error ... ". $titulo. " Ya Existe,  Imposible Almacenar Registro.";
        tsismens($mens);
        tsispie();
      }
      mysql_free_result($res);
      mysql_close($link);
}




if($HTTP_GET_VARS[s] == "mt" ) {
   $result=mysql_query("SELECT * FROM temas WHERE id=$id") or die(mysql_error());
   if($row=mysql_fetch_object($result)) {
      $rtipo = $row->idtipo;
	  $rarea = $row->idarea;
	  $rfecha = $row->fechasol;
	  $rtitulo = $row->tituloestudio;
	  $rresumen = str_replace("<BR>", "\n", $row->resumen);
	  $rcondicion = str_replace("<BR>", "\n", $row->condicion);
	  $rpaga = $row->pagado;
	  $rotros = $row->otros;
	  
      unset($row);
      tsiscab();
?>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td align="left" class="texto-cab">&nbsp;usted se encuentra en <strong>Actualizar Tema de Estudio</strong></td>
        </tr>
		<tr><td height="35"></td></tr>
        <tr> 
          <td><form name="formtesis" method="post" action="<?php $PHP_SELF?>?s=ct" onSubmit="return vldtemas();">
		     <input type="hidden" name="global_qk" value="<?php echo $global_qk;?>">
			 <input type="hidden" name="id" value="<?php echo $id;?>">
		  <table border="0" cellpadding="0" cellspacing="1" align="center" bgcolor="#666666">
		  <tr><td>
		     <table border="0" cellpadding="3" cellspacing="0" class="tableform" bgcolor="#E4E4E4">
			   <tr><td colspan="2" align="center" class="texto-tit">Ficha Actualizar Tema de Estudio</td></tr>
			   <tr><td colspan="2" height="25"></td></tr>
			   <tr><td>Tipo</td>
			       <td><?php
				   $res=mysql_query("SELECT * FROM tipo ORDER BY tipo") or die(mysql_error());
				   if(mysql_num_rows($res) > 0 ) {
				      $xt = 0;
					  $Ites[$xt] = "-";
					  $Ntes[$xt] = "Seleccione Tipo de Tema Estudio... ";
					  $xt++;
					  
					  while($flxt=mysql_fetch_object($res) ) {
					     $Ites[$xt] = $flxt->idtipo;
						 $Ntes[$xt] = $flxt->tipo;
						 $xt++;
					  }?>
					  <select name="tipo" size="1">
					  <?php for($yt=0; $yt < $xt; $yt++) { 
					          if( $Ites[$yt] == $rtipo ) { ?>
					              <option value="<?php echo $Ites[$yt];?>" selected><?php echo $Ntes[$yt];?></option>
						<?php } else { ?>
					          <option value="<?php echo $Ites[$yt];?>"><?php echo $Ntes[$yt];?></option>
					  <?php   }
					        } ?>
					  </select><?php
				   }
				   mysql_free_result($res); ?>
				   </td>
               </tr>
			   <tr><td colspan="2" height="5"></td></tr>
			   <tr><td>&Aacute;rea</td>
			       <td><?php
				   $res=mysql_query("SELECT * FROM area ORDER BY area") or die(mysql_error());
				   if(mysql_num_rows($res) > 0 ) {
				      $xa = 0;
					  $Iare[$xa] = "-";
					  $Nare[$xa] = "Seleccione &Aacute;rea del Tema... ";
					  $xa++;
					  while($flxa=mysql_fetch_object($res) ) {
					     $Iare[$xa] = $flxa->idarea;
						 $Nare[$xa] = $flxa->area;
						 $xa++;
					  }?>
					  <select name="area" size="1">
					  <?php for($ya=0; $ya < $xa; $ya++) { 
					            if( $Iare[$ya] == $rarea ) { ?>
					                <option value="<?php echo $Iare[$ya];?>" selected><?php echo $Nare[$ya];?></option>
                         <?php  } else { ?>
					                <option value="<?php echo $Iare[$ya];?>"><?php echo $Nare[$ya];?></option>
					  <?php     }
					         } ?>
					  </select><?php
				   }
				   mysql_free_result($res); ?></td>
			   </tr>
			   <tr><td colspan="2" height="5"></td></tr>
			   <tr><td colspan="2">T&iacute;tulo Tema de Estudio</td></tr>
			   <tr><td colspan="2"><input type="text" name="titulo" size="100" maxlength="255" value="<?php echo $rtitulo;?>"></td></tr>
			   <tr><td colspan="2" height="5"></td></tr>
			   <tr><td colspan="2">Resumen Ejecutivo Tema de Estudio Solicitado</td></tr>
			   <tr><td colspan="2"><textarea name="resumen" rows="12" cols="55" value="<?php echo $rresumen;?>"><?php echo $rresumen;?></textarea></td></tr>
			   <tr><td colspan="2" height="5"></td></tr>
			   <tr><td colspan="2">Condiciones</td></tr>
			   <tr>
			      <td colspan="2">
				  <textarea name="condiciones" rows="12" cols="55" value="<?php echo $rcondicion;?>"><?php echo $rcondicion;?></textarea>
				  </td>
			   </tr>
			   <tr><td colspan="2" height="5"></td></tr>
			   <tr><td>Este Tema de Estudio ser&aacute; Pagado?</td>
			       <td><input type="radio" name="paga" value="1"  <?php if($rpaga == "1") { echo "checked";} ?>>Si &nbsp;&nbsp;&nbsp;
				       <input type="radio" name="paga"  value="0" <?php if($rpaga == "0") { echo "checked";} ?>>No
				   </td>
			   </tr>
			   <tr><td colspan="2" height="5"></td></tr>
			   <tr><td colspan="2">Otras Consideraciones</td></tr>
			   <tr>
			      <td colspan="2">
				  <textarea name="otro" rows="12" cols="55" value="<?php echo $rotros;?>"><?php echo $rotros;?></textarea>
				  </td>
			   </tr>
			   <tr><td colspan="2" height="35"></td></tr>
			   <tr><td colspan="2" height="45" align="center" valign="middle">
			       <input type="submit" name="mtsis" value="  Actualizar Tema  ">
				   </td>
			   </tr>
		   </table>
		  </td></tr>
		  </table></form>
		</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
      </table>
<?php
   tsispie();
   }
   mysql_free_result($result); 
}


if($HTTP_GET_VARS[s] == "ct" ) {
   // Actualizar Tema
      $titulo = strtoupper($titulo);
      $res=mysql_query("SELECT id FROM temas WHERE id='$id'") or die(mysql_error());
      if(mysql_num_rows($res) > 0 ) {
         mysql_query("UPDATE temas SET idtipo='$tipo', idarea='$area', tituloestudio='$titulo', resumen='$resumen', condicion='$condiciones', pagado='$paga', otros='$otro' WHERE id='$id'") or die(mysql_error());
         header("Location: $PHP_SELF?s=pt");   
      } else { // Se encontro un Registro previo
        tsiscab();
        $mens = " Error ...  Ha ocurrido un problema interno al momento de actualizar informaci&oacute;n. Por favor, intente nuevamente.";
        tsismens($mens);
        tsispie();
      }
      mysql_free_result($res);
      mysql_close($link);
}


if($HTTP_GET_VARS[s] == "et" ) {
mysql_query("DELETE FROM temas WHERE id=\"$id\" ") or die(mysql_error());
mysql_close($link);
header( "Location: $PHP_SELF?s=pt");
}



if($HTTP_GET_VARS[s] == "ft" ) {
   $result=mysql_query("SELECT * FROM temas WHERE id=$id") or die(mysql_error());
   if($row=mysql_fetch_object($result)) {
	  $rfecha = $row->fechasol;
	  $rtitulo = $row->tituloestudio;
	  $rresumen = str_replace("<BR>", "\n", $row->resumen);
      unset($row);
      tsiscab();
?>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td align="left" class="texto-cab">&nbsp;usted se encuentra en <strong>Finalizar Tema de Estudio</strong></td>
        </tr>
		<tr><td height="35"></td></tr>
        <tr> 
          <td><form name="formfin" method="post" action="<?php $PHP_SELF?>?s=zt" onSubmit="return vldfin();">
		     <input type="hidden" name="global_qk" value="<?php echo $global_qk;?>">
			 <input type="hidden" name="id" value="<?php echo $id;?>">
		  <table border="0" cellpadding="0" cellspacing="1" align="center" bgcolor="#666666">
		  <tr><td>
		     <table border="0" cellpadding="3" cellspacing="0" class="tableform" bgcolor="#E4E4E4">
			   <tr><td colspan="2" align="center" class="texto-tit">Ficha Finalizar Tema de Estudio</td></tr>
			   <tr><td colspan="2" height="25"></td></tr>
			   <tr><td colspan="2">T&iacute;tulo Tema de Estudio</td></tr>
			   <tr><td colspan="2"><input type="text" name="titulo" size="100" maxlength="255" value="<?php echo $rtitulo;?>" disabled></td></tr>
			   <tr><td colspan="2" height="5"></td></tr>
			   <tr><td colspan="2">Resumen Ejecutivo Tema de Estudio Solicitado</td></tr>
			   <tr><td colspan="2"><textarea name="resumen" rows="15" cols="55" value="<?php echo $rresumen;?>" disabled><?php echo $rresumen;?></textarea></td></tr>
			   <tr><td colspan="2" height="5"></td></tr>
			   <tr><td colspan="2">Conclusiones</td></tr>
			   <tr>
			      <td colspan="2">
				  <textarea name="conclusiones" rows="12" cols="55"></textarea>
				  </td>
			   </tr>
			   <tr><td colspan="2" height="35"></td></tr>
			   <tr><td colspan="2" height="45" align="center" valign="middle">
			       <input type="submit" name="mtfsis" value="  Finalizar Tema  ">
				   </td>
			   </tr>
		   </table>
		  </td></tr>
		  </table></form>
		</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
      </table>
<?php
   tsispie();
   }
   mysql_free_result($result); 
}


if($HTTP_GET_VARS[s] == "zt" ) {
   // Actualizar Tema
      $titulo = strtoupper($titulo);
      $res=mysql_query("SELECT id FROM temas WHERE id='$id'") or die(mysql_error());
      if(mysql_num_rows($res) > 0 ) {
         mysql_query("UPDATE temas SET realizado='1', conclusion='$conclusiones' WHERE id='$id'") or die(mysql_error());
         header("Location: $PHP_SELF?s=pt");   
      } else { // Se encontro un Registro previo
        tsiscab();
        $mens = " Error ...  Ha ocurrido un problema interno al momento de actualizar informaci&oacute;n. Por favor, intente nuevamente.";
        tsismens($mens);
        tsispie();
      }
      mysql_free_result($res);
      mysql_close($link);
}


} else {
  header("Location: index.php");
}
?>