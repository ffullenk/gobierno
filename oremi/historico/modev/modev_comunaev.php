<?php
 include("../incluir/seteaConf.php");
 include("../incluir/seteaBD.php");
 include("../incluir/encripta.php");
 $link = conectar();
 include("../incluir/seteaScr.php");
 include("../incluir/funciones.php");
 
 
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
    
    #tipoevento {margin:0 auto; border: 1px solid lime;}
    #tipoevento th { padding: 5px; background-color: #e4e4e4;}
    #tipoevento td { padding: 5px; text-align: center; }
    .tituloTH { text-align: center; color: white; background-color: #ff6600; font-weight: bold; font-size: 1em;}
    h1 { text-align: center; }
    p a { color: #ffffff; }
         </style>
         <script src="../javas/selectusers.js"></script>
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
       $qVeEv = "SELECT evento_id, tpevento, H.tpevento_id, COMUNA, DATE_FORMAT('%d-%m-%Y',fechaevento) AS fechaevento ".
                           "FROM orm_historico AS H, orm_tipoevento AS T, COMUNA AS C ".
                           "WHERE H.tpevento_id = T.tpevento_id ".
                           "AND H.COM_ID = C.COM_ID
                            AND evento_id=\"$id\"";
       $rVeEv = mysql_query($qVeEv);
       
       if(mysql_num_rows($rVeEv) > 0 ) {
           $pVeEv = mysql_fetch_array($rVeEv);
           ?>
            <form action="modev_comunaev-act.php" method="post" name="evento" id="evento">
            <?php
                echo "<input type=\"hidden\" name=\"tpevento_id\" value=\"".$pVeEv['tpevento_id']."\">";
           
           
           echo "
           
           <table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" id=\"veevento\">
              <tr>
                 <th>ID Evento</th>
                 <td >".$pVeEv['evento_id']."</td>
              </tr>
              <tr>
                 <th>Evento</th>
                 <td>".$pVeEv['tpevento']."</td>
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
                echo "       </table>
                          </td>
                       </tr>";    
              }
              echo " 
              <tr><th>Comuna</th><td>".$pVeEv['COMUNA']."</td>      
           </table>
           
           <p style=\"width: 120px; margin-left: 145px; padding: 5px 10px; text-align: center; background-color: #000000; color: #ffffff;\"><a href=\"javascript:window.back();\">Volver Atr&aacute;s</a></p>
           
           "; 
           ?>
           
           <input type="hidden" name="id" value="<?=$id?>">
           <input type="hidden" name="o" value="<?=$o?>">
           
           <table id="tipoevento">
              <tr>
                                <th>Comuna</th>
                                <td>
                                   <?php
                                       $qComunas = "SELECT COM_ID, COMUNA FROM COMUNA WHERE PROV_ID BETWEEN 10 AND 12";
                                       $rsComunas = mysql_query($qComunas);
                                       if(mysql_num_rows($rsComunas) > 0 )
                                       {
                                          echo "<select name=\"comuna\" id=\"comuna\" size=\"1\"  onchange=\"showLocalidades(this.value)\"  >
                                                   <option value=\"-\">Seleccione Comuna...</option>";
                                                   while($pCom = mysql_fetch_array($rsComunas))
                                                   {
                                                      echo "<option value=\"".$pCom['COM_ID']."\">".htmlentities($pCom['COMUNA'])."</option>";
                                                   }
                                          echo "</select>";
                                       }
                                   ?>
                                </td>
                             </tr>
                             <tr><td colspan="2" >
                                    <table border="0" cellspacing="1" cellpadding="2" align="center" style="border:1px solid #C3D9FF;">
                                       <tr><th class="subtabla">Localidades Afectadas</th></tr>
                                       <tr><td><div id="txtLoc"><b>Caracteristicas del Evento de Acuerdo a la Seleccion.</b></div></td></tr>
                                    </table>
                                 </td></tr>
                                  <tr><td colspan="2" height="25"></td></tr>
                           </table>
                       </td>
                   </tr>
                   <tr><td colspan="2" height="25"></td></tr>
           </table>
           <div align="center"><input type="submit" name="cambiatipo" value="Aceptar Cambios"></div>
           </form>
                 
<?php                  
       }
       
echo " 
    </body>
</html>";
?>
