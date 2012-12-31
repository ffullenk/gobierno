/***************************************************************************************
* Nombre Archivo : funciones.js
* Descripción	 : Archivo que contiene las principales funciones que seran utilizadas 
*                  en el sistema
* F. Creacion	 : 28 de Noviembre del 2003
* Autor 		 : Enzo Lepe
****************************************************************************************/
/***************************************************************************************
* Listado de funciones en el Archivo
* 1.- imprimir()
* 2.- popup(url,ancho,alto,scroll)
* 3.- chgAccion( Forms ,  strAccion )
* 4.- enviar(Forms) 
* 5.- validarFormulario()
/****************************************************************************************
/***************************************************************************************
* Nombre Funcion : imprimir
* Descripciob    : Funcion que imprime la pagina actual
* Autor          : Enzo Lepe
* Fecha          : 28 de Noviembre 2003      
* Parametros     :
* Retorno        :
*declaracion     :<script language="JavaScript" src="javas/funciones.js"></script> 
*llamada         :<a href="javascript:imprimir()">Imprimir</a>
/***************************************************************************************/
function imprimir()
   {
     var ventana=window;
     ventana.print();
   }   
/***************************************************************************************
* Nombre Funcion : ver_ayuda(n)
* Descripciob    : Mustra la capa
* Autor          : Enzo Lepe
* Fecha          : 12 de Noviembre 2004      
* Parametros     : n -contien el id de la capa
/***************************************************************************************/
 function ver_ayuda(n)
 {
  eval('document.all.layer'+n+'.style.visibility=\"visible\"');	 
 }
/***************************************************************************************
* Nombre Funcion : ocultar_ayuda(n)
* Descripciob    : Mustra la capa
* Autor          : Enzo Lepe
* Fecha          : 12 de Noviembre 2004      
* Parametros     : n -contien el id de la capa
/***************************************************************************************/
 function ocultar_ayuda(n)
 {
  eval('document.all.layer'+n+'.style.visibility=\"hidden\"');
 }
/***************************************************************************************
* Nombre Funcion : popup
* Descripciob    : Funcion que despliega una ventana hija
* Autor          : Enzo Lepe
* Fecha          : 28 de Noviembre 2003      
* Parametros     :
* Retorno        :
*declaracion     :<script language="JavaScript" src="javas/funciones.js"></script> 
*llamada         :<a href="javascript:popup('prueba2.html',300,300,'no')">Abrir Ventana</a>
/***************************************************************************************/
function popup(url,ancho,alto,scroll)
   {
	 newWin=window.open(url,"popup","resize=0,toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars="+scroll+",resizable=0,width="+ancho+",height="+alto+",top=0,left=100");			   
	 return;
	 newWin.focus();
   }
/***************************************************************************************
* Nombre Funcion : chgAccion
* Descripciob    : Funcion que cambia el action de el formulario
* Autor          : Enzo Lepe
* Fecha          : 02 de diciembre 2003      
* Parametros     :
* Retorno        :
*declaracion     :<script language="JavaScript" src="javas/funciones.js"></script> 
*llamada         :onclick="chgAccion( this.form , Target, 'ingresar.php');
/***************************************************************************************/
 function chgAccion ( Forms, Target ,  strAccion )
    {
        Forms.action = strAccion;
		Forms.target = Target
        Forms.submit();
    }
/***************************************************************************************
* Nombre Funcion : enviar
* Descripciob    : Funcion que Enviar el formulario
* Autor          : Enzo Lepe
* Fecha          : 09 de diciembre 2003      
* Parametros     :
* Retorno        :
*declaracion     :<script language="JavaScript" src="javas/funciones.js"></script> 
*llamada         :enviar(nombre_de_la_forma)
/***************************************************************************************/
 function enviar(Forms)
    { 
	  Forms.submit();
    }   
/***************************************************************************************
* Nombre Funcion : validarFormulario
* Descripciob    : Funcion que valida el ingreso de datos en el formulario de registro.
* Autor          : Gerardo Rosales
* Fecha          : diciembre 2003
* Parametros     :
* Retorno        :
*declaracion     :<script language="JavaScript" src="javas/funciones.js"></script> 
/***************************************************************************************/	
function validarFormulario()
	{
	   if(validarCampo(document.formulario.destino,isEmail,false)&&
		 validarCampo(document.formulario.cc,isEmail,true)&& 
		 validarCampo(document.formulario.asunto,isAny,false)&&
		 validarCampo(document.formulario.mensaje,isAny,false))
		return true;
		else return false;
	}		
	
