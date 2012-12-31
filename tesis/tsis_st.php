<?php
include("bd/conecta.php");
$link = conexion();

function cab_st() {?>
<html>
<head>
<title>&middot;::&middot; Gobierno Regional de Coquimbo &middot;&middot;&middot;: Tesis :&middot;&middot;&middot;</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="imagenes/gore.ico" rel="SHORTCUT ICON">
<link href="estilo/tesis.css" rel="stylesheet" type="text/css">
<script src="js/fecha.js" type="text/javascript"></script>
<script src="js/tesis.js" type="text/javascript"></script>
<script language="JavaScript" type="text/javascript">
  function subWin(loc, nom, ancho, alto, posx, posy) {
    var options="toolbar=0,status=0,menubar=0,scrollbars=1,resizable=1,location=0,directories=0,width=" + ancho + ",height=" + alto;      
        
    win = window.open(loc, nom, options);                 
    win.focus();
    win.moveTo(posx, posy);    
  }

function vldform() {
  if(document.form.nom_cont.value == '')
  {
    document.form.nom_cont.focus();
    alert('Debe Digitar su Nombre o del Representante de la Empresa');
    return false;
  }
  if(document.form.nom_emp.value == '')
  {
    document.form.nom_emp.focus();
    alert('Debe Digitar el nombre de la Empresa');
    return false;
  }
  if(document.form.email_cont.value == "")
  {
    document.form.email_cont.focus();
    alert('Debe Digitar su cuenta de correo electrónico a la cual llegará los datos de ingreso de Temas de Estudio');
    return false;
  }
  if(document.form.fono_cont.value == "")
  {
    document.form.fono_cont.focus();
    alert('Debe Digitar el Telefono del Representante o bien de la empresa, acaso sea necesario ponerse en contacto con ustedes.');
    return false;
  }
  else
  {
    document.form.submit();
    return true;
  }
}   
</script>
</head>
<body bgcolor="#eaeaeb">
<table width="750" border="0" cellpadding="0" cellspacing="1" bgcolor="#333333">
  <tr><td>
<table width="750" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="75" height="75" bgcolor="#F2F2F2"><img src="imagenes/logogore.png" width="75" height="75"></td>
    <td bgcolor="#C6CFE5"><img src="imagenes/bnppal.png" width="675" height="75"></td>
  </tr>
</table>
<table width="750" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#FFFFFF" height="1"></td>
  </tr>
</table>
<table width="750" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#5475C6" align="right" class="texto-peq"><font color="#FFFFFF">
	<!-- INSERTAR FECHA -->
      <script language="JavaScript">
      <!--
document.write( dayNames[now.getDay()] + " " + now.getDate() + " de " + monthNames[now.getMonth()] + " " +" de " + year);
      // -->
      </script>&nbsp;&nbsp;</font>
</td>
  </tr>
</table>
<table width="750" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td bgcolor="#FFFFFF" height="10"></td>
  </tr>
</table>
<table width="750" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr> 
    <td width="450" height="400" valign="top"><table width="445" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr> 
          <td align="center"><img src="imagenes/secport.png" width="438" height="60"></td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>
<?php } 

function pie_st() { ?>
			</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table></td>
    <td width="300" valign="top"><table width="295" align="center" border="0" cellpadding="0" cellspacing="0">
              <tr> 
                <td height="20" align="center" background="imagenes/bckimg-1.png" bgcolor="#E3E3E3" class="texto-tit"><strong>Solicitud 
                  de Temas <img src="imagenes/nuevo.png" width="45" height="10"></strong></td>
              </tr>
              <tr> 
                <td height="200" valign="top" bgcolor="#F2F2F2" class="texto-tsis"><p>El 
                    sistema de Solicitud de Temas requiere que siga este paso 
                    de inscripci&oacute;n de su organizaci&oacute;n y/o empresa 
                    a nuestra base de datos con el fin de entregarle posteriormente 
                    v&iacute;a correo electr&oacute;nico, una cuenta de usuario 
                    y su contrase&ntilde;a para que puedan ingresar los temas 
                    que requieran de estudio en forma directa a trav&eacute;s 
                    de esta p&aacute;gina web.</p>
                  <p>Cualquier informaci&oacute;n adicional con respecto a esta 
                    p&aacute;gina web, por favor remitirla a <a href="mailto:tesis@gorecoquimbo.cl?subject=Respecto%20Pagina%20Tesis%20-modulo%20solicitud%20de%20temas-">tesis@gorecoquimbo.cl</a></p>
                  <p>&nbsp;</p></td>
              </tr>
            </table></td>
  </tr>
</table>
<table border="0" width="750" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
<tr>
   <td><div id="lin-footer"><strong>www.gorecoquimbo.cl:</strong>&nbsp;P&aacute;gina desarrollada por Luis Jim&eacute;nez Villalobos, Departamento de Inform&aacute;tica Servicio Administrativo GORE-COQUIMBO.</div></td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>
<?php }


