<?php
@include("../lib/config.php");
@include("../lib/oremi.php");

if( trim($_POST["cuenta"] != "") && trim($_POST["passwo"] != "") )
{
   $username=quitar($_POST["cuenta"]);
   $contrasenya=quitar($_POST["passwo"]);
	$pasword = crypt($contrasenya,$username);
	//echo "Usuario $username --- Contraseyna $pasword";
   //ahora, detectamos en la TABLA al usuario
	@include("../lib/global.php");
	@include("../lib/recordset.php");
	
	$resLogin = new Recordset($SERVER, $DB, $USER, $PASSWORD);
	
	$res = "SELECT ENCARGADO_ID, CARGO_ID FROM ENCARGADOS WHERE CUENTA='".$username."' AND CONTRASENYA='".$pasword."' ";
	$resLogin->Open($res);
	
    if( $resLogin->RecordCount()>0 ) {
	 		// Chequeamos en Tabla SESION_FUNC si ya existe una entrada para este usuario,
			// de caso contrario la creamos.
			$resLogin->moveNext();
			$t = time();
			$ta = date('Y-m-d H:i:s');
			$iduser = $resLogin->FieldByName("ENCARGADO_ID");
			$idcarg = $resLogin->FieldByName("CARGO_ID");
			$sesionid = md5(uniqid("$iduser:$t"));
			$qk = "$iduser:$sesionid:$idcarg";
			$kIP = ip();

			setcookie('oremi', $qk); //, time() + 60*60*24*30, '', '', 0);

			$rEUPSes = new Recordset($SERVER, $DB, $USER, $PASSWORD);
			$rSsql="SELECT ENCARGADO_ID, ACTUALIP, ACTUALTIME FROM SESION_ENC WHERE ENCARGADO_ID='".$iduser."' ";
			$rEUPSes->Open($rSsql);

			if($rEUPSes->RecordCount()>0) {
				// Existe entrada para el usuario actual, accion --> actualizar tabla
				$rEUPSes->moveNext();
				$lastIP = $rEUPSes->fieldByName("ACTUALIP");
				$lastTime = $rEUPSes->fieldByName("ACTUALTIME");

				// para proceso posterior
				$rUPSes = new Recordset($SERVER, $DB, $USER, $PASSWORD);
				
				$rUPSes->FieldByUpdate( "SESIONID" , "'$sesionid'" ); 
				$rUPSes->FieldByUpdate( "ACTUALIP" , "'$kIP'" ); 
				$rUPSes->FieldByUpdate( "LASTIP" , "'$lastIP'" ); 
				$rUPSes->FieldByUpdate( "ACTUALTIME" , "'$ta'" ); 
				$rUPSes->FieldByUpdate( "LASTTIME" , "'$lastTime'" ); 
				$rUPSes->WhereByUpdate( "ENCARGADO_ID" , "$iduser" );
				$error = $rUPSes->execUpdate( "SESION_ENC" , 1);

			} else {
				// para proceso posterior
				$rUPSes = new Recordset($SERVER, $DB, $USER, $PASSWORD);

				$rUPSes->FieldByInsert( "ENCARGADO_ID" , "'$iduser'" ); 
				$rUPSes->FieldByInsert( "SESIONID" , "'$sesionid'" ); 
				$rUPSes->FieldByInsert( "ACTUALIP" , "'$kIP'" ); 
				$rUPSes->FieldByInsert( "ACTUALTIME" , "'$ta'" ); 
				$error = $rUPSes->execInsert( "SESION_ENC" , 1);
			}
			
			if($error==true) {
				echo "<HTML><HEAD><META HTTP-EQUIV=Refresh CONTENT='0; URL=inicio.php'></HEAD><Body BgColor=White></Body></HTML>";
				die();
			} else {
				// Error al proceder accion sobre tabla SESION_FUNC
		echo "<script>alert('Error.... Por favor, reintente luego.'); document.location.href='index.php';</script>\n";
			}
	} else { // FIN EndLogin
				// header("Location: index.php");
		echo "<script>alert('Error.... Los datos suministrados no son validos'); document.location.href='index.php';</script>\n";
	}
} else { // Error, el usuario no existe
		echo "<script>alert('Error.... Debe suministrar sus datos de ingreso de sesion'); document.location.href='index.php';</script>\n";
}
?>