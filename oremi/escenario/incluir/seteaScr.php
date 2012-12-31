<?php
function jicaOrm_cabecera() { ?>

   <?php echo "<?xml version=\"1.0\"?".">"; ?>

   <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
   <html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <title>Escenario de la Prevenci&oacute;n de Desastres</title>
      <meta http-equiv="Content-Type" content="text/html"/>
   </head>
   <link href="<?php echo _urlRaiz_;?>estilos/escenario_login.css" rel="stylesheet" type="text/css" />

   <body>
      <table border="0" width="760" cellspacing="0" cellpadding="0" style="margin:0 auto;">
        <tr><td colspan="2" style="height:25px;background-color:#3f6699;"></td></tr>
        <tr>
           <td width="120"></td>
           <td width="640">
              <table border="0" width="100%" cellspacing="0" cellpadding="0">
                <tr><td align="right">
                    <table border="0" cellspacing="0" cellpadding="0" align=right" style="font-size:0.8em;">
                       <tr>
                          <td><a href="<?php echo _urlRaiz_;?>inicio2.php">Voler P&aacute;gina Inicio</a>&nbsp;</td>
                          <td><a href="<?php echo _urlRaiz_;?>admin/index.php">Administraci&oacute;n</a>&nbsp;</td>
                          <td><a href="<?php echo _urlRaiz_;?>cierrasesion.php">Salir</a>&nbsp;</td>
                       </tr>
                    </table> 
                    </td>
                </tr>
              </table>
           </td>
        </tr>
<?php 
}





function jicaOrm_MenuAdmin() { ?>
     <tr valign="top">
       <td>
          <ul>
             <li><a href="<?php echo _urlRaiz_;?>admin/iescenari.php">Escenarios</a></li>
             <li><a href="<?php echo _urlRaiz_;?>admin/iptoscrit.php">Puntos Cr&iacute;ticos</a></li>
             <li><a href="<?php echo _urlRaiz_;?>admin/iservrela.php">Servicios Relacionados</a></li>
             <li><a href="<?php echo _urlRaiz_;?>admin/iusuarios.php">Usuarios</a></li>
             <li><a href="<?php echo _urlRaiz_;?>admin/iinstituc.php">Instituci&oacute;n</a></li>
          </ul>
       </td>
<?php 
}



function jicaOrm_SinMenuAdmin() { ?>
     <tr valign="top">
<?php 
}



function jicaOrm_Pie() { ?>
     </tr>
   </table>
</body>
</html>
<?php
}
?>