if( (!$HTTP_GET_VARS[s]) || ($HTTP_GET_VARS[s] == "d") ) {
cab_st(); ?>

		  <!-- -->
		  <form action="<?php $PHP_SELF?>?s=e" name="form" id="form" method="post" onsubmit="return vldform();">
		  <table width="95%" border="0" cellspacing="1" cellpadding="0">
              <tr> 
                      <td bgcolor="#F2F2F2"><table width="85%" border="0" align="center" cellpadding="1" cellspacing="2" class="tableform">
                          <tr> 
                            <td colspan="2">&nbsp;</td>
                          </tr>
                          <tr> 
                            <td width="39%">Nombre Contacto:</td>
                            <td width="61%"><input name="nom_cont" type="text" id="nom_cont" size="45" maxlength="128"></td>
                          </tr>
                          <tr> 
                            <td>Organizaci&oacute;n/Empresa:</td>
                            <td><input name="nom_emp" type="text" id="nom_emp" size="45" maxlength="128"></td>
                          </tr>
                          <tr> 
                            <td>Email Contacto:</td>
                            <td><input name="email_cont" type="text" id="email_cont" size="45" maxlength="50"  onchange="return vemail(this.value);"></td>
                          </tr>
                          <tr> 
                            <td>Fono Contacto:</td>
                            <td><input name="fono_cont" type="text" id="fono_cont" size="12" maxlength="15"></td>
                          </tr>
						  <tr><td colspan="2" height="25"></td></tr>
                          <tr align="center"> 
                            <td colspan="2"> 
                              <input name="solicita" type="submit" id="solicita" value=" Solicitar Registro  ">
                            </td>
                          </tr>
						  <tr><td colspan="2" height="25"></td></tr>
                        </table></td>
              </tr>
            </table>
			</form>
			<!-- -->
<?php
pie_st();
}


if($HTTP_GET_VARS[s] == "e") { 
cab_st();?>
		  <table width="95%" border="0" cellspacing="1" cellpadding="0">
              <tr> 
                      <td bgcolor="#F2F2F2"><table width="85%" border="0" align="center" cellpadding="1" cellspacing="2" class="tableform">
                          <tr> 
                            <td colspan="2" height="25">&nbsp;</td>
                          </tr>
<?php if(isset( $solicita )) {
    // Configuration of recipient and subject.
       $recipient = "<mcortes@minmineria.cl>";

       $subject = "Solicitud de Incorporacion de Datos Empresa";


// Please do not change anything below this line!!!
// ________________________________________________

       $mailheaders = "From: <$email_cont> \n";
	   $mailheaders .= "Cc: <soporte@gorecoquimbo.cl> \r\n";

       $msg = "______________________________________________________________________________________________________\n";
       $msg .= "\n";
       $msg .= "Se Ha Solicitado la Incorporacion de la siguiente empresa para ingresar Solicitud de Temas en la pagina web \n";
       $msg .= "\n";
	   $msg .= "Base de Datos Tesis Regionales (www.gorecoquimbo.cl/tesis) \n";
       $msg .= "\n";
       $msg .= "Nombre Contacto: $nom_cont  \n";
       $msg .= "\n";
       $msg .= "Empresa: $nom_emp  \n";
       $msg .= "\n";
       $msg .= "Email Contacto: $email_cont \n";
       $msg .= "\n";
       $msg .= "Fono Contacto: $fono_cont \n";
       $msg .= "\n";
	   $msg .= "\n";
       $msg .= "\n";
       $msg .= "Favor tomar antecedentes del caso y registrar a usuario previo chequeo de sus datos, \n";
	   $msg .= "Administrador www.gorecoquimbo.cl/tesis \n";
	   $msg .= "Luis Jimenez Villalobos \n";
	   $msg .= "Fono: 207214 \n";
	   $msg .= "Gobierno Regional de Coquimbo \n";
	   $msg .= "Departamento de Informatica \n\n";
       $msg .= "___________________________________________________________________________________________________________________\n";

       mail($recipient,$subject,$msg,$mailheaders);
}?>
						  
						  <tr><td colspan="2">
						      Sus datos han sido enviados en estos momentos a nuestra central quienes posteriormente le har&aacute;n llegar v&iacute;a email,
							  su cuenta de usuario, contrase&ntilde;a y direcci&oacute;n web donde podr&aacute;n ingresar directamente su Solicitud de Temas.
						      </td>
                          </tr>
                          <tr> 
                            <td colspan="2" height="25">&nbsp;</td>
                          </tr>
						  <tr><td colspan="2" class="texto-peq" bgcolor="#5475C6" align="center">&nbsp;<a href="index.php">&laquo; Volver Portada</a></td></tr>
                     </table>
					 </td>
			</tr>
		</table>
<?php pie_st(); } ?>