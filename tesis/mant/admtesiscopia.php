<?php
include("../bd/conecta.php");
$link = conexion();
$legal_require_php = "pvtesis";
global $global_qk, $nivel, $idins;
$global_qk=0;
include("detect.php");


function enviar_email($nompass, $nomemail, $nomuser) {
global $global_qk, $nivel, $idins;
    // Configuration of recipient and subject.
       $recipient = "<$nomemail>";

       $subject = "Base de Datos Tesis Regionales: Usuario Administrador Registrado";


// Please do not change anything below this line!!!
// ________________________________________________

       $mailheaders = "From: <tesis@gorecoquimbo.cl> \n";
	   $mailheaders .= "Cc: <soporte@gorecoquimbo.cl> \r\n";

//       $mailheaders .= "Reply-To: <$email>\n\n";
// http://www.gorecoquimbo.cl/tesis/mant/
//$msg .= "Le recordamos que si desea agregar nuevos campos en el tipo de tesis o area de estudio, la remita a tesis@gorecoquimbo.cl \n";
//$msg .= "\n";
       $msg = "__________________________________________________________________________________________________________________________________\n";
       $msg .= "\n";
       $msg .= "Ha Sido Registrado Como Usuario para Poder Administrar la informacion de tesis de su institucion \n";
       $msg .= "\n";
	   $msg .= "Para Trabajar administrando sus tesis, debera ingresar a la siguiente direccion:\n";
       $msg .= "\n";
       $msg .= "http://www.gorecoquimbo.cl/tesis/mant/  \n";
       $msg .= "\n";
       $msg .= "\n";
       $msg .= "Recuerde su Cuenta:	$nomuser\n";
       $msg .= "\n";
       $msg .= "Recuerde su Contraseña:	$nompass\n";
       $msg .= "\n";
       $msg .= "\n";
       $msg .= "Atentamente se despide, \n";
	   $msg .= "Administrador Web Gobierno Regional de Coquimbo.\n\n";
       $msg .= "__________________________________________________________________________________________________________________________________\n";

       mail($recipient,$subject,$msg,$mailheaders);

}

function enviar_email_empresa($nompass, $email_cont, $nomuser, $nom_cont) {
global $global_qk, $nivel, $idins;
    // Configuration of recipient and subject.
       $recipient = "<$email_cont>";

       $subject = "Base de Datos Tesis Regionales: Ya Puede Ingresar Temas de Estudios en Nuestra Base de Datos";


// Please do not change anything below this line!!!
// ________________________________________________

       $mailheaders = "From: <ljimenez@gorecoquimbo.cl> \n";
	   $mailheaders .= "Cc: <ljimenez@gorecoquimbo.cl> \r\n";

//       $mailheaders .= "Reply-To: <$email>\n\n";
// http://www.gorecoquimbo.cl/tesis/mant/
//$msg .= "Le recordamos que si desea agregar nuevos campos en el tipo de tesis o area de estudio, la remita a tesis@gorecoquimbo.cl \n";
//$msg .= "\n";
       $msg = "__________________________________________________________________________________________________________________________________\n";
       $msg .= "\n";
	   $msg .= " Estimado Señor(a) $nom_cont \n\n";
       $msg .= "Este email es para informarle que tal cual usted lo solicito, ya ha Sido Registrado en nuestros registros y a contar de este momento ";
	   $msg .= "puede ingresar los temas que usted desee que requieran de estudio y ponerlas a disposicion del estudiantado de la region. \n";
       $msg .= "\n";
	   $msg .= "Para Trabajar administrando sus Solicitudes de Temas, debera ingresar a la siguiente direccion:\n";
       $msg .= "\n";
       $msg .= "http://www.gorecoquimbo.cl/tesis/temas  \n";
       $msg .= "\n";
       $msg .= "\n";
       $msg .= "Recuerde su Cuenta es :	$nomuser\n";
       $msg .= "\n";
       $msg .= "Recuerde su Contraseña es:	$nompass\n";
       $msg .= "\n";
       $msg .= "\n";
       $msg .= "Atentamente se despide, \n";
	   $msg .= "Administrador Web Gobierno Regional de Coquimbo.\n\n";
	   $msg .= "Cualquier consulta o duda, por favor, pongase en contacto con ljimenez@gorecoquimbo.cl \n";
       $msg .= "__________________________________________________________________________________________________________________________________\n";

       mail($recipient,$subject,$msg,$mailheaders);

}


function tsismens( $valor ) {
global $global_qk, $nivel, $idins;
?>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td align="left" class="texto-cab">&nbsp;Mensaje de Error</td>
        </tr>
        <tr><td height="35"></td></tr>
        <tr> 
          <td><?php echo $valor;?></td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
        </tr>
      </table>
<?php
}



