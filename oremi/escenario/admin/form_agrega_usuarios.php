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
           <td align="right"><a href="">Agregar Usuario</a></td>
        </tr>

        <tr><td height="55"></td></tr>

        <tr>
           <td align="center"><!-- Formulario Nuevo Usuario -->
              <script language="javaScript" type="text/javascript" src="../javas/jsforms.js"></script>
              <h2>Formulario Creaci&oacute;n Usuario</h2>
              <form action="form_graba_usuarios.php" method="post" name="usuarios" id="usuarios" onSubmit="chequea_form_usuarios(); return false">
              <table border="0" style="margin:0; padding:0; border: 1px solid #eaeaea;">
                 
                 <tr>
                    <td>Nombre Completo</td>
                    <td></td>
                    <td><input type="text" name="nombre" id="nombre" size="30" maxlength="50"></td>
                 </tr>
                 <tr>
                    <td>Email</td>
                    <td></td>
                    <td>
                       <input type="text" name="emailusuario" id="emailusuario" size="30" maxlength="50" onChange="validarEmail(this.form.email.value);"></td>
                 </tr>
                 <tr>
                    <td>Rut</td>
                    <td></td>
                    <td><input type="text" name="rut" id="rut" onchange="Valida_Rut(this); return false"> Ej: 12345678-K</td>
                 </tr>
                 <tr>
                    <td>Instituci&oacute;n</td>
                    <td></td>
                    <td>
<?php
$qInst = "SELECT ID_INSTITUCION, INSTITUCION FROM orm_institucion WHERE ESTADOINST=\"A\" ";
                        $rsInst = mysql_query($qInst);
			if(mysql_num_rows($rsInst) > 0 )
                        {
                           echo "<select name=\"institucion\" id=\"institucion\" size=\"1\"  >
                                     <option value=\"-\">Seleccione Instituci&oacute;n...</option>";
                                     while($pTE = mysql_fetch_array($rsInst)) { echo "<option value=\"".$pTE['ID_INSTITUCION']."\">".$pTE['INSTITUCION']."</option>"; }
                           echo "</select>";
                        } 
?>

                    </td>
                 </tr>


                 <tr><td colspan="3" height="25"></td></tr>
                 <tr>
                    <td>Contrase&ntilde;a</td>
                    <td></td>
                    <td><input type="password" name="clave" id="clave" size="16" maxlength="16"></td>
                 </tr>

                 

                 <tr>
                    <td>Reingrese Contrase&ntilde;a</td>
                    <td></td>
                   <td><input type="password" name="reclave" id="reclave"  size="16" maxlength="16"></td>
                 </tr>

                 <tr><td colspan="3" height="25"></td></tr>

                 <tr>
                    <td>Tipo de Usuario</td>
                    <td></td>
                    <td>
                       <select name="tipo" size="1">
                          <option value="-">Seleccione tipo de usuario..</option>
                          <option value="A">Administrador</option>
                          <option value="U">Usuario Instituci&oacute;n</option>
                       </select>
                    </td>

                 <tr>
                    <td>Estado</td>
                    <td></td>
                    <td>
                       <select name="estado" id="estado" size="1">
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
