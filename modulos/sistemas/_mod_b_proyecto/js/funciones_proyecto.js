
function volver(forma,valor1,valor2)
{
	
	forma.action="administrador.php?id_m="+valor1+"&id_sub="+valor2;
	forma.submit();
}
function enviarArreglo(forma)
{
	forma.action="informe_archivo.php?";
	forma.submit();
}

function comprueba_extension(forma, valor) { 
   extensiones_permitidas = new Array(".xls",".xlsx"); 
   archivo = document.getElementById(valor).value;
   mierror = ""; 
    if (!archivo) { 
   mierror = "No has seleccionado ningún archivo"; 
   }else{ 
      extension = (archivo.substring(archivo.lastIndexOf("."))).toLowerCase(); 
      //compruebo si la extensión está entre las permitidas 
      permitida = false; 
      for (var i = 0; i < extensiones_permitidas.length; i++) { 
         if (extensiones_permitidas[i] == extension) { 
         permitida = true; 
         break; 
         } 
       }
      if (!permitida) { 
         mierror = "Comprueba la extensión de los archivos a subir. \nSólo se pueden subir solo archivos excel: " + extensiones_permitidas.join(); 
      	}else{ 
         	 //submito! 
         document.getElementById('ingreso').value=1;
		 forma.submit();
        return 1;
      	} 
   } 
   //si estoy aqui es que no se ha podido submitir 
   alert (mierror); 
   return 0; 
}
function campos(forma)
{
	if (document.getElementById('fecha_i').value==""){alert("Debes Ingresar Una Fecha");	return;	}
	if (document.getElementById('codigobip').value==""){alert("Debes Ingresar el Codigo Bip");	return;	}
	if (document.getElementById('nom').value==""){alert("Debes Ingresar el nombre del proyecto");	return;	}
    if(forma.s_tipo.selectedIndex==0){	alert('Debe elegir un Tipo'); 		return;	}
	if(forma.s_com.selectedIndex==0){	alert('Debe elegir una Comuna'); 		return;	}
	if(forma.s_etapa.selectedIndex==0){	alert('Debe elegir una Etapa'); 		return;	}
	if(forma.s_sector.selectedIndex==0){	alert('Debe elegir un Sector'); 		return;	}
	if(forma.s_tecnica.selectedIndex==0){	alert('Debe elegir una Unidad Técnica'); 		return;	}
	if(forma.s_provicion.selectedIndex==0){	alert('Debe elegir un Provición'); 		return;	}
	if (document.getElementById('costoT').value==""){alert("Debes Ingresar el Costo Total del proyecto");	return;	}
	if (document.getElementById('costoFNDR').value==""){alert("Debes Ingresar el costo FNDR del proyecto");	return;	}


}
function enviando(forma)
{
	document.getElementById('nuevo_ingresar').value=1;	
	forma.action="gr_proyecto.php";
	forma.submit(); 
}
function update(forma)
{
	document.getElementById('ac_cambios').value=1;
	forma.action ="gr_proyecto.php";
	forma.submit();
	
}
function eliminar(forma)
{
	document.getElementById("Eliminar").value =1;
	forma.action ="gr_proyecto.php";
	forma.submit();
}
function checkForm(frm) { 
		text = frm.frm_descripcion.value; 
		var output = "";
		for (var i = 0; i < text.length; i++) {
		if ((text.charCodeAt(i) == 13) && (text.charCodeAt(i + 1) == 10)) {
		i++;
		output += "</p><p>";
		} else {
		output += text.charAt(i);
		   }
		}
		var temp = "";
		for (var i = 0; i < output.length; i++) {
		var ch = output.substring(i, i+1); // first character
		if (ch == '\`') 
		{  
			ch = " ";
		}
		if (ch == '\"') 
		{  
			ch = " ";
		}
		temp += ch;		
		}
		var principio=temp.substring(0,3);
		if (principio != '<p>')
			temp ="<p>" + temp; 	
		var final =temp.substring(temp.length-4,temp.length);
		if (final != '</p>')
			temp +="</p>";
		frm.frm_descripcion.value=temp;
		return true;	
	}


