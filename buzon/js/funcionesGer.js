/***************************************************************************************
* Listado de funciones en el Archivo
* 1.- imprimir()
* 2.- popup(url,ancho,alto,scroll)
* 3.- chgAccion( Forms ,  strAccion )
* 4.- enviar(Forms) 
* 5.- validarFormulario()
/****************************************************************************************/
	
//formulario Antecedentes Generales Institucion		
function validarFormularioAntGen()
	{
     		   if(validarCampo(document.formulario.nombre_institucion,isAny,false)&&
  			      validarCampo(document.formulario.sigla_institucion,isAny,false)&&
				  validarCampo(document.formulario.email_institucion,isEmail,false)&&
				  validarCampo(document.formulario.descripcion_institucion,isAny,false)&&
				  validarCampo(document.formulario.objetivos_institucion,isAny,false)&&
				  validarCampo(document.formulario.logo_institucion,isImage,true))
			return true;
			else return false;
	}			

//Valida el formulario de actulizar y nuevo documento de institucion
function validarFormularioDoc()
	{
     		   if(validarCampo(document.formulario.nombre_documento,isAny,false)&&
				validarCampo(document.formulario.paginas_documento,isAny,false)&&
				validarCampo(document.formulario.fecha_documento,isAny,false)&&
				validarCampo(document.formulario.descripcion_documento,isAny,false)&&
				validarCampo(document.formulario.archivo_documento,isAny,true)	 )
			return true;
			else return false;
	}	

//Valida el formulario de actulizar y nuevo tramite
function validarFormularioTra()
	{
     		   if(validarCampo(document.formulario.nombre_tramite,isAny,false)&&							   
				validarCampo(document.formulario.url_tramite,isURLProtocol,true)&&			   
				validarCampo(document.formulario.descripcion_tramite,isAny,false)	 )
			return true;
			else return false;
	}	
function validarFormularioFaq()
	{
     		   if(validarCampo(document.formulario.pregunta_faq,isAny,false)&&							   
				validarCampo(document.formulario.respuesta_faq,isAny,false) )
			return true;
			else return false;
	}	
function validarFormularioEnl()
	{
     		   if(validarCampo(document.formulario.nombre_link,isAny,false)&&							   
				validarCampo(document.formulario.url_link,isURLUnProtocol,false) )
			return true;                                   
			else return false;
	}
function validarFormularioEncuesta()
	{
     		   if(validarCampo(document.formulario.nombre_encuesta,isAny,false)&&							   
				validarCampo(document.formulario.descripcion_encuesta,isAny,false) )
			return true;                                   
			else return false;
	}
function validarFormularioCaracEncuesta()
	{
     		   if(validarCampo(document.formulario.nombre_objetivo,isAny,false)&&							   
				validarCampo(document.formulario.descripcion_objetivo,isAny,false) )
			return true;                                   
			else return false;
	}
function validarFormularioPregunta()
	{
     		   if(validarCampo(document.formulario.numero_pregunta,isNumber,false)&&
	    		validarCampo(document.formulario.titulo_pregunta,isAny,false)&&
				validarCampo(document.formulario.codigo_escala,isAny,false) )
			return true;                                   
			else return false;
	}
function chgAccion ( Forms, Target ,  strAccion )
    {
        Forms.action = strAccion;
		Forms.target = Target
        Forms.submit();
    }