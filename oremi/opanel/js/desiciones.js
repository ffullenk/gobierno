// JavaScript Document
numR=0;
function crear(obj) {
  numR++;
  document.forms["formulario"].numR.value = numR;
  fi = document.getElementById('fiel'); // 1
  contenedor = document.createElement('div'); // 2
  contenedor.id = 'div'+numR; // 3
  fi.appendChild(contenedor); // 4



  myselect = document.createElement("select");
  myselect.name= 'recu[]';
<?php
$rsRecursos = new Recordset($SERVER, $DB, $USER, $PASSWORD);
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
  contenedor.appendChild(myselect);

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
