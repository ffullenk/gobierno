function validarEmail()
{
	   if(validarCampo(document.formulario.email,isEmail,true))
		return true;
		else return false;
}	