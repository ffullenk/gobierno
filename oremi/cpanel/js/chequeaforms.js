function imprimir()
   {
     var ventana=window;
     ventana.print();
   }   

function ver_ayuda(n)
 {
  eval('document.all.layer'+n+'.style.visibility=\"visible\"');	 
 }

 function ocultar_ayuda(n)
 {
  eval('document.all.layer'+n+'.style.visibility=\"hidden\"');
 }

function popup(url,ancho,alto,scroll)
   {
	 newWin=window.open(url,"popup","resize=0,toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars="+scroll+",resizable=0,width="+ancho+",height="+alto+",top=0,left=100");			   
	 return;
	 newWin.focus();
   }

 function chgAccion ( Forms, Target ,  strAccion )
    {
        Forms.action = strAccion;
		Forms.target = Target
        Forms.submit();
    }

function enviar(Forms)
    { 
	  Forms.submit();
    }   

function vldAlerta() {
    if(validarCampo(document.formulario.fecha,isDate,false)&&
		validarCampo(document.formulario.hora,isHora,false)&&
		validarCampo(document.formulario.zona,isAny,false)&&
		validarCampo(document.formulario.alerta,isSelectMas,false)&&
		validarCampo(document.formulario.extension,isAny,false)&&
		validarCampo(document.formulario.variable,isSelectMas,false)&&
		validarCampo(document.formulario.situacion,isAny,false)&&
		validarCampo(document.formulario.orientacion,isAny,false))
	    return true;
	else return false;
}


function vldEncargado() {
	if(validarCampo(document.formulario.nombres,isName,false)&&
		validarCampo(document.formulario.apellidos,isName,false)&&
		validarCampo(document.formulario.email,isEmail,false)&&
		validarCampo(document.formulario.cargos,isSelectMas,false)&&
		validarCampo(document.formulario.fono1,isNumber,false)&&
		validarCampo(document.formulario.fono2,isNumber,true)&&
		validarCampo(document.formulario.celu1,isNumber,false)&&
		validarCampo(document.formulario.celu2,isNumber,true)&&
		validarCampo(document.formulario.fax,isNumber,true)&&
		validarCampo(document.formulario.lstRegion,isSelectN99,false)&&
		validarCampo(document.formulario.lstProvincia,isSelectN99,false)&&
		validarCampo(document.formulario.lstComuna,isSelectN99,false)&&
		validarCampo(document.formulario.cuenta,isName,false)&&
		validarCampo(document.formulario.contrasenya,isAlphanumeric,false)&&
		validarCampo(document.formulario.clave,isAlphanumeric,false))
		return true;
	else return false;
}

function vldFunc() {
	if(validarCampo(document.formulario.nombres,isName,false)&&
		validarCampo(document.formulario.email,isEmail,false)&&
		validarCampo(document.formulario.cuenta,isName,false)&&
		validarCampo(document.formulario.clave,isAlphanumeric,false)&&
		validarCampo(document.formulario.repite,isAlphanumeric,false))
		return true;
	else return false;
}

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
			validarCampo(document.formulario.apellidos_persona,isName,false)&&
			validarCampo(document.formulario.empresa_persona,isName,true)&&
			validarCampo(document.formulario.direccion_persona,isAny,false)&&
			validarCampo(document.formulario.email_persona,isEmail,false)&&
			validarCampo(document.formulario.web_persona,isURLProtocol,true)&&
			validarCampo(document.formulario.fono_persona,isNumber,false)&&
			validarCampo(document.formulario.celu_persona,isNumber,true)&&
			 validarCampo(document.formulario.user_persona,isName,false)&&
			 validarCampo(document.formulario.password_persona,isAlphanumeric,false)&&
			 validarCampo(document.formulario.confirmarpassword_persona,isAlphanumeric,false))
		return true;
		else return false;
	}