function tsiscab() {
global $global_qk, $nivel, $idins;?>
<html>
<head>
<title>&middot;::&middot; Gobierno Regional de Coquimbo &middot;&middot;&middot;: Tesis :&middot;&middot;&middot;</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../estilo/tesis.css" rel="stylesheet" type="text/css">
<script src="../js/tesis.js" type="text/javascript"></script>
<script language="JavaScript">
  function subWin(loc, nom, ancho, alto, posx, posy) {
    var options="toolbar=0,status=0,menubar=0,scrollbars=1,resizable=1,location=0,directories=0,width=" + ancho + ",height=" + alto;      
        
    win = window.open(loc, nom, options);                 
    win.focus();
    win.moveTo(posx, posy);    
  }
</script>
<script language="JavaScript" type="text/javascript">
function vldus() {
  if(document.formuser.nomuser.value =='') {
     document.formuser.nomuser.focus();
	 alert('Debe Especificar una Cuenta de Usuario Para este Contacto.');
	 return  false;
  }
  if(document.formuser.nompass.value == '') {
     document.formuser.nompass.focus();
	 alert('Debe Especificar una Contraseña para esta Cuenta.');
	 return false;
  }
  if(document.formuser.nomemail.value == '') {
     document.formuser.nomemail.focus();
	 alert('Debe Seleccionar una cuenta de correo electrónico para este Usuario.');
	 return false;
  }
  if(document.formuser.institucion.value == '-') {
     document.formuser.institucion.focus();
	 alert('Debe Seleccionar la Institución a la cual Pertecene el Usuario.');
	 return false;
  }
  if(document.formuser.nomnivel.value == '-' ) {
     document.formuser.nomnivel.focus();
	 alert('Debe Especificar en Nivel al cual Corresponda la Cuenta del Usuario. Solamente los Usuarios del Gobierno Regional pueden ser usuarios Administradores GORE.');
	 return false;
  } else {
     document.formuser.submit();
	 return true;
  }
}

function vldtesis() {
  if(document.formtesis.tipo.value == '-') {
     document.formtesis.focus();
	 alert('Debe Seleccionar el Tipo de la Tesis que desea ingresar.');
	 return false;
  }
  if(document.formtesis.area.value == '-') {
     document.formtesis.focus();
	 alert('Debe Seleccionar el Área a la cual pertenece la Tesis que desea ingresar.');
	 return false;
  }
  if(document.formtesis.anno.value == '') {
     document.formtesis.anno.focus();
	 alert('Debe especificar el año de edición de la Tesis a ingresar.');
	 return false;
  }
  if(document.formtesis.titulo.value == '') {
     document.formtesis.titulo.focus();
	 alert('Debe Colocar un Título para la Tesis a Ingresar.');
	 return false;
  }
  
  if((document.formtesis.alum1.value == '') && (document.formtesis.alum2.value == '') && (document.formtesis.alum3.value == '') && (document.formtesis.alum4.value == '')) {
     document.formtesis.alum1.focus();
	 alert('Al menos debe especificar el nombre de un Alumno Tesista.');
	 return false;
  }
  if(document.formtesis.fono.value == '') {
     document.formtesis.fono.focus();
	 alert('Debe estipular un número telefónico de contacto.');
	 return false;
  }
  if(document.formtesis.nomemail.value == '') {
     document.formtesis.nomemail.focus();
	 alert('Debe estipular una cuenta de correo electrónico de contacto.');
	 return false;
  }
  if(document.formtesis.resumen.value == '') {
     document.formtesis.resumen.focus();
	 alert('Debe Detallar un Resumen Ejecutivo de la Tesis.');
	 return false;
  } else {
     document.formtesis.submit();
	 return true;
  }
}

function vldemp() {
  if(document.form.nom_emp.value == '')
  {
    document.form.nom_emp.focus();
    alert('Debe Digitar el nombre de la Empresa');
    return false;
  }
  if(document.form.nom_cont.value == '')
  {
    document.form.nom_cont.focus();
    alert('Debe Digitar su Nombre o del Representante de la Empresa');
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
  if(document.form.nomuser.value == "")
  {
    document.form.nomuser.focus();
    alert('Debe crear un nombre de cuenta para la empresa.');
    return false;
  }
  if(document.form.nompass.value == "")
  {
    document.form.nompass.focus();
    alert('Debe crear una contraseña para la cuenta de la empresa.');
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
<!--if( (document.formtesis.profg1.value == '') && (document.formtesis.profg2.value == '') && (document.formtesis.profg3.value == '') && (document.formtesis.profg4.value == '') ) {
     document.formtesis.profg1.focus();
	 alert('Al menos debe especificar el nombre de un Profesor Guía.');
	 return false;
  }
  if( (document.formtesis.infor1.value == '') && (document.formtesis.infor2.value == '') && (document.formtesis.infor3.value == '')) {
     document.formtesis.infor1.focus();
	 alert('Al menos debe especificar el nombre de un Profesor Informante.');
	 return false;
  }-->
  
  
<body bgcolor="#eaeaeb">
<table width="750" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr> 
    <td width="240" height="75" bgcolor="#C6CFE5"><img src="../imagenes/logogore.png" width="75" height="75"></td>
    <td width="256" valign="middle" bgcolor="#C6CFE5"> 
      <?php
		  $res=mysql_query("SELECT admuser.idinst, nivel, institucion, email FROM admuser INNER JOIN institucion ON admuser.idinst=institucion.idinst WHERE id='$global_qk'") or die(mysql_error());
		  if(mysql_num_rows($res) > 0 ) {
		     $flres = mysql_fetch_object($res);
			 $insti = $flres->institucion;
			 $email = $flres->email;
			 $nivel = $flres->nivel;
			 $idins = $flres->idinst;
		  }
		  mysql_free_result($res); unset($flres);?>
      <table width="250" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center" class="texto-peq">Sesi&oacute;n de Trabajo de</td>
        </tr>
        <tr>
          <td align="center" class="texto-tit"><?php echo $insti; ?>
		  </td>
        </tr>
        <tr>
          <td align="center" class="texto-peq">Contacto: <?php echo $email;?></td>
        </tr>
      </table>
    </td>
    <td width="254" bgcolor="#C6CFE5">
<table width="250" border="0" cellpadding="0" cellspacing="0" bgcolor="#C6CFE5">
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="right" valign="top" bgcolor="#C6CFE5"> 
            <form action="logout.php" method="post">
	               <input type="hidden" name="global_qk" value="<?php echo $global_qk; ?>">
	               <input type="submit" name="checkout" value="Cerrar Sesi&oacute;n  ">
            </form>
            &nbsp;</td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<table width="750" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#FFFFFF" height="1"></td>
  </tr>
</table><table width="750" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#5475C6">&nbsp;</td>
  </tr>
</table>
<table width="750" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td bgcolor="#FFFFFF" height="10"></td>
  </tr>
 </table>
<table width="750" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr> 
    <td width="550" height="400" valign="top"> 
      <?php
}



function tsispie() {
global $global_qk, $nivel, $idins, $loginCorrecto; ?>
    </td>
    <td width="5" valign="top">&nbsp; </td>
    <td width="100" valign="top" bgcolor="#C6CFE5"><table width="180" border="0" align="right" cellpadding="0" cellspacing="0" bgcolor="#C6CFE5">
        <tr> 
          <td align="center" class="texto-tit">Directorio</td>
        </tr>
        <tr> 
          <td height="10"></td>
        </tr>
        <tr> 
          <td><?php  if($nivel != "S" ) { ?>
		      <table width="95%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#ffffff" class="table-menu">

              <tr> 
                <td align="center" bgcolor="#5475C6">Tesis</td>
              </tr>
              <tr> 
                <td bgcolor="#FFFFFF">&nbsp;<a href="<?php $PHP_SELF?>?s=pt">Principal 
                  Tesis</a></td>
              </tr>
              <tr> 
                <td bgcolor="#FFFFFF">&nbsp;<a href="<?php $PHP_SELF?>?s=at">Agregar 
                  Tesis</a></td>
              </tr>
            </table>
			<?php } ?></td>
        </tr>
        <tr> 
          <td height="10"></td>
        </tr>
        <tr> 
          <td> 
            <?php if($nivel == "S" || $nivel =="X") { ?>
            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF" class="table-menu">
              <tr> 
                <td align="center" bgcolor="#5475C6">Administraci&oacute;n Solicitud Temas</td>
              </tr>
              <tr> 
                <td bgcolor="#FFFFFF">&nbsp;<a href="<?php $PHP_SELF?>?s=pe">Principal 
                  Empresas Registradas</a></td>
              </tr>
              <tr> 
                <td bgcolor="#FFFFFF">&nbsp;<a href="<?php $PHP_SELF?>?s=ae">Agregar 
                  Empresa</a></td>
              </tr>
            </table>
            <?php } ?>
          </td>
        </tr>
        <tr> 
          <td height="10"></td>
        </tr>
        <tr> 
          <td> 
            <?php if($nivel == "X" ) { ?>
            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF" class="table-menu">
              <tr> 
                <td align="center" bgcolor="#5475C6">Usuarios</td>
              </tr>
              <tr> 
                <td bgcolor="#FFFFFF">&nbsp;<a href="<?php $PHP_SELF?>?s=pu">Principal 
                  Usuarios</a></td>
              </tr>
              <tr> 
                <td bgcolor="#FFFFFF">&nbsp;<a href="<?php $PHP_SELF?>?s=au">Agregar 
                  Usuario</a></td>
              </tr>
            </table>
            <?php } ?>
          </td>
        </tr>
        <tr> 
          <td height="10"></td>
        </tr>
        <tr> 
          <td> 
            <?php if($nivel == "X" ) { ?>
            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF" class="table-menu">
              <tr> 
                <td align="center" bgcolor="#5475C6">Instituci&oacute;n</td>
              </tr>
              <tr> 
                <td bgcolor="#FFFFFF">&nbsp;<a href="<?php $PHP_SELF?>?s=pi">Principal 
                  Instituci&oacute;n</a></td>
              </tr>
              <tr> 
                <td bgcolor="#FFFFFF">&nbsp;<a href="<?php $PHP_SELF?>?s=ai">Agregar 
                  Instituci&oacute;n</a></td>
              </tr>
            </table>
            <?php } ?>
          </td>
        </tr>
        <tr> 
          <td height="10"></td>
        </tr>
        <tr> 
          <td> 
            <?php if($nivel == "X" ) { ?>
            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF" class="table-menu">
              <tr> 
                <td align="center" bgcolor="#5475C6">Tipos de Tesis</td>
              </tr>
              <tr> 
                <td bgcolor="#FFFFFF">&nbsp;<a href="<?php $PHP_SELF?>?s=ps">Principal 
                  Tipos de Tesis</a></td>
              </tr>
              <tr> 
                <td bgcolor="#FFFFFF">&nbsp;<a href="<?php $PHP_SELF?>?s=as">Agregar 
                  Tipo de Tesis</a></td>
              </tr>
            </table>
            <?php } ?>
          </td>
        </tr>
        <tr> 
          <td height="10"></td>
        </tr>
        <tr> 
          <td> 
            <?php if($nivel == "X" ) { ?>
            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF" class="table-menu">
              <tr> 
                <td align="center" bgcolor="#5475C6">&Aacute;reas</td>
              </tr>
              <tr> 
                <td bgcolor="#FFFFFF">&nbsp;<a href="<?php $PHP_SELF?>?s=pa">Principal 
                  &Aacute;rea</a></td>
              </tr>
              <tr> 
                <td bgcolor="#FFFFFF">&nbsp;<a href="<?php $PHP_SELF?>?s=aa">Agregar 
                  &Aacute;rea</a></td>
              </tr>
            </table>
            <?php } ?>
          </td>
        </tr>
        <tr> 
          <td height="75"></td>
        </tr>
      </table></td>
  </tr>
</table>
<table width="750" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
<tr>
   <td><div id="lin-footer"><strong>www.gorecoquimbo.cl:</strong>&nbsp;P&aacute;gina desarrollada por Luis Jim&eacute;nez Villalobos, Departamento de Inform&aacute;tica Servicio Administrativo GORE-COQUIMBO.</div></td>
</tr>
</table>
</body>
</html>
<?php }



if( $loginCorrecto ) {

if( (!$HTTP_GET_VARS[s] ) || ($HTTP_GET_VARS[s] == "d" ) ) {
tsiscab();
?>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td align="center">&nbsp;</td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
        </tr>
      </table>
<?php
tsispie();
}



if($HTTP_GET_VARS[s] == "pt" ) {
tsiscab();
?>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td align="left" class="texto-cab">&nbsp;usted se encuentra en <strong>Principal Tesis</strong></td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td style="padding-left:2px;"><!-- Principio Paginacion Tesis -->
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<?            // Paginacion de Registros de Tabla Noticias
              /* Limito la busqueda */
                 $TAMANO_PAGINA = 30;

              /* examino la página a mostrar y el inicio del registro a mostrar */
                 $pagina = $HTTP_GET_VARS["pagina"];
                 if (!$pagina) { $inicio = 0; $pagina=1;
                 } else { $inicio = ($pagina - 1) * $TAMANO_PAGINA; }
									 
                 $ssql = "SELECT idtesis, institucion, tipo, area, titulo, anno FROM tesis INNER JOIN institucion ON tesis.idinst=institucion.idinst INNER JOIN tipo ON tesis.idtipo=tipo.idtipo INNER JOIN area ON tesis.idarea=area.idarea";
                 if( $nivel != "X" ) {
				     $ssql.= " WHERE tesis.idinst = $idins";
				 }
				 $ssql.= " ORDER BY anno DESC";
                 $rs = mysql_query($ssql);
                 $num_total_registros = mysql_num_rows($rs);

                 /* calculo el total de páginas */
                    $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);

                 /* pongo el número de registros total, el tamaño de página y la página que se muestra */
                    $maxpags = 10;
                    $minimo = $maxpags ? max(1, $pagina-ceil($maxpags/2)): 1;
                    $maximo = $maxpags ? min($total_paginas, $pagina+floor($maxpags/2)): $total_paginas;

                 /* construyo la sentencia SQL */
                    $ssql.= " LIMIT ". $inicio . "," . $TAMANO_PAGINA;
                    $rs = mysql_query($ssql);
					$num_total_actual = mysql_num_rows($rs);
					$minreg = min(1, $num_total_actual );
					$maxreg = max(1,$num_total_registros);
					if($num_total_actual > 0 ) {?>
					<tr><td colspan="5" align="right" class="info"><div id="lin-base">mostrando <?php echo $pagina;?> de <?php echo $num_total_registros;?></div></td></tr>
                    <tr><td colspan="5" height="10"></td></tr><?php
					
                    while ($fila=mysql_fetch_object($rs)) { ?>                                                        
						   <tr>
						     <td class="secc-ppal" bgcolor="#FFFFFF">
						      <table border="0" cellpadding="0" cellspacing="0">
							    <tr>
								  <td class="texto-peq" >Tipo Tesis</td><td class="secc-ppal">:</td>
								  <td class="texto-peq" align="left"><font color="#943410"><?php echo $fila->tipo;?></font></td>
								</tr>
								<tr>
								  <td class="texto-peq">&Aacute;ea</td><td class="secc-ppal">:</td>
								  <td class="texto-peq" align="left"><font color="#943410"><?php echo $fila->area;?></font></td>
								</tr>
							  </table>
							  <strong><? echo $fila->titulo;?></strong>
                            </td>
							<td width="5"></td>
							<td align="center"><form action="<?php $PHP_SELF?>?s=mt" method="post">
                                  <input type="hidden" name="id" value="<?php echo $fila->idtesis; ?>">
                                  <input type="image" border="0" src="../imagenes/btn_mod.png" alt=" Modificar Registro " align="middle">
                                </form></td>
							<td width="5"></td>
							<td align="center"><form action="<?php $PHP_SELF;?>?s=et" method="post">
							    <input type="hidden"name="id" value="<?php echo $fila->idtesis;?>">
								<input type="image" border="0" src="../imagenes/btn_eli.png" border="0" alt=" Eliminar Registro " align="middle">
								</form></td>
							</tr>
							<tr><td colspan="5" height="5" style="padding-left:2px;"><div id="lin-div"></div></td></tr>
							<tr><td colspan="5" height="10" style="padding-left:2px;"></td></tr>
                     <?php } 
					 } ?>
                         </table>
		  </td><!-- FIN Paginacion Tesis -->
        </tr>
<?php

    /* cerramos el conjunto de resultados y la conexión con la base de datos */
    mysql_free_result($rs);
    //mysql_close();


   if ($total_paginas > 1)
   {?> <tr><td height="10" valign="middle" class="info" style="padding-left:2px;"><div id="lin-sup">mostrar m&aacute;s avisos en p&aacute;gina <?php
      for ($i=$minimo; $i<$pagina; $i++){
         echo "<a href='".$HTTP_SERVER["PHP_SELF"]."?s=pt&pagina=".$i."'>$i</a>&nbsp;";
      }
	  
	  echo "<font face='verdana' size='-2'>[". $pagina. "] </font>&nbsp;";

      for ($i=$pagina+1; $i<=$maximo; $i++){
         echo "<a href='".$HTTP_SERVER["PHP_SELF"]."?s=pt&pagina=".$i."'>$i</a>&nbsp;";
      }
   

   if($pagina<$total_paginas)
   {
     echo "&nbsp;<a href='".$HTTP_SERVER["PHP_SELF"]."?s=pt&pagina=" .($pagina+1). "'>";
     echo "<font face='verdana' size='-2'>siguiente &raquo;&raquo;</font></a>";
   }?> </div></td></tr> <?php
  } ?>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
      </table>
<?php
tsispie();
}



if($HTTP_GET_VARS[s] == "at" ) {
tsiscab();
?>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td align="left" class="texto-cab">&nbsp;usted se encuentra en <strong>Agregar Tesis</strong></td>
        </tr>
		<tr><td height="35"></td></tr>
        <tr> 
          <td><form name="formtesis" method="post" action="<?php $PHP_SELF?>?s=gt" onSubmit="return vldtesis();">
		     <input type="hidden" name="global_qk" value="<?php echo $global_qk;?>">
			 <input type="hidden" name="idins" value="<?php echo $idins;?>">
			 <input type="hidden" name="nivel" value="<?php echo $nivel;?>">
		  <table border="0" cellpadding="0" cellspacing="1" align="center" bgcolor="#666666">
		  <tr><td>
		     <table border="0" cellpadding="3" cellspacing="0" class="tableform" bgcolor="#E4E4E4">
			   <tr><td colspan="2" align="center" class="texto-tit">Ficha Ingreso de Tesis</td></tr>
<?php if( $nivel == "X" ) { ?>
			   <tr><td colspan="2" height="25"></td></tr>
               <tr><td>Instituci&oacute;n</td>
			       <td>
<?php 
				   $res = mysql_query("SELECT * FROM institucion WHERE idinst != 1 ORDER BY institucion") or die( mysql_error());
				   if(mysql_num_rows($res) > 0 ) {
				      $xpos = 0;
					  $Iins[$xpos] = "-";
					  $Nins[$xpos] = " Seleccione Instituci&oacute;n... ";
					  $xpos++;
					  
					  while($flinst=mysql_fetch_object($res)) {
					    $Iins[$xpos] = $flinst->idinst;
						$Nins[$xpos] = $flinst->institucion;
						$xpos++;
					  } ?>
					      <select name="cinst" size="1" id="cinst">
                            <?php for($ypos=0; $ypos < $xpos; $ypos++) { ?>
                            <option value="<?php echo $Iins[$ypos];?>"><?php echo $Nins[$ypos];?></option>
						<?php } ?>
					  </select><?php
                       unset($flinst);
				   } mysql_free_result($res);?>
				   </td>
			   </tr>
<?php } ?>
			   <tr><td colspan="2" height="25"></td></tr>
			   <tr><td>Tipo de Tesis</td>
			       <td><?php
				   $res=mysql_query("SELECT * FROM tipo ORDER BY tipo") or die(mysql_error());
				   if(mysql_num_rows($res) > 0 ) {
				      $xt = 0;
					  $Ites[$xt] = "-";
					  $Ntes[$xt] = "Seleccione Tipo de Tesis... ";
					  $xt++;
					  
					  while($flxt=mysql_fetch_object($res) ) {
					     $Ites[$xt] = $flxt->idtipo;
						 $Ntes[$xt] = $flxt->tipo;
						 $xt++;
					  }?>
					  <select name="tipo" size="1">
					  <?php for($yt=0; $yt < $xt; $yt++) { ?>
					          <option value="<?php echo $Ites[$yt];?>"><?php echo $Ntes[$yt];?></option>
					  <?php } ?>
					  </select><?php
				   }
				   mysql_free_result($res); ?>
				   </td>
               </tr>
			   <tr><td colspan="2" height="5"></td></tr>
			   <tr><td>&Aacute;rea</td>
			       <td><?php
				   $res=mysql_query("SELECT * FROM area ORDER BY area") or die(mysql_error());
				   if(mysql_num_rows($res) > 0 ) {
				      $xa = 0;
					  $Iare[$xa] = "-";
					  $Nare[$xa] = "Seleccione &Aacute;rea... ";
					  $xa++;
					  while($flxa=mysql_fetch_object($res) ) {
					     $Iare[$xa] = $flxa->idarea;
						 $Nare[$xa] = $flxa->area;
						 $xa++;
					  }?>
					  <select name="area" size="1">
					  <?php for($ya=0; $ya < $xa; $ya++) { ?>
					          <option value="<?php echo $Iare[$ya];?>"><?php echo $Nare[$ya];?></option>
					  <?php } ?>
					  </select><?php
				   }
				   mysql_free_result($res); ?></td>
			   </tr>
			   <tr><td colspan="2" height="5"></td></tr>
			   <tr><td>A&ntilde;o Edici&oacute;n</td>
			       <td><input type="text" name="anno" size="4" maxlength="4" onKeyPress="return numeros(this, event);"></td>
			   </tr>
			   <tr><td colspan="2" height="5"></td></tr>
			   <tr><td colspan="2">T&iacute;tulo Tesis</td></tr>
			   <tr><td colspan="2"><input type="text" name="titulo" size="100" maxlength="255"></td></tr>
			   <tr><td colspan="2" height="5"></td></tr>
			   <tr><td colspan="2">Profesores Gu&iacute;as</td><td></td></tr>
			   <tr><td colspan="2">
			         <table border="0" cellpadding="0" cellspacing="0">
					   <tr>
					      <td><input type="text" name="profg1" size="45" maxlength="128"></td>
					      <td style="padding-left:3px;"><input type="text" name="profg2" size="45" maxlength="128"></td>
					   </tr>
					   <tr>
					      <td><input type="text" name="profg3" size="45" maxlength="128"></td>
					      <td style="padding-left:3px;"></td>
					   </tr>
					 </table>
			       </td>
			   </tr>
			   <tr><td colspan="2" height="5"></td></tr>
			   <tr><td colspan="2">Profesores Informantes</td><td></td></tr>
			   <tr><td colspan="2">
			         <table border="0" cellpadding="0" cellspacing="0">
					   <tr>
					      <td><input type="text" name="infor1" size="45" maxlength="128"></td>
					      <td style="padding-left:3px;"><input type="text" name="infor2" size="45" maxlength="128"></td>
					   </tr>
					   <tr>
					      <td><input type="text" name="infor3" size="45" maxlength="128"></td>
					      <td style="padding-left:3px;"></td>
					   </tr>
					 </table>
			       </td>
			   </tr>
			   <tr><td colspan="2" height="5"></td></tr>
			   <tr><td colspan="2">Alumnos Tesistas</td><td></td></tr>
			   <tr><td colspan="2">
			         <table border="0" cellpadding="0" cellspacing="0">
					   <tr>
					      <td><input type="text" name="alum1" size="45" maxlength="128"></td>
					      <td style="padding-left:3px;"><input type="text" name="alum2" size="45" maxlength="128"></td>
					   </tr>
					   <tr>
					      <td><input type="text" name="alum3" size="45" maxlength="128"></td>
					      <td style="padding-left:3px;"><input type="text" name="alum4" size="45" maxlength="128"></td>
					   </tr>
					 </table>
			       </td>
			   </tr>
			   <tr><td colspan="2" height="5"></td></tr>
			   <tr><td >Tel&eacute;fono Contacto</td><td><input type="text" name="fono" size="10" maxlength="12" onKeyPress="return numeros(this, event);"></td></tr>
			   <tr><td colspan="2" height="5"></td></tr>
			   <tr><td >Email Contacto</td><td><input type="text" name="nomemail" size="50" maxlength="50" onChange="return vemail(this.form.nomemail.value);"></td></tr>
			   <tr><td colspan="2" height="5"></td></tr>
			   <tr><td colspan="2">Resumen Ejecutivo Tesis</td></tr>
			   <tr>
			      <td colspan="2">
				  <textarea name="resumen" rows="12" cols="55"></textarea>
				  </td>
			   </tr>
			   <tr><td colspan="2" height="35"></td></tr>
			   <tr><td colspan="2" height="45" align="center" valign="middle">
			       <input type="submit" name="ktsis" value="  Grabar Tesis  ">
				   </td>
			   </tr>
		   </table>
		  </td></tr>
		  </table></form>
		</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
      </table>
<?php
tsispie();
}


if($HTTP_GET_VARS[s] == "gt" ) {
   // Insertar Tesis
      $res=mysql_query("SELECT idtesis FROM tesis WHERE titulo='$titulo'") or die(mysql_error());
      if(mysql_num_rows($res) == 0 ) {
	     if( $nivel == "X" ) {
		     if ( $cinst == "-" ) { $cinst = $idins; }
             mysql_query("INSERT INTO tesis(idinst, idtipo, idarea, titulo, anno, profg1, profg2, profg3, infor1, infor2, infor3, alum1, alum2, alum3, alum4, resumen, fono, email) VALUES('$cinst','$tipo','$area','$titulo','$anno','$profg1','$profg2','$profg3','$infor1','$infor2','$infor3','$alum1','$alum2','$alum3','$alum4','$resumen','$fono','$nomemail')") or die(mysql_error());
         } else {
             mysql_query("INSERT INTO tesis(idinst, idtipo, idarea, titulo, anno, profg1, profg2, profg3, infor1, infor2, infor3, alum1, alum2, alum3, alum4, resumen, fono, email) VALUES('$idins','$tipo','$area','$titulo','$anno','$profg1','$profg2','$profg3','$infor1','$infor2','$infor3','$alum1','$alum2','$alum3','$alum4','$resumen','$fono','$nomemail')") or die(mysql_error());
		 }
         header("Location: $PHP_SELF?s=pt");   
      } else { // Se encontro un Registro previo
        tsiscab();
        $mens = " Error ... ". $titulo. " Ya Existe,  Imposible Almacenar Registro.";
        tsismens($mens);
        tsispie();
      }
      mysql_free_result($res);
      mysql_close($link);
}




if($HTTP_GET_VARS[s] == "mt" ) {
   $result=mysql_query("SELECT * FROM tesis WHERE idtesis=$id") or die(mysql_error());
   if($row=mysql_fetch_object($result)) {
      $rtipo = $row->idtipo;
	  $rarea = $row->idarea;
	  $ranno = $row->anno;
	  $rtitulo = $row->titulo;
	  $rprofg1 = $row->profg1; $rprofg2 = $row->profg2;
	  $rprofg3 = $row->profg3;
	  $rinfor1 = $row->infor1; $rinfor2 = $row->infor2;
	  $rinfor3 = $row->infor3;
	  $ralum1 = $row->alum1; $ralum2 = $row->alum2;
	  $ralum3 = $row->alum3; $ralum4 = $row->alum4;
	  $rfono = $row->fono;
	  $remail = $row->email;
	  $rresumen = str_replace("<BR>", "\n", $row->resumen);
      unset($row);
      tsiscab();
?>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td align="left" class="texto-cab">&nbsp;usted se encuentra en <strong>Agregar Tesis</strong></td>
        </tr>
		<tr><td height="35"></td></tr>
        <tr> 
          <td><form name="formtesis" method="post" action="<?php $PHP_SELF?>?s=ct" onSubmit="return vldtesis();">
		     <input type="hidden" name="global_qk" value="<?php echo $global_qk;?>">
			 <input type="hidden" name="idins" value="<?php echo $idins;?>">
			 <input type="hidden" name="nivel" value="<?php echo $nivel;?>">
			 <input type="hidden" name="id" value="<?php echo $id;?>">
		  <table border="0" cellpadding="0" cellspacing="1" align="center" bgcolor="#666666">
		  <tr><td>
		     <table border="0" cellpadding="3" cellspacing="0" class="tableform" bgcolor="#E4E4E4">
			   <tr><td colspan="2" align="center" class="texto-tit">Ficha Ingreso de Tesis</td></tr>
			   <tr><td colspan="2" height="25"></td></tr>
			   <tr><td>Tipo de Tesis</td>
			       <td><?php
				   $res=mysql_query("SELECT * FROM tipo ORDER BY tipo") or die(mysql_error());
				   if(mysql_num_rows($res) > 0 ) {
				      $xt = 0;
					  $Ites[$xt] = "-";
					  $Ntes[$xt] = "Seleccione Tipo de Tesis... ";
					  $xt++;
					  
					  while($flxt=mysql_fetch_object($res) ) {
					     $Ites[$xt] = $flxt->idtipo;
						 $Ntes[$xt] = $flxt->tipo;
						 $xt++;
					  }?>
					  <select name="tipo" size="1">
					  <?php for($yt=0; $yt < $xt; $yt++) { 
					          if( $Ites[$yt] == $rtipo ) { ?>
					              <option value="<?php echo $Ites[$yt];?>" selected><?php echo $Ntes[$yt];?></option>
						<?php } else { ?>
					          <option value="<?php echo $Ites[$yt];?>"><?php echo $Ntes[$yt];?></option>
					  <?php   }
					        } ?>
					  </select><?php
				   }
				   mysql_free_result($res); ?>
				   </td>
               </tr>
			   <tr><td colspan="2" height="5"></td></tr>
			   <tr><td>&Aacute;rea</td>
			       <td><?php
				   $res=mysql_query("SELECT * FROM area ORDER BY area") or die(mysql_error());
				   if(mysql_num_rows($res) > 0 ) {
				      $xa = 0;
					  $Iare[$xa] = "-";
					  $Nare[$xa] = "Seleccione &Aacute;rea... ";
					  $xa++;
					  while($flxa=mysql_fetch_object($res) ) {
					     $Iare[$xa] = $flxa->idarea;
						 $Nare[$xa] = $flxa->area;
						 $xa++;
					  }?>
					  <select name="area" size="1">
					  <?php for($ya=0; $ya < $xa; $ya++) { 
					            if( $Iare[$ya] == $rarea ) { ?>
					                <option value="<?php echo $Iare[$ya];?>" selected><?php echo $Nare[$ya];?></option>
                         <?php  } else { ?>
					                <option value="<?php echo $Iare[$ya];?>"><?php echo $Nare[$ya];?></option>
					  <?php     }
					         } ?>
					  </select><?php
				   }
				   mysql_free_result($res); ?></td>
			   </tr>
			   <tr><td colspan="2" height="5"></td></tr>
			   <tr><td>A&ntilde;o Edici&oacute;n</td>
			       <td><input type="text" name="anno" size="4" maxlength="4" onKeyPress="return numeros(this, event);" value="<?php echo $ranno;?>"></td>
			   </tr>
			   <tr><td colspan="2" height="5"></td></tr>
			   <tr><td colspan="2">T&iacute;tulo Tesis</td></tr>
			   <tr><td colspan="2"><input type="text" name="titulo" size="100" maxlength="255" value="<?php echo $rtitulo;?>"></td></tr>
			   <tr><td colspan="2" height="5"></td></tr>
			   <tr><td colspan="2">Profesores Gu&iacute;as</td><td></td></tr>
			   <tr><td colspan="2">
			         <table border="0" cellpadding="0" cellspacing="0">
					   <tr>
					      <td><input type="text" name="profg1" size="45" maxlength="128" value="<?php echo $rprofg1;?>"></td>
					      <td style="padding-left:3px;"><input type="text" name="profg2" size="45" maxlength="128" value="<?php echo $rprofg2;?>"></td>
					   </tr>
					   <tr>
					      <td><input type="text" name="profg3" size="45" maxlength="128" value="<?php echo $rprofg3;?>"></td>
					      <td style="padding-left:3px;"></td>
					   </tr>
					 </table>
			       </td>
			   </tr>
			   <tr><td colspan="2" height="5"></td></tr>
			   <tr><td colspan="2">Profesores Informantes</td><td></td></tr>
			   <tr><td colspan="2">
			         <table border="0" cellpadding="0" cellspacing="0">
					   <tr>
					      <td><input type="text" name="infor1" size="45" maxlength="128" value="<?php echo $rinfor1;?>"></td>
					      <td style="padding-left:3px;"><input type="text" name="infor2" size="45" maxlength="128" value="<?php echo $rinfor2;?>"></td>
					   </tr>
					   <tr>
					      <td><input type="text" name="infor3" size="45" maxlength="128" value="<?php echo $rinfor3;?>"></td>
					      <td style="padding-left:3px;"></td>
					   </tr>
					 </table>
			       </td>
			   </tr>
			   <tr><td colspan="2" height="5"></td></tr>
			   <tr><td colspan="2">Alumnos Tesistas</td><td></td></tr>
			   <tr><td colspan="2">
			         <table border="0" cellpadding="0" cellspacing="0">
					   <tr>
					      <td><input type="text" name="alum1" size="45" maxlength="128" value="<?php echo $ralum1;?>"></td>
					      <td style="padding-left:3px;"><input type="text" name="alum2" size="45" maxlength="128" value="<?php echo $ralum2;?>"></td>
					   </tr>
					   <tr>
					      <td><input type="text" name="alum3" size="45" maxlength="128" value="<?php echo $ralum3;?>"></td>
					      <td style="padding-left:3px;"><input type="text" name="alum4" size="45" maxlength="128" value="<?php echo $ralum4;?>"></td>
					   </tr>
					 </table>
			       </td>
			   </tr>
			   <tr><td colspan="2" height="5"></td></tr>
			   <tr><td >Tel&eacute;fono Contacto</td><td><input type="text" name="fono" size="10" maxlength="12" onKeyPress="return numeros(this, event);" value="<?php echo $rfono;?>"></td></tr>
			   <tr><td colspan="2" height="5"></td></tr>
			   <tr><td >Email Contacto</td><td><input type="text" name="nomemail" size="50" maxlength="50" onChange="return vemail(this.form.nomemail.value);" value="<?php echo $remail;?>"></td></tr>
			   <tr><td colspan="2" height="5"></td></tr>
			   <tr><td colspan="2">Resumen Ejecutivo Tesis</td></tr>
			   <tr>
			      <td colspan="2">
				  <textarea name="resumen" rows="12" cols="55" value="<?php echo $rresumen;?>"><?php echo $rresumen;?></textarea>
				  </td>
			   </tr>
			   <tr><td colspan="2" height="35"></td></tr>
			   <tr><td colspan="2" height="45" align="center" valign="middle">
			       <input type="submit" name="mtsis" value="  Actualizar Tesis  ">
				   </td>
			   </tr>
		   </table>
		  </td></tr>
		  </table></form>
		</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
      </table>
<?php
   tsispie();
   }
   mysql_free_result($result); 
}


if($HTTP_GET_VARS[s] == "ct" ) {
   // Insertar Tesis
      $titulo = strtoupper($titulo);
      $res=mysql_query("SELECT idtesis FROM tesis WHERE idtesis='$id'") or die(mysql_error());
      if(mysql_num_rows($res) > 0 ) {
         mysql_query("UPDATE tesis SET idtipo='$tipo', idarea='$area', titulo='$titulo', anno='$anno', profg1='$profg1', profg2='$profg2', profg3='$profg3', infor1='$infor1', infor2='$infor2', infor3='$infor3', alum1='$alum1', alum2='$alum2', alum3='$alum3', alum4='$alum4', resumen='$resumen', fono='$fono', email='$nomemail' WHERE idtesis='$id'") or die(mysql_error());
         header("Location: $PHP_SELF?s=pt");   
      } else { // Se encontro un Registro previo
        tsiscab();
        $mens = " Error ...  Ha ocurrido un problema interno al momento de actualizar informaci&oacute;n. Por favor, intente nuevamente.";
        tsismens($mens);
        tsispie();
      }
      mysql_free_result($res);
      mysql_close($link);
}




if($HTTP_GET_VARS[s] == "et" ) {
mysql_query("DELETE FROM tesis WHERE idtesis=\"$id\" ") or die(mysql_error());
mysql_close($link);
header( "Location: $PHP_SELF?s=pt");

}



if($HTTP_GET_VARS[s] == "pu" ) {
tsiscab();
?>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td align="left" class="texto-cab">&nbsp;usted se encuentra en <strong>Principal Usuarios Administradores</strong></td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td style="padding-left:2px;"><!-- Principio Paginacion Tesis -->
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<?            // Paginacion de Registros de Tabla Noticias
              /* Limito la busqueda */
                 $TAMANO_PAGINA = 30;

              /* examino la página a mostrar y el inicio del registro a mostrar */
                 $pagina = $HTTP_GET_VARS["pagina"];
                 if (!$pagina) { $inicio = 0; $pagina=1;
                 } else { $inicio = ($pagina - 1) * $TAMANO_PAGINA; }
									 
                 $ssql = "SELECT id, institucion, nameus, email FROM admuser INNER JOIN institucion ON admuser.idinst=institucion.idinst";
									 
                 $rs = mysql_query($ssql);
                 $num_total_registros = mysql_num_rows($rs);

                 /* calculo el total de páginas */
                    $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);

                 /* pongo el número de registros total, el tamaño de página y la página que se muestra */
                    $maxpags = 10;
                    $minimo = $maxpags ? max(1, $pagina-ceil($maxpags/2)): 1;
                    $maximo = $maxpags ? min($total_paginas, $pagina+floor($maxpags/2)): $total_paginas;

                 /* construyo la sentencia SQL */
                    $ssql.= " LIMIT ". $inicio . "," . $TAMANO_PAGINA;
                    $rs = mysql_query($ssql);
					$num_total_actual = mysql_num_rows($rs);
					$minreg = min(1, $num_total_actual );
					$maxreg = max(1,$num_total_registros);
					if($num_total_actual > 0 ) {?>
					<tr><td colspan="5" align="right" class="info"><div id="lin-base">mostrando <?php echo $pagina;?> de <?php echo $num_total_registros;?></div></td></tr>
                    <tr><td colspan="5" height="10"></td></tr><?php
					
                    while ($fila=mysql_fetch_object($rs)) { ?>                                                        
						   <tr><td class="info">
						    Instituci&oacute;n :&nbsp;<font color="#943410"><?php echo $fila->institucion;?></font><br>
							Usuario:&nbsp;<font color="#943410"><?php echo $fila->nameus;?></font><br>
                            Contacto:&nbsp;<font color="#943410"><? echo $fila->email;?></font></td>
							<td width="5"></td>
							<td align="center"><!--<form action="<?php $PHP_SELF?>?s=mu" method="post">
                                  <input type="hidden" name="id" value="<?php echo $fila->id; ?>">
                                  <input type="image" border="0" src="../imagenes/btn_mod.png" alt=" Modificar Registro " align="middle">
                                </form>--></td>
							<td width="5"></td>
							<td align="center"><form action="<?php $PHP_SELF;?>?s=eu" method="post">
							    <input type="hidden"name="id" value="<?php echo $fila->id;?>">
								<input type="image" border="0" src="../imagenes/btn_eli.png" alt=" Eliminar Registro " align="middle">
								</form></td>
							</tr>
							<tr><td colspan="5" height="5"></td></tr>
							<tr><td colspan="5" height="1" style="padding-left:2px;"><div id="lin-div"></div></td></tr>
							<tr><td colspan="5" height="10"></td></tr>
                     <?php } 
					 } ?>
                         </table>
		  </td><!-- FIN Paginacion Tesis -->
        </tr>
<?php

    /* cerramos el conjunto de resultados y la conexión con la base de datos */
    mysql_free_result($rs);
    //mysql_close();


   if ($total_paginas > 1)
   {?> <tr><td height="10" valign="middle" class="info" style="padding-left:2px;"><div id="lin-sup">mostrar m&aacute;s avisos en p&aacute;gina <?php
      for ($i=$minimo; $i<$pagina; $i++){
         echo "<a href='".$HTTP_SERVER["PHP_SELF"]."?s=pu&pagina=".$i."'>$i</a>&nbsp;";
      }
	  
	  echo "<font face='verdana' size='-2'>[". $pagina. "] </font>&nbsp;";

      for ($i=$pagina+1; $i<=$maximo; $i++){
         echo "<a href='".$HTTP_SERVER["PHP_SELF"]."?s=pu&pagina=".$i."'>$i</a>&nbsp;";
      }
   

   if($pagina<$total_paginas)
   {
     echo "&nbsp;<a href='".$HTTP_SERVER["PHP_SELF"]."?s=pu&pagina=" .($pagina+1). "'>";
     echo "<font face='verdana' size='-2'>siguiente &raquo;&raquo;</font></a>";

   }?> </div></td></tr> <?php
  } ?>
        <tr><td>&nbsp;</td></tr>
       <tr><td>&nbsp;</td></tr>
      </table>
<?php
tsispie();
}



if($HTTP_GET_VARS[s] == "au" ) {
tsiscab();
?>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td align="left" class="texto-cab">&nbsp;usted se encuentra en <strong>Agregar Usuario Administrador Tesis</strong></td>
        </tr>
        <tr><td height="35"></td></tr>
        <tr> 
          <td><form name="formuser" method="post" action="<?php $PHP_SELF?>?s=gu" onSubmit="return vldus();">
		     <input type="hidden" name="global_qk" value="<?php echo $global_qk;?>">
			 <input type="hidden" name="idins" value="<?php echo $idins;?>">
			 <input type="hidden" name="nivel" value="<?php echo $nivel;?>">
		  <table border="0" cellpadding="0" cellspacing="1" align="center" bgcolor="#666666">
		  <tr><td>
		     <table border="0" cellpadding="3" cellspacing="0" class="tableform" bgcolor="#FFFFFF">
			   <tr><td colspan="2" align="center" class="texto-tit">Ficha Ingreso Nombre Usuario Administrador Tesis</td></tr>
			   <tr><td colspan="2" height="25"></td></tr>
			   <tr><td>&nbsp;Nombre Cuenta Usuario Administrador Tesis:</td>
			       <td><input type="text" name="nomuser" size="20" maxlength="20"></td>
			   </tr>
			   <tr><td>&nbsp;Contrase&ntilde;a para Cuenta Usuario Administrador Tesis:</td>
			       <td><input type="password" name="nompass" size="20" maxlength="32"></td>
			   </tr>
			   <tr><td>&nbsp;Email del Contacto Usuario Administrador Tesis:</td>
			       <td><input type="text" name="nomemail" size="20" maxlength="50"></td>
			   </tr>
			   <tr><td>&nbsp;Representante de Instituci&oacute;n:</td>
			       <td><?php 
				   $res = mysql_query("SELECT * FROM institucion") or die( mysql_error());
				   if(mysql_num_rows($res) > 0 ) {
				      $xpos = 0;
					  $Iins[$xpos] = "-";
					  $Nins[$xpos] = " Seleccione Instituci&oacute;n... ";
					  $xpos++;
					  
					  while($flinst=mysql_fetch_object($res)) {
					    $Iins[$xpos] = $flinst->idinst;
						$Nins[$xpos] = $flinst->institucion;
						$xpos++;
					  } ?>
					  <select name="institucion" size="1">
					    <?php for($ypos=0; $ypos < $xpos; $ypos++) { ?>
						        <option value="<?php echo $Iins[$ypos];?>"><?php echo $Nins[$ypos];?></option>
						<?php } ?>
					  </select><?php
                       unset($flinst);
				   } mysql_free_result($res);mysql_close($link);?>
				   </td>
			   </tr>
			   <tr><td>&nbsp;Nivel:</td>
			       <td><select name="nomnivel" size="1">
				       <option value="-" selected>Seleccione Nivel de Administrador...</option>
					   <option value="U">Universidades</option>
					   <option value="I">Institutos Profesionales</option>
					   <option value="C">Centro de Formaci&oacute;n T&eacute;cnica</option>
					   <option value="S">Administrador Solicitud de Temas</option>
					   <option value="X">Administrador GORE</option>
					   </select>
				   </td>
			   </tr>
			   <tr><td colspan="2" align="center" height="45"><input type="submit" name="creauser" value=" Registrar Usuario Administrador  ">
			   </td></tr>
			 </table>
			</td></tr></table></form>
		  </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
      </table>
<?php
tsispie();
}



if($HTTP_GET_VARS[s] == "gu" ) {
   $res = mysql_query("SELECT id FROM admuser WHERE nameus = '$nomuser'") or die( mysql_error());
   if(mysql_num_rows($res) == 0 ) {
      // Grabar Nombre de Institucion
         mysql_query("INSERT INTO admuser(idinst,nivel,email,nameus,passus) VALUES('$institucion','$nomnivel','$nomemail','$nomuser','$nompass')") or die( mysql_error());
         enviar_email( $nompass, $nomemail, $nomuser );
	     header( "Location: $PHP_SELF?s=pu");
   } else {
     // Se encontro un Registro previo
        tsiscab();
        $mens = " Error ... ". $nomuser. " Ya Existe,  Imposible Almacenar Registro.";
        tsismens($mens);
        tsispie();
   }
   mysql_free_result($res);
   mysql_close($link);
}


if($HTTP_GET_VARS[s] == "pe" ) {
tsiscab();
?>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td align="left" class="texto-cab">&nbsp;usted se encuentra en <strong>Principal Administraci&oacute;n Solicitud de Temas</strong></td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td style="padding-left:2px;"><!-- Principio Paginacion Tesis -->
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<?            // Paginacion de Registros de Tabla Noticias
              /* Limito la busqueda */
                 $TAMANO_PAGINA = 30;

              /* examino la página a mostrar y el inicio del registro a mostrar */
                 $pagina = $HTTP_GET_VARS["pagina"];
                 if (!$pagina) { $inicio = 0; $pagina=1;
                 } else { $inicio = ($pagina - 1) * $TAMANO_PAGINA; }
									 
                 $ssql = "SELECT id, nombre, empresa, email FROM admemp";
									 
                 $rs = mysql_query($ssql);
                 $num_total_registros = mysql_num_rows($rs);

                 /* calculo el total de páginas */
                    $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);

                 /* pongo el número de registros total, el tamaño de página y la página que se muestra */
                    $maxpags = 10;
                    $minimo = $maxpags ? max(1, $pagina-ceil($maxpags/2)): 1;
                    $maximo = $maxpags ? min($total_paginas, $pagina+floor($maxpags/2)): $total_paginas;

                 /* construyo la sentencia SQL */
                    $ssql.= " LIMIT ". $inicio . "," . $TAMANO_PAGINA;
                    $rs = mysql_query($ssql);
					$num_total_actual = mysql_num_rows($rs);
					$minreg = min(1, $num_total_actual );
					$maxreg = max(1,$num_total_registros);
					if($num_total_actual > 0 ) {?>
					<tr><td colspan="5" align="right" class="info"><div id="lin-base">mostrando <?php echo $pagina;?> de <?php echo $num_total_registros;?></div></td></tr>
                    <tr><td colspan="5" height="10"></td></tr><?php
					
                    while ($fila=mysql_fetch_object($rs)) { ?>                                                        
						   <tr><td class="info">
						    Empresa :&nbsp;<font color="#943410"><?php echo $fila->empresa;?></font><br>
							Usuario:&nbsp;<font color="#943410"><?php echo $fila->nombre;?></font><br>
                            Contacto:&nbsp;<font color="#943410"><? echo $fila->email;?></font></td>
							<td width="5"></td>
							<td align="center"><!--<form action="<?php $PHP_SELF?>?s=me" method="post">
                                  <input type="hidden" name="id" value="<?php echo $fila->id; ?>">
                                  <input type="image" border="0" src="../imagenes/btn_mod.png" alt=" Modificar Registro " align="middle">
                                </form>--></td>
							<td width="5"></td>
							<td align="center"><form action="<?php $PHP_SELF;?>?s=ee" method="post">
							    <input type="hidden"name="id" value="<?php echo $fila->id;?>">
								<input type="image" border="0" src="../imagenes/btn_eli.png" alt=" Eliminar Registro " align="middle">
								</form></td>
							</tr>
							<tr><td colspan="5" height="5"></td></tr>
							<tr><td colspan="5" height="1" style="padding-left:2px;"><div id="lin-div"></div></td></tr>
							<tr><td colspan="5" height="10"></td></tr>
                     <?php } 
					 } ?>
                         </table>
		  </td><!-- FIN Paginacion Tesis -->
        </tr>
<?php

    /* cerramos el conjunto de resultados y la conexión con la base de datos */
    mysql_free_result($rs);
    //mysql_close();


   if ($total_paginas > 1)
   {?> <tr><td height="10" valign="middle" class="info" style="padding-left:2px;"><div id="lin-sup">mostrar m&aacute;s avisos en p&aacute;gina <?php
      for ($i=$minimo; $i<$pagina; $i++){
         echo "<a href='".$HTTP_SERVER["PHP_SELF"]."?s=pe&pagina=".$i."'>$i</a>&nbsp;";
      }
	  
	  echo "<font face='verdana' size='-2'>[". $pagina. "] </font>&nbsp;";

      for ($i=$pagina+1; $i<=$maximo; $i++){
         echo "<a href='".$HTTP_SERVER["PHP_SELF"]."?s=pe&pagina=".$i."'>$i</a>&nbsp;";
      }
   

   if($pagina<$total_paginas)
   {
     echo "&nbsp;<a href='".$HTTP_SERVER["PHP_SELF"]."?s=pe&pagina=" .($pagina+1). "'>";
     echo "<font face='verdana' size='-2'>siguiente &raquo;&raquo;</font></a>";

   }?> </div></td></tr> <?php
  } ?>
        <tr><td>&nbsp;</td></tr>
       <tr><td>&nbsp;</td></tr>
      </table>
<?php
tsispie();
}


if($HTTP_GET_VARS[s] == "ae" ) {
tsiscab();
?>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td align="left" class="texto-cab">&nbsp;usted se encuentra en <strong>Agregar Empresa para Solicitud de Temas</strong></td>
        </tr>
        <tr><td height="35"></td></tr>
        <tr> 
          <td><form name="form" method="post" action="<?php $PHP_SELF?>?s=ge" onSubmit="return vldemp();">
		     <input type="hidden" name="global_qk" value="<?php echo $global_qk;?>">
			 <input type="hidden" name="idins" value="<?php echo $idins;?>">
			 <input type="hidden" name="nivel" value="<?php echo $nivel;?>">
		  <table border="0" cellpadding="0" cellspacing="1" align="center" bgcolor="#666666">
		  <tr><td>
		     <table border="0" cellpadding="3" cellspacing="0" class="tableform" bgcolor="#FFFFFF">
			   <tr><td align="center" class="texto-tit">Ficha Ingreso Datos Empresa para Solicitar Temas de Estudio</td></tr>
			   <tr><td height="25"></td></tr>
               <tr><td>&nbsp;Empresa:</td></tr>
			   <tr><td><input type="text" name="nom_emp" size="50" maxlength="128"></td></tr>
               <tr><td>&nbsp;Nombre Persona Contacto de Empresa:</td>
			   <tr><td><input type="text" name="nom_cont" size="50" maxlength="128"></td></tr>
               <tr><td>&nbsp;Email del Contacto Usuario Administrador Temas de Estudio:</td></tr>
			   <tr><td><input type="text" name="email_cont" size="50" maxlength="50"   onchange="return vemail(this.value);"></td></tr>
			   <tr><td>&nbsp;Telefono Contacto:</td></tr>
			   <tr><td><input type="text" name="fono_cont" size="15" maxlength="15"></td></tr>
               <tr><td height="15"></td></tr>
			   <tr><td>&nbsp;Nombre Cuenta Usuario Administrador Temas de Estudio:</td></tr>
			   <tr><td><input type="text" name="nomuser" size="20" maxlength="20"></td></tr>
			   
			   <tr><td>&nbsp;Contrase&ntilde;a para Cuenta Usuario Administrador Temas de Estudio:</td></tr>
			   <tr><td><input type="password" name="nompass" size="20" maxlength="32"></td></tr>
			   <tr><td align="center" height="45"><input type="submit" name="creaemp" value=" Registrar Empresa  ">
			   </td></tr>
			 </table>
			</td></tr></table></form>
		  </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
      </table>
<?php
tsispie();
}


if($HTTP_GET_VARS[s] == "ge" ) {
   $res = mysql_query("SELECT id FROM admemp WHERE nameus = '$nomuser'") or die( mysql_error());
   if(mysql_num_rows($res) == 0 ) {
      // Grabar Nombre de Empresa
         mysql_query("INSERT INTO admemp(nombre,empresa,email,fono,nameus,passus) VALUES('$nom_cont','$nom_emp','$email_cont','$fono_cont','$nomuser','$nompass')") or die( mysql_error());
         enviar_email_empresa( $nompass, $nomemail, $nomuser, $nom_cont );
	     header( "Location: $PHP_SELF?s=pe");
   } else {
     // Se encontro un Registro previo
        tsiscab();
        $mens = " Error ... ". $nomuser. " Ya Existe,  Imposible Almacenar Registro.";
        tsismens($mens);
        tsispie();
   }
   mysql_free_result($res);
   mysql_close($link);
}


if($HTTP_GET_VARS[s] == "ee" ) {
# Eliminar Empresa
$ssql = "DELETE FROM admemp WHERE id=\"$id\" ";
mysql_query( $ssql, $link );
mysql_close($link);
header( "Location: $PHP_SELF?s=pe");
}



if($HTTP_GET_VARS[s] == "pi" ) {
tsiscab();
?>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td align="left" class="texto-cab">&nbsp;usted se encuentra en <strong>Principal Instituci&oacute;n</strong></td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td style="padding-left:2px;"><!-- Principio Paginacion Tesis -->
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<?            // Paginacion de Registros de Tabla Noticias
              /* Limito la busqueda */
                 $TAMANO_PAGINA = 30;

              /* examino la página a mostrar y el inicio del registro a mostrar */
                 $pagina = $HTTP_GET_VARS["pagina"];
                 if (!$pagina) { $inicio = 0; $pagina=1;
                 } else { $inicio = ($pagina - 1) * $TAMANO_PAGINA; }
									 
                 $ssql = "SELECT idinst, institucion FROM institucion";									 
                 $rs = mysql_query($ssql);
                 $num_total_registros = mysql_num_rows($rs);

                 /* calculo el total de páginas */
                    $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);

                 /* pongo el número de registros total, el tamaño de página y la página que se muestra */
                    $maxpags = 10;
                    $minimo = $maxpags ? max(1, $pagina-ceil($maxpags/2)): 1;
                    $maximo = $maxpags ? min($total_paginas, $pagina+floor($maxpags/2)): $total_paginas;

                 /* construyo la sentencia SQL */
                    $ssql.= " LIMIT ". $inicio . "," . $TAMANO_PAGINA;
                    $rs = mysql_query($ssql);
					$num_total_actual = mysql_num_rows($rs);
					$minreg = min(1, $num_total_actual );
					$maxreg = max(1,$num_total_registros);
					if($num_total_actual > 0 ) {?>
					<tr><td colspan="5" align="right" class="info"><div id="lin-base">mostrando <?php echo $pagina;?> de <?php echo $num_total_registros;?></div></td></tr>
                    <tr><td colspan="5" height="10"></td></tr><?php
					
                    while ($fila=mysql_fetch_object($rs)) { ?>                                                        
						   <tr>
						      <td class="info">&nbsp;<font color="#943410"><?php echo $fila->institucion;?></font></td>
							  <td width="5"></td>
							  <td align="center"><form action="<?php $PHP_SELF?>?s=mi" method="post">
                                  <input type="hidden" name="id" value="<?php echo $fila->idinst; ?>">
                                  <input type="image" border="0" src="../imagenes/btn_mod.png" alt=" Modificar Registro " align="middle">
                                </form></td>
							  <td width="5"></td>
							  <td align="center"><form action="<?php $PHP_SELF;?>?s=ei" method="post">
							    <input type="hidden"name="id" value="<?php echo $fila->idinst;?>">
								<input type="image" src="../imagenes/btn_eli.png" border="0" alt=" Eliminar Registro " align="middle">
								</form></td>
							</tr>
							<tr><td colspan="5" height="5"></td></tr>
							<tr><td colspan="5" height="1" style="padding-left:2px;"><div id="lin-div"></div></td></tr>
							<tr><td colspan="5" height="10"></td></tr>
                     <?php } 
					 } ?>
                         </table>
		  </td><!-- FIN Paginacion Tesis -->
        </tr>
<?php

    /* cerramos el conjunto de resultados y la conexión con la base de datos */
    mysql_free_result($rs);
    //mysql_close();


   if ($total_paginas > 1)
   {?> <tr><td height="10" valign="middle" class="info" style="padding-left:2px;"><div id="lin-sup">mostrar m&aacute;s registros en p&aacute;gina <?php
      for ($i=$minimo; $i<$pagina; $i++){
         echo "<a href='".$HTTP_SERVER["PHP_SELF"]."?s=pi&pagina=".$i."'>$i</a>&nbsp;";
      }
	  
	  echo "<font face='verdana' size='-2'>[". $pagina. "] </font>&nbsp;";

      for ($i=$pagina+1; $i<=$maximo; $i++){
         echo "<a href='".$HTTP_SERVER["PHP_SELF"]."?s=pi&pagina=".$i."'>$i</a>&nbsp;";
      }
   

   if($pagina<$total_paginas)
   {
     echo "&nbsp;<a href='".$HTTP_SERVER["PHP_SELF"]."?s=pi&pagina=" .($pagina+1). "'>";
     echo "<font face='verdana' size='-2'>siguiente &raquo;&raquo;</font></a>";
   }?> </div></td></tr> <?php
  } ?>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
      </table>
<?php
tsispie();
}



