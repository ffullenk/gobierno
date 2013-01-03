//pre = N. dias antes del 1ro del mes
//max = N. dias del mes
var pre = new Array(21);
var max = new Array(21);
pre[9]= 4; max[9]= 30;	//	09/2000
pre[10]=6; max[10]=31;	//	10/2000
pre[11]=2; max[11]=30;	//	11/2000
pre[12]=4; max[12]=31;	//	12/2000
pre[13]=0; max[13]=31;	//	01/2001
pre[14]=3; max[14]=28;	//	02/2001
pre[15]=3; max[15]=31;	//	03/2001
pre[16]=6; max[16]=30;	//	04/2001
pre[17]=1; max[17]=31;	//	05/2001
pre[18]=4; max[18]=30;	//	06/2001
pre[19]=6; max[19]=31;	//	07/2001
pre[20]=2; max[20]=31;	//	08/2001
pre[21]=5; max[21]=30;	//	09/2001
pre[22]=0; max[22]=31;	//	10/2001
pre[23]=3; max[23]=30;	//	11/2001
pre[24]=5; max[24]=31;	//	12/2001
pre[25]=1; max[25]=31;  //      01/2002
pre[26]=4; max[26]=28;  //      02/2002
pre[27]=4; max[27]=31;  //      03/2002
pre[28]=0; max[28]=30;  //      04/2002
pre[29]=2; max[29]=31;  //      05/2002
pre[30]=5; max[30]=30;  //      06/2002
pre[31]=0; max[31]=31;  //      07/2002
pre[32]=3; max[32]=31;  //      08/2002
pre[33]=6; max[33]=30;  //      09/2002
pre[34]=1; max[34]=31;  //      10/2002
pre[35]=4; max[35]=30;  //      11/2002
pre[36]=6; max[36]=31;  //      12/2002
pre[37]=2; max[37]=31;  //      01/2003
pre[38]=5; max[38]=28;  //      02/2003
pre[39]=5; max[39]=31;  //      03/2003
pre[40]=1; max[40]=30;  //      04/2003
pre[41]=3; max[41]=31;  //      05/2003
pre[42]=6; max[42]=30;  //      06/2003
pre[43]=1; max[43]=31;  //      07/2003
pre[44]=4; max[44]=31;  //      08/2003
pre[45]=0; max[45]=30;  //      09/2003
pre[46]=2; max[46]=31;  //      10/2003
pre[47]=5; max[47]=30;  //      11/2003
pre[48]=0; max[48]=31;  //      12/2003

//f_ida, f_vuelta: fechas ida y vuelta en arreglo: [0] Año, [1] Mes, [2] Día
var f_ida    = new Array(3);
var f_vuelta = new Array(3);
var f_temp = new Array(3);

//Mes minimo y maximo seleccionable
var min_mes = 34;
var max_mes = 46;

// mes_sel es el mes activo, contado secuencialmente desde Enero del 2000.
var mes_sel;
var now = new Date();

// Modificar el valor de cal con ruta de acceso absoluta a directorio con imagenes
// de calendario
function nombre_img(img_name) {
	var src = "calendario/";
	return src+img_name
}

function nombre_cal(num_mes) {
	mth = num_mes-(Math.floor(num_mes/12)*12);
	if(mth==0)mth=12;
	an = Math.floor((num_mes-1)/12)+2000;
	if ((''+mth).length==1) mth='0'+mth;	
	return nombre_img('n'+mth+an+'.gif')
}

function check_fecha(fecha) {
  // Validar y separar fecha en componentes
  if((''+fecha).length < 10) {
	// Numero caracteres
  	alert('Mal formato en fecha');
	return false;
  }
  
  f_temp[0]=0;f_temp[1]=0;f_temp[2]=0;
  f_temp = fecha.split("/",3);
  
  if((f_temp[2]<2001)||(f_temp[2]>2003)) {
	alert('Año fuera de rango: ' + f_temp[2]);
	return false;
  }
  
  if ((f_temp[1]<1)||(f_temp[1]>12)) {
	alert('Mes fuera de rango: '+f_temp[1]);
	return false;
  }
  
  if ((f_temp[0]<1)||(f_temp[0]>max[f_temp[1]])) {
	alert('Dia fuera de rango: '+f_temp[0]);
	return false;
  }
  return true;
}
  
