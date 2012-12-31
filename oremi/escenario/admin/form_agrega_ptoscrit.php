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

<Script language="JavaScript" src="../javas/fecha.js" type="text/javascript"></Script>
<Script language="JavaScript" src="../javas/calendar1.js" type="text/javascript"></Script>


   <!-- Presentacion Inicial -->
   <td>
      <table border="0" width="90%" cellspacing="0" cellpadding="0" style="margin:20px auto; padding:0;" >
        <tr>
           <td align="right"><a href="">Agregar Punto Cr&iacute;tico</a></td>
        </tr>

        <tr><td height="55"></td></tr>

        <tr>
           <td align="center"><!-- Formulario Nuevo Pto Critico -->
              <h2>Formulario Creaci&oacute;n Punto Cr&iacute;tico</h2>
              <form action="form_graba_ptoscrit.php" method="post" name="ptoscrit" id="ptoscrit" onSubmit="chequea_form_ptoscrit(); return false">
              <table border="0" style="margin:0; padding:0; border: 1px solid #eaeaea;">
                 
                 <tr>
                    <td>Punto Cr&iacute;tico</td>
                    <td></td>
                    <td><input type="text" name="ptocritico" id="ptocritico" size="30" maxlength="30"></td>
                 </tr>
                 <tr>
                    <td>Servicio Relacionado ?</td>
                    <td></td>
                    <td><input type="radio" name="servicio" id="servicio" value="S">Si  &nbsp;&nbsp;&nbsp; <input type="radio" name="servicio" id="servicio" value="N">No</td>
                 </tr>


                 <tr><td colspan="3" height="15"></td></tr>
                 <tr>
                    <td>Estado Punto Cr&iacute;tico</td>
                    <td></td>
                    <td>
                       <select name="estadoptocritico" id="estadoptocritico" size="1">
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
