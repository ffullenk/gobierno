<?php
   @include("global.php");
   @include("recordset.php");

/* Verifica si es funcionario */
function esFuncionario( $usuario , $clave )
{
  global $SERVER , $DB , $USER  , $PASSWORD;

  $rsTabla = new Recordset( $SERVER , $DB , $USER  , $PASSWORD );
  $rsTabla->Open("SELECT * 
                  FROM FUNCIONARIO 
				  WHERE USER_FUNCIONARIO = '".$usuario."' AND 
                        PASS_FUNCIONARIO = '".crypt($clave,$usuario)."' AND
						TIPO_FUNCIONARIO=1;");
  if($rsTabla->RecordCount() == 0 )
	 return false;
  else
	 return true;
}

?>
