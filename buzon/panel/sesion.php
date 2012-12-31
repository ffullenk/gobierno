<?php
   @include("global.php");
   @include("recordset.php");
  /***********************************************************************************************
   * Listado de funciones en el Archivo
   1.-verificarUsuario( $usuario , $clave , $archivo )
   2.-esUsuario ($usuario, $clave )
   3.-esEmpleado( $usuario , $clave )
   4.-esEmpleadoInstitucion( $codigo_institucion, $usuario , $clave )
   5.-esAutor( $codigo, $usuario, $clave)
  */
  /***********************************************************************
   * Nombre Funcion  :  verificarUsuario
   * F. de Creacion  :  04 de Junio del 2003
   * Par. Entrada
   *     $usuario    :  Contiene el nombre de usuario que se desea verificar
   *     $clave      :  Contiene la contraseña que pertenece al usuario
   *     $archivo    :  Contiene el nombre del archivo que se esta siendo llamado por el usuario
   * Retorno         :  Retorna false si ocurre algun tipo de error en la verificacion del usuario
   *                    Retorna True si el usuario es valido y ademas tiene permisos para ejecutar
   *                    la pagina.
   * Descripcion     :  Esta funcion realiza todas las comprobaciones con respecto
   *                    a un usuario, y los permisos que posee este sobre una pagina en particular
   *                    la cual es entregada como parametro. Si el usuario no posee los permisos
   *                    no existe, o la contraseña es invalida, aborta la operacion y retorna false
   *                    de lo contrario retorna true
   ************************************************************************/
function verificarUsuario( $usuario , $clave , $archivo )
{      
  global $SERVER , $DB , $USER  , $PASSWORD;

  $rsTabla = new Recordset( $SERVER , $DB , $USER  , $PASSWORD);
  // Primero verificamos que el usuario entregado como parametro exista en la base de datos
  $rsTabla->Open("SELECT * FROM USUARIO_PUBLICO WHERE USER_PERSONA = '$usuario' AND PASSWORD_PERSONA = '".crypt($clave,$usuario)."'" );
		
  if($rsTabla->RecordCount() == 0 )
  {
	 return false;
  }
	 return true;
}

