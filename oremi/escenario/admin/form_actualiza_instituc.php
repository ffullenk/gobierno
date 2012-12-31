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
   $idI = $HTTP_GET_VARS["idI"];

   $sB = "SELECT INSTITUCION, ESTADOINST FROM orm_institucion WHERE ID_INSTITUCION=\"$idI\" ";
   $rB = mysql_query($sB);


   if($rB) {
     $ptrInst=mysql_fetch_array($rB)
     ?>


   <!-- Presentacion Inicial -->
   <td>
      <table border="0" width="90%" cellspacing="0" cellpadding="0" style="margin:20px auto; padding:0;" >
        <tr>
           <td align="right"><a href="">Agregar Instituci&oacute;n</a></td>
        </tr>

        <tr><td height="55"></td></tr>

        <tr>
           <td align="center"><!-- Formulario Instituci&oacute;n -->
              <h2>Formulario Modificar Instituci&oacute;n</h2>
              <form action="form_update_instituc.php" method="post" name="instituc" id="instituc" onSubmit="chequea_form_instituc(); return false">
<input type="hidden" name="idI" id="idI" value="<?=$idI?>" >              
<table border="0" style="margin:0; padding:0; border: 1px solid #eaeaea;">
                 
                 <tr>
                    <td>Instituci&oacute;n</td>
                    <td></td>
                    <td><input type="text" name="institucion" id="institucion" size="30" maxlength="50" value="<?php echo $ptrInst['INSTITUCION'];?>">
                    </td>
                 </tr>
 
                 <tr><td colspan="3" height="15"></td></tr>
                 <tr>
                    <td>Estado</td>
                    <td></td>
                    <td>
                       <select name="estadoinst" id="estadoinst" size="1">
                          <option value="A" <?php if($ptrInst['ESTADOINST']=="A") { echo "selected";} ?>>Activado</option>
                          <option value="D" <?php if($ptrInst['ESTADOINST']=="D") { echo "selected";} ?>>Desactivado</option>
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
