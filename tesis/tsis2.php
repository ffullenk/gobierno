<?php
include("bd/conecta.php");
$link = conexion();
global $ctipo;

function tsiscab() {
global $ctipo;?>
<html>
<head>
<title>&middot;::&middot; Gobierno Regional de Coquimbo &middot;&middot;&middot;: Tesis :&middot;&middot;&middot;</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="estilo/tesis.css" rel="stylesheet" type="text/css">
<script src="js/fecha.js" type="text/javascript"></script>
<script language="JavaScript" type="text/javascript">
  function subWin(loc, nom, ancho, alto, posx, posy) {
    var options="toolbar=0,status=0,menubar=0,scrollbars=1,resizable=1,location=0,directories=0,width=" + ancho + ",height=" + alto;      
        
    win = window.open(loc, nom, options);                 
    win.focus();
    win.moveTo(posx, posy);    
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
    <td bgcolor="#5475C6" class="texto-peq" align="left">&nbsp;<a href="index.php">&laquo; Volver Portada</a></td>
    <td bgcolor="#5475C6" align="right" class="texto-peq"><font color="#FFFFFF">
	<!-- INSERTAR FECHA -->
      <script language="JavaScript">
      <!--
document.write( dayNames[now.getDay()] + " " + now.getDate() + " de " + monthNames[now.getMonth()] + " " +" de " + year);
      // -->
      </script>&nbsp;&nbsp;</font></td>
  </tr>
</table>
<table width="750" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td bgcolor="#FFFFFF" height="10"></td>
  </tr>
</table>
<table width="750" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr> 
     <td valign="top" width="5">&nbsp;</td>
     <td height="400" valign="top"> <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr> 
          <td align="left" background="imagenes/bckimg-1.png" class="texto-tsiscab">&nbsp;B&uacute;squeda 
            de Tesis &nbsp;por <strong>Tipo de Tesis</strong>, mostrar resultados</td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td>
		  <!--  -->
<?php
}


function tsispie() {
global $ctipo;
?>
			</td>
        </tr>
        <tr> 
          <td>
		  </td>
        </tr>
  </table></td>
    <td valign="top" width="5">&nbsp;</td>
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
</body>
</html>
<?php
}


if( (!$HTTP_GET_VARS[s]) || ($HTTP_GET_VARS[s] == "b") ) {
  tsiscab(); ?>
		  <table width="95%" border="0" cellspacing="1" cellpadding="0">
              <tr> 
                <td bgcolor="#F2F2F2">
		  <!-- paginacion de resultados segun metodo de busqueda -->
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
		    <tr><td colspan="5" align="left" class="info">Par&aacute;metro de b&uacute;squeda &nbsp;<strong>
			<?php
			$res = mysql_query("SELECT tipo FROM tipo WHERE idtipo='$ctipo'") or die(mysql_error());
			if($fltipo=mysql_fetch_object($res)) {
			   echo $fltipo->tipo;
			}
			mysql_free_result($res); unset($fltipo);
			?>
			</strong></td></tr>
<?php           // Paginacion de Registros de Tabla Noticias
              /* Limito la busqueda */
                 $TAMANO_PAGINA = 15;

              /* examino la página a mostrar y el inicio del registro a mostrar */
                 $pagina = $HTTP_GET_VARS["pg"];
                 if (!$pg) { $inicio = 0; $pg=1;
                 } else { $inicio = ($pg - 1) * $TAMANO_PAGINA; }
				 
				 /* ve condiciones segun parametro de busqueda */
                    $ssql = "SELECT idtesis, institucion, area, titulo, anno FROM tesis INNER JOIN institucion ON tesis.idinst=institucion.idinst INNER JOIN area ON tesis.idarea=area.idarea WHERE idtipo='$ctipo' ORDER BY anno DESC";
                 $rs = mysql_query($ssql);
                 $num_total_registros = mysql_num_rows($rs);
                 /* calculo el total de páginas */
                    $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);

                 /* pongo el número de registros total, el tamaño de página y la página que se muestra */
                    $maxpags = 10;
                    $minimo = $maxpags ? max(1, $pg-ceil($maxpags/2)): 1;
                    $maximo = $maxpags ? min($total_paginas, $pg+floor($maxpags/2)): $total_paginas;

                 /* construyo la sentencia SQL */
                    $ssql.= " LIMIT ". $inicio . "," . $TAMANO_PAGINA;
                    $rs = mysql_query($ssql);
					$num_total_actual = mysql_num_rows($rs);
					$minreg = min(1, $num_total_actual );
					$maxreg = max(1,$num_total_registros);
					if($num_total_actual > 0 ) {?>
					<tr><td colspan="5" align="right" class="info"><div id="lin-base">mostrando <?php echo $pg;?> de <?php echo $total_paginas;?> p&aacute;ginas</div></td></tr>
                    <tr><td colspan="5" height="10"></td></tr><?php
					
                    while ($fila=mysql_fetch_object($rs)) { ?>                                                        
						   <tr>
						     <td class="secc-ppal">
						      <table border="0" cellpadding="0" cellspacing="0">
								<tr>
								  <td class="texto-peq">Instituci&oacute;n</td><td class="secc-ppal">:</td>
								  <td class="texto-peq" align="left"><font color="#5475C6"><?php echo $fila->institucion;?></font></td>
								</tr>
								<tr>
								  <td class="texto-peq">&Aacute;ea</td><td class="secc-ppal">:</td>
								  <td class="texto-peq" align="left"><font color="#5475C6"><?php echo $fila->area;?></font></td>
								</tr>
							  </table>
							  <strong><? echo $fila->titulo;?></strong>
                            </td>
							<td width="5"></td>
							<td width="5"></td>
							<td align="center"><form action="<?php $PHP_SELF;?>?s=v" method="post">
							    <input type="hidden"name="id" value="<?php echo $fila->idtesis;?>">
								<input type="image" src="imagenes/btn_v.png" border="0" alt=" Ver Resumen Ejecutivo " align="middle">
								</form></td>
							</tr>
							<tr><td colspan="5" height="5" style="padding-left:2px;"><div id="lin-div"></div></td></tr>
							<tr><td colspan="5" height="20" style="padding-left:2px;"></td></tr>
                     <?php } 
					 } ?>
                         </table>		  <!-- fin paginacion de resultados segun metodo de busqueda -->
				</td>
              </tr>
<?php

    /* cerramos el conjunto de resultados y la conexión con la base de datos */
    mysql_free_result($rs);
    mysql_close();


   if ($total_paginas > 1)
   {?> <tr><td height="10" valign="middle" class="info" style="padding-left:2px;"><div id="lin-sup">mostrar m&aacute;s registros en p&aacute;gina <?php
      for ($i=$minimo; $i<$pg; $i++){
         echo "<a href='".$HTTP_SERVER["PHP_SELF"]."?s=b&ctipo=".$ctipo."&pg=".$i."'>$i</a>&nbsp;";
      }
	  
	  echo "<font face='verdana' size='-2'>[". $pg. "] </font>&nbsp;";

      for ($i=$pg+1; $i<=$maximo; $i++){
         echo "<a href='".$HTTP_SERVER["PHP_SELF"]."?s=b&ctipo=".$ctipo."&pg=".$i."'>$i</a>&nbsp;";
      }
   

   if($pg<$total_paginas)
   {
     echo "&nbsp;<a href='".$HTTP_SERVER["PHP_SELF"]."?s=b&ctipo=".$ctipo."&pg=" .($pg+1). "'>";
     echo "<font face='verdana' size='-2'>siguiente &raquo;&raquo;</font></a>";
   }?> </div></td></tr> <?php
  } ?>
  <tr><td height="25"></td></tr>
            </table>
			
		  <!--  -->
<?php tsispie();
}





