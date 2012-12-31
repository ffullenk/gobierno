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
   $idP = $HTTP_GET_VARS["idP"];

   $sB = "SELECT ID_PTOCRITICO, PTOCRITICO, SERVREL, ESTADOPTOCRITICO FROM orm_ptoscriticos WHERE ID_PTOCRITICO=\"$idP\" ";
   $rB = mysql_query($sB);


   if($rB) {
     $ptrPtoCritico=mysql_fetch_array($rB)
     ?>


   <!-- Presentacion Inicial -->
   <td>
      <table border="0" width="90%" cellspacing="0" cellpadding="0" style="margin:20px auto; padding:0;" >
        <tr>
           <td align="right"><a href="">Agregar Punto Cr&iacute;tico</a></td>
        </tr>

        <tr><td height="55"></td></tr>

        <tr>
           <td align="center"><!-- Formulario Nuevo Pto Critico -->
              <h2>Formulario Modificar Punto Cr&iacute;tico</h2>
              <form action="form_update_ptoscrit.php" method="post" name="ptoscrit" id="ptoscrit" onSubmit="chequea_form_ptoscrit(); return false">
<input type="hidden" name="idP" id="idP" value="<?=$idP?>" >              
<table border="0" style="margin:0; padding:0; border: 1px solid #eaeaea;">
                 
                 <tr>
                    <td>Punto Cr&iacute;tico</td>
                    <td></td>
                    <td><input type="text" name="ptocritico" id="ptocritico" size="30" maxlength="30" value="<?php echo $ptrPtoCritico['PTOCRITICO'];?>"></td>
                 </tr>
                 <tr>
                    <td>Servicio Relacionado ?</td>
                    <td></td>
                    <td><input type="radio" name="servicio" id="servicio" value="S" <?php if($ptrPtoCritico['SERVREL']=="S") { echo "checked";} ?>>Si  &nbsp;&nbsp;&nbsp; 
                        <input type="radio" name="servicio" id="servicio" value="N" <?php if($ptrPtoCritico['SERVREL']=="N") { echo "checked";} ?>>No</td>
                 </tr>


                 <tr><td colspan="3" height="15"></td></tr>
                 <tr>
                    <td>Estado Punto Cr&iacute;tico</td>
                    <td></td>
                    <td>
                       <select name="estadoptocritico" id="estadoptocritico" size="1">
                          <option value="A" <?php if($ptrPtoCritico['ESTADOPTOCRITICO']=="A") { echo "selected";} ?>>Activado</option>
                          <option value="D" <?php if($ptrPtoCritico['ESTADOPTOCRITICO']=="D") { echo "selected";} ?>>Desactivado</option>
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
