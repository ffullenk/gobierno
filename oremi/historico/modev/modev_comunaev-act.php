<?php
 include("../incluir/seteaConf.php");
 include("../incluir/seteaBD.php");
 $link = conectar(); 
$id = $_POST['id'];
$o = $_POST['o'];

$comuna = $_POST['comuna'];
$button1 = $_POST['button1'];
$chbx = $_POST['chbx'];
$nrolocalidades = count($chbx);
$ixNroCampos = $_POST['ixNroCampos'];
    

// Primer Paso:
/*                Eliminamos los datos de las localidades que existian para este evento        */
$qEliLoc = "DELETE FROM hist_localidades WHERE evento_id=\"$id\"";
$rEliLoc = mysql_query($qEliLoc);
desconectar($link);



$link = conectar();
$i=0;
while($i < $nrolocalidades )
{
  // Insertamos las localidades
  $qLocalidades = "INSERT INTO hist_localidades(evento_id,ID_LOC) VALUES('".$id."','".$chbx[$i]."')";
  $rLocalidades = mysql_query($qLocalidades);
  //echo "<li>{} </li> \r\n";
  $i++;
 } 



// Actualizamos Tabla Principal de Evento Historico para cambiar el tipo de evento 
$qAEve = "UPDATE orm_historico SET COM_ID=\"comuna\" WHERE evento_id=\"$id\"";
$rAEve = mysql_query($qAEve);

header("Location: modev_detalla.php?id=".$id."&o=".$o."");
       
?>