if($HTTP_GET_VARS[s] == "ai" ) {
tsiscab();
?>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td align="left" class="texto-cab">&nbsp;usted se encuentra en <strong>Agregar Instituci&oacute;n</strong></td>
        </tr>
        <tr><td height="35"></td></tr>
        <tr> 
          <td><form name="finst" method="post" action="<?php $PHP_SELF?>?s=gi">
		     <input type="hidden" name="global_qk" value="<?php echo $global_qk;?>">
			 <input type="hidden" name="idins" value="<?php echo $idins;?>">
			 <input type="hidden" name="nivel" value="<?php echo $nivel;?>">
		  <table border="0" cellpadding="0" cellspacing="1" align="center" bgcolor="#666666">
		  <tr><td>
		     <table border="0" cellpadding="3" cellspacing="0" class="tableform" bgcolor="#FFFFFF">
			   <tr><td colspan="2" align="center" class="texto-tit">Ficha Ingreso Nombre Instituci&oacute;n</td></tr>
			   <tr><td colspan="2" height="25"></td></tr>
			   <tr><td>&nbsp;Nombre Instituci&oacute;n:</td>
			       <td><input type="text" name="nominst" size="45" maxlength="255"></td>
			   </tr>
			   <tr><td colspan="2" align="center" height="45"><input type="submit" name="creainst" value=" Registrar Instituci&oacute;n  ">
			   </td></tr>
			 </table>
			</td></tr></table></form>
		  </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
      </table>
<?php
tsispie();
}


