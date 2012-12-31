<?php
   /***********************************************************************
    *  Archivo        :  postgres.php
    *  Descripcion    :  Archivo que contiene las rutinas necesarias para realizar la conexiones
    *                    a la base de datos. Define un objeto que administra todas las conexiones
    *                    a la base.
    *  F. de Creacion :  24 de Junio del 2003
    *  Autor          :  Jonathan Pereira
    *  Ultima Mod.    :  24 de Junio del 2003
    ************************************************************************/
if (defined( __MYSQL__ ) == false)
   define( __MYSQL__ , "__MYSQL__");
else
   return;

   class MySql
   {
      //variable que mantiene una conexion a la base de datos
      var $conexion;
      var $recorset;
      /***********************************************************************
       * Nombre Funcion   :  Connect
       * F. de Creacion   :  24 de Junio del 2003
       * Par. Entrada     :
       *  $server         :  Nombre del servidor en el que esta la base de datos
       *  $user           :  Nombre del usuario que abre la bd
       *  $db             :  Nombre de la base de datos a ser utilizada
       *  $password       :  Contraseña del usuario en la base de datos, por defecto vacia
       * Retorno          :  ninguno
       * Descripcion      :  Esta funcion realiza la conexion a la base de datos.
       *                     Esta funcion tiene que ser llamada antes de realizar
       *                     cualquier consulta a la base de datos.
       ************************************************************************/
      function Connect( $server , $db , $user  , $password = "")
      {
         $this->conexion = mysql_Connect( $server , $user , $password ) or die("No se puede conectar al motor BD.");
		 
         mysql_select_db( $db  , $this->conexion );
      }

      /***********************************************************************
       * Nombre Funcion   :  MySql
       * F. de Creacion   :  24 de Junio del 2003
       * Par. Entrada     :
       *  $server         :  Nombre del servidor en el que esta la base de datos
       *  $user           :  Nombre del usuario que abre la bd
       *  $db             :  Nombre de la base de datos a ser utilizada
       *  $password       :  Contraseña del usuario en la base de datos, por defecto vacia
       * Retorno          :  ninguno
       * Descripcion      :  Esta funcion es el constructor de la clase. Realiza una
       *                     conexion a la base de datos que esta definida por defecto.
       **************************** ********************************************/
      function MySql ( $server , $db , $user , $password = "")
      {
         $this->Connect( $server , $db , $user  , $password );
      }
      /***********************************************************************
       * Nombre Funcion   :  Query
       * F. de Creacion   :  24 de Junio del 2003
       * Par. Entrada     :
       *      $query      :  Contiene el query a ser ejecutado.
       * Retorno          :  ninguno
       * Descripcion      :  Esta funcion ejecuta un query en el servidor,
       ************************************************************************/
      function Query( $query )
      {
         return $this->recorset = mysql_query(  $query , $this->conexion );
      }

      /***********************************************************************
       * Nombre Funcion   :  recordCount
       * F. de Creacion   :  07 de Septiembre del 2003
       * Par. Entrada     :
       * Retorno          :  Retorna el numero de registros que contiene un query ejecutado
       * Descripcion      :  Esta funcion devuelve el numero de registros que posee
       *                     un query
       ************************************************************************/
      function recordCount( )
      { 
         $retorno = mysql_num_rows( $this->recorset ) ;
         return $retorno;
      }



       /***********************************************************************
       * Nombre Funcion   :  getConexion
       * F. de Creacion   :  20 de Agosto del 2004 - Gerardo Rosales
       * Par. Entrada     :  
       * Retorno          :  Retorna el identificador de conexion a la base de datos en mysql  
       * Descripcion      :  
       *                     
       ************************************************************************/
	  function getConexion()
	  { return  $this->conexion; 	          
	  }

   }
?>
