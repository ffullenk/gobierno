<!--
function ValidaEvento()
{
  if(document.form.tipoevento.value== "--")
  {
    document.form.tipoevento.focus();
    alert('Debe Seleccionar un Tipo de Evento ... !!!');
    return false;
  }

  if (document.form.fecha.value == 'dd/mm/aaaa' || document.form.fecha.value == '')
  {
     document.form.fecha.focus();
     alert("Debe Introducir una Fecha ... !!!");
     return false;
  }

  if(document.form.describeevento.value== "")
  {
    document.form.describeevento.focus();
    alert('Debe Suministrar una breve descripción del Evento ... !!!');
    return false;
  }

  if(document.form.ubicacion.value== "--")
  {
    document.form.ubicacion.focus();
    alert('Debe Seleccionar la Ubicación donde aconteció el Evento ... !!!');
    return false;
  }

  if(document.form.resumen.value== "")
  {
    document.form.resumen.focus();
    alert('Debe Suministrar un breve resumen para el Evento ... !!!');
    return false;
  }

  else
  {
    document.form.submit();
    return true;
  }
}
//-->
