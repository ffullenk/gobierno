<?php
include("bd/conecta.php");
$link = conexion();
global $cinst, $ctipo, $carea, $ctitulo;

function tsiscab() {
global $cinst, $ctipo, $carea, $ctitulo;?>
<html>
<head>
<title>&middot;::&middot; Gobierno Regional de Coquimbo &middot;&middot;&middot;: Tesis :&middot;&middot;&middot;</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="estilo/tesis.css" rel="stylesheet" type="text/css">
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
<table width="750" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="240" height="75" bgcolor="#F2F2F2">&nbsp;</td>
    <td bgcolor="#C6CFE5">&nbsp;</td>
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
     <td valign="top" width="5">&nbsp;</td>
     <td height="400" valign="top"> <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr> 
          <td align="left" background="imagenes/bckimg-1.png" class="texto-tsiscab">&nbsp;B&uacute;squeda 
            de Tesis &nbsp;<?php
				if(isset($cinst)) { echo "por <strong>Instituci&oacute;n</strong>, mostrar resultados";}
				elseif(isset($ctipo)) { echo "por <strong>Tipo de Tesis</strong>, mostrar resultados";}
				elseif(isset($carea)) { echo "por <strong>&Aacute;rea de Estudio</strong>, mostrar resultados";}
				else { echo "por Palabra en <strong>T&iacute;tulo de Tesis</strong>, mostrar resultados";}
				?></td>
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
global $cinst, $ctipo, $carea, $ctitulo;
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
   <td><div id="lin-footer"><strong>www.gorecoquimbo.cl:</strong>&nbsp;P&aacute;gina desarrollada por <!--Luis Jim&eacute;nez Villalobos,--> Departamento de Inform&aacute;tica Servicio Administrativo GORE-COQUIMBO.</div></td>
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
		    <tr><td colspan="5" align="left" class="info">Par&aacute;metro de b&uacute;squeda
			<?php
			if(isset($cinst)) {
			   $res = mysql_query("SELECT institucion FROM institucion WHERE idinst='$cinst'") or die(mysql_error());
			   if($flinst=mysql_fetch_object($res)) {
			      echo "<strong>".$flinst->institucion."</strong>";
			   }
			   mysql_free_result($res); unset($flinst);
			 } elseif( isset($ctipo)) {
			   $restipo = mysql_query("SELECT tipo FROM tipo WHERE idtipo='$ctipo'") or die(mysql_error());
			   if($fltipo=mysql_fetch_object($restipo)) {
			      echo "<strong>".$fltipo->tipo."</strong>";
			   }
			   mysql_free_result($restipo); unset($fltipo);
			 } elseif( isset($carea)) {
			   $resarea = mysql_query("SELECT area FROM area WHERE idarea='$carea'") or die(mysql_error());
			   if($flarea=mysql_fetch_object($resarea)) {
			      echo "<strong>".$flarea->area."</strong>";
			   }
			   mysql_free_result($resarea); unset($flarea);
			 } else {
			   echo " palabra <strong>".$ctitulo."</strong>";
			 }
			?>
			</td></tr>
<?php           // Paginacion de Registros de Tabla Noticias
              /* Limito la busqueda */
                 $TAMANO_PAGINA = 3;

              /* examino la página a mostrar y el inicio del registro a mostrar */
                 $pagina = $HTTP_GET_VARS["pg"];
                 if (!$pg) { $inicio = 0; $pg=1;
                 } else { $inicio = ($pg - 1) * $TAMANO_PAGINA; }
				 
				 /* ve condiciones segun parametro de busqueda */
				 if(isset($ctitulo)) {
                    $ssql = "SELECT idtesis, institucion, tipo, area, titulo, anno FROM tesis INNER JOIN institucion ON tesis.idinst=institucion.idinst INNER JOIN tipo ON tesis.idtipo=tipo.idtipo INNER JOIN area ON tesis.idarea=area.idarea  WHERE titulo LIKE \"%$ctitulo%\"  ORDER BY anno DESC";
                    $ccond = $ctitulo;
				 }
				 if(isset($ctipo)) {
                    $ssql = "SELECT idtesis, institucion, area, titulo, anno FROM tesis INNER JOIN institucion ON tesis.idinst=institucion.idinst INNER JOIN area ON tesis.idarea=area.idarea WHERE idtipo='$ctipo' ORDER BY anno DESC";
                    $ccond = $ctipo;
                 }
                 if(isset($cinst)) {
                    $ssql = "SELECT idtesis, tipo, area, titulo, anno FROM tesis INNER JOIN tipo ON tesis.idtipo=tipo.idtipo INNER JOIN area ON tesis.idarea=area.idarea WHERE idinst='$cinst' ORDER BY anno DESC";
                    $ccond = $cinst;
				 }
                 if(isset($carea)) {
                    $ssql = "SELECT idtesis, institucion, tipo, titulo, anno FROM tesis INNER JOIN institucion ON tesis.idinst=institucion.idinst INNER JOIN tipo ON tesis.idtipo=tipo.idtipo WHERE idarea='$carea' ORDER BY anno DESC";
                    $ccond = $carea;
				 }
                 $rs = mysql_query($ssql);
                 $num_total_registros = mysql_num_rows($rs);
                 echo "condiciones ". &ccond. "condicion ". $ccond;
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
					<tr><td colspan="5" align="right" class="info"><div id="lin-base">mostrando <?php echo $pg;?> de <?php echo $num_total_registros;?></div></td></tr>
                    <tr><td colspan="5" height="10"></td></tr><?php
					
                    while ($fila=mysql_fetch_object($rs)) { ?>                                                        
						   <tr>
						     <td class="secc-ppal" bgcolor="#FFFFFF">
						      <table border="0" cellpadding="0" cellspacing="0">
							    <tr>
								  <td class="texto-peq" >Tipo Tesis</td><td class="secc-ppal">:</td>
								  <td class="texto-peq" align="left"><font color="#943410"><?php echo $fila->tipo;?></font></td>
								</tr>
								<tr>
								  <td class="texto-peq">&Aacute;ea</td><td class="secc-ppal">:</td>
								  <td class="texto-peq" align="left"><font color="#943410"><?php echo $fila->area;?></font></td>
								</tr>
							  </table>
							  <strong><? echo $fila->titulo;?></strong>
                            </td>
							<td width="5"></td>
							<td width="5"></td>
							<td align="center"><form action="<?php $PHP_SELF;?>?s=et" method="post">
							    <input type="hidden"name="id" value="<?php echo $fila->idtesis;?>">
								<input type="image" src="imagenes/btn_ver.png" border="0" alt=" Ver Resumen Ejecutivo " align="middle">
								</form></td>
							</tr>
							<tr><td colspan="5" height="5" style="padding-left:2px;"><div id="lin-div"></div></td></tr>
							<tr><td colspan="5" height="10" style="padding-left:2px;"></td></tr>
                     <?php } 
					 } ?>
                         </table>		  <!-- fin paginacion de resultados segun metodo de busqueda -->
				</td>
              </tr>
