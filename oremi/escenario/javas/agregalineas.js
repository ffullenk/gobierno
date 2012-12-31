// Variable de Conteo de lineas
	var lineCount = new Array();

	/**
	 * Agrega una linea de datos a un formulario
	 * @param string div El ID del div objetivo donde se agrega una linea
	 * @param string line El ID del div que contiene la linea a agregar
	 * @param string f Funcion extra para pasarle a los eventos
	 */
	function addFormLine(div, line, f)
	{
		var f = (f == null) ? "" : f;
		lineCount[div] = lineCount[div] == null ? 1 : lineCount[div] + 1;
		var mySelf = div + "_line_" + lineCount[div];
		var myNum = lineCount[div];
		var divTarget = document.getElementById(div);
		var divLine = document.getElementById(line).innerHTML;
		var divTitle = document.getElementById(line).getAttribute('title');
		var newDiv = document.createElement('div');
		newDiv.className = 'row';
		newDiv.setAttribute('id', mySelf);
		divLine = divLine.replace(/mySelf/g, mySelf);
		newDiv.innerHTML = divLine;
		newDiv.innerHTML += "<div class=\"cell\"><img style=\"cursor: pointer;\" src=\"../images/remove.gif\" border=\"0\" onclick=\"removeFormLine(\'" + mySelf + "\'); " + f + "\"></div>";

		if (divTitle != null && divTarget.hasChildNodes() == false){
			var titles = divTitle.split(",");
			var newTitle = document.createElement('div');
			newTitle.className = 'row';
			for (i = 0; i < titles.length; ++i){
				var titleSize = titles[i].match(/\(\w+\)/,'');
				titleSize = titleSize[0].replace(/[\(\)]/g,'');
				var titleName = titles[i].replace(/\(\w+\)/,'');
				newTitle.innerHTML += "<div class=\"title\" style=\"width: " + titleSize + "px;\">" + titleName + "</div>";
			}
			divTarget.appendChild(newTitle);
			divTarget.setAttribute('cab', '1');
		}
		divTarget.appendChild(newDiv);
	}

	/**
	 * Elimina una linea de un formulario
	 * @param string div El ID del div que se quiere eliminar
	 */
	function removeFormLine(div)
	{
		var parentName = div.replace(/_line_\w+/g, '');
		var divParent = document.getElementById(parentName);
		var divTarget = document.getElementById(div);
		var hasTitle = divParent.getAttribute('cab');
		divParent.removeChild(divTarget);
		if (hasTitle != null && divParent.childNodes.length == 1){
			divParent.innerHTML = "";
		}
	}