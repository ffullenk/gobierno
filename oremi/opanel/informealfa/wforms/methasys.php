<?php

	@include("../../../lib/global.php");
	@include("../../../lib/recordset.php");

	$rsRecursos = new Recordset("192.168.33.20", "methdata", "methascl", "sapv");
	
	$sqlRecursos = "SELECT usuario,pass FROM methpas";
	$rsRecursos->Open($sqlRecursos);
	$nroRecursos = $rsRecursos->RecordCount();
	if($nroRecursos>0) {
		$rsRecursos->moveNext();
		echo "Usuario: ". $rsRecursos->FieldByName("usuario") . " Pass: ". $rsRecursos->FieldByName("pass") . "<br />";
		echo $nroRecursos;
	}

?>
