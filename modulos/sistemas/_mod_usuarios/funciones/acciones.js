function mostrar(forma)
{
	forma.mostrar_ingreso.value=1;
	forma.opR.value=1;
	forma.action="administrador.php";
	forma.submit();
}
function buscar(forma)
{	
	if(document.getElementById("frm_busqueda").value==""){ alert ("Debes Ingresar valores en el campo de busqueda"); 	return;}
	if(forma.sel_busqueda.selectedIndex==0){	alert('Debe elegir un Filtro'); 		return;	}
	forma.ac_buscar.value=1;
	forma.opB.value=1;

	forma.action="administrador.php?opB=1";
	forma.submit();
}
function a_permisos(forma)
{
  forma.a_permiso.value=1;
  forma.action="gr_usuarios.php";
  forma.submit();
}
function cambios(forma)
{	
	forma.ac_cambios.value=1;
	forma.action="gr_usuarios.php";
	forma.submit();
}

function deseleccionar_todo(){ 
   for (i=0;i<document.form1.elements.length;i++) 
      if(document.form1.elements[i].type == "checkbox")	
         document.form1.elements[i].checked=0 
}

function seleccionar_todo(){ 
   for (i=0;i<document.form1.elements.length;i++) 
      if(document.form1.elements[i].type == "checkbox")	
         document.form1.elements[i].checked=1 
} 

function cancelar(forma,valor1,valor2)
{
  forma.action="administrador.php?id_m="+valor1+"&id_sub="+valor2;
  forma.submit();
}
function ingreso(forma)
{
	forma.a_ingresar.value=1;
	forma.action="gr_usuarios.php";
	forma.submit();
}
function u_eliminar(forma)
{
	forma.a_eliminar.value=1;
	forma.action="gr_usuarios.php";
	forma.submit();
	
}
