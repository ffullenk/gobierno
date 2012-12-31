<?php
  session_start();
 
 $userBackEnd = $_SESSION['userBackEnd'];
 $passBackEnd = $_SESSION['passBackEnd'];
 
  include("../incluir/seteaConf.php");
 include("../incluir/seteaBD.php");
 include("../incluir/encripta.php");
 $link = conectar();
 
 $q=$_GET["q"];

				echo "<table border=\"0\" cellspacing=\"2\" cellpadding=\"3\" width=\"95%\" align=\"center\" id=\"listaTabla\">
				        <tr height=\"30\"><th>Tipo de Evento</th><th>Fecha Ocurrencia</th><th>Descripci&oacute;n</th><th>Comuna</th></tr>";
                 /* Limito la busqueda */
                 $TAMANO_PAGINA = _tamanoPagina_;
                 /* examino la página a mostrar y el inicio del registro a mostrar */
                 $pg = $HTTP_GET_VARS["pg"];
                 if (!$pg) {$inicio = 0;$pg=1;} else {
                 $inicio = ($pg - 1) * $TAMANO_PAGINA;}
                 /*  */
                    
                 $sqlVal = "SELECT evento_id, tpevento, COMUNA, fechaevento, evento_obs ".
                           "FROM orm_historico AS H, orm_tipoevento AS T, COMUNA AS C ".
                           "WHERE H.tpevento_id = T.tpevento_id ".
                           "AND H.COM_ID = C.COM_ID AND 
						   C.PROV_ID='".$q."'";
						   
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
				    
                    while($puntero = mysql_fetch_array($rsTabla) ) {
                        $color=($color==""?"#d6e6f5":"");
                        echo "
                        <tr Bgcolor=\"".$color."\">
                            <td>".$puntero['tpevento']."</td>
	                        <td>".$puntero['fechaevento']."</td>
							<td>".$puntero['evento_obs']."</td>
							<td>".$puntero['COMUNA']."</td>							
                        </tr>";
                    } //desconectar($link);
					echo "<tr><td colspan=\"5\" height=\"15\"></td></tr>
					      <tr><td colspan=\"5\">";
					             if ($total_paginas > 1) { echo "<strong>P&aacute;gina </strong>&nbsp;"; }
                                 /* muestro los distintos índices de las páginas, si es que hay varias páginas */
                                 if($pg > 1) {
                                    echo "<a href='xprovincias.php?pg=".($pg-1)."&q=".$q."'>
                                             <font face='verdana' size='-2'>&laquo;&laquo; anterior</font>
                                          </a>&nbsp;";
                                 }

                                 if ($total_paginas > 1) {
                                    for ($i=$minimo; $i<$pg; $i++){
	                                   echo "<a href='xprovincias.php?pg=".$i."&q=".$q."'>$i</a>&nbsp;";
                                    }
	                                echo "[". $pg. "]&nbsp;";
	                                for ($i=$pg+1; $i<=$maximo; $i++){
	                                   echo "<a href='xprovincias.php?pg=".$i."&q=".$q."'>$i</a>&nbsp;";
                                    }
                                 }

                                 if($pg<$total_paginas) {
                                    echo "&nbsp;<a href='xprovincias.php?pg=" .($pg+1). "&q=".$q."'>
                                    <font face=\"verdana\" size=\"-2\">siguiente &raquo;&raquo;</font></a>";
                                 }
					echo "</td></tr>";
                 } else { echo "<tr><td colspan=\"5\"> No se encuentran registros para visualizar</td></tr> ";}
				?>
				<tr><td colspan="5" height="5"></td></tr>
				</table>