if($HTTP_GET_VARS[s] == "v" ) {
  tsiscab(); 
  $res = mysql_query("SELECT idtesis, institucion, tipo, area, titulo, anno, profg1, profg2, profg3, infor1, infor2, infor3, alum1, alum2, alum3, alum4, fono, email, resumen  FROM tesis INNER JOIN institucion ON tesis.idinst=institucion.idinst INNER JOIN tipo ON tesis.idtipo=tipo.idtipo INNER JOIN area ON tesis.idarea=area.idarea  WHERE idtesis='$id'") or die(mysql_error());
  if($row=mysql_fetch_object($res)) {
      $rinst = $row->institucion;
      $rtipo = $row->tipo;
	  $rarea = $row->area;
	  $ranno = $row->anno;
	  $rtitulo = $row->titulo;
	  $rprofg1 = $row->profg1; $rprofg2 = $row->profg2;
	  $rprofg3 = $row->profg3;
	  $rinfor1 = $row->infor1; $rinfor2 = $row->infor2;
	  $rinfor3 = $row->infor3;
	  $ralum1 = $row->alum1; $ralum2 = $row->alum2;
	  $ralum3 = $row->alum3; $ralum4 = $row->alum4;
	  $rfono = $row->fono;
	  $remail = $row->email;
	  $rresumen = str_replace("\n", "<BR>", $row->resumen);
  }
  mysql_free_result($res); unset($row); mysql_close($link);
?>
<table width="95%" border="0" cellspacing="1" cellpadding="0">
  <tr> 
     <td bgcolor="#f2f2f2" style="padding-left:3px; padding-right:3px;">
       <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#F2F2F2">
         <tr><td>
		     <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
		       <tr>
			      <td align="left" class="texto-tsisr" background="imagenes/bckimg-1.png">
		          <strong>Resumen Ejecutivo</strong>
		          </td>
			      <td class="texto-tsisr" align="right" background="imagenes/bckimg-1.png">
				  <a href="javascript:window.history.back();">Volver</a>&nbsp;&nbsp;
				  </td>
               </tr>
			 </table>
		 </td></tr>
		 <tr><td>
		     <table border="0" cellpadding="0" cellspacing="0">
			   <tr><td colspan="2" height="15"></td></tr>
			   <tr><td colspan="2" class="texto-titr"><strong><?php echo $rtitulo;?></strong></td></tr>
			   <tr class="secc-ppal">
	             <td>Instituci&oacute;n</td><td align="left"><font color="#5475C6"><strong><?php echo $rinst;?></strong></font></td>
			   </tr>
			   <tr class="secc-ppal">
			    <td>Tipo</td><td align="left"><font color="#5475C6"><strong><?php echo $rtipo;?></strong></font></td>
			   </tr>
			   <tr class="secc-ppal">
			    <td>&Aacute;rea</td><td align="left"><font color="#5475C6"><strong><?php echo $rarea;?></strong></font></td>
			   </tr>
			   <tr class="secc-ppal">
			    <td>A&ntilde;o</td><td align="left"><font color="#5475C6"><strong><?php echo $ranno;?></strong></font></td>
			   </tr>
			 </table>
			 </td>
		 </tr>
        <tr><td>
		     <table border="0" cellpadding="0" cellspacing="0">
			   <tr><td height="15"></td></tr>
			   <tr class="secc-ppal"><td colspan="2"><font color="#000000">Profesores Gu&iacute;as</font></td></tr>
			   <?php if(!empty($rprofg1)) { ?>
			   <tr class="secc-ppal">
			    <td align="left"><font color="#5475C6"><?php echo $rprofg1;?></font></td>
			   </tr>
			   <?php }
			   if(!empty($rprogf2)) { ?>
			   <tr class="secc-ppal">
			    <td align="left"><font color="#5475C6"><?php echo $rprofg2;?></font></td>
			   </tr>
			   <?php }
			   if(!empty($rprogf3)) { ?>
			   <tr class="secc-ppal">
			    <td align="left"><font color="#5475C6"><?php echo $rprofg3;?></font></td>
			   </tr>
              <?php } ?>
			 </table>
			 </td>
		 </tr>
        <tr><td>
		     <table border="0" cellpadding="0" cellspacing="0">
			   <tr><td height="15"></td></tr>
			   <tr class="secc-ppal"><td colspan="2"><font color="#000000">Profesores Informantes</font></td></tr>
			   <?php if(!empty($rinfor1)) { ?>
			   <tr class="secc-ppal">
			    <td align="left"><font color="#5475C6"><?php echo $rinfor1;?></font></td>
			   </tr>
			   <?php }
			   if(!empty($rinfor2)) { ?>
			   <tr class="secc-ppal">
			    <td align="left"><font color="#5475C6"><?php echo $rinfor2;?></font></td>
			   </tr>
			   <?php }
			   if(!empty($rinfor3)) { ?>
			   <tr class="secc-ppal">
			    <td align="left"><font color="#5475C6"><?php echo $rinfor3;?></font></td>
			   </tr>
              <?php } ?>
			 </table>
			 </td>
		 </tr>
        <tr><td>
		     <table border="0" cellpadding="0" cellspacing="0">
			   <tr><td height="15"></td></tr>
			   <tr class="secc-ppal"><td colspan="2"><font color="#000000">Alumnos Tesistas</font></td></tr>
			   <?php if(!empty($ralum1)) { ?>
			   <tr class="secc-ppal">
			    <td align="left"><font color="#5475C6"><?php echo $ralum1;?></font></td>
			   </tr>
			   <?php }
			   if(!empty($ralum2)) { ?>
			   <tr class="secc-ppal">
			    <td align="left"><font color="#5475C6"><?php echo $ralum2;?></font></td>
			   </tr>
			   <?php }
			   if(!empty($ralum3)) { ?>
			   <tr class="secc-ppal">
			    <td align="left"><font color="#5475C6"><?php echo $ralum3;?></font></td>
			   </tr>
			   <?php }
			   if(!empty($ralum4)) { ?>
			   <tr class="secc-ppal">
			    <td align="left"><font color="#5475C6"><?php echo $ralum4;?></font></td>
			   </tr>
              <?php } ?>
			 </table>
			 </td>
		 </tr>
        <tr><td>
		     <table border="0" cellpadding="0" cellspacing="0">
			   <tr><td height="15"></td></tr>
			   <tr class="secc-ppal"><td><font color="#000000">Informaci&oacute;n de Contacto Tesistas</font></td></tr>
			   <?php if(!empty($remail)) { ?>
			   <tr class="secc-ppal"><td>Email:&nbsp;<a href="mailto:<?php echo $remail;?>" title=" Contactarse con <?php echo $remail;?>"><font color="#5475C6"><?php echo $remail;?></font></a></td>
			   </tr>
			   <?php }
			        if(!empty($rfono)) { ?>
			   <tr class="secc-ppal"><td>Fono&nbsp;:&nbsp;<font color="#5475C6"><?php echo $rfono;?></font></td>
			   </tr>
			   <?php } ?>
             </table>
		</td></tr>
		 <tr><td>
		     <table border="0" cellpadding="0" cellspacing="0" width="100%">
			   <tr><td colspan="2" height="15"></td></tr>
			  <tr class="secc-ppal"><td colspan="2">Resumen</td></tr>
			  <tr class="secc-ppalr"><td colspan="2"><?php echo $rresumen;?></td></tr>
			   <tr><td colspan="2" height="15"></td></tr>
			 </table>
		 </td></tr>
       </table>
     </td>
  </tr>
  <tr><td height="45" bgcolor="#FFFFFF"></td></tr>
</table>
<?php tsispie();
}
?>