<!--
/*
// ----------------------------------------------------------------------
//           FormCheq.js (c) ChaTo [www.chato.cl] 1998
//           basado en FormChek.js (c) Eric Krock 1997 Netscape Corp.
// ----------------------------------------------------------------------
// Rutinas para verificacion de formularios, basado en FormChek.js
// Parte del curso "TEJEDORES DEL WEB" http://www.TejedoresDelWeb.com/
// ---------------------------------------------------------------------- 

// Adaptadas
*/
var aceptar_vacio=false;
var digitos="0123456789";
var minusculas="abcdefghijklmnopqrstuvwxyzáéíóúñü";
var mayusculas="ABCDEFGHIJKLMNOPQRSTUVWXYZÁÉÍÓÚÑ";
var espacios=" \t\n\r";
var fonos="()-+ ";
var mMessage="Error: Debe suministrar el valor requerido para este campo de dato."
var pPrompt="Error: ";
var pAlphanumeric="Ingrese un texto que contenga solo letras y/o números.";
var pAlphabetic="Ingrese un texto que contenga solo letras.";
var pIntegerUnsigned="Ingrese un número entero sin signo.";
var pInteger="Ingrese un número entero.";
var pNumberPositive="Ingrese un número positivo.";
var pNumber="Ingrese un número.";
var pPhoneNumber="Ingrese un número de teléfono.";
var pEmail="Ingrese una dirección de correo electrónico válida.";
var pName="Ingrese un texto que contenga solo letras o espacios.";
var pAny="No puede dejar este espacio vacío."
var pRUT="Ingrese un RUT válido."
var pImage="Ingrese un archivo que sea GIF ó JPG."
var pFlash="Ingrese un archivo que sea Flash."
var pURLUnProtocol="Ingrese una URL sin el protocolo (http:// ó ftp://)."
var pURLProtocol="Ingrese una URL con el protocolo (http:// ó ftp://)."
var pDate="Ingrese una fecha válida (dd-mm-aaaa).";
var pHora="Ingrese una hora válida (HH:mm).";
var pSelectMas="Debe Seleccionar un valor de esta lista.";
var pFile="Ingrese un archivo válido."
/**
 * Determina si el 'campo' del formulario es del tipo de dato 'funcion'.
*/
function validarCampo(campo,funcion,vacio)
{
	var msg;
	if(validarCampo.arguments.length<3) vacio=aceptar_vacio;
	if(funcion==isAlphabetic) msg=pAlphabetic;
	if(funcion==isAlphanumeric) msg=pAlphanumeric;
	if(funcion==isIntegerUnsigned) msg=pIntegerUnsigned;
	if(funcion==isInteger) msg=pInteger;
	if(funcion==isNumberPositive) msg=pNumberPositive;
	if(funcion==isNumber) msg=pNumber;
	if(funcion==isEmail) msg=pEmail;
	if(funcion==isPhoneNumber) msg=pPhoneNumber;
	if(funcion==isName) msg=pName;
	if(funcion==isAny) msg=pAny;
	if(funcion==isRUT) msg=pRUT;
	if(funcion==isImage) msg=pImage;
	if(funcion==isFlash) msg=pFlash;
	if(funcion==isURLProtocol) msg=pURLProtocol;
	if(funcion==isURLUnProtocol) msg=pURLUnProtocol;
	if(funcion==isDate) msg=pDate;
	if(funcion==isHora) msg=pHora;
	if(funcion==isSelectMas) msg=pSelectMas;
	if(funcion==isFile) msg=pFile;
	if(vacio&&isEmpty(campo.value)) return true;
	if(!vacio&&isEmpty(campo.value)) return warnEmpty(campo);
	if(funcion(campo.value)) return true;
	else return warnInvalid(campo, msg);
}
/**
 * Determinar si el arreglo 's' es vacío.
*/
function isEmpty(s)
{
	return ((s==null)||(s.length==0));
}
/**
 * Muestra un mensaje al usuario que indica el error ocurrido.
*/
function warnEmpty(campo)
{
	campo.focus();
	alert(mMessage);
	return false;
}
/**
 * Muestra un mensaje al usuario que indica el error de ocurrido.
*/
function warnInvalid(campo,s)
{
	campo.focus();
	campo.select();
	alert(s);
	return false;
}
/**
 * Inicializa el arreglo 'n'.
*/
function makeArray(n)
{
	for(var i=1;i<=n;i++)
		this[i]=0;
	return this;
}
/**
 * Determina si el arreglo 's' es vacío o solo caracteres de espacio.
*/
function isWhitespace(s)
{
	var i;
	if(isEmpty(s)) return true;
	for(i=0;i<s.length;i++)
	{   
		var c=s.charAt(i);
		if(espacios.indexOf(c)==-1) return false;
	}
	return true;
}
/**
 * Determina si el caracter 'c' es una letra.
*/
function isLetter(c)
{
	return ((mayusculas.indexOf(c)!=-1)||(minusculas.indexOf(c)!=-1));
}
/**
 * Determina si el caracter 'c' es un dígito.
*/
function isDigit(c)
{
	return ((c>="0")&&(c<="9"));
}
/**
 * Determina si el caracter 'c' es una letra o un dígito.
*/
function isLetterOrDigit(c)
{
	return (isLetter(c)||isDigit(c));
}
/**
 * Determina si el string 's' es un número entero sin signo.
*/
function isIntegerUnsigned(s)
{
	var i;
	if(isEmpty(s))
		if(isIntegerUnsigned.arguments.length==1) return aceptar_vacio;
		else return (isIntegerUnsigned.arguments[1]==true);
	for(i=0;i<s.length;i++)
	{
		var c=s.charAt(i);
		if(!isDigit(c)) return false;
	}
	return true;
}
/**
 * Determina si el string 's' es un número entero con o sin signo.
*/
function isInteger(s)
{
	var i;
	if(isEmpty(s))
		if(isInteger.arguments.length==1) return aceptar_vacio;
		else return (isInteger.arguments[1]==true);
	for(i=0;i<s.length;i++)
	{
		var c=s.charAt(i);
		if(i!=0)
		{
			if(!isDigit(c)) return false;
		}
		else if(!isDigit(c)&&(c!="-")||(c=="+")) return false;
	}
	return true;
}
/**
 * Determina si el string 's' es un número entero o flotante con o sin signo positivo.
*/
function isNumberPositive(s)
{
	var i;
	var dotAppeared=false;
	if(isEmpty(s))
		if(isNumber.arguments.length==1) return aceptar_vacio;
		else return (isNumber.arguments[1]==true);
	for(i=0;i<s.length;i++)
	{
		var c=s.charAt(i);
		if(i!=0)
		{
			if(c==".")
			{
				if(!dotAppeared) dotAppeared=true;
				else return false;
			}
			else if(!isDigit(c)) return false;
		}
		else
		{
			if(c==".")
			{
				if(!dotAppeared) dotAppeared=true;
				else return false;
			}
			else if(!isDigit(c)&&(c=="-")) return false;
		}
	}
	return true;
}
/**
 * Determina si el string 's' es un número entero o flotante con o sin signo.
*/
function isNumber(s)
{
	var i;
	var dotAppeared=false;
	if(isEmpty(s))
		if(isNumber.arguments.length==1) return aceptar_vacio;
		else return (isNumber.arguments[1]==true);
	for(i=0;i<s.length;i++)
	{
		var c=s.charAt(i);
		if(i!=0)
		{
			if(c==".")
			{
				if(!dotAppeared) dotAppeared=true;
				else return false;
			}
			else if(!isDigit(c)) return false;
		}
		else
		{
			if(c==".")
			{
				if(!dotAppeared) dotAppeared=true;
				else return false;
			}
			else if(!isDigit(c)&&(c!="-")||(c=="+")) return false;
		}
	}
	return true;
}
/**
 * Determina si el string 's' tiene solo letras.
*/
function isAlphabetic(s)
{
	var i;
	if(isEmpty(s))
		if(isAlphabetic.arguments.length==1) return aceptar_vacio;
		else return (isAlphabetic.arguments[1]==true);
	for(i=0;i<s.length;i++)
	{
		var c=s.charAt(i);
		if(!isLetter(c)) return false;
	}
	return true;
}
/**
 * Determina si el string 's' tiene solo letras y números.
*/
function isAlphanumeric(s)
{
	var i;
	if(isEmpty(s))
		if(isAlphanumeric.arguments.length==1) return aceptar_vacio;
		else return (isAlphanumeric.arguments[1]==true);
	for(i=0;i<s.length;i++)
	{
		var c=s.charAt(i);
		if(!(isLetter(c)||isDigit(c))) return false;
	}
	return true;
}
/**
 * Determina si el string 's' tiene solo letras o espacios en blanco.
*/
function isName(s)
{
	if(isEmpty(s))
		if(isName.arguments.length==1) return aceptar_vacio;
		else return (isAlphabetic.arguments[1]==true);
	return (isAlphabetic(stripCharsInBag(s,espacios)));
}
/**
 * Determina si el string 's' tiene algo.
*/
function isAny(s)
{
	if(isEmpty(s)||isWhitespace(s)) return aceptar_vacio;
	return true;
}
/**
 * Determina si el string 's' es un número de teléfono válido.
*/
function isPhoneNumber(s)
{
	var modString;
	if(isEmpty(s))
		if(isPhoneNumber.arguments.length==1) return aceptar_vacio;
		else return (isPhoneNumber.arguments[1]==true);
	modString=stripCharsInBag(s,fonos);
	return (isInteger(modString));
}
/**
 * Determina si el string 's' es una dirección de correo válida.
*/
function isEmail(s)
{
	if(isEmpty(s))
		if(isEmail.arguments.length==1) return aceptar_vacio;
		else return (isEmail.arguments[1]==true);
	if(isWhitespace(s)) return false;
	var i=1;
	var sLength=s.length;
	while((i<sLength)&&(s.charAt(i)!="@")) i++;
	if((i>=sLength)||(s.charAt(i)!="@")) return false;
	else i+=2;
	while((i<sLength)&&(s.charAt(i)!=".")) i++;
	if((i>=sLength-1)||(s.charAt(i)!=".")) return false;
	else return true;
}
/**
 * Determinar si el string 's' es un RUT válido.
*/
function isRUT(s)
{
	var tamanio=s.length;
	var indice=s.indexOf('-');
	var guion=0;
	var i=tamanio-1;
	if(tamanio==0) return aceptar_vacio;
	if(indice==-1) return false;
	if(!isIntegerUnsigned(s.substring(0, indice-1))) return false;
	if(tamanio!=indice+2) return false;
	if(!isDigit(""+s.charAt(indice+1)+"")&&s.charAt(indice+1)!='K'&&s.charAt(indice+1)!='k') return false;
	if(s.charAt(indice+1)=='K'||s.charAt(indice+1)=='k') guion=10;
	else
	{
		while(s.charAt(i)!='-')
		{
			guion+=parseInt(""+s.charAt(i)+"");
			i--;
		}
		guion=11-guion;
	}
	switch (guion)
	{
		case 0: return(validateRUT('0',s));
		case 1: return(validateRUT('1',s));
		case 2: return(validateRUT('2',s));
		case 3: return(validateRUT('3',s));
		case 4: return(validateRUT('4',s));
		case 5: return(validateRUT('5',s));
		case 6: return(validateRUT('6',s));
		case 7: return(validateRUT('7',s));
		case 8: return(validateRUT('8',s));
		case 9: return(validateRUT('9',s));
		case 10: if(s.charAt(indice+1)=='K'||s.charAt(indice+1)=='k') return(validateRUT('k',s));
						 else return(validateRUT('1',s));
		case 11: return(validateRUT('0',s));
		default: return false;
	}
	return false;
}
/**
 * Determina si el guión 'c' es el que corresponde al RUT 's'.
*/
function validateRUT(c,s)
{
	var cont=1;
	var sum=0;
	var resto;
	var i=s.indexOf("-")-1;
	while(i>=0)
	{
		if(cont==7) cont=2;
		else cont++;
		sum+=parseInt(""+s.charAt(i)+"")*cont;
		i--;
	}
	resto=sum%11;
	if(c=='k')
	{
		if(resto==1) return true;
		else return false;
	}
	else
	{
		if(resto==parseInt(""+c+"")) return true;
		else
		{
			if(resto==10&&c=='1') return true;
			else return false;
		}
	}
}
/**
 * Determina si el string 's' es un archivo de imagen (.GIF ó .JPG).
*/
function isImage(s)
{
	if(isEmpty(s)) return aceptar_vacio;
	if(isWhitespace(s)) return false;
	var tamanio=s.length;
	var indice=s.indexOf('.');
	if(indice==-1) return false;
	if(indice==tamanio-1) return false;
	var extension=s.substring(indice+1,tamanio);
	if(extension.toUpperCase()!="GIF"&&extension.toUpperCase()!="JPG") return false;
	return true;
}