if($HTTP_GET_VARS[s] == "gi" ) {
   $nominst = strtoupper($nominst);
   $res = mysql_query("SELECT idinst FROM institucion WHERE institucion = '$nominst'") or die( mysql_error());
   if(mysql_num_rows($res) == 0 ) {
     // Grabar Nombre de Institucion
        mysql_query("INSERT INTO institucion(institucion) VALUES('$nominst')") or die( mysql_error());
        header( "Location: $PHP_SELF?s=pi");
   } else {
     // Se encontro un Registro previo
        tsiscab();
        $mens = " Error ... Ya Existe un Registro con el Valor que Desea Almacenar.";
        tsismens($mens);
        tsispie();
   }
   mysql_free_result($res);
   mysql_close($link);
}



if($HTTP_GET_VARS[s] == "mi" ) {
tsiscab();
$resmi = mysql_query("SELECT idinst, institucion FROM institucion WHERE idinst=$id") or die(mysql_error());
if( mysql_num_rows($resmi) > 0 ) {
   $flresmi = mysql_fetch_object($resmi);
   $nominst = $flresmi->institucion;
}
mysql_free_result($resmi); unset($flresmi);
mysql_close($link);
?>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td align="left" class="texto-cab">&nbsp;usted se encuentra en <strong>Modificar Instituci&oacute;n</strong></td>
        </tr>
        <tr><td height="35"></td></tr>
        <tr> 
          <td><form name="finst" method="post" action="<?php $PHP_SELF?>?s=ci">
		     <input type="hidden" name="global_qk" value="<?php echo $global_qk;?>">
			 <input type="hidden" name="idins" value="<?php echo $idins;?>">
			 <input type="hidden" name="nivel" value="<?php echo $nivel;?>">
			 <input type="hidden" name="id" value="<?php echo $id;?>">
		  <table border="0" cellpadding="0" cellspacing="1" align="center" bgcolor="#666666">
		  <tr><td>
		     <table border="0" cellpadding="3" cellspacing="0" class="tableform" bgcolor="#FFFFFF">
			   <tr><td colspan="2" align="center" class="texto-tit">Ficha Actualizaci&oacute;n Nombre Instituci&oacute;n</td></tr>
			   <tr><td colspan="2" height="25"></td></tr>
			   <tr><td>&nbsp;Nombre Instituci&oacute;n:</td>
			       <td><input type="text" name="nominst" size="45" maxlength="255" value="<?php echo $nominst;?>"></td>
			   </tr>
			   <tr><td colspan="2" align="center" height="45"><input type="submit" name="modinst" value=" Actualizar Instituci&oacute;n  ">
			   </td></tr>
			 </table>
			</td></tr></table></form>
		  </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
      </table>
<?php
tsispie();
}



