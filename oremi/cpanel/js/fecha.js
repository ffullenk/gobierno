// JavaScript Document
function ValidaFecha2(cadena)
{
   var Admitidos = "0123456789-";
   //alert(cadena)

   // Si no hay nada escritos, no damos ningun mensaje de error.
   if(cadena == "")
      alert("Debe Ingresar una Fecha.");
     return false;
   
   // Primero validamos que la longitud sea de 10
   if (cadena.length < 10)
   {
      alert("La Fecha no está escrita correctamente.");
      return false;
   }
   
   // Validamos que solamente haya escrito simbolos adecuados
   for (var i=0;i<cadena.length;i++)
   {
      if (Admitidos.indexOf(cadena.substring(i,i+1))==-1)
      {
         alert("Formato no correcto."); 
		 return false;
      }
   }
   
   // Comprobamos posiciones 2 y 5, para ver que haya las "/"
   if((cadena.charAt(2) != "-") || (cadena.charAt(5) != "-"))
   {
      alert("La Fecha no está escrita correctamente. Proporcione una fecha del tipo dd-mm-aaaa");
      return false;
   }
   
   // Cogemos de la fecha los el valor del dia, mes y año
   var nDia = parseInt(cadena.substr(0, 2), 10);
   var nMes = parseInt(cadena.substr(3, 2), 10);
   var nAno = parseInt(cadena.substr(6));
   
   // Comprobamos mes si es correcto, y cogemos dias del mes
   var nRes = 0;
     switch (nMes)
     {     
       case 1:  nRes = 31; break;
       case 2:  nRes = 28; break;
       case 3:  nRes = 31; break;
       case 4:  nRes = 30; break;
       case 5:  nRes = 31; break;
       case 6:  nRes = 30; break;
       case 7:  nRes = 31; break;
       case 8:  nRes = 31; break;
       case 9:  nRes = 30; break;
       case 10: nRes = 31; break;
       case 11: nRes = 30; break;
       case 12: nRes = 31; break;
       default: alert("El Mes es incorrecto, revíselo.");
                      return false;
                      break;
   }
   
   // Validamos el dia segun mes que se haya escrito
   if(nDia > nRes)
   {
      alert("El Dia es incorrecto, revíselo.");
      return false;
   }
   
   // Por ultimo, validamos el año, que no sea muy raro
   if((nAno < 1900) || (nAno > 2100))
   {
      alert("El Año no parece correcto, revíselo.");

      return false;
   }
   
   return true;
}