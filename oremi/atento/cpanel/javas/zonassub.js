function pc_nuevoAjax()
{ 
    /* Crea el objeto AJAX. Esta funcion es generica para cualquier utilidad de este tipo, por
    lo que se puede copiar tal como esta aqui */
    var xmlhttp=false;
    try
    {
        // Creacion del objeto AJAX para navegadores no IE
        xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
    }
    catch(e)
    {
        try
        {
            // Creacion del objet AJAX para IE
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        catch(E)
        {
            if (!xmlhttp && typeof XMLHttpRequest!='undefined') xmlhttp=new XMLHttpRequest();
        }
    }
    return xmlhttp; 
}

// Declaro los selects que componen el documento HTML. Su atributo ID debe figurar aqui.
var pc_listadoSelects=new Array();
pc_listadoSelects[0]="ejercicio";
pc_listadoSelects[1]="zonas";


function pc_buscarEnArray(array, dato)
{
    // Retorna el indice de la posicion donde se encuentra el elemento en el array o null si no se encuentra
    var x=0;
    while(array[x])
    {
        if(array[x]==dato) return x;
        x++;
    }
    return null;
}

function pc_cargaContenido(idSelectOrigen)
{
    // Obtengo la posicion que ocupa el select que debe ser cargado en el array declarado mas arriba
    var posicionSelectDestino=pc_buscarEnArray(pc_listadoSelects, idSelectOrigen)+1;
    // Obtengo el select que el usuario modifico
    var selectOrigen=document.getElementById(idSelectOrigen);
    // Obtengo la opcion que el usuario selecciono
    var opcionSeleccionada=selectOrigen.options[selectOrigen.selectedIndex].value;
    // Si el usuario eligio la opcion "Elige", no voy al servidor y pongo los selects siguientes en estado "Selecciona opcion..."
    if(opcionSeleccionada==0)
    {
        var x=posicionSelectDestino, selectActual=null;
        // Busco todos los selects siguientes al que inicio el evento onChange y les cambio el estado y deshabilito
        while(pc_listadoSelects[x])
        {
            selectActual=document.getElementById(pc_listadoSelects[x]);
            selectActual.length=0;
            
            var nuevaOpcion=document.createElement("option"); nuevaOpcion.value=0; nuevaOpcion.innerHTML="Select Option...";
            selectActual.appendChild(nuevaOpcion);    selectActual.disabled=true;
            x++;
        }
    }
    // Compruebo que el select modificado no sea el ultimo de la cadena
    else if(idSelectOrigen!=pc_listadoSelects[pc_listadoSelects.length-1])
    {
        // Obtengo el elemento del select que debo cargar
        var idSelectDestino=pc_listadoSelects[posicionSelectDestino];
        var selectDestino=document.getElementById(idSelectDestino);
        // Creo el nuevo objeto AJAX y envio al servidor el ID del select a cargar y la opcion seleccionada del select origen
        var ajax=pc_nuevoAjax();
        ajax.open("GET", "zonassub.php?select="+idSelectDestino+"&opcion="+opcionSeleccionada+"&sid="+Math.random(), true);
        ajax.onreadystatechange=function() 
        { 
            if (ajax.readyState==1)
            {
                // Mientras carga elimino la opcion "Selecciona Opcion..." y pongo una que dice "Cargando..."
                selectDestino.length=0;
                var nuevaOpcion=document.createElement("option"); nuevaOpcion.value=0; nuevaOpcion.innerHTML="Seleccione...";
                selectDestino.appendChild(nuevaOpcion); selectDestino.disabled=true;    
            }
            if (ajax.readyState==4)
            {
                selectDestino.parentNode.innerHTML=ajax.responseText;
            } 
        }
        ajax.send(null);
    }
}