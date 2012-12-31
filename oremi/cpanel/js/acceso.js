// JavaScript Document
function validar() {
  if(ingreso.cuenta.value=="") {
     alert("Debe ingresar un nombre de usuario");
     limpiarCuenta();		   
  } else if(ingreso.passwo.value=="") {
            alert("Debe ingresar una contraseña");
            limpiarpasswo();
  } else ingreso.submit(); 		  
}
	

function limpiarCuenta() {
  ingreso.cuenta.value="";
  ingreso.cuenta.focus();
}
	 	 

function limpiarpasswo() {
  ingreso.passwo.value="";
  if(ingreso.cuenta.value=="") {
     ingreso.cuenta.focus();
  } else ingreso.passwo.focus();  	
}