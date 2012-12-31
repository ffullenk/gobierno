// JavaScript Document
function chequea_form_ususario()
{
   if(document.usuario.nombre.value == "")
   {
      alert("Error... Debe Especificar el nombre.")
	  document.usuario.nombre.focus();
   }
   else if(document.usuario.email.value == "")
   {
      alert('Error... Debe especificar una cuenta de correo electronico')
      document.usuario.email.focus();
   }
   else if(document.usuario.rut.value == "")
   {
      alert('Error... Debe especificar un rut valido')
      document.usuario.rut.focus();
   }
   else if(document.usuario.clave.value == "")
   {
      alert('Error... Debe especificar una clave')
      document.usuario.clave.focus();
   }
   else if(document.usuario.reclave.value == "")
   {
      alert('Error... Debe volver a digitar la clave')
      document.usuario.reclave.focus();
   }
   else if(document.usuario.tipo.value == "-")
   {
      alert('Error... Debe especificar el tipo de Cuenta')
      document.usuario.tipo.focus();
   }
   else if(document.usuario.estado.value == "-")
   {
      alert('Error... Debe especificar el Estado de la Cuenta')
      document.usuario.estado.focus();
   }
   else if(validarEmail(document.usuario.email.value)== false) {
      alert('Error... Debe especificar una cuenta de correo electronico')
      document.usuario.email.focus();
   }
   else if(document.getElementById("clave").value==document.getElementById("reclave").value)
   {
      if( Valida_Rut( document.getElementById("rut") )==true ) {
          form.submit();
	  } else { alert("Debe Ingresar un RUT Valido"); }
   }
   else
   {
      alert("La Nueva Contraseña y Reingreso deben ser identicas");
   }
}

function chequea_form_tipoevento() 
{
  if(document.tipoevento.tipoeventonombre.value == "")
   {
      alert("Error... Debe Especificar el nombre.")
	  document.tipoevento.tipoeventonombre.focus();
   }
   else if(document.tipoevento.estado.value == "-")
   {
      alert('Error... Debe especificar el Estado de la Cuenta')
      document.tipoevento.estado.focus();
   }
   else {
      form.submit();
   }
}


function chequea_form_tipounidad() 
{
  if(document.tipounidad.tipounidadnombre.value == "")
   {
      alert("Error... Debe Especificar el nombre.")
	  document.tipounidad.tipounidadnombre.focus();
   }
   else if(document.tipounidad.estado.value == "-")
   {
      alert('Error... Debe especificar el Estado de la Cuenta')
      document.tipounidad.estado.focus();
   }
   else {
      form.submit();
   }
}


function chequea_form_infrapub() 
{
  if(document.infrapub.infranombre.value == "")
   {
      alert("Error... Debe Especificar el nombre.")
	  document.infrapub.infranombre.focus();
   }
   else if(document.infrapub.estado.value == "-")
   {
      alert('Error... Debe especificar el Estado de la Cuenta')
      document.infrapub.estado.focus();
   }
   else {
      form.submit();
   }
}


function chequea_form_vialidad() 
{
  if(document.vialidad.nombre.value == "")
   {
      alert("Error... Debe Especificar el nombre.")
	  document.vialidad.nombre.focus();
   }
   else if(document.vialidad.estado.value == "-")
   {
      alert('Error... Debe especificar el Estado de la Cuenta')
      document.vialidad.estado.focus();
   }
   else {
      form.submit();
   }
}


function chequea_form_infraotra() 
{
  if(document.infraotra.nombre.value == "")
   {
      alert("Error... Debe Especificar el nombre.")
	  document.infraotra.nombre.focus();
   }
   else if(document.infraotra.estado.value == "-")
   {
      alert('Error... Debe especificar el Estado de la Cuenta')
      document.infraotra.estado.focus();
   }
   else {
      form.submit();
   }
}


function chequea_form_datosevento() 
{
  if(document.datosevento.tipoevento.value == "-")
   {
      alert("Error... Debe Seleccionar el Tipo de Evento.")
	  document.datosevento.tipoevento.focus();
   }
   else if(document.datosevento.atributo.value == "")
   {
      alert('Error... Debe especificar el Atributo.')
      document.datosevento.atributo.focus();
   }
   else if(document.datosevento.tipounidad.value == "-")
   {
      alert("Error... Debe Seleccionar el Tipo de Unidad.")
	  document.datosevento.tipounidad.focus();
   }
   else if(document.datosevento.estado.value == "-")
   {
      alert('Error... Debe especificar el Estado de la Cuenta')
      document.datosevento.estado.focus();
   }
   else {
      form.submit();
   }
}


function Valida_Rut( Objeto ){
var tmpstr = "";
var intlargo = Objeto.value
 if (intlargo.length > 0){ 	
    
    	crut = Objeto.value
    	largo = crut.length;
    
    if ( largo < 2 )
    {
        alert('rut invalido')
        Objeto.focus()
        return false;
    }
    for ( i=0; i < crut.length ; i++ )
                if ( crut.charAt(i) != ' ' && crut.charAt(i) != '.' && crut.charAt(i) != '-' )
                {
                tmpstr = tmpstr + crut.charAt(i);
                }
            rut = tmpstr;
    crut=tmpstr;
    largo = crut.length;

    if ( largo > 2 )
        rut = crut.substring(0, largo - 1);
    else
        rut = crut.charAt(0);

    dv = crut.charAt(largo-1);

    if ( rut == null || dv == null )
            return 0;

    var dvr = '0';
    suma = 0;
    mul  = 2;

    for (i= rut.length-1 ; i >= 0; i--)
    {
        suma = suma + rut.charAt(i) * mul;
        if (mul == 7)
            mul = 2;
        else
            mul++;
    }


    res = suma % 11;
    if (res==1)
        dvr = 'k';
    else if (res==0)
        dvr = '0';
    else
    {
        dvi = 11-res;
        dvr = dvi + "";
    }


    if ( dvr != dv.toLowerCase() )
    {
	alert('El Rut Ingresado es Invalido')
	/*Objeto.focus()*/
    return false;
    }
	/*alert('El Rut Ingresado es Correcto!')
	Objeto.focus()*/
    return true;
  }   
}


/* */
function validarEmail(valor) {
if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(valor)){
/*alert("La direccion de email ” + valor + ” es correcta.")*/
return (true)
} else {
alert("La direccion de email es incorrecta.");
return (false);
}
}
