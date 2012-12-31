<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="javascript">

function AddRowsToTable()
{
var tbl = document.getElementById('tblSample');
var lastRow = tbl.rows.length;
var row = tbl.insertRow(lastRow);
var cellRight = row.insertCell(0);
cellRight.innerHTML="<input type='text' name='answers[]' id='answers' class='txtBoxStyle3' size='38'><a hre='#' onClick='DeleteRow(this)'> <img src='../Imagen/Examen_gif/del.gif' border='0'></a> <input type='radio' name='cierto' id='cierto'>";
}
function DeleteRow(x)
{
while (x.tagName.toLowerCase() !='tr')
{
if(x.parentElement)
x=x.parentElement;
else if(x.parentNode)
x=x.parentNode;
else
return;
}
var rowNum=x.rowIndex;
while (x.tagName.toLowerCase() !='table')
{
if(x.parentElement)
x=x.parentElement;
else if(x.parentNode)
x=x.parentNode;
else
return;
}
x.deleteRow(rowNum);
}

function RemoveRowFromTable(rowid) {
//alert("sadfs");
var tbl = document.getElementById(iteration);
//var lastRow = tbl.rows.length;
//if (lastRow > 1)
tbl.deleteRow(rowid);
}


function este()
{
for(var y = 0;y < document.forms.formulario.answers.length;y++)
{

document.formulario.answers[y].focus();

}
}
</script>
</head>

<body>
<form name="formulario" method="post" onSubmit="return verificar(this)" action="examen_pregunta_nuevo.php">
<table cellpadding="0" cellspacing="0" align="left" width="304" border="0">
<tr>
<td>
<table cellpadding="0" cellspacing="0" width="100%" align="center" border="0">
<tr class="texforms">
<td align="left">Respuestas:&nbsp;<input name="button" type=button onClick="AddRowsToTable();este();return false;" value="+" class="Buttonforms"></td>
</tr>
</table>
</td>
</tr>
<tr>
<td>

<table cellpadding="1" cellspacing="0" width="100%" id="tblSample" border="0">
<tr>
<td>
<input type="text" name="answers[]" id="answers" class="txtBoxStyle3" size="38">
<img src="../Imagen/Examen_gif/del.gif" border="0" >
<input type="radio" name="cierto" id="cierto">
</td>
</tr>
<tr>
<td>
<input type="text" name="answers[]" id="answers" class="txtBoxStyle3" size="38">
<img src="../Imagen/Examen_gif/del.gif" border="0" >
<input type="radio" name="cierto" id="cierto">
</td>
</tr>
</table>

</td>
</tr>
</table>

</form>
</body>
</html>