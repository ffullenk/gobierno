<?php
session_start();
 
 $userBackEnd = $_SESSION['userBackEnd'];
 $passBackEnd = $_SESSION['passBackEnd'];
 $tipoUsrBackEnd = $_SESSION['tipoUsrBackEnd'];
 
 include("../incluir/seteaConf.php");
 include("../incluir/seteaBD.php");
 include("../incluir/encripta.php");
 $link = conectar();

 include("../incluir/seteaScr.php");
 include("../incluir/funciones.php");

 if(estaActivo($userBackEnd, $passBackEnd)) {
   jicaOrm_cabecera();
   jicaOrm_SinMenuAdmin();

   // Obtenemod el ID del Escenario
   $idE = $HTTP_GET_VARS["idE"];

   ?>
   <!-- Presentacion Inicial -->
   <td colspan="2" align="center">
      <form action="graba_accion.php" method="post" name="evento" id="evento">
         <input type="hidden" name="idE" id="idE" value="<?php echo $idE; ?>">

         <table border="0" cellspacing="0" cellpadding="0" class="tabla">
            
            <tr><td>Identificacione Usuario: <?php echo muestraUsuario($userBackEnd);?></td></tr>
        
        <?php
        $qChkEscenarios = "SELECT tpevento, LUGAR, DESCRIBEESCENARIO, OCURRENCIA ".
                          "FROM orm_escenario AS E, orm_tipoevento AS T, orm_lugar AS L ".
                          "WHERE                                
                               E.tpevento_id=T.tpevento_id AND 
                               E.ID_LUGAR=L.ID_LUGAR AND 
                               E.ID_ESCENARIO=\"$idE\" AND 
                               ESTADOESCENARIO=\"A\" ";

        $rChkEscenarios = mysql_query($qChkEscenarios );

        if(mysql_num_rows($rChkEscenarios) > 0 )
        {
           echo "<tr><td>
                        <div style=\"margin:15px; padding:15px 10px; border:1px solid #eaeaea;\">";

                        $ptrEsce = mysql_fetch_array($rChkEscenarios);
     
                        echo "
                            <h2>Escenario: ".$ptrEsce['DESCRIBEESCENARIO']."</h2>
                            <h3>Lugar: ".$ptrEsce['LUGAR']."</h3>
                            <h3>Tipo de Evento: ".$ptrEsce['tpevento']."</h3>
                            <h3>Ocurrencia: ".convertir_fecha($ptrEsce['OCURRENCIA'])."</h3>
                            </div>
                </td></tr>
                ";
        }


        // Chequea los Puntos Criticos a los cuales tiene derecho el usuario
        // y mostrar los serivicios relacionados con aquellos puntos.

        $qPtos = "SELECT P.ID_PTOCRITICO, PTOCRITICO, SERVREL FROM orm_ptoscriticos AS P, orm_derechoa AS D WHERE P.ID_PTOCRITICO=D.ID_PTOCRITICO AND D.ormusr_id=\"".muestraID($userBackEnd)."\" AND ESTADOPTOCRITICO=\"A\" ";

        $rPtos = mysql_query($qPtos);

        if(mysql_num_rows($rPtos) > 0 )
        {  ?>

           <Script language="JavaScript" src="../javas/fecha.js" type="text/javascript"></Script>
           <Script language="JavaScript" src="../javas/calendar1.js" type="text/javascript"></Script>

          <tr><td align="center"><h1>Ingreso De Acciones</h1></td></tr>
           <tr>
              <th>Fecha:
                  <input type="text" name="fecha" id=fecha" size="10" maxlength="10" value="<?php echo convertir_fecha($ptrEsce['OCURRENCIA']);?>" onchange="return ValidaFecha2(this.value);"> &nbsp; 
                  <a href="javascript:cal1.popup();"><img src="../images/cal.gif" width="16" height="16" border="0" alt="Fecha Ocurrencia"></a>

<script language="JavaScript">
<!-- // 
var cal1 = new calendar1(document.forms['evento'].elements['fecha']);
cal1.year_scroll = true;
cal1.time_comp = false;
//-->
</script>

              </th>
           </tr>
           <tr>
              <th>Hora:

                 <select name="hora" size="1">
                 <?php
                     for($nhor=0;$nhor<=24;$nhor++)
                     {
                        echo "<option value=\"".$nhor."\">".$nhor."</option>";
                     }

                     echo "</select>&nbsp;:&nbsp;
                     <select name=\"minutos\" size=\"1\">";

                     for($nmin=0;$nmin<=59;$nmin=$nmin+5)
                     {
                        echo "<option value=\"".$nmin."\">".$nmin."</option>";
                     }

echo                 "</select>
             </th>
          </tr>         
          <tr><td><h2>Puntos Cr&iacute;ticos</h2></td></tr>
                <tr><td>

                      
                       <table cellpadding=\"0\" cellspacing=\"0\" align=\"center\">";

                          $ixNC_ptos = 0;
                          $ixNC_serv = 0;
                          while($ptrPto=mysql_fetch_array($rPtos)) {
                             echo "
                             <tr>
                                <th>".$ptrPto['PTOCRITICO']."</th>
                                <td>
                                   <input type=\"hidden\" id=\"ptoId_".$ixNC_ptos."\" name=\"Idpto[]\" value=\"".$ptrPto['ID_PTOCRITICO']."\">
                                   <textarea id=\"pto_".$ixNC_ptos."\" name=\"Depto[]\" rows=\"5\" cols=\"55\"></textarea>

                                </td>
                             </tr>";
                             
                             // Chequeamos si tiene servicios relacionados.
 
                            if($ptrPto['SERVREL']=="S") {
                                // Buscamos en la tabla de servicios relacionados la vinculacion con el punto critico actual.
 
                                $qServRel = "SELECT ID_SERVREL, SERVICIO FROM orm_serviciosrelacionados WHERE ID_PTOCRITICO=\"".$ptrPto['ID_PTOCRITICO']."\" ";
                                $rServRel = mysql_query($qServRel);
                     
                                if( mysql_num_rows($rServRel)>0 ) {
                                   echo "
                                         <input type=\"hidden\" name=\"tieneservrel\" id=\"tieneservrel\" value=\"".$ptrPto['SERVREL']."\">
                                         <tr>
                                            <td></td>
                                            <th>Servicios Relacionados:</th>
                                         </tr>
                                         <tr>
                                            <td></td>
                                            <td>
                                               <table>";

                                               
                                               while($ptrServ = mysql_fetch_array($rServRel)) {
                                                  echo "<tr><td>".$ptrServ['SERVICIO']."</td></tr>
                                                        <tr><td>
                                                               <input type=\"hidden\" id=\"servId_".$ixNC_serv."\" name=\"Idser[]\" value=\"".$ptrServ['ID_SERVREL']."\">
                                                               <input type=\"hidden\" id=\"ptoservId_".$ixNC_serv."\" name=\"Idptoser[]\" value=\"".$ptrPto['ID_PTOCRITICO']."\">
                                                               <textarea id=\"serv_".$ixNC_serv."\" name=\"Deser[]\" rows=\"5\" cols=\"55\"></textarea>
                                                        </td></tr>";
                                                        $ixNC_serv++;
                                               }
                                         echo "
                                                  
                                               </table>
                                            </td>
                                         </tr>";
                                }
                             }
                             $ixNC_ptos++;
echo "                       <tr><td colspan=\"2\"><hr></td></tr>";
                          }
         
         echo "
              <input type=\"hidden\" name=\"ixNC_ptos\" value=\"".$ixNC_ptos."\">
              <input type=\"hidden\" name=\"ixNC_serv\" value=\"".$ixNC_serv."\">
       </table>
               </td></tr>

       <tr><td><div align=\"center\"><input type=\"submit\" name=\"enviar\" value=\"Grabar\"></div></td></tr>";
       }
?>

      </table>
</form>
   </td>
   <!-- Presentacion Inicial -->
   <?php
   jicaOrm_Pie();

 } else { 
   echo "<script>alert('Su Sesion de Trabajo no esta Activa, por favor intente reingresando sus datos.'); document.location.href='../index.php';</script>\n";
 }
?>
