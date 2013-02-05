<?php
function conexion() {
if(!($link=mysql_connect("192.168.33.20","root","pctaaccservbd") )) {
   echo "Error ... No se puede establecer conexion con la base de datos en estot momentos";
   exit();
}
if(!mysql_select_db("gore", $link)) {
   echo "Error ... No se puede establecer conexion";
   exit();
}
return $link;
}

$link = conexion();

$res = mysql_query("SELECT id, acronimo FROM servpub WHERE dependencia=0") or die(mysql_error());
if(mysql_num_rows($res) > 0 ) {
   $xpos = 0;
   $ISer[$xpos] = "-";
   $NSer[$xpos] = "Elija Servicio ...";
   $xpos++;
   
   while($fila=mysql_fetch_object($res)) {
     $ISer[$xpos] = "../secc_serv.php?ss=2&id=".$fila->id;
	 $NSer[$xpos] = $fila->acronimo;
 	 $xpos++;

	 $res2= mysql_query("SELECT id, acronimo FROM servpub WHERE dependencia = $fila->id");
     while($fila2=mysql_fetch_object($res2)) {
     $ISer[$xpos] = "../secc_serv.php?ss=3&id=".$fila->id."&idd=".$fila2->id;
	 $NSer[$xpos] = "&nbsp;&nbsp;&nbsp;". $fila2->acronimo;
 	 $xpos++;
	 }
	 mysql_free_result($res2);

   }
   mysql_free_result($res);
   echo('<select name=depende size=1 onchange="top.location= (this.options[this.selectedIndex].value)"> ');
   for($i=0;$i<$xpos;$i++)
      {
	    echo('<option value='.$ISer[$i] .'>'. $NSer[$i] .'</option>');
      }
echo "</select>";
}
?>