/**
 * Determina si el string 's' es un archivo de imagen (.SWF ó .swf).
*/
function isFlash(s)
{
	if(isEmpty(s)) return aceptar_vacio;
	if(isWhitespace(s)) return false;
	var tamanio=s.length;
	var indice=s.indexOf('.');
	if(indice==-1) return false;
	if(indice==tamanio-1) return false;
	var extension=s.substring(indice+1,tamanio);
	if(extension.toUpperCase()!="SWF") return false;
	return true;
}


/**
 * Determina si el string 's' es una dirección Web sin el protocolo (http:// ó ftp://).
*/
function isURLUnProtocol(s)
{
	if(isEmpty(s)) return aceptar_vacio;
	if(isWhitespace(s)) return false;
	if(s.substring(0,7).toUpperCase()=="HTTP://"||s.substring(0,6).toUpperCase()=="FTP://") return false;
	return true;
}
/**
 * Determina si el string 's' es una dirección Web con el protocolo (http:// ó ftp://).
*/
function isURLProtocol(s)
{
	if(isEmpty(s)) return aceptar_vacio;
	if(isWhitespace(s)) return false;
	if(s.substring(0,7).toUpperCase()!="HTTP://"&&s.substring(0,6).toUpperCase()!="FTP://") return false;
	return true;
}
/**
 * Determina si el string 's' (en formato 'dd-mm-aaaa') es una fecha válida.
*/
function isDate(s)
{
	var guiones=0;
	if(isEmpty(s)) return aceptar_vacio;
	if(isWhitespace(s)) return false;
	for(i=0;i<s.length;i++)
	{
		var c=s.charAt(i);
		if(!isDigit(c)&&c!='-') return false;
		else if(c=='-') guiones++;
	}
	if(guiones!=2) return false;
	var indice1=s.indexOf('-');
	var dia=s.substring(0,indice1);
	if(!isIntegerUnsigned(dia)) return false;
	var indice2=s.substring(indice1+1,s.length).indexOf('-')+indice1+1;
	var mes=s.substring(indice1+1,indice2);
	if(!isIntegerUnsigned(mes)) return false;
	var anio=s.substring(indice2+1,s.length);
	if(!isIntegerUnsigned(anio)) return false;
	if(!validateDate(dia,mes,anio)) return false;
	return true;
}