function validarFormularioNoticia()
	{
	   if(validarCampo(document.form.titulo,isAny,false)&&
		  validarCampo(document.form.resumen,isAny,false)&&
		  validarCampo(document.form.fuente,isAny,true)&&
		  validarCampo(document.form.enlace,isURLProtocol,true)&&
		  validarCampo(document.form.autor,isName,false)&&
		  validarCampo(document.form.cabecera_titulo,isAny,false)&&				  
		  validarCampo(document.form.cabecera_resumen,isAny,true))		  
		return true;
		else return false;				
	}			

function validarFormularioEmpleado()	
    {
			if(validarCampo(document.formulario.rut_persona,isRUT,false)&&
			validarCampo(document.formulario.nombres_persona,isName,false)&&
			 validarCampo(document.formulario.paterno_persona,isName,false)&&
			 validarCampo(document.formulario.materno_persona,isName,true)&&
			 validarCampo(document.formulario.direccion_persona,isAny,false)&& 
			 validarCampo(document.formulario.email_persona,isEmail,false)&&
			 validarCampo(document.formulario.telefono_persona,isNumber,true)&&
			 validarCampo(document.formulario.celular_persona,isNumber,true)&& 
			 validarCampo(document.formulario.fax_persona,isNumber,true))
		return true;
		else return false;
	}
	
function validarFormularioaddEmpleado()	
    {
			if(validarCampo(document.formulario.rut_persona,isRUT,false)&&
			validarCampo(document.formulario.nombres_persona,isName,false)&&
			 validarCampo(document.formulario.paterno_persona,isName,false)&&
			 validarCampo(document.formulario.materno_persona,isName,true)&&
			 validarCampo(document.formulario.direccion_persona,isAny,false)&& 
			 validarCampo(document.formulario.email_persona,isEmail,false)&&
			 validarCampo(document.formulario.telefono_persona,isNumber,true)&&
			 validarCampo(document.formulario.celular_persona,isNumber,true)&& 
			 validarCampo(document.formulario.user_persona,isName,false)&&
			 validarCampo(document.formulario.password_persona,isAlphanumeric,false)&&
			 validarCampo(document.formulario.confirmarpassword_persona,isAlphanumeric,false))
		return true;
		else return false;
	}	

function vldformUsuario()
	{
	if(validarCampo(document.formulario.nombres_persona,isName,false)&&
			 validarCampo(document.formulario.email_persona,isEmail,false)&&
			 validarCampo(document.formulario.user_persona,isName,false)&&
			 validarCampo(document.formulario.password_persona,isAlphanumeric,false)&&
			 validarCampo(document.formulario.confirmarpassword_persona,isAlphanumeric,false))
		return true;
		else return false;
	}


function vldformNewUs()
	{
	if(validarCampo(document.formulario.nombres_persona,isName,false)&&
			 validarCampo(document.formulario.email_persona,isEmail,false)&&
			 validarCampo(document.formulario.user_persona,isName,false)&&
			 validarCampo(document.formulario.password_persona,isAlphanumeric,false)&&
			 validarCampo(document.formulario.confirmarpassword_persona,isAlphanumeric,false))
		return true;
		else return false;
	}



function vldformCate()
	{
	if(validarCampo(document.formulario.nombres_cate,isName,false))
		return true;
		else return false;
	}

function vldformForo()
	{

		if(validarCampo(document.formulario.nombre_foro,isName,false))
		return true;
	else return false;

	}

function vldformInst()
	{

		if(validarCampo(document.formulario.nombre_institucion,isName,false))
		return true;
	else return false;

	}


function vldformTema()
	{
	if(validarCampo(document.formulario.nombre_tema,isName,false))
	return true;
	else return false;
	}


function VldFormUs()
{
	if ((QForm.nacion.value == "0")&&(QForm.otropais.value == "")) {
			/* es Extrajero */
			if(validarCampo(document.QForm.otropais,isName,false)&&
			 validarCampo(document.QForm.nombres,isName,false)&&
			 validarCampo(document.QForm.paterno,isName,false)&&
			 validarCampo(document.QForm.materno,isName,true)&&
			 validarCampo(document.QForm.email,isEmail,false)&&
			 validarCampo(document.QForm.mensaje,isAny,false))
				return true;
				else return false;
	} else {			/* es CHILENO */
			if(validarCampo(document.QForm.nombres,isName,false)&&
			 validarCampo(document.QForm.paterno,isName,false)&&
			 validarCampo(document.QForm.materno,isName,true)&&
			 validarCampo(document.QForm.rut,isRUT,false)&&
			 validarCampo(document.QForm.email,isEmail,false)&&
			 validarCampo(document.QForm.mensaje,isAny,false))
				return true;
				else return false;
	}
}