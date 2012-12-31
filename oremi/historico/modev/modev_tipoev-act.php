<?php
 include("../incluir/seteaConf.php");
 include("../incluir/seteaBD.php");
 $link = conectar(); 
$id = $_POST['id'];
$o = $_POST['o'];
$tipoevento = $_POST['tipoevento'];

// Primer Paso:
/*                Eliminamos los datos del tipo de eventos que existian para este evento        */
$qEliDTE = "DELETE FROM hist_datosevento WHERE evento_id=\"$id\"";
$rEliDTE = mysql_query($qEliDTE);
desconectar($link);



$link = conectar();
// Registramos valores especiales para este tipo de evento en particular
   $posID = $_POST['posID'];
   $dato = $_POST['dato'];
   $n = count($posID);
   $i=0;
   while($i < $n )
   {
    // Insertamos el registro correspondiente
       $qDatosEvento = "INSERT INTO hist_datosevento(evento_id,tpevento_id,dt_id,valor) VALUES('".$id."','".$tipoevento."','".$posID[$i]."','".$dato[$i]."')";
       $rDatosEvento = mysql_query($qDatosEvento);
       //echo "<li>{$posID[$i]} : {$dato[$i]} </li> \r\n";
       $i++;
   }
// Actualizamos Tabla Principal de Evento Historico para cambiar el tipo de evento 
$qAEve = "UPDATE orm_historico SET tpevento_id=\"$tipoevento\" WHERE evento_id=\"$id\"";
$rAEve = mysql_query($qAEve);

header("Location: modev_detalla.php?id=".$id."&o=".$o."");
       
?>
