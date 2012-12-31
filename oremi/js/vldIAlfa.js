<!--
function VldIAlfa1() {
  if (document.form.fecha.value == 'dd/mm/aaaa' || document.form.fecha.value == '')
  {
     document.form.fecha.focus();
     alert("Debe Introducir una Fecha ..!!!.");
     return false;
  }

  if (document.form.hora.value == 'HH:MM' || document.form.hora.value == '')
  {
     document.form.hora.focus();
     alert("Debe Introducir una Hora ..!!!.");
     return false;
  }

  if (document.form.ubicacion.value == '--')
  {
     document.form.ubicacion.focus();
     alert("Debe Seleccionar una Ubicación donde se Registró el Evento ..!!!.");
     return false;
  }

  if (document.form.infalfa_describe.value == '')
  {
     document.form.infalfa_describe.focus();
     alert("Debe Introducir una Breve Descripción del Evento Producido ..!!!.");
     return false;
  }

  if (document.form.infalfa_dp_afec.value == '')
  {
     document.form.infalfa_dp_afec.focus();
     alert("Si No Existen Personas Afectadas, Al Menos Introduzca el Valor Cero (0).");
     return false;
  }

  if (document.form.infalfa_dp_dam.value == '')
  {
     document.form.infalfa_dp_dam.focus();
     alert("Si No Existen Personas Damnificadas, Al Menos Introduzca el Valor Cero (0).");
     return false;
  }

  if (document.form.infalfa_dp_her.value == '')
  {
     document.form.infalfa_dp_her.focus();
     alert("Si No Existen Personas Heridas, Al Menos Introduzca el Valor Cero (0).");
     return false;
  }

  if (document.form.infalfa_dp_muer.value == '')
  {
     document.form.infalfa_dp_muer.focus();
     alert("Si No Existen Personas Muertas, Al Menos Introduzca el Valor Cero (0).");
     return false;
  }

  if (document.form.infalfa_dp_desp.value == '')
  {
     document.form.infalfa_dp_desp.focus();
     alert("Si No Existen Personas Desaparecidas, Al Menos Introduzca el Valor Cero (0).");
     return false;
  }

  if (document.form.infalfa_dp_albe.value == '')
  {
     document.form.infalfa_dp_albe.focus();
     alert("Si No Existen Personas Albergadas, Al Menos Introduzca el Valor Cero (0).");
     return false;
  }


  if (document.form.infalfa_dv_dmeh.value == '')
  {
     document.form.infalfa_dv_dmeh.focus();
     alert("Si No Existe Daño Menor Habitable en Viviendas, Al Menos Introduzca el Valor Cero (0).");
     return false;
  }

  if (document.form.infalfa_dv_dman.value == '')
  {
     document.form.infalfa_dv_dman.focus();
     alert("Si No Existe Daño Mayor No Habitable en Viviendas, Al Menos Introduzca el Valor Cero (0).");
     return false;
  }

  if (document.form.infalfa_dv_dirr.value == '')
  {
     document.form.infalfa_dv_dirr.focus();
     alert("Si No Existe Viviendas Destruidas Irrecuperables, Al Menos Introduzca el Valor Cero (0).");
     return false;
  }

  if (document.form.infalfa_dv_noev.value == '')
  {
     document.form.infalfa_dv_noev.focus();
     alert("Si No Existe Viviendas No Evaluadas, Al Menos Introduzca el Valor Cero (0).");
     return false;
  }


  if (document.form.infalfa_servicios.value == '')
  {
     document.form.infalfa_servicios.focus();
     alert("Debe Especificar El Estado de los Servicios Básicos, Infraestructura y Otros ...!!");
     return false;
  }

  if (document.form.infalfa_montodanos.value == '')
  {
     document.form.infalfa_montodanos.focus();
     alert("Si No Existe un Monto Estimativo en Daños, Al Menos Introduzca un Valor Cero (0).");
     return false;
  }

  if (document.form.respuesta.value == '--')
  {
     document.form.respuesta.focus();
     alert("Debe Seleccionar una Nivel de Respuesta Para El Evento ..!!!.");
     return false;
  }

  if (document.form.infalfa_observa.value == '')
  {
     document.form.infalfa_observa.focus();
     alert("Debe Introducir una Breve Observación del Evento Producido ..!!!.");
     return false;
  }

  else
  {
    document.form.submit();
    return true;
  }

}




function VldIAlfa2() {
  if (document.form.infalfa_accione.value == '')
  {
     document.form.infalfa_accione.focus();
     alert("Debe Introducir una Acción y/o Solución ..!!!.");
     return false;
  }

  if (document.form.infalfa_tiempo.value == '')
  {
     document.form.infalfa_tiempo.focus();
     alert("Debe Señalar el Tiempo de Restablecimiento para la Acción Ingresada ..!!!.");
     return false;
  }

  else
  {
    document.form.submit();
    return true;
  }

}



function VldIAlfa3() {
  if (document.form.tiporecurso.value == '--')
  {
     document.form.tiporecurso.focus();
     alert("Debe Seleccionar Un Tipo de Recurso ..!!!.");
     return false;
  }

  if (document.form.infalfa_recurso.value == '')
  {
     document.form.infalfa_recurso.focus();
     alert("Debe Especificar una Descripción para el Tipo de Recurso Seleccionado ..!!!.");
     return false;
  }

  if (document.form.infalfa_cantrec.value == '')
  {
     document.form.infalfa_cantrec.focus();
     alert("Debe Especificar una Cantidad ..!!!.");
     return false;
  }

  if (document.form.infalfa_montorec.value == '')
  {
     document.form.infalfa_montorec.focus();
     alert("Debe Especificar un Monto Estimativo para el Recurso ..!!!.");
     return false;
  }

  else
  {
    document.form.submit();
    return true;
  }

}



function VldIAlfa4() {
  if (document.form.infalfa_elemento.value == '')
  {
     document.form.infalfa_elemento.focus();
     alert("Debe Especificar un Tipo de Elemento ..!!!.");
     return false;
  }

  if (document.form.infalfa_motivonec.value == '')
  {
     document.form.infalfa_motivonec.focus();
     alert("Debe Especificar el Motivo por el cual realiza la Necesidad de este elemento.");
     return false;
  }

  if (document.form.infalfa_cantnec.value == '')
  {
     document.form.infalfa_cantnec.focus();
     alert("Debe Especificar la Cantidad que Requiere ..!!!.");
     return false;
  }

  else
  {
    document.form.submit();
    return true;
  }

}


//-->
