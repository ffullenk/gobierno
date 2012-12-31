<?php
//Nos aseguramos que hayamos recibido el userid
if(isset($_COOKIE['ia'])) { 
        $qkuser=$_COOKIE['ia']; 
        //Ahora, parseo el ID:LOGCODE valor en la cookie via la funcion explode()
          $qkpar = explode(":",$qkuser);
          $qk_uid=$qkpar[0];
          $qk_code=$qkpar[1];
          //nos aseguramos que el ID de la cookie sea un valor numerico
		if(is_numeric($qk_uid)) {
            //Ahora, encontramos al usuario via ID
		//Ahora, actualizo la Tabla
		@include("../lib/config.php");
		@include("../lib/oremi.php");
		@include("../lib/global.php");
		@include("../lib/recordset.php");
			
		$rsSes = new Recordset($SERVER, $DB, $USER, $PASSWORD);
		$rsSes->FieldByUpdate( "SESIONID" , "''" ); 
		$rsSes->WhereByUpdate( "PERSONA_ID" , "$qk_uid" );
		$error = $rsSes->execUpdate( "SESION_FUNC" , 1);

		if($error == true) {
			setcookie('ia'); //, '', 0, '', '', 0);
			echo "<HTML><HEAD><META HTTP-EQUIV=Refresh CONTENT='0; URL=index.php'></HEAD><Body BgColor=White></Body></HTML>";
			die();
	   } else { header("Location: index.php"); }
	}
	//Redirijimos a una pagina de salida o bien a la index
	header("Location: index.php");
exit;
}
?>
