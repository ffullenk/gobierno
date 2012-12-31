<?php
 include("incluir/seteaConf.php");
 include("incluir/seteaBD.php");
 include("incluir/encripta.php");
 $link = conectar();
 include("incluir/seteaScr.php");
 include("incluir/funciones.php");
 
 
 ?>
 <body>
    <head>
         <title>Eventos Historicos en la regi&oacute;n de Coquimbo</title>
         <style type="text/css">
            
            body { 
                   font-family: verdana,sans-serif;
    font-size:    x-small;
    voice-family: "\"}\"";
    voice-family: inherit;
    font-size: small;
    color: #000;
    margin:0;
    padding:0;
                }
    th { font-size: 0.75em;background-color: #bcbcbc; text-align: center; text-transform: uppercase;}
    td { font-size: 0.7em;}
    #menutabla { color: #ffffff; }
    #menutabla a { text-decoration: none; padding: 0px 10px; background-color: #212121; color: #ffffff;}
    .actual { background-color: #ffffff; color: #000000; }
    h1 { text-align: center; }
         </style>
    </head>
 <?php
 echo "   
    <body>
       <table border=\"0\" cellspacing=\"0\"  cellpadding=\"0\" width=\"100%\">
          <tr><td height=\"35\" style=\"background-color:#ff6600;padding-left: 15px; color: #ffffff; font-size: 1.2em;\">Visualizaci&oacute;n de Eventos Hist&oacute;ricos</td></tr>
          <tr>
             <td  style=\"background-color: #000000;\">
             <table border=\"0\" cellspacing=\"5\" cellpadding=\"5\" align=\"center\" id=\"menutabla\">
                <tr>
                   <td><a href=\"eventos.php\" >Todos</a></td>
                   <td><a href=\"evexprov.php\">x Provincia</a></td>
                   <td class=\"actual\"><a href=\"evexcomu.php\">x Comuna</a></td>
                   <td><a href=\"evexeven.php\">x Evento</a></td>
                </tr>
             </table>
             </td>
                     
          </tr>
       </table>
       
       <h1>Eventos por Comunas</h1>
       
       <table border=\"0\" align=\"center\">
          <tr>
             <td>Ver Eventos de:</td>
             <td>
                <form method=\"get\">             
                <select name=\"q\" size=\"1\">";
                  // Lista las Provincias de la region de coquimbo
                  if (!$q) {$q="-";} else { $q = $_GET['q']; }
                  $qCom = "SELECT COM_ID, COMUNA FROM COMUNA AS C, PROVINCIA AS P WHERE C.PROV_ID=P.PROV_ID AND P.REGION_ID=\"4\"";
                  $rCom = mysql_query($qCom);
                  if(mysql_num_rows($rCom) > 0 )
                  {
                     echo "<option value=\"-\">Todas las Comunas</option>";
                     while($pCom = mysql_fetch_array($rCom))
                        {
                           if($pCom['COM_ID']==$q)
                           {
                              echo "<option value=\"".$pCom['COM_ID']."\" selected>".htmlentities($pCom['COMUNA'])."</option>";
                           } else {
                              echo "<option value=\"".$pCom['COM_ID']."\">".htmlentities($pCom['COMUNA'])."</option>";
                           }
                         }
                   }
                   
echo "           </select>
                 <input type=\"submit\" value=\"Ver\" >
                 </form>
              </td>
          </tr>
       </table>
 ";
 /* */
 /* Limito la busqueda */
 $TAMANO_PAGINA = 50;
 /* examino la página a mostrar y el inicio del registro a mostrar */
 $pg = $HTTP_GET_VARS["pg"];
 if (!$pg) {$inicio = 0;$pg=1;} else {
 $inicio = ($pg - 1) * $TAMANO_PAGINA;}
                 /*  */
 
 $qEventos = "SELECT evento_id, tpevento, COMUNA, DATE_FORMAT(fechaevento,'%d-%m-%Y') AS fechaevento, evento_obs ".
                           "FROM orm_historico AS H, orm_tipoevento AS T, COMUNA AS C ".
                           "WHERE H.tpevento_id = T.tpevento_id ".
                           "AND H.COM_ID = C.COM_ID ";
                           
 if($q!="-") { $qEventos.= " AND C.COM_ID='".$q."'"; }                          
 
 $rEventos = mysql_query($qEventos);
 $num_total_registros = mysql_num_rows($rEventos);
 if(mysql_num_rows($rEventos)>0) {
     
     echo "
     <table border=\"0\" cellspacing=\"0\"  cellpadding=\"0\" width=\"960\" align=\"center\">
       <tr>
          <td>
            <table border=\"0\" cellspacing=\"2\" cellpadding=\"7\" width=\"95%\" align=\"center\" style=\"border:1px solid #ccc;\">
                        <tr height=\"30\"><th>Tipo de Evento</th><th>Fecha<br>Ocurrencia</th><th>Comuna</th><th>Descripci&oacute;n</th><td></td></tr>";
                    /* calculo el total de páginas */
                    $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
                    /* pongo el número de registros total, el tamaño de página y la página que se muestraA */
                    $maxpags = 10;
                    $minimo = $maxpags ? max(1, $pg-ceil($maxpags/2)): 1;
                    $maximo = $maxpags ? min($total_paginas, $pg+floor($maxpags/2)): $total_paginas;
                    /* construyo la sentencia SQL */
                    $qEventos.= " LIMIT ". $inicio . "," . $TAMANO_PAGINA .";";

                    $rEventos = mysql_query($qEventos);
                    
                    while($puntero = mysql_fetch_array($rEventos) ) {
                        $color=($color==""?"#d6e6f5":"");
                        echo "
                        <tr Bgcolor=\"".$color."\">
                            <td>".$puntero['tpevento']."</td>
                            <td>".$puntero['fechaevento']."</td>
                            <td>".$puntero['COMUNA']."</td>
                            <td>".$puntero['evento_obs']."</td>
                            <td><a href=\"ve_localidades.php?id=".$puntero['evento_id']."\">Ver Localidades</a> | <a href=\"ve_evento.php?id=".$puntero['evento_id']."&o=3\">Ver Detalle</a></td>                            
                        </tr>";
                    } //desconectar($link);
                    echo "<tr><td colspan=\"5\" height=\"15\"></td></tr>
                          <tr><td colspan=\"5\">";
                                 if ($total_paginas > 1) { echo "<strong>P&aacute;gina </strong>&nbsp;"; }
                                 /* muestro los distintos índices de las páginas, si es que hay varias páginas */
                                 if($pg > 1) {
                                    echo "<a href='".$HTTP_SERVER_VARS["PHP_SELF"]."?pg=".($pg-1)."&q=".$q."'>
                                             <font face='verdana' size='-2'>&laquo;&laquo; anterior</font>
                                          </a>&nbsp;";
                                 }

                                 if ($total_paginas > 1) {
                                    for ($i=$minimo; $i<$pg; $i++){
                                       echo "<a href='".$HTTP_SERVER_VARS["PHP_SELF"]."?pg=".$i."&q=".$q."'>$i</a>&nbsp;";
                                    }
                                    echo "[". $pg. "]&nbsp;";
                                    for ($i=$pg+1; $i<=$maximo; $i++){
                                       echo "<a href='".$HTTP_SERVER_VARS["PHP_SELF"]."?pg=".$i."&q=".$q."'>$i</a>&nbsp;";
                                    }
                                 }

                                 if($pg<$total_paginas) {
                                    echo "&nbsp;<a href='".$HTTP_SERVER_VARS["PHP_SELF"]."?pg=" .($pg+1). "&q=".$q."'>
                                    <font face=\"verdana\" size=\"-2\">siguiente &raquo;&raquo;</font></a>";
                                 }
                    echo "</td></tr>
            </table> 
     </td>
     </tr>
  </table>";
 }
 
 
 echo "
      
 </body>
</html>";
 
?>
