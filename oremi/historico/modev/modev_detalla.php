<?php
 include("../incluir/seteaConf.php");
 include("../incluir/seteaBD.php");
 include("../incluir/encripta.php");
 $link = conectar();
 include("../incluir/seteaScr.php");
 include("../incluir/funciones.php");
 
 $pg = $_GET['pg'];
 $id = $_GET['id'];
 $o = $_GET['o'];
 
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
    #veevento {margin:0 auto; border: 1px solid aqua;}
    #veevento th { padding: 5px; background-color: #e8e8e8; text-align: right; }
    #veevento td { padding: 5px; background-color: #ffffff; }
    
    #detallepersonas {margin:0 auto; border: 1px solid lime;}
    #detallepersonas th { padding: 5px; background-color: #e4e4e4;}
    #detallepersonas td { padding: 5px; text-align: center; }
    .tituloTH { text-align: center; color: white; background-color: #ff6600; font-weight: bold; font-size: 1em;}
    h1 { text-align: center; }
    p a { color: #ffffff; }
         </style>
         
         <Script language="JavaScript" src="../javas/fecha.js" type="text/javascript"></Script>
         <Script language="JavaScript" src="../javas/calendar1.js" type="text/javascript"></Script>
                
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
                   <td ";
                   if($o==1) { echo "class=\"actual\"";}
                   echo "><a href=\"\" >Todos</a></td>
                   <td ";
                   if($o==2) { echo "class=\"actual\"";}
                   echo "><a href=\"evexprov.php\">x Provincia</a></td>
                   <td ";
                   if($o==3) { echo "class=\"actual\"";}
                   echo "><a href=\"evexcomu.php\">x Comuna</a></td>
                   <td ";
                   if($o==4) { echo "class=\"actual\"";}
                   echo "><a href=\"evexeven.php\">x Evento</a></td>
                </tr>
             </table>
             </td>
                     
          </tr>
       </table>
       
       <h1>Todos los Eventos</h1>";

       /* Generamos la consulta */
       $qVeEv = "SELECT evento_id, tpevento, COMUNA, fechaevento, evento_obs, dnper_afe, dnper_dam, dnper_her, dnper_mue, dnper_alb, dnviv_may, dnviv_men, dnviv_des ".
                           "FROM orm_historico AS H, orm_tipoevento AS T, COMUNA AS C ".
                           "WHERE H.tpevento_id = T.tpevento_id ".
                           "AND H.COM_ID = C.COM_ID
                            AND evento_id=\"$id\"";
       $rVeEv = mysql_query($qVeEv);
       
       if(mysql_num_rows($rVeEv) > 0 ) {
           $pVeEv = mysql_fetch_array($rVeEv);
           
            if(!isset($pVeEv['dnper_afe'])) { $vdnper_afe = $pVeEv['dnper_afe]'];} else { $vdnper_afe = 0; }
            if(!isset($pVeEv['dnper_dam'])) { $vdnper_dam = $pVeEv['dnper_dam'];} else { $vdnper_dam = 0; }
            if(!isset($pVeEv['dnper_her'])) { $vdnper_her = $pVeEv['dnper_her'];} else { $vdnper_her = 0; }
            if(!isset($pVeEv['dnper_mue'])) { $vdnper_mue = $pVeEv['dnper_mue'];} else { $vdnper_mue = 0; }
            if(!isset($pVeEv['dnper_alb'])) { $vdnper_alb = $pVeEv['dnper_alb'];} else { $vdnper_alb = 0; }
            
            if(!isset($pVeEv['dnviv_may'])) { $vdnviv_may = $pVeEv['dnviv_may'];} else { $vdnviv_may = 0; }
            if(!isset($pVeEv['dnviv_men'])) { $vdnviv_men = $pVeEv['dnviv_men'];} else { $vdnviv_men = 0; }
            if(!isset($pVeEv['dnviv_des'])) { $vdnviv_des = $pVeEv['dnviv_des'];} else { $vdnviv_des = 0; }
            ?>
            <form action="form_actualizar_evento.php" method="post" name="evento" id="evento" onSubmit="chequea_form_modificar_evento_paso3(); return false">
            <?php
            
           
           
           echo "
           
           <table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" id=\"veevento\">
                    <tr>
                       <th>ID Evento</th>
                       <td colspan\"2\">".$pVeEv['evento_id']."</td>
                       
                    </tr>
                    <tr>
                       <th>Evento</th>
                       <td>".$pVeEv['tpevento']."</td>
                       <td><a href=\"modev_tipoev.php?id=".$id."\">Cambiar Tipo Evento</a></td>
                    </tr> ";
                    /* Mostrar Datos del Tipo de Evento */
                    $qDTE = "SELECT dtatributo, valor 
                             FROM hist_datosevento AS V, orm_datostipoevento AS D
                             WHERE
                                  V.dt_id=D.dt_id AND
                                  V.evento_id=\"$id\"";
                    $rDTE = mysql_query($qDTE);
                             
                    if(mysql_num_rows($rDTE)>0) {
                       echo "<tr>
                                <th></th>
                                <td>
                                   <table cellpadding=\"0\" cellspacing=\"0\" style=\"border:1px solid #ccc;\">";
                                   while($pDTE=mysql_fetch_array($rDTE) ) {
                                      echo "
                                           <tr>
                                              <td>".$pDTE['dtatributo']."</td>
                                              <td>".$pDTE['valor']."</td>
                                            </tr>";
                                   }
                       echo "      </table>
                                </td>
                            </tr>";    
                    }
             echo "       
                    <tr>
                       <th>Fecha Ocurrencia</th>
                       <td colspan=\"2\">"; ?>
<input type="text" name="fecha" size="10" maxlength="10" value="<?=convertir_fecha($pVeEv['fechaevento'])?>" onchange="return ValidaFecha2(this.value);">&nbsp;
<a href="javascript:cal1.popup();"><img src="../images/cal.gif" width="16" height="16" border="0" alt="Fecha Ocurrencia"></a> &nbsp; formato: dd-mm-aaaa (d&iacute;a-mes-a&ntilde;o)
<script language="JavaScript">
<!-- // 
var cal1 = new calendar1(document.forms['evento'].elements['fecha']);
cal1.year_scroll = true;
cal1.time_comp = false;
//-->
</script>
                       <?php
                       echo "
                       </td>
                    </tr>
                    <tr>
                       <th>Comuna</th>
                       <td>".$pVeEv['COMUNA']."</td>
                       <td>
                          <a href=\"modev_veloc.php?id=".$id."\" target=\"_blank\" onClick=\"window.open(this.href, this.target, 'width=460,height=400,scrollbars=yes'); return false;\">Ver Localidades</a> | 
                          <a href=\"modev_comunaev.php?id=".$id."\">Cambiar Comuna</a></td>
                    </tr>
                 </table>

                 <p style=\"width: 120px; margin-left: 145px; padding: 5px 10px; text-align: center; background-color: #000000; color: #ffffff;\"><a href=\"javascript:window.back();\">Volver Atr&aacute;s</a></p>
                 
                 <table style=\"margin:0 auto;\" cellspacing=\"3\" cellpadding=\"5\">
                    <tr valign=\"top\">
                       <td>
                          <table width=\"350\" cellspacing=\"2\" cellpadding=\"3\">
                             <tr><td class=\"tituloTH\">Descripcion del Evento</td></tr>
                             <tr><td>
                                    <textarea name=\"evento_obs\" rows=\"8\" cols=\"40\">".$pVeEv['evento_obs']."</textarea></td></tr>
                          </table>
                       </td>
                       <td>
                          <table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" id=\"detallepersonas\">
                             <tr><td class=\"tituloTH\" colspan=\"5\">Da&ntilde;o Personas</td></tr>
                             <tr>
                                <th>Afectadas</th>
                                <th>Damnificadas</th>
                                <th>Heridas</th>
                                <th>Muertas</th>
                                <th>Albergadas</th>
                             </tr>
                             <tr>
                                <td><input type=\"text\" name=\"vdnper_afe\" value=\"$vdnper_afe\" size=\"10\" maxlenght=\"12\"></td>
                                <td><input type=\"text\" name=\"vdnper_dam\" value=\"$vdnper_dam\" size=\"10\" maxlenght=\"12\"></td>
                                <td><input type=\"text\" name=\"vdnper_her\" value=\"$vdnper_her\" size=\"10\" maxlenght=\"12\"></td>
                                <td><input type=\"text\" name=\"vdnper_mue\" value=\"$vdnper_mue\" size=\"10\" maxlenght=\"12\"></td>
                                <td><input type=\"text\" name=\"vdnper_alb\" value=\"$vdnper_alb\" size=\"10\" maxlenght=\"12\"></td>
                             </tr>
                          </table>
                 
                          <p>&nbsp;</p>
                 
                          <table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" id=\"detallepersonas\">
                             <tr><td class=\"tituloTH\" colspan=\"5\">Da&ntilde;o Viviendas</td></tr>
                             <tr>
                                <th>Da&ntilde; Mayor</th>
                                <th>Da&ntilde; Menor</th>
                                <th>Destruidas</th>
                             </tr>
                             <tr>
                                <td><input type=\"text\" name=\"vdnviv_may\" value=\"$vdnviv_may\" size=\"10\" maxlenght=\"12\"></td>
                                <td><input type=\"text\" name=\"vdnviv_men\" value=\"$vdnviv_men\" size=\"10\" maxlenght=\"12\"></td>
                                <td><input type=\"text\" name=\"vdnviv_des\" value=\"$vdnviv_des\" size=\"10\" maxlenght=\"12\"></td>
                             </tr>
                          </table>
                       </td>
                    </tr>
                 </table>
                 <div align=\"center\"><input type=\"submit\" name=\"cambiaevento\" value=\"Aceptar Cambios\"></div>
            </form>
                 ";
       }
       
echo " 
    </body>
</html>";
?>