/**
 * Determina si la fecha es válida.
*/
function validateDate(dia, mes, anio)
{
	if(anio<1||anio>9999) return false;
	if(mes==1||mes==3||mes==5||mes==7||mes==8||mes==10||mes==12)
	{
		if(dia<1||dia>31) return false;
	}
	else
		if(mes==4||mes==6||mes==9||mes==11)
		{
			if(dia<1||dia>30) return false;
		}
		else
			if(mes==2)
			{
				if(anio%4==0)
				{
					if(dia<1||dia>29) return false;
				}
				else if(dia<1||dia>28) return false;
			}
			else return false;
	return true;
}
/**
 *
 * Funcion: Chequea que la Seleccion de la Lista sea > 0
 *
**/
function isSelectMas(s)
{
	if(isEmpty(s)) return aceptar_vacio;
	if(isWhitespace(s)) return false;
	selecciona=s.charAt(0);
	if(selecciona='') return false;
return true;
}

/**
 *
 * Funcion: Chequea que la Seleccion de la Lista sea <> -99
 *
**/
function isSelectN99(s)
{
	if(isEmpty(s)) return aceptar_vacio;
	if(isWhitespace(s)) return false;
	selecciona=s.substring(0,3);
	if(selecciona='-99') return false;
return true;
}

