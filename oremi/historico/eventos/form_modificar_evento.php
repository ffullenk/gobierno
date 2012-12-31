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
   oremiMenu(esUsuario($userBackEnd, $passBackEnd), 2);
   oremiColDer( esUsuario($userBackEnd, $passBackEnd), 2 );

   
   ?>
	<div id="colTwo">
		<div class="bg2">
			<h2><em>Eventos</em>: Modificar Evento</h2>
			<p></p>
		    <h3>Formulario Modificar Evento</h3>
		    <div class="bg1">
			    <p align="right">&nbsp;</p>
				<script language="javaScript" type="text/javascript" src="../javas/jsforms.js"></script>
				<?php
                /* Recibimos los datos del paso 1*/
                $comuna = $_POST['comuna'];
                $tipoevento = $_POST['tipoevento'];
                $fecha = $_POST['fecha'];
                $fechahasta = $_POST['fechahasta'];
                
                /* Construimos el Query de acuerdo a los parametros buscados*/
                ?>
				
				<table border="0" cellspacing="2" cellpadding="3" width="90%" align="center" id="listaTabla">
                   <tr><th colspan="2" style="font-size:1.8em;">Modificar Evento Paso 2</th></tr>
			       <tr><td colspan="2" height="25"></td></tr>
				   <tr><td colspan="2" style="border-bottom:1px solid #555;font-size:1.3em;">Resultado B&uacute;squeda de Ocurrencias</td></tr>
				   <tr><td colspan="2" height="10"></td></tr>
                   <tr><td colspan="2" >
				   <?php
                echo "<table border=\"0\" cellspacing=\"2\" cellpadding=\"3\" width=\"98%\" align=\"center\" id=\"listaTabla\">
                        <tr><th>Fecha Evento</th><th>Hora Evento</th><th>Observaciones</th><th>Acci&oacute;n</th></tr>";
                 /* Limito la busqueda */
                 $TAMANO_PAGINA = _tamanoPagina_;
                 /* examino la página a mostrar y el inicio del registro a mostrar */
                 $pg = $HTTP_GET_VARS["pg"];
                 if (!$pg) {$inicio = 0;$pg=1;} else {
                 $inicio = ($pg - 1) * $TAMANO_PAGINA;}
                 /*  */
                    
                 $sqlVal = "SELECT evento_id, tpevento_id, COM_ID, fechaevento, horaevento, evento_obs
                                   FROM orm_historico
                                   WHERE
                                        tpevento_id=\"$tipoevento\" AND
                                        COM_ID=\"$comuna\" ";
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
                            <td>".$puntero['fechaevento']."</td>
                            <td>".$puntero['horaevento']."</td>
                            <td>".$puntero['evento_obs']."</td>
                            <td align=\"center\"><a href=\"form_editar_evento.php?id=".$puntero['evento_id']."\" title=\"Actualizar Evento\"><img src=\""._images_."actualizar.png\" border=\"0\" width=\"16\" height=\"16\"/></a></td>
                        </tr>";
                    } //desconectar($link);
                    echo "<tr><td colspan=\"4\" height=\"15\"></td></tr>
                          <tr><td colspan=\"4\">";
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
                 } else { echo "<tr><td colspan=\"4\"> No se encuentran registros para visualizar</td></tr> ";}
                 echo "</table>";
                ?>
                   </td></tr>
                   <tr><td colspan="2" height="5"></td></tr>
		            
                    <tr><td colspan="2" height="5"></td></tr>
				</table>
				
		    </div>
		</div>

<?php
oremiPie();
} else { echo "<script>alert('Su Sesion de Trabajo no esta Activa, por favor intente reingresando sus datos.'); document.location.href='../index.php';</script>\n";}
?>