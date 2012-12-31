<?php
  session_start();
 
 $userBackEnd = $_SESSION['userBackEnd'];
 $passBackEnd = $_SESSION['passBackEnd'];
 
  include("../incluir/seteaConf.php");
 include("../incluir/seteaBD.php");
 include("../incluir/encripta.php");
 $link = conectar();
 
 $q=$_GET["q"];
 $e=$_GET["e"];
 /* Seleccionamos todas las localidades anotadas para este evento */
 $qLocEv = "SELECT ID_LOC FROM hist_localidades WHERE evento_id=\"$e\"";
 $rLocEv = mysql_query($qLocEv);
 $aLocEv = array();
 while($pLocEv=mysql_fetch_array($rLocEv)) {
    $aLocEv[] = $pLocEv['ID_LOC'];
 }
                                                      
 $qLOCA = "SELECT ID_LOC, LOCALIDAD FROM oremi_localidad AS L WHERE L.COM_ID='".$q."'";
 $rsLOCA = mysql_query($qLOCA);
 if(mysql_num_rows($rsLOCA) > 0 )
    echo "<Table border=\"0\" align=\"center\" cellpadding=\"2\" cellspacing=\"1\" style=\"border:1px solid #8f8f8f;font-family:'Courier New', Verdana;font-size:0.85em;\">
             <tr>
                <td colspan=\"4\">
                    <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
                       <tr><th>
                              <input type=\"radio\"  name=\"button1\" id=\"button1\"  onclick=\"checkAll('chbx[]',1)\">
                                 Seleccionar Todas 
                           </th>
                           <th>
                              <input type=\"radio\"  name=\"button1\" id=\"button1\"  onclick=\"checkAll('chbx[]',0)\">
                                 Deseleccionar Todas 
                           </th>
                        </tr>
                     </table>
                  </td>
               </tr>
               <tr>";
               /*
               Click para Seleccionar Todos<input type=\"radio\"  name=\"button1\" id=\"button1\"  onclick=\"return selDeSel('sel')\" /><br />
               Click para Deseleccionar Todos<input type=\"radio\" name=\"button1\" id=\"button1\" onclick=\"return selDeSel('desel')\" /><br />
               */
               $ixNroCampos = 0;
               $maxFillCol = 4;
               $fillCol = 0;
               while($row = mysql_fetch_array($rsLOCA))
               {
                  echo "<td><input type=\"checkbox\" id=\"chb".$ixNroCampos."\" name=\"chbx[]\" value=\"".$row['ID_LOC']."\" ";
                  if (in_array($row['ID_LOC'], $aLocEv, true)) {  echo "checked";}
                  echo "/></td>
                  <td>".htmlentities($row['LOCALIDAD'])." </td>";
                  $ixNroCampos++;
                  $fillCol++;
                  
                  if($fillCol>=$maxFillCol) { echo "</tr><tr>"; $fillCol=0;}
               }
 echo "       </tr>
              <tr><td colspan=\"4\"><input type=\"hidden\" name=\"ixNroCampos\" value=\"".$ixNroCampos."\"></td></tr>
          </Table> ";
?>