/***********************************************************************
* Nombre Funcion  :  esUsuario
* F. de Creacion  :  06 de Julio 2003
* Par. Entrada
*     $usuario    :  Contiene el nombre de usuario que se desea verificar
*     $clave      :  Contiene la contraseña que pertenece al usuario
* Retorno         :  Retorna true si el usuario esta registrado, retorna false
*                    si el usuario no esta registrado
* Descripcion     :  Verifica si existe un usuario con el nombre entregado como parametro
*                    Esta verificacion es realizada en la tabla usuario, que es la que contiene
*                    todos los usuarios del sistema
************************************************************************/
function esUsuario ($usuario, $clave )
{
  global $SERVER , $DB , $USER  , $PASSWORD;
  
    if(isset($usuario)==false)
	   {
	     $usuario="user";
	   }
	if(isset($clave)==false)
	  {
	    $clave="pass";
	  }
	  
  $rsTabla = new Recordset( $SERVER , $DB , $USER  , $PASSWORD);
  // Primero verificamos que el usuario entregado como parametro exista en la base de datos
  $query = "SELECT * FROM USUARIO_PUBLICO WHERE USER_PERSONA='" . $usuario ."' AND PASSWORD_PERSONA='".crypt($clave,$usuario)."';";   
  $rsTabla->Open($query);
  //Verificamos que exista el usuario enviado como parametro
  if($rsTabla->RecordCount() == 0 )
	 return false;
  else
	 return true;
}
/***********************************************************************
* Nombre Funcion  :  codigoUsuario
* F. de Creacion  :  06 de Julio 2003
* Par. Entrada
*     $usuario    :  Contiene el nombre de usuario que se desea verificar
*     $clave      :  Contiene la contraseña que pertenece al usuario
* Retorno         :  Retorna el codigo del usuario si este existe de lo contrario retorna 0
* Descripcion     :  Verifica si existe un usuario con el nombre entregado como parametro
*                    Esta verificacion es realizada en la tabla usuario, que es la que contiene
*                    todos los usuarios del sistema
************************************************************************/
function codigoUsuario ($usuario, $clave )
{
  global $SERVER , $DB , $USER  , $PASSWORD;
  
    if(isset($usuario)==false)
	   {
	     $usuario="user";
	   }
	if(isset($clave)==false)
	  {
	    $clave="pass";
	  }
	  
  $rsTabla = new Recordset( $SERVER , $DB , $USER  , $PASSWORD);
  // Primero verificamos que el usuario entregado como parametro exista en la base de datos
  $query = "SELECT CODIGO_PERSONA AS CODIGO FROM USUARIO_PUBLICO WHERE USER_PERSONA='" . $usuario ."' AND PASSWORD_PERSONA='".crypt($clave,$usuario)."';"; 
  
  $rsTabla->Open($query);
  //Verificamos que exista el usuario enviado como parametro
  if($rsTabla->RecordCount() == 0 )
	 return 0;
  else
	 {
	  $rsTabla->moveNext();
	  return $rsTabla->fieldByName("CODIGO");
	 }
}
/***********************************************************************
* Nombre Funcion  :  esEmpleado
* F. de Creacion  :  06 de Diciembre 2003
* Par. Entrada
*     $usuario    :  Contiene el nombre de usuario que se desea verificar
*     $password   :  Contiene la password del usuario
* Retorno         :  Retorna true si el usuario esta registrado, retorna false
*                    si el usuario no esta registrado
* Descripcion     :  Verifica si existe un productor con el nombre entregado como parametro y
*                    la contraseña.
*                    Esta verificacion es realizada en la tabla EMPLEADO, que es la que contiene
*                    todos los usuarios del sistema
************************************************************************/
function esEmpleado( $usuario , $clave )
{
  global $SERVER , $DB , $USER  , $PASSWORD;

  $rsTabla = new Recordset( $SERVER , $DB , $USER  , $PASSWORD );
  $rsTabla->Open("SELECT * 
                  FROM EMPLEADO 
				  WHERE USER_PERSONA = '".$usuario."' AND 
                        PASSWORD_PERSONA = '".crypt($clave,$usuario)."' AND
						ESTADO_EMPLEADO=1;");
  
  if($rsTabla->RecordCount() == 0 )
	 return false;
  else
	 return true;
}
/***********************************************************************
* Nombre Funcion  :  esEmpleadoInstitucion
* F. de Creacion  :  02 de Febrero 2003
* Par. Entrada
* $codigo_institucion : Contiene el codigo de la institucion a la cual pertene el empleado
*     $usuario    :  Contiene el nombre de usuario que se desea verificar
*     $password   :  Contiene la password del usuario
* Retorno         :  Retorna true si el usuario esta registrado y es empleado de la institucion, retorna false
*                    si el usuario no esta registrado
* Descripcion     :  Verifica que el empleado este registrado y ademas sea empleado de la institucion $codigo_institucion
************************************************************************/
function esEmpleadoInstitucion( $codigo_institucion, $usuario , $clave )
{
  global $SERVER , $DB , $USER  , $PASSWORD;
  
  if($usuario=="")
	   {
	     $usuario="user";
	   }
  if($clave=="")
	  {
	    $clave="pass";
	  }
	  
  $rsTabla = new Recordset( $SERVER , $DB , $USER  , $PASSWORD );
  
  $query = "SELECT E.CODIGO_PERSONA, I.CODIGO_INSTITUCION  
		   FROM EMPLEADO AS E, INSTITUCION AS I 
           WHERE E.USER_PERSONA ='".$usuario."' AND 
                 E.PASSWORD_PERSONA = '".crypt($clave,$usuario)."' AND
                 E.CODIGO_INSTITUCION = I.CODIGO_INSTITUCION AND 
                 I.CODIGO_INSTITUCION = ".codigo_institucion.";";
			 
  $rsTabla->Open($query);
  
  if($rsTabla->RecordCount() == 0 )
	 return false;
  else
	 return true;
}
/***********************************************************************
* Nombre Funcion  :  esAutor
* F. de Creacion  :  27 de enero 2003
* Par. Entrada
	  $codigo     :  Contiene el codigo de la transaccion de la cual el usuaro debe ser el autor
*     $usuario    :  Contiene el nombre de usuario que se desea verificar, hizo la transaccion
*     $clave      :  Contiene la contraseña que pertenece al usuario, quien hizo la transaccion
* Retorno         :  Retorna true si el usuario esta registrado, y ademas es usuario de la transaccion
*                    retorna false, si el usuario no esta registrado o no es el dueño
* Descripcion     :  verifica que el usuario quien es entregado como parametros es el autor
*                    de transaccion         
************************************************************************/
function esAutor( $codigo, $usuario, $clave)
{   
    global $SERVER , $DB , $USER  , $PASSWORD;
	
	if(isset($codigo)==false)
	   {
	    $codigo=0;
	   }

    if(isset($usuario)==false)
	   {
	     $usuario="user";
	   }
	if(isset($clave)==false)
	  {
	    $clave="pass";
	  }

    $TablaAutor = new Recordset( $SERVER , $DB , $USER  , $PASSWORD);
	// Primero verificamos que el usuario entregado como parametro exista en la base de datos
	$query= "SELECT UP.CODIGO_PERSONA, T.CODIGO_TRANSACCION 
				FROM USUARIO_PUBLICO AS UP, TRANSACCION AS T
				WHERE UP.USER_PERSONA = '".$usuario."' AND
							 UP.PASSWORD_PERSONA= '".crypt($clave,$usuario)."' AND
							 UP.CODIGO_PERSONA = T.CODIGO_PERSONA AND
							 T.CODIGO_TRANSACCION = ".$codigo.";";							 

	$TablaAutor->Open($query);
	//Verificamos que exista el usuario enviado como parametro
	if($TablaAutor->RecordCount()==0)
	  {
	    return false;
	  }
    else return true;
}
/***********************************************************************
* Nombre Funcion  :  nombrePagina
* F. de Creacion  :  24 de mayo 2004
* Par. Entrada
*	  $pagina     :  Contiene el path completo de la pagina, partiendo de la cartepa de la aplicacion
*     $nivel      :  Contiene el numero de niveles se desea que retorne la funcion desde las hoja a la raiz
* Retorno         :  Retorna el nombre simplificado del archivo desde las hojas a la raiz
* Descripcion     :  Funcion qu simplifica el nombre del archivo.
************************************************************************/
function nombrePagina($pagina,$nivel)
{
$largo = strlen($pagina);
$contador=0;
for($i=0;$i<$largo;$i++)
   { 
	 if(substr($pagina,$i,1)=="/")
	   {
		$carpetas[$contador] = $i + 1;
		$contador++;
	   }	   
   }
   return substr($pagina,$carpetas[$contador-$nivel],$largo);
}

/***********************************************************************
* Nombre Funcion  :  permisoUsuarioPagina
* F. de Creacion  :  20 de mayo 2004
* Par. Entrada
*     $usuario    :  Contiene el nombre de usuario que se desea verificar
*     $password   :  Contiene la password del usuario
*     $pagina     :  Contiene la ruta del archivo(pagina)
* Retorno         :  Retorna true si el usuario esta registrado y tiene permisos para ejecutar esta pagina
                     Retorna false si el usuario no tiene permisos para ejecutar esta pagina o si el usuario no esta registrado
* Descripcion     :  Verifica si existe un empleado que esta registrado en el sitio y tiene permisos de 
*                    la contraseña.
*                    Esta verificacion es realizada en la tabla EMPLEADO, que es la que contiene
*                    todos los usuarios del sistema
************************************************************************/
function permisoUsuarioPagina( $usuario , $clave, $pagina )
{
  global $SERVER , $DB , $USER  , $PASSWORD;
  if($usuario=="")
	   {
	     $usuario="user";
	   }
  if($clave=="")
	  {
	    $clave="pass";
	  }
   
  $rsTabla = new Recordset( $SERVER , $DB , $USER  , $PASSWORD );
  $query = "SELECT * 
            FROM EMPLEADO AS E, PERMISO AS P, MODULO AS M, PAGINA AS PA
			WHERE E.USER_PERSONA ='".$usuario."' AND
			      E.ESTADO_EMPLEADO = 1 AND 
			      E.PASSWORD_PERSONA ='".crypt($clave,$usuario)."' AND
				  E.CODIGO_PERSONA = P.CODIGO_PERSONA AND
				  P.CODIGO_MODULO = M.CODIGO_MODULO AND
				  M.CODIGO_MODULO = PA.CODIGO_MODULO AND
				  PA.URL_PAGINA = '".$pagina."';";
  $rsTabla->Open($query);
  
  if($rsTabla->RecordCount() == 0 )
	 return false;
  else
	 return true;
}
/***********************************************************************
* Nombre Funcion  :  codigoInstitucionEmpleado
* F. de Creacion  :  24 de Mayo 2004
* Par. Entrada
*     $usuario    :  Contiene el nombre de usuario que se desea verificar
*     $password   :  Contiene la password del usuario
* Retorno         :  0 : si el $usuario y clave no pertenece a ninguna institucion 
                     codigo institucion si pertenecen
* Descripcion     :  funcion que retorna el codigo de la institucion a la cual pertenece el empleado
************************************************************************/
function codigoInstitucionEmpleado($usuario , $clave )
{
  global $SERVER , $DB , $USER  , $PASSWORD;
    if($usuario=="")
	   {
	     $usuario="user";
	   }
  if($clave=="")
	  {
	    $clave="pass";
	  }
	  
  $rsTabla = new Recordset( $SERVER , $DB , $USER , $PASSWORD );
  
  $query = "SELECT E.CODIGO_PERSONA, I.CODIGO_INSTITUCION  
		    FROM EMPLEADO AS E, INSTITUCION AS I 
		    WHERE E.USER_PERSONA ='".$usuario."' AND 
			      E.PASSWORD_PERSONA = '".crypt($clave,$usuario)."' AND
			      E.CODIGO_INSTITUCION = I.CODIGO_INSTITUCION";
			 
  $rsTabla->Open($query);
  
  if($rsTabla->RecordCount() == 0 )
	 return 0;
  else
    {
 	 $rsTabla->moveNext();
	 return $rsTabla->fieldByName("CODIGO_INSTITUCION");
	} 
}
/***********************************************************************
* Nombre Funcion  :  codigoUsuario
* F. de Creacion  :  27 de mayo 2003
* Par. Entrada
*     $usuario    :  Contiene el nombre del empleado que se desea verificar
*     $clave      :  Contiene la contraseña que pertenece al empleado
* Retorno         :  Retorna el codigo del usuario si este existe de lo contrario retorna 0
* Descripcion     :  Verifica si existe un usuario con el nombre entregado como parametro
*                    Esta verificacion es realizada en la tabla usuario, que es la que contiene
*                    todos los usuarios del sistema
************************************************************************/
function codigoEmpleado($usuario, $clave )
{
  global $SERVER , $DB , $USER  , $PASSWORD;
  
    if(isset($usuario)==false)
	   {
	     $usuario="user";
	   }
	if(isset($clave)==false)
	  {
	    $clave="pass";
	  }
	  
  $rsTabla = new Recordset( $SERVER , $DB , $USER  , $PASSWORD);
  // Primero verificamos que el usuario entregado como parametro exista en la base de datos
  $query = "SELECT CODIGO_PERSONA AS CODIGO FROM EMPLEADO WHERE USER_PERSONA='".$usuario."' AND PASSWORD_PERSONA='".crypt($clave,$usuario)."';"; 
  
  $rsTabla->Open($query);
  //Verificamos que exista el usuario enviado como parametro
  if($rsTabla->RecordCount() == 0 )
	 return 0;
  else
	 {
	  $rsTabla->moveNext();
	  return $rsTabla->fieldByName("CODIGO");
	 }
}
?>