<?php

    /* cerramos el conjunto de resultados y la conexión con la base de datos */
    mysql_free_result($rs);
    //mysql_close();


   if ($total_paginas > 1)
   {?> <tr><td height="10" valign="middle" class="info" style="padding-left:2px;"><div id="lin-sup">mostrar m&aacute;s avisos en p&aacute;gina <?php
      for ($i=$minimo; $i<$pg; $i++){
         echo "<a href='".$HTTP_SERVER["PHP_SELF"]."?s=b&ccond=".$ccond."&pg=".$i."'>$i</a>&nbsp;";
      }
	  
	  echo "<font face='verdana' size='-2'>[". $pg. "] </font>&nbsp;";

      for ($i=$pg+1; $i<=$maximo; $i++){
         echo "<a href='".$HTTP_SERVER["PHP_SELF"]."?s=b&ccond=".$$ccond."&pg=".$i."'>$i</a>&nbsp;";
      }
   

   if($pg<$total_paginas)
   {
     echo "&nbsp;<a href='".$HTTP_SERVER["PHP_SELF"]."?s=b&ccond=".$$ccond."&pg=" .($pg+1). "'>";
     echo "<font face='verdana' size='-2'>siguiente &raquo;&raquo;</font></a>";
   }?> </div></td></tr> <?php
  } ?>
            </table>
			
		  <!--  -->
<?php tsispie();
}
?>