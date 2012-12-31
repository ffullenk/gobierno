<?php
 include("incluir/seteaConf.php");
 include("incluir/seteaBD.php");
 include("incluir/encripta.php");
 $link = conectar();
 include("incluir/seteaScr.php");
 include("incluir/funciones.php");
 
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
       $qVeEv = "SELECT evento_id, tpevento, COMUNA, DATE_FORMAT(fechaevento,'%d-%m-%Y') AS fechaevento, evento_obs, dnper_afe, dnper_dam, dnper_her, dnper_mue, dnper_alb, dnviv_may, dnviv_men, dnviv_des ".
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
            
            
           
           
           echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" id=\"veevento\">
                    <tr>
                       <th>ID Evento</th>
                       <td>".$pVeEv['evento_id']."</td>
                    </tr>
                    <tr>
                       <th>Evento</th>
                       <td>".$pVeEv['tpevento']."</td>
                    </tr>
                    <tr>
                       <th>Fecha Ocurrencia</th>
                       <td>".$pVeEv['fechaevento']."</td>
                    </tr>
                    <tr>
                       <th>Comuna</th>
                       <td>".$pVeEv['COMUNA']."</td>
                    </tr>
                 </table>
                 
                 <p style=\"width: 120px; margin-left: 145px; padding: 5px 10px; text-align: center; background-color: #000000; color: #ffffff;\"><a href=\"javascript:window.back();\">Volver Atr&aacute;s</a></p>
                 
                 <table style=\"margin:0 auto;\" cellspacing=\"3\" cellpadding=\"5\">
                    <tr valign=\"top\">
                       <td>
                          <table width=\"350\" cellspacing=\"2\" cellpadding=\"3\">
                             <tr><td class=\"tituloTH\">Descripcion del Evento</td></tr>
                             <tr><td>".$pVeEv['evento_obs']."</td></tr>
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
                                <td>".$vdnper_afe."</td>
                                <td>".$vdnper_dam."</td>
                                <td>".$vdnper_her."</td>
                                <td>".$vdnper_mue."</td>
                                <td>".$vdnper_alb."</td>
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
                                <td>".$vdnviv_may."</td>
                                <td>".$vdnviv_men."</td>
                                <td>".$vdnviv_des."</td>
                             </tr>
                          </table>
                       </td>
                    </tr>
                 </table>
                 
                 ";
       }
       
echo " 
    </body>
</html>";
?>
