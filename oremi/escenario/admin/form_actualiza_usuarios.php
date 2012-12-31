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


   // Busca el Usuario a Actualizar
   $idU = $HTTP_GET_VARS["idU"];

   $sB = "SELECT ormusr_id, nombre, email, rut, clave, tipo, estado FROM orm_usuarios WHERE ormusr_id=\"$idU\" ";
   $rB = mysql_query($sB);


   if($rB) {
     $ptrUs=mysql_fetch_array($rB)
     ?>


   <!-- Presentacion Inicial -->
   <td>
      <table border="0" width="90%" cellspacing="0" cellpadding="0" style="margin:20px auto; padding:0;" >
        <tr>
           <td align="right"><a href="">Agregar Usuario</a></td>
        </tr>

        <tr><td height="55"></td></tr>

        <tr>
           <td align="center"><!-- Formulario Usuario -->
              <script language="javaScript" type="text/javascript" src="../javas/jsforms.js"></script>
              <script src="../javas/selectusers.js"></script>
              <script src="../javas/agregalineas.js"></script>
              <h2>Formulario Modificar Usuario</h2>
              <form action="form_update_usuarios.php" method="post" name="usuarios" id="usuarios" onSubmit="chequea_form_usuarios(); return false">
<input type="hidden" name="idU" id="idU" value="<?=$idU?>" >              
<table border="0" style="margin:0; padding:0; border: 1px solid #eaeaea;">
                 
                <tr>
                    <td>Nombre Completo</td>
                    <td></td>
                    <td><input type="text" name="nombre" id="nombre" size="30" maxlength="50" value="<?php echo $ptrUs['nombre'];?>"></td>
                 </tr>
                 <tr>
                    <td>Email</td>
                    <td></td>
                    <td>
                       <input type="text" name="emailusuario" id="emailusuario" value="<?php echo $ptrUs['email'];?>"size="30" maxlength="50" onChange="validarEmail(this.form.email.value);"></td>
                 </tr>
                 <tr>
                    <td>Rut</td>
                    <td></td>
                    <td><input type="text" name="rut" id="rut" value="<?php echo $ptrUs['rut'];?>" onchange="Valida_Rut(this); return false"> Ej: 12345678-K</td>
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
                                       while($pTE = mysql_fetch_array($rsInst)) { 
                                          if($pTE['ID_INSTITUCION']==$ptrUs['ID_INSTITUCION']) { echo "<option value=\"".$pTE['ID_INSTITUCION']."\" selected>".$pTE['INSTITUCION']."</option>"; }
                                          else { echo "<option value=\"".$pTE['ID_INSTITUCION']."\">".$pTE['INSTITUCION']."</option>"; }
                                       }
echo "</select>";
} 
?>

                    </td>
                 </tr>


                 <tr><td colspan="3" height="25"></td></tr>
                 <tr>
                    <td>Contrase&ntilde;a</td>
                    <td></td>
                    <td><input type="password" name="clave" id="clave" size="16" maxlength="16" value="<?php echo encrypt($ptrUs['clave'],1);?>"></td>
                 </tr>

                 

                 <tr>
                    <td>Reingrese Contrase&ntilde;a</td>
                    <td></td>
                   <td><input type="password" name="reclave" id="reclave" size="16" maxlength="16" value="<?php echo encrypt($ptrUs['clave'],1);?>"></td>
                 </tr>

                 <tr><td colspan="3" height="25"></td></tr>

                 <tr>
                    <td>Tipo de Usuario</td>
                    <td></td>
                    <td>
                       <select name="tipo" size="1">
                          <option value="-">Seleccione tipo de usuario..</option>
                          <option value="A" <?php if($ptrUs['tipo']=="A") { echo "selected";} ?>>Administrador</option>
                          <option value="U" <?php if($ptrUs['tipo']=="U") { echo "selected";} ?>>Usuario Instituci&oacute;n</option>
                       </select>
                    </td>

                 <tr>
                    <td>Estado</td>
                    <td></td>
                    <td>
                       <select name="estado" id="estado" size="1">
                          <option value="A" <?php if($ptrUs['estado']=="A") { echo "selected";} ?>>Activado</option>
                          <option value="D" <?php if($ptrUs['estado']=="D") { echo "selected";} ?>>Desactivado</option>
                       </select>
                    </td>
                 </tr>                


                 <tr><td colspan="3" height="25"></td></tr>
                 <tr><td colspan="3">Vinculaciones</td></tr>
                 <tr><td colspan="3">
                     <?php
                         $qRela = "SELECT ID_PTOCRITICO, PTOCRITICO FROM orm_ptoscriticos WHERE ESTADOPTOCRITICO=\"A\" ";
                           $rsRela = mysql_query($qRela);
                           if(mysql_num_rows($rsRela) > 0 )
                           {
                              $ixNroCampos = 0;
                              $maxFillCol = 4;
                              $fillCol = 0;
                              echo " 
                              <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
                              <tr><th><input type=\"radio\"  name=\"button1\" id=\"button1\"  onclick=\"checkAll('chbx[]',1)\">Seleccionar Todas</th>
                                  <th><input type=\"radio\"  name=\"button1\" id=\"button1\"  onclick=\"checkAll('chbx[]',0)\">Deseleccionar Todas</th>

                              </tr>
                              </table>
                              <Table border=\"0\" align=\"center\" cellpadding=\"2\" cellspacing=\"1\" style=\"border:1px solid #8f8f8f;font-family:'Courier New', Verdana;font-size:0.75em;\">
                                    <tr>";

                                    while($row = mysql_fetch_array($rsRela))
                                    {

                                      $qDerA = "SELECT ID_PTOCRITICO FROM orm_derechoa WHERE ormusr_id=\"$idU\" ";
                                      $rDerA = mysql_query($qDerA);
                                      $swChk = false;

                                      while($rowDerA = mysql_fetch_array($rDerA) ) {
                                         if($row['ID_PTOCRITICO']==$rowDerA['ID_PTOCRITICO']) { $swChk = true; }
                                      }

                                      echo "<td><input type=\"checkbox\" id=\"chb".$ixNroCampos."\" name=\"chbx[]\" value=\"".$row['ID_PTOCRITICO']."\" ";
                                      if($swChk) { echo "checked"; }
                                      echo "/></td>
                                      <td>".htmlentities($row['PTOCRITICO'])." </td>";

                                       $ixNroCampos++;
                                       $fillCol++;

                                       if($fillCol>=$maxFillCol) { echo "</tr><tr>"; $fillCol=0;}
                                    }
                             echo "</tr>
                                   <tr><td colspan=\"4\"><input type=\"hidden\" name=\"ixNroCampos\" value=\"".$ixNroCampos."\"></td></tr>
                                   </table>";
                           }
?>


                     </td>
                 </tr>
 

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
