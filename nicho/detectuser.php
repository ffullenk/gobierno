<?php
global $loginCorrecto, $global_qk;
//Detecto si esta página ha sido requerida, no url'd
if( $legal_require_php != "k28stv7s4" ) exit;
  $loginCorrecto = false;
  /*echo "Login <br>";
  if($loginCorrecto) { echo "True";} else { echo "False";}*/
  if(isset($HTTP_COOKIE_VARS["qknicho"]))
    { // Retomar SESION ID
         $qkuser=$HTTP_COOKIE_VARS["qknicho"];
		 //echo "qkuser ". $qkuser;
       //Ahora, parseo el ID:sesionid valor en la cookie via la funcion explode()
         $qkpar = explode(":",$qkuser);
         $qk_uid=$qkpar[0];
         $qk_ses=$qkpar[1];
       //nos aseguramos que el ID de la cookie sea un valor numerico
         if(is_numeric($qk_uid)) {
		   // Verificar en Tabla SESION
              $result = mysql_query("SELECT id, sesionid FROM usuarios WHERE id='$qk_uid'") or DIE(mysql_error());
              if($row = mysql_fetch_object($result)) {
			   //Ahora, comparo sesionid en la cookie en contra del de la TABLA
			     if($qk_ses == trim($row->sesionid) ) {
                     $loginCorrecto = true;
                     $ultimoacceso  = $row->lasttime;
                     $t = time();
                     $sesionid = md5(uniqid("$row->id:$t"));
	                 $iduser = $row->id;
		             mysql_query("UPDATE usuarios SET sesionid='$sesionid', lastaccess='$ultimoacceso', lasttime='$t' WHERE id='$iduser'") or die(mysql_error());
                     unset($row);
                     mysql_free_result($result);
				     // Actualizo sesionid
		                $qk = "$iduser:$sesionid";
						setcookie('qknicho', $qk, time() + 60*60*24*30, '/nicho', '', 0);
                        //setcookie("qkadm", $qk, $t+3600); // 2 años de vida
						$global_qk=$iduser;
                 } else { // No es la misma sesionid
				     // Primero, elimino la cookie
					    setcookie('qknicho', '', 0, '/nicho', '', 0);
                     // Luego, retorno a la pagina principal
					    header( "Location: index.html");
                 }
              } else { // No es la misma sesionid
				     // Primero, elimino la cookie
					    setcookie('qknicho', '', 0, '/nicho', '', 0);
                     // Luego, retorno a la pagina principal
					    header( "Location: index.html");
              }
           } else {
				     // Primero, elimino la cookie
					    setcookie('qknicho', '', 0, '/nicho', '', 0);
                     // Luego, retorno a la pagina principal
					    header( "Location: index.html");
           }
        } else { header( "Location: index.html"); } ?>
