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
		validarCampo(document.formulario.lstRegion,isSelectN99,false)&&
		validarCampo(document.formulario.lstProvincia,isSelectN99,false)&&
		validarCampo(document.formulario.lstComuna,isSelectN99,false)&&
		validarCampo(document.formulario.cuenta,isName,false)&&
		validarCampo(document.formulario.contrasenya,isAlphanumeric,false)&&
		validarCampo(document.formulario.clave,isAlphanumeric,false))
		return true;
	else return false;
}

function vldEvento() {
    if(validarCampo(document.formulario.evento,isSelectMas,false)&&
		validarCampo(document.formulario.ubicacion,isSelectMas,false)&&
		validarCampo(document.formulario.fecha,isDate,false)&&
		validarCampo(document.formulario.hora,isHora,false)&&
		validarCampo(document.formulario.titulo,isAny,false)&&
		validarCampo(document.formulario.resumen,isAny,false)&&
		validarCampo(document.formulario.observaciones,isAny,false))
	    return true;
	else return false;
}


function vldInforme() {
    if(validarCampo(document.formulario.titulo,isAny,false)&&
		validarCampo(document.formulario.fecha,isDate,false)&&
		validarCampo(document.formulario.observaciones,isAny,false))
	    return true;
	else return false;
}

function vldDec() {
    if(validarCampo(document.formulario.decision,isAny,false)&&
		validarCampo(document.formulario.tpdecision,isAny,false))
	    return true;
	else return false;
}

function vldPto() {
    if(validarCampo(document.formulario.identificar,isAny,false)&&
	validarCampo(document.formulario.ubicar,isAny,false)&&
	validarCampo(document.formulario.danar,isAny,false)&&
	validarCampo(document.formulario.estactual,isAny,false)&&
	validarCampo(document.formulario.solucionar,isAny,false)&&
	validarCampo(document.formulario.gestionar,isAny,false))
	    return true;
	else return false;
}