// Verificar correcion de fechas (ida antes que vuelta, etc.)
function check_formulario(fecha) {
  if (document.tripflow.A_City.selectedIndex == 0) {
	alert('Debe ingresar ciudad de destino.');
	document.tripflow.A_City.focus();
	return false;
	}	






//  if (eval(document.tripflow.D_City.selectedIndex) == eval(document.tripflow.A_City.selectedIndex-1)) {       alert ('La ciudad de origen debe ser distinta a la de destino');
  //     return false;
  //      }

  // Chequear fecha de vuelta
  if(document.tripflow.vuelta.value) {
  if(!check_fecha(document.tripflow.vuelta.value)){
        document.tripflow.vuelta.focus();
        document.tripflow.vuelta.select();
        return false;
        }
  f_vuelta[0]=f_temp[0];f_vuelta[1]=f_temp[1];f_vuelta[2]=f_temp[2];
        }

  // Chequear fecha de ida
  if(!check_fecha(document.tripflow.ida.value)){
        document.tripflow.ida.focus();
        document.tripflow.ida.select();
        return false;
        }
  f_ida[0]=f_temp[0];f_ida[1]=f_temp[1];f_ida[2]=f_temp[2];

  t_ida = parseInt(f_ida[0])+(parseFloat(f_ida[1])*100)+(parseFloat(f_ida[2])*10);
  t_vuelta = parseInt(f_vuelta[0])+(parseFloat(f_vuelta[1])*100)+(parseFloat(f_vuelta[2])*10);

  // Verificar Vuelta sea igual o posterior a Ida
 // if(document.tripflow.vuelta.value) {
 // if(t_vuelta <  t_ida) {
 //     alert('Vuelta debe ser posterior a fecha de Ida');
 //     return false;
  //}
//}

  // Verificar minimo de 72hrs antes de Ida
  t_year = now.getYear();
  if(t_year<1000) {
        if(t_year<100) t_year+=2000;
        else t_year+=1900;
  }
  t_now = parseInt(now.getDate())+(parseFloat(now.getMonth()+1)*100)+(parseFloat(t_year*10));
  //if(t_ida <  t_now) {
  //    alert('Ida debe ser en mas de 72 horas a contar de hoy');
//      return false;
 // }

  // Llenar campos hidden

  // Campos PaxType
  //for(var i=1;i<=document.tripflow.nAdults.value;i++){
  //    var px = eval('document.tripflow.PaxType'+i);
  //    px.value = 'ADT';
  //}

  // D_Month y D_Day
  document.tripflow.D_Month.value = f_ida[2]+""+f_ida[1];
  document.tripflow.D_Day.value = ""+f_ida[0];

  // R_Month y R_Day
  document.tripflow.R_Month.value = f_vuelta[2]+""+f_vuelta[1];
  document.tripflow.R_Day.value = ""+f_vuelta[0];
  //document.tripflow.R_Date.value=document.tripflow.ida.value;
  //document.tripflow.D_Date.value=document.tripflow.ida.value;
  // Enviar formulario
  return true;
}

//Seleccion un dia y rellena la cajita apropiada
function selday(dy) {
 if ((dy>pre[mes_sel]) && (dy<=(pre[mes_sel]+max[mes_sel]))) {
  sel_day = dy-pre[mes_sel];

  year_sel = 2000+Math.floor(mes_sel/12);
  mes = mes_sel % 12;
  if (mes==0) {
        mes = 12;
        year_sel-=1;
  }

  // Asignar valor
  if (cajita==document.tripflow.ida) {
        f_ida[0] = year_sel
        f_ida[1] = mes
        f_ida[2] = sel_day
  } else {
        f_vuelta[0] = year_sel
        f_vuelta[1] = mes
        f_vuelta[2] = sel_day
  }

  if ((''+mes).length==1) mes='0'+mes
  dia = sel_day
  if ((''+dia).length==1) dia='0'+dia

  cajita.value = dia+'/'+(mes)+'/'+(year_sel);
  
  MM_showHideLayers('Layer-ida','','hide','Layer-regreso','','hide','Layer-hideall','','hide');
  
 } else alert('Fecha invalida.  Por favor seleccione otra.');
}


function selday2(dy) {
 if ((dy>pre[mes_sel]) && (dy<=(pre[mes_sel]+max[mes_sel]))) {
  sel_day = dy-pre[mes_sel];

  year_sel = 2000+Math.floor(mes_sel/12);
  mes = mes_sel % 12;
  if (mes==0) {
        mes = 12;
        year_sel-=1;
  }

  // Asignar valor
  if (cajita==document.tripflow.D_Date) {
        f_ida[0] = year_sel
        f_ida[1] = mes
        f_ida[2] = sel_day
  } else {
        f_vuelta[0] = year_sel
        f_vuelta[1] = mes
        f_vuelta[2] = sel_day
  }

  if ((''+mes).length==1) mes='0'+mes
  dia = sel_day
  if ((''+dia).length==1) dia='0'+dia

  cajita.value = dia+'/'+(mes)+'/'+(year_sel);
  cajita=document.tripflow.R_Date;
 } else alert('Fecha incorrecta.\n Por favor, seleccione otra.');
}
//Cambia el mes actual
function selmes(offset) {
 if((mes_sel+offset>=min_mes) && (mes_sel+offset<=max_mes)) {
  mes_sel = mes_sel+offset
  MM_swapImage('calendarioida','',nombre_cal(mes_sel),0)
  MM_swapImage('calendarioregreso','',nombre_cal(mes_sel),0)
 } else alert('Mes fuera de rango.')
}



