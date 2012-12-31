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
   jicaOrm_cabecera();
   jicaOrm_MenuAdmin();
   

   // Busca el Escenario a Actualizar
   $idEscenario = $HTTP_GET_VARS["idE"];

   $sB = "SELECT ID_ESCENARIO, tpevento_id, DESCRIBEESCENARIO, OCURRENCIA, HORA, ESTADOESCENARIO FROM orm_escenario WHERE ID_ESCENARIO=\"$idEscenario\" ";
   $rB = mysql_query($sB);


   if($rB) {
     $ptrEscenario=mysql_fetch_array($rB)
     ?>
       <Script language="JavaScript" src="../javas/fecha.js" type="text/javascript"></Script>
       <Script language="JavaScript" src="../javas/calendar1.js" type="text/javascript"></Script>

       <!-- Presentacion Inicial -->
       <td>
          <table border="0" width="90%" cellspacing="0" cellpadding="0" style="margin:20px auto; padding:0;" >
          <tr>
             <td align="right"><a href="">Agregar Escenario</a></td>
          </tr>
          <tr><td height="55"></td></tr>
          <tr>
             <td align="center"><!-- Formulario Actualiza Escenario -->
             <h2>Formulario Creaci&oacute;n Escenario</h2>
             <form action="form_update_escenari.php" method="post" name="evento" id="evento" onSubmit="chequea_form_evento(); return false">
               <input type="hidden" name="idEscenario" id="idEscenario" value="<?=$idEscenario?>" >
               <table border="0" style="margin:0; padding:0; border: 1px solid #eaeaea;">
                 <tr>
                    <td>Evento</td>
                    <td></td>
                    <td>
                      <?php
                      $qTipoEvento = "SELECT tpevento_id, tpevento FROM orm_tipoevento WHERE estado=\"A\"";
                      $rsTipoEvento = mysql_query($qTipoEvento);
                      
                      if(mysql_num_rows($rsTipoEvento) > 0 )
                         {
                           echo "<select name=\"tipoevento\" id=\"tipoevento\" size=\"1\" >";
                           while($pTE = mysql_fetch_array($rsTipoEvento))
                           {
                             if($pTE['tpevento_id']==$ptrEscenario['tpevento_id'])
                             {
                               echo "<option value=\"".$pTE['tpevento_id']."\" selected>".$pTE['tpevento']."</option>";
                             } else {
                               echo "<option value=\"".$pTE['tpevento_id']."\" >".$pTE['tpevento']."</option>";
                             }
                           }
                           echo "</select>";
                        }
                      ?> 
                    </td>
                 </tr>
<tr>
                    <td>Tipo Fen&oacute;meno</td>
                    <td></td>
                    <td>
                       <select name="tipofeno" id="tipofeno" size="1">
                          <option value="N" <?php if($ptrEscenario['ID_TIPOFENO']=="N") { echo "selected"; }?>>Natural</option>
                          <option value="A" <?php if($ptrEscenario['ID_TIPOFENO']=="A") { echo "selected"; }?>>Antropico</option>
                       </select></td>
                 </tr>
                 <tr>
                    <td>Ocurrencia</td>
                    <td></td>
                    <td><input type="text" name="fecha" id=fecha" size="10" maxlength="10" value="<?php echo convertir_fecha($ptrEscenario['OCURRENCIA']); ?>" onchange="return ValidaFecha2(this.value);">&nbsp;
<a href="javascript:cal1.popup();"><img src="../images/cal.gif" width="16" height="16" border="0" alt="Fecha Ocurrencia"></a>
<script language="JavaScript">
<!-- // 
var cal1 = new calendar1(document.forms['evento'].elements['fecha']);
cal1.year_scroll = true;
cal1.time_comp = false;
//-->
</script></td>
                 </tr>

                 <tr>
                    <td>Hora</td>
                    <td></td>
                    <td>
                       <select name="hora" id="hora" size="1">
                       <?php
$nHora = substr($ptrEscenario['HORA'],0,2);
$nMinu = substr($ptrEscenario['HORA'],3,2);

                          for($nhor=0;$nhor<=24;$nhor++)
                          {
                             if($nhor==$nHora) { echo "<option value=\"".$nhor."\" selected>".$nhor."</option>"; } else { echo "<option value=\"".$nhor."\">".$nhor."</option>"; }
                          }
                       ?>
                       </select>
                       &nbsp;:&nbsp;
                       <select name="minutos" id="minutos" size="1">
                       <?php
                          for($nmin=0;$nmin<=59;$nmin++)
                          {
                              if($nmin==$nMinu) { echo "<option value=\"".$nmin."\" selected>".$nmin."</option>"; } else { echo "<option value=\"".$nmin."\">".$nmin."</option>"; }
                          }
                       ?>
                       </select>
                    </td>
                 </tr>



                 <tr>
                    <td>Lugar</td>
                    <td></td>
                   <td>
                      <?php
                      $qLugar = "SELECT ID_LUGAR, LUGAR FROM orm_lugar WHERE ESTADOLUGAR=\"A\"";
                      $rsLugar = mysql_query($qLugar);
                      if(mysql_num_rows($rsLugar) > 0 ) {
                         echo "<select name=\"lugar\" id=\"lugar\" size=\"1\" >";
                                  while($pTE = mysql_fetch_array($rsLugar)) {
                                     if($pTE['ID_LUGAR']==$ptrEscenario['ID_LUGAR']) {
                                        echo "<option value=\"".$pTE['ID_LUGAR']."\" selected>".$pTE['LUGAR']."</option>";
                                     } else { echo "<option value=\"".$pTE['ID_LUGAR']."\" >".$pTE['LUGAR']."</option>"; }
                                  }
                         echo "</select>";
                      } ?>
                   </td>
                 </tr>
                 <tr><td colspan="3">Describe Evento</td></tr>
                 <tr><td colspan="3"><textarea name="describeevento" id="describeevento" rows="9" cols="55"><?php echo $ptrEscenario['DESCRIBEESCENARIO'];?></textarea></td></tr>

                 <tr><td colspan="3" height="15"></td></tr>
                 <tr>
                    <td>Estado Escenario</td>
                    <td></td>
                    <td>
                       <select name="estadoescenario" id="estadoescenario" size="1">
                          <option value="A" <?php if($ptrEscenario['ID_TIPOFENO']=="A") { echo "selected"; }?>>Activado</option>
                          <option value="D" <?php if($ptrEscenario['ID_TIPOFENO']=="D") { echo "selected"; }?>>Desactivado</option>
                       </select>
                    </td>
                 </tr>                 
                 <tr><td colspan="3" height="25"></td></tr>

                 <tr><td colspan="3" align="center"><input type="submit" value="Actualizar"></td></tr> 
                 <tr><td colspan="3" height="15"></td></tr>
                
</form>
              </table> 
           </td>
        </tr>
      </table>
   </td>
   <!-- Presentacion Inicial -->
   <?php
   }

   jicaOrm_Pie();

 } else { 
   echo "<script>alert('Su Sesion de Trabajo no esta Activa, por favor intente reingresando sus datos.'); document.location.href='../index.php';</script>\n";
 }
?>