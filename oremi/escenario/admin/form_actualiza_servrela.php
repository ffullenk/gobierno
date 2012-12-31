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
   $idS = $HTTP_GET_VARS["idS"];

   $sB = "SELECT ID_SERVREL, S.ID_PTOCRITICO, PTOCRITICO, SERVICIO, ESTADOSERVREL FROM orm_serviciosrelacionados AS S, orm_ptoscriticos AS P WHERE S.ID_PTOCRITICO=P.ID_PTOCRITICO AND ID_SERVREL=\"$idS\" ";
   $rB = mysql_query($sB);


   if($rB) {
     $ptrServRela=mysql_fetch_array($rB)
     ?>


   <!-- Presentacion Inicial -->
   <td>
      <table border="0" width="90%" cellspacing="0" cellpadding="0" style="margin:20px auto; padding:0;" >
        <tr>
           <td align="right"><a href="">Agregar Servicio Relacionado</a></td>
        </tr>

        <tr><td height="55"></td></tr>

        <tr>
           <td align="center"><!-- Formulario Servicio Relacionado -->
              <h2>Formulario Modificar Servicio Relacionado</h2>
              <form action="form_update_servrela.php" method="post" name="servrela" id="servrela" onSubmit="chequea_form_servrela(); return false">
<input type="hidden" name="idS" id="idS" value="<?=$idS?>" >              
<table border="0" style="margin:0; padding:0; border: 1px solid #eaeaea;">
                 
                 <tr>
                    <td>Punto Cr&iacute;tico</td>
                    <td></td>
                    <td><?php
			$qPtoCrit = "SELECT ID_PTOCRITICO, PTOCRITICO FROM orm_ptoscriticos WHERE ESTADOPTOCRITICO=\"A\" AND SERVREL=\"S\" ";
                        $rsPtoCrit = mysql_query($qPtoCrit);
			if(mysql_num_rows($rsPtoCrit) > 0 )
                        {
                           echo "<select name=\"ptocritico\" id=\"ptocritico\" size=\"1\"  >
                                     <option value=\"-\">Seleccione Punto Cr&iacute;tico...</option>";
                                     while($pTE = mysql_fetch_array($rsPtoCrit)) 
                                     { 
                                       if($pTE['ID_PTOCRITICO']==$ptrServRela['ID_PTOCRITICO']) { echo "<option value=\"".$pTE['ID_PTOCRITICO']."\" selected>".$pTE['PTOCRITICO']."</option>"; }
                                         else { echo "<option value=\"".$pTE['ID_PTOCRITICO']."\">".$pTE['PTOCRITICO']."</option>"; 
                                       }
                                      }
                           echo "</select>";
                        } ?>
                    </td>
                 </tr>
                 <tr>
                    <td>Servicio</td>
                    <td></td>
                    <td><input type="text" name="servicio" id="servicio" size="30" maxlength="50" value="<?php echo $ptrServRela['SERVICIO'];?>">
                    </td>
                 </tr>


                 <tr><td colspan="3" height="15"></td></tr>
                 <tr>
                    <td>Estado</td>
                    <td></td>
                    <td>
                       <select name="estadoservrela" id="estadoservrela" size="1">
                          <option value="A" <?php if($ptrServRela['ESTADOSERVREL']=="A") { echo "selected";} ?>>Activado</option>
                          <option value="D" <?php if($ptrServRela['ESTADOSERVREL']=="D") { echo "selected";} ?>>Desactivado</option>
                       </select>
                    </td>
                 </tr>
                 <tr><td colspan="3" height="25"></td></tr>

                 <tr><td colspan="3" align="center"><input type="submit" value="Modificar"></td></tr> 
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