// Verificar correcion de fechas (ida antes que vuelta, etc.)
function check_formulario2(formulario) {


if (document.tripflow.D_Date.value) {

        if ((document.tripflow.D_Date.value==document.tripflow.R_Date.value)&&(formulario.SearchType[1].checked || formulario.SearchType[2].checked)) {
                alert ('Si usted desea vuelos ida y vuelta para la misma fecha, debe seleccionar la opción Mejor Horario');
                formulario.SearchType[0].checked=true;
                return false;
                }
        }
if ((formulario.SearchType[1].checked || formulario.SearchType[2].checked)&&(!formulario.COS[0].checked)) {
     //   alert ('Si usted desea una clase distinta a turista, debe seleccionar la opción Mejor Horario');
        alert ('Para una clase distinta a turista, se usará la opción de Mejor Horario');
        formulario.SearchType[0].checked=true;
        return false;
}

if (formulario.D_City.selectedIndex==-1) {
        alert('Debe seleccionar una ciudad de origen.');
        formulario.D_City.focus();
        return false;
}

if (formulario.A_City.selectedIndex==-1) {
        alert('Debe seleccionar una ciudad de destino.');
        formulario.A_City.focus();
        return false;
}

if ((eval(document.tripflow.nAdults.value) + eval(document.tripflow.nChilds.value)) > 9)
{       
        alert ("No puede comprar más de 9 boletos de forma simultánea");
        return false;
}

if (document.tripflow.nAdults.value < document.tripflow.nInfants.value)
{
        alert ("Debe viajar por lo menos un adulto por cada infante");
        return false;
}


// Chequear fecha de vuelta
if(document.tripflow.R_Date.value) {
        if(!check_fecha(document.tripflow.R_Date.value)){return false;}
        f_vuelta[0]=f_temp[0];f_vuelta[1]=f_temp[1];f_vuelta[2]=f_temp[2];
}

  // Chequear fecha de ida
  if(!check_fecha(document.tripflow.D_Date.value)) {return false;}
//  f_ida[0]=f_temp[0];f_ida[1]=f_temp[1];f_ida[2]=f_temp[2];

//  t_ida = parseInt(f_ida[0])+(parseFloat(f_ida[1])*100)+(parseFloat(f_ida[2])*10);
//  t_vuelta = parseInt(f_vuelta[0])+(parseFloat(f_vuelta[1])*100)+(parseFloat(f_vuelta[2])*10);


// Si ida=vuelta y busqueda=valuepricer => buscar por horarios





  // Verificar Vuelta sea igual o posterior a Ida
 // if(document.tripflow.vuelta.value) {
 // if(t_vuelta <  t_ida) {
 //     alert('Vuelta debe ser posterior a fecha de Ida');
 //     return false;
  //}
//}

  // Verificar minimo de 72hrs antes de Ida
//  t_year = now.getYear();
//  if(t_year<1000) {
//      if(t_year<100) t_year+=2000;
//      else t_year+=1900;
//  }
//  t_now = parseInt(now.getDate())+(parseFloat(now.getMonth()+1)*100)+(parseFloat(t_year*10));
  //if(t_ida <  t_now) {
  //    alert('Ida debe ser en más de 72 horas a contar de hoy');
//      return false;
 // }

  // Llenar campos hidden

  // Campos PaxType
  //for(var i=1;i<=document.tripflow.nAdults.value;i++){
  //    var px = eval('document.tripflow.PaxType'+i);
//      px.value = 'ADT';
 // }

  // D_Month y D_Day
 // document.tripflow.D_Month.value = f_ida[2]+""+f_ida[1];
 // document.tripflow.D_Day.value = ""+f_ida[0];

  // R_Month y R_Day
 // document.tripflow.R_Month.value = f_vuelta[2]+""+f_vuelta[1];
 // document.tripflow.R_Day.value = ""+f_vuelta[0];
   // Enviar formulario
if (document.tripflow.SearchType[2].checked){alert ('La búsqueda con fechas flexibles evalúa cientos de combinaciones de fechas y vuelos para encontrar el más ecónomico. Este proceso puede tardar algunos minutos.')};

  return true;
}
var cajita




