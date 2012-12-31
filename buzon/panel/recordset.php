<?php

   /***********************************************************************
    *  Archivo        :  recordset.php
    *  Descripcion    :  Este archivo contiene la definicion de la clase Recordset, la cual
    *                    Especifica un objeto para realizar las conexiones a la base de datos.
    *  F. de Creacion :  25 de Junio del 2003
    *  Autor          :  Jonathan Pereira
    *  Ultima Mod.    :  25 de Junio del 2003
    ************************************************************************/

if (defined( __RECORDSET__ ) == false)
   define( __RECORDSET__ , "__RECORDSET__");
else
   return;

  
   include("mysql.php");


   class Recordset
   {
      var $data;  // Almacena el puntero a la conexion activa.
      var $msql;  // Puntero a objeto MySql, que realiza la conexion a la base de datos
      var $count; // Mantiene el valor del registro que se encuentra posicionado al utilizar la funcion
                  // moveNext
      //Arreglo que es utilizado para la generacion de una instruccion Insert
      var $insert;

      //Arreglo que es utilizado para la generacion de una instruccion Update
      var $update;
      //Arreglo que contiene todas las restricciones que hay que aplicar al query
      // para no alterar la tabla completa, o un conjunto de registros que no se desea modificar
      var $where;

      var $campo;

      var $server , $user , $db , $password;
	  /***********************************************************************
	  *Listado de matodos miembro
	  *1.- Recordset( $server , $user , $db , $password = "")
	  *2.- Open( $query , $debug = 1 )
	  *3.- RecordCount()
	  *4.- FieldByName( $nombre_campo )
      *5.- FieldByNumber( $nombre_campo )
	  *6.- moveNext()
      *7.- llenarCombo( $query , $nombreCombo , $style = "" , $seleccion = "",$url="",$tabindex="0",$target="_blank", $param="" )	  
	  *8.- llenarComboConc( $query , $nombreCombo , $style = "" , $seleccion = "",$url="",$tabindex="0",$target="_blank", $param="" )
	  *9.- FieldByInsert( $campo , $valor )
	  *10- execInsert( $nombreTabla ,$debug = "1" )
	  *11- getCampo( $query , $conexion = "")
	  *12- FieldByUpdate( $campo , $valor )
	  *13- WhereByUpdate( $campo , $valor )
	  *14- execUpdate( $nombreTabla ,$debug = "1" )
	  ************************************************************************/
      /***********************************************************************
       * Nombre Funcion  :  Recordset()
       * F. de Creacion  :  25 de Junio del 2003
       * Par. Entrada    :
       *  $server        :  Nombre del servidor en el que esta la base de datos
       *  $user          :  Nombre del usuario que abre la bd
       *  $db            :  Nombre de la base de datos a ser utilizada
       *  $password      :  Contraseña del usuario en la base de datos, por defecto vacia
       * Retorno         :  ninguno
       * Descripcion     :  Funcion constructora de la clase Recordset. Realiza una
       *                    conexion a la base de datos, inicializando $psql
       ************************************************************************/
      function Recordset( $server , $user , $db , $password = "")
      {
         $this->msql = new MySql( $server , $user , $db , $password );
		 $this->server = $server;
         $this->user = $user;
         $this->db = $db;
         $this->password = $password;
      }

      /***********************************************************************
       * Nombre Funcion  : Open
       * F. de Creacion  :  25 de Junio del 2003
       * Par. Entrada
       *     $query      :  Contiene un query a ejecutar en la base de datos
       *     $debug      :  Variable que determina si se debe realizar una salida por pantalla
       *                    para la depuracion del codigo, si es = 0 envia salida por pantalla
       * Retorno         :  ninguno
       * Descripcion     :  Funcion que ejecuta un query en la base de datos. Antes de
       *                    obtener cualquier valor debe llamarse esta funcion .
       ************************************************************************/
      function Open( $query , $debug = 1 )
      {
         $this->msql->Query( $query );
         $this->data = $this->msql->recorset;
         if( $debug = 0 ) echo $query;
      }

      /***********************************************************************
       * Nombre Funcion  :  RecordCount
       * F. de Creacion  :  25 de Junio del 2003
       * Par. Entrada    :
       * Retorno         :  Retorna el numero de registros que retorno una consulta en particular.
       * Descripcion     :  Funcion que retorna el numero de tuplas que retorno una consulta ejecutada
       *                    por Open.
       ************************************************************************/
      function RecordCount()
      {
         $this->msql->recorset = $this->data;
         return $this->msql->RecordCount();
         //return mysql_num_rows( $this->data );
      }

      /***********************************************************************
       * Nombre Funcion  :  FieldByName
       * F. de Creacion  :  25 de Junio del 2003
       * Par. Entrada
       *   $nombre_campo :  Recibe el nombre del campo que se desea retornar.
       * Retorno         :  ninguno
       * Descripcion     :  Este metodo retorna el valor que posee el campo entregado como parametro
       *
       ************************************************************************/
      function FieldByName( $nombre_campo )
      {
         return $this->campo[$nombre_campo];
      }

      /***********************************************************************
       * Nombre Funcion  :  FieldByNumber
       * F. de Creacion  :  25 de Junio del 2003
       * Par. Entrada
       *   $nombre_campo :  Recibe el numero del campo que se desea retornar.
       * Retorno         :  ninguno
       * Descripcion     :  Este metodo retorna el valor que posee el campo entregado como parametro
       *
       ************************************************************************/
      function FieldByNumber( $nombre_campo )
      {
         return $this->campo[$nombre_campo];
      }


      /***********************************************************************
       * Nombre Funcion  :
       * F. de Creacion  :  25 de Junio del 2003
       * Par. Entrada    :
       * Retorno         :  ninguno
       * Descripcion     :
       ************************************************************************/
       function moveNext()
       {
          return $this->campo = mysql_fetch_array( $this->data );
       }

    /***********************************************************************
	* Nombre Funcion  : llenarCombo
	* F. de Creacion  : 03 de Diciembre del 2003
	* Par. Entrada
	*   $query        : Contiene la consulta con la cual se llenara el combo, esta consulta 
						debe ser del tipo:
						"SELECT 'CODIGO,NOMBRE' FROM 'TABLA' WHERE 'CRITERIO'"
	*   $nombreCombo  : sera el nombre del combo
	*   $style        : Mantiene el estilo que se le quiere dar al combo.
	*   $seleccion    : Si esta variable contiene algun valor, corresponde al valor que se
	*                   desea que este seleccionado una vez que se genera el combo dinamicamente,
	*   $url          : direccion en donde se quiere ir,una vez elegido un valor del combo
	*   $tabindex     : Indica el orden de tabulacion de este comopente.
	*   $param        : contiene un texto como "seleccione un pais", se utiliza para combos en cascada 
	                    o para cuando no hay registro.
	* Retorno         : ninguno
	* Descripcion     : Esta funcion recibe un query como parametro y genera un combo
	*                   con los valores que retorna este query, dandole el nombre $nombreCampo
	*                   al combo para obtener el valor en el siguiente script.
	* nota           :necesita estar declara en la pagina desde donde se llama 
	*                 la llamada a al archivo js. javas/funciones.js
	************************************************************************/
      function llenarCombo( $query , $nombreCombo , $style = "" , $seleccion = "",$url="",$tabindex="0",$target="_blank", $param="" )
      {
	  	 
         $consulta = new Recordset( $this->server , $this->user , $this->db , $this->password );
         $consulta->Open( $query );
	     if ($url!="")
		 {
		 	if ($style!="")
				{
				 echo "<select name=\"".$nombreCombo."\"  tabindex='".$tabindex."'  class='".$style."' onChange=\"chgAccion( this.form ,'".$target."', '".$url."');\">\n";
				}
			else echo "<select name=\"".$nombreCombo."\" tabindex='".$tabindex."' class='".$style."' onChange=\"chgAccion( this.form ,´".$target."´ ,'".$url."');\">\n";

	     }		
         else
		 { 
		    if ($style!="")
			    {
				 echo "<select name=\"".$nombreCombo."\"  tabindex='".$tabindex."' class='".$style."' >\n";
				}
		    else echo "<select name=\"".$nombreCombo."\" tabindex='".$tabindex."' class='".$style."' >\n";		
		}						
         while($consulta->moveNext() )
           {
		   if ($seleccion!="")
		     {
			   if($seleccion==$consulta->FieldByNumber(0))
			     {
				 echo "<option value=\"".$consulta->FieldByNumber(0)."\" selected>".$consulta->FieldByNumber(1)."</option>\n";
				 }
               else echo "<option value=\"".$consulta->FieldByNumber(0)."\" >".$consulta->FieldByNumber(1)."</option>\n";			 
			 }
		   else
		     {				 
				 echo "<option value=\"".$consulta->FieldByNumber(0)."\" >".$consulta->FieldByNumber(1)."</option>\n";			 			 
			 }	 				
			} 
	   
	   if($param!="" )
			{echo "<option value=\"0\" selected>".$param."</option>\n";}
		 echo "</select>\n";
      }
      /***********************************************************************
        * Nombre Funcion  : FieldByInsert
        * F. de Creacion  : 30 de Junio del 2003
        * Par. Entrada
        *   $campo        : Contiene el nombre del campo a anexar la variable
        *   $valor        : Contiene el valor a insertar en el campo
        * Retorno         : ninguno
        * Descripcion     : Esta funcion recibe los valores a utilizar para generar la
        *                   instruccion Insert, para realizar el insert de un nuevo registro
        ************************************************************************/
      function FieldByInsert( $campo , $valor )
      {
         $reg = Array( $campo , $valor );
         $this->insert[] = $reg;
      }

      /***********************************************************************
       * Nombre Funcion  : execInsert
       * F. de Creacion  : 30 de Junio del 2003
       * Par. Entrada    :
       *   $nombreTabla  : Contiene el nombre de la tabla en la cual se insertara el nuevo
       *                   registro
       *   $debug        : pone el parametro de debug, la cual envia por pantalla el query
       *                   y todos los mensajes de error posibles, si es 1 no hace debug
       *                   si es 0 (valor cero) tira por pantalla toda la informacion
       * Retorno         : True si la instruccion fue ejecutado correctamente, false si la
       *                   instruccion no pudo ser ejecutada en el servidor
       * Descripcion     : Esta funcion construye la instruccion insert con los valores que contiene
       *                   la variable $insert, y con estos, mas el nombre de la tabla que se entrega
       *                   como parametro construye una instruccion Insert, la cual es ejecutada.
       *                   e ingresa un nuevo registro al servidor.
       ************************************************************************/
      function execInsert( $nombreTabla ,$debug = "1" )
      {
         $campos  = "(";
         $valores = "(";

         foreach($this->insert as $var )
         {
            //
            // Verificamos que el valor entregado no sea nulo, y no lo agregamos al query Insert
            // ya que corresponde a un valor que si puede ser nulo en la bd
            //
            if( $var[1] != "")
            {
               $campos  = $campos  . $var[0] . ",";
               $valores = $valores . $var[1] . ",";
            }
         }
         $campos[ strlen( $campos ) - 1] = ")";
         $valores[strlen( $valores ) - 1] = ")";
         $error  = $this->msql->Query(  "INSERT INTO ". $nombreTabla . $campos . " VALUES ". $valores );

         if($debug == "0" )
         {
            echo "INSERT INTO ". $nombreTabla . $campos . " VALUES ". $valores;
            echo "<br>" . $error . "<br>";
         }
         //
         // Aqui verificamos que el registro fue insertado correctamente
         // Si el valor retornado por $error
         //

         //
         //Tenemos que eliminar los datos de la variable $insert
         unset($this->insert);

         if( $error == true )
            return true;
         else
            return false;

      }

      /***********************************************************************
       * Nombre Funcion  : getCampo
       * F. de Creacion  : 02 de Julio del 2003
       * Par. Entrada    :
       *   $query        : Recibe el query que se desea retornar
       * Retorno         : El valor que envia el query como retorno
       * Descripcion     : Esta funcion retorna el primer valor del primer campo que
       *                   retorna el query entregado como parametro. No verifica que
       *                   el query no retorne ningun valor. Si no hay valor
       *                   retorna vacio
       ************************************************************************/
      function getCampo( $query , $conexion = "")
      {
         $consulta = new Recordset( $this->server , $this->user , $this->db , $this->password );;
         $consulta->Open( $query );
         if( $consulta->RecordCount() == 0 )
            return "";
         else
         {
            $consulta->moveNext();
            return $consulta->FieldByName( 0 );
         }

      }
      /***********************************************************************
        * Nombre Funcion  : FieldByUpdate
        * F. de Creacion  : 05 de Julio del 2003
        * Par. Entrada
        *   $campo        : Contiene el nombre del campo a anexar la variable
        *   $valor        : Contiene el valor a insertar en el campo
        * Retorno         : ninguno
        * Descripcion     : Esta funcion recibe los valores a utilizar para generar la
        *                   instruccion Update, para realizar la modificacion. Aqui se
        *                   ingresan los valores que se desean modificar.
        ************************************************************************/
      function FieldByUpdate( $campo , $valor )
      {
         $reg = Array( $campo , $valor );
         $this->update[] = $reg;
      }

      /***********************************************************************
        * Nombre Funcion  : WhereByUpdate
        * F. de Creacion  : 05 de Julio del 2003
        * Par. Entrada
        *   $campo        : Contiene el nombre del campo a seleccionar para realizar el where
        *   $valor        : Contiene el valor a seleccionar para realizar el where
        * Retorno         : ninguno
        * Descripcion     : Esta funcion recibe un par de valores como parametros, los cuales
        *                   son utilizados como restricciones para seleccionar los campos a los cuales
        *                   les sera aplicado el where.
        ************************************************************************/
      function WhereByUpdate( $campo , $valor )
      {
         $reg = Array( $campo , $valor );
         $this->where[] = $reg;
      }


      /***********************************************************************
       * Nombre Funcion  : execUpdate
       * F. de Creacion  : 05 de Julio del 2003
       * Par. Entrada    :
       *   $nombreTabla  : Contiene el nombre de la tabla en la cual se modificara el
       *                   registro
       *   $debug        : pone el parametro de debug, la cual envia por pantalla el query
       *                   y todos los mensajes de error posibles, si es 1 no hace debug
       *                   si es 0 (valor cero) tira por pantalla toda la informacion
       * Retorno         : True si la instruccion fue ejecutado correctamente, false si la
       *                   instruccion no pudo ser ejecutada en el servidor
       * Descripcion     : Esta funcion construye la instruccion Update con los valores almacenados
       *                   en las variables update y where, con estos construye la instruccion
       *                   y la ejecuta en el servidor.
       ************************************************************************/
      function execUpdate( $nombreTabla ,$debug = "1" )
      {
         $campos = "";
         $cond = "";

         foreach($this->update as $var )
         {
            //
            // Verificamos que el valor entregado no sea nulo, y no lo agregamos al query Insert
            // ya que corresponde a un valor que si puede ser nulo en la bd
            //
            if( $var[1] != "")
            {
               $campos = $campos .  $var[0] . "= " . $var[1] . " , " ;

            }
         }
         //Generamos las restricciones
			 foreach($this->where as $var )
			 {
				$cond = $cond . $var[0] . "= " . $var[1] . " AND " ;
			 }

         $campos[ strlen( $campos ) - 1] = " ";
         $campos[ strlen( $campos ) - 2] = " ";
         $cond[strlen( $cond ) - 2] = " ";
         $cond[strlen( $cond ) - 3] = " ";
         $cond[strlen( $cond ) - 4] = " ";


         $error  = $this->msql->Query( "UPDATE " . $nombreTabla . " SET " . $campos . " WHERE " . $cond );

         if($debug == "0" )
         {
            echo "UPDATE " . $nombreTabla . " SET " . $campos . " WHERE " . $cond ;
        }
         //
         // Aqui verificamos que el registro fue insertado correctamente
         // Si el valor retornado por $error
         //

         unset( $this->where );
         unset( $this->update);
         if( $error == true )
            return true;
         else
            return false;

      }

	



}// fin de la clase
   
   


   

?>


