<link href="css/style.css" rel="stylesheet" type="text/css">

<title>Consejo Regional de Coquimbo</title><div id="noticias">
  <div id="categoria">Cont&aacute;ctenos</div>
          <h1>FORMULARIO DE CONTACTO </h1>
          <hr />
          <p align="justify"> Este formulario le da la posibilidad de enviar un correo electr&oacute;nico directamente con nuestro personal. Por favor, tome un tiempo para contestar el siguiente formulario. Necesitamos &eacute;sta informaci&oacute;n para procesar correctamente su mensaje.&nbsp; </p>
  <form id="form1" name="form1" method="get" action="contacto.php">
		 <div id="info-form">Su mensaje ha sido enviado satisfactoriamente;<br />
		   Usted recibir&aacute; un correo de confirmaci&oacute;n.</div>
		 <p>
		   <?
		if ($opcion_form==1)
		{ ?>
		   
		   <?
		}else{	
	   ?>
		 </p>
		 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="3" class="indice">
           <tr class="parrafos-grandes">
             <td class="textos_general"><div align="left"><font color="#333333">Nombres :</font></div></td>
             <td class="textos_general"><div align="left"><font color="#333333">
                 <input name="nombre" type="text"  size="40" maxlength="60" />
                 <font color="#FF0000">*</font> </font></div></td>
           </tr>
           <tr class="parrafos-grandes">
             <td class="textos_general"><div align="left"><font color="#333333">Apellidos 
               :</font></div></td>
             <td class="textos_general"><div align="left"><font color="#333333">
                 <input name="apellidos" type="text"  size="40" maxlength="60" />
                 <font color="#FF0000">* </font></font></div></td>
           </tr>
           <tr class="parrafos-grandes">
             <td class="textos_general"><div align="left"><font color="#333333">Tel&eacute;fono :</font></div></td>
             <td class="textos_general"><div align="left"><font color="#333333">
                 <input name="telefono" type="text" size="40" maxlength="60" />
             </font></div></td>
           </tr>
           <tr class="parrafos-grandes">
             <td height="23" class="textos_general"><div align="left"><font color="#333333">Prop&oacute;sito:</font></div></td>
             <td class="textos_general"><div align="left"><font color="#333333" size="1" face="Verdana, Arial">
                 <select name="proposito" class="parrafos-grandes">
                   <option value="Sugerencias">Sugerencias</option>
                   <option value="Reclamos">Reclamos</option>
                   <option value="Otro">Otro</option>
                 </select>
             </font></div></td>
           </tr>
           <tr class="parrafos-grandes">
             <td class="textos_general"><div align="left"><font color="#333333"> E-Mail :</font></div></td>
             <td class="textos_general"><div align="left"><font color="#333333">
                 <input name="email" type="text" onblur="valida_mail(document.getElementById('email').name,document.getElementById('email').value)" size="40" maxlength="60" id="email" />
                 <font color="#FF0000">*</font></font></div></td>
           </tr>
           <tr class="parrafos-grandes">
             <td valign="top" class="textos_general"><p align="left"><font color="#333333">Mensaje 
               :</font></p></td>
             <td class="textos_general"><div align="left"><font color="#333333">
                 <textarea name="consulta" cols="30" rows="10" wrap="virtual" class="parrafos-grandes"></textarea>
             </font></div></td>
           </tr>
           <tr class="parrafos-grandes">
             <td valign="top" class="textos_general">&nbsp;</td>
             <td class="textos_general"><input name="button" type="button" class="botones" onclick="javascript:enviar(this.form)" value=" Enviar " />
               <input name="opcion_form" type="hidden" id="opcion_form" value="1" />
               <input name="borrar" type="reset" class="botones" value=" Borrar " /></td>
           </tr>
           <tr class="parrafos">
             <td colspan="2"><div align="center"></div></td>
           </tr>
         </table>
    <? } ?>
         </form>
</div>
</div>

