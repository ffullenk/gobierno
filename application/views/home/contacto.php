<script type="text/javascript">

$(document).ready(function(){

  $( "#frm_fecha" ).datepicker({
      
      altFormat: 'yy-mm-dd',
      dateFormat:'yy-mm-dd'
  });

  $("#botones").click(function() {

    var base='<?php echo BASE_PATH ?>';

    var url = base+"/sendEmail"; 
   
    var nombre=$("#nombre").val();
    var apellidos=$("#apellidos").val();
    var telefono=$("#telefono").val();
    var proposito=$("#proposito").val();
    var email=$("#email").val();
    var consulta=$("#consulta").val();


      $.ajax({
             type: "POST",
             url: url,
             data: "nombre="+nombre+"&apellidos="+apellidos+"&telefono="+telefono+"&proposito="+proposito+"&email="+email+"&consulta="+consulta, // serializes the form's elements.
             success: function(data)
             {
                 //alert(data); 
                 $("#info-form").show();
                 $("#info-form").html(data);
                 $("#nombre").text('');
                 $("#apellidos").text('');
                 $("#telefono").text('');
                 $("#proposito").text('');
                 $("#email").text('');
                 $("#consulta").text('');
                 $("#form1").hide();
                 
             }
           });
      
      return false; 
  });

})



</script>

<div id="noticias">

      
  <div class="categoria"> 
    <a href="<?php echo BASE_URI?>">P&Aacute;gina Principal</a>&nbsp;&gt;&nbsp;Contacto 
  </div>
          <h1>FORMULARIO DE CONTACTO </h1>
          <hr />
          <p align="justify"> Este formulario le da la posibilidad de enviar un correo electr&oacute;nico directamente con nuestro personal. Por favor, tome un tiempo para contestar el siguiente formulario. Necesitamos &eacute;sta informaci&oacute;n para procesar correctamente su mensaje.&nbsp; </p>
  <form id="form1" name="form1" method="get" action="contacto.php">
		 <div id="info-form" style="display:none">.</div>

		 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="3" class="indice">
           <tr class="parrafos-grandes">
             <td class="textos_general"><div align="left"><font color="#333333">Nombres :</font></div></td>
             <td class="textos_general"><div align="left"><font color="#333333">
                 <input id="nombre" name="nombre" type="text"  size="40" maxlength="60" />
                 <font color="#FF0000">*</font> </font></div></td>
           </tr>
           <tr class="parrafos-grandes">
             <td class="textos_general"><div align="left"><font color="#333333">Apellidos 
               :</font></div></td>
             <td class="textos_general"><div align="left"><font color="#333333">
                 <input  id="apellidos" name="apellidos" type="text"  size="40" maxlength="60" />
                 <font color="#FF0000">* </font></font></div></td>
           </tr>
           <tr class="parrafos-grandes">
             <td class="textos_general"><div align="left"><font color="#333333">Tel&eacute;fono :</font></div></td>
             <td class="textos_general"><div align="left"><font color="#333333">
                 <input id="telefono" name="telefono" type="text" size="40" maxlength="60" />
             </font></div></td>
           </tr>
           <tr class="parrafos-grandes">
             <td height="23" class="textos_general"><div align="left"><font color="#333333">Prop&oacute;sito:</font></div></td>
             <td class="textos_general"><div align="left"><font color="#333333" size="1" face="Verdana, Arial">
                 <select id="proposito" name="proposito" class="parrafos-grandes">
                   <option value="Sugerencias">Sugerencias</option>
                   <option value="Reclamos">Reclamos</option>
                   <option value="Otro">Otro</option>
                 </select>
             </font></div></td>
           </tr>
           <tr class="parrafos-grandes">
             <td class="textos_general"><div align="left"><font color="#333333"> E-Mail :</font></div></td>
             <td class="textos_general"><div align="left"><font color="#333333">
                 <input id="email" name="email" type="email"  size="40" maxlength="60" id="email" />
                 <font color="#FF0000">*</font></font></div></td>
           </tr>
           <tr class="parrafos-grandes">
             <td valign="top" class="textos_general"><p align="left"><font color="#333333">Mensaje 
               :</font></p></td>
             <td class="textos_general"><div align="left"><font color="#333333">
                 <textarea id="consulta" name="consulta" cols="30" rows="10" wrap="virtual" class="parrafos-grandes"></textarea>
             </font></div></td>
           </tr>
           <tr class="parrafos-grandes">
             <td valign="top" class="textos_general">&nbsp;</td>
             <td class="textos_general">
              <input name="button" type="button" class="botones" id="botones"  value=" Enviar " />
               <input name="opcion_form" type="hidden" id="opcion_form" value="1" />
               <input name="borrar" type="reset" class="botones" value=" Borrar " /></td>
           </tr>
           <tr class="parrafos">
             <td colspan="2"><div align="center"></div></td>
           </tr>
         </table>
  
         </form>
</div>
