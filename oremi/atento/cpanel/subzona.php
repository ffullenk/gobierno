<?php
session_start();
 
 $userBackEnd = $_SESSION['userBackEnd'];
 $passBackEnd = $_SESSION['passBackEnd'];
 
 include("incluir/seteaConf.php");
 include("incluir/seteaBD.php");
 include("incluir/encripta.php");
 $link = conectar();
 include("incluir/seteaSCR.php");
 include("incluir/funciones.php");

 if(estaActivo($userBackEnd, $passBackEnd)) {
   
   TopPantalla();
   Menu();
?>
<!-- Lado Principal -->
		<td width="">
		<table width="" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff" >
		     <tr><th> m&oacute;dulo ZONAS - SUBZONAS</th></tr>
			 <tr><td height="45"></td></tr>
			 <tr>
			    <td align="center">
				    <table width="450" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#ffffff" style="margin:0 auto;">
		              <tr><td  align="right"><a href="subzona_form.php">[+] Agregar SubZona</a></td></tr>
		              <tr>
		                 <td align="center">
			             <?php
			               echo "<table border=\"0\" cellspacing=\"2\" cellpadding=\"3\" align=\"center\" style=\"margin:0 auto;\">
			                       <tr><th>Nombre Ejercicio</th><th>Nombre Zona</th><th>Nombre Subzona</th><th colspan=\"2\"></th></tr>";
                                   /* Limito la busqueda */
                                   $TAMANO_PAGINA = _tamanoPagina_;
                                   /* examino la página a mostrar y el inicio del registro a mostrar */
                                   $pg = $HTTP_GET_VARS["pg"];
                                   if (!$pg) {$inicio = 0;$pg=1;} else {
                                   $inicio = ($pg - 1) * $TAMANO_PAGINA;}
                                   /*  */
                    
                                   $sqlVal = "SELECT IDSUBZONAEJERCICIO, SZ.IDZONAEJERCICIO, Z.NOMBREZONA, IDEJERCICIO, NOMBRESUBZONA, SZ.FECHACREACION, ESTADOSUBZONA FROM tb_subzonaejercicio AS SZ, tb_zonaejercicio AS Z WHERE SZ.IDZONAEJERCICIO=Z.IDZONAEJERCICIO";
                                   $rsTabla = mysql_query($sqlVal);
                                   $num_total_registros = mysql_num_rows($rsTabla);

                                   if( $num_total_registros > 0 ) {
                                     /* calculo el total de páginas */
                                     $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
                                     /* pongo el número de registros total, el tamaño de página y la página que se muestraA */
                                     $maxpags = _maximoPaginas_;
                                     $minimo = $maxpags ? max(1, $pg-ceil($maxpags/2)): 1;
                                     $maximo = $maxpags ? min($total_paginas, $pg+floor($maxpags/2)): $total_paginas;
                                     /* construyo la sentencia SQL */
                                     $sqlVal.= " LIMIT ". $inicio . "," . $TAMANO_PAGINA .";";

                                     $rsTabla = mysql_query($sqlVal);
                       
					                 while($puntero=mysql_fetch_array($rsTabla))
					                 {
						                $color=($color==""?"#d6e6f5":"");
                                        echo "
                                        <tr Bgcolor=\"".$color."\">
                                           <td>".NombreEjercicio($puntero['IDEJERCICIO'])."</td>
										   <td>".$puntero['NOMBREZONA']."</td>
										   <td>".$puntero['NOMBRESUBZONA']."</td>
										   <td align=\"center\"><a href=\"subzona_modifica.php?id=".$puntero['IDSUBZONAEJERCICIO']."\" title=\"Actualizar Datos\"><img src=\""._rutaImagenes_."actualizar.png\" border=\"0\" width=\"16\" height=\"16\"/>Modificar</a></td>
							               <td align=\"center\">";
                                               if($puntero['ESTADOSUBZONA']=="A") { echo "<img src=\""._rutaImagenes_."green.png\" width=\"16\" alt=\"Activado\" height=\"16\" border=\"0\" />"; } 
                                               else { echo "<img src=\""._rutaImagenes_."red.png\" width=\"16\" alt=\"Desactivado\" height=\"16\" border=\"0\" />"; }
                                     echo "</td>
                                        </tr>";
					                 }
					                 echo "
									    <tr><td colspan=\"5\" height=\"15\"></td></tr>
							            <tr><td colspan=\"5\" height=\"15\"></td></tr>
					                    <tr><td colspan=\"5\">";
					            
								         if ($total_paginas > 1) { echo "<strong>P&aacute;gina </strong>&nbsp;"; }
                                         /* muestro los distintos índices de las páginas, si es que hay varias páginas */
                                         if($pg > 1)
										 {
                                            echo "<a href='".$HTTP_SERVER_VARS["PHP_SELF"]."?pg=".($pg-1)."'>
                                                     <font face='verdana' size='-2'>&laquo;&laquo; anterior</font>
                                                  </a>&nbsp;";
                                         }

                                         if ($total_paginas > 1) {
                                            for ($i=$minimo; $i<$pg; $i++){
	                                            echo "<a href='".$HTTP_SERVER_VARS["PHP_SELF"]."?pg=".$i."'>$i</a>&nbsp;";
                                            }
	                                        echo "[". $pg. "]&nbsp;";
	                                        for ($i=$pg+1; $i<=$maximo; $i++){
	                                            echo "<a href='".$HTTP_SERVER_VARS["PHP_SELF"]."?pg=".$i."'>$i</a>&nbsp;";
                                            }
                                         }

                                         if($pg<$total_paginas) {
                                            echo "&nbsp;<a href='".$HTTP_SERVER_VARS["PHP_SELF"]."?pg=" .($pg+1). "'>
                                            <font face=\"verdana\" size=\"-2\">siguiente &raquo;&raquo;</font></a>";
                                         }
					                     echo "
										</td></tr>";
                                     } else { echo "<tr><td colspan=\"3\"> No se encuentran registros para visualizar</td></tr> ";}
?>
				                     <tr><td colspan="3" height="5"></td></tr>
	                                 <tr>
                                        <td align="left" colspan="3" >
                                           <table style="border:1px solid #cdcdcd;margin:0;padding:3px; color:#333;">
                                              <tr><td style="font-family:Verdana, Arial, Helvetica, sans-serif;font-size:7pt;font-weight:bold; background: #cecece;">Simbolog&iacute;a del Estado del Tipo de Usuario</td></tr>
                                              <tr><td style="font-family:Arial, sans-serif;font-size:6.5pt;"><img src="<?php echo _rutaImagenes_ ;?>green.png" width="8" height="8" border="0" /> &nbsp; Activado</td></tr>
                                              <tr><td style="font-family:Arial, sans-serif;font-size:6.5pt;"><img src="<?php echo _rutaImagenes_ ;?>red.png" width="8" height="8" border="0" /> &nbsp; Desactivado</td></tr>
                                           </table>
                                        </td>
                                     </tr>
							    </td></tr></table>
		
		<!-- -->
		</td></tr></table>
	  </td></tr></table>
   <!-- Central -->
		</td>
<?php
PiePantalla();
} else { echo "<script>alert('Su Sesion de Trabajo no esta Activa, por favor intente reingresando sus datos.'); document.location.href='index.php';</script>\n";}
?>
