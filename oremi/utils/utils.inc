<?
function quitar($mensaje)
{
   $mensaje = str_replace("<","&lt;",$mensaje);
   $mensaje = str_replace(">","&gt;",$mensaje);
   $mensaje = str_replace("\'","&#39;",$mensaje);
   $mensaje = str_replace('\"',"&quot;",$mensaje);
   $mensaje = str_replace("\\\\","&#92",$mensaje);

   return $mensaje;
}


function VeTipoEvento() {
  global $IdTpEv;
  global $NoEven;

  $con_tipoevento = mysql_query("SELECT *  FROM TipoEvento") or Die("Imposible Realizar Consulta a Tabla TipoEvento en estos Momentos ... Ha ocurrido un error inesperado.. !!! ");

  $xpos = 0;
  $IdTpEv[$xpos] = "--";
  $NoEven[$xpos] = " Seleccione un Tipo de Evento ";
  $xpos++;

  while ($row=mysql_fetch_object($con_tipoevento)) {
     $IdTpEv[$xpos] = $row->idtipoevento;
     $NoEven[$xpos] = $row->tipoevento;
     $xpos++;
  }
  mysql_free_result($con_tipoevento);
  echo('<select name="tipoevento" size="1" tabindex="1" class="eninput">');
  for($ypos=0; $ypos < $xpos; $ypos++)
  {
    echo "<OPTION value='".$IdTpEv[$ypos]."'>$NoEven[$ypos]</OPTION>";
  }
  echo "</SELECT>";
}

function VeUbicacion() {
  global $IdUbic;
  global $NoUbic;

  $con_ubicacion = mysql_query("SELECT *  FROM Ubicacion") or Die("Imposible Realizar Consulta a Tabla Ubicacion en estos Momentos ... Ha ocurrido un error inesperado.. !!! ");

  $xpos = 0;
  $IdUbic[$xpos] = "--";
  $NoUbic[$xpos] = " Seleccione una Ubicación ";
  $xpos++;

  while ($row=mysql_fetch_object($con_ubicacion)) {
     $IdUbic[$xpos] = $row->idubicacion;
     $NoUbic[$xpos] = $row->ubicacion;
     $xpos++;
  }
  mysql_free_result($con_ubicacion);
  echo('<select name="ubicacion" size="1" class="eninput">');
  for($ypos=0; $ypos < $xpos; $ypos++)
  {
    echo "<OPTION value='".$IdUbic[$ypos]."'>$NoUbic[$ypos]</OPTION>";
  }
  echo "</SELECT>";
}


function VeCapRespuesta() {
  global $IdCap;
  global $NoCap;

  $con_cap = mysql_query("SELECT *  FROM CapRespuesta") or Die("Imposible Realizar Consulta a Tabla CapRespuesta en estos Momentos ... Ha ocurrido un error inesperado.. !!! ");

  $xpos = 0;
  $IdCap[$xpos] = "--";
  $NoCap[$xpos] = " Seleccione un Nivel ";
  $xpos++;

  while ($row=mysql_fetch_object($con_cap)) {
     $IdCap[$xpos] = $row->idcapresp;
     $NoCap[$xpos] = $row->nivel;
     $xpos++;
  }
  mysql_free_result($con_cap);
  echo('<select name="respuesta" size="1" class="eninput">');
  for($ypos=0; $ypos < $xpos; $ypos++)
  {
    echo "<OPTION value='".$IdCap[$ypos]."'>$NoCap[$ypos]</OPTION>";
  }
  echo "</SELECT>";
}


function VeTipoRecurso() {
  global $IdRec;
  global $NoRec;

  $con_rec = mysql_query("SELECT *  FROM TipoRecurso") or Die("Imposible Realizar Consulta a Tabla TipoRecurso en estos Momentos ... Ha ocurrido un error inesperado.. !!! ");

  $xpos = 0;
  $IdRec[$xpos] = "--";
  $NoRec[$xpos] = " Seleccione un Tipo de Recurso ";
  $xpos++;

  while ($row=mysql_fetch_object($con_rec)) {
     $IdRec[$xpos] = $row->idtiporecurso;
     $NoRec[$xpos] = $row->recurso;
     $xpos++;
  }
  mysql_free_result($con_rec);
  echo('<select name="tiporecurso" size="1" class="eninput">');
  for($ypos=0; $ypos < $xpos; $ypos++)
  {
    echo "<OPTION value='".$IdRec[$ypos]."'>$NoRec[$ypos]</OPTION>";
  }
  echo "</SELECT>";
}

?>
