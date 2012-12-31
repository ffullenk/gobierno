<?php
 session_start();
 
 $userBackEnd = $_SESSION['userBackEnd'];
 $passBackEnd = $_SESSION['passBackEnd'];
 
 include("../incluir/seteaConf.php");
 include("../incluir/seteaBD.php");
 include("../incluir/encripta.php");
 $link = conectar();
 include("../incluir/seteaScr.php");
 include("../incluir/funciones.php");

 if(estaActivo($userBackEnd, $passBackEnd)) {
   
   oremiCab();
   oremiMenu(esUsuario($userBackEnd, $passBackEnd), 4);
   oremiColDer( esUsuario($userBackEnd, $passBackEnd), 4 );
?>
	<div id="colTwo">
		<div class="bg2">
			<h2><em>Mantenedor</em>: Datos del Tipos de Evento</h2>
			<p>Datos del Tipos de Evento.</p>
		
		    <h3>Listado de Registros Datos del Tipos de Evento</h3>
		    <div class="bg1">
			    <p align="right"><a href="form_agregar_datosevento.php" title="Agregar Registro de Datos del Tipo de Evento">Agregar Registro de Datos del Tipo de Evento</a></p>
				<?php
				echo "<table border=\"0\" cellspacing=\"2\" cellpadding=\"3\" width=\"90%\" align=\"center\" id=\"listaTabla\">
				        <tr><th>Nombre Registro Datos del Tipo de Evento</th><th colspan=\"2\">Estado</th></tr>";
                 /* Limito la busqueda */
                 $TAMANO_PAGINA = _tamanoPagina_;
                 /* examino la página a mostrar y el inicio del registro a mostrar */
                 $pg = $HTTP_GET_VARS["pg"];
                 if (!$pg) {$inicio = 0;$pg=1;} else {
                 $inicio = ($pg - 1) * $TAMANO_PAGINA;}
                 /*  */
                    
                 $sqlVal = "SELECT dt_id, dtatributo, dtevento_id, dtunidad_id, tpevento, D.estado 
				            FROM orm_datostipoevento AS D, orm_tipoevento AS T
							WHERE
							    D.dtevento_id=T.tpevento_id";
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
				    $puntero = mysql_fetch_array($rsTabla);
                    while($puntero) {
                        $color=($color==""?"#d6e6f5":"");
                        echo "
                        <tr Bgcolor=\"#d6e6f5\">
                            <td colspan=\"3\">".$puntero['tpevento']."</td></tr>";
							$IDtipoevento = $puntero['dtevento_id'];
							
							while($IDtipoevento==$puntero['dtevento_id'])
							{
							   echo "
							   <tr>
							      <td>".$puntero['dtatributo']."</td>
							      <td align=\"center\">";
                                     if($puntero['estado']=="A") { echo "<img src=\""._rutaImagenes_."green.png\" width=\"16\" alt=\"Activado\" height=\"16\" border=\"0\" />"; } 
                                     else { echo "<img src=\""._rutaImagenes_."red.png\" width=\"16\" alt=\"Desactivado\" height=\"16\" border=\"0\" />"; }
                            echo "</td>
                                  <td align=\"center\"><a href=\"form_modificar_datosevento.php?id=".$puntero['dt_id']."\" title=\"Actualizar Datos\"><img src=\""._rutaImagenes_."actualizar.png\" border=\"0\" width=\"16\" height=\"16\"/></a></td>
                               </tr>
							   ";
							  
							   $puntero = mysql_fetch_array($rsTabla);
							}
							 echo "<tr><td colspan=\"3\" height=\"15\"></td></tr>";
					}
					echo "<tr><td colspan=\"3\" height=\"15\"></td></tr>
					      <tr><td colspan=\"3\">";
					             if ($total_paginas > 1) { echo "<strong>P&aacute;gina </strong>&nbsp;"; }
                                 /* muestro los distintos índices de las páginas, si es que hay varias páginas */
                                 if($pg > 1) {
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
					echo "</td></tr>";
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
				</table>
		    </div>
		</div>
<?php
oremiPie();
} else { echo "<script>alert('Su Sesion de Trabajo no esta Activa, por favor intente reingresando sus datos.'); document.location.href='../index.php';</script>\n";}
?>