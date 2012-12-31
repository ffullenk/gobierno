<?php
include("bd/conecta.php");
$link = conexion();
global $st_area;

function tsiscab() {
global $st_area;?>
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
            de Temas de Estudio &nbsp;por <strong>&Aacute;rea</strong>, mostrar resultados</td>
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
global $st_area;
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
			if($st_area != "x" ) {
               $res = mysql_query("SELECT area FROM area WHERE idarea='$st_area'") or die(mysql_error());
               if($fltipo=mysql_fetch_object($res)) {
			      echo $fltipo->area;
			   }
               mysql_free_result($res); unset($fltipo);
			} else { echo "Todas las &Aacute;reas de Estudio"; }
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
					if( $st_area != "x" ) {
                        $ssql = "SELECT temas.id, idemp, temas.idtipo, temas.idarea, empresa, tipo, area, tituloestudio, fechasol FROM temas INNER JOIN admemp ON temas.idemp = admemp.id INNER JOIN tipo ON temas.idtipo = tipo.idtipo INNER JOIN area ON temas.idarea = area.idarea";
					    $ssql.= " WHERE temas.idarea='$st_area' AND realizado <> '1' ORDER BY fechasol DESC";
					} else { 
                        $ssql = "SELECT temas.id, idemp, temas.idtipo, temas.idarea, empresa, tipo, area, tituloestudio, fechasol FROM temas INNER JOIN admemp ON temas.idemp=admemp.id INNER JOIN tipo ON temas.idtipo=tipo.idtipo INNER JOIN area ON temas.idarea=area.idarea";
					    $ssql.= " WHERE realizado <> '1' ORDER BY temas.idarea";
					}
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
					if($num_total_actual > 0 ) { ?>
					<tr><td colspan="5" align="right" class="info"><div id="lin-base">mostrando <?php echo $pg;?> de <?php echo $total_paginas;?> p&aacute;ginas</div></td></tr>
                    <tr><td colspan="5" height="10"></td></tr><?php
if( $st_area == "x" ) {
    $fila=mysql_fetch_object( $rs );
    while ( $fila ) { ?>
                    <tr>
					   <td class="secc-ppal" colspan="5">
                         <table border="0" cellpadding="0" cellspacing="0" width="100%">
                           <tr>
						      <td colspan="2" class="texto-tsisr"><div id="lin-all">&Aacute;rea Estudio&nbsp;&nbsp;
							      <font color="#5475C6"><strong><?php echo $fila->area;?></strong></font></div></td>
                           </tr>
						   <?php $varea = $fila->idarea;
						   while( $varea == $fila->idarea ) { ?>
						    <tr><td></td><td rowspan="4" align="left">
                                      <form action="<?php $PHP_SELF;?>?s=v" method="post">
                                      <input type="hidden"name="id" value="<?php echo $fila->id;?>">
                                      <input type="image" src="imagenes/btn_v.png" border="0" alt=" Ver Resumen Ejecutivo " align="middle">
                                      </form>
							    </td>
							</tr>
						    <tr><td class="info">Empresa&nbsp;&nbsp;<font color="#5475C6"><?php echo $fila->empresa;?></font></td></tr>
						    <tr><td class="info">Tipo&nbsp;&nbsp;<font color="#5475C6"><?php echo $fila->tipo;?></font></td></tr>
						    <tr><td class="info"><strong><?php echo $fila->tituloestudio;?></strong></td></tr>
							<tr><td colspan="2" height="5"></td></tr>
							<tr><td colspan="2" height="20"></td></tr>
							<?php $fila=mysql_fetch_object($rs);
							} ?>
					      </table>
						</td>
					</tr><?php
      } ?>
<?php
} else {
                    while ($fila=mysql_fetch_object($rs)) { ?>                                                        
						   <tr>
						     <td class="secc-ppal">
						      <table border="0" cellpadding="0" cellspacing="0">
							    <tr>
								  <td class="texto-peq" >Empresa</td><td class="secc-ppal">:</td>
								  <td class="texto-peq" align="left"><font color="#5475C6"><?php echo $fila->empresa;?></font></td>
								</tr>
								<tr>
								  <td class="texto-peq">&Aacute;ea</td><td class="secc-ppal">:</td>
								  <td class="texto-peq" align="left"><font color="#5475C6"><?php echo $fila->area;?></font></td>
								</tr>
							  </table>
							  <strong><? echo $fila->tituloestudio;?></strong>
                            </td>
							<td width="5"></td>
							<td width="5"></td>
							<td align="center"><form action="<?php $PHP_SELF;?>?s=v" method="post">
							    <input type="hidden"name="id" value="<?php echo $fila->id;?>">
								<input type="image" src="imagenes/btn_v.png" border="0" alt=" Ver Resumen Ejecutivo " align="middle">
								</form></td>
							</tr>
							<tr><td colspan="5" height="5" style="padding-left:2px;"><div id="lin-div"></div></td></tr>
							<tr><td colspan="5" height="20" style="padding-left:2px;"></td></tr>
                     <?php } 
					 }
		}
else { ?>
					           <tr><td colspan="5" align="right" class="info"><div id="lin-base">&nbsp;</div></td></tr>
                               <tr><td colspan="5" height="10"></td></tr>
			 		           <tr>
					              <td class="secc-ppal" colspan="5">
                                     <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                       <tr>
						                  <td colspan="2" class="texto-tsisr"><div id="lin-all">No existen registros con par&aacute;metro especificado.&nbsp;&nbsp;</div></td>
                                       </tr>
									 </table>
								  </td>
							   </tr>
						<?php } ?>
                         </table>		  <!-- fin paginacion de resultados segun metodo de busqueda -->
				</td>
              </tr>
<?php

    /* cerramos el conjunto de resultados y la conexión con la base de datos */
    mysql_free_result($rs);
    //mysql_close();


   if ($total_paginas > 1)
   {?> <tr><td height="10" valign="middle" class="info" style="padding-left:2px;"><div id="lin-sup">mostrar m&aacute;s registros en p&aacute;gina <?php
      for ($i=$minimo; $i<$pg; $i++){
         echo "<a href='".$HTTP_SERVER["PHP_SELF"]."?s=b&st_area=".$st_area."&pg=".$i."'>$i</a>&nbsp;";
      }
	  
	  echo "<font face='verdana' size='-2'>[". $pg. "] </font>&nbsp;";

      for ($i=$pg+1; $i<=$maximo; $i++){
         echo "<a href='".$HTTP_SERVER["PHP_SELF"]."?s=b&st_area=".$st_area."&pg=".$i."'>$i</a>&nbsp;";
      }
   

   if($pg<$total_paginas)
   {
     echo "&nbsp;<a href='".$HTTP_SERVER["PHP_SELF"]."?s=b&st_area=".$st_area."&pg=" .($pg+1). "'>";
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
  $res = mysql_query("SELECT temas.id, empresa, nombre, email, fono, tipo, area, tituloestudio, fechasol, resumen, condicion, pagado, otros  FROM temas INNER JOIN admemp ON temas.idemp=admemp.id INNER JOIN tipo ON temas.idtipo=tipo.idtipo INNER JOIN area ON temas.idarea=area.idarea  WHERE temas.id='$id'") or die(mysql_error());
  if($row=mysql_fetch_object($res)) {
      $rempresa = rtrim($row->empresa);
      $rtipo = $row->tipo;
	  $rarea = $row->area;
	  $rfecha = $row->fechasol;
	  $rtitulo = $row->tituloestudio;
	  $rresumen = str_replace("\n", "<BR>", $row->resumen);
	  $rcondicion = str_replace("\n", "<BR>", $row->condicion);
	  $rpaga = $row->pagado;
  	  $rotros = str_replace("\n", "<BR>", $row->otros);
	  $rnombre = $row->nombre;
	  $remail = $row->email;
	  $rfono = $row->fono;

  }
  mysql_free_result($res); unset($row); mysql_close($link);
?>
<table width="95%" border="0" cellspacing="1" cellpadding="0">
  <tr> 
     <td bgcolor="#f2f2f2" style="padding-left:3px; padding-right:3px;">
       <table width="100%" border="0"  cellpadding="0" cellspacing="0" bgcolor="#F2F2F2">
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
		     <table border="0" cellpadding="0" cellspacing="0" align="left">
			   <tr align="left"><td colspan="3" height="15"></td></tr>
			   <tr><td class="texto-titr"><strong><?php echo $rtitulo;?></strong></td></tr>
			   <tr class="secc-ppal">
			    <td align="left">Tipo:&nbsp;<font color="#5475C6"><strong><?php echo $rtipo;?></strong></font></td>
			   </tr>
			   <tr class="secc-ppal">
			    <td align="left">&Aacute;rea:&nbsp;<font color="#5475C6"><strong><?php echo $rarea;?></strong></font></td>
			   </tr>
			   <tr class="secc-ppal">
			    <td align="left">Fecha Solicitud:<font color="#5475C6"><strong><?php echo $rfecha;?></strong></font></td>
			   </tr>
			 </table>
			 </td>
		 </tr>
        <tr><td>
		     <table border="0" cellpadding="0" cellspacing="0">
			   <tr><td height="15"></td></tr>
			   <tr class="secc-ppal"><td><font color="#000000">Informaci&oacute;n de Contacto Empresa</font></td></tr>
			   <tr class="secc-ppal">
	             <td>Empresa:<font color="#5475C6"><strong><?php echo $rempresa;?></strong></font></td>
			   </tr>
			   <?php if(!empty($remail)) { ?>
			   <tr class="secc-ppal"><td>Email:&nbsp;<a href="mailto:<?php echo $remail;?>" title=" Contactarse con <?php echo $rnombre;?>"><font color="#5475C6"><?php echo $remail;?></font></a></td>
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
		 <tr><td>
		     <table border="0" cellpadding="0" cellspacing="0" width="100%">
			   <tr><td colspan="2" height="15"></td></tr>
			  <tr class="secc-ppal"><td colspan="2">Oferta Remunerada ? &nbsp;<span class="secc-ppalr"><?php if($rpaga == "1") { echo "SI";} else { echo "NO";}?></span></td></tr>
			   <tr><td colspan="2" height="15"></td></tr>
			 </table>
		 </td></tr>
         <?php if(!empty($rcondicion)) { ?>
		 <tr><td>
		     <table border="0" cellpadding="0" cellspacing="0" width="100%">
			   <tr><td colspan="2" height="15"></td></tr>
			  <tr class="secc-ppal"><td colspan="2">Resumen</td></tr>
			  <tr class="secc-ppalr"><td colspan="2"><?php echo $rcondicion;?></td></tr>
			   <tr><td colspan="2" height="15"></td></tr>
			 </table>
		 </td></tr>
        <?php }
              if(!empty($rotros)) { ?>
		 <tr><td>
		     <table border="0" cellpadding="0" cellspacing="0" width="100%">
			   <tr><td colspan="2" height="15"></td></tr>
			  <tr class="secc-ppal"><td colspan="2">Otras Condiciones</td></tr>
			  <tr class="secc-ppalr"><td colspan="2"><?php echo $rotros;?></td></tr>
			   <tr><td colspan="2" height="15"></td></tr>
			 </table>
		 </td></tr>
        <?php } ?>		 
       </table>
     </td>
  </tr>
  <tr><td height="45" bgcolor="#FFFFFF"></td></tr>
</table>
<?php tsispie();
}
?>