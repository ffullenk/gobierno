function venacion() {
	if (QForm.nacion[QForm.nacion.selectedIndex].value == "1") {
		/* Es CHILENO */
		QForm.otropais.disabled = true;
		QForm.lstRegion.disabled = false;
		QForm.lstProvincia.disabled = false;
		QForm.lstComuna.disabled = false;
		QForm.rut.disabled = false;
		QForm.nombres.focus();
		/*QForm.educacion.disabled = true;*/
	} else if(QForm.nacion[QForm.nacion.selectedIndex].value == "0") {
		QForm.otropais.value="";
		QForm.otropais.disabled = false;
		QForm.otropais.focus();
		QForm.lstRegion.disabled = true;
		QForm.lstProvincia.disabled = true;
		QForm.lstComuna.disabled = true;
		QForm.rut.disabled = true;
		/*QForm.educacion.disabled = false;*/
	} else {
		QForm.otropais.disabled = true;
	}
}

function textCounter(field,cntfield,maxlimit) {
if (field.value.length > maxlimit) // if too long...trim it!
field.value = field.value.substring(0, maxlimit);
// otherwise, update 'characters left' counter
else
cntfield.value = maxlimit - field.value.length;
}
