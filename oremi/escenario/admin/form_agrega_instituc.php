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
   ?>


   <!-- Presentacion Inicial -->
   <td>
      <table border="0" width="90%" cellspacing="0" cellpadding="0" style="margin:20px auto; padding:0;" >
        <tr>
           <td align="right"><a href="">Agregar Institucion</a></td>
        </tr>

        <tr><td height="55"></td></tr>

        <tr>
           <td align="center"><!-- Formulario Nuevo Institucion -->
              <h2>Formulario Creaci&oacute;n Institucion</h2>
              <form action="form_graba_instituc.php" method="post" name="instituc" id="instituc" onSubmit="chequea_form_instituc(); return false">
              <table border="0" style="margin:0; padding:0; border: 1px solid #eaeaea;">
                 
                 <tr>
                    <td>Instituci&oacute;n</td>
                    <td></td>
                    <td>
                      <input type="text" name="institucion" id="institucion" size="30" maxlength="50">
                       </td>
                 </tr>

                 <tr><td colspan="3" height="15"></td></tr>
                 <tr>
                    <td>Estado Servicio</td>
                    <td></td>
                    <td>
                       <select name="estadoinst" id="estadoinst" size="1">
                          <option value="A">Activado</option>
                          <option value="D">Desactivado</option>
                       </select>
                    </td>
                 </tr>
                 <tr><td colspan="3" height="25"></td></tr>

                 <tr><td colspan="3" align="center"><input type="submit" value="Grabar"></td></tr> 
                 <tr><td colspan="3" height="15"></td></tr>
                
</form>
              </table> 
           </td>
        </tr>
      </table>
   </td>
   <!-- Presentacion Inicial -->
   <?php
   jicaOrm_Pie();

 } else { 
   echo "<script>alert('Su Sesion de Trabajo no esta Activa, por favor intente reingresando sus datos.'); document.location.href='../index.php';</script>\n";
 }
?>
