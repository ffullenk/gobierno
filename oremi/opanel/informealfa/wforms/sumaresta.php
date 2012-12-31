<html>
<head>
<title>
    Tablas
</title>
<script language=javaScript1.2>
function restar() {
    var miTabla = document.getElementById("cuerpoTabla");
    var i = 0;
    do
        if (miTabla.rows[i].getElementsByTagName("input")[0].checked == true)
            miTabla.deleteRow(i);
        else
            i ++;
    while (miTabla.rows.length != i)
}

function suma()    {
    var miTabla = document.getElementById("cuerpoTabla");
    var fila = document.createElement("tr");
    var celda1 = document.createElement("td");
    var celda2 = document.createElement("td");
    celda1.innerHTML = "hola b" + (miTabla.getElementsByTagName("tr").length + 1).toString();
    celda2.innerHTML = "hola c" + (miTabla.getElementsByTagName("tr").length + 1).toString() + "<input type=checkbox>";
    fila.appendChild(celda1);
    fila.appendChild(celda2);
    miTabla.appendChild(fila);
}


</script>
</head>
<body style="color:blue" > 
<script>
document.write(document.body.style[0]);
</script>
<table id=unaTabla border=1>
<tbody id=cuerpoTabla>
     <tr id=a1>
          <td id=b1>hola b1</td>
          <td id=c1>hola c1<input type=checkbox></td>
     </tr>
     <tr id=a2>
          <td id=b2>hola b2</td>
          <td id=c2>hola c2<input type=checkbox></td>
     </tr>
</table>
<button onclick=restar()>Eliminar Fila</button>
<button onclick=suma()>Agregar Fila</button>

</body> 
</html>