/**
 *
 *
**/
function isHora(s)
{

if (s=='') return false;
if (s.length>5) return false;
if (s.length!=5) return false;

a=s.charAt(0) //<=2
b=s.charAt(1) //<4
c=s.charAt(2) //:
d=s.charAt(3) //<=5

if ((a==2 && b>3) || (a>2)) return false;
if (d>5) return false;
if (c!=':') return false;
return true;

/*
   var dosptos=0;
   if(isEmpty(s)) return aceptar_vacio;
   if(isWhitespace(s)) return false;
   for(i=0;i<s.length;i++)
   {
	   var c=s.charAt(i);
	   if(!isDigit(c)&&c!=':') return false;
	   else if(c==':') dosptos++;
   }
   if(dosptos!=1) return false;
   var indice1=s.indexOf(':');
   var hora=s.substring(0,indice1);
   if(!isIntegerUnsigned(hora)) return false;
   var indice2=s.substring(indice1+1,s.length).indexOf(':')+indice1+1;
   var minutos=s.substring(indice1+1,indice2);
   if(!isIntegerUnsigned(minutos)) return false;
   if(!validateHora(hora,minutos)) return false;
   return true;
*/

}
function validateHora(hora, minutos)
{
	if(hora<0||hora>24) return false;
	if(minutos<1||minutos>59) return false;
	return true;
}

