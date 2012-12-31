<?php
global $loginCorrecto, $global_qk;
  //Detecto si esta página ha sido requerida, no url'd
  if($legal_require_php!="slkad98n32f") exit;
     $loginCorrecto = false;
     if(isset($_COOKIE['gore'])) { 
        $qkuser=$_COOKIE['gore']; 
        //Ahora, parseo el ID:LOGCODE valor en la cookie via la funcion explode()
          $qkpar = explode(":",$qkuser);
          $qk_uid=$qkpar[0];
          $qk_code=$qkpar[1];
          //nos aseguramos que el ID de la cookie sea un valor numerico
          if(is_numeric($qk_uid)) {
            //Ahora, encontramos al usuario via ID
            $res=mysql_query("SELECT COD_PERS, SESIONID FROM ENCUESTADOS WHERE COD_PERS='".$qk_uid."' ");
            //Ahora, veo si el usuario existe en la base de datos
            if($row = mysql_fetch_object($res)) {
              //Ahora, comparo LOGCODES en la cookie en contra del de la TABLA
              if( $row->SESIONID == $qk_code ) {
                //Si es válido, genero un nuevo LOGCODE y luego actualizo la TABLA
                $loginCorrecto = true;
                mysql_free_result($res);
                $global_qk=$qk_uid;
              } else {
                //Redireccionar si el LOGCODE no es igual
                setcookie('gore'); 
                header("Location: index.php");
              }
            } else {
             //Redirecciono en caso ID no existe en la Tabla
             setcookie('gore'); 
             header("Location: index.php");
            }
          } else {
            //Redirecciono si el ID del user en la cookie no es numerico
            setcookie('gore'); 
            header("Location: index.php");
          }
     }
?>
