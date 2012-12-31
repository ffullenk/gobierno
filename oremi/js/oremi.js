<!--
var monthNames = new makeArray(12);
monthNames[0] = "Enero";
monthNames[1] = "Febrero";
monthNames[2] = "Marzo";
monthNames[3] = "Abril";
monthNames[4] = "Mayo";
monthNames[5] = "Junio";
monthNames[6] = "Julio";
monthNames[7] = "Agosto";
monthNames[8] = "Septiembre";
monthNames[9] = "Octubre";
monthNames[10] = "Noviembre";
monthNames[11] = "Diciembre";

var dayNames = new makeArray(7);
dayNames[0] = "Domingo";
dayNames[1] = "Lunes";
dayNames[2] = "Martes";
dayNames[3] = "Mi&eacute;rcoles";
dayNames[4] = "Jueves";
dayNames[5] = "Viernes";
dayNames[6] = "S&aacute;bado";

var now = new Date();
var year = now.getYear();

if (year < 2000) year = year + 1900;

function makeArray(len)
{
for (var i = 0; i < len; i++) this[i] = null;
this.length = len;
}
//-->