/**
 * Determina si el string 's' es un archivo válido (.DOC, .EXE, .HTML, .PDF, .RAR, .RPM, .TAR,
 * .TXT, .ZIP, .RTF o .PS).
*/
function isFile(s)
{
	if(isEmpty(s)) return aceptar_vacio;
	if(isWhitespace(s)) return false;
	var tamanio=s.length;
	var indice=s.indexOf('.');
	if(indice==-1) return false;
	if(indice==tamanio-1) return false;
	var extension=s.substring(indice+1,tamanio);
	if(extension.toUpperCase()!="DOC"&&extension.toUpperCase()!="EXE"&&extension.toUpperCase()!="HTML"&&extension.toUpperCase()!="PDF"&&extension.toUpperCase()!="RAR"&&extension.toUpperCase()!="RPM"&&extension.toUpperCase()!="TAR"&&extension.toUpperCase()!="TXT"&&extension.toUpperCase()!="ZIP"&&extension.toUpperCase()!="RTF"&&extension.toUpperCase()!="PS") return false;
	return true;
}
/**
 * Quita todos los caracteres de 'bag' en el string 's'.
*/
function stripCharsInBag(s,bag)
{
	var i;
	var returnString="";
	for(i=0;i<s.length;i++)
	{
		var c=s.charAt(i);
		if(bag.indexOf(c)==-1) returnString+=c;
	}
	return returnString;
}
/**
 * Quita todos los caracteres que no estan en 'bag' en el string 's'.
*/
function stripCharsNotInBag(s,bag)
{
	var i;
	var returnString="";
	for(i=0;i<s.length;i++)
	{
		var c=s.charAt(i);
		if(bag.indexOf(c)!=-1) returnString+=c;
	}
	return returnString;
}
/**
 * Quita todos los espacios en blanco del string 's'.
*/
function stripWhitespace(s)
{
	return stripCharsInBag(s,espacios);
}
/**
 * Cubre un bug en Netscape 2.0.2.
*/
function charInString(c,s)
{
	for(i=0;i<s.length;i++)
		if(s.charAt(i)==c) return true;
	return false;
}
/**
 * Quita todos los espacios en blanco que antecedan al string 's'.
*/
function stripInitialWhitespace(s)
{
	var i=0;
	while((i<s.length)&&charInString(s.charAt(i),espacios)) i++;
	return s.substring(i,s.length);
}
//-->