<?php
	@include("../lib/global.php");
	@include("../lib/recordset.php");
	@include("rfunciones.php");

	$FechaActual	= date("Y-m-d H:i:s");
	$fechaHoraActual = fechaMinutos(formatoFecha(date("Y-m-d")), date("h:i:s"));
	
	$rsSql =new Recordset($SERVER, $DB, $USER, $PASSWORD);
	$query = "SELECT MENSAJE, FECHA, NOW() AS ahora, DATE_ADD(FECHA, INTERVAL 48 HOUR) AS ENMAS, NOW()-FECHA  
				FROM BITACORA_C
				WHERE RESPUESTA = 'N' AND DATE_ADD(FECHA, INTERVAL 48 HOUR) <= NOW()";
				//
				// 
	$rsSql->Open($query);

	while( $rsSql->moveNext() ) {
		echo $rsSql->FieldByNumber(0) . "<br />Fecha Actual &nbsp;".
		convertir_fecha($rsSql->FieldByNumber(2)) ."<br /> Fecha de la Tabla &nbsp;".
		convertir_fecha($rsSql->FieldByNumber(1)) ."<br /> la Fecha + 48 horas &nbsp;".
		convertir_fecha($rsSql->FieldByNumber(3)) ."<br /> La Diferencia &nbsp;".
		$rsSql->FieldByNumber(4) ."<br /><br />";
		
		$intervaloActual = 0;
		/*se hace la diferencia entre la fecha en que se inscribio la transaccion con la fecha actual*/
		$intervaloActual = $fechaHoraActual - fechaMinutos(convertir_fecha2($rsSql->fieldByName("FECHA")),convertir_fecha3($rsSql->fieldByName("FECHA")) )."<br/>";
echo $intervaloActual;

echo $intervaloActual/1440 . "<br />";
	}
	
?>