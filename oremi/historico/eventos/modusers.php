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
 $qTPEv = "SELECT dt_id, valor FROM hist_datosevento WHERE evento_id=\"$e\"";
 $rTPEv = mysql_query($qTPEv);
 $aTPEv = array();
 while($pTPEv=mysql_fetch_array($rTPEv)) {
     $valorIndice = $pTPEv['dt_id'];
    $aTPEv[$valorIndice] = array("valor"=>$pTPEv['valor']);

 }
 
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
	               <input type=\"text\" name=\"dato[]\" ";
                  
                    foreach( $aTPEv as $n => $player ) {
                        if($row['dt_id']==$n) {echo "value=\"".$player['valor']."\"";}
                    }
                   echo ">
		        </td>
                <td>".$valor . " ". $row['tpunidad'] . "</td>
            </tr>";
	   $ixNroCampos++;
    }
echo "<tr><td colspan=\"3\"><input type=\"hidden\" name=\"nroC\" value=\"".$ixNroCampos."\"></td></tr>
</table>";
?>
