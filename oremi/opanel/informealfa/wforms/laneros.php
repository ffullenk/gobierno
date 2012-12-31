<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Documento sin t&iacute;tulo</title>
<script language="javascript">
function addNewRow(){
var TABLE = document.getElementById("base");
var TROW = document.getElementById("example");

var content = TROW.getElementsByTagName("td");
var newRow = TABLE.insertRow(-1);
newRow.className = TROW.attributes['class'].value;
insertLOselect(content,newRow);

var newRow2 = TABLE.insertRow(-1);
newRow2.className = TROW.attributes['class'].value;
//window.alert(content);
copyRow(content,newRow2);
}
function removeLastRow() {
var TABLE = document.getElementById("base");
if(TABLE.rows.length > 2) {
TABLE.deleteRow(TABLE.rows.length-1);
TABLE.deleteRow(TABLE.rows.length-1);
}
}

function appendCell(Trow, txt) {
var newCell = Trow.insertCell(Trow.cells.length)
newCell.innerHTML = txt
}

function copyRow(content,Trow) {
var cnt = 0;
for (; cnt < content.length; cnt++) {
appendCell(Trow, content[cnt].innerHTML);
}
}

function insertLOselect(content,Trow) {
var cnt = 0;
for (; cnt < content.length-1; cnt++) {
appendCell(Trow, '&nbsp;');
}
str = '<td>';
str += ' <select id="LO" class="combo" name="logical[]">';
str += ' <option value="and">and</option>';
str += ' <option value="or">or</option>';
str += ' </select>';
str += '</td>';
appendCell(Trow,str);
}
function eliminaFila(elemento) {
elemento = document.getElementById("elemento");
elemento.parentNode.removeChild(elemento);
}
</script>
</head>

<body>
<table border="0" id="base" width="100%">
<tr class="celda">
<td colspan="3">Adicionar o Remover campos por criterio</td>
<td>
<input type="button" class="boton" value="[+]" onClick="addNewRow(event)" alt="Adicionar">&nbsp;
<input type="button" class="boton" value="[-]" onClick="removeLastRow(event)" alt="Remover">
</td>
</tr>
<tr id="example" class="celda">
<td>
<select class="combo" name="fields[]" id="field">
<option value="{$source}.{$campNomb}">{$source}.{$campNomb}</option>
</select>
</td>
<td>
<select class="combo" name="operator[]" id="opera">
<option value="=">=</option>
<option value="<>"><></option>
<option value=">">></option>
<option value="<"><</option>
<option value=">=">>=</option>
<option value="<="><=</option>
<option value="in">in</option>
<option value="notin">not in</option>
<option value="like">like</option>
</select>
</td>
<td>
<input name="values[]" type="text" size="50" id="value">
<input type="hidden" name="btnAction" value="next">
</td>
<td>
<input type="button" class="boton" value="[+]" onClick="addNewRow(event)" alt="Adicionar">&nbsp;
<input type="button" class="boton" value="[-]" onClick="eliminaFila('este')" alt="EliminarFila">

</td>
</tr>
</table></body>
</html>
