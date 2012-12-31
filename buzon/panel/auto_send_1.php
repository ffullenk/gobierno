<?php
	@include("../lib/grbz-sesion.php");
	@include("../lib/bc_lib.php");
	@include("../lib/bc_correo.php");
	@include("../lib/global.php");
	@include("../lib/recordset.php");
	@include("rfunciones.php");

	$FechaActual	= date("Y-m-d H:i:s");
	$rsSql =new Recordset($SERVER, $DB, $USER, $PASSWORD);
	$query = "SELECT MENSAJE, FECHA
				FROM BITACORA_C
				WHERE RESPUESTA = 'N'";
				//NOW() AS ahora, DATE_ADD(FECHA, INTERVAL 48 HOUR) AS ENMAS   
	$rsSql->Open($query);
	while( $rsSql->moveNext() ) {
		echo $rsSql->FieldByNumber(0) . "<br /><br />Fecha Actual &nbsp;".
		convertir_fecha($rsSql->FieldByNumber(2)) ."<br /><br />";
		
	}
	
?>