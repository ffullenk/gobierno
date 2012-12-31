<?php

	if (defined( __CORREO__ ) == false)
	   define( __CORREO__ , "__CORREO__");
	else
    return;	

   class correo      
   {
     var $fromName;     //da la posibilidad de escribir un emisor del correo;
	 var $fromMail;     //da la posibilidad de escribir el email del emisor del correo;	 
	 var $email;        //Contiene la lista de correo que se desea enviar
	 var $countEmail;   //Contador de la lista de correo
	 var $destinatario; //Indice del primer campo
	 var $asunto;       //Indice del segundo campo
	 var $mensaje;      //indice del tercer campo
	 
  /*********************listado de metodos de la clase*******************
   * 1.- correo()
   * 2.- correo($name, $mail)
   * 3.- putCorreo($destinatario, $asunto, $mensaje)
   * 4.- sendCorreo()
   ***********************************************************************/	 
  /***********************************************************************
   * Nombre Funcion  :  correo
   * F. de Creacion  :  09 de febrero del 2004
   * Par. Entrada    :
   * Retorno         :  ninguno
   * Descripcion     :  constructor de la clase inicializa las variables 
   *                    y el contador
   *modificacion     :  10 de febrero del 2004
   ************************************************************************/	 
	 function correo()
	 {
	   $this->destinatario = 1;
	   $this->asunto = 2;
	   $this->mensaje = 3;
	   $this->countEmail = 0;
	   $this->fromName = "";	   
	   $this->fromMail = "";
	 }
  /***********************************************************************
   * Nombre Funcion  :  setEmisor
   * F. de Creacion  :  10 de febrero del 2004
   * Par. Entrada    :
   *   $name         :  Contiene el nombre del emisor del correo 
   *   $mail         :  Contiene el correo del emisor
   * Retorno         :  ninguno
   * Descripcion     :  Funcion que cambia el nombre del emisor y su correo   
   ************************************************************************/	 	 
	 function setEmisor($name, $mail)
	 {
	   $this->fromName = $name;	   
	   $this->fromMail = $mail;
	 }
  /***********************************************************************
   * Nombre Funcion  :  putCorreo
   * F. de Creacion  :  09 de febrero del 2004
   * Par. Entrada    :
   * $destinatario   :  contiene el mail del destinatario del mensaje
   * $asunto         :  contiene el asunto del mensaje
   * $mensaje        :  contiene el mensaje en si
   * Retorno         :  ninguno
   * Descripcion     :  ingresa un nuevo destinatario a la lista de correo
   *                    que se desea ser enviada
   ************************************************************************/	 	 
	 function putCorreo($destinatario, $asunto, $mensaje)
	 {
	  $this->email[$this->countEmail][$this->destinatario] = $destinatario;
	  $this->email[$this->countEmail][$this->asunto] = $asunto;
	  $this->email[$this->countEmail][$this->mensaje] = $mensaje;
	  $this->countEmail++;
	 }
  /***********************************************************************
   * Nombre Funcion  :  sendCorreo
   * F. de Creacion  :  09 de febrero del 2004
   * Par. Entrada    :
   * Retorno         :  ninguno
   * Descripcion     :  envia los correo mediante la funcion mail de php.
   ************************************************************************/	 	 	 
	 function sendCorreo()
	 {
	   if($this->fromName!="" && $this->fromMail!="")
	      {
		   for($i=0;$i<$this->countEmail;$i++)
			  {
				  @mail($this->email[$i][$this->destinatario], $this->email[$i][$this->asunto], $this->email[$i][$this->mensaje], "From: ".$this->fromName." <".$this->fromMail.">") or die("El correo no ha podido ser enviado...");		  
			  }	 
		  }
		else
		  {
		   for($i=0;$i<$this->countEmail;$i++)
			  {
				  @mail($this->email[$i][$this->destinatario], $this->email[$i][$this->asunto], $this->email[$i][$this->mensaje])or die("El correo no ha podido ser enviado...");		  
			  }	 		  
		  }  	  
	 }
   }
?>
