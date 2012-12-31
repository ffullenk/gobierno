<?php
global $loginCorrecto, $global_qk;

  //Detecto si esta página ha sido requerida, no url'd
if($require_php!="ra28xbEblRnj") exit;
     $loginCorrecto = false;
	 //echo "LoginCorrecto es valor: "; if($loginCorrecto==true) { echo "Verdadero"; } else { echo "Falso"; }

	if(isset($_COOKIE['ia'])) { 
        $qkuser=$_COOKIE['ia']; 
        //Ahora, parseo el ID:LOGCODE valor en la cookie via la funcion explode()
          $qkpar = explode(":",$qkuser);
          $qk_uid=$qkpar[0];
          $qk_code=$qkpar[1];
		  //echo "Valor para UID es : " . $qk_uid . " Valor para Codigo es: " . $qk_code;
          //nos aseguramos que el ID de la cookie sea un valor numerico
		if(is_numeric($qk_uid)) {
            //Ahora, encontramos al usuario via ID
			
			$rsSes = new Recordset($SERVER, $DB, $USER, $PASSWORD);
			$sqlSes = "SELECT PERSONA_ID, SESIONID FROM SESION_FUNC WHERE PERSONA_ID='".$qk_uid."'";
			
			$rsSes->Open($sqlSes);
			
			if($rsSes->moveNext()) {
                //Si es válido, genero un nuevo LOGCODE y luego actualizo la TABLA
				if($rsSes->FieldbyNumber(1)==$qk_code) {
                   $loginCorrecto = true;
                   $global_qk=$qk_uid;
				} else { 
					// Se ha realizado OTRO inicio de sesion para este usuario EN ESTE MOMENTO !!!
					errorLogin("Atencion.... Se ha detectado en estos momentos OTRO inicio de sesion para su usuario!!!");
					setcookie('ia');
					die();
				}
			} else {
                // No existe el usuario
				errorLogin("Error.... No es un usuario Valido !!!");
                setcookie('ia'); 
				die();
			}

		} else {
			//Redirecciono en caso ID no existe en la Tabla
			setcookie('ia'); 
	header("Location: ".  _rutaPanel_ ."index.php");
				exit;
		}
		
} else {
	//Redirecciono si el ID del user en la cookie no es numerico
	setcookie('ia'); 
	header("Location: ".  _rutaPanel_ ."index.php");
				exit;
}

?>
