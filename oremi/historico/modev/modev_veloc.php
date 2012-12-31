<?php
 include("../incluir/seteaConf.php");
 include("../incluir/seteaBD.php");
 include("../incluir/funciones.php");
 
 $link = conectar(); 
 $id = $_GET['id'];
 
 echo "          
       <h1>Localidades Afectadas</h1>";
           
           /* Mostrar las Localidades Afectadas*/
           /*
           tabla: oremi_localidad
                  ID_LOC
                  COM_ID
                  LOCALIDAD
                  COORD_ESTE
                  COORD_NORTE
                  LATITUD
                  LONGITUD


                  tabla: hist_localidad
                  evento_id
                  ID_LOC
           */
           
           
           $qLocalidad = 'SELECT LOCALIDAD , COORD_ESTE , COORD_NORTE , LATITUD , LONGITUD '
        . ' FROM oremi_localidad as L , hist_localidades AS H '
        . ' WHERE L . ID_LOC = H . ID_LOC AND '
        . ' H . evento_id = "'.$id.'"';
                          
           $rLocalidad = mysql_query($qLocalidad);
           if(mysql_num_rows($rLocalidad)>0) {
               echo "<table border=\"0\" width=\"430\" style=\"font-size:0.7em; font-family:Arial,Verdana; color: #000000;background-color:#c4c4c4;\">";
               $nCols=3;
               $cContC=0;
               while($pLocalidad=mysql_fetch_array($rLocalidad)) {
                   if($cContC==0 || $cContC==3) {
                       echo "<tr>";
                   }
                  echo "<td>".$pLocalidad['LOCALIDAD']."</td>";
                  $cContC++;
                  if($cContC==3) { echo "</tr>"; $cContC=0; }
               }
               echo "</table>";               
           }
?>