function enviar_imagen(forma,valor1,valor2)
{	
    forma.action="gr_fotografias.php?id_m="+valor1+"&id_sub="+valor2;
	forma.submit();
}

function cancelar_imagen(forma,valor1,valor2)
{	
    forma.editar_imagen.value="cancelar";
    forma.action="gr_fotografias.php?id_m="+valor1+"&id_sub="+valor2;
	forma.submit();
}

function enviar_busqueda(forma)
{
    if(forma.frm_mes.selectedIndex==0)
	{
		alert('Debe elegir un Mes');
		return;
	}
	if(forma.frm_ano.selectedIndex==0)
	{
		alert('Debe elegir una año');
		return;
	}
	forma.submit();
}
function adjuntar_fotografia(forma,valor1,valor2)
{	
    if(forma.file_foto1.value=='')
	{
	   alert("Debe Adjuntar ó Seleccionar Fotografías");
	   return;
	}
	if(forma.frm_piefoto1.value=='')
	{
		alert("Debe Ingresar la Descripción Fotografías");
	    return;
	}
    forma.action="gr_fotografias.php?id_m="+valor1+"&id_sub="+valor2;
	forma.submit();
}

function adjuntar_video(forma,valor1,valor2)
{	
    if(forma.file_video.value=='')
	{
	   alert("Debe Adjuntar ó Seleccionar Archivo de Video");
	   return;
	}
	if(forma.frm_descripcion_video.value=='')
	{
		alert("Debe Ingresar la Descripción del Video");
	    return;
	}
    forma.action="gr_video_not.php?id_m="+valor1+"&id_sub="+valor2;
	forma.submit();
}

function adjuntar_dcto(forma,valor1,valor2)
{	
    if(forma.file_dcto.value=='')
	{
	   alert("Debe Adjuntar ó Seleccionar Archivo el Dcto");
	   return;
	}
	if(forma.frm_descripcion_dcto.value=='')
	{
		alert("Debe Ingresar la Descripción del Dcto");
	    return;
	}
    forma.action="gr_dcto_not.php?id_m="+valor1+"&id_sub="+valor2;
	forma.submit();
}

function Selecciono(form)
{
    form.select();
}

function bloque(d1, d2) 
{
	  if (d1 != '') DoDiv(d1);
	  if (d2 != '') DoDiv(d2);
}

function DoDiv(id) 
{
	  var item = null;
	  if (document.getElementById) 
	  {
		item = document.getElementById(id);
	  } 
	  else if (document.all)
	  {
		item = document.all[id];
	  } 
	  else if (document.layers)
	  {
		item = document.layers[id];
	  }
	  if (!item) 
	  {
	  }
	  else if (item.style) 
	  {
		if (item.style.display == "none")
		{ 
		    item.style.display = ""; 
		}
		else 
		{
		    item.style.display = "none"; 
		}
	  }
	  else
	  { 
	      item.visibility = "show"; 
	  }
}

function window_status(message) 
{
	window.status = message;
}
function buscar(forma,valor1,valor2)
{
	if(document.getElementById("frm_buscar").value==""){alert("Debes Ingresar un valor a buscar");		return;}
	if(forma.se_filtro.selectedIndex==0){	alert('Debe elegir un Filtro de Busqueda'); 		return;	}
	forma.ac_buscar.value=1;
	var buscar=forma.frm_buscar.value;
	var filtro=forma.se_filtro.value;
	forma.action = "frm_proyectos.php?op=3&list=1&frm_buscar="+buscar+"&se_filtro="+filtro+"&id_m="+valor1+"&id_sub="+valor2+"&ac_buscar=1";
	forma.submit();
	
}