if($HTTP_GET_VARS[s] == "ci" ) {
   $nominst = trim(strtoupper($nominst));
   $res = mysql_query("SELECT idinst FROM institucion WHERE institucion='$nominst'") or die( mysql_error());
   if(mysql_num_rows($res) == 0 ) {
     // Grabar Nombre de Institucion
        mysql_query("UPDATE institucion SET institucion='$nominst' WHERE idinst=$id") or die( mysql_errno().": ".mysql_error());
        header("Location: $PHP_SELF?s=pi");
   } else {
     // Se encontro un Registro previo
        tsiscab();
        $mens = " Error ... ". $nominst. " Ya Existe, Imposible Actualizar Registro.";
        tsismens($mens);
        tsispie();
   }
   mysql_free_result($res);
   mysql_close($link);
}



if($HTTP_GET_VARS[s] == "ps" ) {
tsiscab();
?>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td align="left" class="texto-cab">&nbsp;usted se encuentra en <strong>Principal Tesis</strong></td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td style="padding-left:2px;"><!-- Principio Paginacion Tesis -->
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<?            // Paginacion de Registros de Tabla Noticias
              /* Limito la busqueda */
                 $TAMANO_PAGINA = 30;

              /* examino la página a mostrar y el inicio del registro a mostrar */
                 $pagina = $HTTP_GET_VARS["pagina"];
                 if (!$pagina) { $inicio = 0; $pagina=1;
                 } else { $inicio = ($pagina - 1) * $TAMANO_PAGINA; }
									 
                 $ssql = "SELECT idtipo, tipo FROM tipo";									 
                 $rs = mysql_query($ssql);
                 $num_total_registros = mysql_num_rows($rs);

                 /* calculo el total de páginas  */
                    $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);

                 /* pongo el número de registros total, el tamaño de página y la página que se muestra */
                    $maxpags = 10;
                    $minimo = $maxpags ? max(1, $pagina-ceil($maxpags/2)): 1;
                    $maximo = $maxpags ? min($total_paginas, $pagina+floor($maxpags/2)): $total_paginas;

                 /* construyo la sentencia SQL */
                    $ssql.= " LIMIT ". $inicio . "," . $TAMANO_PAGINA;
                    $rs = mysql_query($ssql);
					$num_total_actual = mysql_num_rows($rs);
					$minreg = min(1, $num_total_actual );
					$maxreg = max(1,$num_total_registros);
					if($num_total_actual > 0 ) {?>
					<tr><td colspan="5" align="right" class="info"><div id="lin-base">mostrando <?php echo $pagina;?> de <?php echo $num_total_registros;?></div></td></tr>
                    <tr><td colspan="5" height="10"></td></tr><?php
					
                    while ($fila=mysql_fetch_object($rs)) { ?>                                                        
						   <tr>
						      <td class="info">&nbsp;<font color="#943410"><?php echo $fila->tipo;?></font></td>
							  <td width="5"></td>
							<td align="center"><form action="<?php $PHP_SELF?>?s=ms" method="post">
                                  <input type="hidden" name="id" value="<?php echo $fila->idtipo; ?>">
                                  <input type="image" border="0" src="../imagenes/btn_mod.png" alt=" Modificar Registro " align="middle">
                                </form></td>
							<td width="5"></td>
							<td align="center"><form action="<?php $PHP_SELF;?>?s=es" method="post">
							    <input type="hidden"name="id" value="<?php echo $fila->idtipo;?>">
								<input type="image" src="../imagenes/btn_eli.png" border="0" alt=" Eliminar Registro " align="middle">
								</form></td>
							</tr>
							<tr><td colspan="5" height="5" style="padding-left:2px;"><div id="lin-div"></div></td></tr>
							<tr><td colspan="5" height="10"></td></tr>
                     <?php } 
					 } ?>
                         </table>
		  </td><!-- FIN Paginacion Tesis -->
        </tr>
