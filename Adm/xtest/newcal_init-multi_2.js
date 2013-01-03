 function init(){

 cajita = document.tripflow.ida
 
  dateInMs = now.getTime();
 // dateInMs += (((60*1000)*60)*24)*4 // Agregar 3 dias, expresado en milisegundos
  now.setTime(dateInMs);
 year_sel = now.getYear();
 if(year_sel<1000) {
	if(year_sel<100) year_sel+=2000;
  	else year_sel+=1900;
  }
 mes_sel = ((year_sel-2000)*12)+now.getMonth()+1;

 //if (document.tripflow.ida.value.length==0) {
// 	selday(pre[mes_sel]+now.getDate());
//}

 // Cargar imagenes de calendario iniciales (mes actual)
 MM_swapImage('calendarioida','',nombre_cal(mes_sel),0)
 MM_swapImage('calendarioregreso','',nombre_cal(mes_sel),0)

 f_ida[0]=0;f_ida[1]=0;f_ida[2]=0;
 f_vuelta[0]=0;f_vuelta[1]=0;f_vuelta[2]=0;
 
 // cajita = document.formautos.ida
//  if (document.formautos.ida.value.length==0) {
// 	selday(pre[mes_sel]+now.getDate());
//  }

//  cajita = document.formhoteles.ida
//  if (document.formhoteles.ida.value.length==0) {
// 	selday(pre[mes_sel]+now.getDate());
//  }
}


