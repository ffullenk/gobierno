<?php
$numR = $_POST["numR"];
echo "Nro Pasados: " . $numR . "<br />";

echo "Valores: Decision : <br />" ;

for($i=0;$i<$numR;$i++) {
	echo "Recurso ID: ". $recu[$i] . " Cantidad :" . $cantidad[$i] . "<br />";
}

?>