<?php

    /* cerramos el conjunto de resultados y la conexión con la base de datos */
    mysql_free_result($rs);
    //mysql_close();


   if ($total_paginas > 1)
   {?> <tr><td height="10" valign="middle" class="info" style="padding-left:2px;"><div id="lin-sup">mostrar m&aacute;s registros en p&aacute;gina <?php
      for ($i=$minimo; $i<$pagina; $i++){
         echo "<a href='".$HTTP_SERVER["PHP_SELF"]."?s=ps&pagina=".$i."'>$i</a>&nbsp;";
      }
	  
	  echo "<font face='verdana' size='-2'>[". $pagina. "] </font>&nbsp;";

      for ($i=$pagina+1; $i<=$maximo; $i++){
         echo "<a href='".$HTTP_SERVER["PHP_SELF"]."?s=ps&pagina=".$i."'>$i</a>&nbsp;";
      }
   

   if($pagina<$total_paginas)
   {
     echo "&nbsp;<a href='".$HTTP_SERVER["PHP_SELF"]."?s=ps&pagina=" .($pagina+1). "'>";
     echo "<font face='verdana' size='-2'>siguiente &raquo;&raquo;</font></a>";
   }?> </div></td></tr> <?php
  } ?>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
      </table>
<?php
tsispie();
}



