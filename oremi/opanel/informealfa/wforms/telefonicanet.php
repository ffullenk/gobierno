<?php
	@include("../../../lib/config.php");
	@include("../../../lib/oremi.php");
    @include("../../utiles/utiles.php");

	global $SERVER, $DB, $USER, $PASSWORD;
	@include("../../../lib/global.php");
	@include("../../../lib/recordset.php");

	$rsRecursos = new Recordset($SERVER, $DB, $USER, $PASSWORD);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" 
   "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html> 
<head>
<title>Crear input file</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript">
<!--
numR=0;
function crear(obj) {
  numR++;
  document.forms[0].numR.value = numR;
  fi = document.getElementById('fiel'); // 1
  contenedor = document.createElement('div'); // 2
  contenedor.id = 'div'+numR; // 3
  fi.appendChild(contenedor); // 4



  myselect = document.createElement("select");
  myselect.name= 'recu[]';
	// 1 Opcion en selectbox
//  theOption=document.createElement("OPTION");
//  theText=document.createTextNode("Seleccione Tipo de Recurso...");
//  theOption.appendChild(theText);
//  theOption.setAttribute("value","");
//  myselect.appendChild(theOption);

// Incorporar codigo PHP
<?php
$sqlRecursos = "SELECT RECURSO_ID, TIPORECURSO FROM RECURSOS";
$rsRecursos->Open($sqlRecursos);
$nroRecursos = $rsRecursos->RecordCount();
if($nroRecursos>0) {
	while($rsRecursos->moveNext() ) { ?>
	  theOption=document.createElement("OPTION");
      theText=document.createTextNode("<?php echo $rsRecursos->FieldByNumber(1);?>");
      theOption.appendChild(theText);
      theOption.setAttribute("value","<?php echo $rsRecursos->FieldByNumber(0);?>");
      myselect.appendChild(theOption);
<?php
	} 
}?>
  
// Incorporar codigo PHP  


  contenedor.appendChild(myselect);

//  ele = document.createElement('select'); // 5
  //ele.type = 'text'; // 6
//  ele.name = 'Recursos';
//  contenedor.appendChild(ele); // 7
  
    
  ele = document.createElement('input'); //
  ele.type = 'text'; // 
  ele.name = 'gasto[]';
  ele.size = '12';
  contenedor.appendChild(ele); // 
  
  ele = document.createElement('input'); //
  ele.type = 'text'; // 
  ele.name = 'cantidad[]';
  ele.size = '4';
  contenedor.appendChild(ele); // 
  
  
  ele = document.createElement('input'); // 5
  ele.type = 'button'; // 6
  ele.value = 'Eliminar'; // 8
  ele.name = 'div'+numR; // 8
  ele.onclick = function () {borrar(this.name)} // 9
  contenedor.appendChild(ele); // 7
}
function borrar(obj) {
  fi = document.getElementById('fiel'); // 1 
  fi.removeChild(document.getElementById(obj)); // 10
}
--> 
</script>
</head>
<body>
<form method="post" action="algo.php">
<fieldset id="fiel">
<input type="button" value="Añadir Decision" onclick="crear(this)" />
</fieldset>
<fieldset>
<input type="hidden" name="numR" value="numR" />
<input type="submit" name="enviar" value="Grabar" />
</fieldset>
</form> 
</body>
</html>