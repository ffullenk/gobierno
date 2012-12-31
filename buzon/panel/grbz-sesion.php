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

function TipoFuncionario($global_qk)
{
  global $SERVER , $DB , $USER  , $PASSWORD;
    if($global_qk=="")
	   {
	     $global_qk=0;
	   }
	  
  $rsTabla = new Recordset( $SERVER , $DB , $USER , $PASSWORD );
  
  $query = "SELECT TIPO_FUNCIONARIO 
		    FROM FUNCIONARIO
		    WHERE COD_FUNCIONARIO ='".$global_qk."' ";
			 
  $rsTabla->Open($query);
  
  if($rsTabla->RecordCount() == 0 )
	 return 0;
  else
    {
 	 $rsTabla->moveNext();
	 return $rsTabla->fieldByName("TIPO_FUNCIONARIO");
	} 
}


function ConoceNick($global_qk)
{
  global $SERVER , $DB , $USER  , $PASSWORD;
    if($global_qk=="")
	   {
	     $global_qk=0;
	   }
	  
  $rsTabla = new Recordset( $SERVER , $DB , $USER , $PASSWORD );
  
  $query = "SELECT USER_FUNCIONARIO 
		    FROM FUNCIONARIO
		    WHERE COD_FUNCIONARIO ='".$global_qk."' ";
			 
  $rsTabla->Open($query);
  
  if($rsTabla->RecordCount() == 0 )
	 return 0;
  else
    {
 	 $rsTabla->moveNext();
	 return $rsTabla->fieldByName("USER_FUNCIONARIO");
	} 
}
?>