if($HTTP_GET_VARS[s] == "as" ) {
tsiscab();
?>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td align="left" class="texto-cab">&nbsp;usted se encuentra en <strong>Agregar Tipo Tesis</strong></td>
        </tr>
        <tr><td height="35"></td></tr>
        <tr> 
          <td><form name="ftipo" method="post" action="<?php $PHP_SELF?>?s=gs">
		     <input type="hidden" name="global_qk" value="<?php echo $global_qk;?>">
			 <input type="hidden" name="idins" value="<?php echo $idins;?>">
			 <input type="hidden" name="nivel" value="<?php echo $nivel;?>">
		  <table border="0" cellpadding="0" cellspacing="1" align="center" bgcolor="#666666">
		  <tr><td>
		     <table border="0" cellpadding="3" cellspacing="0" class="tableform" bgcolor="#FFFFFF">
			   <tr><td colspan="2" align="center" class="texto-tit">Ficha Ingreso Nombre Tipo de Tesis</td></tr>
			   <tr><td colspan="2" height="25"></td></tr>
			   <tr><td>&nbsp;Nombre Tipo de Tesis:</td>
			       <td><input type="text" name="nomtipo" size="45" maxlength="128"></td>
			   </tr>
			   <tr><td colspan="2" align="center" height="45"><input type="submit" name="creatipo" value=" Registrar Tipo de Tesis  ">
			   </td></tr>
			 </table>
			</td></tr></table></form>
		  </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
      </table>
<?php
tsispie();
}


if($HTTP_GET_VARS[s] == "gs" ) {
   $nomtipo = strtoupper($nomtipo);
   $res = mysql_query("SELECT idtipo FROM tipo WHERE tipo = '$nomtipo'") or die( mysql_error());
   if(mysql_num_rows($res) == 0 ) {
      // Grabar Nombre de Institucion
         mysql_query("INSERT INTO tipo(tipo) VALUES('$nomtipo')") or die( mysql_error());
         header( "Location: $PHP_SELF?s=ps");
   } else {
      // Se encontro un Registro previo
         tsiscab();
         $mens = " Error ... Ya Existe un Registro con el Valor que Desea Almacenar.";
         tsismens($mens);
         tsispie();
   }
   mysql_free_result($res);
   mysql_close($link);
}



if($HTTP_GET_VARS[s] == "ms" ) {
tsiscab();
$resms = mysql_query("SELECT idtipo, tipo FROM tipo WHERE idtipo=$id") or die(mysql_error());
if( mysql_num_rows($resms) > 0 ) {
   $flresms = mysql_fetch_object($resms);
   $nomtipo = $flresms->tipo;
}
mysql_free_result($resms); unset($flresms);
mysql_close($link);
?>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td align="left" class="texto-cab">&nbsp;usted se encuentra en <strong>Modificar Tipo Tesis</strong></td>
        </tr>
        <tr><td height="35"></td></tr>
        <tr> 
          <td><form name="ftipo" method="post" action="<?php $PHP_SELF?>?s=cs">
		     <input type="hidden" name="global_qk" value="<?php echo $global_qk;?>">
			 <input type="hidden" name="idins" value="<?php echo $idins;?>">
			 <input type="hidden" name="nivel" value="<?php echo $nivel;?>">
			 <input type="hidden" name="id" value="<?php echo $id;?>">
		  <table border="0" cellpadding="0" cellspacing="1" align="center" bgcolor="#666666">
		  <tr><td>
		     <table border="0" cellpadding="3" cellspacing="0" class="tableform" bgcolor="#FFFFFF">
			   <tr><td colspan="2" align="center" class="texto-tit">Ficha Actualizaci&oacute;n Nombre Tipo Tesis</td></tr>
			   <tr><td colspan="2" height="25"></td></tr>
			   <tr><td>&nbsp;Nombre Tipo Tesis:</td>
			       <td><input type="text" name="nomtipo" size="45" maxlength="128" value="<?php echo $nomtipo;?>"></td>
			   </tr>
			   <tr><td colspan="2" align="center" height="45"><input type="submit" name="modtipo" value=" Actualizar Tipo Tesis  ">
			   </td></tr>
			 </table>
			</td></tr></table></form>
		  </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
      </table>
<?php
tsispie();
}



