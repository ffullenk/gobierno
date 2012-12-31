<?php
  session_start();
 
 $userBackEnd = $_SESSION['userBackEnd'];
 $passBackEnd = $_SESSION['passBackEnd'];
 
  include("../incluir/seteaConf.php");
 include("../incluir/seteaBD.php");
 include("../incluir/encripta.php");
 $link = conectar();
 
 $q=$_GET["q"];

 $qDTE = "SELECT dt_id, dtatributo, tpunidad FROM orm_datostipoevento AS D, orm_tipounidad AS U WHERE D.dtunidad_id=U.tpunidad_id AND dtevento_id='".$q."'";
 $rsDTE = mysql_query($qDTE);
 if(mysql_num_rows($rsDTE) > 0 )
    echo "<Table border=\"0\" align=\"center\" cellpadding=\"2\" cellspacing=\"1\" style=\"border:1px solid #8f8f8f\">";
	$ixNroCampos = 0;
    while($row = mysql_fetch_array($rsDTE))
    {
       echo "<tr>
                <td>".$row['dtatributo']."</td>
	            <td>
                   <input type=\"hidden\" name=\"posID[".$ixNroCampos."]\" value=\"".$row['dt_id']."\">
	               <input type=\"text\" name=\"dato[]\">
		        </td>
                <td>" . $row['tpunidad'] . "</td>
            </tr>";
	   $ixNroCampos++;
    }
echo "<tr><td colspan=\"3\"><input type=\"hidden\" name=\"nroC\" value=\"".$ixNroCampos."\"></td></tr>
</table>";
?>
