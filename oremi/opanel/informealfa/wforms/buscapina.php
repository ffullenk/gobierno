 <html>
<head>
<title>
P&aacute;gina con Javascript.
</title>
<script language="javascript">
<!--

function agregar()
{
nodoTabla = document.getElementById ("tabla1");
//if (totalFilas<10)
//{
for (renglones=0; renglones<=10; renglones++)
{
nodoFila = document.createElement ("tr");
nodoFila.id ="xx"+renglones;
for (celdas=0; celdas<=2; celdas++)
{
nodoCelda = document.createElement ("td");
valorTexto = document.createTextNode ("id: xx" + renglones + " Celda " + (celdas+1));
nodoCelda.appendChild (valorTexto);
nodoFila.appendChild(nodoCelda);
}
nodoTabla.appendChild (nodoFila);
}
}

function eliminar()
{
nodoTabla = document.getElementById ("tabla1");
nodoTabla.removeChild(nodoTabla.lastChild);
}
function eliminarrenglon(elemento) {
if(document.getElementById(elemento)){
document.getElementById('tabla1').removeChild(document.getElementById(elemento));
}else{
alert("No se encuentra el elemento con el id:"+elemento);
}
}

//-->
</script>
</head>
<body onLoad="agregar()">
<table align="center" width="450" border="2">
<tbody id="tabla1">
<tr id="este" onClick="eliminarrenglon('este')">
<td>ss</td>
<td>ss</td>
<td>ss</td>
</tr>
</tbody>
</table>

<br>

<form>
<input type="button" value="Eliminar fila" onClick="eliminar();">
<input name="button" type="button" onClick="eliminarrenglon('xx3');" value="Eliminar renglon3 creado dinamicamente">
<input name="button2" type="button" onClick="eliminarrenglon('este');" value="Eliminar renglon1 creado via codigo">
</form>
</body>
</html>