if($HTTP_GET_VARS[s] == "cs" ) {
   $nomtipo = trim(strtoupper($nomtipo));
   $res = mysql_query("SELECT idtipo FROM tipo WHERE tipo='$nomtipo'") or die( mysql_error());
   if(mysql_num_rows($res) == 0 ) {
     // Grabar Nombre de Institucion
        mysql_query("UPDATE tipo SET tipo='$nomtipo' WHERE idtipo=$id") or die( mysql_errno().": ".mysql_error());
        header( "Location: $PHP_SELF?s=ps");
   } else {
     // Se encontro un Registro previo
        tsiscab();
        $mens = " Error ... ". $nomtipo. " Ya Existe, Imposible Actualizar Registro.";
        tsismens($mens);
        tsispie();
   }
   mysql_free_result($res);
   mysql_close($link);
}



if($HTTP_GET_VARS[s] == "pa" ) {
tsiscab();
?>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td align="left" class="texto-cab">&nbsp;usted se encuentra en <strong>Principal &Aacute;rea de Tesis</strong></td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td style="padding-left:2px;"><!-- Principio Paginacion Tesis -->
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<?            // Paginacion de Registros de Tabla Noticias
              /* Limito la busqueda */
                 $TAMANO_PAGINA = 30;

              /* examino la página a mostrar y el inicio del registro a mostrar */
                 $pagina = $HTTP_GET_VARS["pagina"];
                 if (!$pagina) { $inicio = 0; $pagina=1;
                 } else { $inicio = ($pagina - 1) * $TAMANO_PAGINA; }
									 
                 $ssql = "SELECT idarea, area FROM area";									 
                 $rs = mysql_query($ssql);
                 $num_total_registros = mysql_num_rows($rs);

                 /* calculo el total de páginas  */
                    $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);

                 /* pongo el número de registros total, el tamaño de página y la página que se muestra */
                    $maxpags = 10;
                    $minimo = $maxpags ? max(1, $pagina-ceil($maxpags/2)): 1;
                    $maximo = $maxpags ? min($total_paginas, $pagina+floor($maxpags/2)): $total_paginas;

                 /* construyo la sentencia SQL */
                    $ssql.= " LIMIT ". $inicio . "," . $TAMANO_PAGINA;
                    $rs = mysql_query($ssql);
					$num_total_actual = mysql_num_rows($rs);
					$minreg = min(1, $num_total_actual );
					$maxreg = max(1,$num_total_registros);
					if($num_total_actual > 0 ) {?>
					<tr><td colspan="5" align="right" class="info"><div id="lin-base">mostrando <?php echo $pagina;?> de <?php echo $num_total_registros;?></div></td></tr>
                    <tr><td colspan="5" height="10"></td></tr><?php
					
                    while ($fila=mysql_fetch_object($rs)) { ?>                                                        
						   <tr>
						      <td class="info">&nbsp;<font color="#943410"><?php echo $fila->area;?></font></td>
							  <td width="5"></td>
							  <td align="center"><form action="<?php $PHP_SELF?>?s=ma" method="post">
                                  <input type="hidden" name="id" value="<?php echo $fila->idarea; ?>">
                                  <input type="image" border="0" src="../imagenes/btn_mod.png" alt=" Modificar Registro " align="middle">
                                </form></td>
							  <td width="5"></td>
							  <td align="center"><form action="<?php $PHP_SELF;?>?s=ea" method="post">
							    <input type="hidden"name="id" value="<?php echo $fila->idarea;?>">
								<input type="image" src="../imagenes/btn_eli.png" border="0" alt=" Eliminar Registro " align="middle">
								</form></td>
							</tr>
							<tr><td colspan="5" height="1" style="padding-left:2px;"><div id="lin-div"></div></td></tr>
							<tr><td colspan="5" height="10"></td></tr>
                     <?php } 
					 } ?>
                         </table>
		  </td><!-- FIN Paginacion Tesis -->
        </tr>
<?php

    /* cerramos el conjunto de resultados y la conexión con la base de datos */
    mysql_free_result($rs);
    //mysql_close();

   if ($total_paginas > 1)
   {?> <tr><td height="10" valign="middle" class="info" style="padding-left:2px;"><div id="lin-sup">mostrar m&aacute;s registros en p&aacute;gina <?php
      for ($i=$minimo; $i<$pagina; $i++){
         echo "<a href='".$HTTP_SERVER["PHP_SELF"]."?s=pa&pagina=".$i."'>$i</a>&nbsp;";
      }
	  
	  echo "<font face='verdana' size='-2'>[". $pagina. "] </font>&nbsp;";

      for ($i=$pagina+1; $i<=$maximo; $i++){
         echo "<a href='".$HTTP_SERVER["PHP_SELF"]."?s=pa&pagina=".$i."'>$i</a>&nbsp;";
      }

   if($pagina<$total_paginas)
   {
     echo "&nbsp;<a href='".$HTTP_SERVER["PHP_SELF"]."?s=pa&pagina=" .($pagina+1). "'>";
     echo "<font face='verdana' size='-2'>siguiente &raquo;&raquo;</font></a>";
   }?> </div></td></tr> <?php
  } ?>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
      </table>
<?php
tsispie();
}



if($HTTP_GET_VARS[s] == "aa" ) {
tsiscab();
?>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td align="left" class="texto-cab">&nbsp;usted se encuentra en <strong>Agregar &Aacute;rea de la Tesis</strong></td>
        </tr>
        <tr><td height="35"></td></tr>
        <tr> 
          <td><form name="farea" method="post" action="<?php $PHP_SELF?>?s=ga">
		     <input type="hidden" name="global_qk" value="<?php echo $global_qk;?>">
			 <input type="hidden" name="idins" value="<?php echo $idins;?>">
			 <input type="hidden" name="nivel" value="<?php echo $nivel;?>">
		  <table border="0" cellpadding="0" cellspacing="1" align="center" bgcolor="#666666">
		  <tr><td>
		     <table border="0" cellpadding="3" cellspacing="0" class="tableform" bgcolor="#FFFFFF">
			   <tr><td colspan="2" align="center" class="texto-tit">Ficha Ingreso Nombre &Aacute;rea de Tesis</td></tr>
			   <tr><td colspan="2" height="25"></td></tr>
			   <tr><td>&nbsp;Nombre &Aacute;rea de Tesis:</td>
			       <td><input type="text" name="nomarea" size="45" maxlength="128"></td>
			   </tr>
			   <tr><td colspan="2" align="center" height="45"><input type="submit" name="creaarea" value=" Registrar &Aacute;rea de Tesis  ">
			   </td></tr>
			 </table>
			</td></tr></table></form>
		  </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
      </table>
<?php
tsispie();
}


if($HTTP_GET_VARS[s] == "ga" ) {
   $nomarea = strtoupper($nomarea);
   $res = mysql_query("SELECT idarea FROM area WHERE area = '$nomarea'") or die( mysql_error());
   if(mysql_num_rows($res) == 0 ) {
     // Grabar Nombre de Institucion
        mysql_query("INSERT INTO area(area) VALUES('$nomarea')") or die( mysql_error());
        header( "Location: $PHP_SELF?s=pa");
   } else {
     // Se encontro un Registro previo
        tsiscab();
        $mens = " Error ... ". $nomarea. " Ya Existe,  Imposible Almacenar Registro.";
        tsismens($mens);
        tsispie();
   }
   mysql_free_result($res);
   mysql_close($link);
}


if($HTTP_GET_VARS[s] == "ma" ) {
tsiscab();
$resma = mysql_query("SELECT idarea, area FROM area WHERE idarea=$id") or die(mysql_error());
if( mysql_num_rows($resma) > 0 ) {
   $flresma = mysql_fetch_object($resma);
   $nomarea = $flresma->area;
}
mysql_free_result($resma); unset($flresma);
mysql_close($link);
?>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td align="left" class="texto-cab">&nbsp;usted se encuentra en <strong>Modificar &Aacute;rea de Tesis</strong></td>
        </tr>
        <tr><td height="35"></td></tr>
        <tr> 
          <td><form name="farea" method="post" action="<?php $PHP_SELF?>?s=ca">
		     <input type="hidden" name="global_qk" value="<?php echo $global_qk;?>">
			 <input type="hidden" name="idins" value="<?php echo $idins;?>">
			 <input type="hidden" name="nivel" value="<?php echo $nivel;?>">
			 <input type="hidden" name="id" value="<?php echo $id;?>">
		  <table border="0" cellpadding="0" cellspacing="1" align="center" bgcolor="#666666">
		  <tr><td>
		     <table border="0" cellpadding="3" cellspacing="0" class="tableform" bgcolor="#FFFFFF">
			   <tr><td colspan="2" align="center" class="texto-tit">Ficha Actualizaci&oacute;n Nombre &Aacute;rea de Tesis</td></tr>
			   <tr><td colspan="2" height="25"></td></tr>
			   <tr><td>&nbsp;Nombre &Aacute;rea de Tesis:</td>
			       <td><input type="text" name="nomarea" size="45" maxlength="128" value="<?php echo $nomarea;?>"></td>
			   </tr>
			   <tr><td colspan="2" align="center" height="45"><input type="submit" name="modarea" value=" Actualizar &Aacute;rea de Tesis  ">
			   </td></tr>
			 </table>
			</td></tr></table></form>
		  </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
      </table>
<?php
tsispie();
}



if($HTTP_GET_VARS[s] == "ca" ) {
   $nomarea = trim(strtoupper($nomarea));
   $res = mysql_query("SELECT idarea FROM area WHERE area='$nomarea'") or die( mysql_error());
   if(mysql_num_rows($res) == 0 ) {
     // Grabar Nombre de Institucion
        mysql_query("UPDATE area SET area='$nomarea' WHERE idarea=$id") or die( mysql_errno().": ".mysql_error());
        header( "Location: $PHP_SELF?s=pa");
   } else {
     // Se encontro un Registro previo
        tsiscab();
        $mens = " Error ... ". $nomarea. " Ya Existe, Imposible Actualizar Registro.";
        tsismens($mens);
        tsispie();
   }
   mysql_free_result($res);
   mysql_close($link);
}



} else {
  header("Location: index.php");
}
?>